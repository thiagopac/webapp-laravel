<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use function auth;
use function view;

class NegotiateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function purchase()
    {
        //crypto values
        $balanceCrypto = auth()->user()->getBalanceCrypto()/100;

        //fiat values
        $balanceFiat = auth()->user()->getBalanceFiat()/100;

        $fiatToCryptoRate = \App\Models\ExchangeRate::FiatToCryptoRate();

        $cryptoMaxBasedOnFiatQty = floor($balanceFiat * $fiatToCryptoRate);

//        dd($cryptoMaxBasedOnFiatQty);

        // get the default inner page
        return view('pages.operations.negotiate.purchase')
            ->with('balanceCrypto', $balanceCrypto)
            ->with('balanceFiat', $balanceFiat)
            ->with('fiatToCryptoRate', $fiatToCryptoRate)
            ->with('cryptoMaxBasedOnFiatQty', $cryptoMaxBasedOnFiatQty);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sale()
    {
        //crypto values
        $balanceCrypto = auth()->user()->getBalanceCrypto()/100;

        //fiat values
        $balanceFiat = auth()->user()->getBalanceFiat()/100;

        $fiatToCryptoRate = \App\Models\ExchangeRate::FiatToCryptoRate();
        $cryptoToFiatRate = \App\Models\ExchangeRate::CryptoToFiatRate();

        $cryptoMax = $balanceCrypto > 0 ? $balanceCrypto : 0;


        // get the default inner page
        return view('pages.operations.negotiate.sale')
            ->with('balanceCrypto', $balanceCrypto)
            ->with('balanceFiat', $balanceFiat)
            ->with('cryptoToFiatRate', $cryptoToFiatRate)
            ->with('cryptoMax', $cryptoMax);
    }

    public function createPurchaseTransaction(Request $request)
    {

        $operationInput =  $request['operation-input'];
        $transaction = Transaction::createTransactionOperationFiatToCrypto($operationInput * 100);

        if ($transaction){

            $message = [
                'status' => 'success',
                'title' => 'Sucesso',
                'text' => 'Sua solicitação para compra de DEC foi enviada com sucesso!'
            ];
        }else{
            $message = [
                'status' => 'danger',
                'title' => 'Erro',
                'text' => 'Parece que seu saldo em REAIS não é suficiente para efetuar essa transação.'
            ];
        }

        return redirect()->intended('operations/negotiate/purchase')->with('message', $message);
    }

    public function createSaleTransaction(Request $request)
    {

        $operationInput =  $request['operation-input'];
        $transaction = Transaction::createTransactionOperationCryptoToFiat($operationInput * 100);

        if ($transaction){

            $message = [
                'status' => 'success',
                'title' => 'Sucesso',
                'text' => 'Sua solicitação para venda de DEC foi enviada com sucesso!'
            ];
        }else{
            $message = [
                'status' => 'danger',
                'title' => 'Erro',
                'text' => 'Parece que seu saldo em DEC não é suficiente para efetuar essa transação.'
            ];
        }

        return redirect()->intended('operations/negotiate/sale')->with('message', $message);
    }
}
