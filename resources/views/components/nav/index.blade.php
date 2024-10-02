<div class="flex flex-col md:flex-row justify-between" x-data="{ open: false }" @click.outside="open = false">
    <div class="flex flex-col md:flex-row md:gap-2 content-center">
        <div class="flex flex-row gap-2 justify-between md:place-content-center">
            @if(\View::exists('components.icon.logo'))
            <div class="pr-2 hidden md:flex">
                <x-icon.logo class="h-16" />
            </div>
            @endif
            <div class="my-auto px-2 text-xl font-bold text-brand-mid">
                <a href="/">{{ config('app.name') }}</a>
            </div>
            <div @click="open = ! open" class="my-2 mr-4 flex md:hidden">
                <i class="fa-solid fa-bars" x-show="!open"></i>
                <i class="fa-solid fa-xmark" x-show="open"></i>
                <span class="fa-sr-only">Show/hide menu</span>
            </div>
        </div>
        <div class="flex flex-col md:flex md:flex-row md:gap-2 border-solid border-t md:border-none" x-bind:class="{ 'hidden': !open }">
            <x-tiffey::nav.link href="/" active="{{ request()->routeIs('welcome') }}">Home</x-tiffey::nav.link>
            <x-tiffey::nav.link href="/dashboard" :active="request()->routeIs('dashboard')">Dashboard</x-tiffey::nav.link>
            @if(\Composer\InstalledVersions::isInstalled('permittedleader/tiffey-auth'))
            <x-tiffey::nav.dropdown title="{{ __('auth::auth.menu_name') }}">
                <x-tiffey::nav.link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')">
                    {{ trans_choice('auth::auth.roles.name',2) }}
                </x-tiffey::nav.link>
                <x-tiffey::nav.link href="{{ route('permissions.index') }}" :active="request()->routeIs('permissions.*')">
                    {{ trans_choice('auth::auth.permissions.name',2) }}
                </x-tiffey::nav.link>
            </x-tiffey::nav.dropdown>
            @endif
        </div>
    </div>
    <div class="flex flex-col md:flex md:flex-row md:gap-2" x-bind:class="{ 'hidden': !open }">
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