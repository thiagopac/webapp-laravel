<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use function auth;
use function view;

class ConvertController extends Controller
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
        $energyToCryptoRate = \App\Models\ExchangeRate::EnergyToCryptoRate();

        // get the default inner page
        return view('pages.operations.convert.convert')
            ->with('balanceEnergy', $balanceEnergy)
            ->with('energyToCryptoRate', $energyToCryptoRate);
    }

    public function createTransaction(Request $request): \Illuminate\Http\RedirectResponse
    {

        $operationInput =  $request['operation-input'];
        $transaction = Transaction::createTransactionOperationEnergyToCrypto($operationInput * 100);

        if ($transaction){

            $message = [
                'status' => 'success',
                'title' => 'Sucesso',
                'text' => 'Sua solicitação para conversão de saldo de energia foi enviada com sucesso!'
            ];
        }else{
            $message = [
                'status' => 'danger',
                'title' => 'Erro',
                'text' => 'Parece que seu saldo de energia não é suficiente para efetuar essa transação.'
            ];
        }

        return redirect()->intended('operations/convert')->with('message', $message);
    }

}
