<div x-data="{menuOpen: false}" @click.outside="menuOpen = false" class="relative">
    @isset($button)
        <div @click="menuOpen = !menuOpen">
            {{ $button }}
        </div>
        
    @endisset

    <div x-show="menuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            style="display: none;"
            class="absolute z-0 -right-0 -top-2 md:-top-3 md:z-50 mt-0 md:mt-1 shadow-lg bg-white text-black dark:text-white dark:bg-black text-sm {{ config('tiffey.app.rounded') }} ">
        <div class="{{ config('tiffey.app.rounded') }} flex flex-row gap-2 p-2">
            {{ $slot }}
            <span @click="menuOpen = false">
                <x-tiffey::button>
                    <x-tiffey::icon.close />
                </x-tiffey::button>
            </span>
            
        </div>
    </div>
</div>
