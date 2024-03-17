<nav x-data="{ open: false }" class=" bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row-reverse justify-between h-16">
            <div class="flex flex-row-reverse">
                <!-- Logo -->
                <div class=" flex items-center ">
                    <a class="px-2" href="{{ route('dashboard') }}">
                        <svg height="25px" width="25px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139"
                             xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path style="fill:#9e48ee;"
                                              d="M125.967,51.533V20.314h-16.862V38.06L77.569,12.814L0,74.869h21.361v67.455h112.416v-67.45h21.361 L125.967,51.533z M125.925,134.472H97.546V82.37H57.58v52.103H29.202V71.146l48.356-38.689l48.355,38.689v63.326H125.925z"></path>
                                    </g>
                                </g>
                            </g></svg>
                    </a>
                </div>

                <!-- Navigation Links -->

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('داشبورد') }}
                    </x-nav-link>
                </div>
                @if(auth()->user())
                    @if(auth()->user()->role_id==\App\Models\Role::IS_ADMIN)
                        @can('create',\App\Models\RestaurantCategory::class)
                            <x-nav-link :href="route('admin.restaurant_categories.create')">
                                {{ __('دسته بندی رستوران جدید') }}
                            </x-nav-link>
                        @endcan

                        <x-nav-link :href="route('admin.restaurant_categories.index')">
                            {{ __('دسته بندی رستوران ها') }}
                        </x-nav-link>

                        @can('create',\App\Models\FoodCategory::class)
                            <x-nav-link :href="route('admin.food_categories.create')">
                                {{ __('دسته بندی غذای جدید') }}
                            </x-nav-link>
                        @endcan

                        <x-nav-link :href="route('admin.food_categories.index')">
                            {{ __('دسته بندی غذاها') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.comments.index')">
                            {{ __('کامنت ها') }}
                        </x-nav-link>
                    @endif
                @endif
                @if(auth()->user())
                    @if(auth()->user()->role_id==\App\Models\Role::IS_SELLER)
                        @can('create',\App\Models\Restaurant::class)
                            <x-nav-link :href="route('seller.restaurant.create')">
                                {{ __('رستوران جدید') }}
                            </x-nav-link>
                        @endcan

                        <x-nav-link :href="route('seller.restaurant.index')">
                            {{ __('رستوران ها') }}
                        </x-nav-link>

                        @can('create',\App\Models\Food::class)
                            <x-nav-link :href="route('seller.food.create')">
                                {{ __('غذای جدید') }}
                            </x-nav-link>
                        @endcan

                        <x-nav-link :href="route('seller.food.index')">
                            {{ __('غذاها') }}
                        </x-nav-link>

                        @can('create',\App\Models\Coupon::class)
                            <x-nav-link :href="route('seller.coupon.create')">
                                {{ __('کوپن جدید') }}
                            </x-nav-link>
                        @endcan

                        <x-nav-link :href="route('seller.coupon.index')">
                            {{ __('کوپن ها') }}
                        </x-nav-link>

                    @endif
                @endif

            </div>

            <!-- Settings Dropdown -->
            <div class=" hidden float-right sm:flex sm:items-center sm:ml-6">

                <x-dropdown align="right" width="47">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @if(auth()->user())
                                <div class="">{{ Auth::user()->name }}</div>
                            @endif
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-5">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('پروفایل') }}
                            </x-dropdown-link>


                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('خروج') }}
                                </x-dropdown-link>
                            </form>
                    </x-slot>
            </div>
            </x-dropdown>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('خروج') }}
                </x-responsive-nav-link>
            </form>


        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
            <button x-on:click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path x-bind:class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-bind:class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-bind:class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('داشبورد') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if(auth()->user())
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            @endif

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('پروفایل') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('خروج') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>


</nav>


