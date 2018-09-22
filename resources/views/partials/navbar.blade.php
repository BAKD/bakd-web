<header>
    <div class="container">
        <div class="header-data navbar-bakd navbar navbar-expand-md">
            <div class="bakd-logo pd-btm">
                <a class="navbar-brand" href="{{ route('frontend.home') }}">
                    <img class="bakd-logo" src="{{ config('bakd.logo.regular') }}" />
                </a>
            </div>
            <div class="forum-bar user-types-nav">
                <ul>
                    {{--  <li>
                        <a href="#" title="Continue as Investor">Investors</a>
                    </li>
                    <li>
                        <a href="#" title="Continue as Project">Projects</a>
                    </li>  --}}
                    <li data-toggle="tooltip"  data-title="Campaigns Are Absolutely Free to Run & Participate In!">
                        <a href="#" class="ask-question btn-campaign-cta">{{  __('Start Campaign') }}</a>
                    </li>
                </ul>
            </div>
            <div class="login_register">
                <ul class="navbar-nav ml-auto pull-right auth-links-wrapper">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="{{ route('login') }}"><i class="fa fa-user"></i> {{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="{{ route('register') }}"><i class="fa fa-edit"></i> {{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown nav-link dropdown pull-right">

                            <a id="navbarDropdown" class="member-dropdown logged-in -toggle btn btn-secondary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="https://secure.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?size=32" class="member-avatar"/>
                                <span class="member-name">
                                    {{ Auth::user()->name }} <i class="fa fa-chevron-down"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @include('/partials/member-dropdown')
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>
