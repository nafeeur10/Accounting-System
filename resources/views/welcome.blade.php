<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                font-size: 40px;
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

            .titleHeader
            {
                background-color: forestgreen;
                padding: 15px;
                color: white;
            }

            .btn {
                margin: 0.375rem;
                color: white!important;
                text-transform: uppercase;
                word-wrap: break-word;
                white-space: normal;
                cursor: pointer;
                border: 0;
                border-radius: 0.125rem;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                padding: 0.84rem 2.14rem!important;
                font-size: 0.81rem;
                background-color: #00bfa5;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <span><b>eAccount</b></span>
                    <hr>
                    {{--<br>--}}
                    <img src="{{ asset('images/accounting.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </body>
</html>
