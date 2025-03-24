<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLAND Botswana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 overflow-hidden">
    <header class="w-full h-screen flex flex-col justify-center items-center text-sm bg-cover bg-center" style="background-image: url('{{ asset('images/background3.jpg') }}');">
        <!-- Top-Right Buttons (Login and Register) -->
        <div class="absolute top-4 right-4 flex gap-4">
            <a
                href="{{ route('login') }}"
                class="inline-block px-6 py-2 bg-[#2980b9] hover:bg-[#1f6f92] text-white rounded-lg text-sm font-medium leading-normal transition-all duration-300 shadow-lg hover:shadow-xl"
            >
                Log in
            </a>
            <a
                href="{{ route('register') }}"
                class="inline-block px-6 py-2 bg-[#27ae60] hover:bg-[#1d7f4d] text-white rounded-lg text-sm font-medium leading-normal transition-all duration-300 shadow-lg hover:shadow-xl"
            >
                Register
            </a>
        </div>

        <!-- Hero Section with Logo and Title -->
        <div class="text-center mb-8 px-4 pt-8">
            <img src="{{ asset('images/logo.PNG') }}" alt="Botswana Landboard Logo" class="mx-auto mb-4 w-24 h-auto" />
            <h1 class="text-4xl font-bold text-[#1a365d] mb-2">
                eLAND Botswana
            </h1>
            <p class="text-lg text-[#2c5282]">
                Digital Land Application & Management System
            </p>
        </div>

        <!-- Top Row: 4 Horizontal Sections -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 w-full max-w-6xl px-4">
            <!-- System Overview -->
            <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">System Overview</h2>
                <p class="text-sm text-[#7f8c8d]">
                    The eLAND Botswana platform provides an efficient and transparent way for citizens to apply for land allocations. 
                    The system simplifies the land application process, enhances accessibility, and ensures better land management.
                </p>
            </div>

            <!-- Feature 1: Easy Application -->
            <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Easy Application</h3>
                <p class="text-sm text-[#7f8c8d]">
                    Apply for land online in just a few steps. No more waiting in long queues or filling out paper forms.
                </p>
            </div>

            <!-- Feature 2: Real-time Tracking -->
            <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Real-time Tracking</h3>
                <p class="text-sm text-[#7f8c8d]">
                    Monitor your application status in real-time. Get updates at every stage of the approval process.
                </p>
            </div>

            <!-- Contact Support -->
            <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">Contact Support</h2>
                <p class="text-sm text-[#7f8c8d] mb-2">
                    For any issues or inquiries, reach out to our support team:
                </p>
                <div class="space-y-1">
                    <p class="text-sm text-[#2c3e50]">
                        <strong>Email:</strong> <a href="mailto:support@elandbotswana.gov.bw" class="text-[#2980b9] hover:text-[#1f6f92] transition-all">support@elandbotswana.gov.bw</a>
                    </p>
                    <p class="text-sm text-[#2c3e50]">
                        <strong>Phone:</strong> +267 123 4567
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Row: 2 Horizontal Sections -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 w-full max-w-4xl px-4">
            <!-- FAQs -->
            <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">FAQs</h2>
                <ul class="text-sm text-[#7f8c8d] list-disc pl-4">
                    <li><strong>How do I apply for land?</strong> Simply register, log in, and follow the application steps on the dashboard.</li>
                    <li><strong>What documents do I need to submit?</strong> Proof of identity, proof of address, and any additional land-specific documentation.</li>
                    <li><strong>Can I track the status of my application?</strong> Yes, once you submit your application, you can track its status from your dashboard.</li>
                </ul>
            </div>

            <!-- News and Announcements -->
            <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">News & Announcements</h2>
                <p class="text-sm text-[#7f8c8d]">
                    Stay informed about upcoming land allocations, changes to the application process, and more:
                </p>
                <ul class="text-sm text-[#7f8c8d] list-disc pl-4">
                    <li><strong>Upcoming Land Allocation:</strong> The next allocation will take place in May 2025. Ensure your application is submitted before the deadline!</li>
                    <li><strong>System Updates:</strong> We will be undergoing a system update on April 5, 2025. The platform may be temporarily unavailable during this time.</li>
                </ul>
            </div>
        </div>
    </header>
</body>
</html>