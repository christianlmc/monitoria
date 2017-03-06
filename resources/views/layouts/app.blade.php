<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery-ui.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/multi-select.css') }}" media="screen" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.confirm.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.mask.min.js') }}"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Monitoria') }}</title>

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
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div class="collapse navbar-collapse " id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::guest())
                    @else
                        <ul class="nav navbar-nav">
                            <li {{{ (Request::is('aluno/inscricao') ? 'class=active' : '') }}}>
                                <a href="{{url('/aluno/inscricao')}}">Inscrever-se na Monitoria</a>
                            </li>
                            <li {{{ (Request::is('aluno/acompanhar') ? 'class=active' : '') }}}>
                                <a href="{{url('/aluno/acompanhar')}}">Acompanhar Inscrição</a>
                            </li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Registrar aluno</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                    
                                    	<a href="{{ url('/aluno/configurar/email') }}">
                                            Configurações de usuário
                                        </a>
                                        
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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
    </div>

    <!-- Scripts -->

</body>
</html>
