<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{ asset('css/bootstrap_fonts') }}" type="text/css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{asset('css/bootstrap_css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/css_3/style.css')}}" type="text/css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
            color: #000000;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    @if(\Auth::guest())
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-head">

                {{--<!-- Collapsed Hamburger -->--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                    {{--<span class="sr-only">Toggle Navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                        <strong>Docs</strong>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}"></a></li>
                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role ="button" aria-expanded="false">Register</a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-sign-out"></i>Register student</a></li>
                                <li><a href="{{ route('createLecturer') }}"><i class="fa fa-btn fa-sign-out"></i>Register lecturer</a></li>
                            </ul>
                        </li>
                    @else
                        <li>
                            {{--<a>--}}
                                {{--{{ Auth::user()->name }}--}}
                            {{--</a>--}}
                        </li>
                        {{--<li>--}}
                            {{--<a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>--}}
                        {{--</li>--}}

                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @endif
    @yield('content')

    <!-- JavaScripts -->
    <script src="{{asset('js/jquery/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap_js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
