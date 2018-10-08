<div class="col-lg-3 col-md-4 col-sm-6 col-12 member-card-wrapper">
    <div class="company_profile_info">
        <div class="company-up-info">
            <img src="{{ $member->getGravatar() }}" alt="{{ $member->name }}">
            <h3>{{ $member->name }}</h3>
            <h4>Joined {{ $member->created_at->diffForHumans() }}</h4>
            <ul class="user-rating gold">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-half-o"></i></li>
            </ul>
            <ul>
                <li><a href="#" title="" class="btn btn-primary"><i class="fa fa-plus"></i> Follow</a></li>
                <li><a href="#" title="" class="btn btn-primary"><i class="fa fa-envelope"></i> Message</a></li>
                {{--  <li><a href="#" title="" class="hire-us">Hire</a></li>  --}}
            </ul>
        </div>
        <a href="{{ route('frontend.members.profile', $member->id) }}" title="View Profile" class="view-more-pro">View Profile</a>
    </div>
</div>