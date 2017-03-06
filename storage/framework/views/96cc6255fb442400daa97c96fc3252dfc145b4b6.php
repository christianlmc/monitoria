<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Monitoria CiC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
        html *{
            color: black !important;
        }
        .nav{
            font-family: sans-serif !important;
        }
            html, body {
                background-color: #fff;
                color: black;
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



             .title { 
                 font-size: 84px;
                 color: #636b6f;
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
            .bg-success {
               background-color: #dff0d8 !important;
            }
            .bg-info {
                background-color: #d9edf7 !important;
            }
            .bg-warning {
                background-color: #fcf8e3 !important;
            }
            
            .nopadding {
                padding: 0 !important;
                margin: 0 !important;
            }
                
/*             .content { */
/*                 text-align: center; */
/*             } */
            
        </style>
    </head>
    <body> 		
        <div class="flex-center position-ref">
            <div class="container content">
                <div class="title m-b-md flex-center">
                    Monitoria
                </div>
            	<div class="row">
		            <div class="panel panel-default col-md-4 nopadding">
		            	<div class="bg-success panel-heading ">
		            		<h1 align="center">Período de Inscrição</h1>
		            	</div>
		            	<div class="panel-body">
			            	<div class="lead">Data de Início: <?php echo e($periodos[0]->inicio); ?></div>
			            	<div class="lead">Encerramento: <?php echo e($periodos[0]->fim); ?></div>
		            	</div>
					</div>
					
					 <div class="panel panel-default col-md-4 nopadding">
					 	<div class="panel-heading bg-info">
		 					<h1 align="center">Período de Avaliação</h1>
		 				</div>
		 				<div class="panel-body">
		 					<div class="lead">Data de Início: <?php echo e($periodos[1]->inicio); ?></div>
		            		<div class="lead">Encerramento: <?php echo e($periodos[1]->fim); ?></div>
		            		
		            	</div>		 				
					</div>
					<div class="panel panel-default col-md-4 nopadding">
					 	<div class="panel-heading bg-warning">
		            		<h1 align="center">Resultado</h1>
		            	</div>
		            	<div class="panel-body">
		            		<div class="lead">Resultado final: <?php echo e($periodos[2]->inicio); ?></div>
                            <div class="lead">&nbsp;</div>
		            	</div>
					</div>
                    &nbsp;
                    &nbsp;
				</div>
			</div>
        </div>
        </body>
</html>
 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>