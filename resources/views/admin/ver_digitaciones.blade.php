@extends('app')

@section('header')
@include('nav.admin')
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Digitador</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($tablas); $i++)
        {
            echo  "
            <tr>
                <td>". $tablas[$i]['user'] ."</td>
                <td>". $tablas[$i]['cantidad'] ."</td>
            </tr>
            ";
        }
        ?>
        </tbody>
      </table>
    </div>
</div>
@stop

@section('footer')

@stop