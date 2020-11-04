<div class="navbar-wrap"><div class="navbar-bg"></div></div>
<nav class="navbar navbar-expand-md navbar-lightzzz">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/', app()->getLocale()) }}">
            <img src="/img/logo.svg" alt="Logo OpenJobPosting" style="border:1px solid transparent;">
            OpenJobPosting
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- My Jobs -->
                @guest

                @else
                    <li class="nav-item mr-3">
                        <a class="nav-link btn btn-jsf" href="{{ route('jobs.index', app()->getLocale()) }}">{{ __('My job offerings') }}</a>
                    </li>
                @endguest

                <!-- Locales Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Language
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach (config('app.available_locales') as $locale_index => $locale)
                            <a class="dropdown-item" href="{{ route(Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale'=>$locale_index])) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @role('developer|admin')
                                <a class="dropdown-item" href="{{ route('admin.dashboard.index', app()->getLocale()) }}">
                                    {{ __('Admin') }}
                                </a>
                            @endrole

                            <a class="dropdown-item text-danger" href="{{ route('logout', app()->getLocale()) }}" onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            ">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
