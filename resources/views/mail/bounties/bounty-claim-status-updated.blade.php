<div style="text-align: center; margin: 0 auto; position: relative; display: block;">
    <a href="{{ route('frontend.home') }}" target="_blank" title="BAKD.me">
        <img src="{{ asset('images/branding/logo-short-2.png') }}" width="200" style="max-width: 200px; width: 100%; height: auto;" />
    </a>
</div>
<br />
<div>
    <p>
        Hi {{ $claim->user->name }}!
    </p>
    <p>
        Your entry into the <strong>BAKD</strong> Bounty, <a href="{{ route('member.bounty.claim.show', $claim->bounty->id) }}" title="View Bounty" target="_blank">{{ $claim->bounty->name }}</a>, has been updated!
    </p>
    <p>
        <strong>Claim Status: </strong>
        <br />
        <span>
            {{ $claim->getStatusLabel($claim->confirmed) }}
        </span>
        <a href="{{ route('member.bounty.claim.edit', $claim->id) }}" title="View or Edit this Bounty Claim" target="_blank">
            (View/Edit Claim)
        </a>
    </p>
    <p>
        <strong>Status Details: </strong>
        <br />
        {{ nl2br($claim->reason) }}
    </p>
    @if ($claim && !is_null($claim->bounty->end_date))
        <p>
            <strong>Bounty Ends: </strong>
            <br />
            {{ $claim->bounty->end_date->diffForHumans() }}
        </p>
    @endif
    <p>
        If your claim was approved, just sit back and wait to collect your BAKD Coins. If your claim was rejected, please make note of the reason why it was rejected, and head back to the <a href="{{ route('member.bounty.home') }}" title="View All of your Bounty Claims" target="_blank"><strong>BAKD</strong> Bounty Board</a> to edit and re-submit your claim.
    </p>
    <p>
        Thanks!
        <br />
        <a href="{{ route('frontend.home') }}" title="BAKD Crowdfunding & Professional Networking" target="_blank">
            BAKD Crowdfunding Team
        </a>
    </p>
    <p style="padding: 20px 0; font-size: 10px; font-style: italic; text-align: center;">
        Bounty Claim ID: {{ $claim->uuid }}
    </p>
</div>
