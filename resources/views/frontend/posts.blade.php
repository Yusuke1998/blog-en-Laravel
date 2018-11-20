@extends('frontend.template')

@section('title','Posts')

@section('posts')
	<h1 class="my-4">Blog
        <small>Posts recientes</small>
    </h1>
	@foreach($posts as $post)
		<!-- Blog Post -->
	    <div class="card  mb-4">
	        <img class="img-fluid" src='{{ asset("images/$post->imagen") }}' alt="{{ $post->title }}" style="height: 250px;">
	        <div class="card-body">
	            <h2 class="card-title">{{ $post->title}}</h2>
	            <p class="card-text">{{ $post->resumen}}</p>
	            <a href='{{ url("post/$post->slug")}}' class="btn btn-primary">Leer más &rarr;</a>
	        </div>
	        <div class="card-footer text-muted">
	            Publicado el {{$post->created_at}} by
	            <a href="#">{{ $post->user->name }}</a>
	        </div>
	    </div>

	@endforeach

	  
	{{$posts->render( "pagination::bootstrap-4")}}
	
@endsection

@section('widgets')
	<div class="card my-4">
        <h5 class="card-header">Categorias</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        
                        @foreach($categories as $category)
                        	@if($category->posts()->count() > 0)
								<li>
                                	<a href='{{ url("category/$category->slug") }}'>{{ $category->name }} ({{ $category->posts()->count() }})</a>
                            	</li>
                        	@endif
                           
                        @endforeach
                    </ul>
                </div>
               
            </div>
        </div>
    </div>
    <div class="card my-4">
        <h5 class="card-header">Etiquetas</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        
                        @foreach($tags as $tag)
                        	@if($tag->posts()->count() > 0)
								<li>
                                	<a href='{{ url("tag/$tag->slug") }}'>{{ $tag->name }} ({{ $tag->posts()->count() }})</a>
                            	</li>
                        	@endif
                            
                        @endforeach
                    </ul>
                </div>
               
            </div>
        </div>
    </div>
@endsection