@extends('backend.template')

@section('title','Registro de nuevo tag')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>REGISTRO DE UN NUEVO POST</h3>
			<hr>
			{!! Form::open(['route' => 'posts.store' , 'files' => true]) !!}
				<div class="form-group">
			    	{!! Form::label('title','Titulo:') !!}
			    	{!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Titulo del Post','required' => 'required']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::label('content','Contenido:') !!}
			    	{!! Form::textarea('content',null,['class'=>'summernote']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::label('resumen','Resumen:') !!}
			    	{!! Form::textarea('resumen',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
			    </div>
			    
			    <div class="form-group">
			    	{!! Form::label('image','Imagen de Portada:') !!}
			    	{!! Form::file('image',['class' => 'form-control','accept' => '.jpg,.png']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::label('categories[]','Categorias:') !!}
			    	{!! Form::select('categories[]', $categories, null, ['required', 'class' => 'form-control selectpicker','multiple' => 'multiple','data-live-search' => 'true','title'=>'Seleccione categorias para el articulo']) !!}
			    </div>
			    <div class="form-group">
			    	{!! Form::label('tags[]','Tags:') !!}
			    	{!! Form::select('tags[]', $tags, null, ['required', 'class' => 'form-control selectpicker','multiple' => 'multiple','data-live-search' => 'true','title'=>'Seleccione etiquetas para el articulo']) !!}
			    </div>

			    <div class="form-group">
			    	{!! Form::submit("Guardar",['class' => 'btn btn-primary']) !!}
			    	<a href="{{ url('posts') }}" class="btn btn-danger">Volver al Listado</a>
			    </div>

			    


			{!! Form::close() !!}
		</div>
	</div>

	
@endsection