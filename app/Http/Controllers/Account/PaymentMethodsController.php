<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\UserPaymentMethod;
use Illuminate\Http\Request;
use Response;
use View;

class PaymentMethodsController extends Controller
{
    /**
     * Display Payment Methods items
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $paymentMethods = auth()->user()->paymentMethods;

        // get the default inner page
        return view('pages.account.payment.payment', compact('paymentMethods'));
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewObject = new UserPaymentMethod();

        $contents = View::make('partials.modals.payment._main')->with('viewObject', $viewObject);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    //TODO: criar Trait Request para PaymentMethod pois precisarei validar alguns dados do cartão antes de enviar para o gateway
    public function store(Request $request)
    {
        // save on user payment method
        $paymentMethod = new UserPaymentMethod();
        $paymentMethod->user_id = auth()->user()->id;

        foreach ($request->except(['_token', '_method', 'card_number', 'card_cvv']) as $key => $value) {
            if (is_array($value)) {
                $value = serialize($value);
            }
            $paymentMethod->$key = $value;
        }
        //$cvv = $request['card_cvvs']; //only send, never store

        $paymentMethod->iin = substr($request['card_number'] , 0, 6);
        $paymentMethod->last_digits = substr($request['card_number'], strlen($request['card_number'])-4, 4 );
        $paymentMethod->issuer = UserPaymentMethod::getCardIssuer($request['card_number']);

        //here we call external api to pass card data; store only non-sensitive data

        $paymentMethod->save();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Método de pagamento cadastrado com sucesso!'
        ];

        return redirect()->intended('account/payment')->with('message', $message);
    }

    /**
     * Function to config the willdcard delete confirmation modal
     *
     * @param $uuid
     *
     * @return \Illuminate\Http\Response
     */
    public function show(String $uuid)
    {
        $formAction = route('payment.destroy', $uuid);

        $contents = View::make('partials.modals._main-delete')->with('formAction', $formAction);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Function to hard remove User Payment Method registries
     *
     * @param String $uuid
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(String $uuid, Request $request)
    {
        // delete user payment method
        $paymentMethod = UserPaymentMethod::where('user_id', auth()->user()->id)->where('uuid', $uuid)->first();
        $paymentMethod->delete();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Método de pagamento apagado com sucesso!'
        ];

        return redirect()->intended('account/payment')->with('message', $message);
    }

}
