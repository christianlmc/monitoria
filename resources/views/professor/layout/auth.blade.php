<!DOCTYPE html>
<html lang="en">
<head>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery-ui.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/multi-select.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.confirm.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                @if (Auth::check())
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @endif
                <!-- Branding Image -->
                {{-- <a class="navbar-brand" href="{{ url('/professor') }}">
                    {{ config('app.name', 'Laravel Multi Auth Guard') }}: Professor
                </a> --}}
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guard('professor')->guest())
                        &nbsp;
                    @elseif(Auth::guard('professor')->user()->role == 200)
                        <li {{{ (Request::is('professor/turmas') ? 'class=active' : '') }}}>
                            <a href="{{ url('/professor/turmas') }}">Turmas</a>
                        </li>
                    @elseif(Auth::guard('professor')->user()->role == 300)
                        <li {{{ (Request::is('secretaria/turmas') ? 'class=active' : '') }}}>
                            <a href="{{ url('/secretaria/turmas') }}">Turmas</a>
                        </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guard('professor')->guest())
                        &nbsp;
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('professor')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/professor/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ url('/professor/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
<!--     <script src="/js/app.js"></script> -->
</body>
</html>
