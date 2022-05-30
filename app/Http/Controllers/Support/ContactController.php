<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use function auth;
use function view;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $info = auth()->user()->info;

        // get the default inner page
        return view('pages.support.contact.contact', compact('info'));
    }
}
