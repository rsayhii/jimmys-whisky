@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="bg-white min-h-screen py-10">
    <div class="container mx-auto px-4 lg:px-12 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">Your Cart</span>
        </nav>

        <h1 class="text-3xl md:text-4xl font-serif text-[#c0863d] mb-8">Shopping Cart</h1>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            
            <!-- Cart Items -->
            <div class="w-full lg:w-2/3">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Table Header (Hidden on Mobile) -->
                    <div class="hidden md:grid grid-cols-12 gap-4 p-4 bg-gray-50 border-b border-gray-100 text-sm font-medium text-gray-500 uppercase tracking-wider">
                        <div class="col-span-6">Product</div>
                        <div class="col-span-2 text-center">Price</div>
                        <div class="col-span-2 text-center">Quantity</div>
                        <div class="col-span-2 text-right">Total</div>
                    </div>

                    <!-- Cart Item 1 -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-4 p-6 border-b border-gray-100 items-center">
                        <!-- Product Info -->
                        <div class="col-span-1 md:col-span-6 flex gap-4">
                            <div class="w-24 h-24 flex-shrink-0 bg-gray-50 rounded-md overflow-hidden border border-gray-100">
                                <img src="{{ asset('assets/collection/1.jpg') }}" alt="MUKH RANJAN" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col justify-between py-1">
                                <div>
                                    <h3 class="font-medium text-gray-900 text-lg leading-tight">MUKH RANJAN™ DANT MANJAN</h3>
                                    <p class="text-sm text-gray-500 mt-1">Size: 100g</p>
                                </div>
                                <button class="text-xs text-red-500 hover:text-red-700 underline decoration-1 underline-offset-2 transition-colors w-fit md:hidden">Remove</button>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="col-span-1 md:col-span-2 md:text-center flex justify-between md:block">
                            <span class="md:hidden text-gray-500">Price:</span>
                            <span class="text-gray-900 font-medium">₹60.00</span>
                        </div>

                        <!-- Quantity -->
                        <div class="col-span-1 md:col-span-2 flex justify-between md:justify-center items-center">
                            <span class="md:hidden text-gray-500">Quantity:</span>
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition rounded-l-lg">-</button>
                                <input type="text" value="1" class="w-10 text-center text-sm text-gray-900 focus:outline-none border-x border-gray-300 py-1" readonly>
                                <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition rounded-r-lg">+</button>
                            </div>
                        </div>

                        <!-- Total & Remove (Desktop) -->
                        <div class="col-span-1 md:col-span-2 flex justify-between md:flex-col md:items-end md:gap-2">
                            <span class="md:hidden text-gray-500">Total:</span>
                            <div class="text-right">
                                <span class="text-gray-900 font-bold">₹60.00</span>
                                <button class="hidden md:block text-xs text-red-500 hover:text-red-700 mt-1 ml-auto underline decoration-1 underline-offset-2 transition-colors">Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 2 (Example) -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-4 p-6 border-b border-gray-100 items-center">
                        <div class="col-span-1 md:col-span-6 flex gap-4">
                            <div class="w-24 h-24 flex-shrink-0 bg-gray-50 rounded-md overflow-hidden border border-gray-100">
                                <img src="{{ asset('assets/collection/2.jpg') }}" alt="KESAR FACE CREAM" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col justify-between py-1">
                                <div>
                                    <h3 class="font-medium text-gray-900 text-lg leading-tight">KESAR FACE CREAM</h3>
                                    <p class="text-sm text-gray-500 mt-1">Size: 50ml</p>
                                </div>
                                <button class="text-xs text-red-500 hover:text-red-700 underline decoration-1 underline-offset-2 transition-colors w-fit md:hidden">Remove</button>
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2 md:text-center flex justify-between md:block">
                            <span class="md:hidden text-gray-500">Price:</span>
                            <span class="text-gray-900 font-medium">₹450.00</span>
                        </div>

                        <div class="col-span-1 md:col-span-2 flex justify-between md:justify-center items-center">
                            <span class="md:hidden text-gray-500">Quantity:</span>
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition rounded-l-lg">-</button>
                                <input type="text" value="1" class="w-10 text-center text-sm text-gray-900 focus:outline-none border-x border-gray-300 py-1" readonly>
                                <button class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition rounded-r-lg">+</button>
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2 flex justify-between md:flex-col md:items-end md:gap-2">
                            <span class="md:hidden text-gray-500">Total:</span>
                            <div class="text-right">
                                <span class="text-gray-900 font-bold">₹450.00</span>
                                <button class="hidden md:block text-xs text-red-500 hover:text-red-700 mt-1 ml-auto underline decoration-1 underline-offset-2 transition-colors">Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="p-6 bg-gray-50 flex flex-wrap gap-4 justify-between items-center">
                        <div class="relative w-full md:w-auto">
                            <input type="text" placeholder="Coupon Code" class="w-full md:w-64 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                            <button class="absolute right-1 top-1 bg-black text-white px-4 py-1.5 rounded-md text-sm font-medium hover:bg-gray-800 transition">Apply</button>
                        </div>
                        <button class="text-gray-600 hover:text-black font-medium transition flex items-center gap-2">
                            <i class="fas fa-trash-alt"></i> Clear Cart
                        </button>
                    </div>
                </div>
                
                <div class="mt-8">
                    <a href="/collection" class="inline-flex items-center gap-2 text-[#c0863d] hover:text-[#a87533] font-medium transition">
                        <i class="fas fa-arrow-left"></i> Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b border-gray-100">Order Summary</h2>
                    
                    <div class="space-y-4 text-sm text-gray-600 mb-6">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-medium text-gray-900">₹510.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping Estimate</span>
                            <span class="font-medium text-gray-900">₹60.00</span>
                        </div>
                        <div class="flex justify-between text-green-600">
                            <span>Discount</span>
                            <span class="font-medium">-₹0.00</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center py-4 border-t border-gray-100 mb-6">
                        <span class="text-base font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-bold text-[#c0863d]">₹570.00</span>
                    </div>

                    <a href="/checkout" class="block w-full bg-[#c0863d] text-white py-4 rounded-lg font-bold text-lg hover:bg-[#a87533] transition-all shadow-lg hover:shadow-xl hover:-translate-y-1 text-center">
                        Proceed to Checkout
                    </a>

                    <div class="mt-6 flex justify-center gap-4 text-gray-400 text-2xl">
                        <i class="fab fa-cc-visa hover:text-[#1A1F71] transition"></i>
                        <i class="fab fa-cc-mastercard hover:text-[#EB001B] transition"></i>
                        <i class="fab fa-cc-amex hover:text-[#006FCF] transition"></i>
                        <i class="fab fa-google-pay hover:text-[#EA4335] transition"></i>
                    </div>
                    
                    <p class="text-xs text-gray-400 text-center mt-6">
                        Secure Checkout - SSL Encrypted
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection