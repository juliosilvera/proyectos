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
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/home/save_user') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('username') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Clave</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar Clave</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
						    <label class="col-md-4 control-label">Tipo de Usuario</label>
						    <div class="col-md-6">
						        <select name="type" class="form-control" id="type">
						            <option value=""></option>
                                    <option value="user">Mercaderista</option>
                                    <option value="cliente">Cliente</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="admin">Administrador</option>
						        </select>
						    </div>
						</div>

						<div id="extras"></div>

						<div class="form-group">
                            <label class="col-md-4 control-label">Proyecto</label>
                            <div class="col-md-6">
                                <select name="proyecto" class="form-control">
                                @foreach($datos['clientes'] as $cliente)
                                    <option value="{{ $cliente->alias }}">{{ $cliente->nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary form-control">
									Crear Usuario
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
<script>
$("#type").change(function(){
$("#type option:selected").each(function(){
var type = $(this).val();

if (type == "user")
{
    $("#extras").append('\
     <div class="form-group">\
            <label class="col-md-4 control-label">Provincia</label>\
            <div class="col-md-6">\
                <input type="text" class="form-control" name="provincia">\
            </div>\
        </div>\
     <div class="form-group">\
            <label class="col-md-4 control-label">Ciudad</label>\
            <div class="col-md-6">\
                <input type="text" class="form-control" name="ciudad">\
            </div>\
        </div>\
      ');
}

});
});
</script>
@stop