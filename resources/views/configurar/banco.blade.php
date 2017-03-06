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
					<div class="alert alert-info">É obrigatório que o aluno seja titular da conta corrente. </div>
					<div class="alert alert-info">Todos os dados informados são responsabilidade exclusiva do aluno</div>
					@if (count($dados_bancarios) >= 1)
					<div id='banco-div'>
						{!! Form::open(['class' => 'form-horizontal', 'url' =>'aluno/alterar-dadosbanco']) !!}
						<div class="row">
							<div class="col-sm-3">
								<blockquote>Dados Bancários</blockquote>
							</div>
							<div class="col-sm-6">
								Código do Banco:
								(<a target="_blank" id='codigo_banco' href="http://www.codigobanco.com/">Tabela Código Banco</a>)
								<div class="{{ $errors->has('código_do_banco') ? ' has-error' : '' }}">
									{{ Form::text('código_do_banco', $dados_bancarios[0]->codigo,['class' => 'form-control'])}} 
									
									@if ($errors->has('código_do_banco')) 
									<span class="help-block"> 
										<strong>{{$errors->first('código_do_banco') }}</strong>
									</span> 
									@endif
								</div>
								<br> 
								
								Agência
								<div class="{{ $errors->has('agência') ? ' has-error' : '' }}">
									{{ Form::text('agência', $dados_bancarios[0]->agencia,['class' => 'form-control'])}} 
									
									@if ($errors->has('agência')) 
									<span class="help-block"> 
										<strong>{{ $errors->first('agência') }}</strong>
									</span> 
									@endif
								</div>
								<br> 
								
								Conta Corrente
								<div class="{{ $errors->has('conta_corrente') ? ' has-error' : '' }}">
									{{ Form::text('conta_corrente', $dados_bancarios[0]->conta_corrente,['class' => 'form-control'])}} 
									
									@if ($errors->has('conta_corrente')) 
									<span class="help-block"> 
										<strong>{{$errors->first('conta_corrente') }}</strong>
									</span> 
									@endif
								</div>
								<br>
							</div>
							<div class="col-sm-4"></div>
						</div>
						{!! Form::submit('Alterar',['id' => 'btn_configurar', 'class' =>'btn pull-right']); !!} 
						{!! Form::close() !!}
					</div>
					@else
					<div class="alert alert-danger">Você ainda não configurou seus dados bancários!</div>
					<div id="banco">
						{!! Form::open(['class' => 'form-horizontal', 'url' =>'aluno/alterar-dadosbanco']) !!}
						<div class="row">
							<div class="col-sm-3">
								<blockquote>Dados Bancários</blockquote>
							</div>
							<br> 
							<div class="col-sm-6">
								Código do Banco:
								(<a target="_blank" id='codigo_banco' href="http://www.codigobanco.com/">Tabela Código Banco</a>)
								<div class="{{ $errors->has('código_do_banco') ? ' has-error' : '' }}">
									{{ Form::text('código_do_banco', null, ['class' => 'form-control'])}} 
									
									@if ($errors->has('código_do_banco'))
									<span class="help-block">
										<strong>{{ $errors->first('código_do_banco') }}</strong>
									</span>
									@endif
								</div>
								<br> 
								
								Agência:
								<div class="{{ $errors->has('agência') ? ' has-error' : '' }}">
									{{ Form::text('agência', null, ['class' => 'form-control'])}}
	
									@if ($errors->has('agência'))
									<span class="help-block">
										<strong>{{ $errors->first('agência') }}</strong>
									</span>
									@endif
								</div>	
								<br> 
								Conta Corrente:
								<div class="{{ $errors->has('conta_corrente') ? ' has-error' : '' }}">
									{{ Form::text('conta_corrente', null, ['class' => 'form-control'])}}
									
									@if ($errors->has('conta_corrente'))
									<span class="help-block">
										<strong>{{ $errors->first('conta_corrente') }}</strong>
									</span>
									@endif
								</div>
								<br>
							</div>
						</div>
						<div class="col-sm-4"></div>	
					</div>
					{!! Form::submit('Adicionar',['id' => 'btn_configurar', 'class' =>'btn pull-right']); !!} 
					{!! Form::close() !!}
				</div>
				@endif
                </div>
                
            </div>
        
        </div>
    </div>
</div>
@endsection