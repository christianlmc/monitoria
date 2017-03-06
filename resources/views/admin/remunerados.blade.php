@extends('admin.layout.auth')

@section('content')
<style>
#contador {
	position: fixed;
	float: left;
	padding: 10px;
	margin-left: 40px;
}
#remunerados{
	z-index: 2;
}
.affix {
      top: 0;
      width: 100%;
}

</style>
<script>
@if(!empty($bolsa))
function aceitar($id_monitoria, $status, $descricao){
	var bolsas = $('.bg-success').length;
	document.getElementById('bolsas_usadas').innerHTML = bolsas;

	if (bolsas == {{ $bolsa->quantidade }} && $status == 5)
	{
		$.confirm({
			title: "Todas as bolsas já foram utilizadas!",
			content: "Não é possível alocar mais nenhum aluno.",
			confirmButtonClass: "btn btn-primary",
			confirmButton: "Entendido",
			cancelButton: false,
		});
		return 0;
	}
	else
	{
		if($status == 6){
			$.confirm({
		    	title: "Por favor explique a razão de não ter cadastrado com sucesso:",
		    	content: "<label for='descricao'>Justificativa:</label><form><textarea id='descricao'></textarea></form>",
				buttons: {
				    confirmar: {
				        text: 'Confirmar',
				        btnClass: 'btn-green',
				        action: function(){
				        	$descricao = $('textarea#descricao').val();
							if($descricao.length < 5)
							{
								$.confirm({
									title: 'Erro!',
									content: 'Não é possível recusar um aluno sem explicar o motivo.',
									type: 'red',
									backgroundDismiss: true,
									typeAnimated: true,
									buttons: {
									    Ok: {
									        text: 'Entendi',
									        btnClass: 'btn-red',
									        action: function(){
									        }
									    },
									}
								});
								return 0;
							}
							else
							{
								enviar($id_monitoria, $status, $descricao);
							}
						}
				    },
				    cancelar: {
				    	text: 'Cancelar',
				        btnClass: 'btn-defaut',
				        action: function(){}
				    }
				}
			});
		}

		if($status == 5){
			enviar($id_monitoria, $status, "Inscrição no sigra feita com sucesso");
		}
		if($status == 3){
			enviar($id_monitoria, $status, "N/A");
		}
	}

}




function enviar($id_monitoria, $status, $descricao){
	$dados_turma = $dados_turma = $("#id_"+$id_monitoria).val();
	if($status==6){
	$dados_turma = "";
	}
	var bolsas = $('.bg-success').length;
	$.ajax({
		headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
		ServerSide: true,
		Processing: true,
		type: 'POST',
		url:'/admin/atualizar',
		data: {id_monitoria: $id_monitoria, status: $status, descricao: $descricao, dados_turma: $dados_turma},
		success:function(resultado){
			console.log("Id: "+ $id_monitoria+"  Status:"+ $status+ " Descricao: "+ $descricao);
			
			if($status==5){
				$('#monitor_'+$id_monitoria).addClass('bg-success');			 
				$('#monitor_'+$id_monitoria).removeClass('bg-danger');
			}

			else if($status==6){
				$('#monitor_'+$id_monitoria).addClass('bg-danger');			 
				$('#monitor_'+$id_monitoria).removeClass('bg-success');
			}

			else if($status==3){
				$('#monitor_'+$id_monitoria).removeClass('bg-danger');	
				$('#monitor_'+$id_monitoria).removeClass('bg-success');	
			}			 
			var monitor = document.getElementById('monitor_'+$id_monitoria);
	                monitor.children[2].innerHTML = "Acao ja realizada";
	                monitor.children[3].innerHTML = "";

			atualizarBolsas();
		},
		error: function(error){
			alert("Houve um erro, favor tentar novamente mais tarde.");
			console.log("ERRO:"+ error);
		}
	});


}

function atualizarBolsas(){
	var bolsas = $('.bg-success').length;
	document.getElementById('bolsas_usadas').innerHTML = bolsas;

	if (bolsas == {{ $bolsa->quantidade }})
	{
		$.confirm({
		    title: "Todas as bolsas foram alocadas",
		    content: "Recusar todos os outros monitores?",
		    buttons: {
			    confirmar: {
			    	text: 'Sim',
			    	btnClass: 'btn-primary',
			    	action: function() {
			    	window.location.href = '/admin/remunerados/bolsasEsgotadas';
			    	}
			    },
			    cancelar: {
			    	text: 'Não',
					    	text: 'Cancelar',
					        btnClass: 'btn-defaut',
					        action: function(){}
				}
		    },
		    post: true,
		    submit: true
		});
	}

	
}

$(document).ready(function(){
	atualizarBolsas();

    $('#remunerados').width($('#container').width());

});
@endif
</script>





<div id='container' class="container">
	@if(empty($bolsa))
		<div id='remunerados' data-spy="affix" data-offset-top="100" class="panel panel-info">
			<div class="panel-heading">
					<h3 align='center'>
					Remunerados SIGRA
					</h3>
			</div>
		</div>
		<div class="alert alert-danger">
		    {{ $status }}
		</div>
	@else
		<div class='row'>
		<div class='col-md-12'>
		<div id='remunerados' data-spy="affix" data-offset-top="100" class="panel panel-info">
			<div class="panel-heading">
				<div class='row'>
					<h3>
					<div class='col-md-9'>Remunerados SIGRA</div>
					<div class='col-md-3'>Bolsas: <span id="bolsas_usadas"></span>/<span id="bolsas_max">{{ $bolsa->quantidade }}</span> </div>
					</h3>
				</div>					
			</div>
	
		</div>
		</div>

	

		
		@foreach ($turmas as $turma)
		@if($turma->monitoresAdminCount('remunerada') > 0)
		<div class='col-md-12'>
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title" align='center'>{{ $turma->fk_cod_disciplina }} - {{ $turma->disciplina->nome }} Turma: {{ $turma->turma }}</h3></div>
		  	<div class="panel-body">
				<table id='turmas_table' class="table table-bordered">
					<thead>
						<tr>
							<th class="col-md-2">Matrícula</th>
							<th>Nome</th>
							<th colspan="2" class="col-md-1" style="text-align:center">SIGRA</th>
							{{-- <th> Desfazer </th>	 --}}			
						</tr>
					</thead>
					@foreach($monitores as $monitor)
					@if($monitor->fk_turmas_id  == $turma->id)
						@if($monitor->fk_status_monitoria_id == 6)
						<tr class="bg-danger" id='monitor_{{ $monitor->id }}'>
						@elseif($monitor->fk_status_monitoria_id == 5)
						<tr class="bg-success" id='monitor_{{ $monitor->id }}'>
						@else
						<tr class="" id='monitor_{{ $monitor->id }}'>
						@endif
						<td>{{ $monitor->fk_matricula }}</td>
						<td>{{ $monitor->user->name }}</td>
						@if(!$monitor->fk_status_monitoria_id == 5 && !$monitor->fk_status_monitoria_id == 6) 
						<td>
							<button id='aceitar' class='btn btn-success' onclick="aceitar({{ $monitor->id }}, 5, null)" ><span class='glyphicon glyphicon-ok'></span></button>
						</td>
                                                <td>
                                                        <input name='monitor_id' type='hidden' value='{{ $monitor->id }}'>
							<button id='recusar' class='btn btn-danger' onclick="aceitar({{ $monitor->id }}, 6, null)"><span class='glyphicon glyphicon-remove'></span></button>
							<input type='hidden' name='matriculado' id="id_{{ $monitor->id }}"value="Aceito em: {{ $monitor->disciplina->nome }} {{$monitor->turma->turma}}">

                                                </td>
                                                @else
                                                <td>
                                                        Acao ja  realizada.
                                                </td>
                                                @endif

{{-- 						<td>
							<button id='cancelar' class='btn btn-primary' onclick="aceitar({{ $monitor->id }}, 3, 'N/A')"><span class='glyphicon glyphicon-share-alt icon-flipped icon-rotate'></span></button>
						</td> --}}
				  		</tr>
					@endif
					@endforeach
				</table>
			</div>
		</div>
		</div>
		@endif
		@endforeach
	@endif

	
	
</div>	

@endsection

