@extends('app')

@section('header')
@include('nav.cliente')
<?php

    $clavos_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_ideal');
    $clavos_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_adelca');
    $clavos_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_novacero');
    $clavos_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('clavos_importados');
    $alambres_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_ideal');
    $alambres_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_adelca');
    $alambres_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_importados');
    $puas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_puas_ideal');
    $puas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_puas_adelca');
    $puas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('alambres_puas_importados');
    $mallas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_cerramiento_ideal');
    $mallas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_cerramiento_adelca');
    $mallas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_cerramiento_importados');
    $agricolas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_agricolas_ideal');
    $agricolas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('mallas_agricolas_importados');
    $barras_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_ideal');
    $barras_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_adelca');
    $barras_andec = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_andec');
    $barras_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_novacero');
    $barras_ipac = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_ipac');
    $barras_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('barras_importados');
    $electrosoldadas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electro_ideal');
    $electrosoldadas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electro_adelca');
    $electrosoldadas_andec = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electro_andec');
    $electrosoldadas_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('electro_novacero');
    $electrosoldadas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
                {
                   if (isset($_POST['ciudad'])) {
                    $city = $_POST['ciudad'];
                    if ($city != "nacional") {
                      $query->where('ciudad', $city);
                    }

                   }
                })->sum('electro_importados');
    $vigas_ideal = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_ideal');
    $vigas_adelca = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_adelca');
    $vigas_andec = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_andec');
    $vigas_novacero = DB::table('encuestas_ideal_alambrec')->Where(function($query)
            {
               if (isset($_POST['ciudad'])) {
                $city = $_POST['ciudad'];
                if ($city != "nacional") {
                  $query->where('ciudad', $city);
                }

               }
            })->sum('vigas_novacero');
    $vigas_importados = DB::table('encuestas_ideal_alambrec')->Where(function($query)
                {
                   if (isset($_POST['ciudad'])) {
                    $city = $_POST['ciudad'];
                    if ($city != "nacional") {
                      $query->where('ciudad', $city);
                    }

                   }
                })->sum('vigas_importados');
$ideal = $clavos_ideal + $alambres_ideal + $puas_ideal + $mallas_ideal + $agricolas_ideal + $barras_ideal + $electrosoldadas_ideal + $vigas_ideal;
$adelca = $clavos_adelca + $alambres_adelca + $puas_adelca + $mallas_adelca + $barras_adelca + $electrosoldadas_adelca + $vigas_adelca;
$andec = $barras_andec + $electrosoldadas_andec + $vigas_andec;
$novacero = $clavos_novacero + $barras_novacero + $electrosoldadas_novacero + $vigas_novacero;
$ipac = $barras_ipac;
$importados = $clavos_importados + $alambres_importados + $puas_importados + $mallas_importados + $agricolas_importados + $barras_importados + $electrosoldadas_importados + $vigas_importados;
$total = $ideal + $adelca + $andec + $novacero + $ipac + $importados;
$porcentaje_ideal = round(($ideal / $total) * 100, 2);
$porcentaje_adelca = round(($adelca / $total) * 100, 2);
$porcentaje_andec = round(($andec / $total) * 100, 2);
$porcentaje_novacero = round(($novacero / $total) * 100, 2);
$porcentaje_ipac = round(($ipac / $total) * 100, 2);
$porcentaje_importados = round(($importados / $total) * 100, 2);
$total_clavos = $clavos_ideal + $clavos_adelca + $clavos_importados + $clavos_novacero;
$total_alambres = $alambres_ideal + $alambres_adelca + $alambres_importados;
$total_alambres_puas = $puas_ideal + $puas_adelca + $puas_importados;
$total_mallas = $mallas_ideal + $mallas_adelca + $mallas_importados;
$total_agricolas = $agricolas_ideal + $agricolas_importados;
$total_barras = $barras_ideal + $barras_adelca + $barras_andec + $barras_novacero + $barras_ipac + $barras_importados;
$total_electrosoldadas = $electrosoldadas_ideal + $electrosoldadas_adelca + $electrosoldadas_andec + $electrosoldadas_novacero + $electrosoldadas_importados;
$total_vigas = $vigas_ideal + $vigas_adelca + $vigas_andec + $vigas_novacero + $vigas_importados;
$total_linea = $total_clavos + $total_alambres + $total_mallas + $total_agricolas + $total_alambres_puas + $total_barras + $total_electrosoldadas + $total_vigas;
$por_clavos = round(($total_clavos / $total_linea) * 100, 2);
$por_alambres = round(($total_alambres / $total_linea) * 100, 2);
$por_alambres_puas = round(($total_alambres_puas / $total_linea) * 100, 2);
$por_mallas = round(($total_mallas / $total_linea) * 100, 2);
$por_agricolas = round(($total_agricolas / $total_linea) * 100, 2);
$por_barras = round(($total_barras / $total_linea) * 100, 2);
$por_electrosoldadas = round(($total_electrosoldadas / $total_linea) * 100, 2);
$por_vigas = round(($total_vigas / $total_linea) * 100, 2);
$porcentaje_clavos_ideal = round(($clavos_ideal/$total_clavos)*100,2);
$porcentaje_clavos_adelca = round(($clavos_adelca/$total_clavos)*100,2);
$porcentaje_clavos_novacero = round(($clavos_novacero/$total_clavos)*100,2);
$porcentaje_clavos_importados = round(($clavos_importados/$total_clavos)*100,2);
$porcentaje_alambres_ideal = round(($alambres_ideal/$total_alambres)*100, 2);
$porcentaje_alambres_adelca = round(($alambres_adelca/$total_alambres)*100, 2);
$porcentaje_alambres_importados = round(($alambres_importados/$total_alambres)*100, 2);
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
                $ciudades = DB::table('encuestas_ideal_alambrec')->groupBy('ciudad')->get();
                foreach ($ciudades as $ciudad) {
                if(isset($_POST['ciudad']) && $_POST['ciudad'] == $ciudad->ciudad)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                  echo "<option value='".$ciudad->ciudad."' ".$selected.">".$ciudad->ciudad."</option>";
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
    <div id="chart_div3" style="width: 900px; height: 500px;"></div>
    <div id="chart_div4" style="width: 900px; height: 500px;"></div>
    <div id="chart_div5" style="width: 900px; height: 500px;"></div>
    <div id="chart_div6" style="width: 900px; height: 500px;"></div>
    <div id="chart_div7" style="width: 900px; height: 500px;"></div>
    <div id="chart_div8" style="width: 900px; height: 500px;"></div>
    <div id="chart_div9" style="width: 900px; height: 500px;"></div>
    <div id="chart_div10" style="width: 900px; height: 500px;"></div>
</div>

@stop

@section('footer')
@include('nav.footer2')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      google.setOnLoadCallback(drawChart2);
      google.setOnLoadCallback(drawChart3);
      google.setOnLoadCallback(drawChart4);
      google.setOnLoadCallback(drawChart5);
      google.setOnLoadCallback(drawChart6);
      google.setOnLoadCallback(drawChart7);
      google.setOnLoadCallback(drawChart8);
      google.setOnLoadCallback(drawChart9);
      google.setOnLoadCallback(drawChart10);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Porcentaje', 'IAB {{ $porcentaje_ideal }}%', 'Adelca {{ $porcentaje_adelca }}%', 'Andec {{ $porcentaje_andec }}%', 'Novacero {{ $porcentaje_novacero }}%', 'Ipac {{ $porcentaje_ipac }}%', 'Importados  {{ $porcentaje_importados }}%'],
          <?php echo "['Porcentaje'," . $porcentaje_ideal . ", " . $porcentaje_adelca . ", " . $porcentaje_andec . ", " . $porcentaje_novacero . ", " . $porcentaje_ipac . ", " . $porcentaje_importados . "]";?>
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

      function drawChart3() {
          var data = google.visualization.arrayToDataTable([
            ['Porcentaje', 'IAB', 'Adelca', 'Novacero', 'Importados'],
            <?php echo "['Clavos'," . $porcentaje_clavos_ideal . ", " . $porcentaje_clavos_adelca . ", " . $porcentaje_clavos_novacero . ", " . $porcentaje_clavos_importados . "]";?>

          ]);

          var options = {
            title: 'Clavos',
            vAxis: {title: 'Total General 100%',  titleTextStyle: {color: 'red'}}
          };

          var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
          chart.draw(data, options);
        }

    function drawChart4() {
      var data = google.visualization.arrayToDataTable([
        ['Porcentaje', 'IAB', 'Adelca', 'Importados'],
        <?php echo "['Alambres'," . $porcentaje_alambres_ideal . ", " . $porcentaje_alambres_adelca . ", " . $porcentaje_alambres_importados . "]";?>

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
        <?php echo "['Alambres de Púas'," . round(($puas_ideal/$total_alambres_puas)*100, 2) . ", " . round(($puas_adelca/$total_alambres_puas)*100, 2) . ", " . round(($puas_importados/$total_alambres_puas)*100, 2) . "]";?>

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
        <?php echo "['Mallas de Cerramiento'," . round(($mallas_ideal/$total_mallas)*100, 2) . ", " . round(($mallas_adelca/$total_mallas)*100, 2) . ", " . round(($mallas_importados/$total_mallas)*100, 2) . "]";?>

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
        <?php echo "['Mallas Agricolas'," . round(($agricolas_ideal/$total_agricolas)*100, 2) . ", " . round(($agricolas_importados/$total_agricolas)*100, 2) . "]";?>

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
        <?php echo "['Barras'," . round(($barras_ideal/$total_barras)*100, 2) . ", " . round(($barras_adelca/$total_barras)*100, 2) . ", " . round(($barras_andec/$total_barras)*100, 2) . ", " . round(($barras_novacero/$total_barras)*100, 2) . ", " . round(($barras_ipac/$total_barras)*100, 2) . ", " . round(($barras_importados/$total_barras)*100, 2) . "]";?>

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
        <?php echo "['Mallas Electrosoldadas'," . round(($electrosoldadas_ideal/$total_electrosoldadas)*100, 2) . ", " . round(($electrosoldadas_adelca/$total_electrosoldadas)*100, 2) . ", " . round(($electrosoldadas_andec/$total_electrosoldadas)*100, 2) . ", " . round(($electrosoldadas_novacero/$total_electrosoldadas)*100, 2) . ", " . round(($electrosoldadas_importados/$total_electrosoldadas)*100, 2) . "]";?>

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
        <?php echo "['Vigas'," . round(($vigas_ideal/$total_vigas)*100, 2) . ", " . round(($vigas_adelca/$total_vigas)*100, 2) . ", " . round(($vigas_andec/$total_vigas)*100, 2) . ", " . round(($vigas_novacero/$total_vigas)*100, 2) . ", " . round(($vigas_importados/$total_vigas)*100, 2) . "]";?>

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