<?php
function pin($id)
{
    $GLOBALS['total']++;
    $local = \App\EncuestasIdealAlambrec::where('id', $id)->first();

    $suma_ideal = $local->clavos_ideal + $local->alambres_ideal + $local->alambres_puas_ideal + $local->mallas_cerramiento_ideal + $local->barras_ideal + $local->electro_ideal + $local->vigas_ideal;
    $suma_adelca = $local->clavos_adelca + $local->alambres_adelca + $local->alambres_puas_adelca + $local->mallas_cerramiento_adelca + $local->barras_adelca + $local->electro_adelca + $local->vigas_adelca;

    if($suma_ideal > $suma_adelca)
    {
        $pin = "http://maps.google.com/mapfiles/ms/micons/blue-dot.png";
    }else{
        $pin = "http://maps.google.com/mapfiles/ms/micons/red-dot.png";
    }

    if(isset($_POST['categoria']) && $_POST['categoria'] != "")
    {
        switch($_POST['categoria'])
        {
            case 'Clavos':
            $clavos = [$local->clavos_ideal => 'blue-dot.png', $local->clavos_adelca => 'red-dot.png', $local->clavos_novacero => 'green-dot.png', $local->clavos_importados => 'yellow-dot.png'];
            $clavos1 = [$local->clavos_ideal => 'ideal', $local->clavos_adelca => 'adelca', $local->clavos_novacero => 'novacero', $local->clavos_importados => 'importados'];
            if(max( array_keys( $clavos ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $clavos[max( array_keys( $clavos ) )];
                $GLOBALS[$clavos1[max( array_keys( $clavos1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }

            break;

            case 'Alambres':
            $alambres = [$local->alambres_ideal => 'blue-dot.png', $local->alambres_adelca => 'red-dot.png', $local->alambres_importados => 'yellow-dot.png'];
            $alambres1 = [$local->alambres_ideal => 'ideal', $local->alambres_adelca => 'adelca', $local->alambres_importados => 'importados'];
            if(max( array_keys( $alambres ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $alambres[max( array_keys( $alambres ) )];
                $GLOBALS[$alambres1[max( array_keys( $alambres1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }

            break;

            case 'Alambres Puas':
            $alambres_puas = [$local->alambres_puas_ideal => 'blue-dot.png', $local->alambres_puas_adelca => 'red-dot.png', $local->alambres_puas_importados => 'yellow-dot.png'];
            $alambres_puas1 = [$local->alambres_puas_ideal => 'ideal', $local->alambres_puas_adelca => 'adelca', $local->alambres_puas_importados => 'importados'];
            if(max( array_keys( $alambres_puas ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $alambres_puas[max( array_keys( $alambres_puas ) )];
                $GLOBALS[$alambres_puas1[max( array_keys( $alambres_puas1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }

            break;

            case 'Mallas de Cerramiento':
            $mallas_cerramiento = [$local->mallas_cerramiento_ideal => 'blue-dot.png', $local->mallas_cerramiento_adelca => 'red-dot.png', $local->mallas_cerramiento_importados => 'yellow-dot.png'];
            $mallas_cerramiento1 = [$local->mallas_cerramiento_ideal => 'ideal', $local->mallas_cerramiento_adelca => 'adelca', $local->mallas_cerramiento_importados => 'importados'];
            if(max( array_keys( $mallas_cerramiento ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $mallas_cerramiento[max( array_keys( $mallas_cerramiento ) )];
                $GLOBALS[$mallas_cerramiento1[max( array_keys( $mallas_cerramiento1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }
            break;

            case 'Mallas Agricolas':
            $mallas_agricolas = [$local->mallas_agricolas_ideal => 'blue-dot.png', $local->mallas_agricolas_importados => 'yellow-dot.png'];
            $mallas_agricolas1 = [$local->mallas_agricolas_ideal => 'ideal', $local->mallas_agricolas_importados => 'importados'];
            if(max( array_keys( $mallas_agricolas ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $mallas_agricolas[max( array_keys( $mallas_agricolas ) )];
                $GLOBALS[$mallas_agricolas1[max( array_keys( $mallas_agricolas1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }
            break;

            case 'Barras':
            $mallas_cerramiento = [$local->barras_ideal => 'blue-dot.png', $local->barras_adelca => 'red-dot.png', $local->barras_andec => 'orange-dot.png', $local->barras_novacero => 'green-dot.png', $local->barras_ipac => 'ltblue-dot.png', $local->barras_importados => 'yellow-dot.png'];
            $mallas_cerramiento1 = [$local->barras_ideal => 'ideal', $local->barras_adelca => 'adelca', $local->barras_andec => 'andec', $local->barras_novacero => 'novacero', $local->barras_ipac => 'ipac', $local->barras_importados => 'importados'];
            if(max( array_keys( $mallas_cerramiento ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $mallas_cerramiento[max( array_keys( $mallas_cerramiento ) )];
                $GLOBALS[$mallas_cerramiento1[max( array_keys( $mallas_cerramiento1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }
            break;

            case 'Electrosoldadas':
            $electrosoldadas = [$local->electro_ideal => 'blue-dot.png', $local->electro_adelca => 'red-dot.png', $local->electro_andec => 'orange-dot.png', $local->electro_novacero => 'green-dot.png', $local->electro_importados => 'yellow-dot.png'];
            $electrosoldadas1 = [$local->electro_ideal => 'ideal', $local->electro_adelca => 'adelca', $local->electro_andec => 'andec', $local->electro_novacero => 'novacero', $local->electro_importados => 'importados'];
            if(max( array_keys( $electrosoldadas ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $electrosoldadas[max( array_keys( $electrosoldadas ) )];
                $GLOBALS[$electrosoldadas1[max( array_keys( $electrosoldadas1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }
            break;

            case 'Vigas':
            $vigas = [$local->vigas_ideal => 'blue-dot.png', $local->vigas_adelca => 'red-dot.png', $local->vigas_andec => 'orange-dot.png', $local->vigas_novacero => 'green-dot.png', $local->vigas_importados => 'yellow-dot.png'];
            $vigas1 = [$local->vigas_ideal => 'ideal', $local->vigas_adelca => 'adelca', $local->vigas_andec => 'andec', $local->vigas_novacero => 'novacero', $local->vigas_importados => 'importados'];
            if(max( array_keys( $vigas ) ) > 0)
            {
                $pin = "http://maps.google.com/mapfiles/ms/micons/" . $vigas[max( array_keys( $vigas ) )];
                $GLOBALS[$vigas1[max( array_keys( $vigas1 ) )]]++;
            }else{
                $pin = "http://maps.google.com/mapfiles/ms/micons/msmarker.png";
            }
            break;
        }
    }

    return $pin;

}
$GLOBALS['ideal'] = 0;
$GLOBALS['adelca'] = 0;
$GLOBALS['andec'] = 0;
$GLOBALS['novacero'] = 0;
$GLOBALS['ipac'] = 0;
$GLOBALS['importados'] = 0;
$GLOBALS['total'] = 0;
$total_puntos_visitados2 = DB::table('encuestas_ideal_alambrec')->count();
$ideal2 = [countProductos1('clavos_ideal') => countProductos1('clavos_ideal'), countProductos1('alambres_ideal') => countProductos1('alambres_ideal'), countProductos1('alambres_puas_ideal') => countProductos1('alambres_puas_ideal'), countProductos1('mallas_cerramiento_ideal') => countProductos1('mallas_cerramiento_ideal'), countProductos1('mallas_agricolas_ideal') => countProductos1('mallas_agricolas_ideal'), countProductos1('barras_ideal') => countProductos1('barras_ideal'), countProductos1('electro_ideal') => countProductos1('electro_ideal'), countProductos1('vigas_ideal') => countProductos1('vigas_ideal')];
$ideal3 = $ideal2[max( array_keys( $ideal2 ) )];
$adelca2 = [countProductos1('clavos_adelca') => countProductos1('clavos_adelca'), countProductos1('alambres_adelca') => countProductos1('alambres_adelca'), countProductos1('alambres_puas_adelca') => countProductos1('alambres_puas_adelca'), countProductos1('mallas_cerramiento_adelca') => countProductos1('mallas_cerramiento_adelca'), countProductos1('barras_adelca') => countProductos1('barras_adelca'), countProductos1('electro_adelca') => countProductos1('electro_adelca'), countProductos1('vigas_adelca') => countProductos1('vigas_adelca')];
$adelca3 = $adelca2[max( array_keys( $adelca2 ) )];
$andec2 = [countProductos1('barras_andec') => countProductos1('barras_andec'), countProductos1('electro_andec') => countProductos1('electro_andec'), countProductos1('vigas_andec') => countProductos1('vigas_andec')];
$andec3 = $andec2[max( array_keys( $andec2 ) )];
$novacero2 = [countProductos1('clavos_novacero') => countProductos1('clavos_novacero'), countProductos1('barras_novacero') => countProductos1('barras_novacero'), countProductos1('electro_novacero') => countProductos1('electro_novacero'), countProductos1('vigas_novacero') => countProductos1('vigas_novacero')];
$novacero3 = $novacero2[max( array_keys( $novacero2 ) )];
$ipac3 = countProductos1('barras_ipac');
$importados2 = [countProductos1('clavos_importados'), countProductos1('alambres_importados'), countProductos1('alambres_puas_importados'), countProductos1('mallas_cerramiento_importados'), countProductos1('mallas_agricolas_importados'), countProductos1('barras_importados'), countProductos1('electro_importados'), countProductos1('vigas_importados')];
$importados3 = $importados2[max( array_keys( $importados2 ) )];

function porcentaje($producto, $total)
{
    if($total > 0)
    {
        return round(($producto/$total)*100, 2);
    }else{
        return 0;
    }
}

function countProductos1($producto){
    $count = DB::table('encuestas_ideal_alambrec')->where($producto, '>', 0)->count();
    return $count;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/all.css">
    <title>Mapa PDV Ideal Alambrec</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      #logo {
              position: absolute;
              left: 5px;
              bottom: 0px;
              z-index: 5;
            }
      #panel {
              position: absolute;
              bottom: 5px;
              left: 20%;
              z-index: 5;
              background-color: #fff;
              padding: 5px;
              border: 1px solid #999;
            }
      #panel2 {
                position: absolute;
                width: 100px;
                top: 5px;
                left: 10%;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                border: 1px solid #999;
              }
      #panel3 {
              position: absolute;
              top: 60%;
              left: 5px;
              z-index: 5;
              background-color: #fff;
              padding: 5px;
              border: 1px solid #999;
            }
      #panel4 {
            position: absolute;
            top: 10%;
            left: 5px;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
          }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true"></script>
    <script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {lat: -1.567930, lng: -78.460751 }
  });


  var data = [
  @foreach($mapa as $m)
  ["{{ $m->id }}", {{ $m->lat }}, {{ $m->lng }}, "{{ pin($m->id) }}", "{{ $m->foto }}", "{{ $m->nombre_comercial }}", "{{ $m->propietario }}", "{{ $m->distribuidor1 }}", "{{ $m->otro_dist1 }}"],
  @endforeach
  ];
  for (var i = 0; i < data.length; ++i) {
    var image = data[i][3];
    var marker = new google.maps.Marker({
      position: {
        lat: data[i][1],
        lng: data[i][2]
      },
      map: map,
      icon: image
    });
    attachSecretMessage(marker, data[i][0], data[i][4], data[i][5], data[i][6], data[i][7], data[i][8]);
  }
}

// Attaches an info window to a marker with the provided message. When the
// marker is clicked, the info window will open with the secret message.
function attachSecretMessage(marker, id, foto, local, propietario, distribuidor1, otro_dist1) {
    var texto = "" +
     "<table><tr>" +
     "<td><img src='../img/"+foto+"' style='width: 200px'></td><td><p>ID: "+id+"</p><p>Nombre del Local: "+local+"</p><p>Propietario: "+propietario+"</p><p>Distribuidor "+distribuidor1+" "+otro_dist1+"</p><p></p><p></p><p></p></td>"+
      "</tr></table>";
  var infowindow = new google.maps.InfoWindow({
    content: texto
  });

  marker.addListener('click', function() {
    infowindow.open(marker.get('map'), marker);
  });
}

    </script>
  </head>
  <body>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&callback=initMap" async defer></script>
    <div id="logo"><img src="/img/logo-ideal.png" style="width: 150px"/> </div>
    <div id="panel">
    <form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
    <div class="col-md-4">
    <label>Provincias</label>
    <select name="provincia" class="form-control">
    <option value="">TODAS</option>
    @foreach($provincias as $p)
    <option value="{{ $p->provincia }}" <?php if(isset($_POST['provincia']) && $_POST['provincia'] == $p->provincia){ echo "selected"; } ?>>{{ $p->provincia }}</option>
    @endforeach
    </select>
    </div>
    <div class="col-md-4">
    <label>Ciudades</label>
    <select name="ciudad" class="form-control">
    <option value="">TODAS</option>
    @foreach($ciudades as $c)
    <option value="{{ $c->ciudad }}" <?php if(isset($_POST['ciudad']) && $_POST['ciudad'] == $c->ciudad){ echo "selected"; } ?>>{{ $c->ciudad }}</option>
    @endforeach
    </select>
    </div>
    <div class="col-md-4">
        <label>Productos</label>
        <select name="producto" class="form-control">
        <option value="">TODOS</option>
        <option value="clavos_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "clavos_ideal"){ echo "selected"; } ?>>Clavos Ideal</option>
        <option value="clavos_adelca" <?php if(isset($_POST['producto']) && $_POST['producto'] == "clavos_adelca"){ echo "selected"; } ?>>Clavos Adelca</option>
        <option value="clavos_novacero" <?php if(isset($_POST['producto']) && $_POST['producto'] == "clavos_novacero"){ echo "selected"; } ?>>Clavos Novacero</option>
        <option value="clavos_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "clavos_importados"){ echo "selected"; } ?>>Clavos Importados</option>
        <option value="alambres_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "alambres_ideal"){ echo "selected"; } ?>>Alambres Ideal</option>
        <option value="alambres_adelca" <?php if(isset($_POST['producto']) && $_POST['producto'] == "alambres_adelca"){ echo "selected"; } ?>>Alambres Adelca</option>
        <option value="alambres_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "alambres_importados"){ echo "selected"; } ?>>Alambres Importados</option>
        <option value="alambres_puas_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "alambres_puas_ideal"){ echo "selected"; } ?>>Alambres de Púas Ideal</option>
        <option value="alambres_puas_adelca" <?php if(isset($_POST['producto']) && $_POST['producto'] == "alambres_puas_adelca"){ echo "selected"; } ?>>Alambres de Púas Adelca</option>
        <option value="alambres_puas_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "alambres_puas_importados"){ echo "selected"; } ?>>Alambres de Púas Importados</option>
        <option value="mallas_cerramiento_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "mallas_cerramiento_ideal"){ echo "selected"; } ?>>Malla de Cerramiento Ideal</option>
        <option value="mallas_cerramiento_adelca" <?php if(isset($_POST['producto']) && $_POST['producto'] == "mallas_cerramiento_adelca"){ echo "selected"; } ?>>Malla de Cerramiento Adelca</option>
        <option value="mallas_cerramiento_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "mallas_cerramiento_importados"){ echo "selected"; } ?>>Malla de Cerramiento Importados</option>
        <option value="mallas_agricolas_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "mallas_agricolas_ideal"){ echo "selected"; } ?>>Mallas Agricolas Ideal</option>
        <option value="mallas_agricolas_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "mallas_agricolas_importados"){ echo "selected"; } ?>>Mallas Agricolas Importados</option>
        <option value="barras_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "barras_ideal"){ echo "selected"; } ?>>Barras Ideal</option>
        <option value="barras_adelca" <?php if(isset($_POST['producto']) && $_POST['producto'] == "barras_adelca"){ echo "selected"; } ?>>Barras Adelca</option>
        <option value="barras_andec" <?php if(isset($_POST['producto']) && $_POST['producto'] == "barras_andec"){ echo "selected"; } ?>>Barras Andec</option>
        <option value="barras_novacero" <?php if(isset($_POST['producto']) && $_POST['producto'] == "barras_novacero"){ echo "selected"; } ?>>Barras Novacero</option>
        <option value="barras_ipac" <?php if(isset($_POST['producto']) && $_POST['producto'] == "barras_ipac"){ echo "selected"; } ?>>Barras Ipac</option>
        <option value="barras_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "barras_importados"){ echo "selected"; } ?>>Barras Importados</option>
        <option value="electro_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "electro_ideal"){ echo "selected"; } ?>>Electrosoldadas Ideal</option>
        <option value="electro_adelca" <?php if(isset($_POST['producto']) && $_POST['producto'] == "electro_adelca"){ echo "selected"; } ?>>Electrosoldadas Adelca</option>
        <option value="electro_andec" <?php if(isset($_POST['producto']) && $_POST['producto'] == "electro_andec"){ echo "selected"; } ?>>Electrosoldadas Andec</option>
        <option value="electro_novacero" <?php if(isset($_POST['producto']) && $_POST['producto'] == "electro_novacero"){ echo "selected"; } ?>>Electrosoldadas Novacero</option>
        <option value="electro_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "electro_importados"){ echo "selected"; } ?>>Electrosoldadas Importados</option>
        <option value="vigas_ideal" <?php if(isset($_POST['producto']) && $_POST['producto'] == "vigas_ideal"){ echo "selected"; } ?>>Vigas Ideal</option>
        <option value="vigas_adelca" <?php if(isset($_POST['producto']) && $_POST['producto'] == "vigas_adelca"){ echo "selected"; } ?>>Vigas Adelca</option>
        <option value="vigas_andec" <?php if(isset($_POST['producto']) && $_POST['producto'] == "vigas_andec"){ echo "selected"; } ?>>Vigas Andec</option>
        <option value="vigas_novacero" <?php if(isset($_POST['producto']) && $_POST['producto'] == "vigas_novacero"){ echo "selected"; } ?>>Vigas Novacero</option>
        <option value="vigas_importados" <?php if(isset($_POST['producto']) && $_POST['producto'] == "vigas_importados"){ echo "selected"; } ?>>Vigas Importados</option>
        </select>
    </div>
    <div class="col-md-4">
        <label>Categorias</label>
        <select class="form-control" name="categoria">
            <option value="">TODAS</option>
            <option value="Clavos" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Clavos"){ echo "selected"; } ?>>Clavos</option>
            <option value="Alambres" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Alambres"){ echo "selected"; } ?>>Alambres</option>
            <option value="Alambres Puas" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Alambres Puas"){ echo "selected"; } ?>>Alambres Puas</option>
            <option value="Mallas de Cerramiento" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Mallas de Cerramiento"){ echo "selected"; } ?>>Mallas de Cerramiento</option>
            <option value="Mallas Agricolas" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Mallas Agricolas"){ echo "selected"; } ?>>Mallas Agricolas</option>
            <option value="Barras" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Barras"){ echo "selected"; } ?>>Barras</option>
            <option value="Electrosoldadas" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Electrosoldadas"){ echo "selected"; } ?>>Electrosoldadas</option>
            <option value="Vigas" <?php if(isset($_POST['categoria']) && $_POST['categoria'] == "Vigas"){ echo "selected"; } ?>>Vigas</option>
        </select>
    </div>
    <div class="col-md-4">
    <label></label>
    <input type="submit" value="Filtrar" class="form-control">
    </div>

    </div>
    </form>
    </div>
    <div id="panel2">
    <div class="row">
        <div class="col-md-12">
                <button id="volver" class="form-control btn-primary">Volver</button>
            </div>
    </div>
    </div>
    <div id="panel4">
        <div class="row">
            <div class="col-md-6">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Marca</th>
                    <th>Porcentaje de penetracion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>IAB</td>
                    <td>{{ porcentaje($ideal3, $total_puntos_visitados2) }}%</td>
                  </tr>
                  <tr>
                    <td>Adelca</td>
                    <td>{{ porcentaje($adelca3, $total_puntos_visitados2) }}%</td>
                  </tr>
                  <tr>
                    <td>Andec</td>
                    <td>{{ porcentaje($andec3, $total_puntos_visitados2) }}%</td>
                  </tr>
                  <tr>
                    <td>Novacero</td>
                    <td>{{ porcentaje($novacero3, $total_puntos_visitados2) }}%</td>
                  </tr>
                  <tr>
                    <td>Ipac</td>
                    <td>{{ porcentaje($ipac3, $total_puntos_visitados2) }}%</td>
                  </tr>
                  <tr>
                      <td>Importados</td>
                      <td>{{ porcentaje($importados3, $total_puntos_visitados2) }}%</td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <div id="panel3">
    @if(!isset($_POST['categoria']))
    <table>
        <tr>
        <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
        <td>Mayor presencia Ideal</td>
        </tr>
        <tr>
        <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
        <td>Mayor presencia Adelca</td>
        </tr>
        </table>
    </div>
    @endif
    @if(isset($_POST['categoria']) && $_POST['categoria'] == "")
        <table>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
            <td>Mayor presencia Ideal</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
            <td>Mayor presencia Adelca</td>
            </tr>
            </table>
        </div>
        @endif
     @if(isset($_POST['categoria']) && $_POST['categoria'] == "Clavos")
        <table>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
            <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
            <td>Presencia Adelca {{ round(($GLOBALS['adelca'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/green-dot.png"></td>
            <td>Presencia Novacero {{ round(($GLOBALS['novacero'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
            <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            </table>
        </div>
    @endif
    @if(isset($_POST['categoria']) && $_POST['categoria'] == "Alambres")
            <table>
                <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
                <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
                <td>Presencia Adelca {{ round(($GLOBALS['adelca'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
                <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                </table>
            </div>
        @endif
    @if(isset($_POST['categoria']) && $_POST['categoria'] == "Alambres Puas")
        <table>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
            <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
            <td>Presencia Adelca {{ round(($GLOBALS['adelca'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
            <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            </table>
        </div>
    @endif
    @if(isset($_POST['categoria']) && $_POST['categoria'] == "Mallas de Cerramiento")
        <table>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
            <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
            <td>Presencia Adelca {{ round(($GLOBALS['adelca'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
            <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            </table>
        </div>
    @endif
    @if(isset($_POST['categoria']) && $_POST['categoria'] == "Mallas Agricolas")
        <table>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
            <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
            <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            </table>
        </div>
    @endif
    @if(isset($_POST['categoria']) && $_POST['categoria'] == "Barras")
        <table>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
            <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
            <td>Presencia Adelca {{ round(($GLOBALS['adelca'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/orange-dot.png"></td>
            <td>Presencia Andec {{ round(($GLOBALS['andec'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/green-dot.png"></td>
            <td>Presencia Novacero {{ round(($GLOBALS['novacero'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/ltblue-dot.png"></td>
            <td>Presencia Ipac {{ round(($GLOBALS['ipac'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            <tr>
            <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
            <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
            </tr>
            </table>
        </div>
    @endif
    @if(isset($_POST['categoria']) && $_POST['categoria'] == "Electrosoldadas")
            <table>
                <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
                <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
                <td>Presencia Adelca {{ round(($GLOBALS['adelca'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/orange-dot.png"></td>
                <td>Presencia Andec {{ round(($GLOBALS['andec'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/green-dot.png"></td>
                <td>Presencia Novacero {{ round(($GLOBALS['novacero'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                <tr>
                <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
                <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
                </tr>
                </table>
            </div>
        @endif
        @if(isset($_POST['categoria']) && $_POST['categoria'] == "Vigas")
                <table>
                    <tr>
                    <td><img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png"></td>
                    <td>Presencia Ideal {{ round(($GLOBALS['ideal'] / $GLOBALS['total'])*100, 2) }}%</td>
                    </tr>
                    <tr>
                    <td><img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png"></td>
                    <td>Presencia Adelca {{ round(($GLOBALS['adelca'] / $GLOBALS['total'])*100, 2) }}%</td>
                    </tr>
                    <tr>
                    <td><img src="http://maps.google.com/mapfiles/ms/micons/orange-dot.png"></td>
                    <td>Presencia Andec {{ round(($GLOBALS['andec'] / $GLOBALS['total'])*100, 2) }}%</td>
                    </tr>
                    <tr>
                    <td><img src="http://maps.google.com/mapfiles/ms/micons/green-dot.png"></td>
                    <td>Presencia Novacero {{ round(($GLOBALS['novacero'] / $GLOBALS['total'])*100, 2) }}%</td>
                    </tr>
                    <tr>
                    <td><img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png"></td>
                    <td>Presencia Importados {{ round(($GLOBALS['importados'] / $GLOBALS['total'])*100, 2) }}%</td>
                    </tr>
                    </table>
                </div>
            @endif
    <div id="map"></div>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="/js/all.js"></script>
    <script>
    $("#volver").click(function(){
        window.open("/home", "_self");
    });
    </script>
  </body>
</html>