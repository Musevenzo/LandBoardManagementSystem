<x-layouts.app title="Users">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h2 class="text-2xl font-bold">USERS MANAGEMENT</h2>
        </div>

        <!-- Search/Filter Section -->
        <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-sm bg-black">
            <h3 class="text-lg font-semibold mb-2 text-white">Filter Users</h3>
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Search Field Dropdown -->
                <div class="w-full md:w-1/4">
                    <label for="searchField" class="block text-sm font-medium text-green-700 mb-1">Search by</label>
                    <select id="searchField" class="w-full px-4 py-2 border border-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="0">User ID</option>
                        <option value="1">Applicant Name</option>
                        <option value="2">Date of Application</option>
                        <option value="3">Status</option>
                    </select>
                </div>

                <!-- Search Input -->
                <div class="w-full md:w-3/4">
                    <label for="searchInput" class="block text-sm font-medium text-gray-700 mb-1">Search term</label>
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter search term..." 
                    />
                </div>
            </div>

            <!-- Status Filter -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Filter by status</label>
                <div class="flex flex-wrap gap-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="status-filter" value="Approved" checked aria-checked="true">
                        <span class="ml-2 text-gray-700">Approved</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="status-filter" value="Pending" checked aria-checked="true">
                        <span class="ml-2 text-gray-700">Pending</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="status-filter" value="Rejected" checked aria-checked="true">
                        <span class="ml-2 text-gray-700">Rejected</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Simplified Users Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full bg-black">
                <!-- Table Header -->
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Date</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody id="userTableBody" class="divide-y divide-gray-200">
                    <!-- User Rows -->
                    <tr class="hover:bg-gray-50" data-status="Approved">
                        <td class="px-4 py-3 text-green-800 font-medium">001</td>
                        <td class="px-4 py-3 text-green-800">John Doe</td>
                        <td class="px-4 py-3 text-green-800">Mar 21, 2025</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <button class="action-btn view-btn text-blue-600" data-user-id="001" aria-label="View User 001">View</button>
                            <button class="action-btn block-btn text-red-600" data-user-id="001" aria-label="Block User 001">Block</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 bg-gray-50" data-status="Pending">
                        <td class="px-4 py-3 text-green-800 font-medium">002</td>
                        <td class="px-4 py-3 text-green-800">Jane Smith</td>
                        <td class="px-4 py-3 text-green-800">Mar 18, 2025</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <button class="action-btn view-btn text-blue-600" data-user-id="002" aria-label="View User 002">View</button>
                            <button class="action-btn block-btn text-red-600" data-user-id="002" aria-label="Block User 002">Block</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50" data-status="Rejected">
                        <td class="px-4 py-3 text-green-800 font-medium">003</td>
                        <td class="px-4 py-3 text-green-800">Alex Johnson</td>
                        <td class="px-4 py-3 text-green-800">Mar 20, 2025</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">Rejected</span>
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <button class="action-btn view-btn text-blue-600" data-user-id="003" aria-label="View User 003">View</button>
                            <button class="action-btn block-btn text-red-600" data-user-id="003" aria-label="Block User 003">Block</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- CSS -->
    <style>
        :root {
            --primary-color: #1e40af;
            --secondary-color: #facc15;
            --success-color: #16a34a;
            --danger-color: #dc2626;
        }

        .action-btn {
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .view-btn:hover {
            color: var(--primary-color);
        }

        .block-btn:hover {
            color: var(--danger-color);
        }
    </style>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const searchField = document.getElementById('searchField');
            const statusFilters = document.querySelectorAll('.status-filter');
            const tableBody = document.getElementById('userTableBody');

            // Filter table based on search and status
            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const fieldIndex = parseInt(searchField.value);
                const activeStatuses = Array.from(statusFilters)
                    .filter(filter => filter.checked)
                    .map(filter => filter.value);

                Array.from(tableBody.rows).forEach(row => {
                    const cellText = row.cells[fieldIndex].textContent.toLowerCase();
                    const rowStatus = row.dataset.status;

                    const matchesSearch = !searchTerm || cellText.includes(searchTerm);
                    const matchesStatus = activeStatuses.length === 0 || activeStatuses.includes(rowStatus);

                    row.style.display = matchesSearch && matchesStatus ? '' : 'none';
                });
            }

            // Handle user actions (View/Block)
            function handleUserAction(event) {
                const target = event.target;
                if (target.classList.contains('view-btn')) {
                    const userId = target.dataset.userId;
                    alert(`View User: ${userId}`);
                } else if (target.classList.contains('block-btn')) {
                    const userId = target.dataset.userId;
                    if (confirm(`Are you sure you want to block User ${userId}?`)) {
                        alert(`Blocked User: ${userId}`);
                    }
                }
            }

            // Attach event listeners
            searchInput.addEventListener('input', filterTable);
            searchField.addEventListener('change', filterTable);
            statusFilters.forEach(filter => filter.addEventListener('change', filterTable));
            tableBody.addEventListener('click', handleUserAction);
        });
    </script>
</x-layouts.app>