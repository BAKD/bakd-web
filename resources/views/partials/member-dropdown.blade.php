<div class="user-account-settingss">
    <ul class="us-links text-center">
        <li><a href="{{ route('frontend.home') }}" title="Home" class="main-dropdown-btn"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('member.home') }}" title="My Account" class="main-dropdown-btn"><i class="fa fa-dashboard"></i> My Account</a></li>
        <li><a href="{{ route('member.claims.all') }}" title="My Bounties" class="main-dropdown-btn"><i class="fa fa-dashboard"></i> My Bounties</a></li>
    </ul>
    <ul class="us-links" style="padding: 6px; font-weight: 700 !important;">
        <li class="text-center">
            <a class="dropdown-item nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
