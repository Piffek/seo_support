@extends('main')

@section('title', '| Tagi')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Twoje tagi</h1>
	</div>
	
</div>
<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">Twoje tagi</div>
			<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tag</th>
					<th></th>
				</tr>
			</thead>
@foreach($tags as $tag)
			<tbody>
				<tr>
					<th scope="row">{{$tag -> id}}</th>
					<td>{{$tag -> name}}</td>
					{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
						<td>{!!Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}</td>
					{!! Form::close() !!}
				</tr>
			</tbody>
	
@endforeach
			 </table>
	</div>
</div>
<div class="col-md-4">
		<div class="well">
			{!! Form::open(['route' => 'tags.store','method'=>'POST']) !!}
				{{Form::label('name', 'Tytuł:') }}
					{{Form::text('name',null,['class'=>'form-control']) }}
				{{Form::submit('Dodaj tag', ['class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:10px;'])}}
			{!! Form::close() !!}
		</div>
</div>




@stop