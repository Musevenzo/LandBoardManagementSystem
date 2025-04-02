<x-layouts.app title="Application Status">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Application Status</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($applications as $application)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $application->location }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $application->status }}</td> <!-- Assuming you have a status field -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>