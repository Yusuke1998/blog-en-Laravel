<!DOCTYPE html>
<html lang="easy">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Codigosanha - @yield('title')</title>
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//rawgit.com/google/code-prettify/master/src/prettify.css"/>
    <link rel="icon" href="{{ asset('images/logo.png')}}">
    <style>
        body {
            padding-top: 54px;
        }
        .content img{
            width: 100% !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/')}}">Codigosanha</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                @yield('posts')

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        {!! Form::open(['url' => '/', 'method' => 'GET']) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Busca algo..." name="search" value="{{ app('request')->input('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">Go!</button>
                            </span>
                            
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <!-- Categories Widget -->
                @yield('widgets')

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                      You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
      <!-- /.container -->
    </footer>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="//rawgit.com/google/code-prettify/master/src/prettify.js"></script>
    <script src="{{ asset('plugins/summernote/summernote-ext-highlight.js') }}"></script>
    <script>
        $(document).ready(function(){
            prettyPrint();
        });
    </script>

  </body>

</html>
