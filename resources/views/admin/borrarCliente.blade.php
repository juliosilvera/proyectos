@extends('app')

@section('header')
@include('nav.admin')
@stop

@section('content')
@include('nav.sidebar')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Borrar Cliente</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/home/delete_cliente') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Clientes</label>
							<div class="col-md-6">
								<select name="id" class="form-control">
								@foreach($datos['clientes'] as $cli)
								<option value="{{ $cli->id }}">{{ $cli->nombre }}</option>
								@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary form-control">
									Borrar Cliente
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer')

@stop