<?php

    namespace App;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use League\Geotools\Coordinate\Coordinate;

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



    }
