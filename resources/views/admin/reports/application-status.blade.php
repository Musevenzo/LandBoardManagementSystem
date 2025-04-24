<x-layouts.app title="Application Status Report">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-2xl font-bold text-green-800">Application Status Report</h1>

        <table class="w-full bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-green-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-green-800">Applicant</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-green-800">Plot</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-green-800">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-green-800">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($applications as $application)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $application->user->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $application->plot->plot_number ?? 'N/A' }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ ucfirst($application->status) }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $application->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $applications->links() }}
        </div>
    </div>
</x-layouts.app>