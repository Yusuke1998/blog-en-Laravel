@extends('backend.template')

@section('title','Registro de nueva categoria')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>REGISTRO DE UNA NUEVA CATEGORIA</h3>
			<hr>
			{!! Form::open(['route' => 'categories.store']) !!}
				<div class="form-group">
			    	{!! Form::label('name','Nombre:') !!}
			    	{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre de categoria','required' => 'required']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::submit("Guardar",['class' => 'btn btn-primary']) !!}
			    	<a href="{{ url('categories') }}" class="btn btn-danger">Volver al Listado</a>
			    </div>

			{!! Form::close() !!}
		</div>
	</div>

	
@endsection