<div class="flex flex-row justify-between">
    <div class="flex flex-row gap-2 content-center">
        <div class="flex flex-row gap-2 place-content-center">
            @if(\View::exists('components.icon.logo'))
            <div class="pr-2">
                <x-icon.logo class="h-16" />
            </div>
            @endif
            <div class="my-auto px-2 text-xl font-bold text-brand-mid">
                <a href="/">{{ config('app.name') }}</a>
            </div>
        </div>
        <x-tiffey::nav.link href="/" active="{{ request()->routeIs('welcome') }}">Home</x-tiffey::nav.link>
        <x-tiffey::nav.link href="/dashboard" :active="request()->routeIs('dashboard')">Dashboard</x-tiffey::nav.link>
    </div>
    <div class="flex flex-row gap-2">
        @auth
        <x-tiffey::nav.dropdown title="{{ Auth::user()->name }}" position="right">
            <x-tiffey::nav.link href="/profile" :active="request()->routeIs('dashboard')">Profile</x-tiffey::nav.link>
        </x-tiffey::nav.dropdown>
        <div class="h-full flex place-items-center pl-2 py-1">
        <form method="POST" action="{{ route('logout') }}" class="ml-3">
            @csrf
            <x-tiffey::form-button href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" color="bg-brand-mid">
                {{ __('Logout') }}
            </x-tiffey::form-button>
        </form>
        </div>
    @endauth
    @guest
        @if (Route::has('register'))
        <x-tiffey::nav.link href="{{ route('register') }}" active="{{request()->routeIs('register')}}">
            {{ __('Register') }}
        </x-tiffey::nav.link>
        @endif
        <div class="h-full flex place-items-center pl-2 py-1">
            <x-tiffey::button href="{{ route('login') }}" color="bg-brand-mid">
                {{ __('Login') }}
            </x-tiffey::button>
        </div>
            
    @endguest
    </div>
</div>