<style>

.draggable{
	width: 400px;
	height: 20px;
    margin: 0px;
}
#prioridades ul li span {
	float: left;
	margin-top: 5px;
}
.draggable{

	background-color: #c8c8c8;
	align-items: center;
	margin: 0px;
	padding: 0px;
	height: 30px;
	
	border-radius: 3px;
}
#prioridades ul{
	list-style-type: none;
	align-items: center;
	margin: 0px;
	padding: 0px;
}

</style>
<script type="text/javascript">

</script>
<div style="align: center;">
	<div class="alert alert-info">
      Clique e arraste para priorizar os monitores remunerados abaixo. (Sendo o mais importante, prioridade '1')
    </div>
		<form id="prioridades" method="post" action="/professor/turmas/salvarPrioridade">
			<ul id="remunerados">
				@php $i = 0 @endphp
			  @foreach($monitores as $monitor)
			  		@php  $i = $i + 1  @endphp
			  	{{-- @if($monitor->remuneracao == "remunerada") --}}

			  		<li class="ui-state-default draggable" value="{{$monitor->user->matricula}}" >
			  		<span class="ui-icon ui-icon-arrowthick-2-n-s"></span><span class='posicao'>{{$i}}</span>
			  		{{$monitor->user->name}} </li>
			  	{{-- @endif --}}
			  @endforeach
			</ul>

			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input type="hidden" name="ordem_prioridade" id="ordem_prioridade" value=""/>
			<input type="hidden" name="idTurma" value="{{ $turma }}"/></br>
			<input type="submit" class="btn btn-success" value="Salvar"/>
		</form>
</div>



