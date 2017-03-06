<!-- Main Content -->
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reconfigurar Senha</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Endereço de E-Mail</label>

                            <div class="col-md-6">
                            <?php if(Auth::check()): ?>
                            <?php echo e(Form::email('email', Auth::user()->email,['id' => 'email', 'class' => 'form-control', 'required', 'disabled'])); ?>

                            <?php else: ?>
                            <?php echo e(Form::email('email',null,['id' => 'email', 'class' => 'form-control', 'required'])); ?>

                            <?php endif; ?>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar link de reconfiguração de senha
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