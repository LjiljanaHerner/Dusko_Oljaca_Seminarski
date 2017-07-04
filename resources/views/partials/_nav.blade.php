<!-- Ovo je defaultni bootstrap navbar -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Duško Oljača Blog</a>
		</div>

<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
				<li class="{{ Request::is('arhiva') ? "active" : "" }}"><a href="/arhiva">Arhiva</a></li>
				<li class="{{ Request::is('o_meni') ? "active" : "" }}"><a href="/o_meni">O meni</a></li>
				<li class="{{ Request::is('kontakt') ? "active" : "" }}"><a href="/kontakt">Kontakt</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
			
			@if (Auth::guest())
				 <li><a href="{{ url('/login') }}">Login</a></li>
				<li><a href="{{ url('/register') }}">Register</a></li>
				@else
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dobrodošao {{ Auth::user()->name }} <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{{ route('posts.index') }}">Moji postovi</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="{{ route('logout') }}">Logout</a></li>
				</ul>
				</li>
			
				
			@endif				
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>