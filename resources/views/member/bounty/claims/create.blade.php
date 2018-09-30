@extends('layouts.member')

@section('content')
<div class="container">
    <div class="widget widget-user">
        <div class="row">
            <div class="col-6 pull-left text-left">
                <h3 class="title-wd" style="border-bottom: none;"><i class="fa fa-btc"></i>
                    Claim Bounty #{{ $bounty->id }} ({{ $bounty->name }})
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
                    <td class="text-center" style="padding: 20px;">
                        @include('member.bounty._info-alert')
                        <div class="text-left" style="border: 1px solid #aaa; background: #f5f5f5; padding: 30px; margin: 0 0 20px 0;">
                            <h2 class="bounty-claim-description-title">Bounty Description</h2>
                            <blockquote style="border-left: 2px solid #ddd; padding: 10px;">
                                {!! nl2br($bounty->description) !!}
                            </blockquote>
                        </div>
                        <form name="claim" class="claim form" method="POST" action="{{ route('member.bounty.claim.save', $bounty->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 no-pdd">
                                    <div class="sn-field input-group">
                                        <textarea rows="15" placeholder="Enter all information noted in the Bounty Description in order to receive credit for this claim!" id="description" type="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>{{ old('description') }}</textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-12 no-pdd text-right">
                                    <a href="{{ route('member.bounty.show', $bounty->id) }}" class="btn btn-secondary btn-md">
                                        <i class="fa fa-times-circle"></i> {{ __('Cancel') }}
                                    </a>
                                    @if ($bounty->isClaimable())
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-plus-circle"></i> {{ __('Submit Claim') }}
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary btn-md disabled" data-toggle="tooltip" title="Claim Submissions Not Allowed at this Time" disabled>
                                            <i class="fa fa-plus-circle"></i> {{ __('Submit Claim') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- BOUNTY CLAIM INSTRUCTIONS -- TODO: MAKE DYNAMICALLY EDITABLE VIA ADMIN PANEL --}}
    @include('member.bounty._claim-instructions')
</div>
@endsection
