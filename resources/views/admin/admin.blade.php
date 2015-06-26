@extends('app')

@section('header')
@include('nav.admin')
@stop

@section('content')
@include('nav.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Clientes</h1>

          <div class="row placeholders">
            @foreach($datos['clientes'] as $clientes)
            <div class="col-xs-6 col-sm-3 placeholder">
                  <img src="/img/{{ $clientes->logo }}" class="img-responsive dashImages" alt="Generic placeholder thumbnail">
                  <h4>{{ $clientes->nombre }}</h4>
                  <span class="text-muted">Something else</span>
            </div>
            @endforeach

          </div>
          <h2 class="sub-header">Section title</h2>
          <div id="table_div"></div>
</div>
@stop

@section('footer')
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['table']}]}"></script>
<script>
google.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', '#');
        data.addColumn('string', 'Provincia');
        data.addColumn('string', 'Ciudad');
        data.addColumn('string', 'Proyecto');
        data.addRows([
        <?php
        echo $datos['display'];
        ?>
        
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width:'100%'});
      }
</script>
@stop