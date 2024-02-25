@props(['noPadding'=>false,'open'=>true,'collapsible'=>false])
<div 
    class="inset-0 overflow-y-auto p-6 z-40" 
    x-data="{ modal: @entangle($attributes->wire('model')) }" 
    x-show="modal" 
    x-on:keydown.escape.window="modal = false"
    >
    <div class="relative w-full h-full max-w-4xl md:h-auto">
        <div class="fixed inset-0 transform" x-on:click="modal = false">
            <div class="absolute inset-0 bg-gray-700 bg-opacity-75" >
                <div class="z-50 opacity-100 max-w-2xl mx-auto my-2 md:mt-[10vh] shadow-xl max-h-[75vh] overflow-y-auto" @click.stop="">
                    <x-tiffey::card :attributes="$attributes->merge(['class'=>'!bg-opacity-100'])" inModal="true">
                        @if (isset($header))
                            <x-slot:header>{{ $header }}</x-slot>
                        @endif
                        @if (isset($subtitle))
                        <x-slot:subtitle>{{ $subtitle }}</x-slot>
                        @endif
                        @if (isset($footerActions))
                        <x-slot:footerActions>{{ $footerActions }}</x-slot>
                        @endif
                        <x-slot:actions>
                            @if(isset($actions))
                            {{ $actions }}
                            @endif
                            <div class="hover:cursor-pointer h-full ml-2 my-auto" @click="modal = !modal">
                                <i class="fa-solid fa-xmark" aria-label="Close" title="Close"></i>
                            </div>
                        </x-slot>
                        {{ $slot }}
                    </x-tiffey::card>
                </div>
            </div>
        </div>
    </div>
</div>