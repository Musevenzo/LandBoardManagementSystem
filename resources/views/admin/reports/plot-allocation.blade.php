<x-layouts.app title="Plot Allocation Report">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-purple-50">
        <!-- Page Header -->
        <h1 class="text-2xl font-bold text-purple-800">Plot Allocation Report</h1>

        <!-- Plot Allocation Table -->
        <table class="w-full bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-purple-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-purple-800">Plot Number</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-purple-800">Location</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-purple-800">Allocated To</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-purple-800">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-purple-800">Date Allocated</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($plots as $plot)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $plot->plot_number }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $plot->location }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $plot->allocatedUser ? $plot->allocatedUser->name : 'Not Allocated' }}
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        <span class="px-2 py-1 rounded-full text-xs font-medium 
                            @if($plot->applications->isNotEmpty() && $plot->applications->first()->status === 'approved')
                                bg-green-100 text-green-800
                            @elseif($plot->applications->isNotEmpty() && $plot->applications->first()->status === 'pending')
                                bg-yellow-100 text-yellow-800
                            @else
                                bg-red-100 text-red-800
                            @endif">
                            {{ $plot->applications->isNotEmpty() ? ucfirst($plot->applications->first()->status) : 'Not Allocated' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $plot->applications->isNotEmpty() ? $plot->applications->first()->created_at->format('d M Y') : 'N/A' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-3 text-center text-sm text-gray-500">
                        No plot allocations found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $plots->links() }}
        </div>
    </div>
</x-layouts.app>