@extends('main')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{$post->title}}</h1>
				<p>{!! $post->body !!}</p>
		</div>
	
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Dodano: </dt>
				<dd>{{date('M j, Y h:i', strtotime($post->created_at))}}</dd>
			</dl>
			
			<dl class="dl-horizontal">
				<dt>Ostatnia edycja: </dt>
				<dd>{{date('M j, Y h:i', strtotime($post->updated_at))}}</dd>
			</dl>
			
			<dl class="dl-horizontal">
				<dt>Tagi: </dt>
				<dd><a href="{{url('tags/'.$post->slug)}}"> {{ url($post->slug) }} </a></dd>
			</dl>
			<hr>
			
		</div>
	</div>
</div>
@endsection 