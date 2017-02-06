@extends('main')

@section('content')
<div class="row">
	@if(Auth::user()->photo())
		{{$post->title}}
	@endif
	<div class="col-md-8">
		<h1><img alt src="/photo_head/{{$post->title}}.jpg" width="800px" height="400px"></h1>
	</div>

		<div class="col-md-3 col-md-offset-1">
				<div class="well">
					<dl class="dl-horizontal">
						<a href="/delete_photo/{{$post->title}}/{{$post->id}}" class='btn btn-danger btn-block'>Usuń zdjęcie</a>
							{!! Form::open(['url' => '/add_photo','files'=>true]) !!}
								{!! csrf_field() !!}
								<label>Dodaj zdjęcie</label>
								<input  id="title" name="title" type="hidden" placeholder="" class="form-control input-md" value="{{ $post->title }}">
								{!! Form::file('image') !!}
							{{Form::submit('Dodaj zdjęcie', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:10px;'))}}
							{!! Form::close() !!}
					</dl>
				</div>
		</div>

</div>
	<div class="row">
	<form method="POST" action="/index/{{$post->id}}">
		{!! csrf_field() !!}
		<div class="col-md-8">
			Tytuł:
			<input id="title" name="title" type="text" placeholder="" class="form-control input-md" value="{{ $post->title }}">
			Opis:
			<textarea id="my-editor" name="body" type="text" placeholder="" class="form-control input-md" >{{ $post->body }}</textarea>
			Tagi:
			<input id="slug" name="slug" type="text" placeholder="" class="form-control input-md" value="{{ $post->slug }}">
			Wersja layoutu:
				<div class="btn-group btn-group-justified" data-toggle="buttons">
					<div class="col-md-4">
	           			<label class="btn btn active">
		                    <input hidden type="radio" name="nr_layout" autocomplete="off" checked value="1"><br>
		                    <image img src="/layout1.jpg" alt="Logo"></image>
		                 </label>
		        	</div>
		        <div class="col-md-4">
	              	<label class="btn btn">
	                    <input hidden type="radio" name="nr_layout" value="2" /><br>
	                    <image img src="/layout2.jpg" alt="Logo"></image>
	                </label>
	           	</div>
	           	<div class="col-md-4">
     				<label class="btn btn">
	                    <input hidden type="radio" name="nr_layout" value="3" /><br>
	                    <image img src="/layout3.jpg" alt="Logo"></image>
	                </label>
	            </div>
	          </div>
	       </div>

	<script>
  CKEDITOR.replace( 'my-editor', {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
  });
</script>
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
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<input  class="btn btn-success" type="submit" value="Edytuj!"></tr>
					</form>
				</div>
			</div>
			<br>
			<div class="row">

				<div class="col-sm-6">
				<a href="/index/{{$post->id}}" class='btn btn-danger btn-block'>Usuń!</a>

				</div>
			</div>
</div>
@endsection 