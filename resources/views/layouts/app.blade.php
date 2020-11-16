<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Safhatussaalihiin Server App') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
         .card-header {
            color: white;
            text-align: center;
            font-weight: 900;
            font-size: 18px;
            background: rgb(114, 108, 108)
        }

        .card-body {
            background: rgb(240, 236, 236);
        }

        h3 {
            text-align: center;
            color: rgb(12, 3, 34);
            text-align: center;
            font-weight: 900;
            padding-top: 70px;
            padding-bottom: 10px;
        }
        h4{
            padding-top: 20px;
            font-size: 30px

        }
        .music-icon{
            color: rgb(224, 116, 15);
            font-size: 25px;
        }
        .left-menu-link{
            color: rgb(100, 59, 5);
        }

        .attachements {
            display: flex;
            justify-content: center;
            border: 1px solid rgb(224, 224, 228);
            text-align: left;
        }
        .left-menu-link .fas{
            width: 30px;
        }
        .nav-item > a:hover {
            color: rgb(248, 250, 250);
        }

        .ext-div{
            padding: 20px;
        }
        .int-div{
            background-color: rgb(248, 231, 217);
            border: 1px solid rgba(99, 58, 4, 0.952);
            border-radius: 0.25rem;
            text-align: center
        }
        .theader{
            text-align: center;
            background-color: rgb(240, 225, 191);
            font-size: 30px;
            color: rgb(75, 41, 3);
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-lg">
            <div class="container">
                <a href="{{ route('home') }}"> <img src="{{ asset('/assets/logo/safhatussaalihiin.png') }}" height="70px" ></a>
                <h2 style="padding-left: 30px; color: rgb(148, 91, 5); font-weight:bolder">SAFHATU SSAALIHIIN</h2>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="row">
                @yield('sidebar')
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
