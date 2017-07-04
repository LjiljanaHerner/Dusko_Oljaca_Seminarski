@extends('main')

@section('title', '| Registracija')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open() !!}
			
			{{ Form::label('name', 'Korisničko ime:') }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
			
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email', null, array('class' => 'form-control')) }}
			
			{{ Form::label('password', 'Lozinka:') }}
			{{ Form::password('password', array('class' => 'form-control')) }}
			
			{{ Form::label('password_confirmation', 'Ponovi lozinku:') }}
			{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
			
			<br>
			{{ Form::submit('Registriraj se', array('class' => 'btn btn-primary btn-block')) }}
		{!! Form::close() !!}
		</div>
	</div>
	
@endsection
