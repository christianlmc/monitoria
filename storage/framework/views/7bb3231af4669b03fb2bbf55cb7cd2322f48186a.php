<?php $__env->startSection('content'); ?>

<script>
$(document).ready(function(){
    $(".calendario").datetimepicker({
        format: 'd/m/Y H:i',
        mask: '99/99/9999 99:99',
       	onChangeDateTime:function(dp,$input){
    		$(this).val() = $input;
  		}
 
    });
    $.datetimepicker.setLocale('pt-BR');
});
</script>


<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="panel-group">
				<div class="panel panel-primary">
					<div class='panel-heading'> Configurações do Sistema </div>
					<?php echo e(Form::open(['url' => 'admin/definicoes/salvar'])); ?>

					<div class="panel-body">
						<h3>Períodos</h3>
						<br>
						
						<?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class="form-group">
							<?php if($periodo->descricao->descricao != "Resultado (Monitores/Professores)"): ?>
							<div class=' col-md-4'> <?php echo e($periodo->descricao->descricao); ?></div>
							<div class=' col-md-4'><input name='inicio[]' class="calendario" type='text' value='<?php echo e($periodo->inicio); ?>'>  </div>
							<div class=' col-md-4'><input name='fim[]' class="calendario" type='text' value='<?php echo e($periodo->fim); ?>'> </div>
							<?php else: ?>
							<div class=' col-md-4'> <?php echo e($periodo->descricao->descricao); ?> </div>
							<div class=' col-md-4'>
								<input name='inicio[]' class="calendario" type='text' value='<?php echo e($periodo->inicio); ?>'>
							</div>  
							<div class=' col-md-4'>
								<input name='fim[]' class="calendario" type='hidden' value='<?php echo e($periodo->inicio); ?>'>
							</div>
							<?php endif; ?>
						</div>
						</br></br>
						<input type='hidden' name='tipo[]' value='<?php echo e($periodo->id); ?>'>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					
					<h3>Bolsas</h3>

					<div class='col-md-4'>Quantidade de bolsas</div>
					
					<?php echo e(Form::number('bolsas',  $bolsa->quantidade )); ?>


					<?php echo Form::submit("Salvar", ['class' => 'btn btn-success pull-right']); ?>


					<?php echo e(Form::close()); ?>

					</div>
				</div>


				<div class="panel panel-primary">
					<div class='panel-heading'> Atualizar Sistema </div>
					<div class="panel-body">
					
						<?php if(session()->has('error')): ?>
							<?php if(session('error') != 0): ?>
							<div class="alert alert-danger">
								<h4>
									<strong>Atualização retornou o erro <?php echo e(session('error')); ?>:</strong>
								</h4>
								<p>
								<?php $__currentLoopData = session('output'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $output): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									<?php echo e($output); ?> </br>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</p>
							</div>
							<?php else: ?>
							<div class="alert alert-success">
								As turmas, vagas e disciplinas foram atualizadas
							</div>
							<?php endif; ?> 
						<?php endif; ?>

						<h3>Atualizar turmas, vagas e disciplinas</h3>
						<?php echo Form::open(['method' => 'POST', 'url' => 'admin/utilizarCrawler', 'class' => 'form-horizontal']); ?>


							<?php echo Form::submit("Atualizar", ['class' => 'btn btn-success']); ?>

						<?php echo Form::close(); ?>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>