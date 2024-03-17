<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @font-face {
                font-family: Yekan;
                src: url('/fonts/Yekan.eot');
                src: url('/fonts/Yekan.eot?#iefix') format('Yekan-opentype'),
                url('/fonts/Yekan.woff') format('woff'),
                url('/fonts/Yekan.ttf') format('truetype');
                font-weight: normal;
                font-style: normal;
            }
        </style>
    </head>
    <body style="font-family: Yekan;" class=" text-gray-900 antialiased bg-orange-300" id="app">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
            @include('layouts.navigationGuest')
            <!-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> -->

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg bg-gray-100">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
