<h3>Register</h3>
<div class="dff-tab current" id="tab-4">
    <form name="register" class="register form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input id="name" placeholder="Full Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    <i class="la la-user"></i>
                </div>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input id="email" placeholder="Email Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    <i class="la la-envelope"></i>
                </div>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <i class="la la-lock"></i>
                </div>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-lg-12 no-pdd">
                <div class="sn-field">
                    <input id="password-confirm" placeholder="Password" type="password" class="form-control" name="password_confirmation" required>
                    <i class="la la-lock"></i>
                </div>
            </div>
            <div class="col-lg-12 no-pdd text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
