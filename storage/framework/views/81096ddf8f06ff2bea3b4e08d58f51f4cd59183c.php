<?php $__env->startSection('content'); ?>

<script type='text/javascript'>
$(document).ready(function(){
    $('#matricula').mask('00/0000000');
    $('#cpf').mask('000.000.000-00');

    $('#form_registro').on('submit', function(e){
        $('#matricula').unmask();
        $('#cpf').unmask();

        console.log('Entrou');
    });
});
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
               
                <div class="panel-body">
                    <div class="alert alert-info">
                        O aluno é responsável pela veracidade dos dados.
                    </div>
                    <form id='form_registro' class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Nome Completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('matricula') ? ' has-error' : ''); ?>">
                        	<label for="matricula" class="col-md-4 control-label">Matrícula</label>
                        	
                        	<div class="col-md-6">
                        		<input id="matricula" class="form-control" name="matricula" value="<?php echo e(old('matricula')); ?>" required></input>
                        		<?php if($errors->has('matricula')): ?>
                        			<span class="help-block">
                        				<?php $__currentLoopData = $errors->get('matricula'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        					<strong><?php echo e($error); ?></strong>
                        					</br>
                        				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        			</span>
                        		<?php endif; ?>
                        	</div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
                        	<label for="cpf" class="col-md-4 control-label">CPF</label>
                        	
                        	<div class="col-md-6">
                        		<input id="cpf" class="form-control" name="cpf" value="<?php echo e(old('cpf')); ?>" required></input>
                        		<?php if($errors->has('cpf')): ?>
                        		    <span class="help-block">
                        				<?php $__currentLoopData = $errors->get('cpf'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        					<strong><?php echo e($error); ?></strong>
                        					</br>
                        				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        			</span>
                        		<?php endif; ?>
                        	</div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('rg') ? ' has-error' : ''); ?>">
                        	<label for="rg" class="col-md-4 control-label">RG</label>
                        	
                        	<div class="col-md-6">
                        		<input id="rg" class="form-control" name="rg" value="<?php echo e(old('rg')); ?>" required></input>
                        		<?php if($errors->has('rg')): ?>
                        			<span class="help-block">
                        				<?php $__currentLoopData = $errors->get('rg'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        					<strong><?php echo e($error); ?></strong>
                        					</br>
                        				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        			</span>
                        		<?php endif; ?>
                        	</div>
                        </div>
                        	                        

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>