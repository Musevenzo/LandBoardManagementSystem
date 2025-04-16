<x-layouts.app title="Edit Plot">
    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Edit Plot</h2>
        <form action="{{ route('admin.plots.update', $plot->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                <select id="status" name="status" class="w-full px-4 py-2 border rounded-lg">
                    <option value="available" {{ $plot->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="allocated" {{ $plot->status == 'allocated' ? 'selected' : '' }}>Allocated</option>
                    <option value="reserved" {{ $plot->status == 'reserved' ? 'selected' : '' }}>Reserved</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </form>
    </div>
</x-layouts.app>