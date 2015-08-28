<?php
function pin($id)
{
    $local = \App\EncuestasIdealAlambrec::where('id', $id)->first();

    $suma_ideal = $local->clavos_ideal + $local->alambres_ideal + $local->alambres_puas_ideal + $local->mallas_cerramiento_ideal + $local->barras_ideal + $local->electro_ideal + $local->vigas_ideal;
    $suma_adelca = $local->clavos_adelca + $local->alambres_adelca + $local->alambres_puas_adelca + $local->mallas_cerramiento_adelca + $local->barras_adelca + $local->electro_adelca + $local->vigas_adelca;

    if($suma_ideal > $suma_adelca)
    {
        return "http://maps.google.com/mapfiles/ms/micons/blue-dot.png";
    }else{
        return "http://maps.google.com/mapfiles/ms/micons/red-dot.png";
    }

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
              top: 50%;
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
    <select name="provincia" class="form-control">
    <option value="">TODAS</option>
    @foreach($provincias as $p)
    <option value="{{ $p->provincia }}" <?php if(isset($_POST['provincia']) && $_POST['provincia'] == $p->provincia){ echo "selected"; } ?>>{{ $p->provincia }}</option>
    @endforeach
    </select>
    </div>
    <div class="col-md-4">
    <select name="ciudad" class="form-control">
    <option value="">TODAS</option>
    @foreach($ciudades as $c)
    <option value="{{ $c->ciudad }}" <?php if(isset($_POST['ciudad']) && $_POST['ciudad'] == $c->ciudad){ echo "selected"; } ?>>{{ $c->ciudad }}</option>
    @endforeach
    </select>
    </div>
    <div class="col-md-4">
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
    <div id="panel3">
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