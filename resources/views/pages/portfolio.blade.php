@extends('layouts.app')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<img class="img-circle profile-picture-small" src="{{ $user->getPicture() }}" alt="">

				@if(Auth::check())
					<div class="form-group">
						<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#pictureModal">Upload picture</button>
					</div>
				@endif

				<div class="intro-text">
					<span class="name">{{ $user->getName() }}</span>
					<hr class="star-light">
					<p class="text-center">
						{{ $user->getSpecialisations() }}
					</p>
				</div>

				@if(Auth::check())
					<div class="form-group">
						<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#specialisationsModal">Edit</button>
					</div>
				@endif

			</div>
		</div>
	</div>
@endsection

@section('content')

	@include('pages.partials.projects')

	@include('pages.partials.info')

	@if(Auth::check())
		@include('pages.partials.edit.modals')
	@endif

@endsection

