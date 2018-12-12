<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function getUser(Request $request){

        $profile = Profile::where('user_id','=',$request->id)->get();

        return ["profile"=>$profile];
    }

    public function register(Request $request){

		if (!$request->ajax()) return redirect("/");

		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cadena = "";

        for($i=0;$i<10;$i++)
        {
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1);
		}
		
		$profile = new Profile();
		$profile->user_id=\Auth::user()->id;
		$profile->nombre = $request->get('nombre');
		$profile->tipom = $request->get('tipom');
		$profile->fecha_nac = $request->get('fecha_nac');
		$profile->sexo = $request->get('sexo');
        $profile->direccion = $request->get('direccion');
        $profile->horario = $request->get('horario');
        $profile->servicios = $request->get('servicios');
        $profile->especialidad = $request->get('especialidad');
        $profile->tipo = $request->get('tipo');

		if($request->hasFile('imagen')){
			
			$archivo = $request->file('imagen');
            $extension=$archivo->getClientOriginalExtension();
            $nombre=\Auth::User()->id."_".$cadena.".".$extension;
            $archivo->move(public_path().'/imagenes/profile/',$nombre);
            $profile->imagen=$nombre;
        }

		$profile->save();

		return ["mensaje"=>"Perfil Completado!"];
	}
}
