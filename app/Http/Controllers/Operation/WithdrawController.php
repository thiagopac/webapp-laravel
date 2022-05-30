<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\UserBank;
use Illuminate\Http\Request;
use function auth;
use function view;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //fiat values
        $balanceFiat = auth()->user()->getBalanceFiat()/100;

        //user bank accounts
        $userBanks = \App\Models\UserBank::where('user_id', auth()->user()->id)->get();

        // get the default inner page
        return view('pages.operations.withdraw.withdraw')
            ->with('balanceFiat', $balanceFiat)
            ->with('userBanks', $userBanks);
    }

    public function createTransaction(Request $request)
    {
        $operationInput =  $request['operation-input'];
        $userBank = UserBank::where('uuid', $request['user-bank'])->first();
        $transaction = Transaction::createTransactionOperationWithdrawFiat($operationInput * 100, $userBank);

        if ($transaction){

            $message = [
                'status' => 'success',
                'title' => 'Sucesso',
                'text' => 'Sua solicitação de saque foi enviada com sucesso!'
            ];
        }else{
            $message = [
                'status' => 'danger',
                'title' => 'Erro',
                'text' => 'Parece que seu saldo não é suficiente para efetuar essa transação.'
            ];
        }

        return redirect()->intended('operations/withdraw')->with('message', $message);
    }
}
