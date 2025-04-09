<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Tracking - eLAND Botswana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="w-full min-h-screen flex flex-col items-center text-sm bg-cover bg-center" style="background-image: url('{{ asset('images/background3.jpg') }}');">
        <!-- Top-Right Buttons (Login and Register) -->
        <div class="absolute top-4 right-4 flex gap-4">
            <a href="{{ route('login') }}" class="inline-block px-6 py-2 bg-[#2980b9] hover:bg-[#1f6f92] text-white rounded-lg text-sm font-medium leading-normal transition-all duration-300 shadow-lg hover:shadow-xl">
                Log in
            </a>
            <a href="{{ route('register') }}" class="inline-block px-6 py-2 bg-[#27ae60] hover:bg-[#1d7f4d] text-white rounded-lg text-sm font-medium leading-normal transition-all duration-300 shadow-lg hover:shadow-xl">
                Register
            </a>
        </div>

        <!-- Hero Section with Logo and Title -->
        <div class="text-center mb-8 px-4 pt-16">
            <img src="{{ asset('images/logo.PNG') }}" alt="Botswana Landboard Logo" class="mx-auto mb-4 w-24 h-auto" />
            <h1 class="text-4xl font-bold text-[#1a365d] mb-2">Real-Time Tracking</h1>
            <p class="text-lg text-[#2c5282]">
                Learn more about how real-time tracking works in eLAND Botswana.
            </p>
        </div>

        <!-- Main Content -->
        <div class="w-full max-w-6xl px-4">
            <div class="bg-[#ffffff] p-8 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <!-- Back to Home Link -->
                <div class="flex justify-end mb-6">
                    <a href="/" class="text-[#2980b9] hover:text-[#1f6f92] font-medium">← Back to Home</a>
                </div>

                <!-- What is Real-Time Tracking? -->
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">What is Real-Time Tracking?</h2>
                <p class="text-sm text-[#7f8c8d] mb-4">
                    Real-time tracking allows applicants to monitor the status of their land applications as they progress through various stages of the approval process. This feature ensures transparency and keeps applicants informed at all times. With real-time updates, users can see exactly where their application stands without needing to contact support or visit an office.
                </p>

                <!-- Why is it Important? -->
                <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Why is it Important?</h3>
                <ul class="text-sm text-[#7f8c8d] list-disc pl-4 space-y-2 mb-6">
                    <li><strong>Transparency:</strong> Applicants can see exactly where their application stands, reducing uncertainty.</li>
                    <li><strong>Efficiency:</strong> Reduces the need for manual follow-ups and inquiries, saving time for both applicants and administrators.</li>
                    <li><strong>User Trust:</strong> Builds confidence in the system by keeping users informed throughout the process.</li>
                    <li><strong>Accountability:</strong> Ensures that each stage of the application process is documented and visible to the applicant.</li>
                </ul>

                <!-- How Does It Work? -->
                <h3 class="text-lg font-semibold text-[#1a365d] mb-2">How Does Real-Time Tracking Work?</h3>
                <p class="text-sm text-[#7f8c8d] mb-4">
                    The real-time tracking system is integrated into the eLAND Botswana platform and provides updates at every stage of the application process. Here’s how it works:
                </p>
                <ol class="text-sm text-[#7f8c8d] list-decimal pl-5 space-y-2 mb-6">
                    <li><strong>Submission:</strong> Once you submit your application, it enters the system and is marked as "Received."</li>
                    <li><strong>Under Review:</strong> Your application is reviewed by the relevant authorities, and its status is updated accordingly.</li>
                    <li><strong>Approval/Denial:</strong> After the review, your application is either approved or denied, and you are notified immediately.</li>
                    <li><strong>Notifications:</strong> You receive automated notifications via email or SMS at every stage of the process.</li>
                </ol>

                <!-- Benefits of Real-Time Tracking -->
                <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Benefits of Real-Time Tracking</h3>
                <ul class="text-sm text-[#7f8c8d] list-disc pl-4 space-y-2 mb-6">
                    <li><strong>Convenience:</strong> No need to visit offices or make phone calls to check your application status.</li>
                    <li><strong>Time-Saving:</strong> Reduces delays caused by manual inquiries and follow-ups.</li>
                    <li><strong>Improved Communication:</strong> Keeps applicants informed with clear and timely updates.</li>
                    <li><strong>Enhanced Accountability:</strong> Ensures that the application process is transparent and traceable.</li>
                </ul>

                <!-- Need Help Section -->
                <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Need Help?</h3>
                    <p class="text-[#7f8c8d]">
                        If you have any questions about real-time tracking or the application process, contact our support team at 
                        <a href="mailto:support@elandbotswana.gov.bw" class="text-[#2980b9]">support@elandbotswana.gov.bw</a> 
                        or call +267 123 4567 for assistance.
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="w-full py-4 bg-[#1a365d] text-white mt-8">
            <div class="container mx-auto px-4 text-center">
                <p class="text-sm">© 2025 eLAND Botswana. All rights reserved.</p>
            </div>
        </footer>
    </header>
</body>
</html>