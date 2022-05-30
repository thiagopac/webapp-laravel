<?php

namespace App\Http\Controllers\Manage;

use App\Core\Services\ServiceAPI;
use App\DataTables\TransactionManagerDataTable;
use App\Http\Controllers\Controller;
use App\Models\ExchangeEvent;
use App\Models\User;
use App\Models\Transaction;
use App\Models\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class TransactionManagerController extends Controller
{

    protected $servicesAPI;

    public function __construct()
    {
        $this->servicesAPI = new ServiceAPI();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransactionManagerDataTable $dataTable)
    {
        return $dataTable->render('pages.manage.transactions.index');
    }

    public function retrieveEvent(String $uuid)
    {

        $event = ExchangeEvent::where('uuid', $uuid)->first();

        return $event->toArray();
    }

    public function control(String $uuid, Request $request)
    {

        //retirar após testes
//        return redirect()->intended('manage/transactions');

        $transaction = Transaction::where('uuid', $uuid)->first();
        $control = $request->control[0];

        if ($control === 'disapprove') {

            Transaction::disapproveTransaction($transaction);

            $message = [
                'status' => 'success',
                'title' => 'Sucesso',
                'text' => 'Transação REPROVADA'
            ];

        }else if($control === 'approve'){

            Transaction::readyToProcessTransaction($transaction);

            $message = [
                'status' => 'success',
                'title' => 'Sucesso',
                'text' => 'Transação pronta para PROCESSAR'
            ];

        }


        return back()->with('message', $message);


//        return redirect()->intended('manage/transactions')->with('message', $message);
    }

    public function triggerEvent(Request $request){

        $requestEvent = json_decode(json_encode($request->all()));
        $event = ExchangeEvent::where('uuid', $requestEvent->uuid)->first();
        $transaction = Transaction::find($event->transaction_id);
        $transactionOwner = User::find($transaction->user_id);
        $vatiosUser = User::find(1);

        $transaction->status = "processing";
        $transaction->save();

        $event->status = 'running';
        $event->save();

        switch ($transaction->type) {
            case 'Operation - Energy to Crypto':
                if ($event->asset === 'energy'){
                    $action = $this->servicesAPI->energyExchange($transactionOwner, $event->value, $event);
                } else if ($event->asset === 'crypto'){
                    $action = $this->servicesAPI->cryptoMint($transactionOwner, $event->value / 100, $event);
                }
                break;
            case 'Operation - Fiat to Crypto':
                if ($event->asset === 'fiat'){
                    $action = $this->servicesAPI->fiatTransfer($transactionOwner, $vatiosUser, $event->value, $event);
                } else if ($event->asset === 'crypto'){
                    $action = $this->servicesAPI->cryptoTransferVatiosToUser($transactionOwner, $event->value / 100, $event);
                }
                break;
            case 'Operation - Crypto to Fiat':
                if ($event->asset === 'crypto'){
                    $action = $this->servicesAPI->cryptoTransferUserToVatios($transactionOwner, $event->value / 100, $event);
                } else if ($event->asset === 'fiat'){
                    $action = $this->servicesAPI->fiatTransfer($vatiosUser, $transactionOwner, $event->value, $event);
                }
                break;
            case 'Operation - Withdraw Fiat':
                if ($event->asset === 'fiat'){
                    $bank_data = UserBank::where('uuid', json_decode($event->properties)->uuid);
                    $action = $this->servicesAPI->fiatWithdraw($transactionOwner, $bank_data, $event->value, $event);
                }
                break;
            case 'Bill - Pay':
                if ($event->asset === 'crypto'){
                    if ($event->movement === 'outgoing'){
                        $action = $this->servicesAPI->cryptoTransferUserToVatios($transactionOwner, $event->value / 100, $event);
                    }else if($event->movement === 'incoming'){
                        $action = $this->servicesAPI->cryptoTransferVatiosToUser($transactionOwner, $event->value/ 100, $event);
                    }
                }
                break;
            default:
                break;
        }

        $event->label = __($event->status);

        return $event->toArray();
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @param $uuid
     *
     * @return \Illuminate\Http\Response
     */
    public function showErrorModal(String $uuid)
    {
        $viewObject = ExchangeEvent::where('uuid',$uuid)->first();
        $binance_explorer_url = env("BINANCE_EXPLORER_URL");

        $contents = View::make('partials.modals.event._main')
            ->with('viewObject', $viewObject)
            ->with('binance_explorer_url', $binance_explorer_url);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(String $uuid)
    {
        $transaction = Transaction::where('uuid', $uuid)->first();

        // get the default inner page
        return view('pages.manage.transactions.view', compact('transaction'));
    }

}
