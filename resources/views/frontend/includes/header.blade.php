<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="img/logo/logo.png" rel="icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="img/logo/logo.png" rel="icon">
    <link href="css/recents.css" rel="stylesheet">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header id="header">
            <div class="container">
                <div class="pull-left ml-5">
                    <img src="img/logo/logo.png" style="width: 150px;height:90px;" class="fixed-top"/>
                </div>
                <nav id="nav-menu-container fixed-top">
                    <!-- Collapsed Hamburger -->
                    <div class="navbar-header ">
                        <button type="button" class="navbar-toggle collapsed navbar-default" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="true">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a classs="nav-item navbar text-" href="/home"><h3></h3></a>

                    </div>
<div id="app-navbar-collapse" class="collapse navbar-collapse ">

                    <ul class="nav-menu pull-right ">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="navbar-brand" href="{{ route('login') }}">Login</a></li>
                            <li><a class="navbar-brand" href="{{ route('register') }}">Register</a></li>
                        @else
                                <li><a href="{{ route('project') }}" class="navbar-brand" href="#">Project</a></li>
                        <li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Recent Actions</a>                                       </a>
                                        <ul class="dropdown-menu dropdown-alerts">

                                            @if(isset($recents))
                                                @foreach($recents as $data)
                                            <li>
                                                <a href="#">
                                                    <div>
                                                        <i class="fa fa-tags fa-fw"></i>{{ $data->action }}
                                                        <span class="pull-right text-muted small">{{ $data->created_at }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                                @endforeach
                                            @endif
                                            <li class="divider"></li>
                                            <li>
                                                <a class="text-center" href="{{ route('recents')}}">
                                                    <strong>See All Actions</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                            </li>
                        <li><a class="navbar-brand" href="{{ route('theme') }}">Templates</a></li>

                            <li class="menu-has-children">
                                <a class="navbar-brand" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="navbar-default" href="{{ route('logout') }}"
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
                        @endguest
                    </ul>
                    </ul>
</div>
                </nav><!-- #nav-menu-container -->
            </div>
        </header>
                 </div>
                </div>
                </div>
            </div>


        </nav>
    </div>

        @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
