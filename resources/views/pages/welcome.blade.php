@extends('main')

@section('title', '| Homepage')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
			  <h1>Dobrodošli na moj blog!</h1>
			  <p class="lead">Zahvaljujem vam se na posjeti. Ovo je moj seminarski rad iz PHP-a izrađen sa Laravelom. Aplikacija je osmišljena da bude kao blog u kom registrirani korisnici mogu pisati i objavljivati, a zatim i uređivati i brisati, ali samo svoje postove.  Ispod pogledajte moje najnovije postove. </p>
			</div>
		</div>
	</div> <!-- kraj .row -->
	<div class="row">
		<div class="col-md-8">
		
			@foreach($posts as $post)
		
				 <div class="post">
					<h3>{{ $post->naslov }}</h3>
						<p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
					<a href="{{ url('blog/'.$post->id) }}" class="btn btn-primary">Više o tome...</a>
				 </div>
				 
				 <hr>

			@endforeach	
			 
		</div>
		
		<div class="col-md-3 col-md-offset-1">
			<h2>Sidebar</h2>
		</div>
		
	</div>
	
@endsection