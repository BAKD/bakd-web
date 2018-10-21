<div class="widget widget-user">
    <h3 class="title-wd">New Users</h3>
    <ul>
        @forelse (($newUsers ?? []) as $user)
        <li>
            <div class="usr-msg-details">
                <a href="{{ route('frontend.members.profile', $user->id) }}" alt="{{ $user->name }}" title="{{ $user->name }}">
                    <div class="usr-ms-img">
                        <img src="{{ $user->getGravatar(75) }}" alt="{{ $user->name }}">
                    </div>
                    <div class="usr-mg-info">
                        <h3>{{ $user->name }}</h3>
                        <p>{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </a>
            </div>
            <span>
                <button class="btn btn-sm btn-primary">
                    <i class="fa fa-plus-circle"></i> Follow
                </button>
            </span>
        </li>
        @empty
        <li>
            No new users found!
        </li>
        @endforelse
    </ul>
</div>
