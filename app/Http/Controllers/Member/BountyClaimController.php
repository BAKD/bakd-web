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
        $bountyId = $request->id;
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
        //     \MemberHelper::error('You already have a claim waiting to be processed!');
        //     return redirect()->route('member.bounty.home');
        // }

        // TODO: File attachments

        $bountyClaim = new \BAKD\BountyClaim;
        $bountyClaim->user_id = $user->id;
        $bountyClaim->bounty_id = $bountyId;
        $bountyClaim->description = $claimDescription;
        $bountyClaim->reason = ''; // Reset just in case this is a re-submission
        $bountyClaim->confirmed_by_id = $user->id;
        $bountyClaim->confirmed = 0; // Pending Status

        if ($bountyClaim->save()) {
            \MemberHelper::success('You successfully submitted a claim for this bounty!');
        } else {
            \MemberHelper::error('Unable to submit a claim for this bounty!');
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
        $view['bounty'] = $view['claim']->bounty;
        return view('member/bounty/claims/edit', $view);
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
        $rejectUpdated = false;
        $claimId = $request->id;
        $claimDescription = $request->input('description');

        // TODO: Validation
        $bountyClaim = \BAKD\BountyClaim::findOrFail($claimId);
        $user = \Auth::user();

        // Check if user trying to edit claim, is the original creator of said claim
        if ($user->id !== $bountyClaim->user_id) {
            \MemberHelper::error('You cannot edit a claim that does not belong to you.');
            return redirect()->route('member.bounty.show', $bountyClaim->bounty->id);
        }

        // Check if this claim was already approved. We don't want to allow people to edit already approved claims.
        if ($bountyClaim->isApproved()) {
            \MemberHelper::error('Your bounty claim was already approved.');
            return redirect()->route('member.bounty.show', $bountyClaim->bounty->id);
        }

        // Set the new model values
        $bountyClaim->description = $claimDescription;
        $bountyClaim->confirmed_by_id = $user->id;
        // If updating a claim that was originally rejected, change it back to 0 to denote
        // a "Pending" status.
        if ($bountyClaim->isRejected()) {
            $rejectUpdated = true;
            $bountyClaim->confirmed = 0;
        }

        // Try to save/update the claim
        if ($bountyClaim->update()) {
            if ($rejectUpdated) {
                \MemberHelper::success('Your bounty claim was successfully updated and changed from Rejected to Pending status.');
            } else {
                \MemberHelper::success('Your bounty claim was successfully updated and is currently Pending.');
            }
        } else {
            \MemberHelper::error('There was an error saving your updated bounty to the database. Please try again or contact an administrator.');
        }

        return redirect()->route('member.bounty.show', $bountyClaim->bounty->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $claim = \BAKD\BountyClaim::findOrFail($id);
        $resourceTitle = $request->query('resource') ?: 'resource';

        if ($claim->user_id !== \Auth::user()->id) {
            \MemberHelper::error('Unable to delete items that do not belong to you. Please contact an administrator if the problem persists and believe it is an error.');
            return redirect()->back();
        }

        // Check if it exists, may have already been deleted, never existed, malicious, etc.
        if (!$claim) {
            \MemberHelper::error('Unable to locate ' . ucwords($resourceTitle) . '.');
            return redirect()->back();
        }

        // Try to delete the resource.
        if ($claim->delete()) {
            \MemberHelper::success('Successfully deleted this ' . ucwords($resourceTitle) . '.');
            return redirect()->back();
        } else {
            \MemberHelper::error('The ' . ucwords($resourceTitle) . ' has already deleted or does not exist.');
            return redirect()->back();
        }
    }
}
