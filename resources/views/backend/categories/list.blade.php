@extends('backend.template')

@section('title','Listado de Categorias')

@section('content')
	<div class="row">
		<div class="col-md-12">
			
			<h3>INFORMACION DE LAS CATEGORIAS</h3>
			<hr>
			<a href="{{ url('categories/create')}}" class="btn btn-primary mb-3">Agregar Categoria</a>
			<table class="table table-striped" id="tb-search">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>NOMBRE</th>
						<th width="10px"></th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($categories))
						@foreach($categories as $category)
							<tr>
								<td>{{ $category->id}}</td>
								<td>{{ $category->name}}</td>
								<td>
									<a href='{{ url("categories/$category->id/edit") }}' class="btn btn-warning">Editar</a>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

	
@endsection