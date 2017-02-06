@extends('main')

@section('title', '| Kontakt')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Skontaktuj się z nami</h1>
				<hr>
				<form>
					<div class="form-group">
						<label name="email">
							E-mail:
						</label>
						<input id="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label name="email">
							Temat:
						</label>
						<input id="temat" name="temat" class="form-control">
					</div>
					<div class="form-group">
						<label name="email">
							Wiadomosc:
						</label>
						<textarea id="wiadomosc" name="wiadomosc" class="form-control">Napisz do nas</textarea>
					</div>
				<input type="submit" value="Wyslij" class="btn btn-success">
				</form>
			</div>
		</div>
    </div>
@endsection
