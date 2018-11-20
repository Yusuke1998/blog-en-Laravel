@extends('backend.template')

@section('title','Listado de Tags')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>INFORMACION DE LAS ETIQUETAS</h3>
			<hr>
			<a href="{{ url('tags/create')}}" class="btn btn-primary mb-3">Agregar Etiqueta</a>
			<table class="table table-striped" id="tb-search">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>NOMBRE</th>
						<th width="10px"></th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($tags))
						@foreach($tags as $tag)
							<tr>
								<td>{{ $tag->id}}</td>
								<td>{{ $tag->name}}</td>
								<td>
									<a href='{{ url("tags/$tag->id/edit") }}' class="btn btn-warning">Editar</a>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

	
@endsection