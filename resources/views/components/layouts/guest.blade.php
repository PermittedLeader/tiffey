<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') - {{ config('app.name') }}</title>

        <!-- Fonts -->

        <!-- Styles -->
        @stack('styles')
        @if(config('tiffey.livewire'))
            @livewireStyles 
        @endif
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-body antialiased">
        <div class="flex flex-col min-h-screen place-content-center bg-gray-50 dark:bg-gray-900">
            <div class="max-w-2xl md:px-5 md:w-2/4 md:mx-auto text-center">
                <div class="flex flex-row gap-2 place-content-center pb-4">
                    @if(\View::exists('components.icon.logo'))
                    <div class="px-4 border-r-2">
                        <x-icon.logo class="h-16" />
                    </div>
                    @endif
                    <div class="my-auto px-2 text-xl font-bold">
                        {{ config('app.name') }}
                    </div>
                </div>
            </div>
            <div class="max-w-2xl md:px-5 md:w-2/4 md:mx-auto">
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
            <div class="max-w-2xl md:px-5 md:w-2/4 md:mx-auto">
                {{ $slot }} 
            </div>
        </div>

        @stack('modals')
        @if(config('tiffey.livewire'))
            @livewireScripts
        @endif
        @stack('scripts')
    </body> 
</html>
