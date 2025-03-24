<x-layouts.app title="Plots">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h1 class="text-2xl font-bold">Plots Page</h1>
        </div>

        <!-- Search Bar -->
        <div class="flex items-center justify-between space-x-4 mb-4">
            <input
                type="text"
                id="searchPlotNumber"
                class="px-4 py-2 border border-gray-300 rounded-lg w-1/3"
                placeholder="Search by Plot Number"
            />
            <button
                onclick="searchPlot()"
                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
            >
                Search
            </button>
        </div>

        <!-- Plots Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Plot Number</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Location</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Size (sqm)</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Location of Allocated Plots</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Location of Available Plots</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="plotsTableBody">
                    <!-- User 1 -->
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-500">12345</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Gaborone City Centre</td>
                        <td class="px-6 py-4 text-sm text-gray-500">500</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Available</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Phakalane</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Tlokweng</td>
                        <td class="px-6 py-4 text-sm text-gray-500">View | Edit</td>
                    </tr>
                    <!-- User 2 -->
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-500">67890</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Mogoditshane</td>
                        <td class="px-6 py-4 text-sm text-gray-500">600</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Allocated</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Gaborone West</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Mochudi</td>
                        <td class="px-6 py-4 text-sm text-gray-500">View | Edit</td>
                    </tr>
                    <!-- User 3 -->
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-500">11223</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Sebele</td>
                        <td class="px-6 py-4 text-sm text-gray-500">550</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Available</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Ramotswa</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Gaborone South</td>
                        <td class="px-6 py-4 text-sm text-gray-500">View | Edit</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchPlot() {
            const plotNumber = document.getElementById('searchPlotNumber').value.toLowerCase();
            const rows = document.querySelectorAll('#plotsTableBody tr');

            rows.forEach(row => {
                const plotIdCell = row.cells[0].textContent.toLowerCase();
                if (plotIdCell.includes(plotNumber)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</x-layouts.app>
