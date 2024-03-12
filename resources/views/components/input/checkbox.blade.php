@props(['label','hint'=>false,'name'=>false,'inBlock'=>false, 'id'=>false])
@php
    if(!$name){
        $name = Str::camel($label);
    }
    if(!$id){
        $id= Str::snake(preg_replace('/[^A-Za-z0-9_]/',' ',$name));
    }
@endphp
<div class="flex flex-row items-center ml-1">
    <input type="checkbox" id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class'=>'my-2 mr-3 p-2 '.config('tiffey.border-color')]) }}>
    @if(!$inBlock)
    <label class="font-bold" for="{{ $id }}">
        {{ $label }}
        @if($hint)
            <x-tiffey::input.hint class="ml-2">{{ $hint }}</x-tiffey::hint>
        @endif
    </label>
    @else
    <span class="sr-only">{{ $label }}</span>
    @endif
</div>
