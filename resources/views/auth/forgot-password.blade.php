<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="mb-4 text-[#B55D51] font-bold">
                {{ __('Password Reset ') }}
            </h1>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-secondary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
