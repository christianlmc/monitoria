<?php $__env->startSection('content'); ?>

<script>
$(document).ready(function(){
	$('.sem-monitores').fadeTo('fast',0.3);
	$('[data-toggle="tooltip"]').tooltip(
		{
			template:'<div style="width: 250px;" class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
		});
});
</script>
<style>
</style>

<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">	
	
		<table id='turmas_table' class="table table-bordered">
			<tr>
				<th>Disciplina</th>
				<th>Turma</th>
				<th>Inscrições</th>
				<?php if($mostrar): ?>
				<th colspan="2" style="text-align:center">Ações</th>
				<?php else: ?>
				<th colspan="1" style="text-align:center">Ações</th>
				<?php endif; ?>
				<th>Estado</th>
			</tr>

			<?php $__currentLoopData = $turmas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turma): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($turma->disciplina->nome); ?></td>
				<td><?php echo e($turma->turma); ?></td>
				<td><?php echo e($turma->monitoresCount()); ?></td>
				<?php if($mostrar): ?>
				<td>	
					<form align="center" method="POST" action="/professor/turmas/selecaoturmas" accept-charset="UTF-8" class="form-horizontal">
						<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">	  				
						<input type="hidden" name="id_turma" value="<?php echo e($turma->id); ?>">
						<input class="btn btn-primary" value="Avaliar" type="submit">
					</form>
					
				</td>
				<?php endif; ?>
				<td>
					<form align="center" method="POST" action="/professor/turmas/acompanhar" accept-charset="UTF-8" class="form-horizontal">

						<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">	  				
						<input type="hidden" name="id_turma" value="<?php echo e($turma->id); ?>">					
						<input class="btn btn-primary" value="Acompanhar" type="submit">
	  				</form>

				</td>


				<td>
					
					<?php echo e($turma->status->nome); ?>


				</td>
		  	</tr>
		  	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</table>
	


</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('professor.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>