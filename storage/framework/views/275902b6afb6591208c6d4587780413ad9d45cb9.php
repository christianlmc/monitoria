<!DOCTYPE html>
<html lang="en">
<head>

    <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::asset('css/jquery-ui.css')); ?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::asset('css/multi-select.css')); ?>" media="screen" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::asset('css/jquery.dataTables.min.css')); ?>" media="screen" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-ui.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.confirm.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.multi-select.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.dataTables.min.js')); ?>"></script>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel Multi Auth Guard')); ?></title>

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
                <?php if(Auth::check()): ?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php endif; ?>
                <!-- Branding Image -->
                
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <?php if(Auth::guard('professor')->guest()): ?>
                        &nbsp;
                    <?php elseif(Auth::guard('professor')->user()->role == 200): ?>
                        <li <?php echo e((Request::is('professor/turmas') ? 'class=active' : '')); ?>>
                            <a href="<?php echo e(url('/professor/turmas')); ?>">Turmas</a>
                        </li>
                    <?php elseif(Auth::guard('professor')->user()->role == 300): ?>
                        <li <?php echo e((Request::is('secretaria/turmas') ? 'class=active' : '')); ?>>
                            <a href="<?php echo e(url('/secretaria/turmas')); ?>">Turmas</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guard('professor')->guest()): ?>
                        &nbsp;
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::guard('professor')->user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(url('/professor/logout')); ?>"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/professor/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Scripts -->
<!--     <script src="/js/app.js"></script> -->
</body>
</html>
