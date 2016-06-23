
<!-- Portfolio Grid Section -->
<section id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Portfolio</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">

			@if($user->videos()->count() > 0)
				@foreach($videos as $video)
				<div class="col-sm-4 portfolio-item">
					<a href="#videoModal{{ $video->id }}" class="portfolio-link" data-toggle="modal">

						<img src="{{ url('https://i.vimeocdn.com/video/' . $video->url . '_900x650.webp') }}"
							class="img-responsive" width="900" height="650" alt>

						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			@else
				<div class="col-lg-8 col-lg-offset-2">
					<p class="text-center">{{ $user->first_name }} doesn't have any video's to show yet.</p>
				</div>
			@endif
		</div>
		<div class="col-md-4 col-md-offset-4">
			@if (Session::has('videoAdded'))
				<div class="alert alert-info" role="alert">
					{{ Session::get('videoAdded') }}
				</div>
			@endif
			@if (Session::has('videoDeleted'))
				<div class="alert alert-info" role="alert">
					{{ Session::get('videoDeleted') }}
				</div>
			@endif
		</div>
	</div>

	@if(Auth::check())
		<div class="form-group">
			<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#videoModal">Add Video</button>
		</div>
	@endif
</section>

<!-- Portfolio Modals -->
@if($videos)
	@foreach($videos as $video)
	<div class="portfolio-modal modal fade" id="videoModal{{ $video->id }}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="modal-body">
							<h2>{{ $video->name ? $video->name : 'My project' }}</h2>
							<hr class="star-primary">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe id="player" class="embed-responsive-item" src="//player.vimeo.com/video/{{ $video->url }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>
							<p>{{ $video->description }}</p>
							<ul class="list-inline item-details">
								<li>Date:
									<strong><a href="#">{{ $video->created_at ? $video->created_at->toFormattedDateString() : 'Unknown' }}</a>
									</strong>
								</li>
							</ul>
							<form class="form-horizontal" method="POST" action="{{ url('/users/video/' . $video->id) }}" enctype="multipart/form-data">
								{!! csrf_field() !!}
								{{ method_field('DELETE') }}

								@if(Auth::check())
									<button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i> Delete</button>
								@endif
								<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
@endif
