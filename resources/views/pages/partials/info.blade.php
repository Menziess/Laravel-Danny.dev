<!-- About Section -->
<section class="success" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>About</h2>
				<hr class="star-light">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<p class="text-center">
					@if($user->about)
						{{ $user->about }}
					@else
						{{ $user->first_name }} has no background story yet.
					@endif
				</p>
			</div>
		</div>

		<div class="col-md-4 col-md-offset-4">
			@if (Session::has('aboutUpdated'))
				<div class="alert alert-info" role="alert">
					{{ Session::get('aboutUpdated') }}
				</div>
			@endif
		</div>
	</div>

	@if(Auth::check())
		<div class="form-group">
			<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#aboutModal">Edit</button>
		</div>
	@endif

</section>

@section('footer')
	<div class="footer-above">
		<div class="container">
			<div class="row">
				<div class="footer-col col-md-4">
				<h3>Location</h3>
				@if($user->country || $user->street)
					<p>{{ $user->street }} {{ $user->number }}
					<br />{{ $user->city }}, {{ $user->zipcode }}
					<br />{{ $user->country }}</p>
				@else
					<p>{{ $user->first_name }} hasn't shared a location yet.</p>
				@endif
				</div>
				<div class="footer-col col-md-4">
					<h3>Around the Web</h3>
					<ul class="list-inline">
						@if($user->facebook)
							<li><a href="{{ $user->facebook }}" class="btn-social btn-outline" target="blank"><i class="fa fa-fw fa-facebook"></i></a></li>
						@endif

						@if($user->google)
							<li><a href="{{ $user->google }}" class="btn-social btn-outline" target="blank"><i class="fa fa-fw fa-google-plus"></i></a></li>
						@endif

						@if($user->twitter)
							<li><a href="{{ $user->twitter }}" class="btn-social btn-outline" target="blank"><i class="fa fa-fw fa-twitter"></i></a></li>
						@endif

						@if($user->linkedin)
							<li><a href="{{ $user->linkedin }}" class="btn-social btn-outline" target="blank"><i class="fa fa-fw fa-linkedin"></i></a></li>
						@endif

						@if($user->website)
							<li><a href="{{ $user->website }}" class="btn-social btn-outline" target="blank"><i class="fa fa-fw fa-dribbble"></i></a></li>
						@endif
					</ul>
				</div>
				<div class="footer-col col-md-4">
					<h3>Contact</h3>
					<p>Email <a href="{{ url('mailto:' . $user->email) }}" target="_top">{{ $user->email }}</a></p>
				</div>

				<div class="col-md-4 col-md-offset-4">
					@if (Session::has('infoUpdated'))
						<div class="alert alert-info" role="alert">
							{{ Session::get('infoUpdated') }}
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

