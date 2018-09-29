<div class="post-bar">
    <div class="post_topbar">
        <div class="usy-dst">
            <img src="//via.placeholder.com/120x120" alt="">
            <div class="usy-name">
                <h3>
                    {{ $project->name }}
                </h3>
                <span><img src="images/clock.png" title="{{ \Carbon\Carbon::now()->subWeeks(3)->diffForHumans() }}">3 weeks ago</span>
                <div class="funding-progress-wrapper">
                    <div class="title">
                        {{ $project->funding->reached }} of {{ $project->funding->goal->high }}!
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-animated bg-success progress-bar-striped" style="width: {{ $campaign->progress }};"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
            <ul class="ed-options">
                <li><a href="#" title="">View</a></li>
                <li><a href="#" title="">Bookmark</a></li>
                <li><a href="#" title="">Share</a></li>
                <li><a href="#" title="">Report</a></li>
                <li><a href="#" title="">Hide</a></li>
            </ul>
        </div>
    </div>
    <div class="epi-sec">
        <ul class="descp">
            <li><img src="images/icon8.png" alt=""><span>ERC20 Token</span></li>
            <li><img src="images/icon9.png" alt=""><span>10,000,000 Supply</span></li>
        </ul>
        <ul class="bk-links">
            <li><a href="#" title=""><i class="la la-bookmark active"></i></a></li>
            <li><a href="#" title=""><i class="la la-dollar"></i></a></li>
            <li><a href="#" title="" class="bid_now">View Details</a></li>
        </ul>
    </div>
    <div class="job_descp">
        <h3>
            {{ $project->name }}
        </h3>
        <ul class="job-dt">
            <li>Goal of <span>{{ $project->funding->goal->low }} - {{ $project->funding->goal->high }}</span></li>
        </ul>
        <p>
            {{ $project->description }}
        </p>
        <ul class="skill-tags">
            <li><a href="#" title="">Crypto</a></li>
            <li><a href="#" title="">Ethereum</a></li>
            <li><a href="#" title="">Startup</a></li>
            <li><a href="#" title="">5-10 Employees</a></li>
            <li><a href="#" title="">SaaS</a></li>
            <li><a href="#" title="">DAO</a></li>
        </ul>
    </div>
    <div class="job-status-bar">
        <ul class="like-com">
            <li>
                <a href="#" title="" class="active"><i class="la la-heart"></i> Like</a>
                <img src="images/liked-img.png" alt="">
                <span>115</span>
            </li>
            <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 215</a></li>
        </ul>
        <a><i class="la la-eye"></i>Views 22,357</a>
    </div>
</div>
