@extends('layouts.app')

@section('content')

<script type='text/javascript'>
$(document).ready(function(){
    $('#matricula').mask('00/0000000');
    $('#cpf').mask('000.000.000-00');

    $('#form_registro').on('submit', function(e){
        $('#matricula').unmask();
        $('#cpf').unmask();

        console.log('Entrou');
    });
});
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
               
                <div class="panel-body">
                    <div class="alert alert-info">
                        O aluno é responsável pela veracidade dos dados.
                    </div>
                    <form id='form_registro' class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome Completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
                        	<label for="matricula" class="col-md-4 control-label">Matrícula</label>
                        	
                        	<div class="col-md-6">
                        		<input id="matricula" class="form-control" name="matricula" value="{{ old('matricula') }}" required></input>
                        		@if ($errors->has('matricula'))
                        			<span class="help-block">
                        				@foreach($errors->get('matricula') as $error)
                        					<strong>{{ $error }}</strong>
                        					</br>
                        				@endforeach
                        			</span>
                        		@endif
                        	</div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                        	<label for="cpf" class="col-md-4 control-label">CPF</label>
                        	
                        	<div class="col-md-6">
                        		<input id="cpf" class="form-control" name="cpf" value="{{ old('cpf') }}" required></input>
                        		@if ($errors->has('cpf'))
                        		    <span class="help-block">
                        				@foreach($errors->get('cpf') as $error)
                        					<strong>{{ $error }}</strong>
                        					</br>
                        				@endforeach
                        			</span>
                        		@endif
                        	</div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                        	<label for="rg" class="col-md-4 control-label">RG</label>
                        	
                        	<div class="col-md-6">
                        		<input id="rg" class="form-control" name="rg" value="{{ old('rg') }}" required></input>
                        		@if ($errors->has('rg'))
                        			<span class="help-block">
                        				@foreach($errors->get('rg') as $error)
                        					<strong>{{ $error }}</strong>
                        					</br>
                        				@endforeach
                        			</span>
                        		@endif
                        	</div>
                        </div>
                        	                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
