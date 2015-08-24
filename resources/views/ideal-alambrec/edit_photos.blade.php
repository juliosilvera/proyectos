@extends('app')

@section('header')
@include('nav.nav')
@stop

@section('content')
<?php
$photos = \App\EncuestasIdealAlambrec::where('id', $_GET['id'])->first();
?>
<center>FOTOS</center>
<form action="save_photos" method="post"  enctype="multipart/form-data">
<div class="row">
<input type="hidden" name="id" value="{{ $_GET['id'] }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="col-md-4">
        <label>Nombre del Local</label>
        <input type="text" name="nombre_comercial" class="form-control" value="{{ $photos->nombre_comercial }}">
    </div>
    <div class="col-md-4">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="col-md-4">
        <label>Enviar</label>
        <input type="submit" value="Guardar" class="form-control btn-primary">
    </div>
</div>
<br><br>
<div class="col-md-4">
    <a href="/home" class="btn-primary">VOLVER</a>
</form>
@stop

@section('footer')

@stop