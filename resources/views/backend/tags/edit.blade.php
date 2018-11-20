@extends('backend.template')

@section('title','Ediccion de Tag')

@section('content')
	<div class="row">
		<div class="col-md-12">
			
			<h3>EDICCION DE UN TAG</h3>
			<hr>
			{!! Form::model($tag, ['route' => ['categories.update', $tag->id],'method'=> 'PUT']) !!}
				<div class="form-group">
			    	{!! Form::label('name','Nombre:') !!}
			    	{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Nombre de categoria','required' => 'required']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::submit("Guardar",['class' => 'btn btn-primary']) !!}
			    	<a href="{{ url('tags') }}" class="btn btn-danger">Volver al Listado</a>
			    </div>

			{!! Form::close() !!}
		</div>
	</div>

	
@endsection