@extends('layouts.app')

@section('template_title')
    {{ trans('profile.templateTitle') }}
@endsection

@section('template_linked_css')
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
@endsection

@php
    $user = Auth::user();
@endphp

@section('content')
<div class="content h-screen overflow-hidden">
    @include('partials.user-bar')
    <div class="z-10 relative h-full color-bg z-0">
        <div style="min-height: calc(100% - 85px);" class="z-10 items-center flex">
            <aside class="z-10 w-1/4 h-full flex flex-col jusity-center items-end">
                <div class="settings_nav h-full w-[20%] flex flex-col jusitfy-center items-start h-full w-[20%] flex flex-col jusitfy-center items-start">
                    <h1 class="text-3xl font-bold mb-3">Settings</h1>
                    <!-- TODO: Sections >> tailwindcss -->
                    <a href="/user/edit" class="section active">
                        Account
                    </a>
                    <a href="/user/changePassword" class="section">
                        Password
                    </a>
                    <a href="#" class="section">
                        Notifications
                    </a>
                    <a href="#" class="section">
                        Data export
                    </a>
                    <a href="#" class="section">
                        Advanced
                    </a>
                </div>
            </aside>

            <div class="z-10 settings_box">
                <h2 class="mb-5 text-2xl font-bold">Account</h2>
                <h4 class="font-bold mt-3 w-full text-left mb-3">
                    Avatar
                </h4>
                <div style="display: flex; align-items: center; width: 100%">
                    @if($user->profile->avatar_status == 0)
                        <img src="{{  Gravatar::get($user->email) }}" alt="{{ $user->name }}" width="50" class="rounded-full">
                    @endif
                    @if($user->profile->avatar_status == 1)
                        <img src="@if ($user->profile->avatar != NULL) {{ $user->profile->avatar }} @endif" alt="{{ $user->name }}" width="50" class="rounded-full">
                    @endif
                    {!! Form::open(array('route' => 'avatar.upload', 'method' => 'POST', 'name' => 'avatarDropzone','id' => 'avatar_form', 'class' => 'flex justify-center m-0', 'files' => true)) !!}
                        <label for="change_avatar">
                            <div data-aos="fade-down" class="button ml-6 px-10">Change</div>
                        </label>
                        <input id="change_avatar" class="hidden" type="file" name="file" required />
                    {!! Form::close() !!}
                    {!! Form::open(array('route' => 'avatar.delete', 'method' => 'POST', 'class' => 'flex justify-center m-0')) !!}
                        <button type="submit" class="button secondary ml-5 px-10" data-aos="fade-down" data-aos-delay="50">Delete</button>
                    {!! Form::close() !!}
                </div>
                <form id="settings_form" action="" method="post">
                    {{-- CSRF TOKEN --}}

                    <hr class="opacity-40 mt-5 mx-1">
                    <div class="flex justify-between ">
                        <div class="w-1/2">
                            <div data-aos="zoom-in" data-aos-delay="100" class="font-bold mt-5 w-full text-left">
                                Display name
                            </div>
                            <div data-aos="zoom-in" data-aos-delay="150" class="mt-[10px] auth_form__input_wrapper">
                                <div class="flex justify-center items-center w-[42px] h-[42px]">
                                    <svg width="17" height="17" fill="none" class="mx-3" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <input id="username" type="text" pattern="[a-zA-Z0-9]{2,64}" value="" name="user_name" placeholder="Display name" required />
                            </div>
                        </div>
                        <div class="mx-5"></div>
                        <div class="w-1/2">
                            <div data-aos="zoom-in" data-aos-delay="200" class="font-bold mt-5 w-full text-left">
                                Full name
                            </div>
                            <div data-aos="fade-right" data-aos-delay="250" class="mt-[10px] auth_form__input_wrapper">
                                <div class="flex justify-center items-center w-[42px] h-[42px]">
                                    <svg width="16" height="16" fill="none" class="mx-3" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <input type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_full_name" placeholder="Display name" required />
                            </div>
                        </div>
                    </div>
                    <hr class="opacity-30 my-5 mx-1">
                    <div class="w-full">
                        <div data-aos="zoom-in" data-aos-delay="300" class="font-bold mt-5 w-full text-left">
                            Email adress
                        </div>
                        <div data-aos="zoom-in" data-aos-delay="350" class="mt-[10px] auth_form__input_wrapper">
                            <div class="flex justify-center items-center w-[42px] h-[42px]">
                            <svg width="16" height="16" fill="none" class="mx-3" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input value="" type="email" name="user_email" placeholder="Email adress" required />
                        </div>
                    </div>
                    <hr class="opacity-30 my-5 mx-1">
                    <div onclick="submit_form()" data-aos="zoom-in" class="button float-right w-full">Save settings</div>
                    <input type="submit" class="hidden" />

                    <input type="hidden" name="skip_username" value="true">
                    <input type="hidden" name="skip_email" value="true">
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('footer_scripts')

    <script>
        function dropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains("show")) {
                        openDropdown.classList.remove("show");
                    }
                }
            }
        };
    </script>

    <script>
        document.getElementById("change_avatar").onchange = function() {
            document.getElementById("avatar_form").submit();
        };
    </script>
@endsection
