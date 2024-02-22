@props(['title','position'=>'left'])


<div class="sm:flex sm:items-center">
    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
        <div @click="open = ! open">
            <x-tiffey::nav.link class="items-center">
                {{ $title ?? '' }} &nbsp;

                <i class="fa-solid fa-angle-up" x-show="open"></i>
                <i class="fa-solid fa-angle-down" x-show="! open"></i>
            </x-tiffey::nav.link>
        </div>
    
        <div x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                style="display: none;"
                class="relative md:absolute z-0 {{ $position == 'right' ? '-right-0' : '' }} md:z-50 mt-0 md:mt-1 shadow-lg bg-white text-black dark:text-white dark:bg-black text-sm *:hover:bg-gray-100 *:dark:hover:bg-gray-900 {{ config('tiffey.rounded') }}">
            <div class="md:w-48 {{ config('tiffey.rounded') }} {{ $position == 'right' ? 'text-right' : '' }}">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>