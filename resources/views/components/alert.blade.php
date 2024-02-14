@props(['level'=>'warning','size'=>'md','dismissable'=>false])
@php
    $level;
        if ($level == 'success') {
            $classes = 'border-success-500 bg-success-200 text-black';
            $icon = 'fas fa-check fa-2x fa-fw text-success-500';
            $buttonStyle = 'bg-success-700 text-success-200';
        } elseif ($level == 'info') {
            $classes = 'border-info-500 bg-info-200 text-black';
            $icon = 'fas fa-info fa-2x fa-fw text-info-500';
            $buttonStyle = 'bg-info-700 text-info-200';
        } elseif ($level == 'warning') {
            $classes = 'border-warning-500 bg-warning-200 text-black';
            $icon = 'fas fa-exclamation fa-2x fa-fw text-warning-500';
            $buttonStyle = 'bg-warning-700 text-warning-200';
        } elseif ($level == 'danger') {
            $classes = 'border-danger-500 bg-danger-200 text-black';
            $icon = 'fas fa-times fa-2x fa-fw text-danger-500';
            $buttonStyle = 'bg-danger-700 text-danger-200';
        }
        $dismissable = $dismissable;
        $size = $size;
        if ($size == 'sm') {
            $classes .= ' text-xs my-1 px-2 py-2 border-l-4';
        } elseif ($size == 'md') {
            $classes .= ' my-3 px-3 py-2 border-l-8';
        }
@endphp
<div x-data="{open: true}" class="border-solid rounded-sm {{ $classes }}" x-show="open" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-0" role="alert">
    <div class="flex flex-row">
        <div class="flex-grow">
            <div class="flex flex-col h-full">
                @if (isset($header))
                <h5 class="font-bold">
                    {{ ucfirst($header) }}
                </h5>
                @endif
                
                <div class="my-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @if (isset($actions))
            <div class="text-right mx-2 place-self-center">
                {{ $actions }}
            </div>
        @endif
        <div class="text-right">
            <div class="flex h-full justify-end">
                <div class="my-auto text-right">
                    <x-icon icon="{{ $icon }}" label="{{ $level }}" />
                </div>
                @if($dismissable)
                <div class="ml-3" x-on:click='open = !open' role="button">
                    <span class="cursor-pointer">
                        <svg class="h-3 w-3 rounded-sm {{ $buttonStyle }} hover:bg-opacity-75 hover:shadow-inner" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">{{ __('Close') }}</span>
                    </span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
