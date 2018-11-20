@extends('layouts')

@section('contenido')
    <h1>Crear Usuario</h1><br>

    @if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
    @endif

   	<form action="{{ url("usuarios") }}" method="POST">
   		{!! csrf_field() !!}
   		<input type="text" name="name" value="{{ old("name") }}"><br>
   		@if($errors->has("name"))
			<p>{{$errors->first("name")}}</p>
   		@endif
   		<input type="email" name="email" value="{{ old("email") }}"><br>
   		<input type="password" name="password">
   		<button type="submit" class="btn btn-primary">Enviar</button>
   	</form>

	<a href="{{ route("users")}}">Regresar</a>
    
@stop