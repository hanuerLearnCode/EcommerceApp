<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

{{--        <!-- bootstrap core css -->--}}
{{--        <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}"/>--}}
{{--        <!-- font awesome style -->--}}
{{--        <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet"/>--}}
{{--        <!-- Custom styles for this template -->--}}
{{--        <link href="{{asset('home/css/style.css')}}" rel="stylesheet"/>--}}
{{--        <!-- responsive style -->--}}
{{--        <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet"/>--}}

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
{{--            @include('home.components.header')--}}
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
