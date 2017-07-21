@extends('admin.layout.auth')

@section('content')

<script type='text/javascript'>
$(document).ready(function(){
	$('#relatorio').DataTable({
		"language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
        }
	});
});
</script>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<div class="panel-heading">Relatório <a href='/admin/exportarcsv'>(Exportar CSV)</a></div>
            	<div class="panel-body">
            		<table class="table table-hover table-bordered" id="relatorio">
							<thead>
								<tr>
									<th>Matrícula</th>
									<th>Nome</th>
									<th>Email</th>
									<th>Disciplina</th>
									<th>Turma</th>
									<th>Professor</th>
									<th>Remuneração</th>
									<th>Status</th>
									<th>Obs</th>
								</tr>
							</thead>
							<tbody>
								@foreach($monitores as $monitor)
								<tr>
									<td>{{ $monitor->fk_matricula }}</td>
									<td>{{ $monitor->user->name }}</td>
									<td>{{ $monitor->user->email }}</td>
									<td>{{ $monitor->disciplina->nome }} </td>
									<td>{{ $monitor->turma->turma }}</td>
									<td>{{ $monitor->turma->professor }}</td>
									<td>{{ $monitor->remuneracao }}</td>
									<td>{{ $monitor->status->nome }}</td>
									<td>{{ $monitor->descricao_status}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection
