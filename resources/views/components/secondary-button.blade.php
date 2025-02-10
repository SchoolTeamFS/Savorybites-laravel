<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-[#B55D51] text-white font-bold py-2 rounded-lg hover:bg-[#a44c42] transition mt-6']) }}>
    {{ $slot }}
</button>
