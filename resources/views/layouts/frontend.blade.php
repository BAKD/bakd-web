<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials/head')
<body>
    <div id="app">
        @include('partials/navbar')
        @include('partials/sub-navbar')
        <main class="wrapper py-4">
            @include('partials/notifications/flash-message')
            @yield('content')
            @include('partials/footer')
            @include('partials/modals/overview')
        </main>
    </div>
</body>
</html>
