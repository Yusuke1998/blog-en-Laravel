@extends('backend.template')

@section('title','Listado de Usuarios')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3>INFORMACION DE LOS USUARIOS</h3>
			<hr>
			<a href="{{ url('users/create')}}" class="btn btn-primary mb-3">Agregar usuario</a>			
			<table class="table table-striped" id="tb-search">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>NOMBRE</th>
						<th>EMAIL</th>
						<th>ESTADO</th>

						<th width="10px"></th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($users))
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id}}</td>
								<td>{{ $user->name}}</td>
								<td>{{ $user->email}}</td>
								<td>{{ $user->status}}</td>
								<td>
									<a href='{{ url("users/$user->id/edit") }}' class="btn btn-warning">Editar</a>
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>

	
@endsection