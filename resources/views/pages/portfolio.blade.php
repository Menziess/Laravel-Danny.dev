@extends('layouts.app')

@section('header')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<img class="img-circle profile-picture-small" src="{{ $user->getPicture() ? $user->getPicture() : asset('img/test.png') }}" alt="">
				<div class="intro-text">
					<span class="name">{{ $user->first_name }}'s portfolio</span>
					<hr class="star-light">
					<span class="skills">
						@if($user->roles->count() > 0)
						@foreach($user->roles as $role)
							{{ $role->name }}
						@endforeach
						@else
							User has no specializations...
						@endif
					</span>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')

	@if($user->videos()->count() > 0)
		@include('pages.partials.projects')
	@endif

	@include('pages.partials.info')

@endsection
