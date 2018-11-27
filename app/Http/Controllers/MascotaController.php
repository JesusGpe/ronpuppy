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

		$mascota = new Mascota();
		$mascota->user_id=\Auth::user()->id;
		$mascota->nombre = $request->get('nombre');
		$mascota->tipo = $request->get('tipo');
		$mascota->fecha_nac = $request->get('fecha_nac');
		$mascota->sexo = $request->get('sexo');
		$mascota->foto = $request->get('foto');

		$mascota->save();

		return ["mensaje"=>"Perfil Completado!"];
	}

}
