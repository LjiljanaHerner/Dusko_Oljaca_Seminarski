@extends('main')

@section('title', "| $post->naslov")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if ($post->image && file_exists(public_path('images/'.$post->image)))
				<img src="{{ asset('images/'. $post->image) }}" class="thumbnail" style="width: 100%; height: 100%"/>
			@endif
			<h1>{{ $post->naslov }}</h1>
			<p>{{ $post->body }}</p>
		</div>
	</div>
	<hr>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Komentara</h3>
			@foreach($post->comments->sortByDesc(['id']) as $comment)
			
				<div class="media">
					<div class="media-left">
						<a href="#">
						<img class="media-object img-circle" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" alt="">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">{{ $comment->name }}</h4>
						<p class="author-time">{{ date('d.m.Y. H:i', strtotime($comment->created_at)) }}</p>
						<div class="comment-content">
						{{ $comment->comment }}
					</div>
					</div>
				</div>
				
			@endforeach
		</div>
	</div>
	
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			{{ Form::open(array('route' => array('comments.store', $post->id), 'method'=> 'POST')) }}
			
				<div class="row">
					<div class="col-md-6">					
						{{ Form::label('name', 'Ime: ') }}
						{{ Form::text('name', null, array('class' => 'form-control')) }}					
					</div>
					
					<div class="col-md-6">					
						{{ Form::label('email', 'Email: ') }}
						{{ Form::text('email', null, array('class' => 'form-control')) }}					
					</div>
					
					<div class="col-md-12">					
						{{ Form::label('comment', 'Komentar: ') }}
						{{ Form::textarea('comment', null, array('class' => 'form-control', 'rows' => '5')) }}

						{{ Form::submit('Objavi komentar', array('class' => 'btn btn-success btn-block')) }}		
					</div>
					
				</div>
			
			{{ Form::close() }}
		</div>
	</div>

@endsection