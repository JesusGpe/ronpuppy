<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function getComments(Request $request){
        
        $commnets = Comment::join('profiles','comments.user_id','=','profiles.user_id')

        ->where('post_id','=',$request->post_id)
        ->orderBy('id','desc')
        ->get();

        return ["commnets"=>$commnets];
    }

    public function registerComment(Request $request){
        
        $comment = new Comment();

        $comment->user_id = \Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->comentario = $request->comentario;

        $comment->save();

        return ["mensaje" => "Comentario Realizado"];

    }
}
