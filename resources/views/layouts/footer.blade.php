<!-- Footer -->
<footer class="text-center">
	@if(Auth::check() && isset($user))
		@yield('footer')
	@elseif(Auth::guest())
	<div class="footer-above">
	<div class="container">
		<div class="row">
			<div class="footer-col col-md-4 col-md-offset-4">
				<h3>Join Portfolio</h3>
				<p>Create your free portfolio: <br />
				<a href="{{ url('/register') }}">Register account</a>.</p>
			</div>
		</div>
	</div>
    @endif
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					Copyright &copy; Stefan Schenk {{ date('Y') }}
				</div>
			</div>
		</div>
	</div>
</footer>
