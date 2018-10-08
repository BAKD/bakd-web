<div class="user-account-settingss">
    <ul class="us-links text-center">
        <li><a href="{{ route('frontend.home') }}" title="Home" class="main-dropdown-btn"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{ route('frontend.members.profile', auth()->user()->id) }}" title="Member Dashboard" class="main-dropdown-btn"><i class="fa fa-dashboard"></i> Member Dashboard</a></li>
        <li><a href="{{ route('member.bounty.home') }}" title="Bounty Dashboard" class="main-dropdown-btn"><i class="fa fa-dashboard"></i> Bounty Dashboard</a></li>
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
