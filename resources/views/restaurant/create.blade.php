<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            {{ __('رستوران جدید') }}
        </h2>
    </x-slot>

    <div class="py-12 text-right">
        <div class="w-1/2 mt-3 mx-auto">
            <form action="{{route('seller.restaurant.store')}}" method="post">
                @csrf
                <input type="hidden" id="lat" name="lat" value="">
                <input type="hidden" id="lng" name="lng" value="">

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">نام</label>
                    <input dir="rtl" type="text"
                           name="name"
                           id="@if(empty($errors->first('name'))) success @else error  @endif"
                           class="@if(empty($errors->first('name'))) bg-slate-50 border border-slate-950 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-slate-950 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{old('name')}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('name'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('name')}}
                    </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">دسته بندی رستوران</label>
                    <select name="restaurant_category"
                            id="@if(empty($errors->first('restaurant_category'))) success @else error  @endif"
                            class="@if(empty($errors->first('restaurant_category'))) bg-slate-50 border border-slate-950 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-slate-950 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif">

                        <option value="" disabled>select one ...</option>
                        @foreach($restaurant_categories as $restaurant_category)
                            <option value="{{$restaurant_category->id}}">{{$restaurant_category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">شماره همراه</label>
                    <input type="text"
                           name="phone_number"
                           placeholder="021-12345678"
                           id="@if(empty($errors->first('phone_number'))) success @else error  @endif"
                           class="@if(empty($errors->first('phone_number'))) bg-slate-50 border border-slate-950 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-slate-950 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{old('phone_number')}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('phone_number'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('phone_number')}}
                    </p>
                </div>


                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">آدرس </label>
                    <input type="text"
                           name="address"
                           id="@if(empty($errors->first('address'))) success @else error  @endif"
                           class="@if(empty($errors->first('address'))) bg-slate-50 border border-slate-950 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-slate-950 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{old('address')}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('address'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('address')}}
                    </p>
                </div>

                <div style="height: 350px; background: #eee; border: 2px solid #aaa;" id="map" class="mb-6"></div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">شماره حساب</label>
                    <input type="text"
                           name="account_number"
                           placeholder=""
                           id="@if(empty($errors->first('account_number'))) success @else error  @endif"
                           class="@if(empty($errors->first('account_number'))) bg-slate-50 border border-slate-950 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-slate-950 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                                 @endif"
                           value="{{old('account_number')}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('account_number'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('account_number')}}
                    </p>
                </div>


                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    ثبت نام
                </button>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script type="text/javascript">
        var lat = 35.699739;
        var lng = 51.338097;

        console.log(document.getElementById("lat").value);

        if (document.getElementById("lat").value)
            lat = document.getElementById("lat").value;

        if (document.getElementById("lng").value)
            lng = document.getElementById("lng").value;

        // neshan map
        var myMap = new L.Map('map', {
            key: 'web.ea949708b9bd4824a1197fb003f4edf1',
            maptype: 'dreamy',
            poi: true,
            traffic: false,
            center: [lat, lng],
            zoom: 14
        });

        //add marker
        var stuSplit = L.latLng(lat, lng);
        var myMarker = new L.Marker(stuSplit,
            {
                title: 'unselected',
                draggable: true,
                clickable: true,
            })
            .addTo(myMap).on('dragend', (e) => {
                document.getElementById("lat").value = e.target.getLatLng().lat;
                document.getElementById("lng").value = e.target.getLatLng().lng;
            });

        function geocoding() {
            var log = document.getElementById("log");
            //getting adrress value from input tag
            var address = document.getElementById("address").value;
            //making url
            var url = `https://api.neshan.org/v4/geocoding?address=${address}`;
            console.log(url);
            //add your api key
            var params = {
                headers: {
                    'Api-Key': 'web.ef4fdf1743b2482da33dd3f5945a18b0'
                },

            };
            //sending get request
            axios.get(url, params)
                .then(data => {
                    //using the data
                    var lat = data.data.location.y;
                    var lng = data.data.location.x;
                    //logging the location
                    document.getElementById("lat").value = lat;
                    document.getElementById("lng").value = lng;
                    //update marker location to address
                    myMarker.setLatLng([lat, lng]);
                    myMarker.bindPopup(address).openPopup();
                    //set map center to address
                    myMap.flyTo([lat, lng], 15);

                }).catch(err => {
                console.log("error = " + err);
                log.textContent = "Nothing found";

            });
        }

    </script>

</x-app-layout>
