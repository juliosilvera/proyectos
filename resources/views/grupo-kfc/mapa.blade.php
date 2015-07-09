<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8"> 
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
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
       #panel2 {
        position: absolute;
        bottom: 5px;
        left: 0;
        
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
      #panel3 {
        position: absolute;
        bottom: 20%;
        right: 0;
        
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

  setMarkers(map, data);
        
}

/**
 * Data for the markers consisting of a name, a LatLng and a zIndex for
 * the order in which these markers should display on top of each
 * other.
 */
var data = [
@foreach($mapa as $data)
<?php
$valor = $data->general + $data->higiene + $data->amabilidad + $data->rapidez + $data->precision + $data->sabor + $data->valor_general;
$valor = $valor / 7;
switch ($valor)
            {
                case 0:
                    $calificacion = "---";
                    break;

                case $valor >= 1 && $valor < 2:
                    $calificacion = "Muy Malo";
                    $pin = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
                    break;

                case $valor >= 2 && $valor < 3:
                    $calificacion = "Malo";
                    $pin = "http://maps.google.com/mapfiles/ms/icons/orange-dot.png";
                    break;

                case $valor >= 3 && $valor < 4:
                    $calificacion = "Regular";
                    $pin = "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
                    break;

                case $valor >= 4 && $valor < 5:
                    $calificacion = "Bueno";
                    $pin = "http://maps.google.com/mapfiles/ms/icons/ltblue-dot.png";
                    break;

                case $valor >= 5:
                    $calificacion = "Excelente";
                    $pin = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
                    break;

                default:
                    $calificacion = "---";
                    break;
            }
?>
['{{ strtoupper($data->local) }}', {{ $data->lat }}, {{ $data->lng }}, '{{ $calificacion }}', '{{ $pin }}', '{{ $data->direccion }}'],
@endforeach
];
        
function setMarkers(map, locations) {
  for (var i = 0; i < locations.length; i++) {
    var data = locations[i];
    var image = new google.maps.MarkerImage(data[4]);
    var myLatLng = new google.maps.LatLng(data[1], data[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: data[0],
        icon: image
    });
     setText(marker,data[0], data[3], data[5]);
  }
}
function setText(marker, nombre, calificacion, direccion){
   var message = "<table><tr><td><img src='http://acidcow.com/pics/20110426/other/5/lars_van_de_goor_nature_22.jpg' style='width: 300px'></td><td><p><b>Calificación:</b> "+calificacion+"</p><p><b>Nombre del Local:</b> Menestras del Negro -  "+nombre+"</p><p><b>Dirección:</b> "+direccion+"</p></td></tr></table>";
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
function salir(){
    window.open("/home", "_self");
}
google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
      <div id="panel">
          <button onclick="salir()">Volver al Menu</button>
    </div>
    <div id="panel2">
    <table>
    <tr>
    <td>
    <img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png">
    </td>
    <td>
    Excelente
    </td>
    </tr>
    <tr>
    <td>
    <img src="http://maps.google.com/mapfiles/ms/icons/ltblue-dot.png">
    </td>
    <td>
    Bueno
    </td>
    </tr>
    <tr>
    <td>
    <img src="http://maps.google.com/mapfiles/ms/icons/yellow-dot.png">
    </td>
    <td>
    Regular
    </td>
    </tr>
    <tr>
    <td>
    <img src="http://maps.google.com/mapfiles/ms/icons/orange-dot.png">
    </td>
    <td>
    Malo
    </td>
    </tr>
    <tr>
    <td>
    <img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png">
    </td>
    <td>
    Muy Malo
    </td>
    </tr>
    </table>
    </div>



    <div id="map_canvas" style="width:100%; height:100%"></div>
  </body>
</html>
