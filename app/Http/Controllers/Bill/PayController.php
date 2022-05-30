<?php

namespace App\Http\Controllers\Bill;

use App\Http\Controllers\Controller;
use App\Models\InvoicePayment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\UserInvoice;
use function auth;
use function view;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $consumerUnits = auth()->user()->consumerUnits;

        // get the default inner page
        return view('pages.bill.pay.pay-wizard')
            ->with('consumerUnits', $consumerUnits);
    }

    public function invoicePay(Request $request)
    {
        $invoiceUuid =  $request['invoice-uuid'];
        $invoice = UserInvoice::where('uuid', $invoiceUuid)->first();

        $invoicePayment = InvoicePayment::where('user_invoice_id', $invoice->id)
            ->where(function($query){
                $query->where('status', '=', 'payment-pending')
                    ->orWhere('status', '=', 'payment-received');
            })->first();

        if (!$invoicePayment){

            $invoicePayment = new InvoicePayment();
            $invoicePayment->invoice()->associate($invoice);
            $invoicePayment->balance_crypto_used = $request['invoice-balance-crypto'];
            $invoicePayment->complementary_crypto_used = $request['invoice-complementary-crypto'];
            $invoicePayment->total_payable = $request['invoice-total-payable'];
            $invoicePayment->method = $request['invoice-payment-method'];
            $invoicePayment->status = 'payment-pending';

            $invoicePayment->save();
        }

        return view('pages.bill.pay.method')->with('invoicePayment', $invoicePayment);
    }

    public function manually(String $uuid)
    {
        $invoicePayment = InvoicePayment::where('uuid', $uuid)->first();
        $invoicePayment->status = 'payment-received';
        $invoicePayment->save();

        UserInvoice::paymentProcess($invoicePayment->user_invoice_id);

        $this->createPayBillTransaction($uuid);

        return 'Pagamento recebido com sucesso';
    }

    public function createPayBillTransaction(String $uuid)
    {

        $invoicePayment = InvoicePayment::where('uuid', $uuid)->first();

        if ($invoicePayment->status === 'payment-received'){
            $transaction = Transaction::createTransactionBillPay($invoicePayment);
        }else{
            $message = [
                'status' => 'danger',
                'title' => 'Erro',
                'text' => 'O pagamento desta fatura não foi detectado. Se você já efetuou o pagamento, aguarde até 48 horas para que possamos detectá-lo.'
            ];

            return redirect()->intended('wallet.index')->with('message', $message);
        }

        if ($transaction){

            $message = [
                'status' => 'success',
                'title' => 'Sucesso',
                'text' => 'Sua solicitação de pagamento de fatura foi enviada com sucesso!'
            ];
        }else{
            $message = [
                'status' => 'danger',
                'title' => 'Erro',
                'text' => 'Parece que seu saldo não é suficiente para efetuar essa transação.'
            ];
        }

        return redirect()->intended('wallet.index')->with('message', $message);
    }

    public function detect(String $uuid)
    {
        return InvoicePayment::where('uuid', $uuid)->first();
    }
}
