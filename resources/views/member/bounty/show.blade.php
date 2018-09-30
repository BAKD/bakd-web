@extends('layouts.member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{--  MAIN BOUNTY INFO  --}}
            <div class="widget widget-user">
                <div class="row">
                    <div class="col-6">
                        <h3 class="title-wd" style="border-bottom: none;"><i class="fa fa-trophy"></i>
                            <strong>{{ $bounty->type->name }} Bounty</strong>
                        </h3>
                    </div>
                    <div class="col-6 pull-right text-right">
                        <ul style="padding: 10px 35px 10px 0;">
                            <li title="{!! $bounty->getDisplayRewardAmount(true) !!} BAKD Coins">
                                <div class="bakd-coins">
                                    @if ($bounty->isStakeRewardBounty())
                                        {!! $bounty->getDisplayRewardAmount(true) !!} COINS
                                    @else
                                        {!! $bounty->getDisplayRewardAmount(true) !!} {!! strtoupper($bounty->getDisplayRewardType()) !!}
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <div class="ed-opts pull-right" style="float: right; position: absolute; right: 30px; top: 22px;">
                            <a href="#" title="View Options" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                            <ul class="text-left ed-options" style="min-width: 160px; margin: 5px 0 0 0; padding: 5px;">
                                <li style="width: 100%; padding: 11px; margin: 0;">
                                    <i class="fa fa-facebook"></i> <a href="#" title="Share Bounty">Share Bounty</a>
                                </li>
                                <li style="width: 100%; padding: 11px; margin: 0;">
                                    <i class="fa fa-plus-circle"></i> <a href="{{ route('member.bounty.claim', $bounty->id) }}" title="Claim Bounty">Claim Bounty</a>
                                </li>
                                <li style="width: 100%; padding: 0px; margin: -5px 0;">
                                    <hr>
                                </li>
                                <li style="padding: 11px; margin: 0;" class="disabled">
                                    <i class="fa fa-bookmark"></i> <a href="#" title="Bookmark Bounty">Bookmark</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <table class="bounty-announcements-table table-responsive table centered-td">
                    <tbody>
                        <tr>
                            <td class="text-left" style="padding: 20px;">
                                <div class="row">
                                    <div class="col-lg-3 unselectable">
                                        <img src="{{ $bounty->getImage() }}" class="bounty-main-image" style="height: unset; width: unset;" />
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="bounty-details">
                                            <h2 class="title">
                                                {{ $bounty->name }}
                                            </h2>
                                            <div>
                                                {!! nl2br($bounty->description) !!}
                                            </div>
                                            {{--  TODO: Replace Me With Real Tag System  --}}
                                            <div class="inline-list text-left unselectable">
                                                <ul class="skill-tags bounty-tags" style="margin: 20px 0 -10px 0;">
                                                    <li><a href="{{ route('frontend.home') }}" title="Bounty">Bounty</a></li>
                                                    <li><a href="{{ route('frontend.home') }}" title="{{ $bounty->type->name }}">{{ $bounty->type->name }}</a></li>
                                                    <li><a href="{{ route('frontend.home') }}" title="BAKD">BAKD</a></li>
                                                    <li><a href="{{ route('frontend.home') }}" title="Startup">Startup</a></li>
                                                    <li><a href="{{ route('frontend.home') }}" title="Crypto">Crypto</a></li>
                                                    <li><a href="{{ route('frontend.home') }}" title="Blockchain">Blockchain</a></li>
                                                </ul>
                                            </div>
                                            {{--  END BOUNTY TAGS  --}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="job-status-bar text-right" style="border-top: 1px solid #eee;">
                    <div class="row">
                        <div class="col-lg-9 col-xs-12 text-left">
                            <div class="claim-info-wrapper" style="font-size: 16px; font-weight: 500; align-items: center; display: inline-flex; height: 100%;">
                                @if ($bounty->isRunning() && $bounty->wasClaimed())
                                    <?php
                                        // TODO: Setup has-through when we rework current bounty db model
                                        $userClaim = $bounty->claims->where('user_id', \Auth::user()->id)->first();
                                    ?>
                                    <div class="text-center">
                                        <i class="fa fa-clock-o"></i> Your last claim from {{ $userClaim->updated_at->diffForHumans() }} is <strong>{{ $userClaim->isApproved() ? 'Approved' : $userClaim->isRejected() ? 'Rejected' : 'Pending' }}</strong>
                                        @if ($userClaim->isApproved())
                                            . Congrats!
                                        @elseif ($userClaim->isRejected())
                                            . You can either <a href="{{ route('member.bounty.claim.edit', $userClaim->id) }}" data-toggle="tooltip" title="View & Edit Your Claim">Fix It</a>, or <a href="{{ route('member.bounty.claim.cancel', $userClaim->id) }}" data-toggle="tooltip" title="Cancel Your Claim">Cancel It</a>.
                                        @endif
                                    </div>
                                @elseif (!$bounty->isStarted())
                                    <span class="badge badge-primary">Not Started</span>
                                @elseif ($bounty->isPaused())
                                    <span class="badge badge-warning">Bounty Paused</span>
                                @elseif ($bounty->isOver())
                                    <span class="badge badge-danger">Bounty Finished</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-12 text-right">
                            <div class="claim-bounty-button text-right">
                                @if ($bounty->isClaimable())
                                    <a href="{{ route('member.bounty.claim', $bounty->id) }}" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i> CLAIM BOUNTY
                                    </a>
                                @else
                                    <a href="{{ route('member.bounty.claim', $bounty->id) }}" class="btn btn-primary btn-md disabled" data-toggle="tooltip" title="Unable to Claim" disabled>
                                        <i class="fa fa-plus-circle"></i> CLAIM BOUNTY
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  BOUNTY DETAILS  --}}
            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-list"></i>
                    {{ __('Bounty Details') }}
                </h3>
                <table class="unselectable bounty-announcements-table table-responsive table centered-td">
                    <tbody style="font-size: 12px; width: 100%;">
                        @if ($bounty->reward)
                            <tr>
                                <td width="20%" class="text-right">
                                    <strong>BOUNTY REWARD</strong>
                                </td>
                                <td class="text-center">
                                    <span class="bakd-coins" title="BAKD Coins">
                                        {{ number_format($bounty->reward) }}
                                    </span>
                                </td>
                            </tr>
                        @endif

                        @if ($bounty->reward_total)
                            <tr>
                                <td width="20%" class="text-right">
                                    <strong>TOTAL REWARD POOL</strong>
                                </td>
                                <td class="text-center">
                                    <span class="bakd-coins">
                                        {{ number_format($bounty->reward_total) }}
                                    </span>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td width="20%" class="text-right">
                                <strong>REWARD TYPE</strong>
                            </td>
                            <td class="text-center">
                                <span class="bakd-bounty-reward-{!! $bounty->getDisplayRewardType(false) !!}">
                                    {!! $bounty->getDisplayRewardType() !!}
                                </span>
                            </td>
                        </tr>

                        @if ($bounty->type->name)
                            <tr>
                                <td width="20%" class="text-right">
                                    <strong>CATEGORY</strong>
                                </td>
                                <td class="text-center">
                                    {{ $bounty->type->name }}
                                </td>
                            </tr>
                        @endif

                        @if ($bounty->start_date)
                            <tr>
                                <td width="20%" class="text-right">
                                    <strong>START DATE</strong>
                                </td>
                                <td class="text-center">
                                    @if (!$bounty->isStarted())
                                        <span class="badge badge-primary">NOT STARTED</span>
                                    @else
                                        {{ $bounty->start_date->diffForHumans() }} @ {{ $bounty->start_date->format('m/d/Y g:i A') }}
                                    @endif
                                </td>
                            </tr>
                        @endif

                        @if ($bounty->end_date)
                            <tr>
                                <td width="20%" style="min-width: 160px;" class="text-right">
                                    <strong>END DATE</strong>
                                </td>
                                <td style="width: 100%; min-width: 250px;" class="text-center">
                                    {!! $bounty->getDisplayEndDate() !!} {{ isset($bounty->end_date) ? '@ ' . $bounty->end_date->format('m/d/Y g:i A') : '' }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- REWARD TYPES --}}
            @include('member.bounty._reward-types')
            {{-- BOUNTY CLAIM INSTRUCTIONS -- TODO: MAKE DYNAMICALLY EDITABLE VIA ADMIN PANEL --}}
            @include('member.bounty._claim-instructions')
        </div>
    </div>
</div>
@endsection
