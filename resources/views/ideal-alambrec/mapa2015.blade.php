<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/all.css">
    <title>Using closures in event listeners</title>
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
              left: 50%;
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
  ["{{ $m->id }}", {{ $m->lat }}, {{ $m->lng }}],
  @endforeach
  ];
  for (var i = 0; i < data.length; ++i) {
    var marker = new google.maps.Marker({
      position: {
        lat: data[i][1],
        lng: data[i][2]
      },
      map: map
    });
    attachSecretMessage(marker, data[i][0]);
  }
}

// Attaches an info window to a marker with the provided message. When the
// marker is clicked, the info window will open with the secret message.
function attachSecretMessage(marker, secretMessage) {
  var infowindow = new google.maps.InfoWindow({
    content: secretMessage
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
    <input type="submit" value="Filtrar" class="form-control">
    </div>

    </div>
    </form>
    </div>
    <div id="map"></div>
    <script src="/js/all.js"></script>
  </body>
</html>