<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.tablesorter.pager.min.css') }}" rel="stylesheet">
    @yield('css-links')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <div id="sidebar-wrapper">
        <a class="navbar-brand" href="{{ url('/') }}"></a>

        <!-- Authentication Links -->
        @if (Auth::guest())
            {{-- <li><a href="{{ route('login') }}">Login</a></li> --}}
            {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
        @else
        <div class="avatar-wrapper">
            <img src="{{asset('img/avatar.jpg')}}" class="img-circle" id="avatar-img">
        </div>
        <ul class="nav avatar">
            <li class="dropdown text-center">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a style="color: #1d1d1d" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @endif
        <ul class="nav">
            @yield('mod-links')
            <li><img id="logo" src="{{ asset('img/logo.png') }}"></li>
        </ul>
        </div>

        <div id="content-wrapper">
        @include('inc.user.nav')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.js')}}"></script>
    {{-- <script src="{{ asset('js/moment.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
