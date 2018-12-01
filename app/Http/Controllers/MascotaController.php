<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
class MascotaController extends Controller
{
 	// public function	__construct(){
 	// 	return $this->middleware('auth');
 	// }   
	public function register(Request $request){

		if (!$request->ajax()) return redirect("/");

		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cadena = "";
        for($i=0;$i<10;$i++)
        {
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1);
		}
		
		$mascota = new Mascota();
		$mascota->user_id=\Auth::user()->id;
		$mascota->nombre = $request->get('nombre');
		$mascota->tipo = $request->get('tipo');
		$mascota->fecha_nac = $request->get('fecha_nac');
		$mascota->sexo = $request->get('sexo');

		if($request->hasFile('foto')){
			
			$archivo = $request->file('foto');
            $extension=$archivo->getClientOriginalExtension();
            $nombre=\Auth::User()->id."_".$cadena.".".$extension;
            $archivo->move(public_path().'/imagenes/profile/',$nombre);
            $mascota->foto=$nombre;
        }

		$mascota->save();

		return ["mensaje"=>"Perfil Completado!"];
	}

	
}
