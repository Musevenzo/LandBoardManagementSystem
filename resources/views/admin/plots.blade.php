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
                id="searchPlotInput"
                class="px-4 py-2 border border-gray-300 rounded-lg w-1/3"
                placeholder="Search for plots information"
                onkeyup="searchPlot()"
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
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="availablePlotsTableBody">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">12345</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Gaborone </td>
                            <td class="px-6 py-4 text-sm text-gray-500">500</td>
                            
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">11223</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Maun</td>
                            <td class="px-6 py-4 text-sm text-gray-500">550</td>
                         
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
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="allocatedPlotsTableBody">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">67890</td>
                            <td class="px-6 py-4 text-sm text-gray-500">Nata</td>
                            <td class="px-6 py-4 text-sm text-gray-500">600</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function searchPlot() {
            const searchValue = document.getElementById('searchPlotInput').value.toLowerCase();
            const availableRows = document.querySelectorAll('#availablePlotsTableBody tr');
            const allocatedRows = document.querySelectorAll('#allocatedPlotsTableBody tr');
            
            // Search in Available Plots
            let availableHasResults = false;
            availableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const matches = Array.from(cells).some(cell => 
                    cell.textContent.toLowerCase().includes(searchValue)
                );
                row.style.display = matches ? '' : 'none';
                if (matches) availableHasResults = true;
            });
            
            // Search in Allocated Plots
            let allocatedHasResults = false;
            allocatedRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const matches = Array.from(cells).some(cell => 
                    cell.textContent.toLowerCase().includes(searchValue)
                );
                row.style.display = matches ? '' : 'none';
                if (matches) allocatedHasResults = true;
            });
            
            // Show/hide table sections based on results
            document.querySelectorAll('h2')[1].style.display = availableHasResults ? '' : 'none';
            document.querySelectorAll('.category-table')[0].style.display = availableHasResults ? '' : 'none';
            document.querySelectorAll('h2')[2].style.display = allocatedHasResults ? '' : 'none';
            document.querySelectorAll('.category-table')[1].style.display = allocatedHasResults ? '' : 'none';
            
            // Show message if no results
            if (!availableHasResults && !allocatedHasResults) {
                const noResults = document.createElement('div');
                noResults.className = 'p-4 text-center text-gray-500';
                noResults.textContent = 'No plots found matching your search.';
                
                const existingMessage = document.querySelector('.no-results-message');
                if (!existingMessage) {
                    noResults.classList.add('no-results-message');
                    document.querySelector('div.flex.flex-col.gap-4').appendChild(noResults);
                }
            } else {
                const existingMessage = document.querySelector('.no-results-message');
                if (existingMessage) {
                    existingMessage.remove();
                }
            }
        }
    </script>
</x-layouts.app>