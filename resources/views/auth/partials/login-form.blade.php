<h3>Sign In</h3>
<form name="login" class="login form" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row">
        <div class="col-lg-12 no-pdd">
            <div class="sn-field">
                <input placeholder="Username / Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                <i class="la la-user"></i>
                @if ($errors->has('email'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-lg-12 no-pdd">
            <div class="sn-field">
                <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                <i class="la la-lock"></i>
            </div>
            @if ($errors->has('password'))
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>
        <div class="col-lg-12 no-pdd">
            <div class="checky-sec">
                <div class="fgt-sec">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="checkbox-label" for="remember">
                        <span></span>
                        <small>{{ __('Remember Me') }}</small>
                    </label>
                </div>
                <a href="{{ route('password.request') }}" title="{{ __('Forgot Your Password?') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </div>
        <div class="col-lg-12 no-pdd text-center">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
        </div>
    </div>
</form>
