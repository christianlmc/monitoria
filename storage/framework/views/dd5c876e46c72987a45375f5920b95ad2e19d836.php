<?php $__env->startSection('content'); ?>


<script type='text/javascript'>
$(document).ready(function(){
});

function deletar (id)
{
	var dados = document.getElementById("monitoria_"+id);
	dados = "Disciplina:"+dados.children[1].innerHTML + "</br>Professor: " + dados.children[2].innerHTML + "</br>Turma: " + dados.children[3].innerHTML;
	$.confirm({
	    text: dados,
	    title: "Deseja deletar sua inscrição nessa turma?",
	    confirm: function(button) {
	        $("#monitoria_"+id+" form").submit();
	    },
	    cancel: function(button) {
	        // nothing to do
	    },
	    confirmButton: "Sim",
	    cancelButton: "Não",
	    post: true,
	    confirmButtonClass: "btn-danger",
	    cancelButtonClass: "btn-default",
	    dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
		});
}
</script>
<div class="container">
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-default panel-primary">
        	<div class="panel-heading"><h3>Minhas Inscrições</h3></div>
        	<?php if(empty($monitorias->all())): ?>
        	<div class="panel-body">
	        	<div class="alert alert-info ">
	                Você não se inscreveu em nenhuma monitoria.
	                <?php if($mostrar): ?><a href="/aluno/inscricao">Clique aqui para se inscrever</a><?php endif; ?>
	            </div>
            </div>
        	<?php else: ?>
        	<div class="table-responsive">
		        <div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Remuneração</th>
								<th>Disciplina</th>
								<th>Professor
								<th>Turma</th>
								<th>Status</th>
								<th>Obs</th>

								<?php if($mostrar): ?>
									<th>Ações</th>
								<?php endif; ?>

							</tr>
						</thead>
						<tbody>
						<?php $__currentLoopData = $monitorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monitoria): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr id="monitoria_<?php echo e($monitoria->id); ?>">
								<td id="remuneracao">
									<?php if($monitoria->remuneracao == 'remunerada'): ?>
										Remunerada
									<?php else: ?>
										Voluntária
									<?php endif; ?>
								</td>
								<td><?php echo e($monitoria->disciplina->nome); ?></td>
								<td><?php echo e($monitoria->turma->professor); ?></td>
								<td><?php echo e($monitoria->turma->turma); ?></td>
								<td><?php echo e($monitoria->status->nome); ?></td>
								<td><?php echo e($monitoria->descricao_status); ?> </td>
								<?php if($mostrar): ?>
								<td> 
									<?php echo Form::open(['class' => 'form-horizontal', 'url' => '/aluno/deletar/']); ?>

										
										<input type="hidden" name="id_inscricao" value="<?php echo e($monitoria->id); ?>"/>
										
										<button type="button" class='btn btn-danger' onclick="deletar(<?php echo e($monitoria->id); ?>)">Remover</button>
									<?php echo Form::close(); ?>

								</td>
								<?php endif; ?>
						  	</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>