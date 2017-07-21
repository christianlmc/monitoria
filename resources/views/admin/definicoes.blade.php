
@extends('admin.layout.auth')

@section('content')

<script>
$(document).ready(function(){
    $(".calendario").datetimepicker({
        format: 'd/m/Y H:i',
        mask: '99/99/9999 99:99',
       	onChangeDateTime:function(dp,$input){
    		$(this).val() = $input;
  		}
 
    });
    $.datetimepicker.setLocale('pt-BR');
});
</script>


<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="panel-group">
				<div class="panel panel-primary">
					<div class='panel-heading'> Configurações do Sistema </div>
					{{ Form::open(['url' => 'admin/definicoes/salvar']) }}
					<div class="panel-body">
						<h3>Períodos</h3>
						<br>
						{{-- Trocar para não ser com vetor --}}
						@foreach($periodos as $periodo)
						<div class="form-group">
							@if($periodo->descricao->descricao != "Resultado (Monitores/Professores)")
							<div class=' col-md-4'> {{ $periodo->descricao->descricao}}</div>
							<div class=' col-md-4'><input name='inicio[]' class="calendario" type='text' value='{{ $periodo->inicio }}'>  </div>
							<div class=' col-md-4'><input name='fim[]' class="calendario" type='text' value='{{ $periodo->fim }}'> </div>
							@else
							<div class=' col-md-4'> {{ $periodo->descricao->descricao}} </div>
							<div class=' col-md-4'>
								<input name='inicio[]' class="calendario" type='text' value='{{ $periodo->inicio }}'>
							</div>  
							<div class=' col-md-4'>
								<input name='fim[]' class="calendario" type='hidden' value='{{ $periodo->inicio }}'>
							</div>
							@endif
						</div>
						</br></br>
						<input type='hidden' name='tipo[]' value='{{ $periodo->id}}'>
						@endforeach
					
					<h3>Bolsas</h3>

					<div class='col-md-4'>Quantidade de bolsas</div>
					
					{{ Form::number('bolsas',  $bolsa->quantidade ) }}

					{!! Form::submit("Salvar", ['class' => 'btn btn-success pull-right']) !!}

					{{ Form::close() }}
					</div>
				</div>


				<div class="panel panel-primary">
					<div class='panel-heading'> Atualizar Sistema </div>
					<div class="panel-body">
					
						@if(session()->has('error'))
							@if (session('error') != 0)
							<div class="alert alert-danger">
								<h4>
									<strong>Atualização retornou o erro {{ session('error') }}:</strong>
								</h4>
								<p>
								@foreach(session('output') as $output)
									{{ $output}} </br>
								@endforeach
								</p>
							</div>
							@else
							<div class="alert alert-success">
								As turmas, vagas e disciplinas foram atualizadas
							</div>
							@endif 
						@endif

						<h3>Atualizar turmas, vagas e disciplinas</h3>
						{!! Form::open(['method' => 'POST', 'url' => 'admin/utilizarCrawler', 'class' => 'form-horizontal']) !!}

							{!! Form::submit("Atualizar", ['class' => 'btn btn-success']) !!}
						{!! Form::close() !!}
					</div>
				</div>

			</div>
		</div>
	</div>
</div>





@endsection
