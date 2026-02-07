@extends('layouts.app')

@section('title', 'New Refill Request')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <a href="/user-refill-requests" class="hover:text-black transition">Refill Requests</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">New Request</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-6">
                
                <div class="flex justify-between items-center mb-2">
                    <h1 class="text-2xl font-bold text-gray-900">New Refill Request</h1>
                </div>

                <!-- Request Form -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 md:p-8">
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            
                            <!-- Perfume Selection -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-info-circle text-blue-600 mt-1"></i>
                                    <div>
                                        <h4 class="font-medium text-blue-900">Refill Process Information</h4>
                                        <p class="text-sm text-blue-700 mt-1">
                                            Please note: You need to hand over your empty perfume bottle or box to our pickup executive. 
                                            The refill service is free of charge for members; you only pay for pickup and delivery.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Select Perfume</label>
                                <select class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-black focus:ring-1 focus:ring-black transition bg-white">
                                    <option value="" disabled selected>Choose a perfume to refill</option>
                                    <option value="1">Santal 33 - Le Labo</option>
                                    <option value="2">Baccarat Rouge 540 - Maison Francis Kurkdjian</option>
                                    <option value="3">Aventus - Creed</option>
                                    <option value="4">Bleu de Chanel - Chanel</option>
                                </select>
                                <p class="mt-1 text-xs text-gray-500">Only perfumes previously purchased or registered can be refilled.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Bottle Size -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bottle Size</label>
                                    <select class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-black focus:ring-1 focus:ring-black transition bg-white">
                                        <option value="50">50ml</option>
                                        <option value="100" selected>100ml</option>
                                        <option value="200">200ml</option>
                                    </select>
                                </div>

                                <!-- Preferred Date -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Pickup Date</label>
                                    <input type="date" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-black focus:ring-1 focus:ring-black transition">
                                </div>
                            </div>

                            <!-- Pickup Address -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pickup Address</label>
                                <div class="border border-gray-200 rounded-lg p-4 flex items-start gap-4 hover:border-black cursor-pointer transition bg-gray-50">
                                    <input type="radio" name="address" checked class="mt-1 text-black focus:ring-black">
                                    <div>
                                        <span class="block font-medium text-gray-900">Home</span>
                                        <span class="block text-sm text-gray-500 mt-1">
                                            123, Green Park, New Delhi - 110016<br>
                                            +91 98765 43210
                                        </span>
                                    </div>
                                    <button type="button" class="ml-auto text-sm text-indigo-600 font-medium hover:underline">Change</button>
                                </div>
                            </div>

                          

                            <!-- Summary & Action -->
                            <div class="bg-gray-50 rounded-lg p-6 mt-8">
                                <h4 class="font-medium text-gray-900 mb-4">Estimated Cost Summary</h4>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Refill Cost</span>
                                        <span class="font-medium text-green-600">FREE (Membership Benefit)</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Pickup & Delivery Charges</span>
                                        <span class="font-medium">₹150</span>
                                    </div>
                                    <div class="border-t border-gray-200 my-2 pt-2 flex justify-between font-bold text-base">
                                        <span>Total Payable</span>
                                        <span>₹150</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-4 mb-6">
                                    * Payment will be collected upon delivery. Please ensure the empty bottle/box is packed securely for pickup.
                                </p>
                                
                                <div class="flex gap-4">
                                    <a href="/user-refill-requests" class="w-1/3 px-6 py-3 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition text-center">
                                        Cancel
                                    </a>
                                    <button type="submit" class="w-2/3 bg-black text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-800 transition shadow-lg shadow-gray-200">
                                        Submit Request
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection