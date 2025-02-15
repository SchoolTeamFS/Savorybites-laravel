<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
        <p class="text-2xl font-bold text-[#B55D51] text-center mb-6">
            Welcome! Join us to enjoy delicious meals and fun recipes!
        </p>
        
        <div class="flex bg-white p-8 rounded-lg shadow-lg w-3/4 max-w-4xl">
            <!-- Image Section -->
            <div class="w-1/2 hidden md:block mt-20">
                <img src="{{ asset('../../../images/login.jpg') }}" alt="Register" class="rounded-lg shadow-md">
            </div>
            
            <!-- Form Section -->
            <div class="w-full md:w-1/2 px-6 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-center mb-6">Sign Up</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B55D51] shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B55D51] shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B55D51] shadow-sm" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B55D51] shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Agree to Terms -->
                    <div class="block mt-4">
                        <label for="terms" class="inline-flex items-center">
                            <input id="terms" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="terms" required>
                            <span class="ms-2 text-sm text-gray-600">{{ __('I agree to the terms & conditions') }}</span>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="w-full bg-[#B55D51] text-white font-bold py-2 rounded-lg hover:bg-[#a44c42] transition mt-6">
                        {{ __('Sign up') }}
                    </button>

                    <!-- Login Link -->
                    <div class="flex items-center justify-end mt-2">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('login') }}">
                            {{ __('Already registered? Log in') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
