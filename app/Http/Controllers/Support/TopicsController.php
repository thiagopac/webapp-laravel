<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use function auth;
use function view;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $page = "pages/support/topics/_details";
        // get the default inner page
        return view('pages.support.topics.topics', compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function topic()
    {

        $page = "pages/support/topics/_topic";
        // get the default inner page
        return view('pages.support.topics.topics', compact('page'));
    }

}
