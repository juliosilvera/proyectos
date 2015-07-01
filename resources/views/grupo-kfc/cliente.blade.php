@extends('app')

@section('header')
@include('nav.cliente')
@stop

@section('content')
    <div class="well">
            <div class="row">
              <div class="col-md-3"><h3>{{ $datos['proyecto'] }}</h3></div>
              <div class="col-md-6"></div>
              <div class="col-md-3"><img src="/img/{{ $datos['logo'] }}" class="clienteLogo"> </div>
            </div>
    </div><center>
    <div class="row">
       <div class="col-md-4">
       Reportes Exportables
       <br>
       <br>
       <a href="">
       <img src="/img/excel.png" style="width: 70px">
       </a>
       </div>
       <div class="col-md-4">
       Reportes Estadísticos
       <br>
       <br>
       <a href="/home/estadisticas">
       <img src="/img/estadisticas.png" style="width: 70px">
       </a>
       </div>
       <div class="col-md-4">
       Mapas
       <br>
       <br>
       <a href="">
       <img src="/img/mapa.png" style="width: 70px">
       </a>
       </div>
    </div></center>
@stop

@section('footer')
@include('nav.footer2')
@stop