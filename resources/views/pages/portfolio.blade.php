@extends('layouts.app')

@section('header')
	<div class="container">

		<div class="row">
			<div class="col-lg-12">

				<img class="img-circle profile-picture-small" src="{{ $user->getPicture() }}" alt="">

				<div class="col-md-4 col-md-offset-4">
					@if (Session::has('pictureUploaded'))
						<div class="alert alert-info" role="alert">
							{{ Session::get('pictureUploaded') }}
						</div>
					@endif
				</div>

			</div>
			@if(Auth::check())
				<div class="form-group">
					<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#pictureModal">Upload picture</button>
				</div>
			@endif
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="intro-text">
					<span class="name">{{ $user->getName() }}</span>
					<hr class="star-light">
					<p class="text-center">
						{{ $user->getSpecialisations() }}
					</p>
				</div>

				<div class="col-md-4 col-md-offset-4">
					@if (Session::has('specializationsUploaded'))
						<div class="alert alert-info" role="alert">
							{{ Session::get('specializationsUploaded') }}
						</div>
					@endif
				</div>
			</div>

			@if(Auth::check())
				<div class="form-group">
					<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#specialisationsModal">Edit</button>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('content')

	@include('pages.partials.videos')

	@include('pages.partials.info')

	@if(Auth::check())
		@include('pages.partials.edit.modals')
	@endif

@endsection

