@extends('layouts.app')

@section('content')
<script type='text/javascript'>
$(document).ready(function(){

});
	
</script>

<div class="container">
	@include('layouts.menu-configurar')
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                	@if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                  
	                <div id='email-div'>
	                	{!! Form::open(['class' => 'form-horizontal', 'url' => 'aluno/alterar-email']) !!}
                  	<div class="row">
								<div class="col-sm-3">
									<blockquote>E-Mail</blockquote>
								</div>
								<div class="col-sm-5">
									E-mail atual:
							        <strong>{{ $email }}</strong><br><br>
							     	Novo e-mail
						            <div class="{{ $errors->has('email') ? ' has-error' : '' }}"> 
						            	{{ Form::text('email', null, ['class' => 'form-control']) }}
							            @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
	                                	@endif
                                	</div>
                                	<br>
						            Confirmar novo email
						            <div> {{ Form::text('email_confirmation', null, ['class' => 'form-control']) }}</div>
                                	<br>
								</div>
								<div class="col-sm-4">
								</div>
							</div>
						{!! Form::submit('Salvar',['id' => 'btn_configurar', 'class' => 'btn pull-right']); !!}
						{!! Form::close() !!}
	               	</div>
	               	
<!-- 		            <div id='senha-div'> -->
<!-- 		            	{!! Form::open(['class' => 'form-horizontal', 'url' => 'aluno/alterar-senha']) !!} -->
<!-- 							<div class="row"> -->
<!-- 								<div class="col-sm-3"> -->
<!-- 									<blockquote>Senha</blockquote> -->
<!-- 								</div> -->
<!-- 								<div class="col-sm-5"> -->
								
<!-- 									Senha atual -->
<!-- 							        <div class="{{ $errors->has('senha-atual') ? ' has-error' : '' }}"> -->
<!-- 							        	{{ Form::password('senha-atual', ['class' => 'form-control']) }} -->
<!-- 							        	@if ($errors->has('senha-atual')) -->
<!-- 		                                    <span class="help-block"> -->
<!-- 		                                        <strong>{{ $errors->first('senha-atual') }}</strong> -->
<!-- 		                                    </span> -->
<!-- 		                                @endif -->
<!-- 							        </div> -->
<!-- 							        <br> -->
<!-- 							     	Nova senha -->
<!-- 						            <div class="{{ $errors->has('nova-senha') ? ' has-error' : '' }}">  -->
<!-- 						            	{{ Form::password('nova-senha', ['class' => 'form-control']) }} -->
<!-- 							            @if ($errors->has('nova-senha')) -->
<!-- 		                                    <span class="help-block"> -->
<!-- 		                                        <strong>{{ $errors->first('nova-senha') }}</strong> -->
<!-- 		                                    </span> -->
<!-- 		                                @endif -->
<!-- 		                            </div> -->
<!-- 						            <br> -->
<!-- 						         Confirmar nova senha -->
<!-- 						            <div> {{ Form::password('nova-senha_confirmation', ['class' => 'form-control']) }}</div> -->
<!-- 						            <br> -->
<!-- 								</div> -->
<!-- 								<div class="col-sm-4"> -->
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 						{!! Form::submit('Salvar',['id' => 'btn_configurar', 'class' => 'btn pull-right']); !!} -->
<!-- 						{!! Form::close() !!} -->
<!-- 					</div> -->

	                  </div>
                </div>
                
            </div>
        
        </div>
    </div>
</div>
@endsection