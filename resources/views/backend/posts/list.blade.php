@extends('backend.template')

@section('title','Listado de Posts')

@section('content')
	<div class="row">
		<div class="col-md-12">

			<h3>INFORMACION DE LOS ARTICULOS</h3>
			<hr>
			<a href="{{ url('posts/create')}}" class="btn btn-primary mb-3">Agregar Articulo</a>
			<table class="table table-striped" id="tb-search">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>TITULO</th>
						<th>RESUMEN</th>
						<th>FECHA DE CREACION</th>
						<th>ESTADO</th>
						<th width="10px"></th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($posts))
						@foreach($posts as $post)
							<tr>
								<td>{{ $post->id}}</td>
								<td>
									<a href='{{ url("/post/$post->slug")}}' target="_blank">{{ $post->title}}</a>
								</td>
								<td>{{ $post->resumen}}</td>
								<td>{{ $post->created_at}}</td>
								<td>{{ $post->status}}</td>
								<td>
									<a href='{{ url("posts/$post->id/edit") }}' class="btn btn-warning">Editar</a>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

	
@endsection