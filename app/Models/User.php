<?php

namespace App\Models;

use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use SpatieLogsActivity;
    use HasRoles;

    public function hasRole($role)
    {
        $desiredRole = $role[0][0];
        $userRole = auth()->user()->roles->pluck('name')[0] ?? 'Cliente';
        return $desiredRole === $userRole;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            //comentado para testes.. não gerar novos uuids para os usuários vindos do seeder
            $model->uuid = (string) Str::uuid();
        });
    }

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get a fullname combination of first_name and last_name
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get a first and lastname combination
     *
     * @return string
     */
    public function getUserInitials(): string
    {
        $firstInitialFirstname = $this->first_name[0];
        $firstInitialLastname = $this->last_name[0];
        $lastInitialLastname = explode(" ", $this->last_name)[count(explode(" ", $this->last_name))-1][0];
        $userInitials = $firstInitialFirstname.$lastInitialLastname;

        if ($userInitials === 'CU') {
            $userInitials = $firstInitialFirstname.$firstInitialLastname;
            if ($userInitials === 'CU') {
                $userInitials = $this->first_name[0];
            }
        }

        return $userInitials;
    }

    /**
     * Prepare proper error handling for url attribute
     *
     * @return string
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->info) {
            //return asset($this->info->avatar_url);
            return asset(theme()->getMediaUrlPath().'avatars/blank.png');
        }

        return asset(theme()->getMediaUrlPath().'avatars/blank.png');
    }

    /**
     * User relation to info model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function banks()
    {
        return $this->hasMany(UserBank::class);
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethods()
    {
        return $this->hasMany(UserPaymentMethod::class);
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consumerUnits()
    {
        return $this->hasMany(UserConsumerUnit::class);
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function balance()
    {
        return $this->hasOne(UserBalance::class);
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class)->latest();
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany(UserInvoice::class)->latest();
    }


    public function getBalanceFiat(): string
    {
        if ($this->balance()->exists() !== false) {
            $commitedFiatBalance = $this->getCommitedBalanceForAsset('fiat');

            $userBalance = $this->balance->fiat;
            $resultingBalance = floatval($userBalance) - floatval($commitedFiatBalance);
        }else{
            $resultingBalance = 0;
        }

        return $resultingBalance;
    }

    public function getBalanceEnergy(): string
    {
        if ($this->balance()->exists() !== false){
            $commitedBalance = $this->getCommitedBalanceForAsset('energy');
            $userBalance = $this->balance->energy;
            $resultingBalance = intval($userBalance) - intval($commitedBalance);
        }else{
            $resultingBalance = 0;
        }

        return $resultingBalance;
    }

    public function getBalanceCrypto(): string
    {
        if ($this->balance()->exists() !== false) {
            $commitedBalance = $this->getCommitedBalanceForAsset('crypto');
            $userBalance = $this->balance->crypto;
            $resultingBalance = intval($userBalance) - intval($commitedBalance);
        }else{
            $resultingBalance = 0;
        }

        return $resultingBalance;
    }

    public function getBalanceTotalInFiat(): float
    {
        $balanceFiat = floatval($this->getBalanceFiat());
        $balanceEnergyInFiat = floatval($this->getBalanceEnergy()) / \App\Models\ExchangeRate::EnergyToFiatRateBridge();
        $balanceCryptoInFiat = floatval($this->getBalanceCrypto()) / \App\Models\ExchangeRate::CryptoToFiatRate();

        return $balanceFiat + $balanceEnergyInFiat + $balanceCryptoInFiat;
    }

    public function getCommitedBalanceForAsset(String $asset): string
    {
        $transactions = Transaction::where(function ($query) {
            $query->where('status', 'awaiting-approval')
                ->orWhere('status', 'processing');
            })
            ->where('user_id', auth()->user()->id)->get();

        $commitedBalance = 0;

        foreach ($transactions as $transaction){
            foreach ($transaction->events as $event){
                if ($event->asset === $asset &&
                    $event->movement === 'outgoing' &&
                    ($event-> status === 'locked' || $event-> status === 'awaiting-run')){
                    $commitedBalance = $commitedBalance + $event->value;
                }

            }
        }

        return $commitedBalance;
    }
}
