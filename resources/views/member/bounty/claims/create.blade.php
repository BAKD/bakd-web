@extends('layouts.member')

@section('content')
<div class="container">
    <div class="widget widget-user">
        <h3 class="title-wd"><i class="fa fa-btc"></i>
            Claim Bounty #{{ $bounty->id }} ({{ $bounty->name }})
        </h3>
        <table class="unselectable bounty-announcements-table table-responsive table centered-td">
            <tbody>
                <tr>
                    <td class="text-center" style="padding: 20px;">
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
                                        <textarea rows="15" placeholder="Enter all information noted in the Bounty Description in order to receive credit for this claim!" id="description" type="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required>
                                            {{ old('description') }}
                                        </textarea>
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
                                    <button type="submit" class="btn btn-primary btn-md">
                                        <i class="fa fa-plus-circle"></i> {{ __('Submit Claim') }}
                                    </button>
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
