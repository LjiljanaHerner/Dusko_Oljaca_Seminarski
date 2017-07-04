@extends('main')

@section('title', '| Arhiva')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Arhiva</h1>
		</div>
	</div>
	
	@foreach($posts as $post)
	
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>{{ $post->naslov }}</h2>
				<h5>Objavljeno: {{ date('d.m.Y. H:i', strtotime($post->created_at)) }}</h5>
				<p>{{ substr($post->body, 0, 250) }} {{ strlen($post->body) > 250 ? "..." : "" }}</p>
				
				<a href="{{ route('blog.single', $post->id) }}" class="btn btn-primary">Više o tome...</a>
				
				<hr>
				
			</div>
		</div>
		
	@endforeach	
	
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
@endsection