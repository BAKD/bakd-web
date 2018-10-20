@extends('layouts.frontend')

@section('content')
    <div class="container">
        @include('frontend.bounty.active')
        @include('frontend.bounty.upcoming')
        @include('frontend.bounty.past')
        {{--  @include('frontend.bounty.all')  --}}
        {{-- REWARD TYPES --}}
        @include('member.bounty._reward-types')
        {{-- BOUNTY CLAIM INSTRUCTIONS -- TODO: MAKE DYNAMICALLY EDITABLE VIA ADMIN PANEL --}}
        @include('member.bounty._claim-instructions')
    </div>
@endsection
