<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div>
<x-app-layout>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <h2 class="text-2xl text-center font-semibold text-[#B55D51] mb-4">Update User</h2>
        <form method="POST" action="{{ route('manage-user.update', $user->id) }}" class="space-y-4">
            @csrf
            @method('PATCH')
            
            <!-- Username Input -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">User Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="User Name" 
                    value="{{ old('name', $user->name) }}" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#B55D51] focus:border-[#B55D51]"
                    required 
                    disabled
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
                    value="{{ old('email', $user->email) }}" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#B55D51] focus:border-[#B55D51]"
                    required 
                    disabled
                />
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role Select -->
            <div>
                <label for="ville" class="block text-sm font-medium text-gray-700">Role</label>
                <select 
                    name="role_id" 
                    id="role_id" 
                    class="mt-1 block w-full p-2 border border-[#B55D51] rounded-md shadow-sm focus:ring-[#B55D51] focus:border-[#B55D51] "
                    required
                >
                    <option value="2" {{ old('role_id', $user->utilisateur->role_id) == '2' ? 'selected' : '' }}>User</option>
                    <option value="1" {{ old('role_id', $user->utilisateur->role_id) == '1' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role_id')
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