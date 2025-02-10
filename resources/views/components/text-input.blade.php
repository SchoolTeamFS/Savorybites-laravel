@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#B55D51] focus:ring-[#B55D51] rounded-md shadow-sm']) !!}>
