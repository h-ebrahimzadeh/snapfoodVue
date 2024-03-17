<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create food') }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class=" w-1/2 mt-3 mx-auto ">
        <form action="{{route('seller.food.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">نام</label>
                        <input type="text"
                               name="name"
                               id="@if(empty($errors->first('name'))) success @else error  @endif"
                               class="@if(!empty($errors->first('name'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                                 @endif"
                                value="{{old('name')}}">
                                <p class="mt-2 text-sm @if(empty($errors->first('name'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('name')}}
                                </p>
                    </div>

                <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">دسته بندی غذا</label>
                        <select  name="food_category"
                                id="@if(empty($errors->first('food_category'))) success @else error  @endif"
                                class="@if(!empty($errors->first('food_category'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                           @endif">

                            <option   value="" disabled selected>یکی را انتخاب کنید...</option>
                            @foreach($food_categories as $food_category)
                                <option value="{{$food_category->id}}">{{$food_category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">مواد اولیه</label>
                    <input type="text"
                           name="materials"
                           placeholder="مواد اولیه"
                           id="@if(empty($errors->first('materials'))) success @else error  @endif"
                           class="@if(!empty($errors->first('materials'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                                 @endif"
                           value="{{old('material')}}">
                            <p class="mt-2 text-sm @if(empty($errors->first('materials'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('material')}}
                            </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">قیمت</label>
                    <input type="text"
                           name="price"
                           id="@if(empty($errors->first('price'))) success @else error  @endif"
                           class="@if(!empty($errors->first('price'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                                @else
                                bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                                 @endif"
                           value="{{old('price')}}">
                    <p class="mt-2 text-sm @if(empty($errors->first('price'))) text-green-600        dark:text-green-500
                                    @else text-red-600 dark:text-red-500 @endif">{{$errors->first('price')}}
                    </p>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">کوپن</label>
                    <select name="coupon"
                            id="@if(empty($errors->first('coupon'))) success @else error  @endif"
                            class="@if(!empty($errors->first('coupon')))
                             bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                           @else
                           bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                           @endif">

                        <option value="" disabled>یکی را انتخاب کنید...</option>
                        @foreach($coupons as $coupon)
                            <option value="{{$coupon->id}}">{{$coupon->code}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-6">

                    <label class="block mb-2 text-sm font-medium text-black-700 dark:text-green-500">فود پارتی</label>
                    <select dir="rtl" name="food_party"
                            id="@if(empty($errors->first('food_party'))) success @else error  @endif"
                            class="@if(! empty($errors->first('food_party')))
                               bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                           @else
                           bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                           @endif">

                        <option value="" disabled selected>یکی را انتخاب کنید...</option>
                        @foreach($food_parties as $food_party)
                            <option value="{{$food_party->id}}">{{$food_party->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">رستوران</label>
                    <select name="restaurant"
                            id="@if(empty($errors->first('restaurant'))) success @else error  @endif"
                            class="@if(!empty($errors->first('restaurant'))) bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500
                           @else bg-slate-50 border border-slate-500 text-slate-900 dark:text-slate-400 placeholder-slate-700 dark:placeholder-slate-500 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-slate-500
                           @endif">

                        <option value="" disabled>یکی را انتخاب کنید...</option>
                        @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="felx mb-6">
                    <label class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">تصویر غذا</label>

                    <label for="image">تصویر دلخواه را انتخاب کنید</label>
                    <input  id="image"
                              class="block mx-auto w-full text-sm text-slate-500
                            file:border-1 file:text-center
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                       "  type="file" name="image">


                </div>





                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    ثبت
                </button>
            </form>
        </div>
    </div>

    <script>
        const input = document.getElementById("image");
        const preview = document.querySelector(".preview");


        input.style.opacity = 0;


        input.addEventListener("change", updateImageDisplay);

        function updateImageDisplay() {
            while (preview.firstChild) {
                preview.removeChild(preview.firstChild);
            }

            const curFiles = input.files;
            if (curFiles.length === 0) {
                const para = document.createElement("p");
                para.textContent = "No files currently selected for upload";
                preview.appendChild(para);
            } else {
                const list = document.createElement("ol");
                preview.appendChild(list);

                for (const file of curFiles) {
                    const listItem = document.createElement("li");
                    const para = document.createElement("p");
                    if (validFileType(file)) {
                        para.textContent = `File name ${file.name}, file size ${returnFileSize(
                            file.size,
                        )}.`;
                        const image = document.createElement("img");
                        image.src = URL.createObjectURL(file);

                        listItem.appendChild(image);
                        listItem.appendChild(para);
                    } else {
                        para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
                        listItem.appendChild(para);
                    }

                    list.appendChild(listItem);
                }
            }
        }

        // https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
        const fileTypes = [
            "image/apng",
            "image/bmp",
            "image/gif",
            "image/jpeg",
            "image/pjpeg",
            "image/png",
            "image/svg+xml",
            "image/tiff",
            "image/webp",
            "image/x-icon",
        ];

        function validFileType(file) {
            return fileTypes.includes(file.type);
        }

        function returnFileSize(number) {
            if (number < 1024) {
                return `${number} bytes`;
            } else if (number >= 1024 && number < 1048576) {
                return `${(number / 1024).toFixed(1)} KB`;
            } else if (number >= 1048576) {
                return `${(number / 1048576).toFixed(1)} MB`;
            }
        }

    </script>

</x-app-layout>
