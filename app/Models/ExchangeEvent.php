<?php

namespace App\Models;

use App\Events\ExchangeEventUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExchangeEvent extends Model
{
    use HasFactory;

    /**
     * User balance relation to user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public static function createExchangeEvent(Transaction $transaction, String $movement, String $asset, String $value, $properties) : ?ExchangeEvent
    {
        $event = new ExchangeEvent();
        $event->transaction_id = $transaction->id;
        $event->movement = $movement;
        $event->asset = $asset;
        $event->value = $value;
        $event->status = 'locked';
        $event->properties = $properties;
        $event->save();

//        //CRIANDO NOTIFICAÇÃO
//        ExchangeEventUpdated::dispatch($event);

        return $event;
    }

    protected $guarded = ['id'];

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
