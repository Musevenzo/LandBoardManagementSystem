<x-layouts.app title="Users">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h2 class="text-2xl font-bold">USERS MANAGEMENT</h2>
            <div class="md:col-span-2 flex justify-end">
                <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Add New User
                </a>
            </div>
        </div>
        
        <!-- Search/Filter Section -->
        <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-sm bg-white">
            <h3 class="text-lg font-semibold mb-2">Filter Users</h3>
            <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <!-- Search Field Dropdown -->
                <div class="w-full md:w-1/4">
                    <label for="searchField" class="block text-sm font-medium text-gray-700 mb-1">Search by</label>
                    <select id="searchField" name="field" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="id" {{ request('field') == 'id' ? 'selected' : '' }}>User ID</option>
                        <option value="name" {{ request('field') == 'name' ? 'selected' : '' }}>Name</option>
                        <option value="email" {{ request('field') == 'email' ? 'selected' : '' }}>Email</option>
                        <option value="role" {{ request('field') == 'role' ? 'selected' : '' }}>Role</option>
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
            
            <!-- Role Filter -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Filter by role</label>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('admin.users.index', ['role' => 'admin']) }}" 
                       class="px-3 py-1 rounded-full {{ request('role') == 'admin' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        Admin
                    </a>
                    <a href="{{ route('admin.users.index', ['role' => 'user']) }}" 
                       class="px-3 py-1 rounded-full {{ request('role') == 'user' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        User
                    </a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="px-3 py-1 rounded-full {{ !request('role') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                        All Roles
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Users Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
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
                <tbody id="userTableBody" class="divide-y divide-gray-200 bg-white">
                    @forelse($users as $user)
                        <tr class="hover:bg-blue-50 {{ $loop->even ? 'bg-blue-100' : '' }}">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $user->id }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-800">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="text-blue-600 hover:text-blue-800 mr-2">View</a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-800 mr-2">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" 
                                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layouts.app>