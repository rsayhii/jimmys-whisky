@extends('layouts.app')

@section('title', 'Refill Request Details')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <a href="/user-refill-requests" class="hover:text-black transition">Refill Requests</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">#REF-8301</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-6">
                
                <div class="flex justify-between items-center mb-2">
                    <h1 class="text-2xl font-bold text-gray-900">Request Details</h1>
                </div>

                <!-- Request Status Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <!-- Status Icon -->
                            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-xl"></i>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Request Approved</h3>
                                        <p class="text-sm text-gray-500 mt-1">Updated on 21 Oct 2023, 02:15 PM</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">
                                        Approved
                                    </span>
                                </div>
                                
                                <!-- Admin Note Section -->
                                <div class="mt-4 bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <h4 class="text-sm font-bold text-gray-900 mb-2 flex items-center gap-2">
                                        <i class="fas fa-sticky-note text-gray-400"></i> Admin Note
                                    </h4>
                                    <p class="text-sm text-gray-700">
                                        "Your refill request has been approved. Our pickup executive will reach your location tomorrow between 10 AM - 2 PM. Please ensure the bottle is packed."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rejected Status Example (Commented out for reference) -->
                <!--
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-times text-red-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Request Rejected</h3>
                                        <p class="text-sm text-gray-500 mt-1">Updated on 21 Oct 2023, 02:15 PM</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700">
                                        Rejected
                                    </span>
                                </div>
                                <div class="mt-4 bg-red-50 rounded-lg p-4 border border-red-100">
                                    <h4 class="text-sm font-bold text-red-900 mb-2 flex items-center gap-2">
                                        <i class="fas fa-exclamation-circle text-red-500"></i> Rejection Reason
                                    </h4>
                                    <p class="text-sm text-red-800">
                                        "We cannot process this request as the bottle size selected does not match our records for this perfume. Please submit a new request with the correct size."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Perfume Details -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Perfume Details</h3>
                        <div class="flex gap-4">
                            <div class="w-20 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?q=80&w=300&auto=format&fit=crop" alt="Perfume" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Rose Prick</h4>
                                <p class="text-sm text-gray-600">Tom Ford</p>
                                <div class="mt-2 text-sm text-gray-500 space-y-1">
                                    <p>Bottle Size: <span class="font-medium text-gray-900">50ml</span></p>
                                    <p>Service: <span class="font-medium text-gray-900">Refill Service</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pickup Address -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Pickup & Delivery Address</h3>
                        <div class="flex gap-3">
                            <div class="mt-1 text-gray-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Home</p>
                                <p class="text-sm text-gray-600 mt-1">
                                    123, Green Park, New Delhi - 110016
                                </p>
                                <p class="text-sm text-gray-600 mt-1">+91 98765 43210</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Payment Summary</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Refill Cost</span>
                            <span class="font-medium text-green-600">FREE (Membership Benefit)</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Pickup & Delivery Charges</span>
                            <span class="font-medium text-gray-900">₹150</span>
                        </div>
                        <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-base">
                            <span>Total Amount</span>
                            <span>₹150</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 mt-4 text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i> Payment to be collected at the time of delivery.
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <a href="/user-refill-requests" class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition">
                        Back to Requests
                    </a>
                    <button class="px-6 py-3 rounded-lg bg-red-50 text-red-600 font-medium hover:bg-red-100 transition ml-auto">
                        Cancel Request
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection