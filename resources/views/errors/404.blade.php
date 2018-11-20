@extends('errors::layout')

@section('title','404')
@section('message')

	<h1>Página no encontrada</h1>
	<a href="{{ url()->previous() }}">Regresar</a>
@endsection