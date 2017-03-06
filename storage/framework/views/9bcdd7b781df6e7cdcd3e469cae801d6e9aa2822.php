<?php $__env->startSection('content'); ?>
<script type='text/javascript'>
$(document).ready(function(){

// 	$("#banco-div").hide();
// 	$("#email-sidebar").click(function(){
//     	$("#senha-div").hide();
//     	$("#banco-div").hide();
//     	$("#email-div").show();
// 	});
// 	$("#banco-sidebar").click(function(){
// 		$("#email-div").hide();
// 		$("#banco-div").show();
// 	});

// 	$(".nav-pills li").click(function(){
// 		$(".nav-pills li").each(function(){
// 			$(this).removeClass("active");
// 		});
// 		$(this).toggleClass("active");
// 	});
	
});
	
</script>

<div class="container">
	<ul class="nav affix panel panel-default nav-pills nav-stacked" >
	    <li <?php echo e((Request::is('configurar/email') ? 'class=active' : '')); ?>><a id="email-sidebar">E-Mail</a></li>
	    <li <?php echo e((Request::is('/password/reset') ? 'class=active' : '')); ?>><a id='senha-sidebar' href='/password/reset'>Senha</a></li>
	    <li <?php echo e((Request::is('configurar/dadosbancarios') ? 'class=active' : '')); ?>><a id='banco-sidebar'>Dados Bancários</a></li>      
  	</ul>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                	                  
	                <div id='email-div'>
	                	<?php echo Form::open(['class' => 'form-horizontal', 'url' => 'aluno/alterar-email']); ?>

                  	<div class="row">
								<div class="col-sm-3">
									<blockquote>E-Mail</blockquote>
								</div>
								<div class="col-sm-5">
									E-mail atual:
							        <strong><?php echo e($email); ?></strong><br><br>
							     	Novo e-mail
						            <div class="<?php echo e($errors->has('email') ? ' has-error' : ''); ?>"> 
						            	<?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

							            <?php if($errors->has('email')): ?>
		                                    <span class="help-block">
		                                        <strong><?php echo e($errors->first('email')); ?></strong>
		                                    </span>
	                                	<?php endif; ?>
                                	</div>
                                	<br>
						            Confirmar novo email
						            <div> <?php echo e(Form::text('email_confirmation', null, ['class' => 'form-control'])); ?></div>
                                	<br>
								</div>
								<div class="col-sm-4">
								</div>
							</div>
						<?php echo Form::submit('Salvar',['id' => 'btn_configurar', 'class' => 'btn pull-right']);; ?>

						<?php echo Form::close(); ?>

	               	</div>
	               	
<!-- 		            <div id='senha-div'> -->
<!-- 		            	<?php echo Form::open(['class' => 'form-horizontal', 'url' => 'aluno/alterar-senha']); ?> -->
<!-- 							<div class="row"> -->
<!-- 								<div class="col-sm-3"> -->
<!-- 									<blockquote>Senha</blockquote> -->
<!-- 								</div> -->
<!-- 								<div class="col-sm-5"> -->
								
<!-- 									Senha atual -->
<!-- 							        <div class="<?php echo e($errors->has('senha-atual') ? ' has-error' : ''); ?>"> -->
<!-- 							        	<?php echo e(Form::password('senha-atual', ['class' => 'form-control'])); ?> -->
<!-- 							        	<?php if($errors->has('senha-atual')): ?> -->
<!-- 		                                    <span class="help-block"> -->
<!-- 		                                        <strong><?php echo e($errors->first('senha-atual')); ?></strong> -->
<!-- 		                                    </span> -->
<!-- 		                                <?php endif; ?> -->
<!-- 							        </div> -->
<!-- 							        <br> -->
<!-- 							     	Nova senha -->
<!-- 						            <div class="<?php echo e($errors->has('nova-senha') ? ' has-error' : ''); ?>">  -->
<!-- 						            	<?php echo e(Form::password('nova-senha', ['class' => 'form-control'])); ?> -->
<!-- 							            <?php if($errors->has('nova-senha')): ?> -->
<!-- 		                                    <span class="help-block"> -->
<!-- 		                                        <strong><?php echo e($errors->first('nova-senha')); ?></strong> -->
<!-- 		                                    </span> -->
<!-- 		                                <?php endif; ?> -->
<!-- 		                            </div> -->
<!-- 						            <br> -->
<!-- 						         Confirmar nova senha -->
<!-- 						            <div> <?php echo e(Form::password('nova-senha_confirmation', ['class' => 'form-control'])); ?></div> -->
<!-- 						            <br> -->
<!-- 								</div> -->
<!-- 								<div class="col-sm-4"> -->
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 						<?php echo Form::submit('Salvar',['id' => 'btn_configurar', 'class' => 'btn pull-right']);; ?> -->
<!-- 						<?php echo Form::close(); ?> -->
<!-- 					</div> -->

	                <div id='banco-div'>
	                	<?php echo Form::open(['class' => 'form-horizontal', 'url' => 'aluno/alterar-dadosbanco']); ?>

							<div class="row">
								<div class="col-sm-3">
									<blockquote>Dados Bancários</blockquote>
								</div>
								<div class="col-sm-5">
									Código do Banco:
					             	<div class="<?php echo e($errors->has('banco-codigo') ? ' has-error' : ''); ?>">
					             		<?php echo e(Form::text('banco-codigo', $dados_bancarios[0]->codigo, ['class' => 'form-control'])); ?>

					             		<?php if($errors->has('banco-codigo')): ?>
		                                    <span class="help-block">
		                                        <strong><?php echo e($errors->first('banco-codigo')); ?></strong>
		                                    </span>
		                                <?php endif; ?>
					             	</div> 
					             	<br>
							     	Agência
						            <div class="<?php echo e($errors->has('banco-agencia') ? ' has-error' : ''); ?>"> 
						            	<?php echo e(Form::text('banco-agencia', $dados_bancarios[0]->agencia, ['class' => 'form-control'])); ?>

						            	<?php if($errors->has('banco-agencia')): ?>
		                                    <span class="help-block">
		                                        <strong><?php echo e($errors->first('banco-agencia')); ?></strong>
		                                    </span>
		                                <?php endif; ?>
						            </div>
						            <br>
						            Conta Corrente
						            <div class="<?php echo e($errors->has('banco-cc') ? ' has-error' : ''); ?>"> 
						            	<?php echo e(Form::text('banco-cc', $dados_bancarios[0]->conta_corrente, ['class' => 'form-control'])); ?>

						            	<?php if($errors->has('banco-cc')): ?>
		                                    <span class="help-block">
		                                        <strong><?php echo e($errors->first('banco-cc')); ?></strong>
		                                    </span>
		                                <?php endif; ?>
						            </div>
						            <br>
								</div>
								<div class="col-sm-4">
								</div>
							</div>
						<?php echo Form::submit('Alterar',['id' => 'btn_configurar', 'class' => 'btn pull-right']);; ?>	                    
	                    <?php echo Form::close(); ?>

	                  </div>
                </div>
                
            </div>
        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>