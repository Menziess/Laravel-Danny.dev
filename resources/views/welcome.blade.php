@extends('layouts.app')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="intro-text">
					<span class="name">Great people</span>
					<hr class="star-light">
				</div>
			</div>
			<div class="col-lg-6 col-lg-offset-3">
				<form class="form" role="search">
					<div class="input-group">
						<input type="text" class="form-control input-large" placeholder="Search" name="search" id="search">
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
				<div class="col-sm-2 portfolio-item">
					<a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-user fa-3x"></i>
							</div>
						</div>
						<img src="img/portfolio/cabin.png" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-sm-2 portfolio-item">
					<a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-user fa-3x"></i>
							</div>
						</div>
						<img src="img/portfolio/cake.png" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-sm-2 portfolio-item">
					<a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-user fa-3x"></i>
							</div>
						</div>
						<img src="img/portfolio/circus.png" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-sm-2 portfolio-item">
					<a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-user fa-3x"></i>
							</div>
						</div>
						<img src="img/portfolio/game.png" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-sm-2 portfolio-item">
					<a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-user fa-3x"></i>
							</div>
						</div>
						<img src="img/portfolio/safe.png" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-sm-2 portfolio-item">
					<a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-user fa-3x"></i>
							</div>
						</div>
						<img src="img/portfolio/submarine.png" class="img-responsive" alt="">
					</a>
				</div>
			</div>
		</div>
	</section>

@endsection
