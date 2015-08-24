@extends('app')

@section('header')
@include('nav.nav')
@stop

@section('content')
<?php
$provincia = Auth::user()->provincia;
$photos = \App\EncuestasIdealAlambrec::where('foto', '')->where('provincia', $provincia)->orderBy('nombre_comercial', 'asc')->get();
?>
<center>FOTOS</center>
<div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>CIUDAD</th>
                <th>NOMBRE DEL LOCAL</th>
                <th>EDITAR</th>
              </tr>
            </thead>
            <tbody>
            @foreach($photos as $p)
              <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->ciudad }}</td>
                <td>{{ $p->nombre_comercial }}</td>
                <td><a href="/home/edit_photos?id={{ $p->id }}">EDITAR</a> </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
@stop

@section('footer')

@stop