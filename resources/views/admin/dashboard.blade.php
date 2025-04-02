<x-layouts.app title="Admin Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
        <!-- Page Header with Logo -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.PNG') }}" alt="eLAND Botswana Logo" class="h-12 w-auto rounded-lg border-2 border-blue-100 shadow-sm">
                <div>
                    <p class="text-sm text-blue-600 font-medium">WELCOME BACK </p>
                </div>
            </div>
            <div class="relative">
                <!-- Notification bell or other header content can go here -->
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Users Card -->
            <div class="p-6 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow-md border border-blue-100 flex items-center justify-between transition-all hover:shadow-lg hover:-translate-y-1">
                <div>
                    <h3 class="text-lg font-semibold text-blue-800">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">1,234</p>
                    <p class="text-xs text-blue-500 mt-1">↑ 12% from last month</p>
                </div>
                <div class="p-3 bg-blue-100/50 rounded-xl border border-blue-200">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l4 4h-3v6H7V6H4l4-4h4z"></path>
                    </svg>
                </div>
            </div>

            <!-- Total Applications Card -->
            <div class="p-6 bg-gradient-to-br from-white to-green-50 rounded-xl shadow-md border border-green-100 flex items-center justify-between transition-all hover:shadow-lg hover:-translate-y-1">
                <div>
                    <h3 class="text-lg font-semibold text-green-800">Total Applications</h3>
                    <p class="text-3xl font-bold text-green-600">567</p>
                    <p class="text-xs text-green-500 mt-1">↑ 8% from last month</p>
                </div>
                <div class="p-3 bg-green-100/50 rounded-xl border border-green-200">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Total Plots Card -->
            <div class="p-6 bg-gradient-to-br from-white to-purple-50 rounded-xl shadow-md border border-purple-100 flex items-center justify-between transition-all hover:shadow-lg hover:-translate-y-1">
                <div>
                    <h3 class="text-lg font-semibold text-purple-800">Total Plots</h3>
                    <p class="text-3xl font-bold text-purple-600">89</p>
                    <p class="text-xs text-purple-500 mt-1">↑ 5% from last month</p>
                </div>
                <div class="p-3 bg-purple-100/50 rounded-xl border border-purple-200">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4a5 5 0 005 5h4a5 5 0 005-5V3"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Notifications Section -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800 bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                    Notifications
                </h3>
                <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">3 New</span>
            </div>
            <div class="space-y-3">
                <!-- Notification 1 -->
                <div class="flex items-center p-4 bg-blue-50/50 rounded-lg border border-blue-100 hover:bg-blue-100/30 transition-colors">
                    <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">New user registered: John Doe</p>
                        <p class="text-xs text-blue-600 font-medium">2 minutes ago</p>
                    </div>
                </div>
                
                <!-- Notification 2 -->
                <div class="flex items-center p-4 bg-green-50/50 rounded-lg border border-green-100 hover:bg-green-100/30 transition-colors">
                    <div class="flex-shrink-0 p-2 bg-green-100 rounded-lg">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">Application approved: Plot 123</p>
                        <p class="text-xs text-green-600 font-medium">10 minutes ago</p>
                    </div>
                </div>
                
                <!-- Notification 3 -->
                <div class="flex items-center p-4 bg-red-50/50 rounded-lg border border-red-100 hover:bg-red-100/30 transition-colors">
                    <div class="flex-shrink-0 p-2 bg-red-100 rounded-lg">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">Application denied: Plot 456</p>
                        <p class="text-xs text-red-600 font-medium">1 hour ago</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4 bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                Recent Activity
            </h3>
            <div class="space-y-3">
                <!-- Activity 1 -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100 hover:bg-gray-100 transition-colors">
                    <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">New plot added: Plot 789</p>
                        <p class="text-xs text-gray-500">5 minutes ago</p>
                    </div>
                    <div class="ml-auto px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                        New
                    </div>
                </div>
                
                <!-- Activity 2 -->
                <div class="flex items-center p-4 bg-gray-50 rounded-lg border border-gray-100 hover:bg-gray-100 transition-colors">
                    <div class="flex-shrink-0 p-2 bg-green-100 rounded-lg">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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