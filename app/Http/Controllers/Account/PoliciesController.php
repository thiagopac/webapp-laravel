<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use function view;

class PoliciesController extends Controller
{
    /**
     * Display Payment Methods items
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        // get the default inner page
        return view('pages.account.policies.policies');
    }
}
