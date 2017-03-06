<div >
	<ul class="nav nav-justified nav-pills panel panel-default" >
	    <li  <?php echo e((Request::is('aluno/configurar/email') ? 'class=active' : '')); ?>>
	    	<a id="email-sidebar" href='email'>E-Mail</a>
	    </li>
	    <li <?php echo e((Request::is('aluno/configurar/senha') ? 'class=active' : '')); ?>>
	    	<a id='senha-sidebar' href='senha'>Senha</a>
	    </li>
	    <li <?php echo e((Request::is('aluno/configurar/banco') ? 'class=active' : '')); ?>>
	    	<a id='banco-sidebar' href='banco'>Dados Bancários</a>
	    </li>      
	</ul>
</div>