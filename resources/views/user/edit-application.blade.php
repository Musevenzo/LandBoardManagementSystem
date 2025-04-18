<!-- filepath: c:\Users\Musev\Herd\LandBoardManagementSystem\resources\views\user\edit-application.blade.php -->
<x-layouts.app title="Edit Application">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <form action="{{ route('user.applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <!-- Personal Information -->
                        <div class="sm:col-span-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                            <p class="mt-1 text-sm text-gray-500">Please provide your personal details.</p>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $application->full_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="omang_number" class="block text-sm font-medium text-gray-700">Omang/ID Number</label>
                            <input type="text" name="omang_number" id="omang_number" value="{{ old('omang_number', $application->omang_number) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="ward" class="block text-sm font-medium text-gray-700">Ward</label>
                            <input type="text" name="ward" id="ward" value="{{ old('ward', $application->ward) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="village" class="block text-sm font-medium text-gray-700">Village</label>
                            <input type="text" name="village" id="village" value="{{ old('village', $application->village) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Residential Address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $application->address) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="marital_status" class="block text-sm font-medium text-gray-700">Marital Status</label>
                            <select id="marital_status" name="marital_status" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" required>
                                <option value="">Select status</option>
                                <option value="single" {{ old('marital_status', $application->marital_status) === 'single' ? 'selected' : '' }}>Single</option>
                                <option value="married" {{ old('marital_status', $application->marital_status) === 'married' ? 'selected' : '' }}>Married</option>
                                <option value="widowed" {{ old('marital_status', $application->marital_status) === 'widowed' ? 'selected' : '' }}>Widowed</option>
                                <option value="divorced" {{ old('marital_status', $application->marital_status) === 'divorced' ? 'selected' : '' }}>Divorced</option>
                            </select>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $application->date_of_birth) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                        </div>

                        <!-- Location Preference -->
                        <div class="sm:col-span-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Location Preference</h3>
                            <p class="mt-1 text-sm text-gray-500">Please select the location where you want to apply for land.</p>
                            <fieldset class="mt-4">
                                <legend class="sr-only">Location</legend>
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="gaborone" name="location" type="radio" value="Gaborone" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('location', $application->location) === 'Gaborone' ? 'checked' : '' }} required>
                                        <label for="gaborone" class="ml-3 block text-sm font-medium text-gray-700">Gaborone</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="francistown" name="location" type="radio" value="Francistown" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('location', $application->location) === 'Francistown' ? 'checked' : '' }} required>
                                        <label for="francistown" class="ml-3 block text-sm font-medium text-gray-700">Francistown</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="maun" name="location" type="radio" value="Maun" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('location', $application->location) === 'Maun' ? 'checked' : '' }} required>
                                        <label for="maun" class="ml-3 block text-sm font-medium text-gray-700">Maun</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="kasane" name="location" type="radio" value="Kasane" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('location', $application->location) === 'Kasane' ? 'checked' : '' }} required>
                                        <label for="kasane" class="ml-3 block text-sm font-medium text-gray-700">Kasane</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="serowe" name="location" type="radio" value="Serowe" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('location', $application->location) === 'Serowe' ? 'checked' : '' }} required>
                                        <label for="serowe" class="ml-3 block text-sm font-medium text-gray-700">Serowe</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <!-- Spouse Information (conditional) -->
                        <div id="spouse-info" class="sm:col-span-6 hidden">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Spouse Information</h3>
                            <p class="mt-1 text-sm text-gray-500">Please provide your spouse's details.</p>
                        </div>
                        <div id="spouse-name" class="sm:col-span-3 hidden">
                            <label for="spouse_full_name" class="block text-sm font-medium text-gray-700">Spouse Full Name</label>
                            <input type="text" name="spouse_full_name" id="spouse_full_name" value="{{ old('spouse_full_name', $application->spouse_full_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                        <div id="spouse-omang" class="sm:col-span-3 hidden">
                            <label for="spouse_omang_number" class="block text-sm font-medium text-gray-700">Spouse Omang/ID Number</label>
                            <input type="text" name="spouse_omang_number" id="spouse_omang_number" value="{{ old('spouse_omang_number', $application->spouse_omang_number) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>

                        <!-- Declaration Section -->
                        <div class="sm:col-span-6 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Declaration</h3>
                            <p class="mt-1 text-sm text-gray-500">Please read and confirm the following declarations.</p>
                        </div>
                        <div class="sm:col-span-6">
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="age_declaration" name="age_declaration" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('age_declaration', $application->age_declaration) ? 'checked' : '' }} required>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="age_declaration" class="font-medium text-gray-700">I am over 18 years of age</label>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="plot_ownership" name="plot_ownership" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('plot_ownership', $application->plot_ownership) ? 'checked' : '' }} required>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="plot_ownership" class="font-medium text-gray-700">I do not own any residential plot anywhere in Botswana</label>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="never_owned_plot" name="never_owned_plot" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('never_owned_plot', $application->never_owned_plot) ? 'checked' : '' }} required>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="never_owned_plot" class="font-medium text-gray-700">I have never owned any residential plot anywhere in Botswana</label>
                                </div>
                            </div>
                        </div>
                        <div id="spouse-plot-ownership" class="sm:col-span-6 hidden">
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="spouse_plot_ownership" name="spouse_plot_ownership" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('spouse_plot_ownership', $application->spouse_plot_ownership) ? 'checked' : '' }}>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="spouse_plot_ownership" class="font-medium text-gray-700">My Spouse does not own a residential plot anywhere in Botswana</label>
                                </div>
                            </div>
                        </div>
                        <div id="spouse-never-owned-plot" class="sm:col-span-6 hidden">
                            <div class="relative flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="spouse_never_owned_plot" name="spouse_never_owned_plot" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('spouse_never_owned_plot', $application->spouse_never_owned_plot) ? 'checked' : '' }}>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="spouse_never_owned_plot" class="font-medium text-gray-700">My Spouse has never owned a residential plot anywhere in Botswana</label>
                                </div>
                            </div>
                        </div>

                        <!-- Document Uploads -->
                        <div class="sm:col-span-6 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Supporting Documents</h3>
                            <p class="mt-1 text-sm text-gray-500">Please upload the required documents. File names can be anything.</p>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="omang_copy" class="block text-sm font-medium text-gray-700">Copy of Certified Omang/ID *</label>
                            <input type="file" name="omang_copy" id="omang_copy" accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">PDF, JPG, or PNG (Max 5MB)</p>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="proof_of_payment" class="block text-sm font-medium text-gray-700">Proof of Payment *</label>
                            <input type="file" name="proof_of_payment" id="proof_of_payment" accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">PDF, JPG, or PNG (Max 5MB)</p>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="additional_documents" class="block text-sm font-medium text-gray-700">Additional Documents (Optional)</label>
                            <input type="file" name="additional_documents[]" id="additional_documents" multiple accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-xs text-gray-500">You can upload multiple files if needed (PDF, JPG, or PNG, Max 5MB each)</p>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="sm:col-span-6 pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Terms and Conditions</h3>
                            <div class="mt-2 text-sm text-gray-600">
                                <p class="font-semibold">Conditions of the Waiting List:</p>
                                <ol class="list-decimal pl-5 space-y-1 mt-2">
                                    <li>If the Land Board discovers that I applied while I was under the age of 18 years, I will not be enrolled in the waiting list.</li>
                                    <li>If I falsely apply for the deceased person, severe penalties will be imposed.</li>
                                    <li>If I forge another person's signature, serious punishment will be taken against me.</li>
                                </ol>
                                <p class="mt-4">I make the above declaration consciously trusting the same to be true and if it is found to be untrue I will be liable before court of law.</p>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="terms_agreement" name="terms_agreement" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" {{ old('terms_agreement', $application->terms_agreement) ? 'checked' : '' }} required>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="terms_agreement" class="font-medium text-gray-700">I agree to the terms and conditions</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show/hide spouse fields based on marital status
        document.getElementById('marital_status').addEventListener('change', function() {
            const isMarried = this.value === 'married';
            document.getElementById('spouse-info').classList.toggle('hidden', !isMarried);
            document.getElementById('spouse-name').classList.toggle('hidden', !isMarried);
            document.getElementById('spouse-omang').classList.toggle('hidden', !isMarried);
            document.getElementById('spouse-plot-ownership').classList.toggle('hidden', !isMarried);
            document.getElementById('spouse-never-owned-plot').classList.toggle('hidden', !isMarried);
            // Make spouse fields required if married
            document.getElementById('spouse_full_name').required = isMarried;
            document.getElementById('spouse_omang_number').required = isMarried;
            document.getElementById('spouse_plot_ownership').required = isMarried;
            document.getElementById('spouse_never_owned_plot').required = isMarried;
        });

        // Age validation
        document.getElementById('date_of_birth').addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            if (age < 18) {
                alert('You must be at least 18 years old to apply.');
                this.value = '';
            }
        });
    </script>
</x-layouts.app>