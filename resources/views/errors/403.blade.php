@extends('errors::layout')

@section('title','403')
@section('message')

	<h1>Accesso Restringido</h1>
	<a href="{{ url()->previous() }}">Regresar</a>
@endsection