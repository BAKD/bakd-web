<div id="mobile-menu" class="slideout">
    <div class="mobile-menu-inner">
        <div class="slideout-header">
            <a href="#" alt="Close" title="Close">
                <i class="fa fa-times slideout-close pull-right" alt="Close" title="Close"></i>
            </a>
        </div>
        <div class="slideout-info text-center" style="width: 100%; display: table;">
            @guest
            <img src="{{ asset('/images/branding/icon.png') }}" alt="BAKD" title="BAKD" class="img-responsive avatar" />
            @else
            <a href="{{ route('frontend.members.profile', auth()->user()->id) }}" alt="{{ auth()->user()->name }}" title="{{ auth()->user()->name }}">
                <img src="{{ auth()->user()->getGravatar(175) }}" alt="{{ auth()->user()->name }}" title="{{ auth()->user()->name }}" class="img-responsive avatar" />
            </a>
            @endguest
        </div>
        <div class="slideout-content">
            <ul class="mCustomScrollbar" style="height: 80vh; max-height: 400px; overflow: hidden; background: #fff; z-index: 9; position: relative;">
                <li>
                    <a href="{{ route('frontend.home') }}">
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.campaigns') }}">
                        <i class="fa fa-building"></i> Projects
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.members') }}">
                        <i class="fa fa-users"></i> People
                    </a>
                </li>
                <li>
                    <a href="{{ route('frontend.bounties') }}">
                        <i class="fa fa-trophy"></i> Bounties <span class="badge badge-success">LIVE</span>
                    </a>
                </li>
                @auth
                <li>
                    <a href="{{ route('member.bounty.home') }}">
                        <i class="fa fa-dashboard"></i> Bounty Dashboard
                    </a>
                </li>
                @endauth
                <li>
                    @guest
                    <a href="{{ route('login') }}">
                        <i class="fa fa-user"></i> Sign In
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <i class="fa fa-edit"></i> Register
                    </a>
                    @else
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </li>
            </ul>
        </div>
        <div class="slideout-footer text-center" style="position: absolute; bottom: 0px; padding: 10px; width: 100%;">
            <div class="btn-wrapper" style="margin: 0 auto;">
                <a href="{{ route('frontend.contact') }}" class="btn btn-fluid btn-primary">
                    <i class="fa fa-envelope"></i> Contact Us
                </a>
            </div>
        </div>
    </div>
</div>