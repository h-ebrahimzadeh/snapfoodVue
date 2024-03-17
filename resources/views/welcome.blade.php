<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Snap food clone</title>
    <style>

        @font-face {
            font-family: Yekan;
            src: url(/fonts/Yekan.eot) format("eot"),
            url(/fonts/Yekan.eot?#iefix) format('eot'),
            url(/fonts/Yekan.woff) format('woff'),
            url(/fonts/Yekan.ttf) format('ttf');
            font-weight: normal;
            font-style: normal;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="font-family: Yekan;" class="bg-blue-300" id="app">
<div>

</div>
<div
    class="flex flex-row-reverse space-x-3 space-x-reverse items-center  w-full h-16 fixed top-0 right-0  px-6 bg-blue-400 text-right">


    <div class="flex flex-row space-x-3">
        @if (Route::has('login'))

            @auth
                <div>
                    <a href="{{ url('/dashboard') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">داشبورد</a>
                </div>

            @else
                <div>
                    <a href="{{ route('login') }}"
                       class="mX-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <button
                            class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 border border-orange-700 rounded">
                            ورود
                        </button>
                    </a>
                </div>

                <div>
                    <a href="{{ route('register') }}"
                       class="mX-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <button
                            class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 border border-orange-700 rounded">
                            ثبت نام
                        </button>
                    </a>
                </div>

            @endif
        @endauth
    </div>

    <div class=" mx-16">
        <h1 class="sm:text-xl md:text-2xl lg:text-4xl text-red-700  text-center">Snap Food clone-شبیه سازی اسنپ فود</h1>
    </div>
</div>
<posts-index>

</posts-index>


</body>
</html>
