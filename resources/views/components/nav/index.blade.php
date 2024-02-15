<div class="flex flex-row justify-between">
    <div class="flex flex-row gap-2">
        @if(\View::exists('tiffey::components.icon.logo'))
        <div class="">
            @include('tiffey::components.icon.logo')
        </div>
        @endif
        <div>{{ config('app.name') }}</div>
        <x-tiffey::nav.link href="/">Home</x-tiffey::nav.link>
    </div>
    <div class="flex flex-row gap-2">
        @auth
        <x-tiffey::nav.dropdown title="">
        </x-tiffey::nav.dropdown>
        <form method="POST" action="{{ route('logout') }}" class="ml-3">
            @csrf
            <x-tiffey::form-button href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" color="bg-brand-mid">
                {{ __('Logout') }}
            </x-tiffey::form-button>
        </form>
    @endauth
    @guest
        @if (Route::has('register'))
        <x-tiffey::nav.link href="{{ route('register') }}" active="{{request()->routeIs('register')}}">
            {{ __('Register') }}
        </x-tiffey::nav.link>
        @endif
        <span class="ml-3">
            <x-tiffey::button href="{{ route('login') }}" color="bg-brand-mid">
                {{ __('Login') }}
            </x-tiffey::button>
        </span>
    @endguest
    </div>
</div>