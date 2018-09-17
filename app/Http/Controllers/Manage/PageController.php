<?php

namespace BAKD\Http\Controllers\Manage;

use Illuminate\Http\Request;

// Handle any and all misc. static pages for the admin facing pages.
class PageController extends ManageController
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
     * Show the application's admin facing homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage/index');
    }
}
