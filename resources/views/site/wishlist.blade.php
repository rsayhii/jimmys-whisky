@extends('layouts.app')

@section('title', 'My Wishlist - Parcos')

@section('content')

<!-- Page Title -->
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-serif text-[#c0863d] mb-2">My Wishlist</h1>
        <p class="text-gray-600">Your curated collection of favorite scents.</p>
    </div>
</div>

<!-- Wishlist Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Empty State (Hidden by default for demo) -->
    <!--
    <div class="text-center py-16">
        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-400">
            <i class="far fa-heart text-3xl"></i>
        </div>
        <h2 class="text-xl font-medium text-gray-900 mb-2">Your wishlist is empty</h2>
        <p class="text-gray-500 mb-8">It seems you haven't added any products yet.</p>
        <a href="/collection" class="inline-block bg-[#c0863d] text-white px-8 py-3 rounded-lg hover:bg-[#a87533] transition-colors">
            Start Shopping
        </a>
    </div>
    -->

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        
        <!-- Wishlist Item 1 -->
        <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
            <button class="absolute top-2 right-2 z-10 w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md text-gray-400 hover:text-red-500 transition-colors" title="Remove from Wishlist">
                <i class="fas fa-trash-alt text-sm"></i>
            </button>
            
            <a href="/single" class="block">
            <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">NEW</span>
            <div class="overflow-hidden mb-3">
                <img src="{{ asset('assets/collection/1.jpg') }}" alt="Product" class="w-full h-auto object-cover transform group-hover:scale-110 transition-transform duration-500">
            </div>
            
            <p class="text-xs text-gray-500 mb-1">UNISEX</p>
            <h3 class="font-semibold text-sm mb-2 line-clamp-1">ROYAL Non-Alcoholic Attar...</h3>
            <p class="text-sm mb-1">
                <span class="font-semibold">₹1,999</span>
                <span class="line-through text-gray-400 ml-2">₹2,500</span>
                <span class="text-green-600 ml-2">20% Off</span>
            </p>
            </a>
            <button class="w-full bg-black text-white py-2 text-sm mt-3 hover:bg-[#c0863d] transition-colors">ADD TO CART</button>
        </div>

        <!-- Wishlist Item 2 -->
        <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
            <button class="absolute top-2 right-2 z-10 w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md text-gray-400 hover:text-red-500 transition-colors" title="Remove from Wishlist">
                <i class="fas fa-trash-alt text-sm"></i>
            </button>

            <a href="/single" class="block">
            <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
            <div class="overflow-hidden mb-3">
                <img src="{{ asset('assets/collection/2.jpg') }}" alt="Product" class="w-full h-auto object-cover transform group-hover:scale-110 transition-transform duration-500">
            </div>
            
            <p class="text-xs text-gray-500 mb-1">WOODY</p>
            <h3 class="font-semibold text-sm mb-2 line-clamp-1">SILENT STORM Perfume 100ML</h3>
            <p class="text-sm mb-1">
                <span class="font-semibold">₹1,100</span>
                <span class="line-through text-gray-400 ml-2">₹2,200</span>
                <span class="text-green-600 ml-2">50% Off</span>
            </p>
            </a>
            <button class="w-full bg-black text-white py-2 text-sm mt-3 hover:bg-[#c0863d] transition-colors">ADD TO CART</button>
        </div>

        <!-- Wishlist Item 3 -->
        <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
            <button class="absolute top-2 right-2 z-10 w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md text-gray-400 hover:text-red-500 transition-colors" title="Remove from Wishlist">
                <i class="fas fa-trash-alt text-sm"></i>
            </button>

            <a href="/single" class="block">
            <div class="overflow-hidden mb-3">
                <img src="{{ asset('assets/collection/3.jpg') }}" alt="Product" class="w-full h-auto object-cover transform group-hover:scale-110 transition-transform duration-500">
            </div>
            
            <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
            <h3 class="font-semibold text-sm mb-2 line-clamp-1">BLU Perfume 90ML for Men</h3>
            <p class="text-sm mb-1">
                <span class="font-semibold">₹2,400</span>
                <span class="line-through text-gray-400 ml-2">₹3,000</span>
                <span class="text-green-600 ml-2">20% Off</span>
            </p>
            </a>
            <button class="w-full bg-black text-white py-2 text-sm mt-3 hover:bg-[#c0863d] transition-colors">ADD TO CART</button>
        </div>

        <!-- Wishlist Item 4 -->
        <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
            <button class="absolute top-2 right-2 z-10 w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md text-gray-400 hover:text-red-500 transition-colors" title="Remove from Wishlist">
                <i class="fas fa-trash-alt text-sm"></i>
            </button>

            <a href="/single" class="block">
            <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
            <div class="overflow-hidden mb-3">
                <img src="{{ asset('assets/collection/4.jpg') }}" alt="Product" class="w-full h-auto object-cover transform group-hover:scale-110 transition-transform duration-500">
            </div>
            
            <p class="text-xs text-gray-500 mb-1">FRESH</p>
            <h3 class="font-semibold text-sm mb-2 line-clamp-1">OCEAN MIST 100ML</h3>
            <p class="text-sm mb-1">
                <span class="font-semibold">₹1,800</span>
                <span class="line-through text-gray-400 ml-2">₹2,000</span>
                <span class="text-green-600 ml-2">10% Off</span>
            </p>
            </a>
            <button class="w-full bg-black text-white py-2 text-sm mt-3 hover:bg-[#c0863d] transition-colors">ADD TO CART</button>
        </div>

    </div>
</div>

@endsection