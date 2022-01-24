@extends('layouts.app')

@section('template_title')
	{{ trans('titles.activation') }}
@endsection

@section('content')
<div class="container color-bg">
	<div class="z-20 w-full h-full flex items-center justify-center">
		<div class="z-20 wrapper_box" style="width: max-content !important;">
			<div class="text-2xl font-bold flex items-center">
				<a href="/" class="w-10 h-10 relative mr-4">
					@include('partials.wonoly-icon')
				</a>
				{{ trans('titles.activation') }}
			</div>
			<hr class="my-4">
			<p>{{ trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
			<p>{{ trans('auth.clickInEmail') }}</p>
			<a href='/activation' class="w-full mt-6 button">{{ trans('auth.clickHereResend') }}</a>
		</div>
	</div>
</div>
@endsection
