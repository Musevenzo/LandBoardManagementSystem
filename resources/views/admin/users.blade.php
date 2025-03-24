<x-layouts.app title="Users">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h2 class="text-2xl font-bold">USERS PAGE</h2>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">User ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Applicant Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Date of Application</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                    </tr>
                </thead>

                 <!-- Search Bar (Separated) -->
        <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-2">Search Users</h3>
            <input 
                type="text" 
                id="searchInput" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter User ID to search..." 
            />
        </div>
        
                <!-- Table Body -->
                <tbody id="userTableBody" class="divide-y divide-gray-200">
                    <!-- User Row 1 -->
                    <tr class="hover:bg-blue-50 even:bg-blue-100">
                        <td class="px-6 py-4 font-medium text-gray-800">001</td>
                        <td class="px-6 py-4 text-gray-800">John Doe</td>
                        <td class="px-6 py-4 text-gray-800">2025-03-21</td>
                        <td class="px-6 py-4 font-bold text-green-600">Approved</td>
                        <td class="px-6 py-4 space-x-3">
                            <button onclick="viewUser(1)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">View</button>
                            <button onclick="editUser(1)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Edit</button>
                            <button onclick="deleteUser(1)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Delete</button>
                        </td>
                    </tr>
                    <!-- User Row 2 -->
                    <tr class="hover:bg-blue-50 even:bg-blue-100">
                        <td class="px-6 py-4 font-medium text-gray-800">002</td>
                        <td class="px-6 py-4 text-gray-800">Jane Smith</td>
                        <td class="px-6 py-4 text-gray-800">2025-03-18</td>
                        <td class="px-6 py-4 font-bold text-yellow-600">Pending</td>
                        <td class="px-6 py-4 space-x-3">
                            <button onclick="viewUser(2)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">View</button>
                            <button onclick="editUser(2)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Edit</button>
                            <button onclick="deleteUser(2)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Delete</button>
                        </td>
                    </tr>
                    <!-- User Row 3 -->
                    <tr class="hover:bg-blue-50 even:bg-blue-100">
                        <td class="px-6 py-4 font-medium text-gray-800">003</td>
                        <td class="px-6 py-4 text-gray-800">Alex Johnson</td>
                        <td class="px-6 py-4 text-gray-800">2025-03-20</td>
                        <td class="px-6 py-4 font-bold text-red-600">Rejected</td>
                        <td class="px-6 py-4 space-x-3">
                            <button onclick="viewUser(3)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">View</button>
                            <button onclick="editUser(3)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Edit</button>
                            <button onclick="deleteUser(3)" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript for Search by User ID -->
    <script>
        // Search functionality for User ID
        document.getElementById("searchInput").addEventListener("keyup", function () {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll("#userTableBody tr");

            rows.forEach(row => {
                let userId = row.cells[0].innerText.toLowerCase();
                row.style.display = userId.includes(searchValue) ? "" : "none";
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
                // Replace with actual logic to delete the user (e.g., sending request to backend)
            }
        }
    </script>
</x-layouts.app>
