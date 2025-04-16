<x-layouts.app title="Users">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-4 sm:p-6 rounded-xl bg-white/50 dark:bg-gray-800/20 backdrop-blur-sm">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pb-6 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400">
                    USERS MANAGEMENT
                </span>
            </h2>
            <div class="flex">
                <a href="{{ route('admin.users.create') }}" 
                   class="group px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg shadow-md hover:shadow-lg dark:shadow-blue-900/30 transition-all duration-200 transform hover:-translate-y-1">
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New User
                    </span>
                </a>
            </div>
        </div>
        
        <!-- Search/Filter Section -->
        <div class="mb-6 p-6 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm bg-white dark:bg-gray-800 transition-all duration-200 hover:shadow-md">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Filter Users</h3>
            <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <!-- Search Field Dropdown -->
                <div class="w-full md:w-1/4">
                    <label for="searchField" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Search by</label>
                    <select id="searchField" name="field" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                        <option value="id" {{ request('field') == 'id' ? 'selected' : '' }}>User ID</option>
                        <option value="name" {{ request('field') == 'name' ? 'selected' : '' }}>Name</option>
                        <option value="email" {{ request('field') == 'email' ? 'selected' : '' }}>Email</option>
                        <option value="role" {{ request('field') == 'role' ? 'selected' : '' }}>Role</option>
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
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-r-lg transition-all duration-200">
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
            
            <!-- Role Filter -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Filter by role</label>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.users.index', ['role' => 'admin']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('role') == 'admin' ? 
                              'bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-md' : 
                              'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        Admin
                    </a>
                    <a href="{{ route('admin.users.index', ['role' => 'user']) }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ request('role') == 'user' ? 
                              'bg-gradient-to-r from-blue-600 to-cyan-600 text-white shadow-md' : 
                              'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        User
                    </a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                           {{ !request('role') ? 
                              'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md' : 
                              'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                        All Roles
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Users Table -->
        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm bg-white dark:bg-gray-800 transition-all duration-200 hover:shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table Header -->
                    <thead class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">User ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Role</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Registered On</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    
                    <!-- Table Body -->
                    <tbody id="userTableBody" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($users as $user)
                            <tr class="group transition-colors hover:bg-blue-50/80 dark:hover:bg-gray-700/50 {{ $loop->even ? 'bg-blue-50/50 dark:bg-gray-700/30' : 'bg-white dark:bg-gray-800' }}">
                                <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-200">{{ $user->id }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $user->role === 'admin' ? 
                                           'bg-purple-100 text-purple-800 dark:bg-purple-900/40 dark:text-purple-300' : 
                                           'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.users.show', $user->id) }}" 
                                           class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200">
                                            <span class="sr-only">View</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="6" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 dark:text-gray-500 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p>No users found</p>
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>