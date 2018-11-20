@extends('backend.template')

@section('title','Ediccion de Categoria')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>EDICCION DE UNA CATEGORIA</h3>
			<hr>
			{!! Form::model($category, ['route' => ['categories.update', $category->id],'method'=> 'PUT']) !!}
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