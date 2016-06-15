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
							<iframe class="embed-responsive-item" src="{{ $video->url }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
					<p class="text-center">{{ $user->getName() }} doesn't have any video's to show yet.</p>
				</div>
			@endif
		</div>
	</div>
</section>

<!-- Portfolio Modals -->
@if($user->videos()->count() > 0)
	@foreach($user->videos()->get() as $video)
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
								<iframe id="player" class="embed-responsive-item" src="{{ $video->url }}" width="710" height="512" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>
							<p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
							<ul class="list-inline item-details">
								<li>Date:
									<strong><a href="#">{{ $video->created_at ? $video->created_at->toFormattedDateString() : 'Unknown' }}</a>
									</strong>
								</li>
							</ul>
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
