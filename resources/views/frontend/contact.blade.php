@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="widget widget-user">
            <h3 class="title-wd"><i class="fa fa-envelope-o"></i>
                Contact Us
            </h3>
            <table class="unselectable bounty-announcements-table table-responsive table centered-td">
                <tbody>
                    <tr>
                        <td class="text-center" style="padding: 20px;">
                            <div>
                                <p style="padding-bottom: 20px;">
                                    {{--  Send your message below and someone from the team will get back to you as soon as possible.  --}}
                                </p>
                                <fieldset>
                                    <form class="form-vertical needs-validation" role="form" action="{{ route('frontend.contact.send') }}" method="POST" style="max-width: 600px; margin: 0 auto;">
                                        @csrf
                                        <div class="form-group has-icon @if ($errors->has('name')) has-error @endif">
                                            <i class="fa fa-user"></i>
                                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="form-control @if ($errors->has('name')) is-invalid @endif" required />
                                            @if ($errors->has('name'))
                                                <span class="error error-msg invalid-feedback">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group has-icon @if ($errors->has('email')) has-error @endif">
                                            <i class="fa fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control @if ($errors->has('email')) is-invalid @endif" required />
                                            @if ($errors->has('email'))
                                                <span class="error error-msg invalid-feedback">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('message')) has-error @endif">
                                            <textarea name="message" placeholder="Enter your message..." rows="6" class="form-control @if ($errors->has('message')) is-invalid @endif" required>{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="error error-msg invalid-feedback">{{ $errors->first('message') }}</span>
                                            @endif
                                        </div>
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary btn-md">
                                                Send Message
                                            </button>
                                        </div>
                                    </form>
                                </fieldset>
                                <hr style="margin: 40px 10px 10px 10px;">
                                <div class="emails row" style="padding: 20px; max-width: 600px; margin: 0px auto;">
                                    <div class="col-lg-4 col-md-12" style="padding: 10px;">
                                        <i class="fa fa-2x fa-users" style="color: #666;"></i><br />
                                        <a data-toggle="tooltip" data-placement="bottom" title="Mail Our Support Team" href="mailto: support@bakd.io" style="padding: 10px;">support@bakd.io</a>
                                    </div>
                                    <div class="col-lg-4 col-md-12" style="padding: 10px;">
                                        <i class="fa fa-2x fa-cog" style="color: #666;"></i><br />
                                        <a data-toggle="tooltip" data-placement="bottom" title="Join Our Development Team" href="mailto: developers@bakd.io" style="padding: 10px;">developers@bakd.io</a>
                                    </div>
                                    <div class="col-lg-4 col-md-12" style="padding: 10px;">
                                        <i class="fa fa-2x fa-bar-chart" style="color: #666;"></i><br />
                                        <a data-toggle="tooltip" data-placement="bottom" title="Invest in BAKD" href="mailto: investors@bakd.io" style="padding: 10px;">investors@bakd.io</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
