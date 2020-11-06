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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GR9F8B28FL"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-GR9F8B28FL', { 'anonymize_ip': true });
    </script>
    @endif
    @endif
</head>
<body>
@include('cookieConsent::index')
<div id="app">
    @include('partials.navbar')
    <main>
        @yield('content')
    </main>

    <footer class="mt-5 border-top py-5">
        <div class="container">
            <div class="row">
                <div class="text-center text-md-left col-md-6">
                    <a href="{{ config('app.url') }}">
                        &copy; 2020 openjobposting.com
                    </a>
                    &middot;
                    <a href="http://www.bitfertig.de/impressum">
                        Impress
                    </a>
                    &middot;
                    <a href="{{ route('privacy.index', app()->getLocale()) }}">
                        Privacy policy
                    </a>
                </div>
                <div class="text-center text-md-right col-md-6">
                    <a href="https://github.com/Bitfertig/openjobposting.com" style="vertical-align:middle;">
                        <svg width="18" height="18" viewBox="0 0 16 16" version="1.1" aria-hidden="true">
                            <path fill-rule="evenodd" fill="#999999" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div>
@yield('scripts')
</body>
</html>
