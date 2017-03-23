@extends('main')

@section('content')
	@foreach($post as $posts)
    <div class="container">
		<div class="jumbotron">
		  <h1>{{$posts -> title}}</h1>
		  <p>{!! $posts -> body !!}</p>
			<p><a class="btn btn-primary btn-lg" href="/posts/show/{{$posts->id}}<?php echo "/".str_replace(array('ą', 'ę', 'ć','ó', 'ś','ń', 'ż', 'ł',' '), array('a', 'e', 'c','o', 's','n', 'z', 'l','-'),$posts->title) ?>" role="button">Wyswietl</a></p>
		</div>
		</div>
    </div>
	@endforeach
	<div class="text-center">
		{!! $post -> links();  !!}
@endsection 
