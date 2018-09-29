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
                        <form name="claim" class="claim form" method="POST" action="{{ route('member.bounty.claim.save', $bounty->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 no-pdd">
                                    <div class="sn-field input-group">
                                        <textarea rows="15" placeholder="Enter all information noted in the Bounty Description in order to receive credit for this claim!" id="description" type="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required></textarea>
                                    </div>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-12 no-pdd text-center">
                                    <button disabled title="Claim Submissions are not yet ready!" type="submit" class="btn btn-primary">
                                        {{ __('Submit Claim') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
