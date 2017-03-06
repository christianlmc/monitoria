@extends('professor.layout.auth')

@section('content')

<script type="text/javascript">
var selecionados = new Array();


$(document).ready(function(){
	$('#monitores').multiSelect({
		selectableHeader: "<div><strong> Indeferidos </strong></div>",
		selectionHeader: "<div><strong> Deferidos </strong></div>",
		keepOrder: true,
	});
	@foreach($monitores as $monitor)
		@if($monitor->aprovado == '1' and $monitor->fk_turmas_id == $turma[0]->id)
			selecionados.push('{{$monitor->fk_matricula}}'); // selecionando ja aqueles ja foram selecionados
		@endif		
	@endforeach
	$('#monitores').multiSelect('select', selecionados);

	$('#btn_prosseguir').click(function(event){
		var selecionadosPost = new Array();

		$("#monitores option:selected").each(function(){
			selecionadosPost.push($(this).val());
		});
		event.preventDefault();
		console.log(selecionadosPost);
		$("#conteudo").val();
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type: 'POST',
			ServerSide: true,
			Processing: true,
			url:'/professor/turmas/prioridades',
			data: {id_turma: {{ $turma[0]->id }}, selecionados: selecionadosPost},
			success:function(resultado){
				$("#remunerados").remove();
				document.getElementById("conteudo").innerHTML = resultado;
            			
				    $( "#remunerados" ).sortable({
				    	placeholder: "ui-state-highlight",
		            	cursor: 'crosshair',
		            	update: function(event, ui) {
		                	var order = $("#remunerados").sortable('toArray',{attribute:"value"});
		                	$('#ordem_prioridade').val(order);
            			},
            			stop: function(event,ui){
							$('#remunerados li').each(function() {
            					$(this).children('span').html($(this).index()+1);
        					});
            			},
            			start: function(event,ui){
							$('#remunerados li').each(function() {
            					$(this).children('span').html($(this).index()+1);
        					});
            			},
    				
            		});

            		
                	var order = $("#remunerados").sortable('toArray',{attribute:"value"});
                	$('#ordem_prioridade').val(order);
    				$( "#remunerados" ).disableSelection();
			},
			error: function(error){
				console.log("ERRO:"+ error);
			}
		});
	});
});
</script>
<style>
#ms-monitores {
	width: 700px !important;
}
.ms-optgroup-label {
	background-color: #b5b5b5;
	color: black !important;
	
}
</style>



<div class="container">
	<div class="row">
	<div class="panel panel-default" align='center'>
			<div class="panel-heading">
				{{$turma[0]->disciplina->nome}} Turma:  {{ $turma[0]->turma}}
			</div>
			
			<div class="panel-body" id="conteudo">
			@if(count($monitores) == 0)
				<div class="alert alert-danger">
					Não há monitores inscritos nessa turma
				</div>
			@else
			  	<select id="monitores" multiple="multiple" name="selecionados[]">
			    		@foreach($monitores as $monitor)
			    				<option value='{{ $monitor->user->matricula }}' 
			    				@if($monitor->fk_status_monitoria_id != 1 && $monitor->fk_status_monitoria_id != 4)
			    				selected
			    				@endif>
			    					{{ $monitor->user->name }}
					    		</option>
					    @endforeach

			  	</select>
			  	
			  	<meta name="csrf-token" content="{{ csrf_token() }}"></br>
				<button class="btn btn-primary" id="btn_prosseguir">Processar</button>
				</div>
			@endif
			</div>
		</div>
	</div>
</div>


@endsection

