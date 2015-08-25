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
              <form action="/home/excel" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="desde" id="desde">
              <input type="hidden" name="hasta" id="hasta">
              <select class="form-control" id="excel">
                <option></option>
              </select>
              <input type="submit" value="Descargar" class="form-control">
              </form>
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
<script>
<?php
$contador = \App\EncuestasIdealAlambrec::count();
$valor = 1500;
$parte = 1;
$append = "";
while($valor <= $contador)
{
    echo "$('#excel').append('<option>Parte ".$parte."</option>');";
    $valor += 1500;
    $parte++;
}
?>


$("#excel").change(function(){
$("#excel option:selected").each(function(){
var parte = $(this).text();
if(parte == "Parte 1")
{
$("#desde").val("0");
$("#hasta").val("1500");
}
if(parte == "Parte 2")
{
$("#desde").val("1501");
$("#hasta").val("3000");
}
if(parte == "Parte 3")
{
$("#desde").val("3001");
$("#hasta").val("4500");
}
if(parte == "Parte 4")
{
$("#desde").val("4501");
$("#hasta").val("6000");
}
if(parte == "Parte 5")
{
$("#desde").val("6001");
$("#hasta").val("7500");
}
if(parte == "Parte 6")
{
$("#desde").val("7501");
$("#hasta").val("9000");
}
});
});
</script>
@include('nav.footer2')
@stop