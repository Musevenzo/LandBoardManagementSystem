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
                        <h2 class="text-lg font-semibold text-gray-800">{{ $application->user->name }}</h2>
                        <p class="text-sm text-gray-600"><strong>Prefered Location:</strong> {{ $application->location }}</p>
                        <p class="text-sm text-gray-600"><strong>Omang Number:</strong> {{ $application->omang_number ?? 'None' }}</p>
                        <p class="text-sm text-gray-600"><strong>Village:</strong> {{ $application->village ?? 'None' }}</p>
                        <p class="text-sm text-gray-600"><strong>Status:</strong>
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if ($application->status === 'pending') bg-bg-orange-200 text-blue-800
                                @elseif ($application->status === 'approved') bg-green-200 text-green-800
                                @elseif ($application->status === 'rejected') bg-white-300 text-red-800
                                @endif">
                                {{ ucfirst($application->status) }}
                            </span>
                        </p>
                        <!-- Edit Button -->
                          @if ($application->status === 'pending')
                           <a href="{{ route('user.edit-application', $application->id) }}"
                          class="mt-2 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                         Edit Submitted Application
                          </a>
                          @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>