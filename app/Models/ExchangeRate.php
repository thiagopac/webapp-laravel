<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExchangeRate extends Model
{
    use HasFactory;

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

    public static function EnergyToCryptoRate(): float
    {
        return ExchangeRate::where('source', 'energy')
            ->where('target', 'crypto')
            ->first()->rate;
    }

    public static function CryptoToEnergyRate(): float
    {
        return ExchangeRate::where('source', 'crypto')
            ->where('target', 'energy')
            ->first()->rate;
    }

    public static function CryptoToFiatRate(): float
    {
        return ExchangeRate::where('source', 'crypto')
            ->where('target', 'fiat')
            ->first()->rate;
    }

    public static function FiatToCryptoRate(): float
    {
        return ExchangeRate::where('source', 'fiat')
            ->where('target', 'crypto')
            ->first()->rate;
    }

    public static function EnergyToFiatRateBridge(): float
    {
        $energyToCrypto = ExchangeRate::where('source', 'energy')
            ->where('target', 'crypto')
            ->first()->rate;

        $cryptoToFiat = ExchangeRate::where('source', 'crypto')
            ->where('target', 'fiat')
            ->first()->rate;

        return $energyToCrypto * $cryptoToFiat;
    }
}
