@props(['color'=>false, 'size'=>"md"])
@php
    if($color){
        $text = contrastColor(cssToHex($color)); 
    } else {
        $color = "bg-gray-100";
        $text = contrastColor(cssToHex($color));
    }
    switch ($size) {
        case 'sm':
            $sizeClasses = "px-2 py-1 text-sm";
            break;
            
        case 'xs':
            $sizeClasses = "px-2 py-1 text-xs";
            break;
        
        default:
            $sizeClasses = "px-3 py-2 text-sm";
            break;
    }
@endphp
    <div {{ $attributes->merge(['class'=>'relative data-[loading]:pointer-events-none inline-block my-auto text-center '.config('tiffey.rounded').' hover:bg-opacity-75 hover:shadow-inner font-bold dark:border dark:border-'.$text.' text-'.$text.' '.$color.' '.$sizeClasses]) }} role="button" wire:loading.attr="data-loading"> 
        <div class="[[data-loading]>&]:opacity-0 transition-opacity delay-200">
            {{ $slot }}
        </div>
        
        <div class="[[data-loading]>&]:opacity-100 transition-opacity delay-200 opacity-0 absolute inset-0 flex items-center justify-center">
            <x-tiffey::icon.loading />
        </div>
    </div>
