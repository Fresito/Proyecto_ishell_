<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;

use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios= Usuarios::all();

        return view('registros.create', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuarios= Usuarios::all();

        return view('registros.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'apellido_p' => 'required|max:15',
            'apellido_m' => 'required|max:15',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|alpha',
            'email' => 'required|unique:tb_usuario|email',
            'pass' => 'required|min:4|max:8'
        ]);

        if($request->file('foto') != ''){
            $file = $request->file('foto');
            $foto = $file->getClientOriginalName();
            $date = date('Ymd_His_');
            $foto2 = $date . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 = "estandar.png";
        }

        $query = Usuarios::create(array(
            'nombre' => $request->input('nombre'),
            'apellido_p' => $request->input('apellido_p'),
            'apellido_m' => $request->input('apellido_m'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'genero' => $request->input('genero'),
            'foto' => $foto2,
            'email' => $request->input('email'),
            'pass' => $request->input('pass'),
            'id_nivel' => 3,
            'activo' => 1,
        ));

        return redirect()->route('inicio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
