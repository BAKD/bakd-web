@extends('layouts.member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="post-bar">
                <div class="epi-sec" style="padding: 20px 20px 0 20px; border-bottom: 1px solid #eee;">
                    <ul class="descp">
                        <li>
                            <i class="la la-star"></i> <strong>Bounty Dashboard</strong>
                        </li>
                    </ul>
                    <ul class="bk-links" style="padding-bottom: 15px; padding-right: 32px;" class="pull-right">
                        <li>
                            Test 123
                        </li>
                    </ul>
                    <div class="ed-opts pull-right" style="float: right; position: absolute; right: 20px; top: 15px;">
                        <a href="#" title="View Options" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options" style="min-width: 160px;">
                            <li>
                                <i class="fa fa-facebook"></i> <a href="#" title="Share Bounty">Share Bounty</a>
                            </li>
                            <li>
                                <i class="fa fa-plus"></i> <a href="#" title="Claim Bounty">Claim Bounty</a>
                            </li>
                            <li style="padding: 0; margin: -10px 0 0 0;"><hr></li>
                            <li class="disabled">
                                <i class="fa fa-bookmark"></i> <a href="#" class="disabled" title="Coming Soon">Bookmark</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="post_topbar">
                    <div class="usy-dst row">
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-9">




                            <div class="bounty-details">
                                <h2 class="title">
                                    Description 123
                                </h2>
                                <div>
                                    Test 123
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="job-status-bar text-right" style="border-top: 1px solid #eee;">
                    <div class="claim-bounty-button text-right">
                        <a href="#" type="button" class="btn btn-primary btn-large">
                            <i class="fa fa-star"></i> CLAIM BOUNTY
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
