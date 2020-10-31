<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jobsignalfire') }}</title>

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
                        &copy; 2020 jobsignalfire.com
                    </a>
                </div>
                <div class="text-center text-md-right col-md-6">
                    <a href="http://www.bitfertig.de/impressum">
                        Impress
                    </a>
                    &middot;
                    <a href="{{ route('privacy.index', app()->getLocale()) }}">
                        Privacy policy
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div>
@yield('scripts')
</body>
</html>
