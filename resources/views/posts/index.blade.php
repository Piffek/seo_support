@extends('main')

@section('title', '| Posty')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Wszystkie Posty</h1>
		</div>
		
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">Nowy post</a>
		</div>	
		<hr>
	</div>
		
		@foreach($posts as $pot)
		    <div class="container">
				<div class="jumbotron">
				  <h1>{{$post -> title}}</h1>
				  <p>{{substr($post -> body,0,50)}}{{ strlen($post->body)>50 ? "..." : ""}}</p>
				  {{$post->created_at}}
				  <p><a class="btn btn-primary btn-lg" href="{{ route('posts.show', $post->id) }}" role="button">Wyswietl</a></p>
				</div>
		    </div>
		@endforeach
		<div class="text-center">
				{!! $posts -> links();  !!}



@stop