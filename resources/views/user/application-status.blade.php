<!-- resources/views/user/application-status.blade.php -->
<x-layouts.app title="Application Status">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-2xl font-bold text-gray-900">Your Application Status</h1>

        @if ($applications->isEmpty())
            <p class="text-gray-600">You have no applications yet.</p>
        @else
            <div class="space-y-4">
                @foreach ($applications as $application)
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $application->name }}</h2>
                        <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $application->email }}</p>
                        <p class="text-sm text-gray-600"><strong>Plot Location:</strong> {{ $application->plot_location }}</p>
                        <p class="text-sm text-gray-600"><strong>Status:</strong>
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if ($application->status === 'pending') bg-yellow-200 text-yellow-800
                                @elseif ($application->status === 'approved') bg-green-200 text-green-800
                                @elseif ($application->status === 'rejected') bg-red-200 text-red-800
                                @endif">
                                {{ ucfirst($application->status) }}
                            </span>
                        </p>
                        <p class="text-sm text-gray-600"><strong>Details:</strong> {{ $application->details ?? 'No details provided' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>