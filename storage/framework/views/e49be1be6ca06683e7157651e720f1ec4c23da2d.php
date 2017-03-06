<?php $__env->startSection('content'); ?>

<script>
$(document).ready(function(){


	$('#aceitar, #recusar').click(function(){
		$.confirm({
		    	title: "Por favor justifique a escolha:",
		    	text: "<form><textarea name='comentario'></textarea></form>",
		    	confirmButtonClass: "btn-danger",
				cancelButtonClass: "btn-default",
				confirmButton: "Sim",
				cancelButton: "Não",
				async: false,
				post: true,
				submitForm: true,
				confirm: function(){
					//fazer algo
				},

			});


	});
});
</script>

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">

<div class="panel panel-default">	

<h3 align='center'>Remunerados</h3>


		<table id='turmas_table' class="table table-bordered">
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Disciplina</th>
				<th>Turma</th>
				<th colspan="2" style="text-align:center">Ações</th>				
			</tr>

			<?php $__currentLoopData = $monitores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monitor): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($monitor->fk_matricula); ?></td>
				<td><?php echo e($monitor->user->name); ?></td>
				<td><?php echo e($monitor->disciplina->nome); ?></td>
				<td><?php echo e($monitor->turma->turma); ?></td>
				<td>
					<button id='aceitar' class='btn btn-danger'><span class='glyphicon glyphicon-ok'></span></button>
				</td>
				<td>
					<button id='recusar' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></button>
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