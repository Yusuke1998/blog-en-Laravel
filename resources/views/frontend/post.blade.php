@extends('frontend.template')

@section('title',$post->title)

@section('posts')

	<!-- Title -->
    <h1 class="mt-4">{{ $post->title }}</h1>

     <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{ $post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Publicado el {{ $post->created_at}}</p>

    <hr>
    <p>
    	<i class="fa fa-tags"></i> Categorias: 
		@foreach($post->categories as $category)
		    <a href='{{ url("/category/$category->slug") }}'><span class="badge badge-danger">{{$category->name}}</span></a>
		@endforeach
    </p>
    <hr>


    <!-- Preview Image -->
    <img class="img-fluid rounded" src='{{ asset("images/$post->imagen") }}' alt="">

    <hr>
    <div class="content">
	{!! $post->content !!}
    </div>
    
    <p>
    	<i class="fa fa-tags"></i> Tags: 
		@foreach($post->tags as $tag)
		    <a href='{{ url("/tag/$tag->slug")}}'><span class="badge badge-info">{{$tag->name}}</span></a>
		@endforeach
    </p>
    <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://codigosanha.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection