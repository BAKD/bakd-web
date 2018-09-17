<?php

namespace BAKD\Http\Controllers\Member;

use Illuminate\Http\Request;

// Handle any and all misc. static pages for the member/logged in pages.
class PageController extends MemberController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application's member/logged in pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member/index');
    }
}
