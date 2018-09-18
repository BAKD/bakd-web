@extends('layouts.splash')

@section('content')

<div class="sign-in-page">
    <div class="signin-popup">
        <div class="signin-pop">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cmp-info text-center">
                        <div class="cm-logo">
                            <a href="{{ route('frontend.home') }}">
                                <img class="bakd-logo" src="{{ asset('images/branding/logo.jpg') }}" alt="{{ config('bakd.logo.alt', 'BAKD | ICO Management & Networking Platform') }}" title="{{ config('bakd.logo.alt', 'BAKD') }}" />
                            </a>
                            <p>
                                {{ config('bakd.seo.description', 'ICO Management & Networking Platform') }}
                            </p>
                            <p class="text-center" style="font-weight: normal; line-height: 1.75; padding: 10px 0px;">
                                BAKD is a revolutionary new way to fund your next cryptocurrency project. BAKD not only helps entrepreneurs crowdsource the funding needed to build their dream project, but it's also a place where entrepreneurs can connect with mentors.
                            </p>
                        </div>
                        {{--  TODO: Add misc illustrated crowdfund type logo/icon/image here  --}}
                        {{--  <img src="{{ asset('images/cm-main-img.png') }}" alt="" />  --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-sec">
                        <ul class="sign-control">
                            <li data-tab="tab-1" class="current">
                                <a href="#" title="Sign in to your BAKD Account">
                                    {{ __('Sign In') }}
                                </a>
                            </li>
                            <li data-tab="tab-2">
                                <a href="#" title="Register for a free BAKD Account">
                                    {{ __('Register') }}
                                </a>
                            </li>
                        </ul>
                        <div class="sign_in_sec current" id="tab-1">
                            <h3>Sign In</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 no-pdd">
                                        <div class="sn-field">
                                            <input placeholder="Username / Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                            <i class="la la-user"></i>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 no-pdd">
                                        <div class="sn-field">
                                            <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                            <i class="la la-lock"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
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
                                            {{ __('Login') }}
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
                        </div>
                        {{--  END SIGNUP TAB  --}}




                        {{--  REGISTER TAB  --}}
                        <div class="sign_in_sec" id="tab-2">
                            <div class="signup-tab">
                                <i class="fa fa-long-arrow-left"></i>
                                <h2>johndoe@example.com</h2>
                                <ul>
                                    <li data-tab="tab-3" class="current"><a href="#" title="">Investor</a></li>
                                    <li data-tab="tab-4"><a href="#" title="">Project</a></li>
                                </ul>
                            </div>
                            <div class="dff-tab current" id="tab-3">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="text" name="name" placeholder="Full Name">
                                                <i class="la la-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="text" name="country" placeholder="Country">
                                                <i class="la la-globe"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <select>
                                                    <option>Category</option>
                                                </select>
                                                <i class="la la-dropbox"></i>
                                                <span><i class="fa fa-ellipsis-h"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" name="password" placeholder="Password">
                                                <i class="la la-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" name="repeat-password" placeholder="Repeat Password">
                                                <i class="la la-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="checky-sec st2">
                                                <div class="fgt-sec">
                                                    <input type="checkbox" name="cc" id="c2">
                                                    <label for="c2">
                                                        <span></span>
                                                    </label>
                                                    <small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" value="submit">Get Started</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="dff-tab" id="tab-4">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="text" name="company-name" placeholder="Company Name">
                                                <i class="la la-building"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="text" name="country" placeholder="Country">
                                                <i class="la la-globe"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" name="password" placeholder="Password">
                                                <i class="la la-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" name="repeat-password" placeholder="Repeat Password">
                                                <i class="la la-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="checky-sec st2">
                                                <div class="fgt-sec">
                                                    <input type="checkbox" name="cc" id="c3">
                                                    <label for="c3">
                                                        <span></span>
                                                    </label>
                                                    <small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" value="submit">Get Started</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- END REGISTER TAB  --}}






                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
