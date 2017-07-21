<?php $__env->startSection('content'); ?>
<script type='text/javascript'>
$(document).ready(function(){
	$('#tabela_aluno').DataTable();

	$('#edit_form').on('submit', function(e) {
            // Save the form data via an Ajax request
            e.preventDefault();

            var $form = $(e.target),
                id    = $form.find('[name="id"]').val();

            // The url and method might be different in your application
            $.ajax({
            	headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},
                url: '/admin/editarAluno',
                method: 'POST',
                data: $form.serialize()
            }).success(function(response) {
            	response = response[0];
            	
                // Get the cells
                var $button = $('button[id="' + response.id + '"]'),
                    $tr     = $button.closest('tr'),
                    $cells  = $tr.find('td');

                // Update the cell data
                $cells
                    .eq(0).html(response.name).end()
                    .eq(1).html(response.matricula).end()
                    .eq(2).html(response.email).end()
                    .eq(3).html(response.cpf).end()

                // Hide the dialog
                $form.parents('.bootbox').modal('hide');

                // You can inform the user that the data is updated successfully
                // by highlighting the row or showing a message box
                bootbox.alert('O perfil de usuário foi atualizado');
            });
        });
    
        // $('#tabela_aluno tbody').on('click','tr td .editButton', function() {
        //     alert('foi');
        // });

    	$('#tabela_aluno tbody').on('click','tr td .editButton', function() {
	        // Get the record's ID via attribute
	        var id = $(this).attr('id');

	        $.ajax({
	            url: '/admin/editarAluno?id=' + id,
	            method: 'GET'
	        }).success(function(response) {
	        	response = response[0];
	            // Populate the form fields with the data returned from server
	            $('#edit_form')
	                .find('[name="id"]').val(response.id).end()
	                .find('[name="id_disabled"]').val(response.id).end()
	                .find('[name="nome"]').val(response.name).end()
	                .find('[name="matricula"]').val(response.matricula).end()
	                .find('[name="cpf"]').val(response.cpf).end()
	                .find('[name="rg"]').val(response.rg).end()

	            // Show the dialog
	            bootbox
	                .dialog({
	                    title: 'Editar usuário',
	                    message: $('#edit_form'),
	                    show: false // We will show it manually later
	                })
	                .on('shown.bs.modal', function() {
	                    $('#edit_form')
	                        .show();                             // Show the login form
	            
	                })
	                .on('hide.bs.modal', function(e) {
	                    // Bootbox will remove the modal (including the body which contains the login form)
	                    // after hiding the modal
	                    // Therefor, we need to backup the form
	                    $('#edit_form').hide().appendTo('body');
	                })
	                .modal('show');
        });
    });
});
</script>

<div class="container">
	<div class="row">
		<div class="col-md-14">
			<div class="panel panel-default">
				<div class="panel-heading">Alunos Cadastrados</div>
					<div class="panel-body">
						<table class="table table-hover table-bordered" id="tabela_aluno">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Matrícula</th>
									<th>Email</th>
									<th>CPF</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aluno): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<tr>
									<td><?php echo e($aluno->name); ?></td>
									<td><?php echo e($aluno->matricula); ?></td>
									<td><?php echo e($aluno->email); ?> </td>
									<td><?php echo e($aluno->cpf); ?></td>
									<td> <button class="btn btn-primary btn-md editButton" id="<?php echo e($aluno->id); ?>" alt="Editar"><span class="glyphicon glyphicon-edit" alt="Editar" ></span></button></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
</div>

<!-- The form which is used to populate the item data -->
<form id="edit_form" method="post" class="form-horizontal" style="display: none;">
	<div class="form-group">
        <label class="col-xs-3 control-label">ID</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="id_disabled" disabled="disabled" />
            <input type="hidden" name="id">
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Nome</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="nome"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Matrícula</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="matricula" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">CPF</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="cpf" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">RG</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="rg" />
        </div>
    </div>
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default">Salvar</button>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>