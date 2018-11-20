@extends('backend.template')

@section('title','Ediccion de Usuario')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>EDICCION DE UN USUARIO</h3>
			<hr>
			{!! Form::model($user, ['route' => ['users.update', $user->id],'method'=> 'PUT']) !!}
				<div class="form-group">
					{!! Form::label('name','Nombre:') !!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre de categoria','required' => 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email','Email:') !!}
					{!! Form::email('email',null,['class'=>'form-control','placeholder' => 'Email del usuario','required' => 'required']) !!}
				</div>
		

					
				<div class="form-group">
					{!! Form::submit("Guardar",['class' => 'btn btn-primary']) !!}
					<a href="{{ url('users') }}" class="btn btn-danger">Volver al Listado</a>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

	
@endsection