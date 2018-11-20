@extends('layouts')

@section('contenido')
    <h1>Editar Usuario</h1><br>

    @if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
    @endif

   	<form action="{{ url("usuarios/{$user->id}") }}" method="POST">
      {{ method_field("PUT") }}
   		{!! csrf_field() !!}
   		<input type="text" name="name" value="{{ old("name",$user->name) }}"><br>
   		<input type="email" name="email" value="{{ old("email",$user->email) }}"><br>
   		<input type="password" name="password">
   		<button type="submit" class="btn btn-primary">Actualizar Usuario</button>
   	</form>

	<a href="{{ route("users")}}">Regresar</a>
    
@stop