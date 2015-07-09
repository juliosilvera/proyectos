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
        $mapa = $homeModel->mapa($datos['path']);
        return view('/'.$datos['path'].'.'.$id, compact('datos', 'mapa'));
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
}
