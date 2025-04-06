<x-layouts.app title="Users">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h2 class="text-2xl font-bold">USERS PAGE</h2>
        </div>

        <!-- Search/Filter Section -->
        <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-sm bg-white">
            <h3 class="text-lg font-semibold mb-2">Filter Users</h3>
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Search Field Dropdown -->
                <div class="w-full md:w-1/4">
                    <label for="searchField" class="block text-sm font-medium text-gray-700 mb-1">Search by</label>
                    <select id="searchField" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
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
            
            <!-- Status Filter (Bonus) -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Filter by status</label>
                <div class="flex flex-wrap gap-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="status-filter" value="Approved" checked>
                        <span class="ml-2 text-gray-700">Approved</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="status-filter" value="Pending" checked>
                        <span class="ml-2 text-gray-700">Pending</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="status-filter" value="Rejected" checked>
                        <span class="ml-2 text-gray-700">Rejected</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">User ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Applicant Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date of Application</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody id="userTableBody" class="divide-y divide-gray-200 bg-white">
                    <!-- User Row 1 -->
                    <tr class="hover:bg-blue-50 even:bg-blue-100" data-status="Approved">
                        <td class="px-6 py-4 font-medium text-gray-800">001</td>
                        <td class="px-6 py-4 text-gray-800">John Doe</td>
                        <td class="px-6 py-4 text-gray-800">2025-03-21</td>
                        <td class="px-6 py-4 font-bold text-green-600">Approved</td>
                        <td class="px-6 py-4">
                            <button onclick="viewUser('001')" class="text-blue-600 hover:text-blue-800 mr-2">View</button>
                            <button onclick="editUser('001')" class="text-yellow-600 hover:text-yellow-800 mr-2">Edit</button>
                            <button onclick="deleteUser('001')" class="text-red-600 hover:text-red-800">Delete</button>
                        </td>
                    </tr>
                    <!-- User Row 2 -->
                    <tr class="hover:bg-blue-50 even:bg-blue-100" data-status="Pending">
                        <td class="px-6 py-4 font-medium text-gray-800">002</td>
                        <td class="px-6 py-4 text-gray-800">Jane Smith</td>
                        <td class="px-6 py-4 text-gray-800">2025-03-18</td>
                        <td class="px-6 py-4 font-bold text-yellow-600">Pending</td>
                        <td class="px-6 py-4">
                            <button onclick="viewUser('002')" class="text-blue-600 hover:text-blue-800 mr-2">View</button>
                            <button onclick="editUser('002')" class="text-yellow-600 hover:text-yellow-800 mr-2">Edit</button>
                            <button onclick="deleteUser('002')" class="text-red-600 hover:text-red-800">Delete</button>
                        </td>
                    </tr>
                    <!-- User Row 3 -->
                    <tr class="hover:bg-blue-50 even:bg-blue-100" data-status="Rejected">
                        <td class="px-6 py-4 font-medium text-gray-800">003</td>
                        <td class="px-6 py-4 text-gray-800">Alex Johnson</td>
                        <td class="px-6 py-4 text-gray-800">2025-03-20</td>
                        <td class="px-6 py-4 font-bold text-red-600">Rejected</td>
                        <td class="px-6 py-4">
                            <button onclick="viewUser('003')" class="text-blue-600 hover:text-blue-800 mr-2">View</button>
                            <button onclick="editUser('003')" class="text-yellow-600 hover:text-yellow-800 mr-2">Edit</button>
                            <button onclick="deleteUser('003')" class="text-red-600 hover:text-red-800">Delete</button>
                        </td>
                    </tr>
                    <!-- User Row 4 -->
                    <tr class="hover:bg-blue-50 even:bg-blue-100" data-status="Approved">
                        <td class="px-6 py-4 font-medium text-gray-800">004</td>
                        <td class="px-6 py-4 text-gray-800">Sarah Williams</td>
                        <td class="px-6 py-4 text-gray-800">2025-03-22</td>
                        <td class="px-6 py-4 font-bold text-green-600">Approved</td>
                        <td class="px-6 py-4">
                            <button onclick="viewUser('004')" class="text-blue-600 hover:text-blue-800 mr-2">View</button>
                            <button onclick="editUser('004')" class="text-yellow-600 hover:text-yellow-800 mr-2">Edit</button>
                            <button onclick="deleteUser('004')" class="text-red-600 hover:text-red-800">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Enhanced JavaScript for Search and Filter -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById("searchInput");
            const searchField = document.getElementById("searchField");
            const statusFilters = document.querySelectorAll(".status-filter");
            
            // Function to filter the table
            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const fieldIndex = parseInt(searchField.value);
                const activeStatuses = Array.from(document.querySelectorAll('.status-filter:checked')).map(el => el.value);
                
                const rows = document.querySelectorAll("#userTableBody tr");
                
                rows.forEach(row => {
                    const cellText = row.cells[fieldIndex].innerText.toLowerCase();
                    const rowStatus = row.getAttribute('data-status');
                    
                    const matchesSearch = searchTerm === '' || cellText.includes(searchTerm);
                    const matchesStatus = activeStatuses.includes(rowStatus);
                    
                    row.style.display = matchesSearch && matchesStatus ? "" : "none";
                });
            }
            
            // Event listeners
            searchInput.addEventListener("keyup", filterTable);
            searchField.addEventListener("change", filterTable);
            statusFilters.forEach(filter => {
                filter.addEventListener("change", filterTable);
            });
        });

        // View User Function
        function viewUser(userId) {
            alert('View User: ' + userId);
            // Replace with actual logic for viewing user details
        }

        // Edit User Function
        function editUser(userId) {
            alert('Edit User: ' + userId);
            // Replace with actual logic for editing user details
        }

        // Delete User Function
        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete User ' + userId + '?')) {
                alert('Deleted User: ' + userId);
                // Replace with actual logic to delete the user
            }
        }
    </script>
</x-layouts.app>