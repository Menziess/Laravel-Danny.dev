<!-- Picture modal -->
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
								<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
									<p>Select your new profile picture</p>
									<div class="input-group">
										<input name="file" data-max-size="500" accept="image/*" value="{{ old('file') }}" type="file" >
									</div>
								</div>
							</div>
							<div class="modal-footer">
							</div>
						</form>
						@include('errors.feedback')
						<button type="submit" class="btn btn-primary" name="submit" form="form-picture">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Specialisations modal -->

<!-- Projects modal -->
<div class="portfolio-modal modal fade" id="projectsModal" tabindex="-1" role="dialog" aria-hidden="true">
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
						<h2>Add video's</h2>
						<hr class="star-primary">
						<form id="form-video" class="form-horizontal" method="POST" action="{{ url('/users/video') }}" enctype="multipart/form-data">
							{{ csrf_field() }}

							<input name="id" value="{{ $user->id }}" type="hidden" class="form-control">

							<div class="modal-body">

								<div class="row control-group">
									<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
										<label for="url">Vimeo id</label>

										<div class="input-group">
										<div class="row">
											<div class="col-md-5">
												<input type="text" class="form-control" value="https://vimeo.com/" readonly>
											</div>
											<div class="col-md-5">
												<input id="url" type="text" class="form-control" name="url" value="{{ old('video') }}" placeholder="169606646" required data-validation-required-message="Please enter a vimeo id.">
											</div>
										</div>
										</div>
										<p class="help-block text-danger"></p>
									</div>
								</div>
							</div>
						</form>
						@include('errors.feedback')
						<button type="submit" class="btn btn-primary" name="submit" form="form-video"><i class="fa fa-check"></i> Add</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- About modal -->
<div class="portfolio-modal modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-hidden="true">
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
						<h2>Edit about</h2>
						<hr class="star-primary">
						<form id="form-about" class="form-horizontal" method="POST" action="{{ url('/users/about') }}" enctype="multipart/form-data">
							{{ csrf_field() }}

							<input name="id" value="{{ $user->id }}" type="hidden" class="form-control">

							<div class="modal-body">

								<div class="row control-group">
									<div class="form-group{{ $errors->has('about') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
										<label for="url">About text</label>

										<textarea form="form-about" rows="8" class="form-control" name="about" placeholder="Hello, my name is..." required
											data-validation-required-message="Please enter a description about yourself.">{{ (old('about') ?: $user->about) }}</textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
							</div>
						</form>
						@include('errors.feedback')
						<button type="submit" class="btn btn-primary" name="submit" form="form-about"><i class="fa fa-check"></i> Add</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
