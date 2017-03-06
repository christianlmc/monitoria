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
                    <?php if(session('erro')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('erro')); ?>

                        </div>
                    <?php endif; ?>                
		            <div id='senha-div'>
 		            	<?php echo Form::open(['class' => 'form-horizontal', 'url' => 'aluno/alterar-senha']); ?> 
 							<div class="row">
 								<div class="col-sm-3">
									<blockquote>Senha</blockquote>
 								</div>
 								<div class="col-sm-5">
								
									Senha atual
 							        <div class="<?php echo e($errors->has('senha_atual') ? ' has-error' : ''); ?>">
 							        	<?php echo e(Form::password('senha_atual', ['class' => 'form-control'])); ?>

 							        	<?php if($errors->has('senha_atual')): ?>
		                                    <span class="help-block">
 		                                        <strong><?php echo e($errors->first('senha_atual')); ?></strong>
 		                                    </span>
 		                                <?php endif; ?>
 							        </div>
 							        <br>
 							     	Nova senha
 						            <div class="<?php echo e($errors->has('nova_senha') ? ' has-error' : ''); ?>">
 						            	<?php echo e(Form::password('nova_senha', ['class' => 'form-control'])); ?>

 							            <?php if($errors->has('nova_senha')): ?>
 		                                    <span class="help-block">
 		                                        <strong><?php echo e($errors->first('nova_senha')); ?></strong>
 		                                    </span>
 		                                <?php endif; ?>
 		                            </div>
 						            <br>
 						         Confirmar nova senha
 						            <div> <?php echo e(Form::password('nova_senha_confirmation', ['class' => 'form-control'])); ?></div>
 						            <br>
 								</div>
 								<div class="col-sm-4">
 								</div>
 							</div>
 						<?php echo Form::submit('Salvar',['id' => 'btn_configurar', 'class' => 'btn pull-right']);; ?>

 						<?php echo Form::close(); ?>

 					</div>
	                  </div>
                </div>
                
            </div>
        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>