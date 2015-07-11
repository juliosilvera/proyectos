  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Heatmaps</title>
      <style>
        html, body, #map-canvas {
          height: 100%;
          margin: 0px;
          padding: 0px
        }
        #panel {
          position: absolute;
          bottom: 5px;
          left: 50%;
          margin-left: -180px;
          z-index: 5;
          background-color: #fff;
          padding: 5px;
          border: 1px solid #999;
        }
        #panel2 {
          position: absolute;
          bottom: 50%;
          right: 5px;

          z-index: 5;
          background-color: #fff;
          padding: 5px;
          border: 1px solid #999;
        }
      </style>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=visualization"></script>
      <script>
  // Adding 500 Data Points
  var map, pointarray, heatmap;

  var taxiData = [
  <?php
  if(isset($_POST['Zoom'])){
    $zoom = $_POST['Zoom'];
  }else{
    $zoom = "6";
  }
  if(isset($_POST['lat'])){
    $latitud = $_POST['lat'];
  }else{
    $latitud = "-0.31857549189421275";
  }
  if(isset($_POST['lng'])){
    $longitud = $_POST['lng'];
  }else{
    $longitud = "-78.50955035575714";
  }

  $heats = DB::table('vuelta2')->where(function($query){
    if (isset($_POST['provincias'])) {
      if ($_POST['provincias'] != "Nacional") {
        $query->where('provincia', $_POST['provincias']);
      }
      switch ($_POST['prod']) {
        case 'ideal':
          $query->where('clavos_ideal', '1')
        ->where('alambres_ideal', '1')
        ->where('puas_ideal', '1')
        ->where('mallas_ideal', '1')
        ->where('agricolas_ideal', '1')
        ->where('barras_ideal', '1')
        ->where('electrosoldadas_ideal', '1')
        ->where('vigas_ideal', '1');
          break;

        case 'adelca':
          $query->where('clavos_adelca', '1')
        ->where('alambres_adelca', '1')
        ->where('puas_adelca', '1')
        ->where('mallas_adelca', '1')
        ->where('barras_adelca', '1')
        ->where('electrosoldadas_adelca', '1')
        ->where('vigas_adelca', '1');
          break;

        case 'andec':
          $query->where('barras_andec', '1')
        ->where('electrosoldadas_andec', '1')
        ->where('vigas_andec', '1');
          break;

        case 'novacero':
          $query->where('clavos_novacero', '1')
        ->where('barras_novacero', '1')
        ->where('electrosoldadas_novacero', '1')
        ->where('vigas_novacero', '1');
          break;

        case 'importados':
          $query->where('clavos_importados', '1')
        ->where('alambres_importados', '1')
        ->where('puas_importados', '1')
        ->where('mallas_importados', '1')
        ->where('agricolas_importados', '1')
        ->where('barras_importados', '1')
        ->where('electrosoldadas_importados', '1')
        ->where('vigas_importados', '1');
          break;

        default:
         $query->where($_POST['prod'], '1');
          break;
      }

    }else{
     $query->where('clavos_ideal', '1')
        ->where('alambres_ideal', '1')
        ->where('puas_ideal', '1')
        ->where('mallas_ideal', '1')
        ->where('agricolas_ideal', '1')
        ->where('barras_ideal', '1')
        ->where('electrosoldadas_ideal', '1')
        ->where('vigas_ideal', '1');
    }

  })->where('lat', '!=', '')->where('lng', '!=', '')->get();

  $check = DB::table('vuelta2')->where(function($query){
    if (isset($_POST['provincias'])) {
      if ($_POST['provincias'] != "Nacional") {
        $query->where('provincia', $_POST['provincias']);
      }
      switch ($_POST['prod']) {
        case 'ideal':
          $query->where('clavos_ideal', '1')
        ->where('alambres_ideal', '1')
        ->where('puas_ideal', '1')
        ->where('mallas_ideal', '1')
        ->where('agricolas_ideal', '1')
        ->where('barras_ideal', '1')
        ->where('electrosoldadas_ideal', '1')
        ->where('vigas_ideal', '1');
          break;

        case 'adelca':
          $query->where('clavos_adelca', '1')
        ->where('alambres_adelca', '1')
        ->where('puas_adelca', '1')
        ->where('mallas_adelca', '1')
        ->where('barras_adelca', '1')
        ->where('electrosoldadas_adelca', '1')
        ->where('vigas_adelca', '1');
          break;

        case 'andec':
          $query->where('barras_andec', '1')
        ->where('electrosoldadas_andec', '1')
        ->where('vigas_andec', '1');
          break;

        case 'novacero':
          $query->where('clavos_novacero', '1')
        ->where('barras_novacero', '1')
        ->where('electrosoldadas_novacero', '1')
        ->where('vigas_novacero', '1');
          break;

        case 'importados':
          $query->where('clavos_importados', '1')
        ->where('alambres_importados', '1')
        ->where('puas_importados', '1')
        ->where('mallas_importados', '1')
        ->where('agricolas_importados', '1')
        ->where('barras_importados', '1')
        ->where('electrosoldadas_importados', '1')
        ->where('vigas_importados', '1');
          break;

        default:
         $query->where($_POST['prod'], '1');
          break;
      }

    }else{
     $query->where('clavos_ideal', '1')
        ->where('alambres_ideal', '1')
        ->where('puas_ideal', '1')
        ->where('mallas_ideal', '1')
        ->where('agricolas_ideal', '1')
        ->where('barras_ideal', '1')
        ->where('electrosoldadas_ideal', '1')
        ->where('vigas_ideal', '1');
    }

  })->where('lat', '!=', '')->where('lng', '!=', '')->count();

  foreach ($heats as $heat) {
   echo "new google.maps.LatLng(".$heat->lat.", ".$heat->lng."),";
  }
  ?>


  ];

  function initialize() {
    var mapOptions = {
      zoom: <?php echo $zoom; ?>,
      center: new google.maps.LatLng(<?php echo $latitud . ", " . $longitud ?>),

    };

    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
    <?php
    if ($check > 0) {
      echo "var pointArray = new google.maps.MVCArray(taxiData);";
    };
    ?>


    heatmap = new google.maps.visualization.HeatmapLayer({
      data: pointArray
    });

    heatmap.setMap(map);
  }

  function toggleHeatmap() {
    heatmap.setMap(heatmap.getMap() ? null : map);
  }

  function changeGradient() {
    var gradient = [
      'rgba(0, 255, 255, 0)',
      'rgba(0, 255, 255, 1)',
      'rgba(0, 191, 255, 1)',
      'rgba(0, 127, 255, 1)',
      'rgba(0, 63, 255, 1)',
      'rgba(0, 0, 255, 1)',
      'rgba(0, 0, 223, 1)',
      'rgba(0, 0, 191, 1)',
      'rgba(0, 0, 159, 1)',
      'rgba(0, 0, 127, 1)',
      'rgba(63, 0, 91, 1)',
      'rgba(127, 0, 63, 1)',
      'rgba(191, 0, 31, 1)',
      'rgba(255, 0, 0, 1)'
    ]
    heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
  }

  function Enviar(){
    var zoom = map.getZoom();
    var latitud = map.getCenter().lat();
    var longitud = map.getCenter().lng();
  document.getElementById("valor").value = zoom;
  document.getElementById("lat").value = latitud;
  document.getElementById("lng").value = longitud;
  document.forms["form_prod"].submit();
  }

  function changeRadius() {
    heatmap.set('radius', heatmap.get('radius') ? null : 20);
  }

  function volver(){
      window.open("/home", "_self");
  }

  function back() {
    window.open("/home/mapa2014","_self")
  }

  google.maps.event.addDomListener(window, 'load', initialize);

      </script>
    </head>

    <body>
      <div id="panel">
        <button onclick="changeGradient()">Cambiar Gradiente</button>
        <button onclick="changeRadius()">Cambiar Radio</button>
        <button onclick="back()">Mapa de Puntos</button>
        <button onclick="volver()">Volver al Menu</button>
      </div>
      <div id="panel2">
        <form id="form_prod" method="post">
          <select name="provincias">
          <option value="Nacional">Nacional</option>
            <?php
            if (isset($_POST['provincias'])) {
              $sel_prov = $_POST['provincias'];
              $prod = $_POST['prod'];
            }else{
              $sel_prov = "Nacional";
              $prod = "ideal";
            }
            $provincias = DB::table('vuelta2')->groupBy('provincia')->get();
            foreach ($provincias as $k) {
              if ($k->provincia == $sel_prov) {
                $sel = "selected";
              }else{
                $sel = "";
              }
              echo "<option value='".$k->provincia."' ".$sel.">".$k->provincia."</option>";
            }
            ?>
          </select><br>
          <select name="prod">
          <option value="ideal" <?php if($prod == "ideal"){echo "selected";} ?>>Consolidado Ideal</option>
          <option value="adelca" <?php if($prod == "adelca"){echo "selected";} ?>>Consolidado Adelca</option>
          <option value="andec" <?php if($prod == "andec"){echo "selected";} ?>>Consolidado Andec</option>
          <option value="novacero" <?php if($prod == "novacero"){echo "selected";} ?>>Consolidado Novacero</option>
          <option value="importados" <?php if($prod == "importados"){echo "selected";} ?>>Consolidado Importados</option>
            <option value="clavos_ideal" <?php if($prod == "clavos_ideal"){echo "selected";} ?>>Clavos Ideal</option>
            <option value="clavos_adelca" <?php if($prod == "clavos_adelca"){echo "selected";} ?>>Clavos Adelca</option>
            <option value="clavos_novacero" <?php if($prod == "clavos_novacero"){echo "selected";} ?>>Clavos Novacero</option>
            <option value="clavos_importados" <?php if($prod == "clavos_importados"){echo "selected";} ?>>Clavos Imortados</option>
            <option value="alambres_ideal" <?php if($prod == "alambres_ideal"){echo "selected";} ?>>Alambres Ideal</option>
            <option value="alambres_adelca" <?php if($prod == "alambres_adelca"){echo "selected";} ?>>Alambres Adelca</option>
            <option value="alambres_importados" <?php if($prod == "alambres_importados"){echo "selected";} ?>>Alambres Importados</option>
            <option value="puas_ideal" <?php if($prod == "puas_ideal"){echo "selected";} ?>>Alambres Puas Ideal</option>
            <option value="puas_adelca" <?php if($prod == "puas_adelca"){echo "selected";} ?>>Alambres Puas Adelca</option>
            <option value="puas_importados" <?php if($prod == "puas_importados"){echo "selected";} ?>>Alambres Puas Imortados</option>
            <option value="mallas_ideal" <?php if($prod == "mallas_ideal"){echo "selected";} ?>>Mallas Ideal</option>
            <option value="mallas_adelca" <?php if($prod == "mallas_adelca"){echo "selected";} ?>>Mallas Adelca</option>
            <option value="mallas_importados" <?php if($prod == "mallas_importados"){echo "selected";} ?>>Mallas Imortados</option>
            <option value="agricolas_ideal" <?php if($prod == "agricolas_ideal"){echo "selected";} ?>>Mallas Agricolas Ideal</option>
            <option value="agricolas_importados" <?php if($prod == "agricolas_importados"){echo "selected";} ?>>Mallas Agricolas Imortados</option>
            <option value="barras_ideal" <?php if($prod == "barras_ideal"){echo "selected";} ?>>Barras Ideal</option>
            <option value="barras_adelca" <?php if($prod == "barras_adelca"){echo "selected";} ?>>Barras Adelca</option>
            <option value="barras_andec" <?php if($prod == "barras_andec"){echo "selected";} ?>>Barras Andec</option>
            <option value="barras_novacero" <?php if($prod == "barras_novacero"){echo "selected";} ?>>Barras Novacero</option>
            <option value="barras_ipac" <?php if($prod == "barras_ipac"){echo "selected";} ?>>Barras Ipac</option>
            <option value="barras_importados" <?php if($prod == "barras_importados"){echo "selected";} ?>>Barras Imortados</option>
            <option value="electrosoldadas_ideal" <?php if($prod == "electrosoldadas_ideal"){echo "selected";} ?>>Electrosoldadas Ideal</option>
            <option value="electrosoldadas_adelca" <?php if($prod == "electrosoldadas_adelca"){echo "selected";} ?>>Electrosoldadas Adelca</option>
            <option value="electrosoldadas_andec" <?php if($prod == "electrosoldadas_andec"){echo "selected";} ?>>Electrosoldadas Andec</option>
            <option value="electrosoldadas_novacero" <?php if($prod == "electrosoldadas_novacero"){echo "selected";} ?>>Electrosoldadas Novacero</option>
            <option value="electrosoldadas_importados" <?php if($prod == "electrosoldadas_importados"){echo "selected";} ?>>Electrosoldadas Imortados</option>
            <option value="vigas_ideal" <?php if($prod == "vigas_ideal"){echo "selected";} ?>>Vigas Ideal</option>
            <option value="vigas_adelca" <?php if($prod == "vigas_adelca"){echo "selected";} ?>>Vigas Adelca</option>
            <option value="vigas_andec" <?php if($prod == "vigas_andec"){echo "selected";} ?>>Vigas Andec</option>
            <option value="vigas_novacero" <?php if($prod == "vigas_novacero"){echo "selected";} ?>>Vigas Novacero</option>
            <option value="vigas_importados" <?php if($prod == "vigas_importados"){echo "selected";} ?>>Vigas Imortados</option>
          </select>
          <input type="hidden" name="Zoom" id="valor" value="">
            <input type="hidden" name="lat" id="lat" value="">
            <input type="hidden" name="lng" id="lng" value="">
            <button onclick="Enviar()">Filtrar</button>

        </form>
      </div>
      <div id="map-canvas"></div>
    </body>
  </html>