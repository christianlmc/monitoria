@extends('professor.layout.auth')

@section('content')
<script type="text/javascript">
	$("#iconeStatus").focus(function() {
		$(document).tooltip();
		} );
</script>
<style>
	label {
		display: inline-block;
		width: 5em;
	}
</style>

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">


    <div class="panel panel-default">	
	<div id="turmas_table">
		<table class="table table-bordered">
			<tr>
				<th>Matrícula</th>
				<th>Nome</th>
				<th>Tipo</th>
				<th>Prioridade</th>
				<th>Status</th>
			</tr>
			@foreach($monitores as $monitor)
				<tr>
						<td>{{ $monitor->fk_matricula }}</td>
						<td>{{ $monitor->user->name }}</td>
						<td>@if($monitor->remuneracao == 'remunerada')
									Remunerada
							@elseif($monitor->remuneracao == 'voluntaria')
									Voluntária
							@endif </td>
						<td>{{ $monitor->prioridade }} </td>
						<td> {{ $monitor->status->nome }} </td>
			  	</tr>
		  	@endforeach
		</table>
		<a href="/professor/turmas"><button class="btn btn-primary" id="iconeStatus" title="Teste de tooltip">Voltar</button></a>

	</div>
	</div>
</div>
</div>
</div>
@endsection

