@extends('main')

@section('title', '| Kontakt')

@section('content')
	{!! Form::open(['url' => 'posts/layout/update']) !!}
	{{Form::label('nr_layout', 'Numer Layoutu:') }}
	{{Form::text('nr_layout', null, array('class' => 'form-control'))}}
	{{Form::submit('Zmień layout', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:10px;'))}}
	{!! Form::close() !!}
@endsection
