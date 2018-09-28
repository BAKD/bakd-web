@if (session('status'))
    <div class="alert alert-dismissable {{ session('status.class') }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! session('status.icon') !!} {{ session('status.message') }}
    </div>
@endif
