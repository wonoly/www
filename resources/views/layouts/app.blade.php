<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@hasSection('template_title')@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="icon" href="/favicon.ico">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Meta tags --}}

        <!-- Primary Meta Tags -->
        <meta name="title" content="Wonoly - privacy is not a privilege, it is a right">
        <meta name="description" content="Using Wonoly's products you will be safer than ever. Wonoly has a browser, search engine utility extensions and many more to make your experience on the internet better and more private.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://wonoly.net/">
        <meta property="og:title" content="Wonoly - privacy is not a privilege, it is a right">
        <meta property="og:description" content="Using Wonoly's products you will be safer than ever. Wonoly has a browser, search engine utility extensions and many more to make your experience on the internet better and more private.">
        <meta property="og:image" content="/images/meta.png" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://wonoly.net/">
        <meta property="twitter:title" content="Wonoly - privacy is not a privilege, it is a right">
        <meta property="twitter:description" content="Using Wonoly's products you will be safer than ever. Wonoly has a browser, search engine utility extensions and many more to make your experience on the internet better and more private.">
        <meta property="twitter:image" content="/images/meta.png" />


        <!-- Color -->
        <meta name="theme-color" content="#fafafa">

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @if (Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null')
            <link rel="stylesheet" type="text/css" href="{{ $theme->link }}">
        @endif

        @yield('head')
        @include('scripts.ga-analytics')
    </head>
    <body>
        <div id="app">

            @include('partials.nav')

            <main class="py-4">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @include('partials.form-status')
                        </div>
                    </div>
                </div>

                @yield('content')

            </main>

        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>

        @if(config('settings.googleMapsAPIStatus'))
            {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.config("settings.googleMapsAPIKey").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
        @endif

        @yield('footer_scripts')

    </body>
</html>
