@props(['active'])
@php
$classes = 'h-full flex place-items-center px-2 py-1 hover:underline';
$classes .= ($active ?? false)
            ? ' decoration-brand-mid underline'
            : ' decoration-secondary-mid';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
