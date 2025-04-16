<x-layouts.app title="View Plot">
    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Plot Details</h2>
        <p><strong>Plot ID:</strong> {{ $plot->id }}</p>
        <p><strong>Plot Number:</strong> {{ $plot->plot_number }}</p>
        <p><strong>Location:</strong> {{ $plot->location }}</p>
        <p><strong>Size:</strong> {{ $plot->size }} sq m</p>
        <p><strong>Status:</strong> {{ ucfirst($plot->status) }}</p>
        <p><strong>Added Date:</strong> {{ $plot->created_at->format('Y-m-d') }}</p>
    </div>
</x-layouts.app>