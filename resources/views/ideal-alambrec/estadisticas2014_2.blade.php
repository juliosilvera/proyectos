@extends('app')

@section('header')
@include('nav.cliente')
<?php

    $clavos_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_ideal');
    $clavos_adelca = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_adelca');
    $clavos_novacero = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_novacero');
    $clavos_importados = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_importados');
    $alambres_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_ideal');
    $alambres_adelca = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_adelca');
    $alambres_importados = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_importados');
    $puas_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('puas_ideal');
    $puas_adelca = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('puas_adelca');
    $puas_importados = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('puas_importados');
    $mallas_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_ideal');
    $mallas_adelca = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_adelca');
    $mallas_importados = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_importados');
    $agricolas_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('agricolas_ideal');
    $agricolas_importados = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('agricolas_importados');
    $barras_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_ideal');
    $barras_adelca = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_adelca');
    $barras_andec = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_andec');
    $barras_novacero = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_novacero');
    $barras_ipac = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_ipac');
    $barras_importados = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_importados');
    $electrosoldadas_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electrosoldadas_ideal');
    $electrosoldadas_adelca = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electrosoldadas_adelca');
    $electrosoldadas_andec = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electrosoldadas_andec');
    $electrosoldadas_novacero = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electrosoldadas_novacero');
    $vigas_ideal = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_ideal');
    $vigas_adelca = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_adelca');
    $vigas_andec = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_andec');
    $vigas_novacero = DB::table('vuelta2')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_novacero');
$ideal = $clavos_ideal + $alambres_ideal + $puas_ideal + $mallas_ideal + $agricolas_ideal + $barras_ideal + $electrosoldadas_ideal + $vigas_ideal;
$adelca = $clavos_adelca + $alambres_adelca + $puas_adelca + $mallas_adelca + $barras_adelca + $electrosoldadas_adelca + $vigas_adelca;
$andec = $barras_andec + $electrosoldadas_andec + $vigas_andec;
$novacero = $clavos_ideal + $barras_novacero + $electrosoldadas_novacero + $vigas_novacero;
$ipac = $barras_ipac;
$importados = $clavos_importados + $alambres_importados + $puas_importados + $mallas_importados + $agricolas_importados + $barras_importados;
$total = $ideal + $adelca + $andec + $novacero + $ipac + $importados;
$porcentaje_ideal = round(($ideal / $total) * 100, 2);
$porcentaje_adelca = round(($adelca / $total) * 100, 2);
$porcentaje_andec = round(($andec / $total) * 100, 2);
$porcentaje_novacero = round(($novacero / $total) * 100, 2);
$porcentaje_ipac = round(($ipac / $total) * 100, 2);
$porcentaje_importados = round(($importados / $total) * 100, 2);
$total_clavos = $clavos_ideal + $clavos_adelca + $clavos_importados;
$total_alambres = $alambres_ideal + $alambres_adelca + $alambres_importados;
$total_alambres_puas = $puas_ideal + $puas_adelca + $puas_importados;
$total_mallas = $mallas_ideal + $mallas_adelca + $mallas_importados;
$total_agricolas = $agricolas_ideal + $agricolas_importados;
$total_barras = $barras_ideal + $barras_adelca + $barras_andec + $barras_novacero + $barras_ipac + $barras_importados;
$total_electrosoldadas = $electrosoldadas_ideal + $electrosoldadas_adelca + $electrosoldadas_andec + $electrosoldadas_novacero;
$total_vigas = $vigas_ideal + $vigas_adelca + $vigas_andec + $vigas_novacero;
$total_linea = $total_clavos + $total_alambres + $total_mallas + $total_agricolas + $total_alambres_puas + $total_barras + $total_electrosoldadas + $total_vigas;
$por_clavos = round(($total_clavos / $total_linea) * 100, 2);
$por_alambres = round(($total_alambres / $total_linea) * 100, 2);
$por_alambres_puas = round(($total_alambres_puas / $total_linea) * 100, 2);
$por_mallas = round(($total_mallas / $total_linea) * 100, 2);
$por_agricolas = round(($total_agricolas / $total_linea) * 100, 2);
$por_barras = round(($total_barras / $total_linea) * 100, 2);
$por_electrosoldadas = round(($total_electrosoldadas / $total_linea) * 100, 2);
$por_vigas = round(($total_vigas / $total_linea) * 100, 2);
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
      <div class="col-md-4">
          <select name="ciudad" class="form-control">
                <option value="nacional">Nacional</option>
                <?php
                $ciudades = DB::table('vuelta2')->groupBy('ciudad')->get();
                foreach ($ciudades as $ciudad) {
                  echo "<option value='".$ciudad->ciudad."'>".$ciudad->ciudad."</option>";
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
    <div id="chart_div2" style="width: 900px; height: 500px;"></div>
</div>

@stop

@section('footer')
@include('nav.footer2')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      google.setOnLoadCallback(drawChart2);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Porcentaje', 'IAB', 'Adelca', 'Andec', 'Novacero', 'Ipac'],
          <?php echo "['Porcentaje'," . $porcentaje_ideal . ", " . $porcentaje_adelca . ", " . $porcentaje_andec . ", " . $porcentaje_novacero . ", " . $porcentaje_ipac . "]";?>
        ]);

        var options = {
          title: 'General <?php if (isset($_POST["ciudad"])) {echo $_POST["ciudad"];}; ?>',
          vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
            function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Porcentaje', 'Clavos', 'Alambres', 'Alambres de Púas', 'Mallas', 'Mallas Agricolas', 'Barras y Platinas', 'Mallas Electrosoldadas', 'Vigas y Columnas'],
          <?php echo "['Linea'," . $por_clavos . ", " . $por_alambres . ", " . $por_alambres_puas . ", " . $por_mallas . ", " . $por_agricolas . ", " . $por_barras . ", " . $por_electrosoldadas . ", " . $por_vigas . "]";?>

        ]);

        var options = {
          title: 'Por Linea',
          vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }

            function resumen1(){
window.open("/home/estadisticas2014","_self")
}

    </script>
@stop