<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials/head')
<body class="sign-in">
    <div id="app">
        <main class="wrapper py-4">
            @include('partials/notifications/flash-message')
            @yield('content')
        </main>
    </div>
</body>
</html>
