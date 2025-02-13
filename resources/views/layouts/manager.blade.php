<x-app-layout>
    {{ $users }}
    <!-- Top Active Users -->
    <h1 class="text-2xl font-bold my-5">Top Active Users</h1>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg p-5">
        <table class="w-full text-left border-collapse border border-gray-300 text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border border-gray-300">Name</th>
                    <th class="p-3 border border-gray-300">Email</th>
                    <th class="p-3 border border-gray-300">Role</th>
                    <th class="p-3 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover:bg-gray-100">
                    <td class="p-3 border border-gray-300">{{ $user->utilisateur->username }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->email }}</td>
                    <td class="p-3 border border-gray-300">{{ $user->utilisateur->role->name }}</td>
                    <td class="p-3 border border-gray-300">
                        <!-- Update Button -->
                        <a href="{{ route('manage-user.edit', $user->id) }}">
                            <button class="m-1 p-2 rounded-lg cursor-pointer bg-[#bebe3276] text-white hover:bg-[#bebe3276]">
                                Update
                            </button>
                        </a>
                    
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('manage-user.destroy', $user->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-1 p-2 rounded-lg cursor-pointer bg-[#be433276] text-white hover:bg-[#be433276]">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
