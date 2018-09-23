<h3>Sign In</h3>
<form method="POST" action="{{ route('login') }}">
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
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="checkbox-label" for="remember">
                        <span></span>
                        <small>Remember Me</small>
                    </label>
                    {{--  <div class="form-check">  --}}
                        {{--  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>  --}}
                    {{--  </div>  --}}
                </div>
                <a href="{{ route('password.request') }}" title="{{ __('Forgot Your Password?') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </div>
        <div class="col-lg-12 no-pdd text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-user"></i> {{ __('Login') }}
            </button>
        </div>
    </div>
</form>
<div class="login-resources">
    <h4>Login via Social Networks</h4>
    <ul>
        <li><a href="#" title="" class="fb"><i class="fa fa-facebook"></i>Login with Facebook</a></li>
        <li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login with Twitter</a></li>
    </ul>
</div>

