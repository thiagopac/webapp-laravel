<?php

namespace App\Models;

use App\Core\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserInvoice extends Model
{
    use HasFactory;
    use SpatieLogsActivity;

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consumerUnit()
    {
        return $this->belongsTo(UserConsumerUnit::class, 'user_consumer_unit_id');
    }

    /**
     * relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoicePayments()
    {
        return $this->hasMany(InvoicePayment::class, 'user_invoice_id')->latest();
    }

    public static function paymentPending(int $userInvoiceId): UserInvoice
    {
        $userInvoice = UserInvoice::find($userInvoiceId);

        $userInvoice->payment = 'payment-pending';
        $userInvoice->save();

        return $userInvoice;
    }

    public static function paymentProcess(int $userInvoiceId): UserInvoice
    {
        $userInvoice = UserInvoice::find($userInvoiceId);
        $userInvoice->payment = 'payment-processing';
        $userInvoice->save();

        return $userInvoice;
    }

    public static function paymentDone(int $userInvoiceId): UserInvoice
    {
        $userInvoice = UserInvoice::find($userInvoiceId);
        $userInvoice->payment = 'payment-done';
        $userInvoice->save();

        return $userInvoice;
    }

    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->uuid = (string) Str::uuid();
        });
    }
}
