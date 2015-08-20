<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EncuestasIdealAlambrec extends Model
{
    //
    protected $table = "encuestas_ideal_alambrec";

    protected $fillable = [
        'id',
        'fecha',
        'user',
        'provincia',
        'ciudad',
        'barrio',
        'sector',
        'nombre_comercial',
        'propietario',
        'encargado',
        'calle_principal',
        'numero',
        'calle_secundaria',
        'telefono',
        'acceso',
        'distribuidor1',
        'otro_dist1',
        'distribuidor2',
        'otro_dist2',
        'distribuidor3',
        'otro_dist3',
        'tipo_ferreteria',
        'otro_tipo',
        'cadena',
        'cc',
        'clavos_ideal',
        'clavos_adelca',
        'clavos_novacero',
        'clavos_importados',
        'alambres_ideal',
        'alambres_adelca',
        'alambres_importados',
        'alambres_puas_ideal',
        'alambres_puas_adelca',
        'alambres_puas_importados',
        'mallas_cerramiento_ideal',
        'mallas_cerramiento_adelca',
        'mallas_cerramiento_importados',
        'mallas_agricolas_ideal',
        'mallas_agricolas_importados',
        'barras_ideal',
        'barras_adelca',
        'barras_andec',
        'barras_novacero',
        'barras_ipac',
        'barras_importados',
        'electro_ideal',
        'electro_adelca',
        'electro_andec',
        'electro_novacero',
        'electro_importados',
        'vigas_ideal',
        'vigas_adelca',
        'vigas_andec',
        'vigas_novacero',
        'vigas_importados',
        'mig',
        'ganchos_j',
        'tirafondo',
        'perno_cab_hexa',
        'tornillo_estufa',
        'perno_cab_red',
        'tornillo_madera',
        'perno_milimetrico',
        'sabia',
        'agregar',
        'promo',
        'dist_compro',
        'premios',
        'sorteo',
        'acumulacion',
        'xq_premio',
        'lat',
        'lng',
        'foto',
        'vendido'
    ];

    public function scopeDesde($query, $desde)
        {
            return $query->where('fecha', '>=', $desde);
        }

    public function scopeHasta($query, $hasta)
        {
            return $query->where('fecha', '<=', $hasta);
        }
}
