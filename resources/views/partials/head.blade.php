<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('bakd.seo.description', 'BAKD Crypto Crowdfunding & Professional Networking') }}" />
    <meta name="keywords" content="{{ config('bakd.seo.keywords', 'bakd, crypto, blockchain, cryptocurrency, crowdfunding, bitcoin') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('bakd.name', 'BAKD') }} | {{ config('bakd.tagline', 'Crypto Crowdfunding & Professional Networking') }}</title>

    <script src="{{ asset('js/bakd.js') }}" defer type="text/javascript"></script>

    <link href="{{ asset('css/bakd.css') }}" type="text/css" rel="stylesheet">

    <script>
        //*************************
        // Copyright 2018 BAKD.me
        //      tom@bakd.io
        //       ¯\_(ツ)_/¯
        //*************************
    </script>
</head>
