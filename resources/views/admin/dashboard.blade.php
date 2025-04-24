<x-layouts.app title="Admin Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
        <!-- Page Header with Logo -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.PNG') }}" alt="eLAND Botswana Logo" class="h-12 w-auto rounded-lg border-2 border-blue-100 shadow-sm">
                <div>
                    <p class="text-sm text-blue-600 font-medium">WELCOME BACK {{ auth()->user()->name }}</p>
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
                    <p class="text-3xl font-bold text-blue-600">{{ $total_users }}</p>
                    <p class="text-xs text-blue-500 mt-1">{{ $total_users > 0 ? '↑' : '↓' }} from last month</p>
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
                    <p class="text-3xl font-bold text-green-600">{{ $total_applications }}</p>
                    <p class="text-xs text-green-500 mt-1">{{ $total_applications > 0 ? '↑' : '↓' }} from last month</p>
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
                    <p class="text-3xl font-bold text-purple-600">{{ $total_plots }}</p>
                    <p class="text-xs text-purple-500 mt-1">{{ $total_plots > 0 ? '↑' : '↓' }} from last month</p>
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
        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">{{ $pending_applications }} Pending</span>
    </div>
    <div class="space-y-3">
        <!-- Render dynamic notifications here -->
        @if(isset($recentApplications) && count($recentApplications) > 0)
            @foreach($recentApplications as $application)
            <div class="flex items-center p-4 bg-{{ $application->status === 'approved' ? 'green' : ($application->status === 'rejected' ? 'red' : 'blue') }}-50/50 rounded-lg border border-{{ $application->status === 'approved' ? 'green' : ($application->status === 'rejected' ? 'red' : 'blue') }}-100 hover:bg-{{ $application->status === 'approved' ? 'green' : ($application->status === 'rejected' ? 'red' : 'blue') }}-100/30 transition-colors">
                <div class="flex-shrink-0 p-2 bg-{{ $application->status === 'approved' ? 'green' : ($application->status === 'rejected' ? 'red' : 'blue') }}-100 rounded-lg">
                    <svg class="w-5 h-5 text-{{ $application->status === 'approved' ? 'green' : ($application->status === 'rejected' ? 'red' : 'blue') }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($application->status === 'approved')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        @elseif($application->status === 'rejected')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        @endif
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700">
                        @if($application->status === 'approved')
                            You have approved {{ $application->user->name }}'s application for Plot #{{ $user->plot->plot_number ?? 'N/A' }} at {{ $application->plot->location_name ?? 'N/A' }}.
                        @elseif($application->status === 'rejected')
                            You have rejected {{ $application->user->name }}'s application for Plot #{{ $application->plot->plot_number ?? 'N/A' }} at {{ $application->plot->location_name ?? 'N/A' }}.
                        @else
                            New application from {{ $application->user->name }} for Plot #{{ $application->plot->plot_number ?? 'N/A' }} at {{ $application->plot->location_name ?? 'N/A' }}.
                        @endif
                    </p>
                    <p class="text-xs text-{{ $application->status === 'approved' ? 'green' : ($application->status === 'rejected' ? 'red' : 'blue') }}-600 font-medium">
                        {{ $application->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            @endforeach
        @else
            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-500">No recent applications found.</p>
            </div>
        @endif
    </div>
</div>

        <!-- Footer -->
        <footer class="mt-auto text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} eLAND Botswana. All rights reserved.
        </footer>
    </div>
</x-layouts.app>