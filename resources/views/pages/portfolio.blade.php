@extends('layouts.app')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<img class="img-circle profile-picture-small" src="{{ $user->getPicture() ? $user->getPicture() : asset('img/profile.png') }}" alt="">

				@include('errors.feedback')

				<div class="form-group">
					<button class="btn btn-primary center-block" type="button" data-toggle="modal" data-target="#pictureModal">Upload picture</button>
				</div>

				<div class="intro-text">
					<span class="name">{{ $user->getName() }}</span>
					<hr class="star-light">
					<span class="skills">
						@if($user->roles->count() > 0)
						@foreach($user->roles as $role)
							{{ $role->name }}
						@endforeach
						@else
							{{ $user->first_name }} has no specializations...
						@endif
					</span>
				</div>

			</div>
		</div>
	</div>

@endsection

@section('content')

	@include('pages.partials.projects')

	@include('pages.partials.info')

	<div class="portfolio-modal modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-hidden="true">
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
							<h2>Upload picture</h2>
							<hr class="star-primary">
							<form id="form-picture" class="form-horizontal" method="POST" action="{{ url('/users/picture') }}" enctype="multipart/form-data">
								{!! csrf_field() !!}

								<input name="id" value="{{ $user->id }}" type="hidden" class="form-control">

								<div class="modal-body">
									<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} div-centered-small">
										<p>Select your new profile picture</p>
										<div class="input-group">
											<input name="file" data-max-size="500" accept="image/*" value="{{ old('file') }}" type="file" >
										</div>
									</div>
								</div>
								<div class="modal-footer">
								</div>
							</form>
							<p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
							<button type="submit" class="btn btn-primary" name="submit" form="form-picture">Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
