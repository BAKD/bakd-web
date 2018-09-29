<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials/head')
<body>
    <div id="app">
        @include('partials/navbar')
        @include('partials/sub-navbar')
        <main class="wrapper py-4">
            <div class="container">
                {{--  Development days notice  --}}
                @if (app()->environment('local') && !session()->has('status'))
                    @include('partials/alerts/development-alert')
                @endif
                @include('partials/notifications/flash-message')
            </div>
            @yield('content')
        </main>
    </div>
    @include('partials/footer')
    @include('partials/modals/all')
    @include('partials/js-includes')
</body>
</html>
