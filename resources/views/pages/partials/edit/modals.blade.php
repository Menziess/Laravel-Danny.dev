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
						<h2>Edit video's</h2>
						<hr class="star-primary">
						<form id="form-video" class="form-horizontal" method="POST" action="{{ url('/users/video') }}" enctype="multipart/form-data">
							{!! csrf_field() !!}

							<input name="id" value="{{ $user->id }}" type="hidden" class="form-control">

							<div class="modal-body">
								@foreach($videos as $video)
									{{ $video->name }}
									<!-- Thumbnail -->
									<div class="form-group">
										<div class="input-group">
										</div>
									</div>
								@endforeach
							</div>
							<div class="modal-footer">
								<form role="form" method="POST" action="{{ url('/user/video') }}" novalidate>
									{{ csrf_field() }}

									<div class="row control-group">
										<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
											<label for="url">Vimeo id</label>

											<div class="input-group">
												<span>https://vimeo.com/</span>
												<input id="url" type="text" class="form-control" name="url" value="{{ old('video') }}" placeholder="169606646" required data-validation-required-message="Please enter a vimeo id.">
											</div>
											<p class="help-block text-danger"></p>

											@if ($errors->has('video'))
												<span class="help-block">
													<strong>{{ $errors->first('video') }}</strong>
												</span>
											@endif
										</div>
									</div>
								</form>
							</div>
						</form>
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
						<button type="submit" class="btn btn-primary" name="submit" form="form-video">Add</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
