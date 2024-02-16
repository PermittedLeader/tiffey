@props(['open'=>true,'collapsible'=>false, 'inModal'=>false])
<div 
    class="flex flex-col bg-white dark:bg-gray-900 {{ config('tiffey.rounded') }} border-solid {{ config('tiffey.card-border') }} {{ $inModal ? '' : 'mt-2 shadow-xl dark:shadow-none dark:border-2 dark:border-gray-700  mb-4' }}"
    x-data="{ cardShow: {{ $open == "true" ? "true" : "false" }} }">
    @if(isset($header)||isset($actions))
        <div class="flex flex-col md:flex-row py-1 px-2 border-solid border-b {{ config('tiffey.border-color') }} justify-between"
        @if($collapsible)
            @click="cardShow = !cardShow"
        @endif>
            @if(isset($header))
                <div class="my-auto">
                    <h2 class="lext-lg font-bold">
                        @if($collapsible)
                            <i class="mr-2 fas" :class="cardShow ? 'fa-chevron-down' : 'fa-chevron-right'" aria-hidden="true"></i>
                            <span class="fa-sr-only">Show/Hide</span>
                        @endif
                        {{ $header }}
                        
                    </h2>
                    @if (isset($subtitle))
                        <div class="text-sm">
                            {{ $subtitle }}
                        </div>
                    @endif
                </div>
            @endif
            @if(isset($actions))
                <div class="flex flex-row gap-2 my-auto" x-show="cardShow" @click.stop >
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif
    <div class="py-2 px-3 grow" x-show="cardShow">
        {{ $slot }}
    </div>
    @if(isset($footerActions))
    <div class="flex flex-col md:flex-row justify-end gap-2 py-1 px-2 border-t {{ config('tiffey.border-color') }}" x-show="cardShow">
        {{ $footerActions }}
    </div>
    @endif
</div>