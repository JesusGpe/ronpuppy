<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function getPosts(){

        $posts = Post::join('mascotas','posts.user_id','=','mascotas.user_id')
        ->select('posts.id','posts.user_id','posts.titulo','posts.descripcion','posts.foto as imagen',
        'posts.created_at','mascotas.nombre','mascotas.foto as foto')
        ->OrderBy('id','desc')->get();

        return ["posts" => $posts];

    }

    public function postRegister(Request $request){

        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cadena = "";
        for($i=0;$i<10;$i++)
        {
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1);
        }

    	$publicacion = new Post();
    	$publicacion->user_id=$request->user_id;
    	$publicacion->titulo=$request->titulo;
    	$publicacion->descripcion=$request->descripccion;
        if($request->hasFile('foto')){
            $archivo = $request->file('foto');
            $extension=$archivo->getClientOriginalExtension();
            $nombre=\Auth::User()->id."_".$cadena.".".$extension;
            $archivo->move(public_path().'/imagenes/posts/',$nombre);
            $publicacion->foto=$nombre;
        }
    	$publicacion->save();
    }
}
