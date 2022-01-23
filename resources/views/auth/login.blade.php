@extends('layouts.app')

@section('template_title') Login @endsection
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

    <div class="flex h-screen">
        <div class="h-full flex flex-col shadow-lg z-10 items-center justify-center w-1/2">

            <a href="/" class="font-bold text-2xl absolute top-10 left-10">
                Wonoly
            </a>

            <form method="POST" action="{{ route('login') }}" class="w-1/2 relative">

                @csrf

                <div data-aos-delay="200" data-aos="fade-right" class="font-bold mt-5 w-full text-left">
                    {{ __('Email') }}
                </div>
                <div data-aos="fade-left" class="mt-2.5 auth_form__input_wrapper form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
                    <div class="flex justify-center items-center w-[42px] h-[42px]">
                        <svg class="mx-3" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="on"  autofocus/>
                </div>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div data-aos-delay="200" data-aos="fade-right" class="font-bold mt-5 w-full text-left">
                    {{ __('Password') }}
                </div>
                <div data-aos="fade-left" class="mt-2.5 auth_form__input_wrapper form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <div class="flex justify-center items-center w-[42px] h-[42px]">
                        <svg class="mx-3" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input id="password" type="password" name="password" placeholder="Password" required/>
                </div>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <input type="checkbox" name="remember" checked class="hidden" />

                <label for="submit_btn" class="button mt-5 inline-block" style="width: 100%;">
                    {{ __('Login') }}
                </label>
                <button type="submit" id="submit_btn" class="hidden"></button>

                <div class="w-full relative text-center mt-7">
                    {{ __('auth.forgot') }}
                    <a class="mt-20 ml-3" href="{{ route('password.request') }}">
                        {{ __('Reset here') }}
                    </a>
                </div>

                <div class="relative w-full my-8">
                    <hr>
                    <p class="absolute top-2/4 left-2/4 w-max bg-body px-3" style="transform: translate(-50%, -50%)">
                        Or Login with
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
