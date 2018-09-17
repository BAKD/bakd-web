<?php

namespace BAKD\Http\Controllers\Frontend;

use Illuminate\Http\Request;

// Handle any and all misc. static pages for the public frontend facing pages.
class PageController extends FrontendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application's public facing homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/index');
    }
}
