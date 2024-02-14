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
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
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
                    <div>
                        {{ $slot }} 
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')
        @if(config('tiffey.livewire'))
            @livewireScripts
        @endif
        @stack('scripts')
    </body> 
</html>
