<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\EncuestasGrupoKFC;
use App\EncuestasIdealAlambrec;
use App\homeModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{

    public function __construct()
        {
            $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(homeModel $homeModel)
    {

        $datos = $homeModel->getDatos();
        return view('/'.$datos['path'].'.'.$datos['type'], compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(homeModel $homeModel, Request $request)
    {
        $datos = $homeModel->getDatos();
        $data = $request->all();


        if ($request->hasFile('foto'))
        {
            $count = EncuestasIdealAlambrec::all()->count();
            $count++;
            $path = "img/";
            $name = "Foto_Ideal_" . $count;
            $data['foto'] = $name;
            $request->file('foto')->move($path, $name);
        }
        $model = "App\\" . $homeModel->getUserModel($datos['path']);
        $encuestas = new $model($data);
        $encuestas->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, homeModel $homeModel)
    {
        $datos = $homeModel->getDatos();

        return view('/'.$datos['path'].'.'.$id, compact('datos', 'mapa'));
    }

    public function mapas($id, homeModel $homeModel)
        {
            $datos = $homeModel->getDatos();
            $mapa = $homeModel->mapa($datos['path']);
            $provincias = $homeModel->provincias($datos['path']);
            $ciudades = $homeModel->ciudades($datos['path']);
            return view('/'.$datos['path'].'.mapa'.$id, compact('datos', 'mapa', 'provincias', 'ciudades'));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function save_user(Request $request)
        {
            $datos = $request->all();
            $datos['password'] = bcrypt($datos['password']);
            $user = new User($datos);
            $user->save();
                return redirect('home');
        }

    public function save_cliente(Request $request)
        {
            $datos = $request->all();
            if ($request->hasFile('logo'))
            {
                $path = "img/";
                $datos['logo'] = $request->file('logo')->getClientOriginalName();
                $request->file('logo')->move($path, $datos['logo']);
            }
            $datos['alias'] = strtolower(str_replace(" ", "-", $datos['nombre']));
            $datos['model'] = "Encuestas". str_replace(" ", "", $datos['nombre']);

            $cliente = new Cliente($datos);
            $cliente->save();
            return redirect('/home');
        }

    public function delete_cliente(Request $request)
        {
            $id = $request->all();
            Cliente::destroy($id);
            return redirect('/home');
        }

    public function delete_user(Request $request)
        {
            User::destroy($request->id);
            return redirect('/home');
        }

    public function estadisticas(homeModel $homeModel)
    {
        $datos = $homeModel->getDatos();
        return view('/'.$datos['path'].'.estadisticas', compact('datos'));
    }

    public function exportExcel(homeModel $homeModel)
        {
            $homeModel->excel();
        }

    public function pruebas()
        {
            $base = \App\EncuestasIdealAlambrec::all();

            foreach($base as $b)
            {
                if(!is_numeric($b->lat))
                {
                    echo $b->id . " / " .$b->lat . "<br>";
                }
                if(!is_numeric($b->lng))
                {
                    echo $b->id . " / " .$b->lng . "<br>";
                }
            }
        }

    public function verDigitaciones(Request $request, homeModel $homeModel)
        {
            $datos = $homeModel->getDatos();
            $model = Cliente::where('nombre', $request->cliente)->first();
            $table = "App\\" . $model->model;
            $digitadores = $table::desde($request->desde)->hasta($request->hasta)->groupBy('user')->get();
            $tablas = [];
            $count = 0;
            foreach($digitadores as $d)
            {
                $cargas = $table::desde($request->desde)->hasta($request->hasta)->where('user', $d->user)->count();
                $tablas[$count] =
                   [ 'user' => $d->user,
                    'cantidad' => $cargas];
                $count++;
            }

            return view('admin/ver_digitaciones', compact('datos', 'tablas'));
        }

    public function save_photos(homeModel $homeModel, Request $request)
        {
            $datos = $homeModel->getDatos();
            $data = $request->all();


            if ($request->hasFile('foto'))
            {
                $count = EncuestasIdealAlambrec::where('foto', '')->count();
                $path = "img/";
                $name = "Foto_Ideal_Nueva_" . $count . ".jpg";
                $data['foto'] = $name;
                $request->file('foto')->move($path, $name);
            }
            $model = "App\\" . $homeModel->getUserModel($datos['path']);
            $encuestas = $model::find($request->id);
            $encuestas->foto = $data['foto'];

            $encuestas->save();
            return redirect('/home/photos');
        }

    public function excel(Request $request)
        {
            ini_set('memory_limit', -1);
            Excel::create('Excel-Ideal', function($excel) use($request){

                $excel->sheet('Encuestas', function($sheet) use($request) {

                    $sheet->row(1, array(
                        'ID', 'PROVINCIA', 'CIUDAD', 'BARRIO', 'SECTOR', 'NOMBRE COMERCIAL', 'PROPIETARIO', 'ENCARGADO', 'CALLE PRINCIPAL', 'NUMERO', 'CALLE SECUNDARIA', 'TELEFONO', 'ACCESO',
                        'DISTRIBUIDOR 1', 'OTRO DISTRIBUIDOR 1', 'DISTRIBUIDOR 2', 'OTRO DISTRIBUIDOR 2', 'DISTRIBUIDOR 3', 'OTRO DISTRIBUIDOR 3', 'TIPO DE FERRETERIA', 'OTRO TIPO', 'CADENA',
                        'CENSADO / CERRADO', 'CLAVOS IDEAL', 'CLAVOS ADELCA', 'CLAVOS IMPORTADOS', 'ALAMBRES IDEAL', 'ALAMBRES ADELCA', 'ALAMBRES IMPORTADOS', 'ALAMBRES DE PUAS IDEAL',
                        'ALAMBRES DE PUAS ADELCA', 'ALAMBRES DE PUAS IMPORTADOS', 'MALLAS DE CERRAMIENTO IDEAL', 'MALLAS DE CERRAMIENTO ADELCA', 'MALLAS DE CERRAMIENTO IMPORTADOS',
                        'MALLAS AGRICOLAS IDEAL', 'MALLAS AGRICOLAS IMPORTADOS', 'BARRAS IDEAL', 'BARRAS ADELCA', 'BARRAS ANDEC', 'BARRAS NOVACERO', 'BARRAS IPAC', 'BARRAS IMPORTADOS',
                        'ELECTROSOLDADAS IDEAL', 'ELECTROSOLDADAS ADELCA', 'ELECTROSOLDADAS ANDEC', 'ELECTROSOLDADAS NOVACERO', 'ELECTROSOLDADAS IMPORTADOS', 'VIGAS IDEAL', 'VIGAS ADELCA',
                        'VIGAS ANDEC', 'VIGAS NOVACERO', 'VIGAS IMPORTADOS', 'VENDE ALAMBRE DE SOLDADURA MIG?', 'VENDE TORNILLOS?', 'SABIA USTED QUE IAB VENDE TORNILLOS', 'QUE PRODUCTO LE GUSTARIA AGREGAR A SU PORTAFOLIO?',
                        'HA COMPRADO LA CAJA DE CLAVOS EN PROMOCION 26KG POR EL PRECIO DE 25KG?', 'DISTRIBUIDOR AL QUE LO COMPRO', 'QUE LE GUSTARIA RECIBIR COMO PREMIO?', 'POR QUE ELEGIRIA ESTE PREMIO?', 'VENDIO EN ESTE LOCAL?'
                    ));

                    $count = 1;
                    $encuestas = EncuestasIdealAlambrec::whereBetween('id', array($request->desde, $request->hasta))->get();
                    foreach($encuestas as $e)
                    {
                        $tornillos = "";
                        $premios = "";
                        if($e->ganchos_j == 1)
                        {
                            $tornillos .= "Ganchos J, ";
                        }
                        if($e->tirafondo == 1)
                        {
                            $tornillos .= "Tirafondo, ";
                        }
                        if($e->perno_cab_hexa == 1)
                        {
                            $tornillos .= "Perno Cabeza Hexagonal, ";
                        }
                        if($e->tornillo_estufa == 1)
                        {
                            $tornillos .= "Tornillo Estufa, ";
                        }
                        if($e->perno_cab_red == 1)
                        {
                            $tornillos .= "Perno Cabeza Redonda, ";
                        }
                        if($e->tornillo_madera == 1)
                        {
                            $tornillos .= "Tornillo Madera, ";
                        }
                        if($e->perno_milimetrico == 1)
                        {
                            $tornillos .= "Perno Milimetrico";
                        }
                        if($e->premios == 1)
                        {
                            $premios .= "Premios, ";
                        }
                        if($e->sorteo == 1)
                        {
                            $premios .= "Sorteos, ";
                        }
                        if($e->acumulacion == 1)
                        {
                            $premios .= "Acumulación, ";
                        }
                        $count++;
                        $sheet->row($count, array($e->id, $e->provincia, $e->ciudad, $e->barrio, $e->sector, $e->nombre_comercial, $e->propietario, $e->encargado, $e->calle_principal, $e->numero,
                                $e->calle_secundaria, $e->telefono, $e->acceso, $e->distribuidor1, $e->otro_dist1, $e->distribuidor2, $e->otro_dist2, $e->distribuidor3, $e->otro_dist3, $e->tipo_ferreteria,
                                $e->otro_tipo, $e->cadena, $e->cc, $e->clavos_ideal, $e->clavos_adelca, $e->clavos_novacero, $e->clavos_importados, $e->alambres_ideal, $e->alambres_adelca, $e->alambres_importados,
                                $e->alambres_puas_ideal, $e->alambres_puas_adelca, $e->alambres_puas_importados, $e->mallas_cerramiento_ideal, $e->mallas_cerramiento_adelca, $e->mallas_cerramiento_importados,
                                $e->mallas_agricolas_ideal, $e->mallas_agricolas_importados, $e->barras_ideal, $e->barras_adelca, $e->barras_andec, $e->barras_novacero, $e->barras_ipac, $e->barras_importados,
                                $e->electro_ideal, $e->electro_adelca, $e->electro_novacero, $e->electro_importados, $e->vigas_ideal, $e->vigas_adelca, $e->vigas_andec, $e->vigas_novacero, $e->vigas_importados,
                                $e->mig, $tornillos, $e->sabia, $e->agregar, $e->promo, $e->dist_compro, $premios, $e->xq_premio, $e->vendido)
                        );
                    }

                });


            })->export('xls');
        }


}
