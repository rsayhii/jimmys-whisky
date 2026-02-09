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

        @if(session('cart') && count(session('cart')) > 0)
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

                    @foreach(session('cart') as $id => $details)
                    <!-- Cart Item -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-4 p-6 border-b border-gray-100 items-center">
                        <!-- Product Info -->
                        <div class="col-span-1 md:col-span-6 flex gap-4">
                            <div class="w-24 h-24 flex-shrink-0 bg-gray-50 rounded-md overflow-hidden border border-gray-100">
                                <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex flex-col justify-between py-1">
                                <div>
                                    <h3 class="font-medium text-gray-900 text-lg leading-tight">{{ $details['name'] }}</h3>
                                    @if(isset($details['concentration']))
                                    <p class="text-sm text-gray-500 mt-1">Concentration: {{ $details['concentration'] }}</p>
                                    @endif
                                </div>
                                <form action="{{ route('cart.remove') }}" method="POST" class="md:hidden">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-xs text-red-500 hover:text-red-700 underline decoration-1 underline-offset-2 transition-colors w-fit">Remove</button>
                                </form>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="col-span-1 md:col-span-2 md:text-center flex justify-between md:block">
                            <span class="md:hidden text-gray-500">Price:</span>
                            <span class="text-gray-900 font-medium">₹{{ number_format($details['price'], 2) }}</span>
                        </div>

                        <!-- Quantity -->
                        <div class="col-span-1 md:col-span-2 flex justify-between md:justify-center items-center">
                            <span class="md:hidden text-gray-500">Quantity:</span>
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button onclick="updateCart('{{ $id }}', {{ $details['quantity'] - 1 }})" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition rounded-l-lg" {{ $details['quantity'] <= 1 ? 'disabled' : '' }}>-</button>
                                <input type="text" value="{{ $details['quantity'] }}" class="w-10 text-center text-sm text-gray-900 focus:outline-none border-x border-gray-300 py-1" readonly>
                                <button onclick="updateCart('{{ $id }}', {{ $details['quantity'] + 1 }})" class="w-8 h-8 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition rounded-r-lg">+</button>
                            </div>
                        </div>

                        <!-- Total & Remove (Desktop) -->
                        <div class="col-span-1 md:col-span-2 flex justify-between md:flex-col md:items-end md:gap-2">
                            <span class="md:hidden text-gray-500">Total:</span>
                            <div class="text-right">
                                <span class="text-gray-900 font-bold">₹{{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                                <form action="{{ route('cart.remove') }}" method="POST" class="hidden md:block ml-auto mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-xs text-red-500 hover:text-red-700 underline decoration-1 underline-offset-2 transition-colors">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Actions -->
                    <div class="p-6 bg-gray-50 flex flex-wrap gap-4 justify-between items-center">
                        @if(session()->has('coupon'))
                        <div class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded-lg">
                            <span>Coupon <strong>{{ session('coupon')['code'] }}</strong> applied!</span>
                            <form action="{{ route('coupon.remove') }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium ml-2">Remove</button>
                            </form>
                        </div>
                        @else
                        <form action="{{ route('coupon.apply') }}" method="POST" class="relative w-full md:w-auto">
                            @csrf
                            <input type="text" name="code" placeholder="Coupon Code" class="w-full md:w-64 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d] transition" required>
                            <button type="submit" class="absolute right-1 top-1 bg-black text-white px-4 py-1.5 rounded-md text-sm font-medium hover:bg-gray-800 transition">Apply</button>
                        </form>
                        @endif

                        <a href="{{ route('cart.clear') }}" class="text-gray-600 hover:text-black font-medium transition flex items-center gap-2">
                            <i class="fas fa-trash-alt"></i> Clear Cart
                        </a>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-start">
                    <a href="/collection" class="group inline-flex items-center gap-3 text-gray-500 hover:text-[#c0863d] transition-colors duration-300">
                        <div class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center shadow-sm group-hover:border-[#c0863d] group-hover:bg-[#c0863d] group-hover:text-white transition-all duration-300">
                             <i class="fas fa-arrow-left text-sm transform group-hover:-translate-x-0.5 transition-transform"></i>
                        </div>
                        <span class="font-medium tracking-wide uppercase text-xs">Continue Shopping</span>
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
                            <span class="font-medium text-gray-900">₹{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping Estimate</span>
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
                        <span class="text-2xl font-bold text-[#c0863d]">₹{{ number_format($total, 2) }}</span>
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
        @else
        <div class="text-center py-20">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Your cart is empty</h2>
            <p class="text-gray-500 mb-8">Looks like you haven't added anything to your cart yet.</p>
            <a href="/collection" class="inline-flex items-center justify-center bg-[#c0863d] text-white px-8 py-3 rounded-full font-bold hover:bg-[#a87533] transition-all shadow-lg">
                Start Shopping
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Hidden Form for Updating Cart -->
<form id="update-cart-form" action="{{ route('cart.update') }}" method="POST" style="display: none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="id" id="update-cart-id">
    <input type="hidden" name="quantity" id="update-cart-qty">
</form>

<script>
    function updateCart(id, qty) {
        if (qty < 1) return;
        document.getElementById('update-cart-id').value = id;
        document.getElementById('update-cart-qty').value = qty;
        document.getElementById('update-cart-form').submit();
    }
</script>
@endsection
