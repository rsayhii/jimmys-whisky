@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="bg-gray-50 min-h-screen py-6 md:py-10">
    <div class="container mx-auto px-4 lg:px-12 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-6 md:mb-8 text-xs md:text-sm text-gray-500 overflow-x-auto whitespace-nowrap pb-2 md:pb-0">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <a href="/cart" class="hover:text-black transition">Cart</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">Checkout</span>
        </nav>

        <h1 class="text-2xl md:text-4xl font-serif text-[#c0863d] mb-6 md:mb-8">Checkout</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="flex flex-col-reverse lg:flex-row gap-8 lg:gap-12">
            
            <!-- Checkout Form -->
            <div class="w-full lg:w-2/3">
                @guest
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8 text-center py-10 md:py-12">
                    <div class="w-16 h-16 bg-[#c0863d]/10 rounded-full flex items-center justify-center mx-auto mb-6 text-[#c0863d]">
                        <i class="fas fa-user-lock text-2xl"></i>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Login Required</h2>
                    <p class="text-sm md:text-base text-gray-500 mb-8 max-w-md mx-auto">Please log in to your account to complete your purchase and track your order.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('login') }}?redirect=checkout" class="w-full sm:w-auto bg-[#c0863d] text-white px-8 py-3 rounded-lg font-bold hover:bg-[#a87533] transition shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform duration-200">
                            Log In
                        </a>
                        <a href="{{ route('signup') }}?redirect=checkout" class="w-full sm:w-auto bg-white text-gray-900 border border-gray-200 px-8 py-3 rounded-lg font-bold hover:bg-gray-50 transition">
                            Create Account
                        </a>
                    </div>
                </div>
                @else
                <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6 md:space-y-8">
                    @csrf
                    
                    <!-- Contact Information -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 md:p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-[#c0863d] text-white flex items-center justify-center text-sm">1</span>
                            Contact Information
                        </h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="newsletter" id="newsletter" checked class="text-[#c0863d] focus:ring-[#c0863d] rounded border-gray-300">
                                <label for="newsletter" class="text-sm text-gray-600">Email me with news and offers</label>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 md:p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-[#c0863d] text-white flex items-center justify-center text-sm">2</span>
                            Shipping Address
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name', $user ? explode(' ', $user->name, 2)[0] : '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name', $user ? (explode(' ', $user->name, 2)[1] ?? '') : '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <input type="text" name="address" value="{{ old('address', $defaultAddress->address_line1 ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Apartment, suite, etc. (optional)</label>
                                <input type="text" name="apartment" value="{{ old('apartment', $defaultAddress->address_line2 ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                <input type="text" name="city" value="{{ old('city', $defaultAddress->city ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                                <select name="state" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition bg-white" required>
                                    <option value="">Select State</option>
                                    @foreach(['Andaman and Nicobar Islands', 'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chandigarh', 'Chhattisgarh', 'Dadra and Nagar Haveli and Daman and Diu', 'Delhi', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu and Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Ladakh', 'Lakshadweep', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Puducherry', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 'Uttar Pradesh', 'Uttarakhand', 'West Bengal'] as $state)
                                        <option value="{{ $state }}" {{ (old('state', $defaultAddress->state ?? '') == $state) ? 'selected' : '' }}>{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">PIN Code</label>
                                <input type="text" name="pincode" value="{{ old('pincode', $defaultAddress->postal_code ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone', $defaultAddress->phone ?? $user->phone ?? '') }}" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 md:p-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-[#c0863d] text-white flex items-center justify-center text-sm">3</span>
                            Payment Method
                        </h2>
                        
                        <div class="space-y-4">
                            <!-- UPI -->
                            <div class="border border-gray-200 rounded-lg p-3 md:p-4 flex items-center gap-4 opacity-60 cursor-not-allowed transition bg-gray-50">
                                <input type="radio" name="payment" value="upi" id="upi" disabled class="text-gray-400 border-gray-300 focus:ring-0 cursor-not-allowed">
                                <label for="upi" class="flex-1 cursor-not-allowed flex justify-between items-center">
                                    <span class="font-medium text-gray-500 text-sm md:text-base">UPI (Google Pay / PhonePe / Paytm) <span class="text-xs text-red-500 font-normal ml-1 block sm:inline">(Unavailable)</span></span>
                                    <i class="fas fa-mobile-alt text-gray-400"></i>
                                </label>
                            </div>

                            <!-- Card -->
                            <div class="border border-gray-200 rounded-lg p-3 md:p-4 flex items-center gap-4 opacity-60 cursor-not-allowed transition bg-gray-50">
                                <input type="radio" name="payment" value="card" id="card" disabled class="text-gray-400 border-gray-300 focus:ring-0 cursor-not-allowed">
                                <label for="card" class="flex-1 cursor-not-allowed flex justify-between items-center">
                                    <span class="font-medium text-gray-500 text-sm md:text-base">Credit / Debit Card <span class="text-xs text-red-500 font-normal ml-1 block sm:inline">(Unavailable)</span></span>
                                    <div class="flex gap-2 text-gray-400">
                                        <i class="fab fa-cc-visa"></i>
                                        <i class="fab fa-cc-mastercard"></i>
                                    </div>
                                </label>
                            </div>

                            <!-- COD -->
                            <div class="border border-[#c0863d] rounded-lg p-3 md:p-4 flex items-center gap-4 cursor-pointer transition bg-orange-50/30">
                                <input type="radio" name="payment" value="cod" id="cod" checked class="text-[#c0863d] focus:ring-[#c0863d]">
                                <label for="cod" class="flex-1 cursor-pointer flex justify-between items-center">
                                    <span class="font-medium text-gray-900 text-sm md:text-base">Cash on Delivery</span>
                                    <i class="fas fa-money-bill-wave text-gray-400"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row justify-between items-center pt-4 gap-4">
                        <a href="/cart" class="w-full sm:w-auto text-[#c0863d] hover:text-[#a87533] font-medium transition flex items-center justify-center sm:justify-start gap-2 py-3 sm:py-0 border border-gray-200 sm:border-0 rounded-lg sm:rounded-none">
                            <i class="fas fa-arrow-left"></i> Return to Cart
                        </a>
                        @if($hasOutOfStock ?? false)
                            <div class="flex flex-col items-end w-full sm:w-auto">
                                <span class="text-red-600 text-sm font-bold mb-2">Some items are out of stock</span>
                                <button type="button" disabled class="w-full sm:w-auto bg-gray-400 cursor-not-allowed text-white px-8 py-3 rounded-lg font-bold shadow-none">
                                    Pay Now
                                </button>
                            </div>
                        @else
                            <button type="submit" class="w-full sm:w-auto bg-[#c0863d] text-white px-8 py-3 rounded-lg font-bold hover:bg-[#a87533] transition shadow-lg hover:shadow-xl hover:-translate-y-0.5 transform duration-200">
                                Pay Now
                            </button>
                        @endif
                    </div>
                </form>
                @endguest
            </div>

            <!-- Order Summary Sidebar -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 md:p-6 lg:sticky lg:top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b border-gray-100">Order Summary</h2>
                    
                    <!-- Items -->
                    <div class="space-y-4 mb-6 max-h-60 overflow-y-auto pr-2 pt-2 custom-scrollbar">
                        @foreach($cart as $id => $item)
                        @php
                            $stock = $cartItemsStock[$id] ?? 0;
                            $isOutOfStock = $stock < $item['quantity'];
                        @endphp
                        <div class="flex gap-4 {{ $isOutOfStock ? 'opacity-50' : '' }}">
                            <div class="w-16 h-16 bg-gray-50 rounded border border-gray-100 relative">
                                <img src="{{ asset('storage/' . $item['image']) }}" class="w-full h-full object-cover rounded">
                                <span class="absolute -top-2 -right-2 bg-gray-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">{{ $item['quantity'] }}</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-900 line-clamp-2">{{ $item['name'] }}</h4>
                                @if(isset($item['concentration']))
                                <p class="text-xs text-gray-500 mt-1">{{ $item['concentration'] }}</p>
                                @endif
                                @if($isOutOfStock)
                                    <p class="text-xs text-red-600 font-bold mt-1">Out of Stock (Available: {{ $stock }})</p>
                                @endif
                            </div>
                            <div class="text-sm font-medium text-gray-900">₹{{ number_format($item['price'], 2) }}</div>
                        </div>
                        @endforeach
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

                    <!-- Coupon Code -->
                    <div class="mb-6">
                        @if(session()->has('coupon'))
                        <div class="flex items-center justify-between bg-green-50 border border-green-200 text-green-700 px-3 py-2 rounded-lg text-sm">
                            <span>Code: <strong>{{ session('coupon')['code'] }}</strong></span>
                            <form action="{{ route('coupon.remove') }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium ml-2">Remove</button>
                            </form>
                        </div>
                        @else
                        <form action="{{ route('coupon.apply') }}" method="POST" class="flex gap-2">
                            @csrf
                            <input type="text" name="code" placeholder="Coupon Code" class="flex-1 px-3 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition text-sm" required>
                            <button type="submit" class="bg-gray-900 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition">Apply</button>
                        </form>
                        @endif
                    </div>

                    <!-- Costs -->
                    <div class="space-y-3 text-sm text-gray-600 mb-6 pt-4 border-t border-gray-100">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-medium text-gray-900">₹{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span class="font-medium text-gray-900">₹0.00</span>
                        </div>
                        @if($discount > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Discount @if(session()->has('coupon'))({{ session('coupon')['code'] }})@endif</span>
                            <span class="font-medium">-₹{{ number_format($discount, 2) }}</span>
                        </div>
                        @endif
                    </div>

                    <div class="flex justify-between items-center py-4 border-t border-gray-100 mb-6">
                        <span class="text-base font-bold text-gray-900">Total</span>
                        <div class="text-right">
                            <span class="text-xs text-gray-500 block font-normal">INR</span>
                            <span class="text-2xl font-bold text-[#c0863d]">₹{{ number_format($total, 2) }}</span>
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
