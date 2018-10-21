<header>
    <div class="container-fluid">
        <div class="header-data">
            <div class="logo">
                <a href="{{ route('frontend.home') }}" title="{{ config('bakd.tagline') }}"><img style="max-width: 90px; width: 100%; height: auto;" src="{{ asset('images/branding/icon.png') }}" alt="{{ config('bakd.tagline') }}"></a>
            </div>
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div>
            <nav class="main-nav-wrapper">
                <ul>
                    <li>
                        <a href="" title="">
                            <span><img src="images/icon1.png" alt=""></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="" title="">
                            <span><img src="images/icon2.png" alt=""></span>
                            Companies
                        </a>
                        <ul>
                            <li><a href="companies.html" title="">Companies</a></li>
                            <li><a href="company-profile.html" title="">Company Profile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="" title="">
                            <span><img src="images/icon3.png" alt=""></span>
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="" title="">
                            <span><img src="images/icon4.png" alt=""></span>
                            Profiles
                        </a>
                        <ul>
                            <li><a href="user-profile.html" title="">User Profile</a></li>
                            <li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="" title="">
                            <span><img src="images/icon5.png" alt=""></span>
                            Jobs
                        </a>
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="images/icon6.png" alt=""></span>
                            Messages
                        </a>
                        <div class="notification-box msg">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/ny-img1.png" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/ny-img2.png" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="messages.html" title="">Jassica William</a></h3>
                                            <p>Lorem ipsum dolor sit amet.</p>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/ny-img3.png" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="messages.html" title="">Jassica William</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="view-all-nots">
                                        <a href="messages.html" title="">View All Messsages</a>
                                    </div>
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="images/icon7.png" alt=""></span>
                            Notification
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/ny-img1.png" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/ny-img2.png" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/ny-img3.png" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="notfication-details">
                                        <div class="noty-user-img">
                                            <img src="images/resources/ny-img2.png" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                            <span>2 min ago</span>
                                        </div><!--notification-info -->
                                    </div>
                                    <div class="view-all-nots">
                                        <a href="#" title="">View All Notification</a>
                                    </div>
                                    <ul class="view-all-nots">
                                        @guest
                                            <li class="nav-item">
                                                <a class="btn btn-secondary" data-toggle="modal" data-target="#login_modal"><i class="fa fa-user"></i> {{ __('Login') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="btn btn-secondary" data-toggle="modal" data-target="#login_modal"><i class="fa fa-edit"></i> {{ __('Register') }}</a>
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
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>