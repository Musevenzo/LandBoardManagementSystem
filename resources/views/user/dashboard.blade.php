<x-layouts.app title="User Dashboard">
    <div class="flex h-screen w-full bg-gray-100">
        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Welcome to Your Dashboard</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('user.applications.create') }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-300">New Application</a>
                    <a href="{{ route('user.applications.index') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-300">View Application Status</a>
                    <a href="{{ route('user.application.history') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-300">Application History</a>
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

            <!-- Notifications Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Your Application Notifications</h2>
                    @if($unreadNotificationsCount > 0)
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                        {{ $unreadNotificationsCount }} New
                    </span>
                    @endif
                </div>
                
                <div class="space-y-3">
                    @forelse($notifications as $notification)
                    <div class="flex items-start p-4 rounded-lg border 
                        @if($notification->data['status'] === 'approved') bg-green-50 border-green-100
                        @elseif($notification->data['status'] === 'rejected') bg-red-50 border-red-100
                        @else bg-blue-50 border-blue-100 @endif">
                        <div class="flex-shrink-0 p-2 rounded-lg 
                            @if($notification->data['status'] === 'approved') bg-green-100 text-green-600
                            @elseif($notification->data['status'] === 'rejected') bg-red-100 text-red-600
                            @else bg-blue-100 text-blue-600 @endif">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if($notification->data['status'] === 'approved')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                @elseif($notification->data['status'] === 'rejected')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                @endif
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">
                                @if($notification->data['status'] === 'approved')
                                Your application for Plot {{ $notification->data['plot_number'] }} has been approved!
                                @elseif($notification->data['status'] === 'rejected')
                                Your application for Plot {{ $notification->data['plot_number'] }} was rejected
                                @else
                                Application for Plot {{ $notification->data['plot_number'] }} is being processed
                                @endif
                            </p>
                            <p class="text-xs @if($notification->data['status'] === 'approved') text-green-600 @elseif($notification->data['status'] === 'rejected') text-red-600 @else text-blue-600 @endif">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                            @if($notification->data['status'] === 'rejected' && isset($notification->data['reason']))
                            <p class="text-xs text-gray-600 mt-1">
                                <span class="font-medium">Reason:</span> {{ $notification->data['reason'] }}
                            </p>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-500">No notifications yet.</p>
                    </div>
                    @endforelse
                </div>
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