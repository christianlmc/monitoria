@extends('layouts.app')

@section('content')


<script type='text/javascript'>
$(document).ready(function(){
});

function deletar (id)
{
	var dados = document.getElementById("monitoria_"+id);
	dados = "Disciplina:"+dados.children[1].innerHTML + "</br>Professor: " + dados.children[2].innerHTML + "</br>Turma: " + dados.children[3].innerHTML;
	$.confirm({
	    text: dados,
	    title: "Deseja deletar sua inscrição nessa turma?",
	    confirm: function(button) {
	        $("#monitoria_"+id+" form").submit();
	    },
	    cancel: function(button) {
	        // nothing to do
	    },
	    confirmButton: "Sim",
	    cancelButton: "Não",
	    post: true,
	    confirmButtonClass: "btn-danger",
	    cancelButtonClass: "btn-default",
	    dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
		});
}
</script>
<div class="container">
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-default panel-primary">
        	<div class="panel-heading"><h3>Minhas Inscrições</h3></div>
        	@if(empty($monitorias->all()))
        	<div class="panel-body">
	        	<div class="alert alert-info ">
	                Você não se inscreveu em nenhuma monitoria.
	                @if($mostrar)<a href="/aluno/inscricao">Clique aqui para se inscrever</a>@endif
	            </div>
            </div>
        	@else
        	<div class="table-responsive">
		        <div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Remuneração</th>
								<th>Disciplina</th>
								<th>Professor
								<th>Turma</th>
								<th>Status</th>
								<th>Obs</th>

								@if($mostrar)
									<th>Ações</th>
								@endif

							</tr>
						</thead>
						<tbody>
						@foreach($monitorias as $monitoria)
							<tr id="monitoria_{{ $monitoria->id }}">
								<td id="remuneracao">
									@if($monitoria->remuneracao == 'remunerada')
										Remunerada
									@else
										Voluntária
									@endif
								</td>
								<td>{{ $monitoria->disciplina->nome }}</td>
								<td>{{ $monitoria->turma->professor }}</td>
								<td>{{ $monitoria->turma->turma }}</td>
								<td>{{ $monitoria->status->nome }}</td>
								<td>{{ $monitoria->descricao_status }} </td>
								@if($mostrar)
								<td> 
									{!! Form::open(['class' => 'form-horizontal', 'url' => '/aluno/deletar/']) !!}
										
										<input type="hidden" name="id_inscricao" value="{{ $monitoria->id }}"/>
										{{-- {!! Form::submit('Deletar',['id' => 'deletar', 'class' => 'btn btn-danger']); !!} --}}
										<button type="button" class='btn btn-danger' onclick="deletar({{ $monitoria->id }})">Remover</button>
									{!! Form::close() !!}
								</td>
								@endif
						  	</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
</div>

@endsection