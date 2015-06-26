@extends('app')

@section('header')
@include('nav.nav')
@stop

@section('content')
<div class="well">

        {!! Form::open(['url' => 'home', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::hidden('fecha', $datos['fecha']) !!}
        {!! Form::hidden('user', $datos['user']) !!}
        {!! Form::hidden('provincia', $datos['provincia']) !!}
        {!! Form::hidden('ciudad', $datos['ciudad']) !!}
        <h3><label class="label label-info" id="cargada"></label> </h3>
        <h3><label class="label label-default">Datos del Local</label></h3>
      <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('sector', 'Sector:') !!}
                 {!! Form::select('sector', ['' => 'Sector', 'Norte' => 'Norte', 'Centro' => 'Centro', 'Sur' => 'Sur', 'Valles' => 'Valles'], null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <!-- Barrio Form Input -->
            <div class="form-group">
                 {!! Form::label('barrio', 'Barrio:') !!}
                 {!! Form::text('barrio', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('', 'Nombre del Comercial:') !!}
                 {!! Form::select('', $datos['old_nombre'], null, ['class' => 'form-control', 'id' => 'pick_nombre', 'required']) !!}
            </div>

        </div>
        <div id="extra"></div>
        <div class="col-md-4">
            <!-- Propietario Form Input -->
            <div class="form-group">
                 {!! Form::label('propietario', 'Propietario:') !!}
                 {!! Form::text('propietario', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <!-- Encargado Form Input -->
            <div class="form-group">
                 {!! Form::label('encargado', 'Encargado:') !!}
                 {!! Form::text('encargado', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <!-- Calle_principal Form Input -->
            <div class="form-group">
                 {!! Form::label('calle_principal', 'Calle_principal:') !!}
                 {!! Form::text('calle_principal', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <!-- Numero Form Input -->
            <div class="form-group">
                 {!! Form::label('numero', 'Numero:') !!}
                 {!! Form::text('numero', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <!-- Calle_secundaria Form Input -->
            <div class="form-group">
                 {!! Form::label('calle_secundaria', 'Calle_secundaria:') !!}
                 {!! Form::text('calle_secundaria', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <!-- Telefono Form Input -->
            <div class="form-group">
                 {!! Form::label('telefono', 'Telefono:') !!}
                 {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('acceso', 'Tiene acceso a internet?:') !!}
                 {!! Form::select('acceso', ['' => '', 'Computador' => 'Computador', 'Teléfono Inteligente' => 'Teléfono Inteligente', 'Ambos' => 'Ambos', 'Ninguno' => 'Ninguno'], null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
      </div>
      <h3><label class="label label-default">Distribuidores </label> </h3>
      <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('distribuidor1', 'Distribuidor 1:') !!}
                 {!! Form::select('distribuidor1', $datos['dist'], null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div id="dist1"></div>
        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('distribuidor2', 'Distribuidor 2:') !!}
                 {!! Form::select('distribuidor2', $datos['dist'], null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div id="dist2"></div>
        <div class="col-md-4">
            <div class="form-group">
                 {!! Form::label('distribuidor3', 'Distribuidor 3:') !!}
                 {!! Form::select('distribuidor3', $datos['dist'], null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div id="dist3"></div>
      </div>
      <h3><label class="label label-default">Detalles Ferreteria</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('tipo_ferreteria', 'Tipo de Ferreteria:') !!}
                   {!! Form::select('tipo_ferreteria', ['' => '', 'General' => 'General', 'Agricola' => 'Agricola', 'Materiales de Construcción' => 'Materiales de Construcción', 'Pernero' => 'Pernero', 'Metalmecanicos' => 'Metalmecanicos', 'Automotrices' => 'Automotrices', 'Otros' => 'Otros'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div id="div_tipo"></div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('cadena', 'Pertenece a Cadena?') !!}
                   {!! Form::select('cadena', ['' => '', 'NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('cc', 'Censado / Cerrado:') !!}
                   {!! Form::select('cc', ['' => '', 'Censado' => 'Censado', 'Cerrado' => 'Cerrado'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Clavos</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('clavos_ideal', 'Clavos Ideal:') !!}
                   {!! Form::select('clavos_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
                <div class="form-group">
                     {!! Form::label('clavos_adelca', 'Clavos Adelca:') !!}
                     {!! Form::select('clavos_adelca', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
          <div class="col-md-4">
                <div class="form-group">
                     {!! Form::label('clavos_novacero', 'Clavos Novacero:') !!}
                     {!! Form::select('clavos_novacero', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
          <div class="col-md-4">
                <div class="form-group">
                     {!! Form::label('clavos_importados', 'Clavos Importados:') !!}
                     {!! Form::select('clavos_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
      </div>
      <h3><label class="label label-default">Alambres</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('alambres_ideal', 'Alambres Ideal:') !!}
                   {!! Form::select('alambres_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('alambres_adelca', 'Alambres Adelca:') !!}
                   {!! Form::select('alambres_adelca', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('alambres_importados', 'Alambres Importados:') !!}
                   {!! Form::select('alambres_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Alambres de Puas</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('alambres_puas_ideal', 'Alambres Puas Ideal:') !!}
                   {!! Form::select('alambres_puas_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('alambres_puas_adelca', 'Alambres Puas Adelca:') !!}
                   {!! Form::select('alambres_puas_adelca', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('alambres_puas_importados', 'Alambres Puas Importados:') !!}
                   {!! Form::select('alambres_puas_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Mallas de Cerramiento</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('mallas_cerramiento_ideal', 'Mallas de Cerramiento Ideal:') !!}
                   {!! Form::select('mallas_cerramiento_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('mallas_cerramiento_adelca', 'Mallas de Cerramiento Adelca:') !!}
                   {!! Form::select('mallas_cerramiento_adelca', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('mallas_cerramiento_importados', 'Mallas de Cerramiento Importados:') !!}
                   {!! Form::select('mallas_cerramiento_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Mallas Agricolas</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('mallas_agricolas_ideal', 'Mallas Agricolas Ideal:') !!}
                   {!! Form::select('mallas_agricolas_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('mallas_agricolas_importados', 'Mallas Agricolas Importados:') !!}
                   {!! Form::select('mallas_agricolas_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class=" label label-default">Barras</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('barras_ideal', 'Barras Ideal:') !!}
                   {!! Form::select('barras_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('barras_adelca', 'Barras Adelca:') !!}
                   {!! Form::select('barras_adelca', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('barras_andec', 'Barras Andec:') !!}
                   {!! Form::select('barras_andec', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('barras_novacero', 'Barras Novacero:') !!}
                   {!! Form::select('barras_novacero', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('barras_ipac', 'Barras Ipac:') !!}
                   {!! Form::select('barras_ipac', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('barras_importados', 'Barras Importados:') !!}
                   {!! Form::select('barras_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Mallas Electrosoldadas</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('electro_ideal', 'Mallas Electrosoldadas Ideal:') !!}
                   {!! Form::select('electro_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('electro_adelca', 'Mallas Electrosoldadas Adelca:') !!}
                   {!! Form::select('electro_adelca', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('electro_andec', 'Mallas Electrosoldadas Andec:') !!}
                   {!! Form::select('electro_andec', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('electro_novacero', 'Mallas Electrosoldadas Novacero:') !!}
                   {!! Form::select('electro_novacero', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('electro_importados', 'Mallas Electrosoldadas Importados:') !!}
                   {!! Form::select('electro_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Vigas y Columnas</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('vigas_ideal', 'Vigas y Columnas Ideal:') !!}
                   {!! Form::select('vigas_ideal', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('vigas_adelca', 'Vigas y Columnas Adelca:') !!}
                   {!! Form::select('vigas_adelca', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('vigas_andec', 'Vigas y Columnas Andec:') !!}
                   {!! Form::select('vigas_andec', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('vigas_novacero', 'Vigas y Columnas Novacero:') !!}
                   {!! Form::select('vigas_novacero', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('vigas_importados', 'Vigas y Columnas Importados:') !!}
                   {!! Form::select('vigas_importados', $datos['porcentaje'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Alambre de Soldadura MIG</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('mig', 'Vende Alambre de Soldadura MIG?:') !!}
                   {!! Form::select('mig', ['' => '', 'SI' => 'SI', 'NO' => 'NO', 'NO CONOCE' => 'NO CONOCE'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
      </div>
      <h3><label class="label label-default">Vende Tornillos?</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <table>
                <tr>
                    <td>
                    {!! Form::checkbox('ganchos_j', 1, null, []) !!}
                    </td>
                    <td>
                     Ganchos J
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('tirafondo', 1, null, []) !!}
                    </td>
                    <td>
                     Tirafondo
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('perno_cab_hexa', 1, null, []) !!}
                    </td>
                    <td>
                     Perno Cabeza Hexagonal
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('tornillo_estufa', 1, null, []) !!}
                    </td>
                    <td>
                     Tornillo Estufa
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('perno_cab_red', 1, null, []) !!}
                    </td>
                    <td>
                     Perno Cabeza redonda
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('tornillo_madera', 1, null, []) !!}
                    </td>
                    <td>
                     Tornillo Madera
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('perno_milimetrico', 1, null, []) !!}
                    </td>
                    <td>
                     Perno Milimetrico
                    </td>
                </tr>
              </table>
          </div>
      </div>
      <h3><label class="label label-default">Preguntas Extra</label> </h3>
      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('sabia', 'Sabia Usted que IAB Vende Toernillos?') !!}
                   {!! Form::select('sabia', ['' => '', 'SI' => 'SI', 'NO' => 'NO'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <!-- Agregar Form Input -->
              <div class="form-group">
                   {!! Form::label('agregar', 'Que Producto le Gustaria Agregar a su Portafolio?') !!}
                   {!! Form::text('agregar', null, ['class' => 'form-control']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('promo', 'Ha Comprado la Caja de Clavos en Promocion 26Kg por el Precio de 25Kg?:') !!}
                   {!! Form::select('promo', ['' => '', 'SI' => 'SI', 'NO' => 'NO'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div id="div_promo"></div>
          <div class="col-md-4">
              {!! Form::label('', 'Que le Gustaria Recibir como Premio?') !!}
              <table>
                <tr>
                    <td>
                    {!! Form::checkbox('premios', 1, null, []) !!}
                    </td>
                    <td>
                    Premios Instantaneos (EJ: Camisetas, Gorras….)
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('sorteo', 1, null, []) !!}
                    </td>
                    <td>
                    Por Sorteo (TV, Viajes, etc)
                    </td>
                </tr>
                <tr>
                    <td>
                    {!! Form::checkbox('acumulacion', 1, null, []) !!}
                    </td>
                    <td>
                    Por Acumulacion de Puntos (Desde Celulares hasta TV)
                    </td>
                </tr>
              </table>
          </div>
          <div class="col-md-4">
              <!-- Xq_premio Form Input -->
              <div class="form-group">
                   {!! Form::label('xq_premio', 'Por Que Elegiria Este Premio?') !!}
                   {!! Form::text('xq_premio', null, ['class' => 'form-control']) !!}
              </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('foto', 'Foto') !!}
                {!! Form::file('foto', ['class' => 'form-control']) !!}
            </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                   {!! Form::label('vendido', 'Vendio en este local?:') !!}
                   {!! Form::select('vendido', ['' => '', 'NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <div class="col-md-4">
              <!-- Lat Form Input -->
              <div class="form-group">
                   {!! Form::label('lat', 'Latitud:') !!}
                   {!! Form::text('lat', null, ['class' => 'form-control', 'id' => 'lat', 'readonly']) !!}
              </div>
              <!-- Lng Form Input -->
              <div class="form-group">
                   {!! Form::label('lng', 'Longitud:') !!}
                   {!! Form::text('lng', null, ['class' => 'form-control', 'id' => 'lng', 'readonly']) !!}
              </div>
          </div>
      </div>
      <div class="row">
      <div class="col-md-4">
                  <!-- Submit Button -->
                  <div class="form-group">
                      {!! Form::submit('Guardar', ['class' => 'btn-primary form-control', 'disabled', 'id' => 'submitBtn']) !!}
                  </div>
              </div>
      </div>

        {!! Form::close() !!}

</div>

@stop

@section('footer')
<script>
$(function() {
  var Geo={};

        if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(success, error);
        }

        //Get the latitude and the longitude;
        function success(position) {
            Geo.lat = position.coords.latitude;
            Geo.lng = position.coords.longitude;
            populateHeader(Geo.lat, Geo.lng);
        }

        function error(){
            alert('Fallo al levantar la geoposición, vuelva a cargar la pagina');
        }

        function populateHeader(lat, lng){
            $('#lat').val(lat);
            $('#lng').val(lng);
            $('#cargada').html('Coordenadas Cargadas!');
            $('#submitBtn').prop('disabled', false);


        }
});
  $("#pick_nombre").change(function(){
  $("#pick_nombre option:selected").each(function(){
    var dato = $(this).val();
    switch (dato){
      case 'Nuevo':
      $("#extra").append('<div class="col-md-4">\
                              <label>Nombre Comercial</label>\
                              <input type="text" name="nombre_comercial" class="form-control">\
                          </div>');
      break;

<?php
echo $datos['scripts'];
?>


    }
  });
});
  $("#distribuidor1").change(function(){
    $("#distribuidor1 option:selected").each(function(){
      var dist1 = $(this).val();
      $("#dist1").empty();
      switch (dist1){
        case 'Otro':
        $("#dist1").append('<div class="col-md-4">\
                              <label>Otro Distribuidor 1</label>\
                              <input type="text" name="otro_dist1" class="form-control">\
                          </div>');
        break;
      }
    });
  });

  $("#distribuidor2").change(function(){
    $("#distribuidor2 option:selected").each(function(){
      var dist2 = $(this).val();
      $("#dist2").empty();
      switch (dist2){
        case 'Otro':
        $("#dist2").append('<div class="col-md-4">\
                              <label>Otro Distribuidor 2</label>\
                              <input type="text" name="otro_dist2" class="form-control">\
                          </div>');
        break;
      }
    });
  });

  $("#distribuidor3").change(function(){
    $("#distribuidor3 option:selected").each(function(){
      var dist3 = $(this).val();
      $("#dist3").empty();
      switch (dist3){
        case 'Otro':
        $("#dist3").append('<div class="col-md-4">\
                              <label>Otro Distribuidor 3</label>\
                              <input type="text" name="otro_dist3" class="form-control">\
                          </div>');
        break;
      }
    });
  });

  $("#tipo_ferreteria").change(function(){
    $("#tipo_ferreteria option:selected").each(function(){
      var div_tipo = $(this).val();
      $("#div_tipo").empty();
      switch (div_tipo){
        case 'Otros':
        $("#div_tipo").append('<div class="col-md-4">\
                                     <label>Otro Tipo Ferreteria</label>\
                                     <input type="text" name="otro_tipo" class="form-control">\
                                 </div>');
        break;
      }
    });
  });

  $("#promo").change(function(){
    $("#promo option:selected").each(function(){
      var div_promo = $(this).val();
      $("#div_promo").empty();
      switch (div_promo){
        case 'SI':
        $("#div_promo").append('<div class="col-md-4">\
                                      <label>A que Distribuidor Compro?</label>\
                                      <input type="text" name="dist_compro" class="form-control">\
                                  </div>');
        break;
      }
    });
  });
</script>
@stop