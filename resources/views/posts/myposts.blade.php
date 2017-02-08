@extends('main')

@section('title', '| Posty')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Moje posty</h1>
		</div>
		
		<div class="col-md-2">
			<a href="/posts/create" class="btn btn-lg btn-block btn-primary">Nowy post</a>

		</div>	
		<hr>
	</div>
		@foreach($posts as $post)
		    <div class="container">
				<div class="jumbotron">
				  <h1>{{$post -> title}}</h1>
				  {{$post->created_at}}

				  <p><a class="btn btn-primary btn-lg" href="/posts/show/{{$post->id}}<?php echo "/".str_replace(' ', '_',$post->title) ?>" role="button">Wyswietl</a></p>

				  <p><a class="btn btn-primary btn-lg" href="/posts/edit/{{$post->id}}" role="button">Edytuj</a></p>
				</div>
		    </div>
		@endforeach
		<div class="text-center">
				{!! $posts -> links();  !!}



@stop