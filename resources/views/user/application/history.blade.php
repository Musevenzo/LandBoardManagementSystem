<x-layouts.app title="Application History">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Application History</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted At</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($applications as $application)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $application->location }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $application->status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $application->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>