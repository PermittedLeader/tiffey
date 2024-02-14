@props(['title'])


<div class="sm:flex sm:items-center sm:ml-6">
    <div class="relative" x-data="{ open: false }">
        <div @click="open = ! open">
            <x-tiffey::nav.link class="items-center">
                <span class="mr-2 whitespace-nowrap">{{ $title ?? '' }}</span>

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
                class="relative md:absolute z-0 md:z-50 mt-0 md:mt-1 shadow-lg bg-white dark:bg-black">
            <div class="md:rounded-md md:w-96">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>