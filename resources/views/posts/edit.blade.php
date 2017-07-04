@extends('main')

@section('title', '|Uredi post')

@section('content')

	<div class="row">
	<!-- Otvaranje forme, ali umesto 'Form::open' sa 'Form::model($post)' se direktno vežemo na bazu podataka i tablicu koja nam treba-->
	{!! Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT', 'files' => true)) !!}
	
		<div class="col-md-8">
		
			{{ Form::label('naslov', 'Naslov: ') }}
			{{ Form::text('naslov', null, array('class' => 'form-control input-lg')) }}
			
			 @if ($post->image && file_exists(public_path('images/'.$post->image)))
			{{ Form::label('image', 'Trenutna slika: ', array('class' => 'image-top-space')) }}
			
				<img src="{{ asset('images/'. $post->image) }}" class="thumbnail" style="width: 20%; height: 20%"/>
			@endif
			
			{{ Form::label('image', 'Promijeni sliku: ', array('class' => 'image-top-space')) }}
			{{ Form::file('image') }}
		
			{{ Form::label('body', 'Sadržaj: ', array('class' => 'body-top-space')) }}
			{{ Form::textarea('body', null, array('class' => 'form-control')) }}
		
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Objavljeno: </dt>
					<dd>{{ date('d.m.Y. H:i', strtotime($post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Ažurirano: </dt>
					<dd>{{ date('d.m.Y. H:i', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
					{{ Html::linkRoute('posts.show', 'Odustani', array($post->id), array('class' => 'btn btn-danger btn-block')) }} <!--laravelova verzija za linkovanje (za to nam je potreban 'laravel collective' paket) -->
					<!--mogli smo linkovanje pomoću običnog html-a	<a href="#" class="btn btn-primary btn-block">Odustanii</a> -->
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Spremi promjene', array('class' => 'btn btn-success btn-block')) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection