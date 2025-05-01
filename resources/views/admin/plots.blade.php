<x-layouts.app title="Land Plots">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 sm:p-6 rounded-xl bg-white/50 dark:bg-gray-800/20 backdrop-blur-sm">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pb-6 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-blue-600 dark:from-cyan-400 dark:to-blue-400">
                    PLOTS MANAGEMENT
                </span>
            </h2>
            <div class="flex">
                <a href="{{ route('admin.plots.create') }}" 
                   class="group px-4 py-2 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white rounded-lg shadow-md hover:shadow-lg dark:shadow-blue-900/30 transition-all duration-200 transform hover:-translate-y-1">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Plot
                    </span>
                </a>
            </div>
        </div>
        
        <!-- Search/Filter Section -->
        <div class="mb-6 p-6 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm bg-white dark:bg-gray-800 transition-all duration-200 hover:shadow-md">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Filter Plots</h3>
            <form action="{{ route('admin.plots.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <!-- Search Field Dropdown -->
                <div class="w-full md:w-1/4">
                    <label for="searchField" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Search by</label>
                    <select id="searchField" name="field" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                        <option value="id" {{ request('field') == 'id' ? 'selected' : '' }}>Plot ID</option>
                        <option value="location" {{ request('field') == 'location' ? 'selected' : '' }}>Location</option>
                        <option value="size" {{ request('field') == 'size' ? 'selected' : '' }}>Size</option>
                        <option value="plot_number" {{ request('field') == 'plot_number' ? 'selected' : '' }}>Plot Number</option>
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
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white rounded-r-lg transition-all duration-200">
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
                    <a href="{{ route('admin.plots.index', ['status' => 'available']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('status') == 'available' ? 
                              'bg-gradient-to-r from-emerald-500 to-emerald-600 text-white shadow-md' : 
                              'bg-emerald-100 text-emerald-800 hover:bg-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-300 dark:hover:bg-emerald-900/50' }}">
                        Available
                    </a>
                    <a href="{{ route('admin.plots.index', ['status' => 'allocated']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('status') == 'allocated' ? 
                              'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-md' : 
                              'bg-blue-100 text-blue-800 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50' }}">
                        Allocated
                    </a>
                    <a href="{{ route('admin.plots.index', ['status' => 'reserved']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('status') == 'reserved' ? 
                              'bg-gradient-to-r from-amber-500 to-amber-600 text-white shadow-md' : 
                              'bg-amber-100 text-amber-800 hover:bg-amber-200 dark:bg-amber-900/30 dark:text-amber-300 dark:hover:bg-amber-900/50' }}">
                        Reserved
                    </a>
                    <a href="{{ route('admin.plots.index') }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ !request('status') ? 
                              'bg-gradient-to-r from-cyan-600 to-blue-600 text-white shadow-md' : 
                              'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        All Plots
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Plots Table -->
        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm bg-white dark:bg-gray-800 transition-all duration-200 hover:shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table Header -->
                    <thead class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Plot ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Plot Number</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Location</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Size (sq m)</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Added Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    
                    <!-- Table Body -->
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($plots as $plot)
                            <tr class="group transition-colors hover:bg-blue-50/80 dark:hover:bg-gray-700/50 {{ $loop->even ? 'bg-blue-50/50 dark:bg-gray-700/30' : 'bg-white dark:bg-gray-800' }}">
                                <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-200">{{ $plot->id }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $plot->plot_number }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $plot->location }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $plot->size }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $plot->status === 'available' ? 
                                           'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300' : 
                                           ($plot->status === 'allocated' ? 
                                            'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300' : 
                                            'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300') }}">
                                        {{ ucfirst($plot->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">
                                    {{ $plot->created_at ? $plot->created_at->format('Y-m-d') : 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.plot-show', $plot->id) }}" 
                                           class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200">
                                            <span class="sr-only">View</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.plot-edit', $plot->id) }}" 
                                           class="text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 transition-colors duration-200">
                                            <span class="sr-only">Edit</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.plots.destroy', $plot->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this plot?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 transition-colors duration-200">
                                                <span class="sr-only">Delete</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                        <p>No plots found</p>
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
                {{ $plots->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>