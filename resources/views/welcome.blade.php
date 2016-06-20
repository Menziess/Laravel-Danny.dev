@extends('layouts.app')

@section('header')
	<div class="container">

		@include('pages.partials.background', ['background' => $background])

		<div class="row p-t-3">
			<div class="col-lg-12">
				<div class="intro-text text-shadow">
					<span class="name text">Great people</span>
					<!-- <hr class="star-light"> -->
				</div>
			</div>
			<div class="col-lg-6 col-lg-offset-3">
				<form class="form" role="search">
					<div class="input-group">
						<input type="text" class="form-control input-large box-shadow" placeholder="Search for great people" name="search" id="search">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('content')
	<!-- Portfolio Grid Section -->
	<section id="portfolio">
		<div class="container">
			<div class="row">
				@for($i = 0; $i < 50; $i++)
					<div class="col-sm-2 portfolio-item">
						<a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
							<div class="caption">
								<div class="caption-content">
									<i class="fa fa-play fa-3x"></i>
								</div>
							</div>
							<img src="img/portfolio/cabin.png" class="img-responsive" alt="">
						</a>
					</div>
				@endfor
			</div>
		</div>
	</section>
@endsection

