<?php

Route::get('/', function () {

    return view('auth.login');

});

//rutas para las gestion del perfil de los perfiles
Route::get('/getUser','ProfileController@getUser');
Route::post('/profile/register','ProfileController@register'); 
//rutas para la gestion de los posts
Route::get('/getPosts','PostController@getPosts');
Route::get('/getComments','CommentController@getComments');
Route::post('/registerComment','CommentController@registerComment');

Route::post('/postRegister','PostController@postRegister');
Route::post('/deletePost','PostController@deletePost');
//Rutas para login y gestion de usuarios
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
