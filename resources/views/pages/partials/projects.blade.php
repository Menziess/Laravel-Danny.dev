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
				@foreach($user->videos()->get() as $video)
				<div class="col-sm-4 portfolio-item">
					<a href="#portfolioModal{{ $video->id }}" class="portfolio-link" data-toggle="modal">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="//player.vimeo.com/video/{{ $video->url }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
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
	</div>

	@if(Auth::check())
		<div class="form-group">
			<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#projectsModal">Add Video</button>
		</div>
	@endif
</section>

<!-- Portfolio Modals -->
@if($videos)
	@foreach($videos as $video)
	<div class="portfolio-modal modal fade" id="portfolioModal{{ $video->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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

	@push('scripts')
		<script src="{{ asset('js/jquery.vimeo.api.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function($) {
			   $("#player").vimeo("play").on("play", function(e){
							  console.log("play event was triggered");
						  })
						  .on("pause", function(e){
							  console.log("pause event was triggered");
						  })
						  .on("playProgress", function(event, data){
							  console.log(data);
						  })
						  .on("finish", function(e){
							  vid.vimeo("unload");
							  console.log("Finished event triggere");
						  });
			});
		</script>
	@endpush
@endif
