<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Usuarios;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos= Productos::all();
        $usuarios= Usuarios::all();
        return view('productos.index', compact('productos', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
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
        
        if($request->file('image_path') != ''){
            $file = $request->file('image_path');
            $foto = $file->getClientOriginalName();
            $date = date('Ymd_His_');
            $foto2 = $date . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 = "estandar.png";
        }

        $query = Productos::create(array(
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'price' => $request->input('price'),
            'image_path' => $foto2,
        ));

        return redirect()->route('productos.index');
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
        $productos = Productos::findOrFail($id);
        return view('productos.show', compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $id)
    {
        //
        return view('productos.edit')
                ->with(['producto' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $id)
    {
        //
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

        $query = Productos::find($id->id);
            $query->name = trim($request->name);
            $query->details = trim($request->details);
            $query->price = $request->price;
            $query->image_path = $foto2;
        $query->save();

        return redirect()->route("productos.index", ['id' => $id->id]);
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
        $producto = Productos::findOrFail($id);

        \Storage::disk('local')->delete($producto->image_path); 
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
