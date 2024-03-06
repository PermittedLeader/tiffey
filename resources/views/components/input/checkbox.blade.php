@props(['label','hint'=>false,'name','inBlock'=>false])
@php
$randId = $name.bin2hex(random_bytes(2)); 
@endphp
<div class="flex flex-row items-center ml-1">
    <input type="checkbox" id="{{ $randId }}" name="{{ $name }}" {{ $attributes->merge(['class'=>'my-2 mr-3 p-2 '.config('tiffey.border-color')]) }}>
    @if($inBlock)
    <label class="font-bold" for="{{ $randId }}">
        {{ $label }}
        @if($hint)
            <x-tiffey::input.hint class="ml-2">{{ $hint }}</x-tiffey::hint>
        @endif
    </label>
    @else
    <span class="sr-only">{{ $label }}</span>
    @endif
</div>
