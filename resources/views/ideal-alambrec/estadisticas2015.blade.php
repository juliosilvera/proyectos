@extends('app')

@section('header')
@include('nav.cliente')
<?php
    $total_puntos_visitados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
          {
             if (isset($_POST['ciudad'])) {
              $city = $_POST['ciudad'];
              if ($city != "nacional") {
                $query->where('provincia', $city);
              }

             }
          })->count();
    $clavos_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('clavos_ideal');
    $clavos_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('clavos_adelca');
    $clavos_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('clavos_novacero');
    $clavos_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('clavos_importados');
    $alambres_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('alambres_ideal');
    $alambres_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('alambres_adelca');
    $alambres_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('alambres_importados');
    $puas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('alambres_puas_ideal');
    $puas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('alambres_puas_adelca');
    $puas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('alambres_puas_importados');
    $mallas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('mallas_cerramiento_ideal');
    $mallas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('mallas_cerramiento_adelca');
    $mallas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('mallas_cerramiento_importados');
    $agricolas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('mallas_agricolas_ideal');
    $agricolas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('mallas_agricolas_importados');
    $barras_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('barras_ideal');
    $barras_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('barras_adelca');
    $barras_andec = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('barras_andec');
    $barras_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('barras_novacero');
    $barras_ipac = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('barras_ipac');
    $barras_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('barras_importados');
    $electrosoldadas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('electro_ideal');
    $electrosoldadas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('electro_adelca');
    $electrosoldadas_andec = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('electro_andec');
    $electrosoldadas_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('electro_novacero');
    $electrosoldadas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
                {
                   if (isset($_POST['ciudad'])) {
                    $city = $_POST['ciudad'];
                    if ($city != "nacional") {
                      $query->where('provincia', $city);
                    }

                   }
                })->sum('electro_importados');
    $vigas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('vigas_ideal');
    $vigas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('vigas_adelca');
    $vigas_andec = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('vigas_andec');
    $vigas_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('provincia', $city);
                }

               }
            })->sum('vigas_novacero');
    $vigas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
                {
                   if (isset($_POST['ciudad'])) {
                    $city = $_POST['ciudad'];
                    if ($city != "nacional") {
                      $query->where('provincia', $city);
                    }

                   }
                })->sum('vigas_importados');
$ideal1 = [countProductos('clavos_ideal') => countProductos('clavos_ideal'), countProductos('alambres_ideal') => countProductos('alambres_ideal'), countProductos('alambres_puas_ideal') => countProductos('alambres_puas_ideal'), countProductos('mallas_cerramiento_ideal') => countProductos('mallas_cerramiento_ideal'), countProductos('mallas_agricolas_ideal') => countProductos('mallas_agricolas_ideal'), countProductos('barras_ideal') => countProductos('barras_ideal'), countProductos('electro_ideal') => countProductos('electro_ideal'), countProductos('vigas_ideal') => countProductos('vigas_ideal')];
$ideal = $ideal1[max( array_keys( $ideal1 ) )];
$adelca1 = [countProductos('clavos_adelca') => countProductos('clavos_adelca'), countProductos('alambres_adelca') => countProductos('alambres_adelca'), countProductos('alambres_puas_adelca') => countProductos('alambres_puas_adelca'), countProductos('mallas_cerramiento_adelca') => countProductos('mallas_cerramiento_adelca'), countProductos('barras_adelca') => countProductos('barras_adelca'), countProductos('electro_adelca') => countProductos('electro_adelca'), countProductos('vigas_adelca') => countProductos('vigas_adelca')];
$adelca = $adelca1[max( array_keys( $adelca1 ) )];
$andec1 = [countProductos('barras_andec') => countProductos('barras_andec'), countProductos('electro_andec') => countProductos('electro_andec'), countProductos('vigas_andec') => countProductos('vigas_andec')];
$andec = $andec1[max( array_keys( $andec1 ) )];
$novacero1 = [countProductos('clavos_novacero') => countProductos('clavos_novacero'), countProductos('barras_novacero') => countProductos('barras_novacero'), countProductos('electro_novacero') => countProductos('electro_novacero'), countProductos('vigas_novacero') => countProductos('vigas_novacero')];
$novacero = $novacero1[max( array_keys( $novacero1 ) )];
$ipac = countProductos('barras_ipac');
$importados1 = [countProductos('clavos_importados'), countProductos('alambres_importados'), countProductos('alambres_puas_importados'), countProductos('mallas_cerramiento_importados'), countProductos('mallas_agricolas_importados'), countProductos('barras_importados'), countProductos('electro_importados'), countProductos('vigas_importados')];
$importados = $importados1[max( array_keys( $importados1 ) )];
$total = $ideal + $adelca + $andec + $novacero + $ipac + $importados;
$total_clavos = $clavos_ideal + $clavos_adelca + $clavos_importados + $clavos_novacero;
$total_alambres = $alambres_ideal + $alambres_adelca + $alambres_importados;
$total_alambres_puas = $puas_ideal + $puas_adelca + $puas_importados;
$total_mallas = $mallas_ideal + $mallas_adelca + $mallas_importados;
$total_agricolas = $agricolas_ideal + $agricolas_importados;
$total_barras = $barras_ideal + $barras_adelca + $barras_andec + $barras_novacero + $barras_ipac + $barras_importados;
$total_electrosoldadas = $electrosoldadas_ideal + $electrosoldadas_adelca + $electrosoldadas_andec + $electrosoldadas_novacero + $electrosoldadas_importados;
$total_vigas = $vigas_ideal + $vigas_adelca + $vigas_andec + $vigas_novacero + $vigas_importados;
$total_linea = $total_clavos + $total_alambres + $total_mallas + $total_agricolas + $total_alambres_puas + $total_barras + $total_electrosoldadas + $total_vigas;
function porcentaje($producto, $total)
{
    if($total > 0)
    {
        return round(($producto/$total)*100, 2);
    }else{
        return 0;
    }
}

function countProductos($producto){
    $count = DB::table('encuestas_ideal_alambrec')->where($producto, '>', 0)->Where(function($query)
                    {
                       if (isset($_POST['ciudad'])) {
                        $city = $_POST['ciudad'];
                        if ($city != "nacional") {
                          $query->where('provincia', $city);
                        }

                       }
                    })->count();
    return $count;
}



?>
@stop

@section('content')
<div class="well">
            <div class="row">
              <div class="col-md-3"><h3>{{ $datos['proyecto'] }}</h3></div>
              <div class="col-md-6"></div>
              <div class="col-md-3"><img src="/img/{{ $datos['logo'] }}" class="clienteLogo"> </div>
            </div>
    </div>
<div id="panel row">
      <form method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col-md-4">
          <select name="ciudad" class="form-control">
                <option value="nacional">Nacional</option>
                <?php
                $ciudades = DB::table('encuestas_ideal_alambrec')->groupBy('provincia')->get();
                foreach ($ciudades as $ciudad) {
                if(isset($_POST['ciudad']) && $_POST['ciudad'] == $ciudad->provincia)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                  echo "<option value='".$ciudad->provincia."' ".$selected.">".$ciudad->provincia."</option>";
                }
                ?>

                </select>
      </div>

      <div class="col-md-4">
          <input type="submit" value="Cargar" class="form-control">
      </div>
</form>
</div>
<div class="col-md-12" >
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    <div id="table_div"></div>
    <div id="chart_div2" style="width: 900px; height: 500px;"></div>
    <div id="table_div2"></div>
    <div id="chart_div3" style="width: 900px; height: 500px;"></div>
    <div id="table_div3"></div>
    <div id="chart_div4" style="width: 900px; height: 500px;"></div>
    <div id="table_div4"></div>
    <div id="chart_div5" style="width: 900px; height: 500px;"></div>
    <div id="table_div5"></div>
    <div id="chart_div6" style="width: 900px; height: 500px;"></div>
    <div id="table_div6"></div>
    <div id="chart_div7" style="width: 900px; height: 500px;"></div>
    <div id="table_div7"></div>
    <div id="chart_div8" style="width: 900px; height: 500px;"></div>
    <div id="table_div8"></div>
    <div id="chart_div9" style="width: 900px; height: 500px;"></div>
    <div id="table_div9"></div>
    <div id="chart_div10" style="width: 900px; height: 500px;"></div>
    <div id="table_div10"></div>
</div>

@stop

@section('footer')
@include('nav.footer2')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['table']}]}"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      google.setOnLoadCallback(drawTable);
      google.setOnLoadCallback(drawChart2);
      google.setOnLoadCallback(drawTable2);
      google.setOnLoadCallback(drawChart3);
      google.setOnLoadCallback(drawTable3);
      google.setOnLoadCallback(drawChart4);
      google.setOnLoadCallback(drawChart5);
      google.setOnLoadCallback(drawChart6);
      google.setOnLoadCallback(drawChart7);
      google.setOnLoadCallback(drawChart8);
      google.setOnLoadCallback(drawChart9);
      google.setOnLoadCallback(drawChart10);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Porcentaje', 'IAB {{ porcentaje($ideal, $total_puntos_visitados) }}%', 'Adelca {{ porcentaje($adelca, $total_puntos_visitados) }}%', 'Andec {{ porcentaje($andec, $total_puntos_visitados) }}%', 'Novacero {{ $novacero, $total_puntos_visitados }}%', 'Ipac {{ porcentaje($ipac, $total_puntos_visitados) }}%', 'Importados  {{ porcentaje($importados, $total_puntos_visitados) }}%'],
          <?php echo "['Porcentaje'," . porcentaje($ideal, $total_puntos_visitados) . ", " . porcentaje($adelca, $total_puntos_visitados) . ", " . porcentaje($andec, $total_puntos_visitados) . ", " . porcentaje($novacero, $total_puntos_visitados) . ", " . porcentaje($ipac, $total_puntos_visitados) . ", " . porcentaje($importados, $total_puntos_visitados) . "]";?>
        ]);

        var options = {
          title: 'Penetración <?php if (isset($_POST["ciudad"])) {echo $_POST["ciudad"];}; ?>',
          vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

      function drawTable() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'EMPRESA');
              data.addColumn('string', 'CLAVOS');
              data.addColumn('string', 'ALAMBRES');
              data.addColumn('string', 'ALAMBRES DE PUAS');
              data.addColumn('string', 'MALLAS DE CERRAMIENTO');
              data.addColumn('string', 'MALLAS AGRICOLAS');
              data.addColumn('string', 'BARRAS Y PLATINAS');
              data.addColumn('string', 'MALLAS ELECTROSOLDADAS');
              data.addColumn('string', 'VIGAS Y COLUMNAS');
              data.addColumn('string', 'TOTAL');
              data.addRows([
                ['IAB',  "{{ countProductos('clavos_ideal') }}", "{{ countProductos('alambres_ideal') }}", "{{ countProductos('alambres_puas_ideal') }}", "{{ countProductos('mallas_cerramiento_ideal') }}", "{{ countProductos('mallas_agricolas_ideal') }}", "{{ countProductos('barras_ideal') }}", "{{ countProductos('electro_ideal') }}", "{{ countProductos('vigas_ideal') }}", "{{ $ideal }}"],
                ['ADELCA',  "{{ countProductos('clavos_adelca') }}", "{{ countProductos('alambres_adelca') }}", "{{ countProductos('alambres_puas_adelca') }}", "{{ countProductos('mallas_cerramiento_adelca') }}", "0", "{{ countProductos('barras_adelca') }}", "{{ countProductos('electro_adelca') }}", "{{ countProductos('vigas_adelca') }}", "{{ $adelca }}"],
                ['ANDEC',  "0", "0", "0", "0", "0", "{{ countProductos('barras_andec') }}", "{{ countProductos('electro_andec') }}", "{{ countProductos('vigas_andec') }}", "{{ $andec }}"],
                ['NOVACERO',  "{{ countProductos('clavos_novacero') }}", "0", "0", "0", "0", "{{ countProductos('barras_novacero') }}", "{{ countProductos('electro_novacero') }}", "{{ countProductos('vigas_novacero') }}", "{{ $novacero }}"],
                ['IPAC',  "0", "0", "0", "0", "0", "{{ countProductos('barras_ipac') }}", "0", "0", "{{ $ipac }}"],
                ['IMPORTADOS',  "{{ countProductos('clavos_importados') }}", "{{ countProductos('alambres_importados') }}", "{{ countProductos('alambres_puas_importados') }}", "{{ countProductos('mallas_cerramiento_importados') }}", "{{ countProductos('mallas_agricolas_importados') }}", "{{ countProductos('barras_importados') }}", "{{ countProductos('electro_importados') }}", "{{ countProductos('vigas_importados') }}", "{{ $importados }}"],
                ['TOTAL PUNTOS VISITADOS', "{{ $total_puntos_visitados }}", "{{ $total_puntos_visitados }}", "{{ $total_puntos_visitados }}", "{{ $total_puntos_visitados }}", "{{ $total_puntos_visitados }}", "{{ $total_puntos_visitados }}", "{{ $total_puntos_visitados }}", "{{ $total_puntos_visitados }}", "{{ $total }}"]
              ]);

              var table = new google.visualization.Table(document.getElementById('table_div'));

              table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
            }

            function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Porcentaje', 'Clavos', 'Alambres', 'Alambres de Púas', 'Mallas', 'Mallas Agricolas', 'Barras y Platinas', 'Mallas Electrosoldadas', 'Vigas y Columnas'],
          <?php echo "['Linea'," . porcentaje($total_clavos, $total_linea) . ", " . porcentaje($total_alambres, $total_linea) . ", " . porcentaje($total_alambres_puas, $total_linea) . ", " . porcentaje($total_mallas, $total_linea) . ", " . porcentaje($total_agricolas, $total_linea) . ", " . porcentaje($total_barras, $total_linea) . ", " . porcentaje($total_electrosoldadas, $total_linea) . ", " . porcentaje($total_vigas, $total_linea) . "]";?>

        ]);

        var options = {
          title: 'Por Linea',
          vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }

      function drawTable2() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'PORCENTAJES');
              data.addColumn('string', 'CLAVOS');
              data.addColumn('string', 'ALAMBRES');
              data.addColumn('string', 'ALAMBRES DE PUAS');
              data.addColumn('string', 'MALLAS DE CERRAMIENTO');
              data.addColumn('string', 'MALLAS AGRICOLAS');
              data.addColumn('string', 'BARRAS Y PLATINAS');
              data.addColumn('string', 'MALLAS ELECTROSOLDADAS');
              data.addColumn('string', 'VIGAS Y COLUMNAS');
              data.addColumn('string', 'TOTAL');
              data.addRows([
                ['PORCENTAJES',  "{{ $total_clavos }}", "{{ $total_alambres }}", "{{ $total_alambres_puas }}", "{{ $total_mallas }}", "{{ $total_agricolas }}", "{{ $total_barras }}", "{{ $total_electrosoldadas }}", "{{ $total_vigas }}", "{{ $total_linea }}"],

              ]);

              var table = new google.visualization.Table(document.getElementById('table_div2'));

              table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
            }

      function drawChart3() {
          var data = google.visualization.arrayToDataTable([
            ['Porcentaje', 'IAB', 'Adelca', 'Novacero', 'Importados'],
            <?php echo "['Clavos'," . porcentaje($clavos_ideal, $total_clavos) . ", " . porcentaje($clavos_adelca, $total_clavos) . ", " . porcentaje($clavos_novacero, $total_clavos) . ", " . porcentaje($clavos_importados, $total_clavos) . "]";?>

          ]);

          var options = {
            title: 'Clavos',
            vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
          };

          var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
          chart.draw(data, options);
        }

        function drawTable3() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'PORCENTAJES');
          data.addColumn('string', 'IAB');
          data.addColumn('string', 'ADELCA');
          data.addColumn('string', 'ANDEC');
          data.addColumn('string', 'NOVACERO');
          data.addColumn('string', 'IPAC');
          data.addColumn('string', 'IMPORTADOS');
          data.addColumn('string', 'TOTAL');
          data.addRows([
            ['CLAVOS',  "{{ $clavos_ideal }}", "{{ $clavos_adelca }}", "0", "{{ $clavos_novacero }}", "0", "{{ $clavos_importados }}", "{{ $total_clavos }}"],
            ['ALAMBRES',  "{{ $alambres_ideal }}", "{{ $alambres_adelca }}", "0", "0", "0", "{{ $alambres_importados }}", "{{ $total_alambres }}"],
            ['ALAMBRES DE PUAS',  "{{ $puas_ideal }}", "{{ $puas_adelca }}", "0", "0", "0", "{{ $puas_importados }}", "{{ $total_alambres_puas }}"],
            ['MALLAS DE CERRAMIENTO',  "{{ $mallas_ideal }}", "{{ $mallas_adelca }}", "0", "0", "0", "{{ $mallas_importados }}", "{{ $total_mallas }}"],
            ['MALLAS AGRICOLAS',  "{{ $agricolas_ideal }}", "0", "0", "0", "0", "{{ $agricolas_importados }}", "{{ $total_agricolas }}"],
            ['BARRAS',  "{{ $barras_ideal }}", "{{ $barras_adelca }}", "{{ $barras_andec }}", "{{ $barras_novacero }}", "{{ $barras_ipac }}", "{{ $barras_importados }}", "{{ $total_barras }}"],
            ['MALLAS ELECTROSOLDADAS',  "{{ $electrosoldadas_ideal }}", "{{ $electrosoldadas_adelca }}", "{{ $electrosoldadas_andec }}", "{{ $electrosoldadas_novacero }}", "0", "{{ $electrosoldadas_importados }}", "{{ $total_electrosoldadas }}"],
            ['VIGAS',  "{{ $vigas_ideal }}", "{{ $vigas_adelca }}", "{{ $vigas_andec }}", "{{ $vigas_novacero }}", "0", "{{ $vigas_importados }}", "{{ $total_vigas }}"]

          ]);

          var table = new google.visualization.Table(document.getElementById('table_div10'));

          table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }

    function drawChart4() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Adelca', 'Importados'],
        <?php echo "['Alambres'," . porcentaje($alambres_ideal, $total_alambres) . ", " . porcentaje($alambres_adelca, $total_alambres) . ", " . porcentaje($alambres_importados, $total_alambres) . "]";?>

      ]);

      var options = {
        title: 'Alambres',
        vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div4'));
      chart.draw(data, options);
    }
    function drawChart5() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Adelca', 'Importados'],
        <?php echo "['Alambres de Púas'," . porcentaje($puas_ideal, $total_alambres_puas) . ", " . porcentaje($puas_adelca, $total_alambres_puas) . ", " . porcentaje($puas_importados, $total_alambres_puas) . "]";?>

      ]);

      var options = {
        title: 'Alambres de Púas',
        vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div5'));
      chart.draw(data, options);
    }

    function drawChart6() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Adelca', 'Importados'],
        <?php echo "['Mallas de Cerramiento'," . porcentaje($mallas_ideal, $total_mallas) . ", " . porcentaje($mallas_adelca, $total_mallas) . ", " . porcentaje($mallas_importados, $total_mallas) . "]";?>

      ]);

      var options = {
        title: 'Mallas de Cerramiento',
        vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div6'));
      chart.draw(data, options);
    }

    function drawChart7() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Importados'],
        <?php echo "['Mallas Agricolas'," . porcentaje($agricolas_ideal, $total_agricolas) . ", " . porcentaje($agricolas_importados, $total_agricolas) . "]";?>

      ]);

      var options = {
        title: 'Mallas Agricolas',
        vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div7'));
      chart.draw(data, options);
    }

    function drawChart8() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Adelca', 'Andec', 'Novacero', 'Ipac', 'Importados'],
        <?php echo "['Barras'," . porcentaje($barras_ideal, $total_barras) . ", " . porcentaje($barras_adelca, $total_barras) . ", " . porcentaje($barras_andec, $total_barras) . ", " . porcentaje($barras_novacero, $total_barras) . ", " . porcentaje($barras_ipac, $total_barras) . ", " . porcentaje($barras_importados, $total_barras) . "]";?>

      ]);

      var options = {
        title: 'Barras',
        vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div8'));
      chart.draw(data, options);
    }

    function drawChart9() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Adelca', 'Andec', 'Novacero', 'Importados'],
        <?php echo "['Mallas Electrosoldadas'," . porcentaje($electrosoldadas_ideal, $total_electrosoldadas) . ", " . porcentaje($electrosoldadas_adelca, $total_electrosoldadas) . ", " . porcentaje($electrosoldadas_andec, $total_electrosoldadas) . ", " . porcentaje($electrosoldadas_novacero, $total_electrosoldadas) . ", " . porcentaje($electrosoldadas_importados, $total_electrosoldadas) . "]";?>

      ]);

      var options = {
        title: 'Mallas Electrosoldadas',
        vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div9'));
      chart.draw(data, options);
    }

    function drawChart10() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Adelca', 'Andec', 'Novacero', 'Importados'],
        <?php echo "['Vigas'," . porcentaje($vigas_ideal, $total_vigas) . ", " . porcentaje($vigas_adelca, $total_vigas) . ", " . porcentaje($vigas_andec, $total_vigas) . ", " . porcentaje($vigas_novacero, $total_vigas) . ", " . porcentaje($vigas_importados, $total_vigas) . "]";?>

      ]);

      var options = {
        title: 'Vigas',
        vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div10'));
      chart.draw(data, options);
    }

            function resumen1(){
window.open("/home/estadisticas2014","_self")
}

    </script>
@stop