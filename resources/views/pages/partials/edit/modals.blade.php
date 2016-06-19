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
									<p id="picture-feedback">Select your new profile picture</p>
									<label class="btn btn-default btn-file">
									    <span id="browse">Browse </span><input name="file" data-max-size="4000" accept="image/*" value="{{ old('file') }}" type="file" style="display: none;">
									</label>
								</div>
							</div>
							<div class="modal-footer">
							</div>
						</form>
						@if ($errors->has('file'))
							<span class="help-block">
								<strong>{{ $errors->first('file') }}</strong>
							</span>
						@endif
						<button id="save" type="submit" class="btn btn-primary" name="submit" form="form-picture">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script type="text/javascript">
		$(function() {
			$('#save').hide();
			$(document).on('change', ':file', function() {
			    var input = $(this),
			        numFiles = input.get(0).files ? input.get(0).files.length : 1,
			        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			    input.trigger('fileselect', [numFiles, label]);
			    $('#picture-feedback').text("Press 'Save' to upload picture");
			    $('#browse').text(label + ' selected');
			    $('#save').show();
			});
			if(window.location.href.indexOf('#pictureModal') != -1) {
				$('#pictureModal').modal('show');
			}
		});
	</script>
@endpush

<!-- Specialisations modal -->

<!-- Video modal -->
<div class="portfolio-modal modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
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

								<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
									<p id="video-feedback">Paste a valid vimeo url</p>
									<label for="url">Vimeo url</label>
									<input id="url" type="text" class="form-control" name="url" value="{{ old('video') }}" maxlength="30"
										placeholder="https://vimeo.com/131811521" required data-validation-required-message="Please enter a vimeo id.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
						</form>
						@if ($errors->has('url'))
							<span class="help-block">
								<strong>{{ $errors->first('url') }}</strong>
							</span>
						@endif
						<button type="submit" class="btn btn-primary" name="submit" form="form-video"><i class="fa fa-check"></i> Add</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script type="text/javascript">
		$(function () {
			if(window.location.href.indexOf('#videoModal') != -1) {
				$('#videoModal').modal('show');
			}
		})

		$('#form-video').submit(function(){
			var url = $('#url');
			var id = false;
			$.ajax({
				url: 'https://vimeo.com/api/oembed.json?url=' + url.val(),
				type: 'GET',
				async: false,
				beforeSend : function(){   },
				success: function(response) {
					if(response.video_id) {
						id = response.video_id;
						url.val(response.video_id);
					}
				},
				error: function(response) {
					$('#video-feedback').text('Error: ' + response.statusText);
				}
			});
			return id;
		});
	</script>
@endpush

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

								<div class="form-group{{ $errors->has('about') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
									<label for="url">About text</label>

									<textarea form="form-about" rows="8" class="form-control" name="about" placeholder="Hello, my name is..." required maxlength="300"
										data-validation-required-message="Please enter a description about yourself.">{{ (old('about') ?: $user->about) }}</textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
						</form>
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('about') }}</strong>
							</span>
						@endif
						<button type="submit" class="btn btn-primary" name="submit" form="form-about"><i class="fa fa-check"></i> Add</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
