<?php

    namespace App;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use League\Geotools\Coordinate\Coordinate;
    use Maatwebsite\Excel\Facades\Excel;

    class homeModel extends Model {

        //

        public function getDatos()
        {
            $datos = [];
            date_default_timezone_set('America/Guayaquil');
            $datos['fecha'] = Carbon::now()->format('Y-m-d');
            $datos['user'] = Auth::user()->name;
            $datos['path'] = Auth::user()->proyecto;
            $datos['type'] = Auth::user()->type;
            $datos['provincia'] = Auth::user()->provincia;
            $datos['ciudad'] = Auth::user()->ciudad;
            $datos += $this->selByType($datos['type'], $datos['path'], $datos['user']);

            return $datos;
        }

        public function selByType($type, $alias, $user)
            {
              $datos = $this->$type($alias, $user);

                return $datos;
            }

        public function user($alias, $user)
            {
                $proyecto = Cliente::where('alias', $alias)->first();
                $datos['old_nombre'] = $this->getOldNombres();
                $datos['scripts'] = $this->getScriptOld();
                $datos['dist'] = $this->getOldDistri();
                $model = "App\\" . $proyecto->model;
                $datos['cargadas'] = $model::where(['user' => $user, 'fecha' => Carbon::now()->format('Y-m-d')])->count();
                $datos['proyecto'] = $proyecto->nombre;
                $datos['logo'] = $proyecto->logo;
                $datos['model'] = $proyecto->model;
                $datos['menu'] = [
                    'Volver' => '/home',
                    'Salir'  => '/auth/logout'
                ];

                $datos['respuestas'] = [
                    5 => 'Excelente',
                    4 => 'Bueno',
                    3 => 'Regular',
                    2 => 'Malo',
                    1 => 'Muy Malo'
                ];
                $datos['respuestas2'] = [
                    5 => 'Excelente',
                    4 => 'Bueno',
                    3 => 'Regular',
                    2 => 'Malo',
                    1 => 'Muy Malo',
                    0 => 'N/A'
                ];

                $datos['porcentaje'] = ['0' => '0', '10' => '10', '20' => '20', '30' => '30', '40' => '40', '50' => '50', '60' => '60', '70' => '70', '80' => '80', '90' => '90', '100' => '100'];

                return $datos;

            }

        public function admin()
            {
                $datos['clientes'] = Cliente::all();
                $datos['users'] = User::all();
                $datos['display'] = $this->countCiudades();
                $datos['proyecto'] = "Administración";
                $datos['logo'] = "logo_orange.png";
                $datos['menu'] = [
                    'Escritorio' => '/home',
                    'Clientes' => '/home/clientes',
                    'Borrar Cliente' => '/home/borrarCliente',
                    'Encuestas' => '',
                    'Cuentas' => '/home/new_user',
                    'Salir'  => '/auth/logout'
                ];

                return $datos;
            }

        public function cliente($alias, $user)
            {
                $proyecto = Cliente::where('alias', $alias)->first();
                $datos['proyecto'] = $proyecto->nombre;
                $datos['logo'] = $proyecto->logo;
                $datos['menu'] = [
                    'Volver' => '/home',
                    'Salir'  => '/auth/logout'
                ];

                return $datos;
            }

        public function getUserModel($alias)
            {

                $proyecto = Cliente::where('alias', $alias)->first();

                return $proyecto->model;
            }

        public function getOldNombres()
            {
                $old = [
                    '' => 'Nombre',
                    'Nuevo' => 'Nuevo',
                ];
                $nombres = GetOldData::where('ciudad', Auth::user()->ciudad)->orderBy('nombre_comercial', 'asc')->get();
                foreach ($nombres as $n)
                {
                    $old += [
                        $n->nombre_comercial => $n->nombre_comercial,
                    ];
                }

                return $old;

            }

        public function getScriptOld()
            {
                $datos = "";
                $nombres = GetOldData::where('ciudad', Auth::user()->ciudad)->orderBy('nombre_comercial', 'asc')->get();
                foreach ($nombres as $n)
                {
                    $input = '<input type="hidden" name="nombre_comercial" value="'. $n->nombre_comercial . '">';
                    $datos .= "
                            case '" . $n->nombre_comercial . "':
                            $('#extra').append('" . $input . "');
                            $('#propietario').val('" . $n->propietario . "');
                            $('#encargado').val('" . $n->encargado . "');
                            $('#calle_principal').val('" . $n->calle_principal . "');
                            $('#numero').val('" . $n->numero . "');
                            $('#calle_secundaria').val('" . $n->calle_secundaria . "');
                            $('#telefono').val('" . $n->telefono . "');
                            break;
                            ";

                }
                return $datos;
            }

        public function getOldDistri()
            {
                $datos = [
                    '' => 'Distribuidor',
                    'Otro' => 'Otro',
                    'No Tiene' => 'No Tiene',
                ];
                $distribuidores = DB::table('old_clientes')->orderBy('cliente')->get();
                foreach ($distribuidores as $value)
                {
                    $datos += [
                        $value->codigo => $value->cliente." / ".$value->tipo,
                    ];
                }

                return $datos;
            }

        public function countCiudades()
            {
                $tablas = "";
                $clientes = Cliente::all();
                foreach($clientes as $cli)
                {
                    if($cli->alias != "admin")
                    {
                        $model = "App\\" . $cli->model;
                        $ciudades = $model::where('id', '!=', 0)->groupBy('ciudad')->orderBy('ciudad', 'asc')->get();
                        foreach($ciudades as $city)
                        {
                            $num = $model::where('ciudad', $city->ciudad)->count();
                            $tablas .= "['" . $num . "', '" . $city->provincia . "', '" . $city->ciudad . "', '" . $cli->nombre . "' ],";

                        }
                    }
                }
                //dd($tablas);
                return $tablas;
            }

        public function carga_manual($alias, $user)
            {
                $proyecto = Cliente::where('alias', $alias)->first();
                $datos['old_nombre'] = $this->getOldNombres();
                $datos['scripts'] = $this->getScriptOld();
                $datos['dist'] = $this->getOldDistri();
                $model = "App\\" . $proyecto->model;
                $datos['cargadas'] = $model::where(['user' => $user, 'fecha' => Carbon::now()->format('Y-m-d')])->count();
                $datos['proyecto'] = $proyecto->nombre;
                $datos['logo'] = $proyecto->logo;
                $datos['model'] = $proyecto->model;
                $datos['menu'] = [
                    'Volver' => '/home',
                    'Salir'  => '/auth/logout'
                ];

                $datos['respuestas'] = [
                    5 => 'Excelente',
                    4 => 'Bueno',
                    3 => 'Regular',
                    2 => 'Malo',
                    1 => 'Muy Malo'
                ];
                $datos['respuestas2'] = [
                    5 => 'Excelente',
                    4 => 'Bueno',
                    3 => 'Regular',
                    2 => 'Malo',
                    1 => 'Muy Malo',
                    0 => 'N/A'
                ];

                $datos['porcentaje'] = ['0' => '0', '10' => '10', '20' => '20', '30' => '30', '40' => '40', '50' => '50', '60' => '60', '70' => '70', '80' => '80', '90' => '90', '100' => '100'];

                return $datos;

            }

        public function mapa($alias)
            {
                $proyecto = Cliente::where('alias', $alias)->first();
                $model = "App\\" . $proyecto->model;
                $data = $model::all();
                return $data;
            }

        function calificacion($valor){
            switch ($valor)
            {
                case 0:
                    $calificacion = "---";
                    break;

                case $valor >= 1 && $valor < 2:
                    $calificacion = "Muy Malo";
                    break;

                case $valor >= 2 && $valor < 3:
                    $calificacion = "Malo";
                    break;

                case $valor >= 3 && $valor < 4:
                    $calificacion = "Regular";
                    break;

                case $valor >= 4 && $valor < 5:
                    $calificacion = "Bueno";
                    break;

                case $valor >= 5:
                    $calificacion = "Excelente";
                    break;

                default:
                    $calificacion = "---";
                    break;
            }
            return $calificacion;
        }


        public function excel()
            {
                $datos = $this->selByType(Auth::user()->type, Auth::user()->proyecto, Auth::user()->name);
                Excel::create($datos['proyecto'], function($excel) {


                    // Our first sheet
                    $excel->sheet('Encuestas', function($sheet) {
                        $count = 2;
                        $sheet->row(1, array(
                            'Calificación Total', 'Provincia', 'Ciudad', 'Nombre en Gafete', 'Referencia', 'Local', 'Satisfacción General', 'Higiene', 'Mesas o Sillas', 'Algo Roto o Rasgado',
                            'Aspecto del Empleado', 'Contenedores de Basura', 'Pisos', 'Otro', 'Amabilidad', 'No me Saludaron', 'No me Sonrieron', 'Fueron Groseros o Descorteses', 'No me Dieron las Gracias',
                            'No Fueron Atentos', 'No Pude Entender al Empleado', 'Otro', 'Rapidez', 'El tiempo que Espere para Ordenar mis Alimentos', 'El Tiempo que Tomo que Recibieran mi Orden',
                            'Senti que me Apuraban', 'El Tiempo que Paso para Recibir mis Alimentos', 'La Sensación de Urgencia del Empleado', 'Otro', 'Precisión', 'Me Dieron un Producto Equivocado',
                            'Falta de un Alimento o Producto', 'Me dieron un Tamaño Equivocado', 'Me Cobraron una Cantidad Incorrecta', 'El Alimento o Producto no Estaba Disponible', 'Me Dieron un Cambio Incorrecto',
                            'Otro', 'Sabor', 'Que Plato del Menu Tuvo el Mayor Impacto en su Calificación Sobre el Sabor de la Comida', 'Valor General po Precio', 'Experimento Algun Problema Durante su Visita?',
                            'Grado de Satisfacción', 'Tenia Banderin?', 'Por Favor Explique Porque no Estuvo Satisfecho con su Experiencia en Este Local:'
                        ));
                        $todas = EncuestasGrupoKFC::all();
                        foreach($todas as $t)
                        {
                            $count++;
                            $sheet->row($count, array(
                                $this->calificacionTotal($t), $t->provincia, $t->ciudad, $t->nombre_gafete, $this->cambioComas($t->referencia), strtoupper($t->local), $this->calificacion($t->general), $this->calificacion($t->higiene), $this->calificacion($t->malo_mesas), $this->calificacion($t->malo_roto), $this->calificacion($t->malo_aspecto), $this->calificacion($t->malo_contenedores), $this->calificacion($t->malo_pisos), $t->limpieza_otro, $this->calificacion($t->amabilidad), $this->calificacion($t->malo_saludo), $this->calificacion($t->malo_sonrisa), $this->calificacion($t->malo_grosero), $this->calificacion($t->malo_gracias), $this->calificacion($t->malo_atentos), $this->calificacion($t->malo_entender), $t->amabilidad_otro, $this->calificacion($t->rapidez), $this->calificacion($t->malo_ordenar), $this->calificacion($t->malo_reciban), $this->calificacion($t->malo_apuro), $this->calificacion($t->malo_recibir), $this->calificacion($t->malo_urgencia), $t->rapidez_otro, $this->calificacion($t->precision), $this->calificacion($t->malo_equivocado), $this->calificacion($t->malo_falta), $this->calificacion($t->malo_tamano), $this->calificacion($t->malo_cantidad), $this->calificacion($t->malo_disponible), $this->calificacion($t->malo_cambio), $t->precision_otro, $this->calificacion($t->sabor), $t->malo_sabor, $this->calificacion($t->valor_general), $t->malo_problema, $this->calificacion($t->malo_eficacia), $t->banderin, $t->detalles
                            ));

                        }

                    });


                })->export('xls');
            }

        public function calificacionTotal($t){
            $divicion = 0;
            $divisor = 0;

            if($t->general > 0){
                $divisor++;
                $divicion += $t->general;
            }
            if($t->higiene > 0){
                $divisor++;
                $divicion += $t->higiene;
            }
            if($t->amabilidad > 0){
                $divisor++;
                $divicion += $t->amabilidad;
            }
            if($t->rapidez > 0){
                $divisor++;
                $divicion += $t->rapidez;
            }
            if($t->precision > 0){
                $divisor++;
                $divicion += $t->precision;
            }
            if($t->sabor > 0){
                $divisor++;
                $divicion += $t->sabor;
            }
            if($t->valor_general > 0){
                $divisor++;
                $divicion += $t->valor_general;
            }
            $total = $divicion / $divisor;

            $calificacion = $this->calificacion($total);
            return $calificacion;
        }

        function cambioComas($cambio){

            $v = str_replace(",", "/", $cambio);
            return $v;
        }





    }
