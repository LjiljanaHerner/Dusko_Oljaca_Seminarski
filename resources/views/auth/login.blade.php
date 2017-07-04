@extends('main')

@section('title', '| Login')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		{!! Form::open() !!}
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email', null, array('class' => 'form-control')) }}
			
			{{ Form::label('password', 'Lozinka:') }}
			{{ Form::password('password', array('class' => 'form-control')) }}
			
			<br>
			{{ Form::checkbox('remember') }} {{ Form::label('remember', 'Zapamti me:') }}
			
			<br>
			{{ Form::submit('Login', array('class' => 'btn btn-primary btn-block')) }}
			
			<a href="{{ url('password/reset') }}">Zaboravljena lozinka</a>
			
		{!! Form::close() !!}
		</div>
	</div>

@endsection
