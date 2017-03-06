<!DOCTYPE html>
<html lang="en">
<head>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery-ui.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/multi-select.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.datetimepicker.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery.dataTables.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/jquery-confirm.css') }}" media="screen" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-confirm.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('js/jquery.confirm.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrapValidator.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.datetimepicker.full.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootbox.min.js') }}"></script>


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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
{{--                 <a class="navbar-brand" href="{{ url('/admin') }}">
                    {{ config('app.name', 'Laravel Multi Auth Guard') }}: Admin
                </a> --}}
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guard('admin')->guest())
                        &nbsp;
                    @else
                        <li {{{ (Request::is('admin/remunerados') ? 'class=active' : '') }}}>
                            <a href="{{ url('/admin/remunerados') }}">Remunerados SIGRA</a>
                        </li>
                        <li {{{ (Request::is('admin/voluntarios') ? 'class=active' : '') }}}>
                            <a href="{{ url('/admin/voluntarios') }}">Voluntários</a>
                        </li>
                        <li {{{ (Request::is('admin/definicoes') ? 'class=active' : '') }}}>
                            <a href="{{ url('/admin/definicoes') }}">Configurações</a>
                        </li>
                        <li {{{ (Request::is('admin/relatorio') ? 'class=active' : '') }}}>
                            <a href="{{ url('/admin/relatorio') }}">Relatório</a>
                        </li>
{{--                         <li {{{ (Request::is('admin/editarAluno') ? 'class=active' : '') }}}>
                            <a href="{{ url('/admin/editarAluno') }}">Editar Aluno</a>
                        </li> --}}
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
{{--                         <li><a href="{{ url('/admin/login') }}">Login</a></li>
                        <li><a href="{{ url('/admin/register') }}">Register</a></li> --}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/admin/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
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
</body>
</html>
