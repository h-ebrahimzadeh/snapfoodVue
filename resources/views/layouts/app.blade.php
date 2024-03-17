<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    {{--    Google--}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    {{--        neshan cdn--}}
    <link href="https://static.neshan.org/sdk/openlayers/5.3.0/ol.css" rel="stylesheet" type="text/css">
    <script
        src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://static.neshan.org/sdk/openlayers/5.3.0/ol.js" type="text/javascript"></script>

    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript">


    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body style="font-family: Vazir;" class=" antialiased w-full" id="app">

<div class="min-h-screen bg-gray-100">
    {{--    //navigation--}}
    @if(auth()->user())

        <div class="grid grid-cols-2 justify-items-start place-items-center bg-orange-500">
            <navigation class="mx-10 col-start-1 text-xl ml-10 m-1 "
                        user-name="{{ Auth::user()->name }}"></navigation>
            <div class="col-start-4 justify-self-end  mx-4">
                @if(auth()->user()->role_id == \App\Models\Role::IS_SELLER)
                    <div>
                        <a class="mx-3 hover:drop-shadow-2xl" href="{{route('dashboard')}}">داشبورد</a>
                        @can('create',\App\Models\Restaurant::class)
                            <a class="mx-3 hover:drop-shadow-2xl" href="{{route('seller.restaurant.create')}}">رستوران
                                جدید</a>
                        @endcan
                        <a class="mx-3 hover:drop-shadow-2xl" href="{{route('seller.restaurant.index')}}">رستوران ها</a>
                        @can('create',\App\Models\Food::class)
                            <a class="mx-3 hover:drop-shadow-2xl" href="{{route('seller.food.create')}}">غذای جدید</a>
                        @endcan
                        <a class="mx-3 hover:drop-shadow-2xl" href="{{route('seller.food.index')}}">غذاها</a>
                        @can('create',\App\Models\Coupon::class)
                            <a class="mx-3 hover:drop-shadow-2xl" href="{{route('seller.coupon.create')}}">کوپن جدید</a>
                        @endcan
                        <a class="mx-3 hover:drop-shadow-2xl" href="{{route('seller.coupon.index')}}">کوپن ها</a>
                    </div>
                @endif
                @if(auth()->user()->role_id==\App\Models\Role::IS_ADMIN)
                    <a class="mr-3  border-l border-slate-500 p-1 hover:drop-shadow-md "
                       href="{{route('admin.restaurant_categories.create')}}">دسته بندی رستوران جدید</a>

                    <a class="mr-3  border-l border-slate-500 p-1 hover:drop-shadow-md "
                       href="{{route('admin.restaurant_categories.index')}}">دسته بندی رستوران ها</a>

                    <a class="mr-3  border-l border-slate-500 p-1 hover:drop-shadow-md "
                       href="{{route('admin.food_categories.create')}}">دسته بندی غذای جدید</a>

                    <a class="mr-3  border-l border-slate-500 p-1 hover:drop-shadow-md "
                       href="{{route('admin.food_categories.index')}}">دسته بندی غذاها</a>

                    <a class="mr-3  border-l border-slate-500 p-1 hover:drop-shadow-md "
                       href="{{route('admin.comments.index')}}">کامنت ها</a>
                @endif

            </div>
        </div>
    @endif

    {{--    @include('layouts.navigation')--}}

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="w-11/12 mx-auto">
        {{ $slot }}
    </main>
</div>


</body>

</html>
