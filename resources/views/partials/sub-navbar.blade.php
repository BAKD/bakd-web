
<section class="sub-nav-menu forum-sec">
    <div class="container">
        <div class="mobile-logo">
            <a class="navbar-brand" href="{{ route('frontend.home') }}">
                <img class="bakd-logo" src="{{ config('bakd.logo.regular') }}" />
            </a>
        </div>
        <div class="forum-links">
            <ul>
                <li class="{{ Route::is('frontend.home') ? 'active' : '' }}">
                    <a href="{{ route('frontend.home') }}">
                        <i class="fa fa-home"></i> Home
                    </a>
                </li>
                <li class="{{ Request::is('campaigns') || Request::is('campaigns/*') ? 'active' : '' }}">
                    <a href="{{ route('frontend.campaigns') }}">
                        <i class="fa fa-building-o"></i> Campaigns
                    </a>
                </li>
                <li class="{{ Request::is('members') || Request::is('members/*') ? 'active' : '' }}">
                    <a href="{{ route('frontend.members') }}">
                        <i class="fa fa-users"></i> Members <span class="badge badge-danger">NEW</span>
                    </a>
                </li>
                <li class="{{ Request::is('bounties') || Request::is('bounties/*') ? 'active' : '' }}">
                    <a href="{{ route('frontend.bounties') }}">
                        <i class="fa fa-trophy"></i> Bounties <span class="badge badge-success">LIVE</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="forum-links-btn">
            <a href="#" title=""><i class="fa fa-bars"></i></a>
        </div>
    </div>
</section>
