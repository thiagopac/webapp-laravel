<?php

namespace App\Http\Controllers;

use App\Events\ExchangeEventUpdated;
use App\Events\TransactionUpdated;
use App\Models\ExchangeEvent;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class WebhookController extends Controller
{

    protected string $laravel_webhook_signature;

    public function __construct()
    {
        //nao manter uma assinatura estática, mas criar um hmac com chave e compartilhar a chave pra encriptar o conteúdo
        $this->laravel_webhook_signature = env("LARAVEL_WEBHOOK_SIGNATURE");
    }

    public function tx(Request $request)
    {
        if (request()->bearerToken() !== $this->laravel_webhook_signature) return null;

        $request = json_decode(json_encode($request->all()));
        $event_uuid = $request->payload->event;
        $event = ExchangeEvent::where('uuid', $event_uuid)->first();
        $transaction = Transaction::find($event->transaction_id);

        if ($request->status->status === 1){
            $event->status = 'success';
        }else{
            $event->status = 'fail';
            $transaction->status = 'failed';
            $transaction->save();
            TransactionUpdated::dispatch($transaction);
        }

        $event->result = json_encode($request->result);
        $event->save();

        ExchangeEventUpdated::dispatch($event);

        //check and complete if all events were succeeded
        Transaction::checkTransaction($transaction);

        return $event->status;
    }

    public function newWallet (Request $request)
    {
        if (request()->bearerToken() !== $this->laravel_webhook_signature) return null;

        $request = json_decode(json_encode($request->all()));
        $address = $request->result->address;
        $user_uuid = $request->payload->user_uuid;
        $user = User::where('uuid', $user_uuid)->first();
        $user->wallet_address = $address;
        $user->save();

        return 'success';
    }
}
