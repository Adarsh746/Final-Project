<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labours Online</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
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
        
        <div class="content">
                <div class="title m-b-md">
                  Admin
                </div>

                @if (Route::has('admin.login'))
                <div class="bottom-center links">
                @if(Auth::guard('admin')->check())
                        <a href="{{ url('admin\home') }}">Home</a>
                    @else
                        <a href="{{ route('admin.login') }}">Login</a>
                        <a href="{{ route('admin.register') }}">Register</a>
                    @endauth
                </div>
            @endif
            </div>
            <div class="content">
                <div class="title m-b-md">
                User
                </div>

                @if (Route::has('user.login'))
                <div class="bottom-center links">

                 @if(Auth::guard('web')->check())
                  
                        <a href="{{ url('user\home') }}">Home</a>
                    @else
                        <a href="{{ route('user.login') }}">Login</a>
                        <a href="{{ route('user.register') }}">Register</a>
                    @endif
                </div>
            @endif
            </div>
            <div class="content">
                <div class="title m-b-md">
               Employer
                </div>

                @if (Route::has('employeer.login'))
                <div class="bottom-center links">

                 @if(Auth::guard('employeer')->check())
                  
                        <a href="{{ url('employeer\home') }}">Home</a>
                    @else
                        <a href="{{ route('employeer.login') }}">Login</a>
                        <a href="{{ route('employeer.register') }}">Register</a>
                    @endif
                </div>
            @endif
            </div>
        </div>
        </div>
        
    </body>
</html>
