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
				<div class="panel-heading">Crear Nuevo Usuario</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/home/save_cliente') }}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{ old('username') }}">
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Logo</label>
                            <div class="col-md-6">
                                <input type="file" name="logo" class="form-control">
                            </div>
                        </div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary form-control">
									Crear Cliente
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