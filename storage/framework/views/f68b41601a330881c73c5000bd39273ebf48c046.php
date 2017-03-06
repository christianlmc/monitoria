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
					<div class="alert alert-info">É obrigatório que o aluno seja titular da conta corrente. </div>
					<div class="alert alert-info">Todos os dados informados são responsabilidade exclusiva do aluno</div>
					<?php if(count($dados_bancarios) >= 1): ?>
					<div id='banco-div'>
						<?php echo Form::open(['class' => 'form-horizontal', 'url' =>'aluno/alterar-dadosbanco']); ?>

						<div class="row">
							<div class="col-sm-3">
								<blockquote>Dados Bancários</blockquote>
							</div>
							<div class="col-sm-6">
								Código do Banco:
								(<a target="_blank" id='codigo_banco' href="http://www.codigobanco.com/">Tabela Código Banco</a>)
								<div class="<?php echo e($errors->has('código_do_banco') ? ' has-error' : ''); ?>">
									<?php echo e(Form::text('código_do_banco', $dados_bancarios[0]->codigo,['class' => 'form-control'])); ?> 
									
									<?php if($errors->has('código_do_banco')): ?> 
									<span class="help-block"> 
										<strong><?php echo e($errors->first('código_do_banco')); ?></strong>
									</span> 
									<?php endif; ?>
								</div>
								<br> 
								
								Agência
								<div class="<?php echo e($errors->has('agência') ? ' has-error' : ''); ?>">
									<?php echo e(Form::text('agência', $dados_bancarios[0]->agencia,['class' => 'form-control'])); ?> 
									
									<?php if($errors->has('agência')): ?> 
									<span class="help-block"> 
										<strong><?php echo e($errors->first('agência')); ?></strong>
									</span> 
									<?php endif; ?>
								</div>
								<br> 
								
								Conta Corrente
								<div class="<?php echo e($errors->has('conta_corrente') ? ' has-error' : ''); ?>">
									<?php echo e(Form::text('conta_corrente', $dados_bancarios[0]->conta_corrente,['class' => 'form-control'])); ?> 
									
									<?php if($errors->has('conta_corrente')): ?> 
									<span class="help-block"> 
										<strong><?php echo e($errors->first('conta_corrente')); ?></strong>
									</span> 
									<?php endif; ?>
								</div>
								<br>
							</div>
							<div class="col-sm-4"></div>
						</div>
						<?php echo Form::submit('Alterar',['id' => 'btn_configurar', 'class' =>'btn pull-right']);; ?> 
						<?php echo Form::close(); ?>

					</div>
					<?php else: ?>
					<div class="alert alert-danger">Você ainda não configurou seus dados bancários!</div>
					<div id="banco">
						<?php echo Form::open(['class' => 'form-horizontal', 'url' =>'aluno/alterar-dadosbanco']); ?>

						<div class="row">
							<div class="col-sm-3">
								<blockquote>Dados Bancários</blockquote>
							</div>
							<br> 
							<div class="col-sm-6">
								Código do Banco:
								(<a target="_blank" id='codigo_banco' href="http://www.codigobanco.com/">Tabela Código Banco</a>)
								<div class="<?php echo e($errors->has('código_do_banco') ? ' has-error' : ''); ?>">
									<?php echo e(Form::text('código_do_banco', null, ['class' => 'form-control'])); ?> 
									
									<?php if($errors->has('código_do_banco')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('código_do_banco')); ?></strong>
									</span>
									<?php endif; ?>
								</div>
								<br> 
								
								Agência:
								<div class="<?php echo e($errors->has('agência') ? ' has-error' : ''); ?>">
									<?php echo e(Form::text('agência', null, ['class' => 'form-control'])); ?>

	
									<?php if($errors->has('agência')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('agência')); ?></strong>
									</span>
									<?php endif; ?>
								</div>	
								<br> 
								Conta Corrente:
								<div class="<?php echo e($errors->has('conta_corrente') ? ' has-error' : ''); ?>">
									<?php echo e(Form::text('conta_corrente', null, ['class' => 'form-control'])); ?>

									
									<?php if($errors->has('conta_corrente')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('conta_corrente')); ?></strong>
									</span>
									<?php endif; ?>
								</div>
								<br>
							</div>
						</div>
						<div class="col-sm-4"></div>	
					</div>
					<?php echo Form::submit('Adicionar',['id' => 'btn_configurar', 'class' =>'btn pull-right']);; ?> 
					<?php echo Form::close(); ?>

				</div>
				<?php endif; ?>
                </div>
                
            </div>
        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>