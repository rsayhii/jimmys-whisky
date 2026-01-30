@extends('layouts.app')

@section('title', 'Contact Us - Parcos')

@section('content')

<!-- Hero Section -->
<div class="relative bg-gray-50 py-16 sm:py-24">
    <div class="absolute inset-0 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1596436066266-93049b4918a5?q=80&w=2070&auto=format&fit=crop" 
             alt="Contact Background" 
             class="w-full h-full object-cover opacity-10">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-serif text-[#c0863d] mb-4">Contact Us</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            We'd love to hear from you. Whether you have a question about our products, orders, or just want to say hello, we're here to help.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
        
        <!-- Contact Information -->
        <div class="space-y-8">
            <div>
                <h2 class="text-2xl font-serif text-gray-900 mb-6">Get in Touch</h2>
                <p class="text-gray-600 mb-8">
                    Our team is available Monday to Friday, 9:00 AM to 6:00 PM to assist you with any inquiries.
                </p>
            </div>

            <div class="space-y-6">
                <!-- Address -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#c0863d]/10 flex items-center justify-center text-[#c0863d]">
                        <i class="fas fa-map-marker-alt text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900">Visit Us</h3>
                        <p class="text-gray-600 mt-1">
                            123 Perfume Avenue, Luxury District<br>
                            Mumbai, Maharashtra 400001
                        </p>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#c0863d]/10 flex items-center justify-center text-[#c0863d]">
                        <i class="fas fa-phone-alt text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900">Call Us</h3>
                        <p class="text-gray-600 mt-1">+91 93830 02793</p>
                        <p class="text-sm text-gray-500 mt-1">Mon-Fri from 9am to 6pm</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#c0863d]/10 flex items-center justify-center text-[#c0863d]">
                        <i class="fas fa-envelope text-lg"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900">Email Us</h3>
                        <p class="text-gray-600 mt-1">support@parcos.com</p>
                        <p class="text-gray-600">info@parcos.com</p>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="pt-8 border-t border-gray-100">
                <h3 class="font-medium text-gray-900 mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#c0863d] hover:text-white transition-all duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#c0863d] hover:text-white transition-all duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#c0863d] hover:text-white transition-all duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#c0863d] hover:text-white transition-all duration-300">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <h2 class="text-2xl font-serif text-gray-900 mb-6">Send us a Message</h2>
            <form action="#" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#c0863d] focus:border-transparent outline-none transition-all" placeholder="John Doe">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#c0863d] focus:border-transparent outline-none transition-all" placeholder="john@example.com">
                    </div>
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                    <select id="subject" name="subject" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#c0863d] focus:border-transparent outline-none transition-all">
                        <option value="">Select a subject</option>
                        <option value="order">Order Inquiry</option>
                        <option value="product">Product Information</option>
                        <option value="return">Returns & Exchanges</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#c0863d] focus:border-transparent outline-none transition-all" placeholder="How can we help you?"></textarea>
                </div>

                <button type="button" class="w-full bg-[#c0863d] text-white font-medium py-3.5 rounded-lg hover:bg-[#a87533] transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 duration-200">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="w-full h-96 bg-gray-200">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.7327092329385!2d72.825833!3d19.075983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDA0JzMzLjUiTiA3MsKwNDknMzMuMCJF!5e0!3m2!1sen!2sin!4v1635764839000!5m2!1sen!2sin" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
    </iframe>
</div>

@endsection