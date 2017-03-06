<?php $__env->startSection('content'); ?>
<div class="container">
		<?php 
		echo $matricula . '</br>';
		echo $dados_monitoria['bolsa'] . '</br>';
		echo $dados_monitoria['cod_disciplina'] . '</br>';
		echo $dados_monitoria['turma'];
		?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>