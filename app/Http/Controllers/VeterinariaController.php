<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veterinaria;
class VeterinariaController extends Controller
{
    public function register(Request $request){

		if (!$request->ajax()) return redirect("/");

		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cadena = "";
        for($i=0;$i<10;$i++)
        {
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1);
		}
		
		$veterinaria = new Veterinaria();
		$veterinaria->user_id=\Auth::user()->id;
		$veterinaria->nombre = $request->get('nombre');
		$veterinaria->direccion = $request->get('direccion');
		$veterinaria->telefono = $request->get('telefono');
        $veterinaria->horario = $request->get('horario');
        $veterinaria->servicios = $request->get('servicios');
        $veterinaria->especialidad = $request->get('especialidad');

		if($request->hasFile('logo')){
			
			$archivo = $request->file('logo');
            $extension=$archivo->getClientOriginalExtension();
            $nombre=\Auth::User()->id."_".$cadena.".".$extension;
            $archivo->move(public_path().'/imagenes/profile/',$nombre);
            $veterinaria->logo=$nombre;
        }

		$veterinaria->save();

		return ["mensaje"=>"Perfil Completado!"];
	}
}
