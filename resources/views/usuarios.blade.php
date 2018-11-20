<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Usuarios</h1>

	<ul>
		@foreach ($users as $user)
			<li>{{ $user }}</li>
		@endforeach
	</ul>

	
</body>
</html>