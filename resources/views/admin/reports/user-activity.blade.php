<x-layouts.app title="User Activity Report">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-2xl font-bold text-blue-800">User Activity Report</h1>

        <table class="w-full bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Registered On</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $user->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layouts.app>