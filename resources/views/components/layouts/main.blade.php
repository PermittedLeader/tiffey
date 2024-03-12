<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $pageTitle ?? '' }} - {{ config('app.name') }}</title>

        <!-- Fonts -->

        <!-- Styles -->
        @stack('styles')
        @if(config('tiffey.livewire'))
            @livewireStyles
        @endif
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://unpkg.com/@alpinejs/ui@3.13.2-beta.0/dist/cdn.min.js"></script>
    </head>
    <body class="font-body antialiased">
        <div class="min-h-screen {{ config('tiffey.app-bg-color') }} {{ config('tiffey.app-text-color') }} pt-2">
            <div class="md:container md:mx-auto shadow-b md:px-5">
                <x-tiffey::nav />
            </div>
            <div class="md:container md:mx-auto md:px-5">
                @stack('alerts')
                @if(Session::has('messages'))
                    @foreach (Session::pull('messages') as $message)
                        <x-tiffey::alert level="{{ $message['level'] }}" dismissable="{{ $message['dismissable'] }}">
                            @if ($message['title'])
                                <x-slot name="header">
                                    {{ $message['title'] }}
                                </x-slot>
                            @endif
                            @if ($message['actions'])
                                <x-slot name="actions">
                                    {{ $message['actions'] }}
                                </x-slot>
                            @endif
                            {{ $message['message'] }}
                        </x-tiffey::alert>
                    @endforeach
                @endif
            </div>
            <div class="md:container md:mx-auto md:px-5">
                <div class="">
                    @hasSection('header')
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            @yield('header')
                        </h2>
                    @endif
                    @if(isset($subnav)||isset($actions))
                        <div class="flex w-full flex-col md:flex-row">
                            @if (isset($subnav))
                                <div class="bg-gray-50 rounded-sm shadow-inner flex-grow" x-data="{ open: false }">
                                    <div class="px-4 md:hidden" x-on:click="open = !open">{{ __('Section Menu') }}</div>
                                    <div class="hidden md:flex" x-bind:class="{ 'hidden': !open }">
                                        {{ $subnav }}
                                    </div>
                                    
                                </div>
                            @endif
                            @if (isset($actions))
                                <div class="mx-2 mt-2 md:mt-0 text-right">
                                    <div class="flex md:mt-1 justify-end">
                                        <div class="my-auto">{{ $actions }}</div>
                                        
                                    </div>
                                    
                                </div>
                            @endif
                        </div>
                        
                    @endif
                    <div>
                        {{ $slot }} 
                    </div>
                </div>
            </div>
            <footer class="md:container md:mx-auto py-3 px-3 md:px-5 text-gray-mid text-sm">
                <x-tiffey::layouts.footer />
            </footer>
        </div>

        @stack('modals')
        @if(config('tiffey.livewire'))
            @livewireScripts
        @endif
        @stack('scripts')
        
    </body> 
</html>
