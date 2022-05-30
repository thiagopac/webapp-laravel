<?php

namespace App\Models;

use App\Core\Traits\SpatieLogsActivity;
use App\Events\TransactionUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;
    use SpatieLogsActivity;

    /**
     * User balance relation to user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->hasMany(ExchangeEvent::class);
    }

    public static function createTransactionOperationEnergyToCrypto(String $value) : ?Transaction
    {
        $balance = auth()->user()->getBalanceEnergy();

        if ($balance >= $value){

            $transaction = new Transaction();;
            $transaction->user_id = auth()->user()->id;
            $transaction->status = 'awaiting-approval';
            $transaction->type = 'Operation - Energy to Crypto';

            $transaction->save();

            $energyToCryptoRate = \App\Models\ExchangeRate::EnergyToCryptoRate();
            $cryptoQty = $value / $energyToCryptoRate;

            //events
            $energy = ExchangeEvent::createExchangeEvent($transaction, 'outgoing', 'energy', $value, null);
            $crypto = ExchangeEvent::createExchangeEvent($transaction, 'incoming', 'crypto', $cryptoQty, null);


            return $transaction;
        }else{
            return null;
        }
    }

    public static function createTransactionOperationFiatToCrypto(String $value) : ?Transaction
    {
        $balance = auth()->user()->getBalanceFiat();

        if ($balance >= $value){

            $transaction = new Transaction();;
            $transaction->user_id = auth()->user()->id;
            $transaction->status = 'awaiting-approval';
            $transaction->type = 'Operation - Fiat to Crypto';

            $transaction->save();

            $fiatToCryptoRate = \App\Models\ExchangeRate::FiatToCryptoRate();
            $fiatCost = $value / $fiatToCryptoRate;

            //events
            $fiat = ExchangeEvent::createExchangeEvent($transaction, 'outgoing', 'fiat', $fiatCost, null);
            $crypto = ExchangeEvent::createExchangeEvent($transaction, 'incoming', 'crypto', $value, null);

            return $transaction;
        }else{
            return null;
        }
    }

    public static function createTransactionOperationCryptoToFiat(String $value) : ?Transaction
    {
        $balance = auth()->user()->getBalanceCrypto();

        if ($balance >= $value){

            $transaction = new Transaction();;
            $transaction->user_id = auth()->user()->id;
            $transaction->status = 'awaiting-approval';
            $transaction->type = 'Operation - Crypto to Fiat';

            $transaction->save();

            $cryptoToFiatRate = \App\Models\ExchangeRate::CryptoToFiatRate();
            $fiatEarnings = $value / $cryptoToFiatRate;

            //events
            $crypto = ExchangeEvent::createExchangeEvent($transaction, 'outgoing', 'crypto', $value, null);
            $fiat = ExchangeEvent::createExchangeEvent($transaction, 'incoming', 'fiat', $fiatEarnings, null);

            return $transaction;
        }else{
            return null;
        }
    }

    public static function createTransactionOperationWithdrawFiat(String $value, $properties) : ?Transaction
    {
        $balance = auth()->user()->getBalanceFiat();

        if ($balance >= $value){

            $transaction = new Transaction();;
            $transaction->user_id = auth()->user()->id;
            $transaction->status = 'awaiting-approval';
            $transaction->type = 'Operation - Withdraw Fiat';

            $transaction->save();

            //events
            $fiat = ExchangeEvent::createExchangeEvent($transaction, 'outgoing', 'fiat', $value, $properties->toJson());

            return $transaction;
        }else{
            return null;
        }
    }

    public static function createTransactionBillPay(InvoicePayment $invoicePayment) : ?Transaction
    {

        $balanceCryptoUsed = $invoicePayment->balance_crypto_used;
        $complementaryCryptoUsed = $invoicePayment->complementary_crypto_used;

        $balance = auth()->user()->getBalanceCrypto();

        if ($balance >= $balanceCryptoUsed){

            $transaction = new Transaction();;
            $transaction->user_id = auth()->user()->id;
            $transaction->status = 'awaiting-approval';
            $transaction->type = 'Bill - Pay';

            $transaction->save();

            //events
            $ComplementaryCryptoIn = $complementaryCryptoUsed !== 0 ? ExchangeEvent::createExchangeEvent($transaction, 'incoming', 'crypto', $complementaryCryptoUsed, $invoicePayment->toJson()) : 0;
            $balanceCryptoOut = $balanceCryptoUsed !== 0 ? ExchangeEvent::createExchangeEvent($transaction, 'outgoing', 'crypto', $balanceCryptoUsed + $complementaryCryptoUsed, $invoicePayment->toJson()) : 0;

            return $transaction;
        }else{
            return null;
        }
    }

    public static function checkTransaction ($transaction)
    {
        $isComplete = false;

        foreach ($transaction->events as $event){
            $isComplete = $event->status === 'success';
             if ($isComplete === false) {
                 break;
             }
        }

        if ($isComplete === true) self::completeTransaction($transaction);
    }

    public static function completeTransaction (Transaction $transaction)
    {
        $balance = UserBalance::where('user_id', $transaction->user_id)->first();
        $billPayEvent = null;

        foreach ($transaction->events as $event){

            $asset = $event->asset;

            if ($event->movement === 'outgoing')
                $balance->$asset = $balance->$asset - $event->value;
            else if($event->movement === 'incoming')
                $balance->$asset = $balance->$asset + $event->value;

            $billPayEvent = $transaction->type === 'Bill - Pay' ? $event : null;
        }

        $balance->save();
        $transaction->status = 'completed';
        $transaction->save();

        TransactionUpdated::dispatch($transaction);

        if ($billPayEvent !== null){
            $invoicePaymentJson = json_decode($event->properties);
            UserInvoice::paymentDone($invoicePaymentJson->user_invoice_id);
        }

    }

    public static function disapproveTransaction (Transaction $transaction) {

        $transaction->status = 'disapproved';
        $transaction->save();

        foreach ($transaction->events as $event) {

            $event->status = 'canceled';
            $event->save();

            if ($transaction->type === 'Bill - Pay') {
                $invoicePaymentJson = json_decode($event->properties);
                UserInvoice::paymentPending($invoicePaymentJson->user_invoice_id);
            }

        }

        return $transaction;
    }

    public static function readyToProcessTransaction (Transaction $transaction) {

        $transaction->status = 'ready-to-process';
        $transaction->save();

        foreach ($transaction->events as $event) {
            $event->status = 'awaiting-run';
            $event->save();
        }

        return $transaction;
    }

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function  ($model)  {
            $model->uuid = (string) Str::uuid();
        });
    }
}
