@extends('backend.template')

@section('title','Registro de nuevo tag')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>REGISTRO DE UNA NUEVO TAG</h3>
			<hr>
			{!! Form::open(['route' => 'tags.store']) !!}
				<div class="form-group">
			    	{!! Form::label('name','Nombre:') !!}
			    	{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre del tag','required' => 'required']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::submit("Guardar",['class' => 'btn btn-primary']) !!}
			    	<a href="{{ url('tags') }}" class="btn btn-danger">Volver al Listado</a>
			    </div>

			{!! Form::close() !!}
		</div>
	</div>

	
@endsection