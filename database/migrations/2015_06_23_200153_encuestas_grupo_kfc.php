<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestasGrupoKfc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('encuestas_grupo_kfc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('fecha');
            $table->string('nombre_gafete');
            $table->string('referencia');
            $table->string('local');
            $table->integer('general');
            $table->integer('higiene');
            $table->integer('amabilidad');
            $table->integer('rapidez');
            $table->integer('precision');
            $table->integer('sabor');
            $table->integer('valor_general');
            $table->integer('malo_mesas');
            $table->integer('malo_roto');
            $table->integer('malo_aspecto');
            $table->integer('malo_contenedores');
            $table->integer('malo_pisos');
            $table->integer('malo_estacionamiento');
            $table->string('limpieza_otro');
            $table->integer('malo_saludo');
            $table->integer('malo_sonrisa');
            $table->integer('malo_grosero');
            $table->integer('malo_gracias');
            $table->integer('malos_atentos');
            $table->integer('malo_entender');
            $table->string('amabilidad_otro');
            $table->integer('malo_ordenar');
            $table->integer('malo_reciban');
            $table->integer('malo_apuro');
            $table->integer('malo_recibir');
            $table->integer('malo_urgencia');
            $table->string('rapidez_otro');
            $table->integer('malo_equivocado');
            $table->integer('malo_falta');
            $table->integer('malo_tamano');
            $table->integer('malo_cantidad');
            $table->integer('malo_disponible');
            $table->integer('malo_cambio');
            $table->string('precision_otro');
            $table->string('malo_sabor');
            $table->string('malo_problema');
            $table->integer('malo_eficacia');
            $table->string('banderin');
            $table->text('detalles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('encuestas_grupo_kfc');
    }
}
