<x-layouts.app title="User Activity Report">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-2xl font-bold text-blue-800">User Activity Report</h1>

        <!-- Filter Section -->
        <form method="GET" action="{{ route('admin.reports.user-activity') }}" class="mb-6 bg-white p-4 rounded-lg shadow-md border border-gray-200">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Select Month</label>
                    <select name="month" id="month" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
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
                    <select name="year" id="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="">All Years</option>
                        @foreach (range(date('Y'), date('Y') - 10) as $y)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Filter
                    </button>
                </div>
            </div>
        </form>

        <!-- User Activity Table -->
        <table class="w-full bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Date Joined</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $user->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-4 py-3 text-center text-sm text-gray-500">
                        No user activity found for the selected filters.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layouts.app>