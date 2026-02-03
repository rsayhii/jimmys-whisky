@extends('layouts.app')

@section('title', 'My Wishlist - Parcos')

@section('content')

<!-- Hero Header -->
<div class="relative bg-[#FAF7F2] py-20 overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#c0863d]/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#c0863d]/5 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <span class="block text-sm font-bold tracking-[0.2em] text-[#c0863d] uppercase mb-3">Your Collection</span>
        <h1 class="text-4xl md:text-5xl font-serif text-gray-900 mb-4">My Wishlist</h1>
        <p class="text-gray-600 max-w-2xl mx-auto text-lg font-light leading-relaxed">
            Curated scents that speak to your soul. Save your favorites here and make them yours when the moment is right.
        </p>
    </div>
</div>

<div class="bg-gray-50">
    <!-- Wishlist Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 ">
        
    

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
            
            <!-- Wishlist Item 1 -->
            <div class="group relative">
                <!-- Remove Button -->
                <button class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 hover:bg-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0" title="Remove">
                    <i class="fas fa-times text-sm"></i>
                </button>
                
                <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-4">
                    <span class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-md text-gray-900 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-sm">New In</span>
                    
                    <a href="/single" class="block aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/collection/1.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                        
                        <!-- Quick Actions Overlay -->
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                            <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-bag"></i> Add to Cart
                            </button>
                        </div>
                    </a>
                </div>
                
                <div class="space-y-1">
                    <p class="text-[10px] font-bold tracking-widest text-[#c0863d] uppercase">Unisex</p>
                    <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">ROYAL Non-Alcoholic Attar</h3>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="font-bold text-gray-900">₹1,999</span>
                        <span class="line-through text-gray-400 text-xs">₹2,500</span>
                    </div>
                </div>
            </div>

            <!-- Wishlist Item 2 -->
            <div class="group relative">
                <button class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 hover:bg-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0" title="Remove">
                    <i class="fas fa-times text-sm"></i>
                </button>
                
                <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-4">
                    <span class="absolute top-4 left-4 z-10 bg-[#c0863d] text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-md">Bestseller</span>
                    
                    <a href="/single" class="block aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/collection/2.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                        
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                            <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-bag"></i> Add to Cart
                            </button>
                        </div>
                    </a>
                </div>
                
                <div class="space-y-1">
                    <p class="text-[10px] font-bold tracking-widest text-[#c0863d] uppercase">Woody</p>
                    <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">SILENT STORM Perfume 100ML</h3>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="font-bold text-gray-900">₹1,100</span>
                        <span class="line-through text-gray-400 text-xs">₹2,200</span>
                    </div>
                </div>
            </div>

            <!-- Wishlist Item 3 -->
            <div class="group relative">
                <button class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 hover:bg-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0" title="Remove">
                    <i class="fas fa-times text-sm"></i>
                </button>
                
                <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-4">
                    <a href="/single" class="block aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/collection/3.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                        
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                            <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-bag"></i> Add to Cart
                            </button>
                        </div>
                    </a>
                </div>
                
                <div class="space-y-1">
                    <p class="text-[10px] font-bold tracking-widest text-[#c0863d] uppercase">Aquatic</p>
                    <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">BLU Perfume 90ML for Men</h3>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="font-bold text-gray-900">₹2,400</span>
                        <span class="line-through text-gray-400 text-xs">₹3,000</span>
                    </div>
                </div>
            </div>

            <!-- Wishlist Item 4 -->
            <div class="group relative">
                <button class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 hover:bg-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0" title="Remove">
                    <i class="fas fa-times text-sm"></i>
                </button>
                
                <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-4">
                    <span class="absolute top-4 left-4 z-10 bg-[#c0863d] text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-md">Bestseller</span>
                    
                    <a href="/single" class="block aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/collection/4.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                        
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                            <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-bag"></i> Add to Cart
                            </button>
                        </div>
                    </a>
                </div>
                
                <div class="space-y-1">
                    <p class="text-[10px] font-bold tracking-widest text-[#c0863d] uppercase">Fresh</p>
                    <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">OCEAN MIST 100ML</h3>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="font-bold text-gray-900">₹1,800</span>
                        <span class="line-through text-gray-400 text-xs">₹2,000</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection