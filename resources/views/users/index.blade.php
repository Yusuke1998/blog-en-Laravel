@extends('layouts')

@section('contenido')
    <h1>Lista de Usuarios</h1><br>

    @if(count($users)> 0)
				<ul>
		    	@foreach($users as $user)
				
						<li>{{$user->name}} -  {{$user->email}}
							<a href="{{ route("users.show",["id"=> $user->id]) }}">Ver detalle</a>
						</li>
					
		    	@endforeach
	    		</ul>
    @else
		<h3>No hay usuarios registrados</h3>
		
    @endif

    
@stop