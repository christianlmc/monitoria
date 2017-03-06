<?php $__env->startSection('content'); ?>
<script type="text/javascript">
	$("#iconeStatus").focus(function() {
		$(document).tooltip();
		} );
</script>
<style>
	label {
		display: inline-block;
		width: 5em;
	}
</style>

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">


    <div class="panel panel-default">	
	<div id="turmas_table">
		<table class="table table-bordered">
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Tipo</th>
				<th>Presente</th>
			</tr>
			<form action='turmas/salvarfrequencia''>
			<?php $__currentLoopData = $monitores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monitor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
						<td><?php echo e($monitor->fk_matricula); ?></td>
						<td><?php echo e($monitor->user->name); ?></td>
						<td><?php if($monitor->remuneracao == 'remunerada'): ?>
									Remunerada
							<?php elseif($monitor->remuneracao == 'voluntaria'): ?>
									Voluntária
							<?php endif; ?> </td>
						<td>
						<input type='radio' name='presente[]' value='sim' checked required>Sim
						<input type='radio' name='presente[]' value='nao'>Não
						</td>
			  	</tr>
		  	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		  	</form>
		</table>
		<a href="/professor/turmas"><button class="btn btn-primary" id="iconeStatus" title="Teste de tooltip">Voltar</button></a>

	</div>
	</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('professor.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>