
<section class="sub-nav-menu forum-sec">
    <div class="container-fluid">
        <div class="mobile-logo">
            <a class="navbar-brand" href="{{ route('frontend.home') }}" alt="BAKD | {{ config('bakd.tagline') }}" title="BAKD | {{ config('bakd.tagline') }}">
                <img class="bakd-logo" src="{{ config('bakd.logo.regular') }}" />
            </a>
        </div>
        <nav class="forum-links main-navbar">
            <ul class="main-links">
                <li class="nav-logo">
                    <a href="{{ route('frontend.home') }}" alt="BAKD | {{ config('bakd.tagline') }}" title="BAKD | {{ config('bakd.tagline') }}">
                        <img src="{{ config('bakd.logo.regular') }}" style="max-width: 120px;" />
                    </a>
                </li>
                {{--  <li class="{{ Route::is('frontend.home') ? 'active' : '' }}">
                    <a href="{{ route('frontend.home') }}">
                        <i class="fa fa-home"></i> Home <span class="badge badge-danger">NEW</span>
                    </a>
                </li>  --}}
                <li class="{{ Request::is('campaigns') || Request::is('campaigns/*') ? 'active' : '' }}">
                    <a href="{{ route('frontend.campaigns') }}">
                        <i class="fa fa-building-o"></i> Projects
                    </a>
                </li>
                <li class="{{ Request::is('members') || Request::is('members/*') ? 'active' : '' }}">
                    <a href="{{ route('frontend.members') }}">
                        <i class="fa fa-users"></i> People
                    </a>
                </li>
                <li class="{{ Request::is('bounties') || Request::is('bounties/*') ? 'active' : '' }}">
                    <a href="{{ route('frontend.bounties') }}">
                        <i class="fa fa-trophy"></i> Bounties <span class="badge badge-success">LIVE</span>
                    </a>
                </li>
                <li class="{{ Request::is('r') || Request::is('r/*') ? 'active' : '' }}">
                    <a href="{{ route('frontend.home') }}">
                        <i class="fa fa-book"></i> Resources
                    </a>
                </li>
                @guest
                <li class="nav-item nav-link pull-right" style="margin-right: 10px;">
                    {{--  <a data-toggle="modal" data-target="#login_modal"><i class="fa fa-user"></i> {{ __('Sign In') }}</a>  --}}
                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> {{ __('Sign In') }}</a>
                </li>
                {{--  <li class="nav-item nav-link pull-right" style="margin-right: 10px;">
                    <a data-toggle="modal" data-target="#login_modal"><i class="fa fa-edit"></i> {{ __('Register') }}</a>
                </li>  --}}
                @else
                <li class="nav-item nav-link dropdown pull-right user-dropdown-wrapper">
                    
                    <a id="navbarDropdown" class="member-dropdown logged-in -toggle btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="https://secure.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?size=32" class="member-avatar"/><i class="fa fa-chevron-down"></i>
                        {{--  <span class="member-name">
                            {{ Auth::user()->name }} <i class="fa fa-chevron-down"></i>
                        </span>  --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @include('/partials/member-dropdown')
                    </div>
                </li>
                @endguest
            </ul>
        </div>
        <div class="forum-links-btn">
            <a href="#" title="View Menu" id="mobile-menu-btn"><i class="fa fa-bars"></i></a>
        </div>
    </nav>
</section>
