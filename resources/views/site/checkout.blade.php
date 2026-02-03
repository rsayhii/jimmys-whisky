@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 lg:px-12 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <a href="/cart" class="hover:text-black transition">Cart</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">Checkout</span>
        </nav>

        <h1 class="text-3xl md:text-4xl font-serif text-[#c0863d] mb-8">Checkout</h1>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            
            <!-- Checkout Form -->
            <div class="w-full lg:w-2/3 space-y-8">
                
                <!-- Contact Information -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-[#c0863d] text-white flex items-center justify-center text-sm">1</span>
                        Contact Information
                    </h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" value="rahul.jain@example.com" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" id="newsletter" checked class="text-[#c0863d] focus:ring-[#c0863d] rounded border-gray-300">
                            <label for="newsletter" class="text-sm text-gray-600">Email me with news and offers</label>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-[#c0863d] text-white flex items-center justify-center text-sm">2</span>
                        Shipping Address
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" value="Rahul" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" value="Jain" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input type="text" value="123, Green Park" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Apartment, suite, etc. (optional)</label>
                            <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                            <input type="text" value="New Delhi" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                            <select class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition bg-white">
                                <option>Delhi</option>
                                <option>Maharashtra</option>
                                <option>Karnataka</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">PIN Code</label>
                            <input type="text" value="110016" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" value="+91 98765 43210" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-[#c0863d] text-white flex items-center justify-center text-sm">3</span>
                        Payment Method
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- UPI -->
                        <div class="border border-gray-200 rounded-lg p-4 flex items-center gap-4 hover:border-[#c0863d] cursor-pointer transition bg-gray-50">
                            <input type="radio" name="payment" id="upi" checked class="text-[#c0863d] focus:ring-[#c0863d]">
                            <label for="upi" class="flex-1 cursor-pointer flex justify-between items-center">
                                <span class="font-medium text-gray-900">UPI (Google Pay / PhonePe / Paytm)</span>
                                <i class="fas fa-mobile-alt text-gray-400"></i>
                            </label>
                        </div>

                        <!-- Card -->
                        <div class="border border-gray-200 rounded-lg p-4 flex items-center gap-4 hover:border-[#c0863d] cursor-pointer transition">
                            <input type="radio" name="payment" id="card" class="text-[#c0863d] focus:ring-[#c0863d]">
                            <label for="card" class="flex-1 cursor-pointer flex justify-between items-center">
                                <span class="font-medium text-gray-900">Credit / Debit Card</span>
                                <div class="flex gap-2 text-gray-400">
                                    <i class="fab fa-cc-visa"></i>
                                    <i class="fab fa-cc-mastercard"></i>
                                </div>
                            </label>
                        </div>

                        <!-- COD -->
                        <div class="border border-gray-200 rounded-lg p-4 flex items-center gap-4 hover:border-[#c0863d] cursor-pointer transition">
                            <input type="radio" name="payment" id="cod" class="text-[#c0863d] focus:ring-[#c0863d]">
                            <label for="cod" class="flex-1 cursor-pointer flex justify-between items-center">
                                <span class="font-medium text-gray-900">Cash on Delivery</span>
                                <i class="fas fa-money-bill-wave text-gray-400"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="/cart" class="text-[#c0863d] hover:text-[#a87533] font-medium transition flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i> Return to Cart
                    </a>
                    <button class="bg-[#c0863d] text-white px-8 py-3 rounded-lg font-bold hover:bg-[#a87533] transition shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform duration-200">
                        Pay Now
                    </button>
                </div>

            </div>

            <!-- Order Summary Sidebar -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b border-gray-100">Order Summary</h2>
                    
                    <!-- Items -->
                    <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2 pt-2 custom-scrollbar">
                        <div class="flex gap-4">
                            <div class="w-16 h-16 bg-gray-50 rounded border border-gray-100 relative">
                                <img src="{{ asset('assets/collection/1.jpg') }}" class="w-full h-full object-cover rounded">
                                <span class="absolute -top-2 -right-2 bg-gray-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">1</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-900 line-clamp-2">MUKH RANJAN™ DANT MANJAN</h4>
                                <p class="text-xs text-gray-500 mt-1">100g</p>
                            </div>
                            <div class="text-sm font-medium text-gray-900">₹60.00</div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-16 h-16 bg-gray-50 rounded border border-gray-100 relative">
                                <img src="{{ asset('assets/collection/2.jpg') }}" class="w-full h-full object-cover rounded">
                                <span class="absolute -top-2 -right-2 bg-gray-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">1</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-900 line-clamp-2">KESAR FACE CREAM</h4>
                                <p class="text-xs text-gray-500 mt-1">50ml</p>
                            </div>
                            <div class="text-sm font-medium text-gray-900">₹450.00</div>
                        </div>
                    </div>

                    <!-- Free Membership Promo -->
                    <div class="bg-gradient-to-r from-[#c0863d]/10 to-transparent border border-[#c0863d]/20 rounded-lg p-3 mb-6 flex items-center justify-between relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-[#c0863d]/10 rounded-full -mr-8 -mt-8 blur-xl"></div>
                        <div class="flex items-center gap-3 relative z-10">
                            <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-[#c0863d] border border-[#c0863d]/20">
                                <i class="fas fa-crown text-lg"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 flex items-center gap-2">
                                    Premium Membership
                                    <span class="text-[10px] bg-[#c0863d] text-white px-1.5 py-0.5 rounded font-medium">FREE</span>
                                </h4>
                                <p class="text-xs text-[#c0863d] font-medium">Worth ₹1,699 • First 1000 Users Only</p>
                            </div>
                        </div>
                    </div>

                    <!-- Costs -->
                    <div class="space-y-3 text-sm text-gray-600 mb-6 pt-4 border-t border-gray-100">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-medium text-gray-900">₹510.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span class="font-medium text-gray-900">₹60.00</span>
                        </div>
                        <div class="flex justify-between text-green-600">
                            <span>Discount</span>
                            <span class="font-medium">-₹0.00</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center py-4 border-t border-gray-100 mb-6">
                        <span class="text-base font-bold text-gray-900">Total</span>
                        <div class="text-right">
                            <span class="text-xs text-gray-500 block font-normal">INR</span>
                            <span class="text-2xl font-bold text-[#c0863d]">₹570.00</span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4 text-xs text-gray-500 leading-relaxed">
                        By proceeding with your purchase you agree to our <a href="#" class="underline hover:text-black">Terms and Conditions</a> and <a href="#" class="underline hover:text-black">Privacy Policy</a>.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection