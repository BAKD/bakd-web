<div class="members-wrapper" id="ajax-pagination-container">
    <div class="row">
        @forelse($members as $member)
            @include('components.member-card', $member)
        @empty
            @include('partials.empty-results', [
                'icon'    => 'users',
                'title'   => 'Members Directory', 
                'message' => 'No members found!'
            ])
        @endforelse
    </div>
{{ $members->links() }}
</div>