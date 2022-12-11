<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveles;
use App\Models\Usuarios;

class LoginController extends Controller
{
    //
    public function login(){
        $usuarios= Usuarios::all();
        return view('login.login', compact('usuarios'));
    }

    public function valida(Request $request){
        $email = $request->input('email');
        $pass = $request->input('pass');

        $consulta = Usuarios::where('email','=',$email)
            ->where('pass','=', $pass)
            ->get();

        if(count($consulta)==0 or $consulta[0]->activo=='0'){
            return view('login.login');
        }
        else{

            $request->session()->put('session_id', $consulta[0]->id_usuario);
            $request->session()->put('session_name', $consulta[0]->nombre);
            $request->session()->put('session_tipo', $consulta[0]->id_nivel);
            $request->session()->put('session_foto', $consulta[0]->foto);

            $session_id = $request->session()->get('session_id');
            $session_name = $request->session()->get('session_name');
            $session_tipo = $request->session()->get('session_tipo');
            $session_foto = $request->session()->get('session_foto');

            if($session_tipo == 1){
                return redirect()->route('usuarios.index');
            }
            elseif ($session_tipo == 2) {
                //return redirect()->route('ventas.index');
                return redirect()->route('usuarios.index');
            } 
            else{
                return redirect()->route('shop');
            }
        }
    }

    public function logout(Request  $request){
        $request->session()->forget('session_id');
        $request->session()->forget('session_name');
        $request->session()->forget('session_tipo');
        
        return view('inicio.index');
    }
}