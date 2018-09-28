@extends('layouts.member')

@section('content')
<section class="main-content">

        <div class="container">

            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-star"></i>
                    Claim Bounty {{ $bounty->id }}
                </h3>

                <label>
                    Required Claim Information:
                </label>

                <textarea placeholder="Enter the bounty claim information for this bounty.">

                </textarea>

            </div>
        </div>
    </section>
@endsection
