<?php $__env->startSection('content'); ?>

<script type='text/javascript'>
$(document).ready(function(){
	$('#relatorio').DataTable({
		"language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
        }
	});
});
</script>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<div class="panel-heading">Relatório <a href='/admin/exportarcsv'>(Exportar CSV)</a></div>
            	<div class="panel-body">
            		<table class="table table-hover table-bordered" id="relatorio">
							<thead>
								<tr>
									<th>Matrícula</th>
									<th>Nome</th>
									<th>Email</th>
									<th>Disciplina</th>
									<th>Turma</th>
									<th>Professor</th>
									<th>Remuneração</th>
									<th>Status</th>
									<th>Obs</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $monitores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monitor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<tr>
									<td><?php echo e($monitor->fk_matricula); ?></td>
									<td><?php echo e($monitor->user->name); ?></td>
									<td><?php echo e($monitor->user->email); ?></td>
									<td><?php echo e($monitor->disciplina->nome); ?> </td>
									<td><?php echo e($monitor->turma->turma); ?></td>
									<td><?php echo e($monitor->turma->professor); ?></td>
									<td><?php echo e($monitor->remuneracao); ?></td>
									<td><?php echo e($monitor->status->nome); ?></td>
									<td><?php echo e($monitor->descricao_status); ?></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</tbody>
						</table>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>