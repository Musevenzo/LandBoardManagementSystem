<x-layouts.app title="Edit Application">
    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Edit Application Status</h2>
        
        <!-- Display applicant's information -->
        <div class="mb-4">
            <p class="text-sm text-gray-700 dark:text-gray-300">
                <strong>Applicant Name:</strong> {{ $application->user->name }}
            </p>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                <strong>Application ID:</strong> {{ $application->id }}
            </p>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                <strong>Location:</strong> {{ $application->location }}
            </p>
        </div>

        <!-- Form to Update Application Status -->
        <form action="{{ route('admin.applications.update', $application->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Status Selection -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                <select id="status" name="status" class="w-full mt-1 px-4 py-2 border rounded-lg">
                    <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <!-- Rejection Reason (conditional) -->
            <div id="rejection-reason-field" class="mb-4 hidden">
                <label for="rejection_reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason for Rejection</label>
                <select id="rejection_reason" name="rejection_reason" class="w-full mt-1 px-4 py-2 border rounded-lg">
                    <option value="">Select a reason</option>
                    <option value="incomplete_documentation">Incomplete Documentation</option>
                    <option value="duplicate_application">Duplicate Application</option>
                    <option value="non_compliance_with_land_policies">Non-Compliance with Land Policies</option>
                    <option value="fraudulent_information">Fraudulent Information</option>
                </select>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Please select the appropriate reason for rejecting this application.
                </p>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </form>
    </div>

    <!-- JavaScript to toggle rejection reason field -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const statusSelect = document.getElementById('status');
            const rejectionReasonField = document.getElementById('rejection-reason-field');

            // Function to toggle visibility of rejection reason field
            function toggleRejectionReasonField() {
                if (statusSelect.value === 'rejected') {
                    rejectionReasonField.classList.remove('hidden');
                } else {
                    rejectionReasonField.classList.add('hidden');
                }
            }

            // Initial check on page load
            toggleRejectionReasonField();

            // Add event listener for status changes
            statusSelect.addEventListener('change', toggleRejectionReasonField);
        });
    </script>
</x-layouts.app>