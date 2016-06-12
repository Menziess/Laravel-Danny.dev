<!-- Footer -->
	<footer class="text-center">
		<div class="footer-above">
			<div class="container">
				<div class="row">
					<div class="footer-col col-md-4">
					@if(isset($user) && $user->location)
						<h3>Location</h3>
						<p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
					@endif
					</div>
					@if(isset($user))
					<div class="footer-col col-md-4">
						<h3>Around the Web</h3>
						<ul class="list-inline">
							<li>
								<a href="{{ $user->facebook }}" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
							</li>
							<li>
								<a href="{{ $user->google }}" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
							</li>
							<li>
								<a href="{{ $user->twitter }}" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
							</li>
							<li>
								<a href="{{ $user->linkedin }}" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
							</li>
							<li>
								<a href="{{ $user->website }}" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
							</li>
						</ul>
					</div>
					@else
					<div class="footer-col col-md-4">
						<h3>Join Portfolio</h3>
						<p>Create your free portfolio: <a href="{{ url('/') }}">Register account</a>.</p>
					</div>
					@endif
					<div class="footer-col col-md-4">
						<h3>Join Portfolio</h3>
						<p>Create your free portfolio: <a href="{{ url('/') }}">Register account</a>.</p>
					</div>
				</div>
			</div>
		</div>
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
