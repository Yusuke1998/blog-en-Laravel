<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<link rel="icon" href="{{ asset('images/logo.png')}}">

		<title>Codigosanha - @yield('title')</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap4.min.css') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
		<link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
		<link rel="stylesheet" href="//rawgit.com/google/code-prettify/master/src/prettify.css"/>
		<link rel="stylesheet" href="{{ asset('backend/dashboard.css') }}">
	</head>

	<body>

		<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">Codigosanha</a>
		    
		    <ul class="navbar-nav px-3">
		        <li class="nav-item text-nowrap">
		          <a class="nav-link" href="{{ url('logout') }}">Cerrar Sesión</a>
		        </li>
		    </ul>
		</nav>

	    <div class="container-fluid">
		    <div class="row">
		        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
			        <div class="sidebar-sticky">
			            <ul class="nav flex-column">
				           	<li class="nav-item">
				                <a class="nav-link active" href="{{url('dashboard')}}">
				                  	<span data-feather="home"></span>
				                  	Dashboard <span class="sr-only">(current)</span>
				                </a>
				            </li>
				            <li class="nav-item">
				                <a class="nav-link" href="{{ url('categories') }}">
				                  	<span data-feather="file"></span>
				                  	Categorias
				                </a>
				            </li>
				            <li class="nav-item">
				                <a class="nav-link" href="{{ url('tags') }}">
				                  	<span data-feather="file"></span>
				                  	Etiquetas
				                </a>
				            </li>
				            <li class="nav-item">
				                <a class="nav-link" href="{{ url('posts') }}">
				                  	<span data-feather="file"></span>
				                  	Articulos
				                </a>
				            </li>
			              	<li class="nav-item">
				                <a class="nav-link" href="{{ url('users') }}">
				                  	<span data-feather="file"></span>
				                  	Usuarios
				                </a>
				            </li>
			              
			            </ul>

			          
			          </div>
		        </nav>

		        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			        @yield('content')
		        </main>
		    </div>
	    </div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('plugins/jquery/jquery.min.js') }}" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
		<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
		
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<!-- DataTables -->
		<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>
		<script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
		<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>
		<script src="{{ asset('plugins/sweetalert/sweetalert.js') }}"></script>
		<script src="{{ asset('plugins/summernote/summernote-bs4.js') }}"></script>
		<script type="text/javascript" src="//rawgit.com/google/code-prettify/master/src/prettify.js"></script>
		<script src="{{ asset('plugins/summernote/summernote-ext-highlight.js') }}"></script>
		>
		<script>
				var base_url = "{{ url('/') }}";
				
		</script>
		<script src="{{ asset('js/script.js') }}"></script>
	</body>
</html>
