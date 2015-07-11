@extends('app')

@section('header')
@include('nav.cliente')
@stop

@section('content')
<?php
if(isset($_GET['productos'])){
$id = $_GET['productos'];
switch ($id) {
    case "clavos":
    $producto = "Clavos";

    break;
    case "alambres":
    $producto = "Alambres";

    break;
    case "alambres_puas":
    $producto = "Alambres de Púas";

    break;
    case "mallas":
    $producto = "Mallas";

    break;
    case "agricolas":
    $producto = "Mallas Agricolas";

    break;
    case "barras":
    $producto = "Barras y Platinas";

    break;
    case "electrosoldadas":
    $producto = "Mallas Electrosoldadas";

    break;
    case "vigas":
    $producto = "Vigas y Columnas";

    break;
}
}
else{
$id="clavos";
$producto = "Clavos";

}

    $clavos_ideal = DB::table('vuelta2')->sum('clavos_ideal');
    $clavos_adelca = DB::table('vuelta2')->sum('clavos_adelca');
    $clavos_novacero = DB::table('vuelta2')->sum('clavos_novacero');
    $clavos_importados = DB::table('vuelta2')->sum('clavos_importados');
    $alambres_ideal = DB::table('vuelta2')->sum('alambres_ideal');
    $alambres_adelca = DB::table('vuelta2')->sum('alambres_adelca');
    $alambres_importados = DB::table('vuelta2')->sum('alambres_importados');
    $puas_ideal = DB::table('vuelta2')->sum('puas_ideal');
    $puas_adelca = DB::table('vuelta2')->sum('puas_adelca');
    $puas_importados = DB::table('vuelta2')->sum('puas_importados');
    $mallas_ideal = DB::table('vuelta2')->sum('mallas_ideal');
    $mallas_adelca = DB::table('vuelta2')->sum('mallas_adelca');
    $mallas_importados = DB::table('vuelta2')->sum('mallas_importados');
    $agricolas_ideal = DB::table('vuelta2')->sum('agricolas_ideal');
    $agricolas_importados = DB::table('vuelta2')->sum('agricolas_importados');
    $barras_ideal = DB::table('vuelta2')->sum('barras_ideal');
    $barras_adelca = DB::table('vuelta2')->sum('barras_adelca');
    $barras_andec = DB::table('vuelta2')->sum('barras_andec');
    $barras_novacero = DB::table('vuelta2')->sum('barras_novacero');
    $barras_ipac = DB::table('vuelta2')->sum('barras_ipac');
    $barras_importados = DB::table('vuelta2')->sum('barras_importados');
    $electrosoldadas_ideal = DB::table('vuelta2')->sum('electrosoldadas_ideal');
    $electrosoldadas_adelca = DB::table('vuelta2')->sum('electrosoldadas_adelca');
    $electrosoldadas_andec = DB::table('vuelta2')->sum('electrosoldadas_andec');
    $electrosoldadas_novacero = DB::table('vuelta2')->sum('electrosoldadas_novacero');
    $vigas_ideal = DB::table('vuelta2')->sum('vigas_ideal');
    $vigas_adelca = DB::table('vuelta2')->sum('vigas_adelca');
    $vigas_andec = DB::table('vuelta2')->sum('vigas_andec');
    $vigas_novacero = DB::table('vuelta2')->sum('vigas_novacero');
?>
    <div class="well">
            <div class="row">
              <div class="col-md-3"><h3>{{ $datos['proyecto'] }}</h3></div>
              <div class="col-md-6"></div>
              <div class="col-md-3"><img src="/img/{{ $datos['logo'] }}" class="clienteLogo"> </div>
            </div>
    </div>
<div id="panel row">
<div class="col-md-4">
    <button onclick="resumen2()"  class="form-control">Resumen 2</button>
</div>



    </div>
      <div id="panel2">
          <form action="" method="get" id="Prod">
          <div class="col-md-4">
              <select name="productos" onchange="submit()" class="form-control">
                        <option value="clavos" <?php if($id == "clavos"){ echo "selected";} ?> >Clavos</option>
                        <option value="alambres" <?php if($id == "alambres"){ echo "selected";} ?>  >Alambres</option>
                        <option value="alambres_puas" <?php if($id == "alambres_puas"){ echo "selected";} ?>  >Alambres de Púas</option>
                        <option value="mallas" <?php if($id == "mallas"){ echo "selected"; }?>  >Mallas</option>
                        <option value="agricolas" <?php if($id == "agricolas"){ echo "selected";} ?>  >Mallas Agricolas</option>
                        <option value="barras" <?php if($id == "barras"){ echo "selected";} ?>  >Barras y Platinas</option>
                        <option value="electrosoldadas" <?php if($id == "electrosoldadas"){ echo "selected";} ?>  >Mallas Electrosoldadas</option>
                        <option value="vigas" <?php if($id == "vigas"){ echo "selected";} ?> >Vigas y Columnas</option>
                        </select>
          </div>

              </form>
      </div>
    <div id="piechart_3d" style="width: 600px; height: 600px; float:left;"></div>
@stop

@section('footer')
@include('nav.footer2')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            <?php
switch ($id){
    case "clavos": ?>
    ['Productos', 'Porcentaje'],
          ['Clavos Ideal', <?php echo $clavos_ideal; ?>],
          ['Clavos Adelca',     <?php echo $clavos_adelca; ?>],
          ['Clavos Novacero',     <?php echo $clavos_novacero; ?>],
          ['Clavos Importados',      <?php echo $clavos_importados; ?>]
    <?php
    break;
    case "alambres": ?>
    ['Productos', 'Porcentaje'],
          ['Alambres Ideal', <?php echo $alambres_ideal; ?>],
          ['Alambres Adelca',     <?php echo $alambres_adelca; ?>],
          ['Alambres Importados',      <?php echo $alambres_importados; ?>]
    <?php
    break;
    case "alambres_puas":?>
    ['Productos', 'Porcentaje'],
          ['Alambres de Púas Ideal', <?php echo $puas_ideal; ?>],
          ['Alambres de Púas Adelca', <?php echo $puas_adelca; ?>],
          ['Alambres de Púas Importados', <?php echo $puas_importados; ?>]
           <?php
    break;
    case "mallas":?>
           ['Productos', 'Porcentaje'],
          ['Mallas Ideal', <?php echo $mallas_ideal; ?>],
           ['Mallas Adelca', <?php echo $mallas_adelca; ?>],
            ['Mallas Importadas', <?php echo $mallas_importados; ?>]
             <?php
    break;
    case "agricolas":?>
    ['Productos', 'Porcentaje'],
          ['Mallas Agricolas Ideal', <?php echo $agricolas_ideal; ?>],
          ['Mallas Agricolas Importados', <?php echo $agricolas_importados; ?>]
           <?php
    break;
    case "barras":?>
    ['Productos', 'Porcentaje'],
          ['Barras y Platinas Ideal', <?php echo $barras_ideal; ?>],
          ['Barras y Platinas Adelca', <?php echo $barras_adelca; ?>],
          ['Barras y Platinas Andec', <?php echo $barras_andec; ?>],
          ['Barras y Platinas Novacero', <?php echo $barras_novacero; ?>],
          ['Barras y Platinas Ipac', <?php echo $barras_ipac; ?>],
          ['Barras y Platinas Otros', <?php echo $barras_importados; ?>]
           <?php
    break;
    case "electrosoldadas":?>
    ['Productos', 'Porcentaje'],
          ['Mallas Electrosoldadas Ideal', <?php echo $electrosoldadas_ideal; ?>],
          ['Mallas Electrosoldadas Adelca', <?php echo $electrosoldadas_adelca; ?>],
          ['Mallas Electrosoldadas Andec', <?php echo $electrosoldadas_andec; ?>],
          ['Mallas Electrosoldadas Novacero', <?php echo $electrosoldadas_novacero; ?>],
           <?php
    break;
    case "vigas":?>
    ['Productos', 'Porcentaje'],
          ['Vigas y Columnas Ideal', <?php echo $vigas_ideal; ?>],
          ['Vigas y Columnas Adelca', <?php echo $vigas_adelca; ?>],
          ['Vigas y Columnas Andec', <?php echo $vigas_andec; ?>],
           ['Vigas y Columnas Novacero', <?php echo $vigas_novacero; ?>]
           <?php
    break;

           }
           ?>
        ]);

        var options = {
          title: 'Vuelta 2 - 2014 - Producto: <?php echo $producto; ?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }

            function resumen2(){
window.open("/home/estadisticas2014_2","_self")
}
    </script>
@stop