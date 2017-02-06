 @if ($errors->has('email'))
	<span class="help-block">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
@endif

@if ($errors->has('password'))
	<span class="help-block">
		<strong>{{ $errors->first('password') }}</strong>
	</span>
@endif
@if ($errors->has('name'))
	<span class="help-block">
		<strong>{{ $errors->first('name') }}</strong>
	</span>
@endif