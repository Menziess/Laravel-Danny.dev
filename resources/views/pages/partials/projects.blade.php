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
		</div>
	</div>
</section>

<!-- Portfolio Modals -->
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
				<div class="col-lg-8 col-lg-offset-2">
					<div class="modal-body">
						<h2>{{ $video->name ? $video->name : 'My project' }}</h2>
						<hr class="star-primary">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="{{ $video->url }}" width="710" height="512" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
						<p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
						<ul class="list-inline item-details">
							<li>Client:
								<strong><a href="http://startbootstrap.com">Start Bootstrap</a>
								</strong>
							</li>
							<li>Date:
								<strong><a href="http://startbootstrap.com">{{ $video->created_at ? $video->created_at->toFormattedDateString() : 'Unknown' }}</a>
								</strong>
							</li>
							<li>Service:
								<strong><a href="http://startbootstrap.com">Web Development</a>
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
