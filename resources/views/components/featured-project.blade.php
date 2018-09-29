<div class="post-bar">
    <div class="epi-sec" style="padding: 20px 20px 0 20px; border-bottom: 1px solid #eee;">
        <ul class="descp">
            <li><img src="images/icon8.png" alt=""><span>ERC20 Token</span></li>
            <li><img src="images/icon9.png" alt=""><span>10,000,000 Supply</span></li>
        </ul>
        <ul class="bk-links" style="padding-bottom: 15px; padding-right: 32px;" class="pull-right">
            <li><a href="#" title=""><i class="la la-star" style="width: 80px; background: orange; font-weight: 700;">4.7</i></a></li>
            <li><a href="#" title=""><i class="la la-dollar"></i></a></li>
            <li><a href="#" title=""><i class="la la-heart"></i></a></li>
            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
        </ul>
        <div class="ed-opts pull-right" style="float: right; position: absolute; right: 20px; top: 20px;">
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
    <div class="post_topbar">
        <div class="usy-dst row">
            <div class="col-lg-3">
                <img src="//via.placeholder.com/250x250" alt="{{ $project->name }}">
            </div>
            <div class="col-lg-9">
                <div class="project-details">
                    <h2 style="font-size: 32px; font-weight: 700; margin: 0px 0px 10px 0px;">
                        {{ $project->name }}
                    </h2>
                    <ul class="job-dt">
                        <li>Goal of <span>{{ $project->funding->goal->low }} - {{ $project->funding->goal->high }}</span></li>
                    </ul>
                    <p>
                        {{ $project->description }}
                    </p>
                    <ul class="skill-tags" style="margin: 12px 0;">
                        <li><a href="#" title="">Crypto</a></li>
                        <li><a href="#" title="">Ethereum</a></li>
                        <li><a href="#" title="">Startup</a></li>
                        <li><a href="#" title="">5-10 Employees</a></li>
                        <li><a href="#" title="">SaaS</a></li>
                        <li><a href="#" title="">DAO</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="job-status-bar" style="border-top: 1px solid #eee;">
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
