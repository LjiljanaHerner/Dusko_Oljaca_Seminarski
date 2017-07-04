@extends('main')

@section('title', '| Pregled posta')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			@if ($post->image && file_exists(public_path('images/'.$post->image)))
				<img src="{{ asset('images/'.$post->image) }}" class="thumbnail" style="width: 100%; height: 100%"/>
			@endif
			<h1>{{ $post->naslov }}</h1>
			<p class="lead">{{ $post->body }}</p>
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
				<!-- Provjera da li je user autor posta  -->
				<!-- Ako user nije autor, ne dobija 'buttone' za uređivanje i brisanje -->	
				@if(Auth::user()->id === $post->user_id)
					
                    <div class="row">
                        <div class="col-sm-6">
						<!--laravelova verzija za linkovanje (za to nam je potreban 'laravel collective' paket) -->
						<!--mogli smo linkovanje pomoću običnog html-a	<a href="#" class="btn btn-primary btn-block">Uredi</a> -->
                            {{ Html::linkRoute('posts.edit','Uredi',array($post->id),array('class'=>'btn btn-primary btn-block')) }}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) }}
                            {{ Form::submit('Izbriši',['class'=>'btn btn-danger btn-block']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
					
				@endif	
					
				<div class="row">
					<div class="col-sm-12">
						{{ Html::linkRoute('posts.index', '<< Vidi sve postove', array(), array('class' => 'btn btn-default btn-block btn-h1-poravnanje')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection