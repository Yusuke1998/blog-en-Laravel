@extends('layouts')

@section('contenido')
    <h1>Usuario # {{$user->id}}</h1><br>

   	<p>Nombre: {{$user->name }}</p>
	<p>Email: {{$user->email }}</p>

	<a href="{{ route("users")}}">Regresar</a>
    
@stop