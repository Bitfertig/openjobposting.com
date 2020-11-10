<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
$site_title = config('app.name', 'OpenJobPosting');
$site_description = 'A platform to offer jobs online. Jobs will be also presented on search engines.';
?>

    <title>@yield('title', $site_title)</title>

    <meta name="description" content="{{ $site_description }}">
    <meta name="keywords" content="open jobposting, job platform, jobposting, seo, job, job offering, advertise jobs, search engine">

    <meta name="twitter:card" content="{{ $site_description }}">
    <meta name="twitter:site" content="@openjobposting">
    <meta name="twitter:creator" content="@bitfertig">
    <meta property="og:url" content="{{ current_route() }}">
    <meta property="og:title" content="{{ $site_title }}">
    <meta property="og:description" content="{{ $site_description }}">
    {{-- <meta property="og:image" content="{{ current_route() }}/twitter-article.jpg"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @if( App::Environment() !== 'local' )
    @if( isset($_COOKIE['laravel_cookie_consent']) && $_COOKIE['laravel_cookie_consent'] == 1 )
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6WH8GBLTZP"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-6WH8GBLTZP', { 'anonymize_ip': true });
    </script>

    <script data-ad-client="ca-pub-3809977409157715" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    @endif
    @endif
</head>
<body>
<div id="app" class="stickyfooter">
    @include('partials.navbar')
    <main class="stickyfooter-content">
        @yield('content')
    </main>
    @include('partials.footer')
</div>
@include('partials.consent')
@yield('scripts')
</body>
</html>
