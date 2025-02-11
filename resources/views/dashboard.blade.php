<x-app-layout>
    
    <div class="m-5">
        <h1 class="text-2xl font-bold">Welcome {{ Auth::user()->role }} {{ Auth::user()->name }}!</h1>
        <!-- Totals Section -->
        <div class="flex flex-wrap justify-center gap-10 my-5">
            <div class="w-80 p-5 rounded-lg bg-[#B55D51] text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Users</h3>
                        <h2 class="text-3xl font-bold">{{ $totalUsers }}</h2>
                    </div>
                    <p class="text-5xl"><i class="pi pi-users"></i></p>
                </div>
            </div>
            <div class="w-80 p-5 rounded-lg bg-[#B55D51] text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Comments</h3>
                        <h2 class="text-3xl font-bold">{{ $totalComments }}</h2>
                    </div>
                    <p class="text-5xl"><i class="la la-comments"></i></p>
                </div>
            </div>
        </div>

        <!-- Ratings Section -->
        <h1 class="text-2xl font-bold my-5">Ratings</h1>
        <div class="flex justify-center">
            <div class="grid md:grid-cols-3 gap-5 w-full max-w-6xl">
                <!-- Empty columns to push content into the second column -->
                <div></div>
                <div class="bg-white p-5 shadow-lg rounded-xl hover:shadow-xl transform hover:-translate-y-1 transition">
                    <h2 class="text-xl font-semibold">Recipes Average Rating</h2>
                    <div class="relative w-32 h-32 mx-auto">
                        <p class="text-center text-xl font-bold">{{ $averageRating }}</p>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-4 ">
                        @foreach ($categoryRatings as $stat)
                            <div class="flex items-center gap-4 my-1">
                                <div class="w-5 h-5 rounded" style="background-color: {{ $stat['color'] }}"></div>
                                <p>{{ $stat['category'] }} - {{ $stat['percentage'] * 100 }}%</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Active Users -->
        <h1 class="text-2xl font-bold my-5">Top Active Users</h1>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-5">
            <table class="w-full text-left border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3 border border-gray-300">Name</th>
                        <th class="p-3 border border-gray-300">Email</th>
                        <th class="p-3 border border-gray-300">Comments</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topActiveUsers as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3 border border-gray-300">{{ $user['username'] }}</td>
                        <td class="p-3 border border-gray-300">{{ $user['email'] }}</td>
                        <td class="p-3 border border-gray-300">{{ $user['commentCount'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
