<div class="widget widget-user">
    <h3 class="title-wd">New Users</h3>
    <ul>
        @forelse (($newUsers ?? []) as $user)
        <li>
            <div class="usr-msg-details">
                <div class="usr-ms-img">
                    <img src="{{ $user->getGravatar(75) }}" alt="{{ $user->name }}">
                </div>
                <div class="usr-mg-info">
                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <span><img src="images/price1.png" alt="">1185</span>
        </li>
        @empty
        <li>
            No new users found!
        </li>
        @endforelse
    </ul>
</div>
