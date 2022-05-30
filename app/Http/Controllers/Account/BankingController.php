<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBank;
use Response;
use View;

class BankingController extends Controller
{
    /**
     * Display UserBank items
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $banks = auth()->user()->banks;

        // get the default inner page
        return view('pages.account.banking.banking', compact('banks'));
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @param $uuid
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(String $uuid)
    {
        $viewObject = UserBank::where('uuid',$uuid)->first();

        $contents = View::make('partials.modals.banking._main')->with('viewObject', $viewObject);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    //TODO: criar Trait Request para UserBank pois precisarei validar alguns dados de agência, conta bancária, etc
    public function update(String $uuid, Request $request)
    {
         // save on user bank
        $bank = UserBank::where('user_id', auth()->user()->id)->where('uuid', $uuid)->first();

        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if (is_array($value)) {
                $value = serialize($value);
            }
            $bank->$key = $value;
        }

        $bank->save();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Conta bancária alterada com sucesso!'
        ];

        return redirect()->intended('account/banking')->with('message', $message);
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewObject = new UserBank();

        $contents = View::make('partials.modals.banking._main')->with('viewObject', $viewObject);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    //TODO: criar Trait Request para UserBank pois precisarei validar alguns dados de agência, conta bancária, etc
    public function store(Request $request)
    {
        // save on user bank
        $bank = new UserBank();;
        $bank->user_id = auth()->user()->id;

        foreach ($request->except(['_token', '_method']) as $key => $value) {
            if (is_array($value)) {
                $value = serialize($value);
            }
            $bank->$key = $value;
        }

        $bank->save();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Conta bancária cadastrada com sucesso!'
        ];

        return redirect()->intended('account/banking')->with('message', $message);
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
        $formAction = route('banking.destroy', $uuid);

        $contents = View::make('partials.modals._main-delete')->with('formAction', $formAction);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    /**
     * Function to hard remove User Bank registries
     *
     * @param String $uuid
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(String $uuid, Request $request)
    {
        // delete user bank
        $bank = UserBank::where('user_id', auth()->user()->id)->where('uuid', $uuid)->first();
        $bank->delete();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Conta bancária apagada com sucesso!'
        ];

        return redirect()->intended('account/banking')->with('message', $message);
    }

}
