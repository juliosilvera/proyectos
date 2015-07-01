@extends('app')

@section('header')
@include('nav.cliente')
@stop

@section('content')
<?php
$filtros = [];
$provincia = "";
$ciudad = "";
if (isset($_POST['provincia'])){
if($_POST['provincia'] != ""){
$filtros += [ 'provincia' => $_POST['provincia'], ];
$provincia = $_POST['provincia'];
}
}
if (isset($_POST['ciudad'])){
if($_POST['ciudad'] != ""){
$filtros += [ 'ciudad' => $_POST['ciudad'], ];
$ciudad = $_POST['ciudad'];
}
}

$provincias = App\EncuestasGrupoKFC::where('id', '!=', 0)->groupBy('provincia')->orderBy('provincia', 'asc')->get();
$ciudades = App\EncuestasGrupoKFC::where('id', '!=', 0)->groupBy('ciudad')->orderBy('ciudad', 'asc')->get();
$todas = App\EncuestasGrupoKFC::where($filtros)->get();
$excelente = 0;
$bueno = 0;
$regular = 0;
$malo = 0;
$muy_malo = 0;
foreach ($todas as $t)
{
    $valores = $t->general + $t->higiene + $t->amabilidad + $t->rapidez + $t->precision + $t->sabor + $t->valor_general;

    $valores = $valores / 7;

    if($valores < 2){
    $muy_malo++;
    }
    if($valores >= 2 && $valores < 3){
    $malo++;
    }
    if($valores >= 3 && $valores < 4){
    $regular++;
    }
    if($valores >= 4 && $valores < 5){
    $bueno++;
    }
    if($valores >= 5){
    $excelente++;
    }
}
function calificacion($valor){
switch ($valor)
{
case 0:
$calificacion = "---";
break;

case $valor >= 1 && $valor < 2:
$calificacion = "Muy Malo";
break;

case $valor >= 2 && $valor < 3:
$calificacion = "Malo";
break;

case $valor >= 3 && $valor < 4:
$calificacion = "Regular";
break;

case $valor >= 4 && $valor < 5:
$calificacion = "Bueno";
break;

case $valor >= 5:
$calificacion = "Excelente";
break;

default:
$calificacion = "---";
break;
}
return $calificacion;
}

function cambioComas($cambio){

$v = str_replace(",", "/", $cambio);
return $v;
}

function calificacionTotal($t){
$divicion = 0;
$divisor = 0;

if($t->general > 0){
$divisor++;
$divicion += $t->general;
}
if($t->higiene > 0){
$divisor++;
$divicion += $t->higiene;
}
if($t->amabilidad > 0){
$divisor++;
$divicion += $t->amabilidad;
}
if($t->rapidez > 0){
$divisor++;
$divicion += $t->rapidez;
}
if($t->precision > 0){
$divisor++;
$divicion += $t->precision;
}
if($t->sabor > 0){
$divisor++;
$divicion += $t->sabor;
}
if($t->valor_general > 0){
$divisor++;
$divicion += $t->valor_general;
}
$total = $divicion / $divisor;

$calificacion = calificacion($total);
return $calificacion;
}
dd($excelente);
?>
{!! Form::open(['method' => 'POST', 'action' => ['HomeController@estadisticas']]) !!}

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <h3>Filtros</h3>
            <div class="form-group">
                 {!! Form::label('provincia', 'Provincias:') !!}
                 <select class="form-control" name="provincia">
                    <option value="">TODAS</option>
                    @foreach($provincias as $p)
                        <option value="{{ $p->provincia }}" <?php if($provincia == $p->provincia){ echo "selected";} ?>>{{ $p->provincia }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group">
                 {!! Form::label('ciudad', 'Ciudades:') !!}
                 <select class="form-control" name="ciudad">
                     <option value="">TODAS</option>
                    @foreach($ciudades as $c)
                        <option value="{{ $c->ciudad }}"<?php if($ciudad == $p->ciudad){ echo "selected";} ?>>{{ $c->ciudad }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group">
                 <!-- Submit Button -->
                 <div class="form-group">
                     {!! Form::submit('Filtrar', ['class' => 'btn-primary form-control']) !!}
                 </div>
            </div>
        </div>
        <div class="col-md-10" style="height: 500px">
            <div id="chart_div" style="width: 100%; height: 100%"></div>
        </div>
        <div class="col-md-12">
            <div id="table_div" style="width: 100%; height: 450px; overflow: scroll"></div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('footer')
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart', 'table']}]}"></script>
<script>
google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawTable);

function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', '', { role: 'style'}],
          ['Excelente {{ $excelente }}', {{ $excelente }}, 'color: #00ff22'],
          ['Bueno {{ $bueno }}', {{ $bueno }}, 'color: #cfff91'],
          ['Regular {{ $regular }}', {{ $regular }}, 'color: #ffff00'],
          ['Malo {{ $malo }}', {{ $malo }}, 'color: #ffaa00'],
          ['Muy Malo {{ $muy_malo }}', {{ $muy_malo }}, 'color: #ff0000']
        ]);

        var options = {
          title: 'Calificaciones'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }

function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Provincia');
        data.addColumn('string', 'Ciudad');
        data.addColumn('string', 'Nombre en Gafete');
        data.addColumn('string', 'Referencia');
        data.addColumn('string', 'Local');
        data.addColumn('string', 'Satisfacción General');
        data.addColumn('string', 'Higiene');
        data.addColumn('string', 'Mesas o Sillas');
        data.addColumn('string', 'Algo Roto o Rasgado');
        data.addColumn('string', 'Aspecto del Empleado');
        data.addColumn('string', 'Contenedores de Basura');
        data.addColumn('string', 'Pisos');
        data.addColumn('string', 'Otro');
        data.addColumn('string', 'Amabilidad');
        data.addColumn('string', 'No me saludaron');
        data.addColumn('string', 'No me sonrieron');
        data.addColumn('string', 'Fueron groseros o descorteses');
        data.addColumn('string', 'No me dieron las gracias');
        data.addColumn('string', 'No fueron atentos');
        data.addColumn('string', 'No pude entender al empleado');
        data.addColumn('string', 'Otro');
        data.addColumn('string', 'Rapidez');
        data.addColumn('string', 'El tiempo que espere para ordenar mis alimentos');
        data.addColumn('string', 'El tiempo que tomo que recibieran mi orden');
        data.addColumn('string', 'Senti que me apuraban');
        data.addColumn('string', 'El tiempo que paso para recibir mis alimentos');
        data.addColumn('string', 'La sensacion de urgencia del empleado');
        data.addColumn('string', 'Otro');
        data.addColumn('string', 'Precisión');
        data.addColumn('string', 'Me dieron un producto equivocado');
        data.addColumn('string', 'Falta de un alimento o producto');
        data.addColumn('string', 'Me dieron un tamaño equivocado');
        data.addColumn('string', 'Me cobraron una cantidad incorrecta');
        data.addColumn('string', 'El alimento o producto no estaba disponible');
        data.addColumn('string', 'Me dieron un cambio incorrecto');
        data.addColumn('string', 'Otro');
        data.addColumn('string', 'Sabor');
        data.addColumn('string', 'Que plato del menu tuvo el mayor impacto en su calificacion sobre el sabor de la comida?');
        data.addColumn('string', 'Valor General por Precio');
        data.addColumn('string', 'Experimentó algun problema durante su visita?');
        data.addColumn('string', 'Grado de Satisfacción');
        data.addColumn('string', 'Tenia Banderin?');
        data.addColumn('string', 'Calificación Total');


        data.addRows([
          @foreach($todas as $t)
            ['{{ $t->provincia }}', '{{ $t->ciudad }}', '{{ $t->nombre_gafete }}', '{{ cambioComas($t->referencia) }}', '{{ $t->local }}', '{{ calificacion($t->general) }}', '{{ calificacion($t->higiene) }}', '{{ calificacion($t->malo_mesas) }}', '{{ calificacion($t->malo_roto) }}', '{{ calificacion($t->malo_aspecto) }}', '{{ calificacion($t->malo_contenedores) }}', '{{ calificacion($t->malo_pisos) }}', '{{ $t->limpieza_otro }}', '{{ calificacion($t->amabilidad) }}', '{{ calificacion($t->malo_saludo) }}', '{{ calificacion($t->malo_sonrisa) }}', '{{ calificacion($t->malo_grosero) }}', '{{ calificacion($t->malo_gracias) }}', '{{ calificacion($t->malo_atentos) }}', '{{ calificacion($t->malo_entender) }}', '{{ $t->amabilidad_otro }}', '{{ calificacion($t->rapidez) }}', '{{ calificacion($t->malo_ordenar) }}', '{{ calificacion($t->malo_reciban) }}', '{{ calificacion($t->malo_apuro) }}', '{{ calificacion($t->malo_recibir) }}', '{{ calificacion($t->malo_urgencia) }}', '{{ $t->rapidez_otro }}', '{{ calificacion($t->precision) }}', '{{ calificacion($t->malo_equivocado) }}', '{{ calificacion($t->malo_falta) }}', '{{ calificacion($t->malo_tamano) }}', '{{ calificacion($t->malo_cantidad) }}', '{{ calificacion($t->malo_disponible) }}', '{{ calificacion($t->malo_cambio) }}', '{{ $t->precision_otro }}', '{{ calificacion($t->sabor) }}', '{{ $t->malo_sabor }}', '{{ calificacion($t->valor_general) }}', '{{ $t->malo_problema }}', '{{ calificacion($t->malo_eficacia) }}', '{{ $t->banderin }}', '{{ calificacionTotal($t) }}'],
          @endforeach
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true});
      }
</script>
@stop