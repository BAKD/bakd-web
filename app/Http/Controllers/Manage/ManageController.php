<?php

namespace BAKD\Http\Controllers\Manage;

use Illuminate\Http\Request;

class ManageController extends \BAKD\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Dispatch request to proper superadmin route
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
}
