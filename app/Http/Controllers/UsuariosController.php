<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Models\Niveles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UsuariosController extends Controller
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

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $niveles = Niveles::all();
        return view('usuarios.create', compact('niveles'));
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
            'clave' => 'required|max:9|unique:tb_usuario',
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
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'apellido_p' => $request->input('apellido_p'),
            'apellido_m' => $request->input('apellido_m'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'genero' => $request->input('genero'),
            'foto' => $foto2,
            'email' => $request->input('email'),
            'pass' => $request->input('pass'),
            'id_nivel' => $request->input('id_nivel'),
            'activo' => $request->input('activo'),
        ));

        return redirect()->route('usuarios.index');
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
        $usuario=Usuarios::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $id)
    {
        //
        $niveles = Niveles::all();
        return view('usuarios.edit')
                ->with(['usuario' => $id])
                ->with(['niveles' => $niveles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $id)
    {
        //
        $validated = $request->validate([
            'clave' => 'required',
            'nombre' => 'required|max:30',
            'apellido_p' => 'required|max:15',
            'apellido_m' => 'required|max:15',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|alpha',
            'email' => 'required    |email',
            'pass' => 'required|min:4|max:8'
        ]);
        
        if($request->file('fotoA') != ''){
            $file = $request->file('fotoA');
            $foto = $file->getClientOriginalName();
            $date = date('Ymd_His_');
            $foto2 = $date . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 = $request->fotoB;
        }

        $query = Usuarios::find($id->id_usuario);
            $query->clave = $request->clave;
            $query->nombre = trim($request->nombre);
            $query->apellido_p = trim($request->apellido_p);
            $query->apellido_m = trim($request->apellido_m);
            $query->fecha_nacimiento = $request->fecha_nacimiento;
            $query->foto = $foto2;
            $query->genero = $request->genero;
            $query->email = trim($request->email);
            $query->pass = trim($request->pass);
            $query->id_nivel = $request->id_nivel;
            $query->activo = $request->activo;
        $query->save();

        return redirect()->route("usuarios.index", ['id' => $id->id_usuario]);
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
        $usuario=Usuarios::findOrFail($id);

        \Storage::disk('local')->delete($usuario->foto); 
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
