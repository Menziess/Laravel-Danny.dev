@extends('layouts.app')

@section('content')

<section id="login">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Login</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form role="form" method="POST" action="{{ url('/login') }}" novalidate>
					{{ csrf_field() }}

					<div class="row control-group">
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-xs-12 floating-label-form-group controls">
							<label for="email">E-Mail Address</label>

							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required data-validation-required-message="Please enter your email address.">

							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
							<p class="help-block text-danger"></p>
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
						<div class="form-group">
						</div>
					</div>

					<br>
					<div id="success"></div>
					<div class="row">
						<div class="form-group col-xs-12">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" checked> Remember Me
									</label>
								</div>
							<button type="submit" class="btn btn-success btn-lg">Login</button>
							<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection
