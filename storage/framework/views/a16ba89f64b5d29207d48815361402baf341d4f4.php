<?php $__env->startSection('content'); ?>

<script>
// $(document).ready(function(){


// 	$('#aceitar').click(function(){
// 		//alert("Chamar ajax pra confirmar");
// 		aceitar($("input[name='monitor_id']").val(), 5);
// 	});
// 	$("#recusar").click(function(){
// 		aceitar($("input[name='monitor_id']").val(), 6);
// 		//alert("Chamar ajax pra recusar");
// 	});
// });


function aceitar($id_monitoria, $status){
	console.log($id_monitoria);
	console.log($status);

	$.ajax({
		headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
		ServerSide: true,
		Processing: true,
		type: 'POST',
		url:'/secretaria/atualizar',
		data: {id_monitoria: $id_monitoria, status: $status},
		success:function(resultado){
			console.log("Id: "+ $id_monitoria+"  Status:"+ $status);
			$('tr #id_monitoria').fadeOut('slow');			 
		},
		error: function(error){
			console.log("ERRO:"+ error);
		}
	});
}
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
			<tr id='<?php echo e($monitor->id); ?>'>
				<td><?php echo e($monitor->fk_matricula); ?></td>
				<td><?php echo e($monitor->user->name); ?></td>
				<td><?php echo e($monitor->disciplina->nome); ?></td>
				<td><?php echo e($monitor->turma->turma); ?></td>
				<td>
					<button id='aceitar' class='btn btn-danger' onclick="aceitar(<?php echo e($monitor->id); ?>, 5)" ><span class='glyphicon glyphicon-ok'></span></button>
				</td>
				<td>
					<input name='monitor_id' type='hidden' value='<?php echo e($monitor->id); ?>'>
					<button id='recusar' class='btn btn-danger' onclick="aceitar(<?php echo e($monitor->id); ?>, 6)"><span class='glyphicon glyphicon-remove'></span></button>
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