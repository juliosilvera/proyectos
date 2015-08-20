@extends('app')

@section('header')
@include('nav.admin')
@stop

@section('content')
<form action="{{ url('/home/verDigitaciones') }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
    <div class="col-md-3">
        <label>Proyectos</label>
        <select class="form-control" name="cliente">
        <option></option>
        @foreach($datos['clientes'] as $clientes)
        <option value="{{ $clientes->nombre }}">{{ $clientes->nombre }}</option>
        @endforeach
        </select>
    </div>
        <div class="col-md-3">
            <label>Fecha</label>
            <input type="text" name="desde" class="form-control datepicker">
        </div>
        <div class="col-md-3">
            <label>Hasta</label>
            <input type="text" name="hasta" class="form-control datepicker">
        </div>
        <div class="col-md-3">
            <label></label>
            <input type="submit" value="Filtrar" class="form-control btn-primary">
        </div>
</div>
</form>
@stop

@section('footer')

@stop