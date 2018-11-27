@extends('principal')
@section('contenido')
	<template v-if="menu==0">
	@if($user->user_count > 0)
		<post></post>
    	<posts></posts>
	@else
		<h1>Complete el perfil para continuar</h1>               
     	<register></register>
    @endif
    </template>
	<template v-if="menu==1">
		<perfil :user_id="{{\Auth::user()->id}}"></perfil>
	</template>
@endsection