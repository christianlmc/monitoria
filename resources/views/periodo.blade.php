@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ops!</div>
                <div class="panel-body">
                    @if (session('status'))
					<div class="alert alert-danger">
						{{ session('status') }}
					</div>
					@else
						<script type="text/javascript">
    						window.location = "{{ url('/home') }}";
						</script>
					@endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
