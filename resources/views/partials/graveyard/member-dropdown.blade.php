<div class="user-account-settingss">


        <h3>Online Status</h3>


        <ul class="on-off-status">
            <li>
                <div class="fgt-sec">
                    <input type="radio" name="cc" id="c5">
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
                    <small>Away</small>
                </div>
            </li>
            <li>
                <div class="fgt-sec">
                    <input type="radio" name="cc" id="c6">
                    <label for="c6">
                        <span></span>
                    </label>
                    <small>Invisible</small>
                </div>
            </li>
        </ul>

        <h3>Check Wallet</h3>
        <div class="wallet_search_form search_form">
            <form>
                <input type="text" name="wallet_search" placeholder="bkd0x1123kf0dk0231kdfjkjhaeu27">
                <button type="submit"><i class="fa fa-check"></i></button>
            </form>
        </div>

        <ul class="us-links text-center">
            <li><a href="#" title="Change Your Account Type" class="main-dropdown-btn"><i class="fa fa-cog"></i> Edit My Account</a></li>
            <li><a href="#" title="View Your Public Profile" class="main-dropdown-btn"><i class="fa fa-eye"></i> My Public Profile</a></li>
            <li><a href="#" title="View Your Active Project Campaigns" class="main-dropdown-btn"><i class="fa fa-line-chart"></i> My Active Campaigns</a></li>
            <li><a href="#" title="View Your Active BAKD Campaign Investments" class="main-dropdown-btn"><i class="fa fa-bar-chart"></i> My Active Investments</a></li>
            <li><a href="#" title="View Transaction History" class="main-dropdown-btn"><i class="fa fa-file-text"></i> Transaction History</a></li>
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
