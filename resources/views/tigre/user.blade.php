@extends('app')

@section('header')
@include('nav.nav')
@stop

@section('content')
<div class="well">

    <div class="row">
                    <div class="col-md-3">
                    <h2>{{ $datos['proyecto'] }}</h2>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-3">
                    <img src="/img/{{ $datos['logo'] }}" class="logo_header">
                    </div>
            </div>
        <center><h3>Pantalla de Usuario</h3>
        <h4>Fecha: {{$datos['fecha']}}</h4></center>
        <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"><center>
                Encuestas<br> cargadas hoy<br>
                {{ $datos['cargadas'] }}
                </center></div>
                <div class="col-md-3"><center>
                Cargar nueva encuesta<br>
                <a href="/home/encuestas"><img src="/img/user_icon.jpg" style="width:150px"></a>
                </center></div>
                <div class="col-md-3"></div>
        </div>

</div>
@stop

@section('footer')
@include('nav.footer2')
@stop