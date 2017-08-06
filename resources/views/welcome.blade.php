<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="{{'css/app.css'}}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }


            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        {{-- <a href="{{ route('login') }}" class="btn btn-info">Login</a> --}}
                        {{-- <a href="{{ route('register') }}" class="btn btn-info">Register</a> --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  {{ config('app.name', 'Laravel') }}
                </div>

                <div class="links">
                    <a href="{{route('login')}}" class="btn">Korisnik Login</a>
                    <a href="{{route('admin.login')}}" class="btn">Admin Login</a>
                    {{-- <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                </div>
            </div>
        </div>
        <script src="{{asset('js/jquery.js')}}" charset="utf-8"></script>
        <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    </body>
</html>
