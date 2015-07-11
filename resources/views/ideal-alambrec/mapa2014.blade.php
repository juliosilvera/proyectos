<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
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
      #panel3 {
        position: absolute;
        bottom: 150px;
        right: 5px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
      #panel2 {
        position: absolute;
        bottom: 5px;
        left: 5px;
        
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
        #logo {
        position: absolute;
        right:0px;
        bottom: 0px;
        z-index: 5;
      }
         #name {
        position: absolute;
        top: 5px;
        left:20px;
        z-index: 5;
      }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=visualization">
    </script>
    <script type="text/javascript">
        
      function initialize() {
  var mapOptions = {
    zoom: 6,
    center: new google.maps.LatLng(-1.567930, -78.460751),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById("map_canvas"),
                                mapOptions);

  setMarkers(map, beaches);
        
}

/**
 * Data for the markers consisting of a name, a LatLng and a zIndex for
 * the order in which these markers should display on top of each
 * other.
 */
var beaches = [
<?php
$sel = '';
$vueltas = DB::table('vuelta2')->where(function($query){
  if (isset($_POST['distribuidores'])) {
if ($_POST['distribuidores'] != "todos") {
  $query->where('dist', $_POST['distribuidores']);
}else{
  if ($_POST['clientes'] != 'todos') {
    $query->where('codigo', $_POST['clientes']);
    $sel = $_POST['clientes'];
  }
  if ($_POST['productos'] != 'todos') {
    $query->where($_POST['productos'], '1');
  }

}
}
})->get();

foreach ($vueltas as $v) {
  $suma_ideal = $v->clavos_ideal +  $v->alambres_ideal + $v->puas_ideal + $v->mallas_ideal + $v->agricolas_ideal + $v->barras_ideal + $v->electrosoldadas_ideal + $v->vigas_ideal;
  $suma_adelca = $v->clavos_adelca + $v->alambres_adelca + $v->puas_adelca + $v->mallas_adelca + $v->barras_adelca + $v->electrosoldadas_adelca + $v->vigas_adelca;
  $tipo = $v->dist;
    switch ($tipo) {
      case 'MAYORISTA':
        $pin = "http://google.com/mapfiles/ms/micons/ylw-pushpin.png";
        break;

      case 'DISTRIBUIDOR':
        $pin = "http://google.com/mapfiles/ms/micons/blue-pushpin.png";
        break;

      case 'MAYORISTAS ESTRATEGICOS':
        $pin = "http://google.com/mapfiles/ms/micons/grn-pushpin.png";
        break;

      case 'DETALLISTA':
        $pin = "http://google.com/mapfiles/ms/micons/ltblu-pushpin.png";
        break;
      
      default:
       if ($suma_ideal > $suma_adelca) {
      $pin = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
      }else{
      $pin = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
    }
        break;
    }
    
  


  echo '["'.$v->id.'", "'.$v->ciudad.'", "'.$v->fecha.'", "'.$v->barrio.'", "'.$v->nombre_comercial.'", "'.$v->propietario.'", "'.$v->encargado.'", "'.$v->calle_principal.'", "'.$v->numero.'", "'.$v->calle_secundaria.'", "'.$v->telefono.'", "'.$v->productos1.'", "'.$v->productos2.'", "'.$v->productos3.'", "'.$v->tipo_ferreteria.'", "'.$v->lat.'", "'.$v->lng.'", "'.$v->antes.'", "'.$v->despues.'", "'.$v->clasificacion_distribuidor.'", "'.$pin.'"],';
}




?>
  
];
        
function setMarkers(map, locations) {
  for (var i = 0; i < locations.length; i++) {
    var beach = locations[i];
    var image = new google.maps.MarkerImage(beach[20]);
    var myLatLng = new google.maps.LatLng(beach[15], beach[16]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: beach[0],
        icon : image
    });
     setText(marker,beach[0], beach[1], beach[3], beach[4], beach[5], beach[6], beach[7], beach[8], beach[9], beach[10], beach[11], beach[12], beach[13], beach[14], beach[19], beach[17], beach[18]); 
  }
}
function setText(marker,id, ciudad, barrio, nombre, propietario, encargado, calle_principal, numero, calle_secundaria, telefono, productos1, productos2, productos3, tipo_ferreteria, clasificacion_distribuidor, antes, despues){
   var message = "<table><tr><td><img src='fotos/"+antes+"' style='width:100px; height:auto;' /><img src='fotos/"+despues+"' style='width:100px; height:auto;' /></td><td><p><b>ID:</b>"+id+"</p><p><b>Nombre del Local:</b> "+nombre+"</p><p><b>Direcci¨®n:</b>"+calle_principal+" No: "+numero+" "+calle_secundaria+"</p><p><b>Nombre del Propietario:</b> "+propietario+"</p><p><b>Tipo del Local:</b> "+tipo_ferreteria+"</p><p><b>Telefono:</b> "+telefono+"</p><p><b>Distribuidor 1:</b> "+productos1+"</p></td></tr></table>";
  var infowindow = new google.maps.InfoWindow({
    content: message
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(marker.get('map'), marker);
  });
}
function mas(id){
    var myWindow = window.open("info?id="+id, "", "width=600, height=600");
}
function volver(){
    window.open("/home", "_self");
}

function calor(){
window.open("/home/mapa2014_calor","_self")
}

function salir(){
window.open("/auth/logout","_self")
}
function clientes(val){
      alert(val);
    }
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
       <div id="panel">
        <button onclick="volver()">Volver al Menu</button>
        <button onclick="calor()">Mapa de Calor</button>
        <button onclick="salir()">Salir</button>
    </div>   
    <div id="panel2">
        <table>
          <tr>
            <td>
              <img src="http://google.com/mapfiles/ms/micons/ylw-pushpin.png">
            </td>
            <td>
              MAYORISTA
            </td>
          </tr>
          <tr>
            <td>
              <img src="http://google.com/mapfiles/ms/micons/blue-pushpin.png">
            </td>
            <td>
              DISTRIBUIDOR
            </td>
          </tr>
          <tr>
            <td>
              <img src="http://google.com/mapfiles/ms/micons/grn-pushpin.png">
            </td>
            <td>
              MAYORISTAS ESTRATEGICOS
            </td>
          </tr>
          <tr>
            <td>
              <img src="http://google.com/mapfiles/ms/micons/ltblu-pushpin.png">
            </td>
            <td>
              DETALLISTA
            </td>
          </tr>
        </table>
    </div>   
    <div id="panel3">
        <form method="post">
        <p><b>Provincias</b></p>
          <select name="provincia">
          <option value="todos">TODOS</option>
            <?php
            $provincias = DB::table('vuelta2')->groupBy('provincia')->get();
            foreach ($provincias as $prov) {
              echo "<option value='" . $prov->provincia . "'>".$prov->provincia."</option>";
            }
            ?>
          </select>
          <p><b>Solo Distribuidores</b></p>
          <select name="distribuidores">
            <option value="todos">TODOS</option>
            <option value="MAYORISTA">MAYORISTA</option>
            <option value="DISTRIBUIDOR">DISTRIBUIDOR</option>
            <option value="MAYORISTAS ESTRATEGICOS">MAYORISTAS ESTRATEGICOS</option>
            <option value="DETALLISTA">DETALLISTA</option>
          </select>
          <p>Clientes</p>
          <br>
          <select name="clientes">
            <option value="todos">TODOS</option>
            <?php
            $mayoristas = DB::table('vuelta2')->where('codigo', '!=', 'COMPETENCIA')->groupBy('productos1')->orderBy('productos1', 'asc')->get();
              foreach ($mayoristas as $mayo) {
                if ($mayo->codigo == $sel) {
                  $check = "selected";
                }else{
                  $check = "";
                }
                echo '$("#clientes").append("<option value='.$mayo->codigo.' '.$check.'>'.$mayo->productos1.'</option>");';
              }
            ?>
          </select>
          <p>Productos</p>
          <select name="productos">
            <option value="todos">TODOS</option>
            <option value="clavos_ideal">Clavos Ideal</option>
            <option value="clavos_adelca">Clavos Adelca</option>
            <option value="clavos_novacero">Clavos Novacero</option>
            <option value="clavos_importados">Clavos Importados</option>
            <option value="alambres_ideal">Alambres Ideal</option>
            <option value="alambres_adelca">Alambres Adelca</option>
            <option value="alambres_importados">Alambres Importados</option>
            <option value="puas_ideal">Alambres Puas Ideal</option>
            <option value="puas_adelca">Alambres Puas Adelca</option>
            <option value="puas_importados">Alambres Puas Importados</option>
            <option value="mallas_ideal">Mallas Ideal</option>
            <option value="mallas_adelca">Mallas Adelca</option>
            <option value="mallas_importados">Mallas Importados</option>
            <option value="agricolas_ideal">Mallas Agricolas Ideal</option>
            <option value="agricolas_importados">Mallas Agricolas Importados</option>
            <option value="barras_ideal">Barras Ideal</option>
            <option value="barras_adelca">Barras Adelca</option>
            <option value="barras_andec">Barras Andec</option>
            <option value="barras_novacero">Barras Novacero</option>
            <option value="barras_ipac">Barras Ipac</option>
            <option value="barras_importados">Barras Importados</option>
            <option value="electrosoldadas_ideal">Electrosoldadas Ideal</option>
            <option value="lectrosoldadas_adelca">Electrosoldadas Adelca</option>
            <option value="electrosoldadas_andec">Electrosoldadas Andec</option>
            <option value="electrosoldadas_novacero">Electrosoldadas Novacero</option>
            <option value="electrosoldadas_importados">Electrosoldadas Importados</option>
            <option value="vigas_ideal">Vigas Ideal</option>
            <option value="vigas_adelca">Vigas Adelca</option>
            <option value="vigas_andec">Vigas Andec</option>
            <option value="vigas_novacero">Vigas Novacero</option>
            <option value="vigas_importados">Vigas Importados</option>
          </select>
          <br><br><input type="submit" value="Filtrar">
        </form>
        
    </div>  
      
      <div id="logo"><img src="img/logo-ideal.png" style="width:150px;" /> </div>
    <div id="map_canvas" style="width:100%; height:100%"></div>
   
  </body>
</html>