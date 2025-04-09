<x-layouts.app title="User Dashboard">
    <div class="flex h-screen w-full bg-gray-100">
        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Welcome to Your Dashboard</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('user.applications.create') }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-300">New Application</a>
                    <a href="{{ route('user.applications.index') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">View Application Status</a>
                    <a href="#" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-300">Application History</a>
                </div>
            </div>

            <!-- Recent Activity Card -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-bold mb-2">Recent Activity</h2>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Submitted new land application on {{ now()->format('F j, Y') }}</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.929 5.824 3 10 3s8.268 2.929 9.542 7C19.742 14.071 17.27 17 10 17s-9.742-2.929-11.542-7zM18 10c0 3.866-2.551 7-5.942 7a5.95 5.95 0 01-1.357-.357 2.652 2.652 0 00-3.197 0A5.95 5.95 0 013.058 10c0-3.866 2.551-7 5.942-7 1.306 0 2.468.357 3.197.843A2.65 2.65 0 0014.057 3a5.95 5.95 0 011.357.357C17.449 7.029 18 10 18 10z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Your application status has been updated</span>
                    </li>
                </ul>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold mb-2">Total Applications</h3>
                    <p class="text-2xl font-bold text-indigo-500">{{ $totalApplications ?? '0' }}</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold mb-2">Pending Applications</h3>
                    <p class="text-2xl font-bold text-yellow-500">{{ $pendingApplications ?? '0' }}</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold mb-2">Approved Applications</h3>
                    <p class="text-2xl font-bold text-green-500">{{ $approvedApplications ?? '0' }}</p>
                </div>
            </div>
        </main>
    </div>
</x-layouts.app>