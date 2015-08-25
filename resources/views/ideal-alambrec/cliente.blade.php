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
    <h4>2014</h4>
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
       <a href="/home/estadisticas2014">
       <img src="/img/estadisticas.png" style="width: 70px">
       </a>
       </div>
       <div class="col-md-4">
       Mapas
       <br>
       <br>
       <a href="/home/mapa2014">
       <img src="/img/mapa.png" style="width: 70px">
       </a>
       </div>
       </div>
       <div class="row">
       <h4>2015</h4>
              <div class="col-md-4">
              Reportes Exportables
              <br>
              <br>
              <a href="/home/excel">
              <img src="/img/excel.png" style="width: 70px">
              </a>
              </div>
              <div class="col-md-4">
              Reportes Estadísticos
              <br>
              <br>
              <a href="/home/estadisticas2015">
              <img src="/img/estadisticas.png" style="width: 70px">
              </a>
              </div>
              <div class="col-md-4">
              Mapas
              <br>
              <br>
              <a href="/home/mapa2015">
              <img src="/img/mapa.png" style="width: 70px">
              </a>
              </div>
    </div></center>
@stop

@section('footer')
@include('nav.footer2')
@stop