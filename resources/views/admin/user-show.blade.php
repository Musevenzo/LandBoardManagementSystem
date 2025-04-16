<x-layouts.app title="View User">
    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">User Details</h2>
        <div class="space-y-4">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
            <p><strong>Registered On:</strong> {{ $user->created_at->format('Y-m-d') }}</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Back to Users
        </a>
    </div>
</x-layouts.app>