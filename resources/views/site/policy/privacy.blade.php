@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm p-8 md:p-12">
            <h1 class="text-3xl md:text-4xl font-serif text-[#c0863d] mb-8 border-b border-gray-100 pb-4">Privacy Policy</h1>
            
            <div class="prose prose-stone max-w-none text-gray-600">
                <p class="mb-4">Your privacy is important to us. It is Jimmy's Whiskey's policy to respect your privacy regarding any information we may collect from you across our website.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">1. Information We Collect</h3>
                <p>We may ask for personal information, such as your name, email, address, and payment details, when you register an account or make a purchase. We only collect information by lawful and fair means and with your knowledge and consent.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">2. How We Use Information</h3>
                <p>We use the information we collect to:</p>
                <ul class="list-disc pl-5 space-y-2">
                    <li>Process your orders and manage your account.</li>
                    <li>Communicate with you regarding updates, offers, and services.</li>
                    <li>Improve our website and customer experience.</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">3. Data Security</h3>
                <p>We store your data securely and protect it within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use, or modification.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">4. Cookies</h3>
                <p>Our website uses cookies to enhance your browsing experience. You can choose to disable cookies through your browser settings, but this may affect the functionality of the site.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">5. Third-Party Sharing</h3>
                <p>We do not share any personally identifying information publicly or with third-parties, except when required to by law.</p>
                
                <p class="mt-8 text-sm text-gray-500">Last updated: {{ date('F Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
