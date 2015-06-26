<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncuestasGrupoKFC extends Model
{
    //$table->string('nombre_gafete');
//    $table->string('referencia');
//    $table->string('local');

    protected $table = 'encuestas_grupo_kfc';

    protected $fillable = [
        'user',
        'fecha',
        'provincia',
        'ciudad',
        'nombre_gafete',
        'referencia',
        'local',
        'general',
        'higiene',
        'amabilidad',
        'rapidez',
        'precision',
        'sabor',
        'valor_general',
        'malo_mesas',
        'malo_roto',
        'malo_aspecto',
        'malo_contenedores',
        'malo_pisos',
        'malo_estacionamiento',
        'limpieza_otro',
        'malo_saludo',
        'malo_sonrisa',
        'malo_grosero',
        'malo_gracias',
        'malos_atentos',
        'malo_entender',
        'amabilidad_otro',
        'malo_ordenar',
        'malo_reciban',
        'malo_apuro',
        'malo_recibir',
        'malo_urgencia',
        'rapidez_otro',
        'malo_equivocado',
        'malo_falta',
        'malo_tamano',
        'malo_cantidad',
        'malo_disponible',
        'malo_cambio',
        'precision_otro',
        'malo_sabor',
        'malo_problema',
        'malo_eficacia',
        'banderin',
        'detalles'
    ];
}
