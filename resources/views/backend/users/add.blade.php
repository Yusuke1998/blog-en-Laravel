@extends('backend.template')

@section('title','Registro de nuevo usuario')

@section('content')
  <div class="row">
	<div class="col-md-12">
	  <h3>REGISTRO DE UN NUEVO USUARIO</h3>
	  <hr>
	  {!! Form::open(['route' => 'users.store']) !!}
		<div class="form-group">
			{!! Form::label('name','Nombre:') !!}
			{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre del usuario','required' => 'required']) !!}
		 </div>
		 <div class="form-group">
			{!! Form::label('email','Email:') !!}
			{!! Form::email('email',null,['class'=>'form-control','placeholder' => 'Email del usuario','required' => 'required']) !!}
		 </div>
		 <div class="form-group">
			{!! Form::label('password','Contraseña:') !!}
			{!! Form::password('password',['class'=>'form-control','placeholder' => 'Contraseña','required' => 'required']) !!}
		 </div>
		 <div class="form-group">
			{!! Form::submit("Guardar",['class' => 'btn btn-primary']) !!}
			<a href="{{ url('users') }}" class="btn btn-danger">Volver al Listado</a>
		  </div>

	  {!! Form::close() !!}
	</div>
  </div>

  
@endsection