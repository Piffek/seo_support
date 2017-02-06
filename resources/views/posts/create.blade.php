@extends('main')

@section('title', '| Nowy Post')

@section('content')




	<div class="row">
	
	<div class="col-md-8">
	
	</div>

		</div>
		<div class="col-md-10 col-md-offset-1">
		{!! Form::open(['url' => 'posts/store','files'=>true]) !!}
		    {{Form::label('title', 'Tytuł:') }}
		    {{Form::text('title', null, array('class' => 'form-control'))}}
			{{Form::label('body', 'Tekst:')}}
			{{Form::textarea('body', null, array('class' => 'form-control my-editor','id'=>'my-editor'))}}
			{{ Form::label('slug', 'Tagi: ') }}
			{{ Form::text('slug', null, array('class' => 'form-control')) }}<br>
		 {!! Form::file('image') !!}

		<div class="row">
			<div class="container">
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
        </div>
			{{Form::submit('Dodaj nowy wpis', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top:10px;'))}}
		{!! Form::close() !!}
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


@endsection