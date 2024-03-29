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
    $buttonClasses = 'inline-block my-auto text-center '.config('tiffey.rounded').' font-bold dark:border dark:border-opacity-25 dark:border-'.$text.' text-'.$text.' '.$color.' '.$sizeClasses;
    if(!$attributes->has('disabled')){
        $buttonClasses .= " hover:bg-opacity-75 hover:shadow-inner";
    }
@endphp
<a {{ $attributes->whereStartsWith('href') }} {{ $attributes->wire('click') }} {{ $attributes->whereDoesntStartWith(['href','wire:click'])->merge(['class'=>$buttonClasses]) }} role="button">
        {{ $slot }}
</a>
