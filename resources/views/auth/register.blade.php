@extends('layouts.app')

@section('content')

<section id="register">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Register</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" novalidate>
					{{ csrf_field() }}

					<div class="row control-group">
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
							<label for="name">First name</label>

							<input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required data-validation-required-message="Please enter your first name.">

							@if ($errors->has('first_name'))
								<span class="help-block">
									<strong>{{ $errors->first('first_name') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="row control-group">
						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
							<label for="name">Last name</label>

							<input id="name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required data-validation-required-message="Please enter your last name.">

							@if ($errors->has('last_name'))
								<span class="help-block">
									<strong>{{ $errors->first('last_name') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="row control-group">
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
							<label for="email">E-Mail Address</label>

							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required data-validation-required-message="Please enter your email address.">

							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="row control-group">
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
							<label for="password">Password</label>

							<input id="password" type="password" class="form-control" name="password" placeholder="Password" required data-validation-required-message="Please enter your password.">

							@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="row control-group">
						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
							<label for="password-confirm">Confirm Password</label>

							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" required data-validation-required-message="Please enter your password again.">

							@if ($errors->has('password_confirmation'))
								<span class="help-block">
									<strong>{{ $errors->first('password_confirmation') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<br>
					<div id="success"></div>
					<div class="row">
						<div class="form-group col-xs-12">
							<button type="submit" class="btn btn-success btn-lg">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection
