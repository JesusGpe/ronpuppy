<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = DB::table('mascotas')
            ->where('user_id', \Auth::user()->id)
            ->select(DB::raw('count(*) as user_count'))
            ->first();

        return view('contenido.contenido',["user"=>$user]);
    }

    public function getUser(Request $request){

        $mascota = Mascota::where('user_id','=',$request->id)->get();

        return ["mascota"=>$mascota];
    }
}
