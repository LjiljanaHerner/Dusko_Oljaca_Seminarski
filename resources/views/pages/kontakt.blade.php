@extends('main')

@section('title', '| Kontakt')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1><strong>Kontakt</strong></h1>
			<hr>
			<form action="{{ url('kontakt') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label name"email">Email:</label>
					<input id="email" name="email" class="form-control">
				</div>
				
				<div class="form-group">
					<label name"predmet">Predmet:</label>
					<input id="predmet" name="predmet" class="form-control">
				</div>
				
				<div class="form-group">
					<label name"poruka">Poruka:</label>
					<textarea id="poruka" name="poruka" class="form-control" placeholder="Napišite svoju poruku ovdje..."></textarea>
				</div>
				
				<input type="submit" value="Pošalji poruku" class="btn btn-success">
			</form>
		</div>
	</div> <!-- kraj .row -->
		
@endsection