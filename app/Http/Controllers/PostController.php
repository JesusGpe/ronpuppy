<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Events\NotificationEvent;
class PostController extends Controller
{
    public function getPosts(){

        $posts = Post::join('profiles','posts.user_id','=','profiles.user_id')
        ->select('posts.id','posts.user_id','posts.titulo','posts.descripcion','posts.foto as imagen',
        'posts.created_at','profiles.nombre','profiles.imagen as foto')
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
        
        event(new NotificationEvent("asdasdasd","Adsasd"));
    }

    public function deletePost(Request $request){
        $post = Post::findOrFail($request->id);
        $post->delete();

        return ["mensaje"=>"Post eliminado!"];
    }
}
