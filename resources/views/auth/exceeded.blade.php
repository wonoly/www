@extends('layouts.app')

@section('template_title')
	{!! trans('titles.exceeded') !!}
@endsection

@section('content')

<div class="container color-bg">
	<div class="z-20 w-full h-full flex items-center justify-center">
		<div class="z-20 wrapper_box" style="width: max-content !important;">
			<div class="text-2xl font-bold flex items-center">
				<a href="/" class="w-10 h-10 relative mr-4">
					@include('partials.wonoly-icon')
				</a>
				{!! trans('titles.exceeded') !!}
			</div>
			<hr class="my-4">
			<p>
				{!! trans('auth.tooManyEmails', ['email' => $email, 'hours' => $hours]) !!}
			</p>
			<a href="/" class="float-right mt-3 font-bold">Get back home</a>
		</div>
	</div>
</div>
@endsection
