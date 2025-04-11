<?php
    $approved = "approved";
    $rejected = "rejected";
?>
<x-layouts.app title="Application History">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-6">Application History</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold mb-2">Total Applications</h3>
                <p class="text-2xl font-bold text-indigo-500">{{ $totalApplications }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold mb-2">Approved Applications</h3>
                <p class="text-2xl font-bold text-green-500">{{ $approvedApplications }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold mb-2">Rejected Applications</h3>
                <p class="text-2xl font-bold text-red-500">{{ $rejectedApplications }}</p>
            </div>
        </div>

        @if ($applications->isEmpty())
            <p class="text-gray-600">You have not made any applications yet.</p>
        @else
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($applications as $application)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $application->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium
                                        @if ($application->status === 'pending') bg-yellow-200 text-yellow-800
                                        @elseif ($application->status === 'approved') bg-green-200 text-green-800
                                        @elseif ($application->status === 'rejected') bg-red-200 text-red-800
                                        @endif">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $application->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layouts.app>