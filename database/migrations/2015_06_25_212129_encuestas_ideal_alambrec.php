<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestasIdealAlambrec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas_ideal_alambrec', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->string('user');
            $table->string('provincia');
            $table->string('ciudad');
            $table->string('barrio');
            $table->string('sector');
            $table->string('nombre_comercial');
            $table->string('propietario');
            $table->string('encargado');
            $table->string('calle_principal');
            $table->string('numero');
            $table->string('calle_secundaria');
            $table->string('telefono');
            $table->string('acceso');
            $table->string('distribuidor1');
            $table->string('otro_dist1');
            $table->string('distribuidor2');
            $table->string('otro_dist2');
            $table->string('distribuidor3');
            $table->string('otro_dist3');
            $table->string('tipo_ferreteria');
            $table->string('otro_tipo');
            $table->string('cadena');
            $table->string('cc');
            $table->string('clavos_ideal');
            $table->string('clavos_adelca');
            $table->string('clavos_novacero');
            $table->string('clavos_importados');
            $table->string('alambres_ideal');
            $table->string('alambres_adelca');
            $table->string('alambres_importados');
            $table->string('alambres_puas_ideal');
            $table->string('alambres_puas_adelca');
            $table->string('alambres_puas_importados');
            $table->string('mallas_cerramiento_ideal');
            $table->string('mallas_cerramiento_adelca');
            $table->string('mallas_cerramiento_importados');
            $table->string('mallas_agricolas_ideal');
            $table->string('mallas_agricolas_importados');
            $table->string('barras_ideal');
            $table->string('barras_adelca');
            $table->string('barras_andec');
            $table->string('barras_novacero');
            $table->string('barras_ipac');
            $table->string('barras_importados');
            $table->string('electro_ideal');
            $table->string('electro_adelca');
            $table->string('electro_andec');
            $table->string('electro_novacero');
            $table->string('electro_importados');
            $table->string('vigas_ideal');
            $table->string('vigas_adelca');
            $table->string('vigas_andec');
            $table->string('vigas_novacero');
            $table->string('vigas_importados');
            $table->string('mig');
            $table->string('ganchos_j');
            $table->string('tirafondo');
            $table->string('perno_cab_hexa');
            $table->string('tornillo_estufa');
            $table->string('perno_cab_red');
            $table->string('tornillo_madera');
            $table->string('perno_milimetrico');
            $table->string('sabia');
            $table->string('agregar');
            $table->string('promo');
            $table->string('dist_compro');
            $table->string('premios');
            $table->string('sorteo');
            $table->string('acumulacion');
            $table->string('xq_premio');
            $table->string('lat');
            $table->string('lng');
            $table->string('foto');
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
        Schema::drop('encuestas_ideal_alambrec');
    }
}
