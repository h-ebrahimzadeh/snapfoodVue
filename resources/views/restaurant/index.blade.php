<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right">
            {{ __('رستوران ها') }}
        </h2>
    </x-slot>
    @php $i=1 @endphp
    <div class="py-12">
        <div class="relative overflow-x-auto w-full mx-md-2 text-lg">

            <table dir="rtl" class="w-3/4 mx-auto text-lg table-auto">
                <thead class=" text-gray-700 uppercase bg-gray-100">
                <tr class="">
                    <th class="whitespace-nowrap px-6 py-3 text-center rounded-l-lg">ردیف</th>

                    <th class="whitespace-nowrap px-6 py-3 text-center rounded-l-lg">نام</th>
                    <th class="whitespace-nowrap px-6 py-3 text-center rounded-l-lg">دسته بندی رستوران</th>
                    <th class="whitespace-nowrap px-6 py-3 text-center rounded-l-lg">شماره همراه</th>
                    <th class="whitespace-nowrap px-6 py-3 text-center rounded-l-lg">آدرس</th>
                    <th class="whitespace-nowrap px-6 py-3 text-center rounded-l-lg">شماره حساب</th>

                    <th class="whitespace-nowrap px-6 py-3 text-center"></th>
                    <th class="whitespace-nowrap px-6 py-3 text-center"></th>
                    <th class="whitespace-nowrap px-6 py-3 text-center rounded-r-lg"></th>

                </tr>
                </thead>
                <tbody>
                {{--    <a href="{{route('books.create')}}">sada</a>--}}
                @foreach($restaurants as $restaurant)
                    <tr class="border-b even:bg-blue-200">
                        <td class="whitespace-nowrap px-6 py-3 text-center">{{$i++}}</td>
                        <td class="whitespace-nowrap px-6 py-3 text-center">{{$restaurant->name}}</td>

                        <td class="whitespace-nowrap px-6 py-3 text-center">{{$restaurant->restaurantCategory->name}}</td>
                        <td class="whitespace-nowrap px-6 py-3 text-center">{{$restaurant->phone_number}}</td>
                        <td class="whitespace-nowrap px-6 py-3 text-center">{{$restaurant->address}}</td>
                        <td class="whitespace-nowrap px-6 py-3 text-center">{{$restaurant->account_number}}</td>


                        {{--                        <td class="px-6 py-3 text-center">--}}
                        {{--                            <a href="" class="mx-2">--}}
                        {{--                                <button type="submit"--}}
                        {{--                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 m-1 border border-blue-500 hover:border-transparent rounded">--}}
                        {{--                                    Read More--}}
                        {{--                                </button>--}}
                        {{--                            </a>--}}
                        {{--                        </td>--}}
                        <td class="whitespace-nowrap px-3 py-3 text-center">
                            @can('update',$restaurant)
                                <a href="{{route('seller.restaurant.edit',$restaurant->id)}}" class="mx-2">
                                    <button type="submit"
                                            class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 m-1 border border-green-500 hover:border-transparent rounded">
                                        ویرایش
                                    </button>
                                </a>
                            @endcan
                        </td>
                        <td class="whitespace-nowrap px-3 py-3 text-center">
                            @can('delete',$restaurant)
                                <form action="{{route('seller.restaurant.destroy',$restaurant->id)}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 m-1 border border-red-500 hover:border-transparent rounded">
                                        حذف
                                    </button>


                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
