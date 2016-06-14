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
	</div>
</section>

@section('footer')
<!-- Footer -->
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
					<li>
						<a href="{{ $user->facebook }}" class="btn-social btn-outline {{ $user->facebook ?: 'disabled' }}"><i class="fa fa-fw fa-facebook"></i></a>
					</li>
					<li>
						<a href="{{ $user->google }}" class="btn-social btn-outline {{ $user->google ?: 'disabled' }}"><i class="fa fa-fw fa-google-plus"></i></a>
					</li>
					<li>
						<a href="{{ $user->twitter }}" class="btn-social btn-outline {{ $user->twitter ?: 'disabled' }}"><i class="fa fa-fw fa-twitter"></i></a>
					</li>
					<li>
						<a href="{{ $user->linkedin }}" class="btn-social btn-outline {{ $user->linkedin ?: 'disabled' }}"><i class="fa fa-fw fa-linkedin"></i></a>
					</li>
					<li>
						<a href="{{ $user->website }}" class="btn-social btn-outline {{ $user->website ?: 'disabled' }}"><i class="fa fa-fw fa-dribbble"></i></a>
					</li>
				</ul>
			</div>
			<div class="footer-col col-md-4">
				<h3>Contact</h3>
				<p>Email <a href="{{ url('mailto:' . $user->email) }}">{{ $user->email }}</a></p>
			</div>
		</div>
	</div>
</div>
@endsection

