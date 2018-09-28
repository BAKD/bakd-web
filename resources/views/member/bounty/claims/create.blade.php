@extends('layouts.member')

@section('content')
<section class="main-content">

        <div class="container">

            <div class="widget widget-user">
                <h3 class="title-wd"><i class="fa fa-btc"></i>
                    Claim Bounty #{{ $bounty->id }} ({{ $bounty->name }})
                </h3>


            </div>
        </div>
    </section>
@endsection
