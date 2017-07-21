<?php $__env->startSection('content'); ?>
<script type="text/javascript">
$(document).ready(function(){

	$('#acompanhar').DataTable({
		"language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
        }
	});
});


</script>

<div class="container">
<div class="row">
<div class="col-md-14">
<div class="panel panel-default">
	<div class="panel-heading" align='center'><?php echo e($turma->disciplina->nome); ?> Turma:  <?php echo e($turma->turma); ?></div>
<div class="panel-body">
	<?php if(count($monitores) == 0): ?>
		<div class="alert alert-danger">
			Não há monitores inscritos nessa turma
		</div>
	<?php else: ?>
		<table class="table table-bordered" id='acompanhar'>
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Prioridade</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $monitores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monitor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			
				<tr>
						<td><?php echo e($monitor->fk_matricula); ?></td>
						<td><?php echo e($monitor->user->name); ?></td>
						<td><?php echo e($monitor->user->email); ?></td>
						<td><?php if($monitor->remuneracao == 'remunerada'): ?>
									Remunerada
							<?php elseif($monitor->remuneracao == 'voluntaria'): ?>
									Voluntária
							<?php endif; ?> </td>
						<td><?php echo e($monitor->prioridade); ?> </td>
						<td> <?php echo e($monitor->status->nome); ?> </td>
			  	</tr>
			  	
		  	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		  	</tbody>
		</table>
	<?php endif; ?>
		<a href="/professor/turmas"><button class="btn btn-primary" id="iconeStatus" title="Voltar">Voltar</button></a>

</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('professor.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>