<x-layouts.app title="User  Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
         <!-- Main Content -->
         <div class="flex-1 p-6">
         <h1 class="text-2xl font-bold text-gray-900">Welcome to Your Dashboard</h1>
            <div class="flex space-x-4 mt-6">
                <a href="{{ route('user.applications.create') }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-300">New Application</a>
                <a href="{{ route('user.applications.index') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">View Application Status</a>
                <a href="#" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-300">Application History</a>
            </div>
        </div>
    </div>


        

        <!-- Notifications and Recent Activity can be added here -->
    </div>
</x-layouts.app>