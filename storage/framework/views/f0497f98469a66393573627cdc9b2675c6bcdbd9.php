<?php $__env->startSection('content'); ?>
<script type='text/javascript'>
$(document).ready(function(){

});
	
</script>

<div class="container">
	<?php echo $__env->make('layouts.menu-configurar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                	<?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>                  
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

	                  </div>
                </div>
                
            </div>
        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>