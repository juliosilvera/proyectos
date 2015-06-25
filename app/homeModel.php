<?php

    namespace App;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;

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
                $datos['cargadas'] = EncuestasGrupoKFC::where(['user' => $user, 'fecha' => Carbon::now()->format('Y-m-d')])->count();
                $datos['proyecto'] = $proyecto->nombre;
                $datos['logo'] = $proyecto->logo;
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

                return $datos;

            }

        public function admin()
            {
                $datos['clientes'] = Cliente::all();
                $datos['proyecto'] = "Administración";
                $datos['logo'] = "logo_orange.png";
                $datos['menu'] = [
                    'Escritorio' => '/home',
                    'Clientes' => '/home/clientes',
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
    }
