@extends('main')

@section('title', '| Novi Post')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css')  !!}
	
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Kreiraj Novi Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
				{{ Form::label('naslov', 'Naslov:') }}
				{{ Form::text('naslov', null, array('class' => 'form-control', 'required' => '')) }}
				
				{{ Form::label('image', 'Učitaj sliku:', array('class' => 'image-top-space')) }}
				{{ Form::file('image') }}
				
				{{ Form::label('body', 'Sadržaj:',array('class' => 'body-top-space')) }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'required')) }}
				
				{{ Form::submit('Kreiraj post', array('class' => 'btn btn-success btn-lg btn-block')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/i18n/hr.js') !!}

@endsection