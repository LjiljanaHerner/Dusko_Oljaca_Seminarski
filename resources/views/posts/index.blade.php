@extends('main')

@section('title', '| Svi Postovi')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1><strong>Svi postovi</strong></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-primary btn-block btn-lg btn-h1-poravnanje">Kreiraj novi post</a>
		</div>
		<div class="col-md-12">
		<hr>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Naslov</th>
					<th>Sadržaj</th>
					<th>Objavljeno</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($posts as $post)
					@if(Auth::user()->id===$post->user_id)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->naslov }}</td>
							<td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
							<td>{{ date('d.m.Y. H:i', strtotime($post->created_at)) }}</td>
							<td>
									{{ Html::linkRoute('posts.show','Pregledaj',array($post->id),array('class'=>'btn btn-default btn-sm')) }}
								
								<!-- Provjera da li je user autor posta  -->
				<!-- Ako user nije autor, ne dobija 'button' za uređivanje već samo za pregled -->		
                                  
                                    {{ Html::linkRoute('posts.edit','Uredi',array($post->id),array('class'=>'btn btn-default btn-sm')) }}  
								
								@endif 
							</td>
						</tr>
					
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>

@endsection