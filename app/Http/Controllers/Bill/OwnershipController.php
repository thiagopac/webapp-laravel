<?php

namespace App\Http\Controllers\Bill;

use App\Http\Controllers\Controller;
use App\Models\UserConsumerUnit;
use Illuminate\Http\Request;
use Response;
use View;
use function auth;
use function view;

class OwnershipController extends Controller
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
        return view('pages.bill.ownership.ownership', compact('consumerUnits'));
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
        $viewObject = UserConsumerUnit::where('uuid',$uuid)->first();

        $contents = View::make('partials.modals.consumer-unit._main')->with('viewObject', $viewObject);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    //TODO: criar Trait Request para UserConsumerUnit pois precisarei validar alguns dados de endereço, etc
    public function update(String $uuid, Request $request)
    {
        // save on user bank
        $consumerUnit = UserConsumerUnit::where('user_id', auth()->user()->id)->where('uuid', $uuid)->first();

        foreach ($request->except(['_token', '_method', 'state']) as $key => $value) {
            if (is_array($value)) {
                $value = serialize($value);
            }
            $consumerUnit->$key = $value;
        }

        $consumerUnit->save();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Unidade consumidora alterada com sucesso!'
        ];

        return redirect()->intended('bill/ownership')->with('message', $message);
    }

    /**
     * Function to parse data for modal and deliver full modal body to master-modal
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewObject = new UserConsumerUnit();

        $contents = View::make('partials.modals.consumer-unit._main')->with('viewObject', $viewObject);
        $response = Response::make($contents);
        $response->header('Content-Type', 'text/plain');

        return $response;
    }

    //TODO: criar Trait Request para UserBank pois precisarei validar alguns dados de agência, conta bancária, etc
    public function store(Request $request)
    {
        // save on user bank
        $consumerUnit = new UserConsumerUnit();;
        $consumerUnit->user_id = auth()->user()->id;

        foreach ($request->except(['_token', '_method', 'state']) as $key => $value) {
            if (is_array($value)) {
                $value = serialize($value);
            }
            $consumerUnit->$key = $value;
        }

        $consumerUnit->save();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Unidade consumidora cadastrada com sucesso!'
        ];

        return redirect()->intended('bill/ownership')->with('message', $message);
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
        $formAction = route('ownership.destroy', $uuid);

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
        $consumerUnit = UserConsumerUnit::where('user_id', auth()->user()->id)->where('uuid', $uuid)->first();
        $consumerUnit->delete();

        $message = [
            'status' => 'success',
            'title' => 'Sucesso',
            'text' => 'Unidade consumidora apagada com sucesso!'
        ];

        return redirect()->intended('bill/ownership')->with('message', $message);
    }
}
