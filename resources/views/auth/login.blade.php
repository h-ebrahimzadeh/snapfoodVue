<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email AddressUser -->
        <div>
            <label class="flex flex-row-reverse" for="">ایمیل</label>
{{--            <x-input-label for="email" :value="__('ایمیل')" />--}}
            <x-text-input id="email" class="block mt-1 w-full text-blue-700 text-xl " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="flex flex-row-reverse" for="">رمز</label>
{{--            <x-input-label for="password" :value="__('Password')" />--}}
            <x-text-input  id="password" class="block mt-1 w-full text-blue-700 text-xl"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="justify-start rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="mr-2 text-sm text-gray-600">{{ __('به خاطر داشته باش') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-start justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('پسورد خود را فراموش کرده اید؟') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('ورود') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
