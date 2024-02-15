@props(['active'])
@php
$classes = ($active ?? false)
            ? 'not-decorated flex w-screen md:w-auto px-3 py-3 md:px-1 md:mx-2 md:my-3 md:py-0 text-sm text-black dark:text-white md:text-gray-900 border-l-2 md:border-b-2 md:border-l-0 border-transparent md:border-grey-mid transition duration-150 ease-in-out bg-brand-mid'
            : 'not-decorated flex w-screen md:w-auto px-3 py-3 md:px-1 md:mx-2 md:my-3 md:py-0 text-sm text-black dark:text-white hover:text-gray-900 dark:hover:text-gray-100 border-l-2 md:border-b-2 md:border-l-0 border-transparent hover:border-gray-mid transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>