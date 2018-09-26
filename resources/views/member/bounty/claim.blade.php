@extends('layouts.member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">






                <div class="post-bar">
                        <div class="epi-sec" style="padding: 20px 20px 0 20px; border-bottom: 1px solid #eee;">
                            <ul class="descp">
                                <li><img src="images/icon8.png" alt=""><span>ERC20 Token</span></li>
                                <li><img src="images/icon9.png" alt=""><span>10,000,000 Supply</span></li>
                            </ul>
                            <ul class="bk-links" style="padding-bottom: 15px; padding-right: 32px;" class="pull-right">
                                <li><a href="#" title=""><i class="la la-star" style="width: 80px; background: orange; font-weight: 700;">4.7</i></a></li>
                                <li><a href="#" title=""><i class="la la-dollar"></i></a></li>
                                <li><a href="#" title=""><i class="la la-heart"></i></a></li>
                                <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                            </ul>
                            <div class="ed-opts pull-right" style="float: right; position: absolute; right: 20px; top: 20px;">
                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                <ul class="ed-options">
                                    <li><a href="#" title="">View</a></li>
                                    <li><a href="#" title="">Bookmark</a></li>
                                    <li><a href="#" title="">Share</a></li>
                                    <li><a href="#" title="">Report</a></li>
                                    <li><a href="#" title="">Hide</a></li>
                                </ul>
                            </div>
                        </div>






                        <div class="post_topbar">
                            <div class="usy-dst row">
                                <div class="col-lg-3">
                                    <img src="{{ asset('/storage/' . $bounty->image) }}" class="bounty-main-image" />
                                </div>
                                <div class="col-lg-9">
                                    <div class="bounty-details">
                                        <h2 style="font-size: 32px; font-weight: 700; margin: 0px 0px 10px 0px;">
                                            {{ $bounty->name }}
                                        </h2>
                                        <p>
                                            {{ $bounty->description }}
                                        </p>


                                    </div>
                                </div>
                            </div>
                        </div>



                        {{--  START FOOTER  --}}
                        <div class="job-status-bar text-right" style="border-top: 1px solid #eee;">
                            {{--  <ul class="like-com">
                                <li>
                                    <a href="#" title="" class="active"><i class="la la-heart"></i> Like</a>
                                    <img src="images/liked-img.png" alt="">
                                    <span>115</span>
                                </li>
                                <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 215</a></li>
                            </ul>  --}}


                            <ul class="skill-tags" style="margin: 0 0 -10px 0;">
                                <li><a href="{{ route('frontend.home') }}" title="Bounty">Bounty</a></li>
                                <li><a href="{{ route('frontend.home') }}" title="{{ $bounty->type()->first()->name }}">{{ $bounty->type()->first()->name }}</a></li>
                                <li><a href="{{ route('frontend.home') }}" title="BAKD">BAKD</a></li>
                                <li><a href="{{ route('frontend.home') }}" title="Startup">Startup</a></li>
                                <li><a href="{{ route('frontend.home') }}" title="Crypto">Crypto</a></li>
                                <li><a href="{{ route('frontend.home') }}" title="Blockchain">Blockchain</a></li>
                            </ul>

                        </div>
                        {{--  END FOOTER  --}}



                    </div>












            <div class="card">
                <div class="card-header">{{ __('Claim Help') }}</div>
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
