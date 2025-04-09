<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Guidelines - eLAND Botswana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="w-full min-h-screen flex flex-col items-center text-sm bg-cover bg-center py-8" style="background-image: url('{{ asset('images/background3.jpg') }}');">
        <!-- Top-Right Buttons (Login and Register) -->
        <div class="absolute top-4 right-4 flex gap-4">
            <a href="/login" class="inline-block px-6 py-2 bg-[#2980b9] hover:bg-[#1f6f92] text-white rounded-lg text-sm font-medium leading-normal transition-all duration-300 shadow-lg hover:shadow-xl">
                Log in
            </a>
            <a href="/register" class="inline-block px-6 py-2 bg-[#27ae60] hover:bg-[#1d7f4d] text-white rounded-lg text-sm font-medium leading-normal transition-all duration-300 shadow-lg hover:shadow-xl">
                Register
            </a>
        </div>

        <!-- Hero Section with Logo and Title -->
        <div class="text-center mb-8 px-4 pt-16">
            <img src="{{ asset('images/logo.PNG') }}" alt="Botswana Landboard Logo" class="mx-auto mb-4 w-24 h-auto" />
            <h1 class="text-4xl font-bold text-[#1a365d] mb-2">Application Guidelines</h1>
            <p class="text-lg text-[#2c5282]">
                Step-by-step instructions for applying for land through eLAND Botswana.
            </p>
        </div>

        <!-- Main Content -->
        <div class="w-full max-w-6xl px-4">
            <div class="bg-[#ffffff] p-8 rounded-lg shadow-xl border border-[#ececec] hover:shadow-2xl transition-all duration-300">
                <!-- Back to Home Link -->
                <div class="flex justify-end mb-6">
                    <a href="/" class="text-[#2980b9] hover:text-[#1f6f92] font-medium">← Back to Home</a>
                </div>

                <!-- Registration Section -->
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">Step 1: Registration</h2>
                <p class="text-sm text-[#7f8c8d] mb-4">
                    To begin the land application process, you must first register for an account on the eLAND Botswana platform.
                </p>
                <ol class="text-sm text-[#7f8c8d] list-decimal pl-5 space-y-2 mb-6">
                    <li><strong>Access the Homepage:</strong> Visit the eLAND Botswana website.</li>
                    <li><strong>Click Register:</strong> Locate and click the "Register" button at the top-right corner of the homepage.</li>
                    <li><strong>Fill in Personal Details:</strong> Enter your personal information, including your ID number and contact details.</li>
                    <li><strong>Create Password:</strong> Set up a secure password for your account.</li>
                    <li><strong>Log In:</strong> After registration, log in to your new account using your email and password.</li>
                </ol>

                <!-- Land Application Section -->
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">Step 2: Land Application</h2>
                <p class="text-sm text-[#7f8c8d] mb-4">
                    Once registered, you can proceed with submitting your land application.
                </p>
                <ol class="text-sm text-[#7f8c8d] list-decimal pl-5 space-y-2 mb-6">
                    <li><strong>Dashboard Access:</strong> Log in to your dashboard.</li>
                    <li><strong>New Application:</strong> Click the "New Application" button.</li>
                    <li><strong>Select Location:</strong> Choose your preferred location for the land allocation.</li>
                    <li><strong>Upload Documents:</strong> Upload required documents such as ID copy, proof of residence, and any additional land-specific documentation.</li>
                    <li><strong>Review Details:</strong> Carefully review all the details of your application to ensure accuracy.</li>
                    <li><strong>Submit Application:</strong> Once satisfied, submit your application.</li>
                </ol>

                <!-- Application Tracking Section -->
                <h2 class="text-xl font-semibold text-[#1a365d] mb-2">Step 3: Application Tracking</h2>
                <p class="text-sm text-[#7f8c8d] mb-4">
                    After submitting your application, you can track its progress in real-time.
                </p>
                <ol class="text-sm text-[#7f8c8d] list-decimal pl-5 space-y-2 mb-6">
                    <li><strong>Log In:</strong> Log in to your dashboard to view the status of your application.</li>
                    <li><strong>View Status:</strong> The system will display the current processing stage (e.g., received, under review, approved).</li>
                    <li><strong>Notifications:</strong> You will receive real-time updates and notifications at each stage of the approval process.</li>
                    <li><strong>Additional Documents:</strong> If any additional documents are required, you will be notified promptly.</li>
                </ol>

                <!-- Need Help Section -->
                <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Need Help?</h3>
                    <p class="text-[#7f8c8d]">
                        If you have any questions about the application process, contact our support team at 
                        <a href="mailto:support@elandbotswana.gov.bw" class="text-[#2980b9]">support@elandbotswana.gov.bw</a> 
                        or call +267 123 4567 for assistance.
                    </p>
                </div>

                <!-- Register Button Section -->
                <div class="text-center mt-8">
                    <a href="/register" class="inline-block px-6 py-3 bg-[#1a365d] text-white font-medium rounded-lg hover:bg-[#142d4a] transition duration-200">
                        Register Now
                    </a>
                    <p class="mt-2 text-sm text-gray-600">Don't have an account yet? Register to start your land application process.</p>
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