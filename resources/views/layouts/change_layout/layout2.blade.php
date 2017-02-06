<!DOCTYPE html>
<html lang="pl">
	<head>
		@include('partials._head')
	</head>

	<body> 
		@include('partials._nav')
			<div class="container">
				@include('partials._messages')
				<div class="row">
					<div class="col-sm-12 col-sm-offset-2">
					  <h1><img alt src="/photo_head/{{$post->title}}.jpg" width="800px" height="400px"></h1>
					</div>
					</hr>
					
				</div>
				<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
					  <div class="panel-heading">{{$post->title}}</div>
					  <div class="panel-body">
						<p>{!! $post->body !!}</p>
						</div>
					@foreach($slug_array as $slug)
						<a href="/posts/show/{{$post->id}}/{{$slug}}" role="button">{{$slug}}</a>
					@endforeach
					</div>
				</div>
				</div>
	    		@yield('content')
			</div>
		@include('partials._footer')


		@include('partials._js')
		@yield('scripts')
	</body>
</html>


