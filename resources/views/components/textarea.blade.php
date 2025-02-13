<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>
@props(['value', 'name'])

<div>
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        class="mt-1 block w-full rounded-md focus:border-[#B55D51] focus:ring-[#B55D51]"
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>

    {{-- Display errors for this field --}}
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>
