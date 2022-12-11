<?php

namespace App\Http\Controllers;

use App\Models\Niveles;
use App\Models\Usuarios;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $niveles= Niveles::all();
        $usuarios= Usuarios::all();
        return view('niveles.index', compact('niveles', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('niveles.create');
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
        $niveles = new Niveles();

        $niveles->nivel = $request->get('nivel');
        $niveles->save();

        return redirect()->route('niveles.index');
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
        $nivel = Niveles::findOrFail($id);
        return view('niveles.show', compact('nivel'));
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
        $nivel = Niveles::findOrFail($id);
        return view('niveles.edit', compact('nivel'));
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
        $nivel = Niveles::findOrFail($id);
        $nivel->nivel=$request->input('nivel');
        $nivel->save();

        return redirect()->route('niveles.index');
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
        $nivel = Niveles::findOrFail($id);
        $nivel->delete();
        return redirect()->route('niveles.index');
    }
}
