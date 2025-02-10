@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 bg-white border border-gray-800 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-800 hover:text-white  focus:bg-gray-800 active:bg-gray-900 focus:outline-none transition ease-in-out duration-150'
            : 'inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</a>
