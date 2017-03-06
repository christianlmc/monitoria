<?php $__env->startSection('content'); ?>
<script type='text/javascript'>
$(document).ready(function(){
	$('#cod_disciplina').change(function(){
		$('#div_turma').remove();
		$.ajax({
			type: 'GET',
			url:'/registro/disciplina/' + $('#cod_disciplina').val(),
			success:function(turmas){
				console.log(turmas);
				var var_select = '';
				turmas.forEach(function(turma)
				{
					var_select += '<option value="' + turma['turma'] + '" >' + turma['turma'] + ' - ' +turma['professor'] + '</option>';
				});
				$('#formulario').append('<div class="form-group" id="div_turma"><div class="col-md-12"> Turma: </br>  <select class ="form-control">' + var_select + '</select> </div> </div>');
			},
			error: function(error){
				console.log("ERRO:"+ error);
				}
		});
	});
});
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inscrição na monitoria</div>
                <div class="panel-body">
                    <?php echo Form::open(['class' => 'form-horizontal', 'url' => 'confirmar']); ?>

	                    <div id="formulario">
		                    <div class="form-group">
		                    	<div class="col-md-12">
			                    	Tipo de bolsa:<br>
				             		<?php echo e(Form::radio('bolsa', 'remunerada')); ?>Remunerada<br>
									<?php echo e(Form::radio('bolsa', 'nremunerada')); ?>Não Remunerada<br>
									<?php echo e(Form::radio('bolsa', 'ambas')); ?>Ambas<br>
			             		</div>
		             		</div>
		             		<div class="form-group">
		                    	<div class="col-md-12">
		                    		Disciplina:
				             		<?php echo Form::select('cod_disciplina', $disciplinas, null, ['class' => 'form-control', 'id' => 'cod_disciplina', 'placeholder' => 'Selecione a disciplina']); ?>

		             			</div>
		             		</div>
	             		</div>
	             		<div class="form-group">
	             			<div class="col-md-12">
	             				<?php echo Form::submit('Inscrever');; ?>

		             		</div>
	             		</div>
             		<?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>