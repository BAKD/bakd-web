

                                {{--  SIDEBAR LEFT START  --}}

                                <div class="user_profile">
                                        <div class="user-pro-img">
                                            <img src="{{ $member->getGravatar(200) }}" alt="{{ $member->name }}">
                                        </div><!--user-pro-img end-->
                                        <div class="user_pro_status">
                                            <ul class="flw-hr">
                                                <li><a href="#" title="" class="btn btn-primary btn-md"><i class="la la-plus"></i> Follow</a></li>
                                                <li><a href="#" title="" class="btn btn-primary btn-md"><i class="fa fa-envelope-o"></i> Message</a></li>
                                            </ul>
                                            <ul class="flw-status">
                                                <li>
                                                    <span>Following</span>
                                                    <b>{{ $member->getFollowingCount() }}</b>
                                                </li>
                                                <li>
                                                    <span>Followers</span>
                                                    <b>{{ $member->getFollowerCount() }}</b>
                                                </li>
                                            </ul>
                                        </div><!--user_pro_status end-->
                                        <ul class="social_links">
                                            <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                            <li><a href="#" title=""><i class="fa fa-facebook-square"></i>http//www.facebook.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-twitter"></i>http//www.Twitter.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-google-plus-square"></i>http//www.googleplus.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-behance-square"></i>http//www.behance.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-pinterest"></i>http//www.pinterest.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-instagram"></i>http//www.instagram.com/john...</a></li>
                                            <li><a href="#" title=""><i class="fa fa-youtube"></i>http//www.youtube.com/john...</a></li>
                                        </ul>
                                    </div><!--user_profile end-->
    
    
    
    
    
                                    <div class="suggestions full-width">
                                        <div class="sd-title">
                                            <h3>
                                                Popular
                                            </h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div><!--sd-title end-->
                                        <div class="suggestions-list">
                                            <div class="suggestion-usd">
                                                <img src="//via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jessica William</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="//via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>
                                                        Nick Molis
                                                    </h4>
                                                    <span>Blockchain Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="//via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jennifer Brady</h4>
                                                    <span>Legal Advisor</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="//via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>Paul Gates</h4>
                                                    <span>C & C++ Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="//via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>Stephen Gordon</h4>
                                                    <span>Crypto Advisor</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="//via.placeholder.com/35x35" alt="">
                                                <div class="sgt-text">
                                                    <h4>{{ $member->name }}</h4>
                                                    <span>Blockchain Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="view-more">
                                                <a href="{{ route('frontend.members') }}" title="">View More</a>
                                            </div>
                                        </div><!--suggestions-list end-->
                                    </div><!--suggestions end-->
    
    
                                </div><!--main-left-sidebar end-->
                            </div>
                            
                            {{--  SIDEBAR LEFT END  --}}
                            
                            