@extends('layouts.member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="post-bar">
                <div class="epi-sec" style="padding: 20px 20px 0 20px; border-bottom: 1px solid #eee;">
                    <ul class="descp">
                        <li>
                            <i class="la la-star"></i> <strong>{{ $bounty->type()->first()->name }} Bounty</strong>
                        </li>
                    </ul>
                    <ul class="bk-links" style="padding-bottom: 15px; padding-right: 32px;" class="pull-right">

                        <li title="{{ number_format($bounty->reward) }} BAKD Coins">
                            <div class="bakd-coins">
                                REWARD: {{ number_format($bounty->reward) }}
                            </div>
                        </li>
                    </ul>
                    <div class="ed-opts pull-right" style="float: right; position: absolute; right: 20px; top: 15px;">
                        <a href="#" title="View Options" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options" style="min-width: 160px;">
                            <li>
                                <i class="fa fa-facebook"></i> <a href="#" title="Share Bounty">Share Bounty</a>
                            </li>
                            <li>
                                <i class="fa fa-plus"></i> <a href="{{ route('member.bounty.claim', $bounty->id) }}" title="Claim Bounty">Claim Bounty</a>
                            </li>
                            <li style="padding: 0; margin: -10px 0 0 0;"><hr></li>
                            <li class="disabled">
                                <i class="fa fa-bookmark"></i> <a href="#" class="disabled" title="Coming Soon">Bookmark</a>
                            </li>
                        </ul>
                    </div>
                </div>


                {{--  "id" => 2
                "uuid" => "059540c0-c1b7-11e8-8880-7b33c77af08b"
                "type_id" => 2
                "name" => "Boost our Telegram Users!"
                "description" => "<div>Get users to join our Telegram Channel, and prove it by uploading to the claim form!</div>"
                "reward" => 10.0
                "reward_total" => 3000.0
                "image" => "sBEG3gOHsxLI4oMpZ0dCVmL9RRA3mcLC9evFhDUT.png"
                "start_date" => "2018-09-08 16:00:00"
                "end_date" => "2018-12-31 05:00:00"
                "created_at" => "2018-09-26 18:07:25"
                "updated_at" => "2018-09-26 18:25:54"
                "deleted_at" => null  --}}
                <div class="post_topbar">
                    <div class="usy-dst row">
                        <div class="col-lg-3">
                            <img src="{{ $bounty->getImage() }}" class="bounty-main-image" />
                        </div>
                        <div class="col-lg-9">
                            <div class="bounty-details">
                                <h2 class="title">
                                    {{ e($bounty->name) }}
                                </h2>
                                <div>
                                    {!! nl2br($bounty->description) !!}
                                </div>
                            </div>
                            <br /><br />
                            <div class="detail-bar text-left">
                                <ul class="skill-tags inline" style="margin: 0 0 -10px 0;">
                                    <li><a href="{{ route('frontend.home') }}" title="Bounty">Bounty</a></li>
                                    <li><a href="{{ route('frontend.home') }}" title="{{ $bounty->type()->first()->name }}">{{ $bounty->type()->first()->name }}</a></li>
                                    <li><a href="{{ route('frontend.home') }}" title="BAKD">BAKD</a></li>
                                    <li><a href="{{ route('frontend.home') }}" title="Startup">Startup</a></li>
                                    <li><a href="{{ route('frontend.home') }}" title="Crypto">Crypto</a></li>
                                    <li><a href="{{ route('frontend.home') }}" title="Blockchain">Blockchain</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="job-status-bar text-right" style="border-top: 1px solid #eee;">
                    <div class="claim-bounty-button text-right">
                        <a href="{{ route('member.bounty.claim', $bounty->id) }}" type="button" class="btn btn-primary btn-large">
                            <i class="fa fa-star"></i> CLAIM BOUNTY
                        </a>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header"><i class="fa fa-list"></i> {{ __('Bounty Details') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-responsive bounty-details-table" style="margin: 0 auto;">
                        {{--  <thead>
                            <tr>
                                <th class="text-center" style="padding: 5px; font-weight: 700; background-color: #aaa; color: #fff;" colspan="2">
                                    <i class="fa fa-list"></i> DETAILS
                                </th>
                            </tr>
                        </thead>  --}}
                        <tbody style="font-size: 12px;">

                            @if ($bounty->reward)
                                <tr>
                                    <td widthstyle="width: auto; max-width: 280px;" class="text-right">
                                        <strong>REWARD</strong>
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
                                        <strong>TOTAL REWARDS</strong>
                                    </td>
                                    <td class="text-center">
                                        <span class="bakd-coins">
                                            {{ number_format($bounty->reward_total) }}
                                        </span>
                                    </td>
                                </tr>
                            @endif

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
                                            {{ $bounty->start_date->format('m/d/Y g:i A') }} - {{ $bounty->start_date->diffForHumans() }}
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
                                        @if ($bounty->isOver())
                                            <span class="badge badge-danger">ENDED</span>
                                        @else
                                            {{ $bounty->end_date->format('m/d/Y g:i A') }} - {{ $bounty->end_date->diffForHumans() }}
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card">
                <div class="card-header"><i class="fa fa-question"></i> {{ __('Bounty Help') }}</div>
                <div class="card-body">
                    <p>
                        In order to participate in bounties, you must be a registered user of BAKD.me. Once you sign up, you will be able to claim any bounties that you are interested in! Feel free to suggest new bounties, or ways to improve our current bounties.
                    </p>
                    <br />
                    <p>
                        You can find more information about BAKD bounties on our dedicated thread at BitcoinTalk.org here: <a href="#">https://BitcoinTalk.org/showthread.php?123456.0</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
