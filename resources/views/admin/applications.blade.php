<x-layouts.app title="Land Applications">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h2 class="text-2xl font-bold">APPLICATIONS MANAGEMENT</h2>
        </div>
        
        <!-- Search/Filter Section -->
        <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-sm bg-white">
            <h3 class="text-lg font-semibold mb-2">Filter Applications</h3>
            <form action="{{ route('admin.applications.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <!-- Search Field Dropdown -->
                <div class="w-full md:w-1/4">
                    <label for="searchField" class="block text-sm font-medium text-gray-700 mb-1">Search by</label>
                    <select id="searchField" name="field" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="id" {{ request('field') == 'id' ? 'selected' : '' }}>Application ID</option>
                        <option value="applicant" {{ request('field') == 'applicant' ? 'selected' : '' }}>Applicant Name</option>
                        <option value="omang" {{ request('field') == 'omang' ? 'selected' : '' }}>Omang Number</option>
                        <option value="location" {{ request('field') == 'location' ? 'selected' : '' }}>Location</option>
                    </select>
                </div>
                
                <!-- Search Input -->
                <div class="w-full md:w-3/4">
                    <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-1">Search term</label>
                    <div class="flex">
                        <input 
                            type="text" 
                            id="searchInput"
                            name="search"
                            value="{{ request('search') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter search term..." 
                        />
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700">
                            Search
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Status Filter -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Filter by status</label>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.applications.index', ['status' => 'pending']) }}" 
                       class="px-3 py-1 rounded-full {{ request('status') == 'pending' ? 'bg-yellow-600 text-white' : 'bg-yellow-100 text-yellow-800' }}">
                        Pending
                    </a>
                    <a href="{{ route('admin.applications.index', ['status' => 'approved']) }}" 
                       class="px-3 py-1 rounded-full {{ request('status') == 'approved' ? 'bg-green-600 text-white' : 'bg-green-100 text-green-800' }}">
                        Approved
                    </a>
                    <a href="{{ route('admin.applications.index', ['status' => 'rejected']) }}" 
                       class="px-3 py-1 rounded-full {{ request('status') == 'rejected' ? 'bg-red-600 text-white' : 'bg-red-100 text-red-800' }}">
                        Rejected
                    </a>
                    <a href="{{ route('admin.applications.index') }}" 
                       class="px-3 py-1 rounded-full {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        All Applications
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Applications Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">App ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Applicant Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Omang Number</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Location</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date Applied</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($applications as $application)
                        <tr class="hover:bg-blue-50 {{ $loop->even ? 'bg-blue-100' : '' }}">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $application->id }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $application->user->name }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $application->omang_number }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $application->location }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $application->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    {{ $application->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                      ($application->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.applications.show', $application->id) }}" class="text-blue-600 hover:text-blue-800 mr-2">View</a>
                                <a href="{{ route('admin.applications.edit', $application->id) }}" class="text-yellow-600 hover:text-yellow-800 mr-2">Review</a>
                                <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" 
                                            onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No applications found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $applications->links() }}
        </div>
    </div>
</x-layouts.app>