@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#B55D51] text-sm font-medium leading-5 text-[#B55D51] focus:outline-none focus:border-[#B55D51] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-[#B55D51] hover:border-[#B55D51] focus:outline-none focus:text-[#B55D51] focus:border-[#B55D51] transition duration-150 ease-in-out';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
