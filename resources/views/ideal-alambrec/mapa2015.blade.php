<?php
$provincias = \App\EncuestasIdealAlambrec::where('provincia', '!=', '')->groupBy('provincia')->get();
$mapa = \App\EncuestasIdealAlambrec::where(function($query){

if(isset($_POST['provincia']) && $_POST['provincia'] != "")
{
    $query->where('provincia', $_POST['provincia']);
}else{
    $query->where('provincia', 'Azuay');
}
})->get();

function fotos($foto){
    if ($foto == "")
    {
        $foto = "http://llamaaldelivery.com/wp-content/uploads/2014/09/sin-foto.jpg";
    }

    return $foto;
}
?>
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
['{{ strtoupper($data->nombre_comercial) }}', {{ $data->lat }}, {{ $data->lng }}, '{{ $data->id }}', '{{ fotos($data->foto) }}'],
@endforeach
];

function setMarkers(map, locations) {
  for (var i = 0; i < locations.length; i++) {
    var data = locations[i];
    var myLatLng = new google.maps.LatLng(data[1], data[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: data[0]
    });
     setText(marker,data[0], data[3], data[4]);
  }
}
function setText(marker, nombre, id, foto){
   var message = "<table><tr><td><img src='/img/"+foto+"' style='width: 300px'></td><td><p><b>ID:</b> "+id+"</p><p><b>Nombre del Local:</b> "+nombre+"</p></td></tr></table>";
  var infowindow = new google.maps.InfoWindow({
    content: message
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(marker.get('map'), marker);
  });
}
function mas(id){
    alert("Funca");
}
function salir(){
    window.open("/home", "_self");
}
var provincia = $("#provincia").val();
google.maps.event.addDomListener(window, 'load', initialize);



    </script>
  </head>
  <body>
      <div id="panel">
          <button onclick="salir()">Volver al Menu</button>
    </div>
    <div id="panel3">
    <form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <select name="provincia">
                <option value="">TODAS</option>
                @foreach($provincias as $prov)
                    <option value="{{ $prov->provincia }}">{{ $prov->provincia }}</option>
                @endforeach
             </select>
             <input type="submit" value="Filtrar">
             </form>
        </div>
    <div id="map_canvas" style="width:100%; height:100%"></div>
  </body>
</html>
