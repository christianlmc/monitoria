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
                    @if (session('erro'))
                        <div class="alert alert-danger">
                            {{ session('erro') }}
                        </div>
                    @endif                
		            <div id='senha-div'>
 		            	{!! Form::open(['class' => 'form-horizontal', 'url' => 'aluno/alterar-senha']) !!} 
 							<div class="row">
 								<div class="col-sm-3">
									<blockquote>Senha</blockquote>
 								</div>
 								<div class="col-sm-5">
								
									Senha atual
 							        <div class="{{ $errors->has('senha_atual') ? ' has-error' : '' }}">
 							        	{{ Form::password('senha_atual', ['class' => 'form-control']) }}
 							        	@if ($errors->has('senha_atual'))
		                                    <span class="help-block">
 		                                        <strong>{{ $errors->first('senha_atual') }}</strong>
 		                                    </span>
 		                                @endif
 							        </div>
 							        <br>
 							     	Nova senha
 						            <div class="{{ $errors->has('nova_senha') ? ' has-error' : '' }}">
 						            	{{ Form::password('nova_senha', ['class' => 'form-control']) }}
 							            @if ($errors->has('nova_senha'))
 		                                    <span class="help-block">
 		                                        <strong>{{ $errors->first('nova_senha') }}</strong>
 		                                    </span>
 		                                @endif
 		                            </div>
 						            <br>
 						         Confirmar nova senha
 						            <div> {{ Form::password('nova_senha_confirmation', ['class' => 'form-control']) }}</div>
 						            <br>
 								</div>
 								<div class="col-sm-4">
 								</div>
 							</div>
 						{!! Form::submit('Salvar',['id' => 'btn_configurar', 'class' => 'btn pull-right']); !!}
 						{!! Form::close() !!}
 					</div>
	                  </div>
                </div>
                
            </div>
        
        </div>
    </div>
</div>
@endsection