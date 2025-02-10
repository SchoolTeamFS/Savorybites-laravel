<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
        <p class="text-2xl font-bold text-[#B55D51] text-center mb-6">
            Welcome back! Log in to continue enjoying delicious meals and fun recipes!
        </p>
        
        <div class="flex bg-white p-8 rounded-lg shadow-lg w-3/4 max-w-4xl">
            <!-- Image Section -->
            <div class="w-1/2 hidden md:block">
                <img src="{{ asset('path-to-your-image.jpg') }}" alt="Login" class="rounded-lg shadow-md">
            </div>
            
            <!-- Form Section -->
            <div class="w-full md:w-1/2 px-6 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-center mb-6">Log in</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B55D51] shadow-sm">
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#B55D51] shadow-sm">
                    </div>
                    @if ($errors->any())
                        <p class="text-red-500 text-sm mb-4">{{ $errors->first() }}</p>
                    @endif
                     <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-[#B55D51] text-white font-bold py-2 rounded-lg hover:bg-[#a44c42] transition">Log in</button>
                    <div class="flex items-center justify-end mt-2">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('register') }}" class="text-[#B55D51] text-right mt-4 block font-semibold">Sign Up</a>
            </div>
        </div>
    </div>
</x-app-layout>
