<x-layouts.app title="Admin Reports">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6 rounded-xl bg-gradient-to-br from-gray-50 to-blue-50">
        <!-- Page Header with Logo -->
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.PNG') }}" alt="eLAND Botswana Logo" class="h-12 w-auto rounded-lg border-2 border-blue-100 shadow-sm">
                <div>
                    <p class="text-sm text-blue-600 font-medium">REPORTS DASHBOARD</p>
                </div>
            </div>
        </div>

        <!-- Reports List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($reports as $report)
            <div class="p-6 bg-gradient-to-br from-white to-blue-50 rounded-xl shadow-md border border-blue-100 flex flex-col justify-between transition-all hover:shadow-lg hover:-translate-y-1">
                <div>
                    <h3 class="text-lg font-semibold text-blue-800">{{ $report['title'] }}</h3>
                    <p class="text-sm text-blue-500 mt-2">{{ $report['description'] }}</p>
                </div>
                <a href="{{ $report['link'] }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                    View Report
                </a>
            </div>
            @endforeach
        </div>

        <!-- Footer -->
        <footer class="mt-auto text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} eLAND Botswana. All rights reserved.
        </footer>
    </div>
</x-layouts.app>