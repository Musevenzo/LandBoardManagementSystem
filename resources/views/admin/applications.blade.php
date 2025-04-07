<x-layouts.app title="Applications">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        
        <!-- Page Header -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h2 class="text-2xl font-bold">APPLICATIONS MANAGEMENT</h2>
        </div>

        <!-- Search Bar -->
        <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-2">Search Applications by Any Field</h3>
            <input 
                type="text" 
                id="searchInput" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter keyword to search..." 
            />
        </div>

        <!-- New Applications -->
        <h3 class="text-xl font-semibold mt-6">New Applications</h3>
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm mb-6 category-table">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th>Application ID</th>
                        <th>Applicant Name</th>
                        <th>Location</th>
                        <th>Submission Date/Time</th>
                        <th>Total Applications</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="newApps">
                    <tr><td>001</td><td>John Doe</td><td>Gaborone</td><td>2025-03-21 10:30 AM</td><td>3</td><td>Pending</td></tr>
                    <tr><td>002</td><td>Jane Smith</td><td>Francistown</td><td>2025-03-21 11:45 AM</td><td>2</td><td>Pending</td></tr>
                </tbody>
            </table>
            <p class="text-right p-2">Total New Applications: 2</p>
        </div>

        <!-- Old Applications -->
        <h3 class="text-xl font-semibold mt-6">Old Applications</h3>
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm mb-6 category-table">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th>Application ID</th>
                        <th>Applicant Name</th>
                        <th>Location</th>
                        <th>Submission Date/Time</th>
                        <th>Total Applications</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="oldApps">
                    <tr><td>003</td><td>Mike Johnson</td><td>Mahalapye</td><td>2025-02-10 09:20 AM</td><td>4</td><td>Approved</td></tr>
                    <tr><td>004</td><td>Sarah Brown</td><td>Palapye</td><td>2025-02-05 02:15 PM</td><td>3</td><td>Approved</td></tr>
                </tbody>
            </table>
            <p class="text-right p-2">Total Old Applications: 2</p>
        </div>

        <!-- Denied Applications -->
        <h3 class="text-xl font-semibold mt-6">Denied Applications</h3>
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm mb-6 category-table">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th>Application ID</th>
                        <th>Applicant Name</th>
                        <th>Location</th>
                        <th>Submission Date/Time</th>
                        <th>Total Applications</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="deniedApps">
                    <tr><td>005</td><td>Emma White</td><td>Maun</td><td>2025-01-15 10:00 AM</td><td>1</td><td>Denied</td></tr>
                    <tr><td>006</td><td>David Green</td><td>Kanye</td><td>2025-01-20 03:40 PM</td><td>2</td><td>Denied</td></tr>
                </tbody>
            </table>
            <p class="text-right p-2">Total Denied Applications: 2</p>
        </div>

        <!-- Enhanced JavaScript for Search -->
        <script>
            document.getElementById("searchInput").addEventListener("keyup", function () {
                let searchValue = this.value.toLowerCase(); // Get the search term
                let tables = document.querySelectorAll(".category-table"); // Get all category tables

                tables.forEach(table => {
                    let rows = table.querySelectorAll("tbody tr"); // Get all rows in the table
                    let hasResults = false; // Track if any rows match the search term

                    rows.forEach(row => {
                        let matches = Array.from(row.cells).some(cell => 
                            cell.innerText.toLowerCase().includes(searchValue)
                        ); // Check if any cell matches the search term
                        row.style.display = matches ? "" : "none"; // Show/hide the row
                        if (matches) hasResults = true; // Update the result tracker
                    });

                    // Hide the table if no rows match
                    table.style.display = hasResults ? "" : "none";
                });
            });
        </script>
    </div>
</x-layouts.app>