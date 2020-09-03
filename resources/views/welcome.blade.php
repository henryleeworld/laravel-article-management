<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ trans('global.laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
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
                        <a href="{{ url('/home') }}">{{ trans('global.home') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ trans('global.login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ trans('global.register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    {{ trans('global.laravel') }}
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">{{ trans('global.docs') }}</a>
                    <a href="https://laracasts.com">{{ trans('global.laracasts') }}</a>
                    <a href="https://laravel-news.com">{{ trans('global.news') }}</a>
                    <a href="https://blog.laravel.com">{{ trans('global.blog') }}</a>
                    <a href="https://nova.laravel.com">{{ trans('global.nova') }}</a>
                    <a href="https://forge.laravel.com">{{ trans('global.forge') }}</a>
                    <a href="https://vapor.laravel.com">{{ trans('global.vapor') }}</a>
                    <a href="https://github.com/laravel/laravel">{{ trans('global.github') }}</a>
                </div>
            </div>
        </div>
    </body>
</html>