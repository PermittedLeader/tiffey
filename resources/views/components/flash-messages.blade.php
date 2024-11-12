@props(['bag'=>'messages'])
@if(Session::has($bag))
    @foreach (Session::pull($bag) as $message)
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