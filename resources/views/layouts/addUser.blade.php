<div>
    <!-- He who is contented is rich. - Laozi -->
</div>
<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div>
<x-app-layout>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h2 class="text-2xl text-center font-semibold text-[#B55D51] mb-4">Update User</h2>
        <form method="POST" action="{{ route('manage-user.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">User Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="User Name" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#B55D51] focus:border-[#B55D51]"
                    required 
                />
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Email"  
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#B55D51] focus:border-[#B55D51]"
                    required 
                />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Password"  
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#B55D51] focus:border-[#B55D51]"
                    required 
                />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role Select -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select 
                    name="role" 
                    id="role" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#B55D51] focus:border-[#B55D51] "
                    required
                >
                    <option value="2">User</option>
                    <option value="1" >Admin</option>
                </select>
                @error('role')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Error Message -->
            @if(session('error'))
                <p class="mt-2 text-sm text-red-600">{{ session('error') }}</p>
            @endif

            <!-- Submit Button -->
            <x-secondary-button type="submit">
                Save
            </x-secondary-button>
        </form>

    </div>
</x-app-layout>