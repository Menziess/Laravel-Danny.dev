@extends('layouts.app')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<img class="img-circle profile-picture-small" src="{{ $user->getPicture() ? $user->getPicture() : asset('img/profile.png') }}" alt="">
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

@endsection
