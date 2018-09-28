@extends('layouts.member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{--  MAIN BOUNTY INFO  --}}
            <div class="widget widget-user">
                <div class="row">
                    <div class="col-6">
                        <h3 class="title-wd" style="border-bottom: none;"><i class="fa fa-star"></i>
                            <strong>{{ $bounty->type()->first()->name }} Bounty</strong>
                        </h3>
                    </div>
                    <div class="col-6 pull-right text-right">
                        <ul style="padding: 10px 35px 10px 0;">
                            <li title="{{ $bounty->getDisplayRewardAmount() }} {!! strtoupper($bounty->getDisplayRewardType(false)) !!}">
                                <div class="bakd-coins">
                                    REWARD TYPE: {{ $bounty->getDisplayRewardAmount() }} {!! strtoupper($bounty->getDisplayRewardType()) !!}
                                </div>
                            </li>
                        </ul>
                        <div class="ed-opts pull-right" style="float: right; position: absolute; right: 30px; top: 22px;">
                            <a href="#" title="View Options" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                            <ul class="text-left ed-options" style="min-width: 160px; margin: 5px 0 0 0; padding: 5px;">
                                <li style="padding: 11px; margin: 0;">
                                    <i class="fa fa-facebook"></i> <a href="#" title="Share Bounty">Share Bounty</a>
                                </li>
                                <li style="padding: 11px; margin: 0;">
                                    <i class="fa fa-plus"></i> <a href="{{ route('member.bounty.claim', $bounty->id) }}" title="Claim Bounty">Claim Bounty</a>
                                </li>
                                <li style="padding: 0px; margin: -5px 0;">
                                    <hr>
                                </li>
                                <li style="padding: 11px; margin: 0;" class="disabled">
                                    <i class="fa fa-bookmark"></i> <a href="#" class="disabled" title="Coming Soon">Bookmark</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <table class="unselectable bounty-announcements-table table-responsive table centered-td">
                    <tbody>
                        <tr>
                            <td class="text-left" style="padding: 20px;">
                                <div class="row">
                                    <div class="col-lg-3">
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
                                            <div class="inline-list text-left">
                                                <ul class="skill-tags bounty-tags" style="margin: 0 0 -10px 0;">
                                                    <li><a href="{{ route('frontend.home') }}" title="Bounty">Bounty</a></li>
                                                    <li><a href="{{ route('frontend.home') }}" title="{{ $bounty->type()->first()->name }}">{{ $bounty->type()->first()->name }}</a></li>
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
                    <div class="claim-bounty-button text-right">
                        <a href="{{ route('member.bounty.claim', $bounty->id) }}" class="btn btn-primary btn-lg">
                            <i class="fa fa-star"></i> CLAIM BOUNTY
                        </a>
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
                                    <span class="bakd-coins">
                                        {{ number_format($bounty->reward) }}
                                    </span>
                                </td>
                            </tr>
                        @endif

                        @if ($bounty->reward_total)
                            <tr>
                                <td class="text-right">
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
                            <td class="text-right">
                                <strong>REWARD TYPE</strong>
                            </td>
                            <td class="text-center">
                                <span class="bakd-bounty-reward-{!! $bounty->getDisplayRewardType(false) !!}">
                                    {!! $bounty->getDisplayRewardType() !!}
                                </span>
                            </td>
                        </tr>

                        @if ($bounty->type()->first()->name)
                            <tr>
                                <td class="text-right">
                                    <strong>BOUNTY TYPE</strong>
                                </td>
                                <td class="text-center">
                                    {{ $bounty->type()->first()->name }}
                                </td>
                            </tr>
                        @endif

                        @if ($bounty->start_date)
                            <tr>
                                <td class="text-right">
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
                                <td style="min-width: 160px;" class="text-right">
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

            {{-- BOUNTY CLAIM INSTRUCTIONS -- TODO: MAKE DYNAMICALLY EDITABLE VIA ADMIN PANEL --}}
            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-question-circle"></i>
                    {{ __('Claim Instructions') }}
                </h3>
                <table class="unselectable bounty-announcements-table table-responsive table centered-td">
                    <tbody>
                        <tr>
                            <td class="text-left" style="padding: 20px;">
                                <p>
                                    In order to participate in bounties, you must be a registered user of BAKD.me. Once you sign up, you will be able to claim any bounties that you are interested in! Feel free to suggest new bounties, or ways to improve our current bounties.
                                </p>
                                <br />
                                <p>
                                    You can find more information about BAKD bounties on our dedicated thread at BitcoinTalk.org here: <a href="#">https://BitcoinTalk.org/showthread.php?123456.0</a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
