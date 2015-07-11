@extends('app')

@section('header')
@include('nav.cliente')
@stop

@section('content')
    <div class="well">
            <div class="row">
              <div class="col-md-3"><h3>{{ $datos['proyecto'] }}</h3></div>
              <div class="col-md-6"></div>
              <div class="col-md-3"><img src="/img/{{ $datos['logo'] }}" class="clienteLogo"> </div>
            </div>
    </div>

@stop

@section('footer')
@include('nav.footer2')
@stop