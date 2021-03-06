@extends('app')

@section('header')
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
function calificacion2($valor){
switch ($valor)
{
case 0:
$calificacion = "---";
break;

case $valor >= 1 && $valor < 2:
$calificacion = 1;
break;

case $valor >= 2 && $valor < 3:
$calificacion = 2;
break;

case $valor >= 3 && $valor < 4:
$calificacion = 3;
break;

case $valor >= 4 && $valor < 5:
$calificacion = 4;
break;

case $valor >= 5:
$calificacion = 5;
break;

default:
$calificacion = "---";
break;
}
return $calificacion;
}

function colores($valor){
switch ($valor)
{
case 0:
$calificacion = "---";
break;

case $valor >= 1 && $valor < 2:
$calificacion = 'color: #ff0000';
break;

case $valor >= 2 && $valor < 3:
$calificacion = 'color: #ffaa00';
break;

case $valor >= 3 && $valor < 4:
$calificacion = 'color: #ffff00';
break;

case $valor >= 4 && $valor < 5:
$calificacion = 'color: #cfff91';
break;

case $valor >= 5:
$calificacion = 'color: #00ff22';
break;

default:
$calificacion = "---";
break;
}
return $calificacion;
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
$valores = array(0 => '', 1 => '', 2 => '', 3 => '', 4 => '', 5 => '');
function valores($valor){
for ($i = 1; $i < 6; $i++)
{
$valores[$i] = App\EncuestasGrupoKFC::where($valor, $i)->count();

}
return $valores;
}
$higiene = valores('higiene');
$general = valores('general');
$amabilidad = valores('amabilidad');
$rapidez = valores('rapidez');
$precision = valores('precision');
$sabor = valores('sabor');

?>
@include('nav.cliente')
@stop

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-2">
        {!! Form::open(['method' => 'POST', 'action' => ['HomeController@estadisticas']]) !!}

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
            {!! Form::close() !!}
        </div>
        <div class="col-md-10" style="height: 500px; margin-bottom: 100px">
            <div id="chart_div" style="width: 100%; height: 100%"></div>
        </div>
        <div class="col-md-12" style="margin-bottom: 50px">
            <div id="chart_div1"></div>
        </div>
        <div class="col-md-12">
            <div id="table_div"></div>
        </div>
        <div class="col-md-12" style="height: 700px">
            <h3>Estadisticas</h3>
            <div id="table_div1"></div>
            <div id="piechart" style="width: 500px; height: 500px"></div>
        </div>
</div>

    <h3>Testimoniales</h3>
    @foreach($todas as $t)
    @if($t->testimonial_personal != "" | $t->testimonial_banos != "" | $t->testimonial_parqueaderos != "" | $t->testimonial_mesas != "" | $t->testimonial_comida != "" )
    <div class="row">
    <h4>{{ strtoupper($t->local) }}</h4>
    @if($t->testimonial_personal != "")
      <div class="col-xs-6 col-md-3">
       <h4>Personal</h4>
        <a href="#" class="thumbnail">
          <img src="/fotos/{{ $t->testimonial_personal }}" alt="...">
        </a>
      </div>
      @endif
      @if($t->testimonial_banos != "")
      <div class="col-xs-6 col-md-3">
         <h4>Baños</h4>
          <a href="#" class="thumbnail">
            <img src="/fotos/{{ $t->testimonial_banos }}" alt="...">
          </a>
      </div>
      @endif
      @if($t->testimonial_parqueaderos != "")
      <div class="col-xs-6 col-md-3">
         <h4>Parqueaderos</h4>
          <a href="#" class="thumbnail">
            <img src="/fotos/{{ $t->testimonial_parqueaderos }}" alt="...">
          </a>
      </div>
      @endif
      @if($t->testimonial_mesas != "")
      <div class="col-xs-6 col-md-3">
         <h4>Mesas</h4>
          <a href="#" class="thumbnail">
            <img src="/fotos/{{ $t->testimonial_mesas }}" alt="...">
          </a>
      </div>
      @endif
      @if($t->testimonial_comida != "" )
      <div class="col-xs-6 col-md-3">
         <h4>Presentación Comida</h4>
          <a href="#" class="thumbnail">
            <img src="/fotos/{{ $t->testimonial_comida }}" alt="...">
          </a>
      </div>
      @endif

      </div>
      @endif
    @endforeach


</div>

@stop

@section('footer')
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart', 'table']}]}"></script>
<script>
google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawTable);
google.setOnLoadCallback(drawTable1);
google.setOnLoadCallback(drawChart1);
google.setOnLoadCallback(drawBasic1);

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
        data.addColumn('string', 'Calificación Total');
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
        data.addColumn('string', 'Por favor explique porque no estuvo satisfecho con su experiencia en este local');


        data.addRows([
          @foreach($todas as $t)
            ['{{ calificacionTotal($t) }}', '{{ $t->provincia }}', '{{ $t->ciudad }}', '{{ $t->nombre_gafete }}', '{{ cambioComas($t->referencia) }}', '{{ strtoupper($t->local) }}', '{{ calificacion($t->general) }}', '{{ calificacion($t->higiene) }}', '{{ calificacion($t->malo_mesas) }}', '{{ calificacion($t->malo_roto) }}', '{{ calificacion($t->malo_aspecto) }}', '{{ calificacion($t->malo_contenedores) }}', '{{ calificacion($t->malo_pisos) }}', '{{ $t->limpieza_otro }}', '{{ calificacion($t->amabilidad) }}', '{{ calificacion($t->malo_saludo) }}', '{{ calificacion($t->malo_sonrisa) }}', '{{ calificacion($t->malo_grosero) }}', '{{ calificacion($t->malo_gracias) }}', '{{ calificacion($t->malo_atentos) }}', '{{ calificacion($t->malo_entender) }}', '{{ $t->amabilidad_otro }}', '{{ calificacion($t->rapidez) }}', '{{ calificacion($t->malo_ordenar) }}', '{{ calificacion($t->malo_reciban) }}', '{{ calificacion($t->malo_apuro) }}', '{{ calificacion($t->malo_recibir) }}', '{{ calificacion($t->malo_urgencia) }}', '{{ $t->rapidez_otro }}', '{{ calificacion($t->precision) }}', '{{ calificacion($t->malo_equivocado) }}', '{{ calificacion($t->malo_falta) }}', '{{ calificacion($t->malo_tamano) }}', '{{ calificacion($t->malo_cantidad) }}', '{{ calificacion($t->malo_disponible) }}', '{{ calificacion($t->malo_cambio) }}', '{{ $t->precision_otro }}', '{{ calificacion($t->sabor) }}', '{{ $t->malo_sabor }}', '{{ calificacion($t->valor_general) }}', '{{ $t->malo_problema }}', '{{ calificacion($t->malo_eficacia) }}', '{{ $t->banderin }}', '{{ $t->detalles }}'],
          @endforeach
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '450'});
      }

      function drawTable1() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Calificación');
              data.addColumn('string', 'General');
              data.addColumn('string', 'Higiene');
              data.addColumn('string', 'Amabilidad');
              data.addColumn('string', 'Rapidez');
              data.addColumn('string', 'Precisión');
              data.addColumn('string', 'Sabor');
              data.addColumn('string', 'Total');
              data.addRows([
                    ['Excelente', '{{ $general[5] }}', '{{ $higiene[5] }}', '{{ $amabilidad[5] }}', '{{ $rapidez[5] }}', '{{ $precision[5] }}', '{{ $sabor[5] }}', '{{ $general[5] + $higiene[5] + $amabilidad[5] + $rapidez[5] + $precision[5] + $sabor[5] }}'],
                    ['Bueno', '{{ $general[4] }}', '{{ $higiene[4] }}', '{{ $amabilidad[4] }}', '{{ $rapidez[4] }}', '{{ $precision[4] }}', '{{ $sabor[4] }}', '{{ $general[4] + $higiene[4] + $amabilidad[4] + $rapidez[4] + $precision[4] + $sabor[4] }}'],
                    ['Regular', '{{ $general[3] }}', '{{ $higiene[3] }}', '{{ $amabilidad[3] }}', '{{ $rapidez[3] }}', '{{ $precision[3] }}', '{{ $sabor[3] }}', '{{ $general[3] + $higiene[3] + $amabilidad[3] + $rapidez[3] + $precision[3] + $sabor[3] }}'],
                    ['Malo', '{{ $general[2] }}', '{{ $higiene[2] }}', '{{ $amabilidad[2] }}', '{{ $rapidez[2] }}', '{{ $precision[2] }}', '{{ $sabor[2] }}', '{{ $general[2] + $higiene[2] + $amabilidad[2] + $rapidez[2] + $precision[2] + $sabor[2] }}'],
                    ['Muy Malo', '{{ $general[1] }}', '{{ $higiene[1] }}', '{{ $amabilidad[1] }}', '{{ $rapidez[1] }}', '{{ $precision[1] }}', '{{ $sabor[1] }}', '{{ $general[1] + $higiene[1] + $amabilidad[1] + $rapidez[1] + $precision[1] + $sabor[1] }}'],
              ]);

              var table = new google.visualization.Table(document.getElementById('table_div1'));

              table.draw(data, {showRowNumber: false, width: '100%', height: '100%'});
            }


            function drawChart1() {

              var data = google.visualization.arrayToDataTable([
                ['Calificacion', 'Total'],
                ['Excelente',     {{ $general[5] + $higiene[5] + $amabilidad[5] + $rapidez[5] + $precision[5] + $sabor[5] }}],
                ['Bueno',      {{ $general[4] + $higiene[4] + $amabilidad[4] + $rapidez[4] + $precision[4] + $sabor[4] }}],
                ['Regular',  {{ $general[3] + $higiene[3] + $amabilidad[3] + $rapidez[3] + $precision[3] + $sabor[3] }}],
                ['Malo', {{ $general[2] + $higiene[2] + $amabilidad[2] + $rapidez[2] + $precision[2] + $sabor[2] }}],
                ['Muy Malo',    {{ $general[1] + $higiene[1] + $amabilidad[1] + $rapidez[1] + $precision[1] + $sabor[1] }}]
              ]);

              var options = {
                title: '',
                is3D: true,
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart'));

              chart.draw(data, options);
            }

            function drawBasic1() {

                  var data = google.visualization.arrayToDataTable([
                    ['Local', 'Calificación', { role: 'style'}],
                    @foreach($todas as $t)
                    ['{{ strtoupper($t->local) }}', {{ calificacion2(($t->general + $t->higiene + $t->amabilidad + $t->rapidez + $t->precision + $t->sabor)/6) }}, '{{ colores(($t->general + $t->higiene + $t->amabilidad + $t->rapidez + $t->precision + $t->sabor)/6) }}'],
                    @endforeach
                  ]);

                  var options = {
                    title: 'Reporte por local',
                    chartArea: {width: '50%'},
                    hAxis: {
                      title: 'Calificación Total',
                      minValue: 0
                    },
                    vAxis: {
                      title: 'Local'
                    }
                  };

                  var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));

                  chart.draw(data, options);
                }
</script>
@stop