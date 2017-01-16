

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
			<a href="{{ url('/') }}">
				<img class="pull-left star" src="{{ asset('img/star.png') }}" width="50" height="50"/>
			</a>
			<a class="navbar-brand" href="{{ isset($user) ? url('/' . $user->slug) : url('/') }}">{{ isset($user) ? $user->first_name : 'Portfolio' }}</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">

				@if (Auth::user())
					<li><a href="{{ url('/logout') }}">Logout</a></li>
					<li><a href="{{ url('/users') }}">{{ Auth::user()->first_name }}</a></li>
				@endif
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
