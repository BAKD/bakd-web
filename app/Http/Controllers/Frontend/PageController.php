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
        $view['randomBounty'] = \BAKD\Bounty::inRandomOrder()->limit(1)->first();
        $view['newUsers'] = \BAKD\User::orderBy('created_at', 'desc')->limit(5)->get();
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
     * Show the application's contact us static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|max:2000|min:10',
        ]);
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $emailData = [
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'message' => $request->input('message'),
        ];

        \Mail::to(env('SUPPORT_EMAIL', 'tom@bakd.io'))->send(new \BAKD\Mail\ContactUs($emailData));

        \BAKD\Helpers\FrontendHelper::success('Your message was sent successfully!');
        return redirect()->back();
    }


    /**
     * Show the application's bounties static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function bounties()
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d h:i:s');

        $view = [];
        
        // TODO: Move these to bounty model
        $view['active'] = \BAKD\Bounty::where(function ($query) use ($now) {
            $query->whereDate('start_date', '<', $now);
            $query->orWhereNull('start_date');
        })->where(function ($query) use ($now) {
            $query->whereDate('end_date', '>', $now);
            $query->orWhereNull('end_date');
        })->get();

        $view['upcoming'] = \BAKD\Bounty::where(function ($query) use ($now) {
            $query->whereDate('start_date', '>', $now);
            $query->whereNotNull('start_date');
        })->where(function ($query) use ($now) {
            $query->whereDate('end_date', '>', $now);
            $query->orWhereNull('end_date');
        })->get();

        $view['past'] = \BAKD\Bounty::where(function ($query) use ($now) {
            $query->whereDate('end_date', '<', $now);
            $query->whereNotNull('end_date');
        })->get();
        
        $view['all'] = \BAKD\Bounty::all();
        return view('frontend/bounties', $view);
    }


    /**
     * Show the application's public members page.
     *
     * @return \Illuminate\Http\Response
     */
    public function members(Request $request)
    {
        $view = [];

        $view['members'] = \BAKD\User::orderBy('created_at', 'DESC')->paginate(12);

        if ($request->ajax()) {
            return view('frontend/members-results', $view);
        }

        return view('frontend/members', $view);
    }


    /**
     * Show the application's public member profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request, $id)
    {
        $view = [];
        $view['member'] = \BAKD\User::findOrFail($id);
        return view('frontend/profile/index', $view);
    }


    /**
     * Show the application's campaigns static page.
     *
     * @return \Illuminate\Http\Response
     */
    public function campaigns()
    {
        $view = [];
        // $view['campaigns'] = \BAKD\Campaign::all();
        return view('frontend/campaigns', $view);
    }
}
