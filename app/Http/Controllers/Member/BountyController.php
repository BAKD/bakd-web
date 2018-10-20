<?php

namespace BAKD\Http\Controllers\Member;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BountyController extends MemberController
{
    /**
     * Display the member's bounty dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $view['allClaims'] = \BAKD\BountyClaim::where('user_id', \Auth::user()->id)->orderBy('id', 'DESC')->get();
        $view['approvedClaims'] = \BAKD\BountyClaim::where('user_id', \Auth::user()->id)->where('confirmed', 1)->orderBy('id', 'DESC')->get();
        $view['rejectedClaims'] = \BAKD\BountyClaim::where('user_id', \Auth::user()->id)->where('confirmed', 2)->orderBy('id', 'DESC')->get();
        $view['pendingClaims'] = \BAKD\BountyClaim::where('user_id', \Auth::user()->id)->where('confirmed', 0)->orderBy('id', 'DESC')->get();
        return view('member/bounty/index', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = [];
        $view['bounty'] = \BAKD\Bounty::findOrFail($id);
        $view['myClaims'] = $view['bounty']->claims()->where('user_id', \Auth::user()->id)->get();
        return view('member/bounty/show', $view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
