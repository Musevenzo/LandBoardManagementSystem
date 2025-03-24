<x-layouts.app title="Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gray-50">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Admin Dashboard</h2>
            <div class="relative">
                <button class="p-2 bg-white rounded-full shadow-md hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 bg-white rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                    <p class="text-2xl font-bold text-blue-600">1,234</p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l4 4h-3v6H7V6H4l4-4h4z"></path>
                    </svg>
                </div>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Total Applications</h3>
                    <p class="text-2xl font-bold text-green-600">567</p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Total Plots</h3>
                    <p class="text-2xl font-bold text-purple-600">89</p>
                </div>
                <div class="p-3 bg-purple-100 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4a5 5 0 005 5h4a5 5 0 005-5V3"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Notifications Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Notifications</h3>
            <div class="space-y-4">
                <!-- Notification 1 -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">New user registered: John Doe</p>
                        <p class="text-xs text-gray-500">2 minutes ago</p>
                    </div>
                </div>
                <!-- Notification 2 -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">Application approved: Plot 123</p>
                        <p class="text-xs text-gray-500">10 minutes ago</p>
                    </div>
                </div>
                <!-- Notification 3 -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">Application denied: Plot 456</p>
                        <p class="text-xs text-gray-500">1 hour ago</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Activity</h3>
            <div class="space-y-4">
                <!-- Activity 1 -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">New plot added: Plot 789</p>
                        <p class="text-xs text-gray-500">5 minutes ago</p>
                    </div>
                </div>
                <!-- Activity 2 -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">User updated: Jane Smith</p>
                        <p class="text-xs text-gray-500">15 minutes ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
