@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('template_linked_css')
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
@endsection

@php
    $user = Auth::user();
@endphp

@section('content')
<div style="min-height: calc(100% - 85px);" class="content h-screen relative">
    @if ($user->profile)
        <div class="color-bg z-50 w-full h-full flex items-center">
            <aside class="w-1/3 z-50 h-full flex flex-col justify-center items-end">
                <div class="w-max settings_box pb-5">
                    <div class="flex justify-center">
                        @if($user->profile->avatar_status == 0)
                            <img src="{{  Gravatar::get($user->email) }}" alt="{{ $user->name }}" width="50" class="rounded-full">
                        @endif
                        @if($user->profile->avatar_status == 1)
                            <img src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatar }} @endif" alt="{{ $user->name }}" width="50" class="rounded-full">
                        @endif
                    </div>
                    <div class="text-black text-lg font-bold mt-5">
                        Username
                    </div>
                    <div class="text-gray-700 leading-3 text-md font-bold">
                        {{ $user->name }}
                    </div>
                    <div class="text-black text-lg font-bold mt-5">
                        Email adress
                    </div>
                    <div class="text-gray-700 leading-3 text-md font-bold">
                        {{ $user->email }}
                    </div>
                    <a href="/profile/{{ $user->name }}/edit" class="button rounded-md w-full mt-5">Settings</a>
                </div>
            </aside>

            <div class="settings_box z-50">
        
            </div>
        </div>
    @else
        @php
            redirect('/login')
        @endphp
    @endif
</div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">

                @include('panels.welcome-panel')

            </div>
        </div>
    </div> --}}

@endsection

@section('footer_scripts')
@endsection
