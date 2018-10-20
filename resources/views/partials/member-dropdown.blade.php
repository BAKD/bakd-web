<div class="user-account-settingss active">
    <h3>Visibility</h3>
    <ul class="on-off-status">
        <li>
            <div class="fgt-sec">
                <input type="radio" name="cc" id="c5" checked>
                <label for="c5">
                    <span></span>
                </label>
                <small>Online</small>
            </div>
        </li>
        <li>
            <div class="fgt-sec">
                <input type="radio" name="cc" id="c6">
                <label for="c6">
                    <span></span>
                </label>
                <small>Offline</small>
            </div>
        </li>
    </ul>
    <h3>Directory Search</h3>
    <div class="search_form">
        <form action="{{ route('frontend.home') }}">
            <input type="text" name="search" placeholder="People & Projects..." required />
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <h3>Members</h3>
    <ul class="us-links">
        <li>
            <a href="{{ route('frontend.home') }}" title="Home">Home</a>
        </li>
        <li>
            <a href="{{ route('member.dashboard.home') }}" title="My Account">My Account</a>
        </li>
        <li>
            <a href="{{ route('frontend.members.profile', auth()->user()->id) }}" title="Public Profile">Public Profile</a>
        </li>
        <li>
            <a href="{{ route('member.bounty.home') }}" title="Bounty Dashboard">Bounty Dashboard</a>
        </li>
    </ul>
    <h3 class="tc">
        <a class="dropdown-item nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </h3>
</div>