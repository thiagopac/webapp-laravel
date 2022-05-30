<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use function view;

class BalanceController extends Controller
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

        $transactions = Transaction::where('user_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('status', 'awaiting-approval')
                    ->orWhere('status', 'processing');
            })
            ->get();

        foreach ($transactions as $transaction){

            foreach ($transaction->events as $event){

                if ($event->asset === 'energy'){
                    $balanceEnergyFlag = true;
                }

                if ($event->asset === 'crypto'){
                    $balanceCryptoFlag = true;
                }

                if ($event->asset === 'fiat'){
                    $balanceFiatFlag = true;
                }

            }
        }

        // get the default inner page
        return view('pages.general.balance.balance')
            ->with('balanceEnergy', $balanceEnergy)
            ->with('balanceCrypto', $balanceCrypto)
            ->with('balanceFiat', $balanceFiat)
            ->with('balanceEnergyFlag', $balanceEnergyFlag)
            ->with('balanceCryptoFlag', $balanceCryptoFlag)
            ->with('balanceFiatFlag', $balanceFiatFlag);
    }
}
