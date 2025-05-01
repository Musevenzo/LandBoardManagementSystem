{{-- filepath: c:\Users\Wangu\Herd\LandboardSystem\resources\views\admin\create-plots.blade.php --}}
<x-layouts.app title="Create Plot">
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create New Plot</h1>
        <form action="{{ route('admin.plots.store') }}" method="POST">
            @csrf

            <!-- Plot Number -->
            <div class="mb-4">
                <label for="plot_number" class="block text-sm font-medium text-gray-700">Plot Number</label>
                <input type="text" id="plot_number" name="plot_number" value="{{ old('plot_number') }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                       required>
                @error('plot_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                       required>
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Size -->
            <div class="mb-4">
                <label for="size" class="block text-sm font-medium text-gray-700">Size (sq m)</label>
                <input type="number" id="size" name="size" value="{{ old('size') }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                       required>
                @error('size')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        required>
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="allocated" {{ old('status') == 'allocated' ? 'selected' : '' }}>Allocated</option>
                    <option value="reserved" {{ old('status') == 'reserved' ? 'selected' : '' }}>Reserved</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition-all duration-200">
                    Create Plot
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>