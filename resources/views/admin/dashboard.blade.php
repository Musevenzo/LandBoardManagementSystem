<x-layouts.app title="User  Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
         <!-- Main Content -->
         <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Welcome to Your Dashboard</h1>
            <div class="flex space-x-4 mt-6">
                <a href="#" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-300">New Application</a>
                <a href="#" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">View Application Status</a>
                <a href="#" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-300">Application History</a>
            </div>
        </div>
    </div>


        <!-- Quick Actions -->
        <div class="flex gap-4 mb-6">
            <a href="#" class="p-4 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 transition">New Application</a>
            <a href="#" class="p-4 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition">View Application Status</a>
            <a href="#" class="p-4 bg-purple-600 text-white rounded-lg shadow-md hover:bg-purple-700 transition">Application History</a>
        </div>

        <!-- Notifications and Recent Activity can be added here -->
    </div>
</x-layouts.app>