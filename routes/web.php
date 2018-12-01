<?php

Route::get('/', function () {

    return view('auth.login');

});

//rutas para las gestion del perfil de la mascota
Route::get('/getUser','HomeController@getUser');
Route::post('/mascota/register','MascotaController@register');

//rutas para las gestion del perfil de la veterinaria
Route::post('/veterinaria/register','VeterinariaController@register');

//rutas para la gestion de los posts
Route::get('/getPosts','PostController@getPosts');
Route::post('/postRegister','PostController@postRegister');

//Rutas para login y gestion de usuarios
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
