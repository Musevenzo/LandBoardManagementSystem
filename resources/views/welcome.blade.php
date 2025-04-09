<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLAND Botswana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="w-full min-h-screen flex flex-col items-center text-sm bg-cover bg-center" style="background-image: url('{{ asset('images/background3.jpg') }}');">
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
        <div class="text-center mb-8 px-4 pt-16">
            <img src="{{ asset('images/logo.PNG') }}" alt="Botswana Landboard Logo" class="mx-auto mb-4 w-24 h-auto" />
            <h1 class="text-4xl font-bold text-[#1a365d] mb-2">
                eLAND Botswana
            </h1>
            <p class="text-lg text-[#2c5282]">
                Digital Land Application & Management System
            </p>
        </div>

        <!-- Main Content Grid -->
        <div class="flex flex-col md:flex-row w-full max-w-6xl px-4 gap-6 mb-6">
           <!-- Left Column - System Overview -->
<div class="w-full md:w-1/2">
    <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300 h-full">
        <h2 class="text-xl font-semibold text-[#1a365d] mb-2">System Overview</h2>
        <p class="text-sm text-[#7f8c8d] mb-4">
            The eLAND Botswana platform revolutionizes land administration by providing a comprehensive digital solution for land allocation and management. Our system offers:
        </p>
        <ul class="text-sm text-[#7f8c8d] list-disc pl-4 space-y-2">
            <li><strong>Transparent Application Process:</strong> Citizens can apply for land allocations online with full visibility into each stage of the process.</li>
            <li><strong>Efficient Workflow:</strong> Automated processes reduce manual paperwork and processing times significantly.</li>
            <li><strong>Centralized Database:</strong> All land records are securely stored in a unified digital repository for easy access and management.</li>
            <li><strong>Mobile Accessibility:</strong> The platform is accessible on various devices, enabling applications from anywhere in Botswana.</li>
            <li><strong>Secure Transactions:</strong> Robust security measures protect sensitive user data and land records.</li>
            <li><strong>Automated Notifications:</strong> Applicants receive real-time updates on their application status.</li>
        </ul>
        <p class="text-sm text-[#7f8c8d] mt-4">
            The system aligns with Botswana's Vision 2036 goals of digital transformation and efficient public service delivery, ensuring equitable access to land resources for all citizens.
        </p>
    </div>
</div>

            <!-- Right Column - Other Sections -->
            <div class="w-full md:w-1/2 flex flex-col gap-4">
               <!-- Feature 1: Easy Application -->
<div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
    <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Easy Application</h3>
    <p class="text-sm text-[#7f8c8d] mb-2">
        Apply for land online in just a few steps. No more waiting in long queues or filling out paper forms.
    </p>
    <a href="{{ route('application.guidelines') }}" class="text-[#2980b9] hover:text-[#1f6f92] text-sm font-medium transition-all">
        View Application Guidelines →
    </a>
</div>

                <!-- Real-time Tracking Section -->
                <div class="bg-[#ffffff] p-4 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                     <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Real-time Tracking</h3>
                     <p class="text-sm text-[#7f8c8d] mb-2"> Monitor your application status in real-time. Get updates at every stage of the approval process.</p>
                     <a href="{{ route('real.time.tracking') }}" class="text-[#2980b9] hover:text-[#1f6f92] text-sm font-medium transition-all">
                      Learn More About Real-Time Tracking →
                      </a>
                </div>

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
        </div>

        <!-- Bottom Section - Contact Information -->
        <div class="w-full max-w-6xl px-4 mb-6">
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
        

        <div class="w-full max-w-6xl px-4 mb-6 text-center">
         <a href="{{ route('register') }}" class="inline-block px-6 py-2 bg-[#27ae60] hover:bg-[#1d7f4d] text-white rounded-lg text-sm font-medium leading-normal transition-all duration-300 shadow-lg hover:shadow-xl">
          Register Now
         </a>
         </div>

        <!-- Footer Section -->
        <footer class="w-full py-4 bg-[#1a365d] text-white">
            <div class="container mx-auto px-4 text-center">
                <p class="text-sm">© 2025 eLAND Botswana. All rights reserved.</p>
                
            </div>
        </footer>
    </header>
</body>
</html>