<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use function auth;
use function view;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get the default inner page
        return view('pages.support.faq.faq');
    }

}
