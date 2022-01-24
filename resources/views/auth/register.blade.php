@extends('layouts.app')

@section('template_title') Register @endsection
@section('template_linked_css')
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
@endsection
@section('content')
<div class="container">

    <style>
        #secondHalf {
            background: #f9fafe;
            height: 100vh;
            position: relative;
        }

        #secondHalf::before {
            content: "";
            background: url(/images/color-background.jpg) no-repeat center center;
            background-size: cover;
            position: absolute;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            opacity: 0.18;
        }
    </style>

    <div class="flex h-screen w-full">
        <div class="h-full flex flex-col shadow-lg z-10 items-center justify-center w-1/2">

            <a href="/" class="font-bold text-2xl absolute top-10 left-10">
                Wonoly
            </a>

            <form method="POST" action="{{ route('register') }}" class="w-2/3 relative">

                @csrf

                <div data-aos="fade-right" class="font-bold mt-5 w-full text-left">
                    {{ __('Username') }}
                </div>
                <div data-aos-delay="50" data-aos="fade-right" class="mt-2.5 auth_form__input_wrapper form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                    <div class="flex justify-center items-center w-[42px] h-[42px]">
                        <svg class="mx-3" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input id="name" type="text" placeholder="Username" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus/>
                </div>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <div class="flex items-center justify-between">

                    <div class="w-1/2 mr-3">
                        <div data-aos-delay="200" data-aos="fade-right" class="font-bold mt-5 w-full text-left">
                            {{ __('First Name') }}
                        </div>
                        <div data-aos-delay="270" data-aos="fade-right" class="mt-2.5 auth_form__input_wrapper form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}">
                            <div class="flex justify-center items-center w-[42px] h-[42px]">
                                <svg class="mx-3" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('last_name') }}" required autofocus placeholder="First name"/>
                        </div>
        
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="w-1/2 ml-3">
                        <div data-aos-delay="250" data-aos="fade-right" class="font-bold mt-5 w-full text-left">
                            {{ __('Last Name') }}
                        </div>
                        <div data-aos-delay="270" data-aos="fade-right" class="mt-2.5 auth_form__input_wrapper form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}">
                            <div class="flex justify-center items-center w-[42px] h-[42px]">
                                <svg class="mx-3" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Last name"/>
                        </div>
    
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div data-aos-delay="300" data-aos="fade-right" class="font-bold mt-5 w-full text-left">
                    {{ __('Email') }}
                </div>
                <div data-aos-delay="150" data-aos="fade-right" class="mt-2.5 auth_form__input_wrapper form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                    <div class="flex justify-center items-center w-[42px] h-[42px]">
                        <svg class="mx-3" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                    </div>
                    <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="on"  autofocus/>
                </div>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div data-aos-delay="350" data-aos="fade-right" class="font-bold mt-5 w-full text-left">
                    {{ __('Password') }}
                </div>
                <div data-aos-delay="250" data-aos="fade-right" class="mt-2.5 auth_form__input_wrapper form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <div class="flex justify-center items-center w-[42px] h-[42px]">
                        <svg class="mx-3" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input id="password" type="password" name="password" placeholder="Password" required/>
                </div>

                {{-- This input used to skip input verification --}}
                <input id="password-confirm" value="" type="password" name="password_confirmation" class="hidden"/>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <input type="checkbox" name="remember" checked class="hidden" />

                <label data-aos-delay="450" data-aos="fade-right" for="submit_btn" class="button mt-5 inline-block" style="width: 100%;">
                    {{ __('Create account') }}
                </label>
                <button type="submit" id="submit_btn" class="hidden"></button>

                <div data-aos-delay="500" data-aos="fade-right" class="w-full relative text-center mt-8">
                    {{-- TODO: add this to the language array --}}
                    {{ __('Already have an account?') }}
                    <a class="mt-20 ml-2" href="{{ route('login') }}">
                        {{ __('Log in here') }}
                    </a>
                </div>

                <div class="relative w-full my-9">
                    <hr>
                    <p class="absolute top-2/4 left-2/4 w-max bg-body px-3" style="transform: translate(-50%, -50%)">
                        {{ __("Or Register with") }}
                    </p>
                </div>

                @include('partials.socials-icons')

            </form>
        </div>
        <div id="secondHalf" class="h-full flex flex-col items-center justify-center w-1/2">

        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
    @if(config('settings.reCaptchStatus'))
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#password').keyup(function (){
            $('#password-confirm').val($(this).val());
        });
    </script>
@endsection
