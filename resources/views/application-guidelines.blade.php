<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Guidelines - eLAND Botswana</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="w-full flex flex-col items-center text-sm bg-cover bg-center py-8" style="background-image: url('{{ asset('images/background3.jpg') }}');">
        <div class="w-full max-w-6xl px-4">
            <div class="bg-white p-8 rounded-lg shadow-xl">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-[#1a365d]">Application Guidelines</h1>
                    <a href="/" class="text-[#2980b9] hover:text-[#1f6f92] font-medium">← Back to Home</a>
                </div>

                <div class="space-y-8">
                    <!-- Step 1 -->
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#1a365d] text-white flex items-center justify-center text-xl font-bold">1</div>
                        <div>
                            <h3 class="text-xl font-semibold text-[#1a365d] mb-2">Registration</h3>
                            <ol class="list-decimal pl-5 space-y-2 text-[#7f8c8d]">
                                <li>Click on the "Register" button at the top right of the homepage</li>
                                <li>Fill in your personal details (ID number, contact information)</li>
                                <li>Create a secure password</li>
                                <li>Log in to your new account</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#1a365d] text-white flex items-center justify-center text-xl font-bold">2</div>
                        <div>
                            <h3 class="text-xl font-semibold text-[#1a365d] mb-2">Land Application</h3>
                            <ol class="list-decimal pl-5 space-y-2 text-[#7f8c8d]">
                                <li>From your dashboard, click "New Application"</li>
                                <li>Choose your preferred location </li>
                                <li>Upload required documents (ID copy, proof of residence, etc.)</li>
                                <li>Review your application details</li>
                                <li>Submit your application</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#1a365d] text-white flex items-center justify-center text-xl font-bold">3</div>
                        <div>
                            <h3 class="text-xl font-semibold text-[#1a365d] mb-2">Application Tracking</h3>
                            <ol class="list-decimal pl-5 space-y-2 text-[#7f8c8d]">
                                <li>After submitting your application </li>
                                <li>Log in to your dashboard to view application status</li>
                                <li>The system will show current processing stage (received, under review, approved, etc.)</li>
                                <li>You'll receive notifications at each status change</li>
                                <li>If additional documents are required, you'll be notified</li>
                            </ol>
                        </div>
                    </div>

                    <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-100">
                        <h3 class="text-lg font-semibold text-[#1a365d] mb-2">Need Help?</h3>
                        <p class="text-[#7f8c8d]">Contact our support team at <a href="mailto:support@elandbotswana.gov.bw" class="text-[#2980b9]">support@elandbotswana.gov.bw</a> or call +267 123 4567 for assistance with your application.</p>
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
        </div>
    </header>

    <footer class="w-full py-4 bg-[#1a365d] text-white">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm">© 2025 eLAND Botswana. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>