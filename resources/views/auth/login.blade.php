<x-tiffey::layouts.guest-layout>
    @if (session('status'))
        <x-tiffey::alert level="info">{{ $status }}</x-tiffey::alert>
    @endif

    <form method="POST" action="{{ route('login') }}" class="w-full">
        @csrf
        <x-tiffey::card>
        <!-- Email Address -->
        <x-tiffey::input id="email" type="email" label="{{ __('Email') }}" :value="old('email')" required autofocus autocomplete="username" />

        <x-tiffey::input id="password" type="password" label="{{ __('Password') }}" required autocomplete="current-password" />

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>
            <x-slot:footerActions>
                @if (Route::has('password.request'))
                    <x-tiffey::button href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </x-tiffey::button>
                @endif
                <x-tiffey::form-button color="bg-brand-mid">
                    {{ __('Log in') }}
                </x-tiffey::form-button>
            </x-slot:footerActions>
        </x-tiffey::card>
    </form>
</x-guest-layout>
