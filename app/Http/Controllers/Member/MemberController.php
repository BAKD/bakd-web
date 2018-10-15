<?php

namespace BAKD\Http\Controllers\Member;

use Illuminate\Http\Request;

class MemberController extends \BAKD\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // All member routes and controllers extending this base controller
        // must be run through the auth middleware
        $this->middleware('auth');
    }

    /**
     * Show the applications member dashboard.
     * This can vary depending on the member role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.dashboard.index');
    }
}
