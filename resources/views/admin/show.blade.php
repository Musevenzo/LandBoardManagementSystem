<x-layouts.app title="View Application">
    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Application Details</h2>
        <p><strong>Applicant Name:</strong> {{ $application->user->name }}</p>
        <p><strong>Omang Number:</strong> {{ $application->omang_number }}</p>
        <p><strong>Location:</strong> {{ $application->location }}</p>
        <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
        <p><strong>Date Applied:</strong> {{ $application->created_at->format('Y-m-d') }}</p>
        <a href="{{ route('admin.applications.index') }}" class="mt-4 inline-block text-blue-600">Back to Applications</a>
    </div>
</x-layouts.app>