@extends('backend.template')

@section('title','Dashboard')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Vista del dashboard</h1>
			<p>
				bienvenido : {{ auth()->user()->name }}
			</p>
			{!! Form::open(['route' => 'logout']) !!}
				<input type="submit" value="Cerrar Session" class="btn btn-danger">
			{!! Form::close()!!}
		</div>
	</div>

	
@endsection