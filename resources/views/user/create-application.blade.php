<x-layouts.app title="New Application">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">New Application</h1>
        <form action="{{ route('user.application.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Preferred Location</label>
                <input type="text" name="location" id="location" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="documents" class="block text-sm font-medium text-gray-700">Upload Required Documents</label>
                <input type="file" name="documents[]" id="documents" multiple required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
            </div>
            <button type="submit" class="p-2 bg-blue-600 text-white rounded-md">Submit Application</button>
        </form>
    </div>
</x-layouts.app>