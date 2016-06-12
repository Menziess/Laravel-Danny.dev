

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ isset($user) ? url('/' . $user->slug) : url('/') }}">{{ isset($user) ? $user->first_name : 'Portfolio' }}</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Regular links -->
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
				<li class="page-scroll">
					<a href="#portfolio">Portfolio</a>
				</li>
				<li class="page-scroll">
					<a href="#about">About</a>
				</li>
				<li class="page-scroll">
					<a href="#contact">Contact</a>
				</li>
				<!-- Logout button visible when logged in -->
				@if (Auth::user())
					<li><a href="{{ url('/logout') }}">Logout</a></li>
					<li><a href="{{ url('/users') }}">{{ Auth::user()->first_name }}</a></li>
				@endif
				<!-- Register and login buttons visible on homepage -->
				@if(isset($links))
					@foreach($links as $link)
						<li><a href="{{ url($link[1]) }}">{{ $link[0] }}</a></li>
					@endforeach
				@endif
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
