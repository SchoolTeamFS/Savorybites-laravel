<x-app-layout>
    <div class="relative mr-24 my-8 float-right z-50">
        <a href="{{ route('manage-user.add') }}" class="cursor-pointer">
            <div class="min-w-[220px] m-2 rounded-[12px] text-white bg-[#b66055d9] border border-[#b66055d9] shadow-lg hover:-translate-y-1 hover:shadow-2xl transition duration-300">
                <div class="flex items-center justify-between p-4">
                    <h3 class="text-lg font-semibold">Add User</h3>
                    <p class="text-2xl"><i class="fa-solid fa-plus"></i></p>
                </div>
            </div>
        </a>
    </div>  
    <!-- Search Input -->
    <div class="relative mb-4">
        <input 
            type="text" 
            id="searchuser" 
            placeholder="Search..." 
            class="w-[400px] mt-[100px] ml-[250px] p-2 border border-[#B55D51] rounded-md focus:ring-[#B55D51] focus:border-[#B55D51]"
        />
    </div>

    <!-- Users -->
    <h1 class="text-2xl font-bold my-5">Users List</h1>
    
    <!-- Users List - This div will be updated via AJAX -->
    <div id="usersTable">
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
                            <button class="m-1 p-2 rounded-lg cursor-pointer bg-[#b1ec83] text-white hover:bg-[#bebe3276]">
                                Update
                            </button>
                        </a>
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('manage-user.destroy', $user->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-1 p-2 rounded-lg cursor-pointer bg-[#b55d51] text-white hover:bg-[#be433276]">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- AJAX Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('searchuser');
            const usersTable = document.getElementById('usersTable');
    
            if (!searchInput || !usersTable) {
                console.error("Search input or users table not found!");
                return;
            }
    
            searchInput.addEventListener('input', function () {
                let searchQuery = this.value.trim();
    
                fetch("{{ route('manage-users') }}?search=" + encodeURIComponent(searchQuery), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.html) {
                        usersTable.innerHTML = data.html; 
                    }
                })
                .catch(error => console.error('Error fetching users:', error));
            });
        });
    </script>
</x-app-layout>
