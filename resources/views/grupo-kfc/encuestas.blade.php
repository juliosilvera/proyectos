@extends('app')

@section('header')
@include('nav.nav')
@stop

@section('content')
{!! Form::open(['url' => 'home']) !!}
{!! Form::hidden('user', $datos['user']) !!}
{!! Form::hidden('fecha', $datos['fecha']) !!}
<div class="well margin-top">
<div class="row">
        <div class="col-md-3">
            <div class="form-group">
                 {!! Form::label('general', 'Por favor califique su satisfaccion general respecto a su esperiencia en Menestras del Negro:') !!}
                 {!! Form::select('general', $datos['respuestas2'], null, ['id' => 'general', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
             {!! Form::label('higiene', 'La higiene del restaurante:') !!}
             {!! Form::select('higiene', $datos['respuestas'], null, ['id' => 'higiene', 'class' => 'form-control']) !!}
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
             {!! Form::label('amabilidad', 'La amabilidad de los empleados:') !!}
             {!! Form::select('amabilidad', $datos['respuestas'], null, ['id' => 'amabilidad', 'class' => 'form-control']) !!}
        </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                 {!! Form::label('rapidez', 'La rapidez del servicio:') !!}
                 {!! Form::select('rapidez', $datos['respuestas'], null, ['id' => 'rapidez', 'class' => 'form-control']) !!}
            </div>
        </div>

</div>
<div class="row">
        <div class="col-md-3">
        <div class="form-group">
             {!! Form::label('precision', 'La precision con lo ordenado:') !!}
             {!! Form::select('precision', $datos['respuestas'], null, ['id' => 'precision', 'class' => 'form-control']) !!}
        </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                 {!! Form::label('sabor', 'El sabor de la comida:') !!}
                 {!! Form::select('sabor', $datos['respuestas'], null, ['id' => 'sabor', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                 {!! Form::label('valor_general', 'El valor general que obtuvo por el precio que pago:') !!}
                 {!! Form::select('valor_general', $datos['respuestas'], null, ['id' => 'valor_general', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">

        </div>
      </div>
<div id="mala"></div>
<div class="row">
        <div class="col-md-3">
            <div class="form-group">
                 {!! Form::label('banderin', 'El Plato principal tenia el banderin de Menestras del Negro Entregaron en su orden 1 salsa de Aji y 1 Salsa Tartarina o de Queso Le ofrecieron la nueva Sopa de Quinua?') !!}
                 {!! Form::select('banderin', ["NO" => "NO", "SI" => "SI"], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
        <!-- Detalles Textarea Field -->
        <div class="form-group">
             {!! Form::label('detalles', 'Por favor explique porque no estuvo satisfecho con su experiencia en este local Proporcione tantos detalles como crea necesarios:') !!}
             {!! Form::textarea('detalles', null, ['class' => 'form-control']) !!}
        </div>
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">
            
        </div>

</div>
 <!-- Submit Button -->
            <!-- Submit Button -->
            <div class="form-group">
                {!! Form::submit('Evaluar', ['class' => 'btn-primary form-control']) !!}
            </div>
</div>
{!! Form::close() !!}
@stop

@section('footer')
<script>

var higiene = parseInt($("#higiene").val());
var amabilidad = parseInt($("#amabilidad").val());
var rapidez = parseInt($("#rapidez").val());
var precision = parseInt($("#precision").val());
var sabor = parseInt($("#sabor").val());
var valor_general = parseInt($("#valor_general").val());

$("#higiene").change(function(){
$("#higiene option:selected").each(function(){
var valHigiene = $(this).val();
var valHigiene1 = $(this).text();
$("#higiene").empty();
$("#higiene").append('<option value="'+valHigiene+'">'+valHigiene1+'</option>');
if(valHigiene < 3)
{

 $("#mala").append('\
        {!! Form::label("sabor", "Cual de los siguientes enunciados describe porque no estuvo satisfecho con la limpieza del restaurant?") !!}\
     <div class="row" id="malaHigiene">\
            <div class="col-md-3">\
            <div class="form-group">\
            {!! Form::label("malo_mesas", "Mesas o sillas") !!}\
             {!! Form::select("malo_mesas", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
            </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_roto", "Algo roto o rasgado") !!}\
                         {!! Form::select("malo_roto", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_aspecto", "Aspecto del empleado") !!}\
                         {!! Form::select("malo_aspecto", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_contenedores", "Contenedores de basura") !!}\
                         {!! Form::select("malo_contenedores", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
     </div>\
     <div class="row">\
                 <div class="col-md-3">\
                 <div class="form-group">\
                 {!! Form::label("malo_pisos", "Pisos") !!}\
                  {!! Form::select("malo_pisos", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                 </div>\
                 </div>\
                 <div class="col-md-3">\
                 <div class="form-group">\
                             {!! Form::label("malo_estacionamiento", "Estacionamientos / aceras") !!}\
                              {!! Form::select("malo_estacionamiento", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                             </div>\
                 </div>\
                 <div class="col-md-3">\
                 <div class="form-group">\
                      {!! Form::label("limpieza_otro", "Otro") !!}\
                      {!! Form::text("limpieza_otro", null, ["class" => "form-control"]) !!}\
                 </div> \
                 </div>\
                 <div class="col-md-3">\
                 \
                 </div>\
          </div>\
    ');
}
});
});

$("#amabilidad").change(function(){
$("#amabilidad option:selected").each(function(){
var valAmabilidad = $(this).val();
var valAmabilidad1 = $(this).text();
$("#amabilidad").empty();
$("#amabilidad").append('<option value="'+valAmabilidad+'">'+valAmabilidad1+'</option>');
if(valAmabilidad < 3)
{
 $("#mala").append('\
        {!! Form::label("sabor", "Cual de los siguientes enunciados describe porque no estuvo satisfecho con la amabilidad de los empleados?") !!}\
     <div class="row">\
            <div class="col-md-3">\
            <div class="form-group">\
            {!! Form::label("malo_saludo", "No me saludaron") !!}\
             {!! Form::select("malo_saludo", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
            </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_sonrisa", "No me sonrieron") !!}\
                         {!! Form::select("malo_sonrisa", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_grosero", "Fueron groseros o descorteses") !!}\
                         {!! Form::select("malo_grosero", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_gracias", "No me dieron las gracias") !!}\
                         {!! Form::select("malo_gracias", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
     </div>\
     <div class="row">\
                 <div class="col-md-3">\
                 <div class="form-group">\
                 {!! Form::label("malos_atentos", "No fueron atentos") !!}\
                  {!! Form::select("malos_atentos", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                 </div>\
                 </div>\
                 <div class="col-md-3">\
                 <div class="form-group">\
                 {!! Form::label("malo_entender", "No pude entender al empleado") !!}\
                 {!! Form::select("malo_entender", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                 </div>\
                 </div>\
                 <div class="col-md-3">\
                 <div class="form-group">\
                    {!! Form::label("amabilidad_otro", "Otro") !!}\
                    {!! Form::text("amabilidad_otro", null, ["class" => "form-control"]) !!}\
                 </div> \
                 <div class="col-md-3">\
                 \
                 </div>\
          </div>\
    ');
}
});
});

$("#rapidez").change(function(){
$("#rapidez option:selected").each(function(){
var valRapidez = $(this).val();
var valRapidez1 = $(this).text();
$("#rapidez").empty();
$("#rapidez").append('<option value="'+valRapidez+'">'+valRapidez1+'</option>');
if(valRapidez < 3)
{
 $("#mala").append('\
        {!! Form::label("sabor", "Cual de los siguientes enunciados describe porque no estuvo satisfecho con la rapidez del servicio?") !!}\
     <div class="row">\
            <div class="col-md-3">\
            <div class="form-group">\
            {!! Form::label("malo_ordenar", "El tiempo que espere para ordenar mis alimentos") !!}\
             {!! Form::select("malo_ordenar", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
            </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_reciban", "El tiempo que tomo que recibieran mi orden") !!}\
                         {!! Form::select("malo_reciban", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_apuro", "Senti que me apuraban") !!}\
                         {!! Form::select("malo_apuro", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_recibir", "El tiempo que paso para recibir mis alimentos") !!}\
                         {!! Form::select("malo_recibir", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
     </div>\
     <div class="row">\
                 <div class="col-md-3">\
                 <div class="form-group">\
                 {!! Form::label("malo_urgencia", "La sensacion de urgencia del empleado") !!}\
                  {!! Form::select("malo_urgencia", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                 </div>\
                 </div>\
                 <div class="col-md-3">\
                 <div class="form-group">\
                                     {!! Form::label("rapidez_otro", "Otro") !!}\
                                     {!! Form::text("rapidez_otro", null, ["class" => "form-control"]) !!}\
                                  </div> \
                 <div class="col-md-3">\
                 \
                 <div class="col-md-3">\
                 \
                 </div>\
          </div>\
    ');
}
});
});

$("#precision").change(function(){
$("#precision option:selected").each(function(){
var valPrecision = $(this).val();
var valPrecision1 = $(this).text();
$("#precision").empty();
$("#precision").append('<option value="'+valPrecision+'">'+valPrecision1+'</option>');
if(valPrecision < 3)
{
 $("#mala").append('\
        {!! Form::label("sabor", "Cual de los siguientes enunciados describe porque no estuvo satisfecho con la precision por lo ordenado?") !!}\
     <div class="row">\
            <div class="col-md-3">\
            <div class="form-group">\
            {!! Form::label("malo_equivocado", "Me dieron un producto equivocado") !!}\
             {!! Form::select("malo_equivocado", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
            </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_falta", "Falta de un alimento o producto") !!}\
                         {!! Form::select("malo_falta", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_tamano", "Me dieron un tamaño equivocado") !!}\
                         {!! Form::select("malo_tamano", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_cantidad", "Me cobraron una cantidad incorrecta") !!}\
                         {!! Form::select("malo_cantidad", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
     </div>\
     <div class="row">\
                 <div class="col-md-3">\
                 <div class="form-group">\
                 {!! Form::label("malo_disponible", "El alimento o producto no estaba disponible") !!}\
                  {!! Form::select("malo_disponible", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                 </div>\
                 </div>\
                 <div class="col-md-3">\
                 <div class="form-group">\
                             {!! Form::label("malo_cambio", "Me dieron un cambio incorrecto") !!}\
                              {!! Form::select("malo_cambio", $datos["respuestas"], null, ["class" => "form-control"]) !!}\
                             </div>\
                 </div>\
                 <div class="col-md-3">\
                 <div class="form-group">\
                       {!! Form::label("precision_otro", "Otro") !!}\
                       {!! Form::text("precision_otro", null, ["class" => "form-control"]) !!}\
                 </div> \
                 <div class="col-md-3">\
                 \
                 </div>\
          </div>\
    ');
}
});
});

$("#sabor").change(function(){
$("#sabor option:selected").each(function(){
var valSabor = $(this).val();
var valSabor1 = $(this).text();
$("#sabor").empty();
$("#sabor").append('<option value="'+valSabor+'">'+valSabor1+'</option>');
if(valSabor < 3)
{
 $("#mala").append('\
        {!! Form::label("sabor", "Que plato del menu tuvo el mayor impacto en su calificacion sobre el sabor de la comida?") !!}\
     <div class="row">\
            <div class="col-md-3">\
                 <div class="form-group">\
                       {!! Form::label("malo_sabor", "Que plato del menu tuvo el mayor impacto en su calificacion sobre el sabor de la comida?") !!}\
                       {!! Form::text("malo_sabor", null, ["class" => "form-control"]) !!}\
                 </div> \
            </div>\
            <div class="col-md-3">\
            </div>\
            <div class="col-md-3">\
            \
            </div>\
            <div class="col-md-3">\
            \
            </div>\
     </div>\
    ');
}
});
});


$("#valor_general").change(function(){
$("#valor_general option:selected").each(function(){
var valValorGeneral = $(this).val();
var valValorGeneral1 = $(this).text();
$("#valor_general").empty();
$("#valor_general").append('<option value="'+valValorGeneral+'">'+valValorGeneral1+'</option>');
if(valValorGeneral < 3)
{
 $("#mala").append('\
        {!! Form::label("sabor", "El valor general por el precio que pago.") !!}\
     <div class="row">\
            <div class="col-md-3">\
            <div class="form-group">\
            {!! Form::label("malo_problema", "Experimentó algun problema durante su visita?") !!}\
             {!! Form::select("malo_problema", ["NO" => "NO", "SI" => "SI"], null, ["class" => "form-control"]) !!}\
            </div>\
            </div>\
            <div class="col-md-3">\
            <div class="form-group">\
                        {!! Form::label("malo_eficacia", "Por favor, califique su grado de satisfaccción con respecto a la eficacia con la que se resolvio el problema Si no trato el problema con el personal seleccione N/A.") !!}\
                         {!! Form::select("malo_eficacia", $datos["respuestas2"], null, ["class" => "form-control"]) !!}\
                        </div>\
            </div>\
            <div class="col-md-3">\
            \
            </div>\
            <div class="col-md-3">\
            \
            </div>\
     </div>\
     ');
}
});
});
</script>
@stop