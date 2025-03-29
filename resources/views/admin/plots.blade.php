<x-layouts.app title="Plots">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h1 class="text-2xl font-bold">Plots Management</h1>
        </div>

        <!-- Search Bar -->
        <div class="flex items-center justify-between space-x-4 mb-4">
            <input
                type="text"
                id="search for plots information "
                class="px-4 py-2 border border-gray-300 rounded-lg w-1/3"
                placeholder="Search for plots information "
            />
            <button
                onclick="searchPlot()"
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
            >
                Search
            </button>
        </div>

        <!-- Available Plots Table -->
        <div>
            <h2 class="text-xl font-semibold mt-6">Available Plots</h2>
            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm category-table">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Plot Number</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Location</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Size (sqm)</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Location of Available Plots</th>
                        </tr>
                    </thead>
                    <tbody class="bg-Black divide-y divide-gray-200" id="availablePlotsTableBody">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">12345</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Gaborone City Centre</td>
                            <td class="px-6 py-4 text-sm text-gray-500">500</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Tlokweng</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">11223</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Sebele</td>
                            <td class="px-6 py-4 text-sm text-gray-500">550</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Gaborone South</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Allocated Plots Table -->
        <div>
            <h2 class="text-xl font-semibold mt-6">Allocated Plots</h2>
            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm category-table">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Plot Number</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Location</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Size (sqm)</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Location of Allocated Plots</th>
                        </tr>
                    </thead>
                    <tbody class="bg-Black divide-y divide-gray-200" id="allocatedPlotsTableBody">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">67890</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Mogoditshane</td>
                            <td class="px-6 py-4 text-sm text-gray-500">600</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Gaborone West</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function searchPlot() {
            const searchValue = document.getElementById('searchPlotNumber').value.toLowerCase();
            const tables = document.querySelectorAll('.category-table');

            tables.forEach(table => {
                let rows = table.querySelectorAll('tbody tr');
                let hasResults = false;

                rows.forEach(row => {
                    // Check if any cell in the row matches the search term
                    const matches = Array.from(row.cells).some(cell => 
                        cell.textContent.toLowerCase().includes(searchValue)
                    );
                    row.style.display = matches ? '' : 'none';
                    if (matches) hasResults = true;
                });

                // Hide the entire table if no rows match
                table.style.display = hasResults ? '' : 'none';
            });
        }
    </script>
</x-layouts.app>