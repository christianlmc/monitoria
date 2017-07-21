@extends('professor.layout.auth')

@section('content')
<script type="text/javascript">
$(document).ready(function(){

	$('#acompanhar').DataTable({
		"language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
        }
	});
});


</script>

<div class="container">
<div class="row">
<div class="col-md-14">
<div class="panel panel-default">
	<div class="panel-heading" align='center'>{{$turma->disciplina->nome}} Turma:  {{ $turma->turma}}</div>
<div class="panel-body">
	@if(count($monitores) == 0)
		<div class="alert alert-danger">
			Não há monitores inscritos nessa turma
		</div>
	@else
		<table class="table table-bordered" id='acompanhar'>
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Prioridade</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($monitores as $monitor)
			
				<tr>
						<td>{{ $monitor->fk_matricula }}</td>
						<td>{{ $monitor->user->name }}</td>
						<td>{{ $monitor->user->email }}</td>
						<td>@if($monitor->remuneracao == 'remunerada')
									Remunerada
							@elseif($monitor->remuneracao == 'voluntaria')
									Voluntária
							@endif </td>
						<td>{{ $monitor->prioridade }} </td>
						<td> {{ $monitor->status->nome }} </td>
			  	</tr>
			  	
		  	@endforeach
		  	</tbody>
		</table>
	@endif
		<a href="/professor/turmas"><button class="btn btn-primary" id="iconeStatus" title="Voltar">Voltar</button></a>

</div>
</div>
</div>
</div>
</div>
@endsection

