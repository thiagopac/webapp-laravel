<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use function auth;
use function view;

class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //energy values
        $balanceEnergy = auth()->user()->getBalanceEnergy()/100;
        $balanceEnergyFlag = false;

        //crypto values
        $balanceCrypto = auth()->user()->getBalanceCrypto()/100;
        $balanceCryptoFlag = false;

        //fiat values
        $balanceFiat = auth()->user()->getBalanceFiat()/100;
        $balanceFiatFlag = false;

        //transaction registries
        $transactions = $this->listTransactions(0);

        $waitingTransactions = Transaction::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('status', 'awaiting-approval')
                    ->orWhere('status', 'processing');
            })
            ->get();

        $energyIncoming = 0;
        $energyOutgoing = 0;
        $cryptoIncoming = 0;
        $cryptoOutgoing = 0;
        $fiatIncoming = 0;
        $fiatOutgoing = 0;

        foreach ($waitingTransactions as $transaction){

            foreach ($transaction->events as $event){

                if ($event->asset === 'energy'){
                    $balanceEnergyFlag = true;

                    if ($event->movement === 'incoming'){
                        $energyIncoming+= $event->value/100;
                    }else if($event->movement === 'outgoing'){
                        $energyOutgoing+= $event->value/100;
                    }
                }

                if ($event->asset === 'crypto'){
                    $balanceCryptoFlag = true;

                    if ($event->movement === 'incoming'){
                        $cryptoIncoming+= $event->value/100;
                    }else if($event->movement === 'outgoing'){
                        $cryptoOutgoing+= $event->value/100;
                    }
                }

                if ($event->asset === 'fiat'){
                    $balanceFiatFlag = true;

                    if ($event->movement === 'incoming'){
                        $fiatIncoming+= $event->value/100;
                    }else if($event->movement === 'outgoing'){
                        $fiatOutgoing+= $event->value/100;
                    }
                }

            }
        }

        $binance_explorer_url = env("BINANCE_EXPLORER_URL");

        // get the default inner page
        return view('pages.general.statement.statement')
            ->with('balanceEnergy', $balanceEnergy)
            ->with('balanceCrypto', $balanceCrypto)
            ->with('balanceFiat', $balanceFiat)
            ->with('balanceEnergyFlag', $balanceEnergyFlag)
            ->with('balanceCryptoFlag', $balanceCryptoFlag)
            ->with('balanceFiatFlag', $balanceFiatFlag)
            ->with('transactions', $transactions)
            ->with('energyIncoming', $energyIncoming)
            ->with('energyOutgoing', $energyOutgoing)
            ->with('cryptoIncoming', $cryptoIncoming)
            ->with('cryptoOutgoing', $cryptoOutgoing)
            ->with('fiatIncoming', $fiatIncoming)
            ->with('fiatOutgoing', $fiatOutgoing)
            ->with('binance_explorer_url', $binance_explorer_url);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listTransactions(int $page)
    {
        //transaction registries
        $transactions = Transaction::where('user_id', auth()->user()->id)
            ->latest()
            ->skip($page * 10)
            ->take(9999)
            ->get();

        $lastCurrentMonthYear = '';

        foreach ($transactions as $transaction){


            $transaction->type = __($transaction->type);

            $transaction->color = match ($transaction->status) {
                'completed'         => 'success',
                'awaiting-approval' => 'warning',
                'processing'        => 'primary',
                'disapproved'       => 'danger',
                'failed'            => 'danger',
                'ready-to-process'  => 'primary'
            };

            $transaction->icon = match ($transaction->status) {
                'completed'         => 'icons/duotune/arrows/arr016.svg',
                'awaiting-approval' => 'icons/duotune/arrows/arr014.svg',
                'processing'        => 'icons/duotune/arrows/arr028.svg',
                'disapproved'       => 'icons/duotune/arrows/arr015.svg',
                'failed'            => 'icons/duotune/arrows/arr015.svg',
                'ready-to-process'  => 'icons/duotune/arrows/arr027.svg'
            };

            $transaction->status = __($transaction->status);

            $currentMonthYear = $transaction->updated_at->formatLocalized('%B, %Y');
            $transaction->monthBreak = $currentMonthYear != $lastCurrentMonthYear ? true : false;
            $lastCurrentMonthYear = $currentMonthYear;

            foreach($transaction->events as $event){
                $event->event_color = $event->movement === 'incoming' ? 'text-success' : 'text-danger';
                $event->event_symbol = $event->movement === 'incoming' ? '<span class="mx-1 fs-8">+</span>' : '<span class="mx-1 fs-8">-</span>';
                $event->event_description = __($event->movement).' de '.__($event->asset) ;

                $event->event_value = $event->asset === 'fiat' ? 'R$ '.number_format($event->value/100, 2, ',', '.') : number_format($event->value/100).' '.__($event->asset);

                $event->event_marker = "<span class='$event->event_color'>".$event->event_symbol.$event->event_value."</span>";
            }

//            $transaction->last_update = $transaction->updated_at->formatLocalized('%d de %B, %Y - %H:%M');
            $transaction->last_update = $transaction->updated_at->format('d/m/y H:i');
        }

        return $transactions;
    }
}
