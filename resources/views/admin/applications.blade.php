<x-layouts.app title="Land Applications">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 sm:p-6 rounded-xl bg-white/50 dark:bg-gray-800/20 backdrop-blur-sm">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pb-6 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-emerald-600 dark:from-blue-400 dark:to-emerald-400">
                    APPLICATIONS MANAGEMENT
                </span>
            </h2>
        </div>
        
        <!-- Search/Filter Section -->
        <div class="mb-6 p-6 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm bg-white dark:bg-gray-800 transition-all duration-200 hover:shadow-md">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Filter Applications</h3>
            <form action="{{ route('admin.applications.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <!-- Search Field Dropdown -->
                <div class="w-full md:w-1/4">
                    <label for="searchField" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Search by</label>
                    <select id="searchField" name="field" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                        <option value="id" {{ request('field') == 'id' ? 'selected' : '' }}>Application ID</option>
                        <option value="applicant" {{ request('field') == 'applicant' ? 'selected' : '' }}>Applicant Name</option>
                        <option value="omang" {{ request('field') == 'omang' ? 'selected' : '' }}>Omang Number</option>
                        <option value="location" {{ request('field') == 'location' ? 'selected' : '' }}>Location</option>
                    </select>
                </div>
                
                <!-- Search Input -->
                <div class="w-full md:w-3/4">
                    <label for="searchInput" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Search term</label>
                    <div class="flex">
                        <input 
                            type="text" 
                            id="searchInput"
                            name="search"
                            value="{{ request('search') }}"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-l-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors"
                            placeholder="Enter search term..." 
                        />
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-emerald-600 hover:from-blue-700 hover:to-emerald-700 text-white rounded-r-lg transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Search
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Status Filter -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Filter by status</label>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.applications.index', ['status' => 'pending']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('status') == 'pending' ? 
                              'bg-gradient-to-r from-amber-500 to-amber-600 text-white shadow-md' : 
                              'bg-amber-100 text-amber-800 hover:bg-amber-200 dark:bg-amber-900/30 dark:text-amber-300 dark:hover:bg-amber-900/50' }}">
                        Pending
                    </a>
                    <a href="{{ route('admin.applications.index', ['status' => 'approved']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('status') == 'approved' ? 
                              'bg-gradient-to-r from-emerald-500 to-emerald-600 text-white shadow-md' : 
                              'bg-emerald-100 text-emerald-800 hover:bg-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-300 dark:hover:bg-emerald-900/50' }}">
                        Approved
                    </a>
                    <a href="{{ route('admin.applications.index', ['status' => 'rejected']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('status') == 'rejected' ? 
                              'bg-gradient-to-r from-red-500 to-red-600 text-white shadow-md' : 
                              'bg-red-100 text-red-800 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-300 dark:hover:bg-red-900/50' }}">
                        Rejected
                    </a>
                    <a href="{{ route('admin.applications.index') }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ !request('status') ? 
                              'bg-gradient-to-r from-blue-600 to-emerald-600 text-white shadow-md' : 
                              'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        All Applications
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Applications Table -->
        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm bg-white dark:bg-gray-800 transition-all duration-200 hover:shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table Header -->
                    <thead class="bg-gradient-to-r from-blue-600 to-emerald-600 text-white">
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
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($applications as $application)
                            <tr class="group transition-colors hover:bg-blue-50/80 dark:hover:bg-gray-700/50 {{ $loop->even ? 'bg-blue-50/50 dark:bg-gray-700/30' : 'bg-white dark:bg-gray-800' }}">
                                <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-200">{{ $application->id }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $application->user->name }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $application->omang_number }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $application->location }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $application->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $application->status === 'approved' ? 
                                           'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300' : 
                                           ($application->status === 'rejected' ? 
                                            'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300' : 
                                            'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300') }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.applications.show', $application->id) }}" 
                                           class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200">
                                            <span class="sr-only">View</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.applications.edit', $application->id) }}" 
                                           class="text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 transition-colors duration-200">
                                            <span class="sr-only">Review</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Are you sure you want to delete this application?')"
                                                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 transition-colors duration-200">
                                                <span class="sr-only">Delete</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="7" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 dark:text-gray-500 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p>No applications found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="mt-6">
            <div class="dark:pagination-dark">
                {{ $applications->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>