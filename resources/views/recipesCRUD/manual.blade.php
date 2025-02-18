<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800">{{ $title }}</h1>
        <p class="mt-4 text-gray-700">{{ $content }}</p>
    </div>
</x-app-layout>
