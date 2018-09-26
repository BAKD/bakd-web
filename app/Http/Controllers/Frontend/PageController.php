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
        $view = [];

        $view['bounties'] = \BAKD\Bounty::all();

        return view('frontend/index', $view);
    }


    /**
     * Show the application's about us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontend/about');
    }


    /**
     * Show the application's privacy policy static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        return view('frontend/privacy');
    }


    /**
     * Show the application's terms and conditions static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        return view('frontend/terms');
    }


    /**
     * Show the application's contact us static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontend/contact');
    }


    /**
     * Show the application's bounties static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function bounties()
    {
        return view('frontend/bounties');
    }


    /**
     * Show the application's frontend members static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function members()
    {
        return view('frontend/members');
    }


    /**
     * Show the application's campaigns static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function campaigns()
    {
        return view('frontend/campaigns');
    }
}
