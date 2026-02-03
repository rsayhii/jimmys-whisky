@extends('layouts.app') 

@section('content')



<!-- Main Wrapper -->
<div class="max-w-7xl mx-auto px-6 py-12">

  <!-- Top Bar -->
  <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-12 pb-6 border-b border-gray-100 gap-6">
    <div class="flex flex-wrap items-center gap-8">
      <div class="flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-gray-400">
        <i class="fas fa-sliders-h text-[#c0863d]"></i>
        <span>Filters</span>
      </div>

      <div class="flex gap-8 text-sm font-bold tracking-wider uppercase">
        <span class="text-[#c0863d] border-b-2 border-[#c0863d] pb-1 cursor-pointer">ALL</span>
        <span class="text-gray-400 hover:text-gray-900 cursor-pointer transition-colors">MEN</span>
        <span class="text-gray-400 hover:text-gray-900 cursor-pointer transition-colors">WOMEN</span>
        <span class="text-gray-400 hover:text-gray-900 cursor-pointer transition-colors">UNISEX</span>
      </div>
    </div>

    <div class="flex items-center gap-6 text-sm">
      <span class="text-gray-400 italic font-light">Showing 8 out of 91 products</span>
      <div class="relative group">
        <select class="appearance-none bg-transparent border-b border-gray-200 py-2 pl-0 pr-8 text-sm font-medium focus:outline-none focus:border-[#c0863d] cursor-pointer">
          <option>Sort By: Best selling</option>
          <option>Price: Low to High</option>
          <option>Price: High to Low</option>
          <option>Newest Arrivals</option>
        </select>
        <div class="absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
          <i class="fas fa-chevron-down text-[10px]"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="grid grid-cols-1 md:grid-cols-12 gap-12">

    <!-- Sidebar -->
    <aside class="md:col-span-3 space-y-10">

      <!-- Occasion -->
      <div>
        <h3 class="font-serif text-xl text-gray-900 mb-6 flex justify-between items-center group cursor-pointer">
          Occasion 
          <span class="text-xs text-gray-300 group-hover:text-[#c0863d] transition-colors">−</span>
        </h3>
        <div class="space-y-3">
          @foreach(['12 Hours', 'Daily Wear', 'Date Night', 'Home Fragrance', 'Luxury Gifting', 'Office', 'Summer', 'Wedding', 'Winter'] as $occasion)
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="checkbox" class="peer appearance-none w-4 h-4 border border-gray-200 rounded-sm checked:bg-[#c0863d] checked:border-[#c0863d] transition-all">
              <i class="fas fa-check absolute text-[8px] text-white opacity-0 peer-checked:opacity-100"></i>
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">{{ $occasion }}</span>
          </label>
          @endforeach
        </div>
      </div>

      <!-- Category -->
      <div>
        <h3 class="font-serif text-xl text-gray-900 mb-6 flex justify-between items-center group cursor-pointer">
          Category 
          <span class="text-xs text-gray-300 group-hover:text-[#c0863d] transition-colors">−</span>
        </h3>
        <div class="space-y-3">
          @foreach(['Attar', 'Attar - Gift Pack', 'Dakhon', 'Perfume', 'Oil-based'] as $category)
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="checkbox" class="peer appearance-none w-4 h-4 border border-gray-200 rounded-sm checked:bg-[#c0863d] checked:border-[#c0863d] transition-all">
              <i class="fas fa-check absolute text-[8px] text-white opacity-0 peer-checked:opacity-100"></i>
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">{{ $category }}</span>
          </label>
          @endforeach
        </div>
      </div>

      <!-- Price Range (New) -->
      <div>
        <h3 class="font-serif text-xl text-gray-900 mb-6 flex justify-between items-center group cursor-pointer">
          Price Range
          <span class="text-xs text-gray-300 group-hover:text-[#c0863d] transition-colors">−</span>
        </h3>
        <div class="space-y-3">
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="radio" name="price" class="peer appearance-none w-4 h-4 border border-gray-200 rounded-full checked:border-[#c0863d] checked:border-[5px] transition-all">
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">Under ₹1,000</span>
          </label>
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="radio" name="price" class="peer appearance-none w-4 h-4 border border-gray-200 rounded-full checked:border-[#c0863d] checked:border-[5px] transition-all">
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">₹1,000 - ₹5,000</span>
          </label>
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="radio" name="price" class="peer appearance-none w-4 h-4 border border-gray-200 rounded-full checked:border-[#c0863d] checked:border-[5px] transition-all">
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">Over ₹5,000</span>
          </label>
        </div>
      </div>

    </aside>

    <!-- Products -->
    <section class="md:col-span-9">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">

        <!-- Product Card 1 -->
        <div class="group relative">
            <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-5 shadow-sm group-hover:shadow-xl transition-all duration-500">
                <span class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-md text-gray-900 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-sm">New In</span>
                
                <button class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0">
                    <i class="far fa-heart"></i>
                </button>

                <a href="/single" class="block aspect-[4/5] overflow-hidden">
                    <img src="{{ asset('assets/collection/1.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                    
                    <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                        <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3.5 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-bag"></i> Add to Cart
                        </button>
                    </div>
                </a>
            </div>
            
            <div class="space-y-1.5 px-1">
                <p class="text-[10px] font-bold tracking-[0.2em] text-[#c0863d] uppercase">Unisex</p>
                <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">ROYAL Non-Alcoholic Attar</h3>
                <div class="flex items-center gap-3">
                    <span class="font-bold text-gray-900">₹1,999</span>
                    <span class="line-through text-gray-400 text-xs">₹2,500</span>
                    <span class="text-[10px] font-bold text-green-600 uppercase tracking-tighter">20% Off</span>
                </div>
            </div>
        </div>

        <!-- Product Card 2 -->
        <div class="group relative">
            <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-5 shadow-sm group-hover:shadow-xl transition-all duration-500">
                <span class="absolute top-4 left-4 z-10 bg-[#c0863d] text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-md">Bestseller</span>
                
                <button class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0">
                    <i class="far fa-heart"></i>
                </button>

                <a href="/single" class="block aspect-[4/5] overflow-hidden">
                    <img src="{{ asset('assets/collection/2.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                    
                    <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                        <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3.5 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-bag"></i> Add to Cart
                        </button>
                    </div>
                </a>
            </div>
            
            <div class="space-y-1.5 px-1">
                <p class="text-[10px] font-bold tracking-[0.2em] text-[#c0863d] uppercase">Woody</p>
                <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">SILENT STORM Perfume</h3>
                <div class="flex items-center gap-3">
                    <span class="font-bold text-gray-900">₹1,100</span>
                    <span class="line-through text-gray-400 text-xs">₹2,200</span>
                    <span class="text-[10px] font-bold text-green-600 uppercase tracking-tighter">50% Off</span>
                </div>
            </div>
        </div>

        <!-- Product Card 3 -->
        <div class="group relative">
            <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-5 shadow-sm group-hover:shadow-xl transition-all duration-500">
                <button class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0">
                    <i class="far fa-heart"></i>
                </button>

                <a href="/single" class="block aspect-[4/5] overflow-hidden">
                    <img src="{{ asset('assets/collection/3.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                    
                    <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                        <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3.5 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-bag"></i> Add to Cart
                        </button>
                    </div>
                </a>
            </div>
            
            <div class="space-y-1.5 px-1">
                <p class="text-[10px] font-bold tracking-[0.2em] text-[#c0863d] uppercase">Aquatic</p>
                <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">BLU Perfume 90ML</h3>
                <div class="flex items-center gap-3">
                    <span class="font-bold text-gray-900">₹2,400</span>
                    <span class="line-through text-gray-400 text-xs">₹3,000</span>
                    <span class="text-[10px] font-bold text-green-600 uppercase tracking-tighter">20% Off</span>
                </div>
            </div>
        </div>

        <!-- Repeated Product Cards (Simplified for brevity in the replacement) -->
        @foreach([4, 5, 6, 7, 8, 9] as $index)
        <div class="group relative">
            <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-5 shadow-sm group-hover:shadow-xl transition-all duration-500">
                <a href="/single" class="block aspect-[4/5] overflow-hidden">
                    <img src="{{ asset('assets/collection/'.$index.'.jpg') }}" alt="Product" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                    <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                        <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3.5 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-bag"></i> Add to Cart
                        </button>
                    </div>
                </a>
            </div>
            <div class="space-y-1.5 px-1">
                <p class="text-[10px] font-bold tracking-[0.2em] text-[#c0863d] uppercase">Premium Collection</p>
                <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">Exquisite Fragrance No. {{ $index }}</h3>
                <div class="flex items-center gap-3">
                    <span class="font-bold text-gray-900">₹2,800</span>
                    <span class="line-through text-gray-400 text-xs">₹3,500</span>
                </div>
            </div>
        </div>
        @endforeach

      </div>

      <!-- Pagination (New) -->
      <div class="mt-20 flex items-center justify-center gap-4">
        <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-100 text-gray-400 hover:border-[#c0863d] hover:text-[#c0863d] transition-all">
          <i class="fas fa-chevron-left text-xs"></i>
        </button>
        <span class="text-sm font-bold text-gray-900">1</span>
        <span class="text-sm font-medium text-gray-400">of</span>
        <span class="text-sm font-medium text-gray-400">12</span>
        <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-100 text-gray-400 hover:border-[#c0863d] hover:text-[#c0863d] transition-all">
          <i class="fas fa-chevron-right text-xs"></i>
        </button>
      </div>

    </section>

  </div>
</div>
@endsection
