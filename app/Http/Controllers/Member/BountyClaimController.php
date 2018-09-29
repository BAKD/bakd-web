<?php

namespace BAKD\Http\Controllers\Member;

use Illuminate\Http\Request;

class BountyClaimController extends MemberController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $view = [];
        // Get the bounty ID param from the request
        $bountyId = $request->id;
        // Show a 404 if we can't find the bounty from the provided bounty ID
        $view['bounty'] = \BAKD\Bounty::find($bountyId);
        return view('member/bounty/claims/create', $view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bountyId = $request->id;
        $claimDescription = $request->input('description');

        // TODO: Validation
        $bounty = \BAKD\Bounty::findOrFail($bountyId);
        $user = \Auth::user();

        // Check if user already has an approved claim
        // TODO: Do we want to allow multiple claims though? We may want to for stakes bounties...
        // Especially when we upgrade the variable reward system...
        // if (!\BAKD\BountyClaim::where('user_id', $user->id)->where('bounty_id', $bounty->id)->where('confirmed', '1')->get()->isEmpty()) {
        //     MemberHelper::error('You already have a claim waiting to be processed!');
        //     return redirect()->route('member.bounty.home');
        // }

        // TODO: File attachments

        $bountyClaim = new \BAKD\BountyClaim;
        $bountyClaim->user_id = \Auth::user()->id;
        $bountyClaim->bounty_id = $bountyId;
        $bountyClaim->description = $claimDescription;
        $bountyClaim->confirmed_by_id = \Auth::user()->id;
        $bountyClaim->confirmed = 0; // Confirmed by an admin?

        if ($bountyClaim->save()) {
            MemberHelper::success('Successfully submitted a claim for this bounty!');
        } else {
            MemberHelper::error('Unable to submit a claim for this bounty!');
        }

        return redirect()->route('member.bounty.home');
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
        $view['claim'] = \BAKD\BountyClaim::findOrFail($id);
        return view('member/bounty/claims/show', $view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view = [];
        $view['claim'] = \BAKD\BountyClaim::findOrFail($id);
        return view('member/bounty/claims/create', $view);
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
