@extends('layouts.app')

@section('content')
<script type='text/javascript'>
$(document).ready(function(){

	var disciplina = "";
	var id_banco = {!! json_encode($id_dados_bancarios) !!}

	@if ($errors->has('código_do_banco'))
		$("#banco").show();
	@elseif ($errors->has('agência'))
		$("#banco").show();
	@elseif ($errors->has('conta_corrente'))
		$("#banco").show();
	@else
		$("#banco").hide();
	@endif

	if ($('input[name="bolsa"]:checked').val() == 'remunerada' || $('input[name="bolsa"]:checked').val() == 'ambas') //caso o aluno erre na inscrição e tenha selecionado "remunerada" ou "ambas"
	{
		if (id_banco == null)
		{
			$("#banco").show();
		}
		else
		{
			$.ajax({
				type: 'GET',
				url:'/aluno/inscricao/dados_bancarios/' + id_banco,
				success:function(dados_bancarios){
					console.log(dados_bancarios);
					var agencia = dados_bancarios[0]['agencia'];
					var codigo = dados_bancarios[0]['codigo'];
					var conta = dados_bancarios[0]['conta_corrente'];
					$('#dados-bancarios').append(
							'<div class="col-md-12" id="detalhes-banco">' +
								'<h4>Seus dados bancários</h4>' +
								'<div class="col-md-4">' +
									'<strong>Código do Banco</strong>' + 
								'</div>' +
								'<div class="col-md-8">' + codigo + '</div>' +
								'<div class="col-md-4">' +
									'<strong>Agência</strong>' +
								'</div>' + 
								'<div class="col-md-8">' + agencia + '</div>' +
								'<div class="col-md-4">' +
									'<strong>Conta Corrente</strong>' +
								'</div>' +
								'<div class="col-md-8">' + conta + '</div>' +
								'<a class="col-md-8" href="/aluno/configurar/banco">Alterar dados bancários</a>' +
							'</div>');
				},
				error: function(error){
					console.log("ERRO:"+ error);
					}
			});
		}
	}
	
	$('input[name="bolsa"]').change(function(){
		var bolsa = $('input[name="bolsa"]:checked').val();
		$('#detalhes-banco').remove();
		if(bolsa == "remunerada" || bolsa == "ambas")
		{
			if (id_banco == null)
			{
				$("#banco").show();
			}
			else
			{
				$.ajax({
					type: 'GET',
					url:'/aluno/inscricao/dados_bancarios/' + id_banco,
					success:function(dados_bancarios){
						console.log(dados_bancarios);
						var agencia = dados_bancarios[0]['agencia'];
						var codigo = dados_bancarios[0]['codigo'];
						var conta = dados_bancarios[0]['conta_corrente'];
						$('#dados-bancarios').append(
								'<div class="col-md-12" id="detalhes-banco">' +
									'<h4>Seus dados bancários</h4>' +
									'<div class="col-md-4">' +
										'<strong>Código do Banco</strong>' + 
									'</div>' +
									'<div class="col-md-8">' + codigo + '</div>' +
									'<div class="col-md-4">' +
										'<strong>Agência</strong>' +
									'</div>' + 
									'<div class="col-md-8">' + agencia + '</div>' +
									'<div class="col-md-4">' +
										'<strong>Conta Corrente</strong>' +
									'</div>' +
									'<div class="col-md-8">' + conta + '</div>' +
									'<a class="col-md-8" href="/aluno/configurar/banco">Alterar dados bancários</a>' +
								'</div>');
					},
					error: function(error){
						console.log("ERRO:"+ error);
						}
				});
				
				}
		}
		else
			$("#banco").hide();
	});

	$('#cod_disciplina').change(function(){
		$('#div_turma').remove();

		$.ajax({
			type: 'GET',
			url:'/aluno/inscricao/disciplina/' + $('#cod_disciplina').val(),
			success:function(turmas){
				console.log(turmas);
				var var_select = '';
				turmas.forEach(function(turma)
				{
					var_select += '<option value="' + turma['id'] + '" >' + turma['turma'] + ' - ' +turma['professor'] + '</option>';
				});
				$('#formulario').append('<div class="form-group" id="div_turma"><div class="col-md-12"> <strong>Turma:</strong> </br>  <select class ="form-control" name="turma" id="turma">' + var_select + '</select> </div> </div>');
			},
			error: function(error){
				console.log("ERRO:"+ error);
				}
		});
	});

	$('#btn_inscricao').focus(function(){
		var disciplina = document.getElementById("cod_disciplina");
		var turma = document.getElementById("turma");
		var bolsa = $('input[name="bolsa"]:checked').val();
		
		switch(bolsa){
		case 'remunerada':
			bolsa = "Remunerada";				
		break;
		case 'voluntaria':
			bolsa = "Voluntária";
		break;
		}

		var is_Inscrito = isInscrito();
		console.log("Ter :"+ is_Inscrito);
		if(is_Inscrito){ 
		      $.confirm({
		    	title: "Falha",
		    	text: "Você já está inscrito nesta turma!",
		    	cancelButton: false,
		    	confirmButtonClass: "btn-danger",
				confirmButton: "Entendi",
			});
		}
		else{
			var bolsa_temp = bolsa;
			var disciplina_temp = disciplina.options[cod_disciplina.selectedIndex].text;
			var turma_temp = turma.options[turma.selectedIndex].text;

			$.confirm({
		    	title: "Você confirma sua inscrição com estes dados?",
		    	text: "Tipo de Bolsa: " + bolsa_temp + "</br>"+ 
		    		  "Disciplina: " + disciplina_temp + "</br>" + 
		    		  "Turma/Professor: " + turma_temp, // faz um if aqui pra colocar os dados  bancarios
		    	confirmButtonClass: "btn-danger",
				cancelButtonClass: "btn-default",
				confirmButton: "Sim",
				cancelButton: "Não",
				async: false,
				post: true,
				submitForm: true,
				confirm: function(){
					$("#myForm").submit();
				},
			});
		}
		
	console.log("Terminou is inscrito");
	});
});
function isInscrito(){
	var _resultado;
	$.ajax({
				headers: {
	        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		},
	    		async: false,
        		cache: false,
        		timeout: 30000,
				type: 'POST',
				ServerSide: true,
				Processing: true,
				url:'/aluno/conferir',
				data: {turma: $('#turma').val(), remuneracao: $("input[name='bolsa']:checked").val()},
				success:function(resultado){
					
					if(resultado)
						_resultado = true;
					else
						_resultado = false;



				},
				error: function(error){
					console.log("ERRO:"+ error);
				}
	});
	return _resultado;
}


</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-info">
            	Regras de Monitoria - <a target="_blank" id='link_monitoria' href="http://www.saa.unb.br/acompanhamento-academico/22-monitoria">Link</a>
            </div>
	    @if(session('error'))
            <div class="alert alert-danger">
		{{session('error')}}
            </div>
     	    @endif
            <div class="panel panel-primary panel-default">
                <div class="panel-heading"><h3>Inscrição na monitoria</h3></div>
                <div class="panel-body">
                    {!! Form::open(['id' => 'myForm', 'class' => 'form-horizontal', 'url' => 'aluno/confirmar']) !!}
	                    <div id="formulario">
		                    <div class="form-group">
		                    	<div class="col-md-12">
			                    	<strong>Tipo de bolsa:</strong>
				             		{{-- {{ Form::radio('bolsa', 'remunerada') }}Remunerada<br>
									{{ Form::radio('bolsa', 'voluntaria',true) }}Voluntária<br>
									{{ Form::radio('bolsa', 'ambas') }}Ambas<br> --}}
									<div class="radio{{ $errors->has('bolsa') ? ' has-error' : '' }}">
				             		    <label for="remunerada">
				             		        {!! Form::radio('bolsa','remunerada',  null, ['id' => 'remunerada']) !!} 
				             		        Remunerada
				             		    </label>
				             		    <br>
				             		    <label for="voluntaria">
				             		        {!! Form::radio('bolsa','voluntaria',  true, ['id' => 'voluntaria']) !!} 
				             		        Voluntaria
				             		    </label>
				             		    <br>
				             		    <label for="ambas">
				             		        {!! Form::radio('bolsa','ambas',  null, ['id' => 'ambas']) !!} 
				             		        Ambas
				             		    </label>
				             		    <small class="text-danger">{{ $errors->first('bolsa') }}</small>
				             		</div>
			             		</div>
		             		</div>




		                    <div class="form-group">
		                    	<div id="dados-bancarios">
		                    	</div>
			                    <div id="banco">
			                    	<div class="col-md-12"><strong>Dados do Banco:</strong><br>
                    					<div class="alert alert-info">
                        					A conta corrente precisa ser obrigatóriamente do aluno.
                    					</div>
										<div class="col-md-12">Código do Banco:</div>

					             		 <div class="col-md-4{{ $errors->has('código_do_banco') ? ' has-error' : '' }}">
					             		 	{{ Form::text('código_do_banco', null, ['class' => 'form-control'])}}
					             		 	
						             		 @if ($errors->has('código_do_banco'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('código_do_banco') }}</strong>
			                                    </span>
			                                @endif
		                                </div>
					             		<br>
										<div class="col-md-12">Agência:</div>
										<div class="col-md-4{{ $errors->has('agência') ? ' has-error' : '' }}">
					             		 	{{ Form::text('agência', null, ['class' => 'form-control'])}}
					             		 	
					             		 	@if ($errors->has('agência'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('agência') }}</strong>
			                                    </span>
			                                @endif
					             		</div> 
					             		<br>
										<div class="col-md-12">Conta Corrente:</div>
					             		 <div class="col-md-4{{ $errors->has('conta_corrente') ? ' has-error' : '' }}">
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
			             	</div>
			             	<div class="form-group">
		                    	<div class="col-md-12{{ $errors->has('turma') ? ' has-error' : '' }}">
		                    		{!! Form::label('cod_disciplina', 'Disciplina:') !!}
				             		{!! Form::select('cod_disciplina', $disciplinas, null, ['class' => 'form-control', 'id' => 'cod_disciplina', 'placeholder' => 'Selecione a disciplina']) !!}
				             		@if ($errors->has('turma'))
										<span class="help-block">
											<strong>Selecione uma disciplina.</strong>
										</span>
									@endif
		             			</div>
		             		</div>
	             		</div>

	             		<div class="form-group">
	             			<div class="col-md-12">
	             				<meta name="csrf-token" content="{{ csrf_token() }}"></br>
	             				{!! Form::submit('Inscrever',['id' => 'btn_inscricao', 'class' => 'btn pull-right']); !!}
		             		</div>
	             		</div>
             		{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
