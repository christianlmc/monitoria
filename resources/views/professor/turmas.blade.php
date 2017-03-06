@extends('professor.layout.auth')

@section('content')

<script>
$(document).ready(function(){
	$('.sem-monitores').fadeTo('fast',0.3);
	$('[data-toggle="tooltip"]').tooltip(
		{
			template:'<div style="width: 250px;" class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
		});
});
</script>
<style>
</style>

<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">	
	
		<table id='turmas_table' class="table table-bordered">
			<tr>
				<th>Disciplina</th>
				<th>Turma</th>
				<th>Inscrições</th>
				@if ($mostrar)
				<th colspan="2" style="text-align:center">Ações</th>
				@else
				<th colspan="1" style="text-align:center">Ações</th>
				@endif
				<th>Estado</th>
			</tr>

			@foreach($turmas as $turma)
			<tr>
				<td>{{ $turma->disciplina->nome }}</td>
				<td>{{ $turma->turma }}</td>
				<td>{{ $turma->monitoresCount() }}</td>
				@if($mostrar)
				<td>	
					<form align="center" method="POST" action="/professor/turmas/selecaoturmas" accept-charset="UTF-8" class="form-horizontal">
						<input name="_token" type="hidden" value="{{ csrf_token() }}">	  				
						<input type="hidden" name="id_turma" value="{{ $turma->id }}">
						<input class="btn btn-primary" value="Avaliar" type="submit">
					</form>
					
				</td>
				@endif
				<td>
					<form align="center" method="POST" action="/professor/turmas/acompanhar" accept-charset="UTF-8" class="form-horizontal">

						<input name="_token" type="hidden" value="{{ csrf_token() }}">	  				
						<input type="hidden" name="id_turma" value="{{ $turma->id }}">					
						<input class="btn btn-primary" value="Acompanhar" type="submit">
	  				</form>

				</td>

{{-- 				<td>
					<form method="POST" action="/professor/turmas/frequencia" accept-charset="UTF-8" class="form-horizontal">

						<input name="_token" type="hidden" value="{{ csrf_token() }}">	  				
						<input type="hidden" name="id_turma" value="{{ $turma->id }}">					
						<input class="btn btn-primary" value="Frequência" type="submit">
	  				</form>

				</td> --}}
				<td>
					
					{{ $turma->status->nome }}

				</td>
		  	</tr>
		  	@endforeach
		</table>
	


</div>
</div>
</div>
</div>
@endsection

