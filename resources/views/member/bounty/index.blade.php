@extends('layouts.member')

@section('content')
<div class="container">
    @include('member.bounty.partials.bounty-stats')
    @include('member.bounty.partials.approved-claims')
    @include('member.bounty.partials.pending-claims')
    @include('member.bounty.partials.rejected-claims')
    {{--  @include('member.bounty.partials.all-claims')  --}}
        {{-- REWARD TYPES --}}
    @include('member.bounty._reward-types')
    {{-- BOUNTY CLAIM INSTRUCTIONS -- TODO: MAKE DYNAMICALLY EDITABLE VIA ADMIN PANEL --}}
    @include('member.bounty._claim-instructions')

    @include('partials/modals/_delete-modal')
</div>
@endsection
