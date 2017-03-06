
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
<div class="panel panel-default">
<div class='panel-heading'> Configurações do Sistema </div>
{{ Form::open(['url' => 'admin/definicoes/salvar']) }}
	<div class="panel-body">
	<h3>Períodos</h3>
	<br>

	@foreach($periodos as $periodo)
	<div class="form-group">
	@if($periodo->descricao->descricao != "Resultado (Monitores/Professores)")
		<div class=' col-md-4'> {{ $periodo->descricao->descricao}}</div>
		<div class=' col-md-4'><input name='inicio[]' class="calendario" type='text' value='{{ $periodo->inicio }}'>  </div>
		<div class=' col-md-4'><input name='fim[]' class="calendario" type='text' value='{{ $periodo->fim }}'> </div>
	@else
		<div class=' col-md-4'> {{ $periodo->descricao->descricao}} </div>
			<div class=' col-md-4'><input name='inicio[]' class="calendario" type='text' value='{{ $periodo->inicio }}'></div>  
			<div class=' col-md-4'><input name='fim[]' class="calendario" type='hidden' value='{{ $periodo->inicio }}'></div>
	@endif
	</div>
	</br></br>
	<input type='hidden' name='tipo[]' value='{{ $periodo->id}}'>

	@endforeach
	<h3>Bolsas</h3>
	<div class='col-md-4'>Quantidade de bolsas</div>
	{{ Form::number('bolsas',  $bolsa->quantidade ) }}
	
	<input type='submit' value='Salvar' class='btn btn-success'>

{{ Form::close() }}
    </div>

	
</div>
</div>
</div>
</div>





@endsection
