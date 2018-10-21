<div class="suggestions full-width">
    <div class="sd-title">
        <h3>
            New Members
        </h3>
        <i class="la la-ellipsis-v"></i>
    </div>
    <div class="suggestions-list">
        @forelse (($newUsers ?? []) as $user)
        <a href="{{ route('frontend.members.profile', $user->id) }}" alt="{{ $user->name }}" title="{{ $user->name }}">
            <div class="suggestion-usd">
                <img src="{{ $user->getGravatar(35) }}" alt="{{ $user->name }}">
                <div class="sgt-text">
                    <h4>{{ $user->name }}</h4>
                    <span>{{ $user->created_at->diffForHumans() }}</span>
                </div>
                <span onClick="javascript: window.location.href='{{ route('frontend.members.profile', $user->id) }}'"><i class="la la-plus"></i></span>
            </div>
        </a>
        @empty
        <div class="text-center">
            No new users found!
        </div>
        @endforelse
        @if (isset($newUsers) && count($newUsers) > 0)
            <div class="view-more">
                <a href="{{ route('frontend.members') }}" title="View More">View More</a>
            </div>
        @endif
    </div>
</div>