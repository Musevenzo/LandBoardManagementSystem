<x-layouts.app title="Plot Allocation Report">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-purple-50">
        <!-- Back to Reports Dashboard -->
        <a href="{{ route('admin.reports.index') }}" class="flex items-center text-purple-600 hover:text-purple-800 text-sm font-medium mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Reports Dashboard
        </a>

        <!-- Page Header -->
        <h1 class="text-2xl font-bold text-purple-800">Plot Allocation Report</h1>

        <!-- Filter Section -->
        <form method="GET" action="{{ route('admin.reports.plot-allocation') }}" class="mb-6 bg-white p-4 rounded-lg shadow-md border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Select Month</label>
                    <select name="month" id="month" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                        <option value="">All Months</option>
                        @foreach (range(1, 12) as $m)
                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">Select Year</label>
                    <select name="year" id="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                        <option value="">All Years</option>
                        @foreach (range(date('Y'), date('Y') - 10) as $y)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        Filter
                    </button>
                </div>
            </div>
        </form>

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
                        @if ($plot->user->name === 'Admin')
                            {{ 'Not Allocated' }}
                        @else
                            {{ $plot->user->name ?? 'Not Allocated' }}
                        @endif

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
                        No plot allocations found for the selected filters.
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