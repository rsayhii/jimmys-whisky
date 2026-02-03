@extends('layouts.app') 

@section('content')

<!-- Breadcrumb -->
<div class="bg-[#FAF7F2] py-4 border-b border-[#c0863d]/10">
    <div class="max-w-7xl mx-auto px-6 text-xs font-bold tracking-[0.1em] uppercase text-gray-400">
        <a href="/" class="hover:text-[#c0863d] transition-colors">Home</a>
        <span class="mx-2">/</span>
        <a href="/collection" class="hover:text-[#c0863d] transition-colors">Women</a>
        <span class="mx-2">/</span>
        <span class="text-[#c0863d]">Lattafa Dalal</span>
    </div>
</div>

<section class="bg-white py-12 md:py-20">
  <div class="max-w-7xl mx-auto px-6">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">

      <!-- LEFT IMAGE SECTION -->
      <div class="space-y-6">
        <!-- Main Image -->
        <div class="relative aspect-[4/5] bg-[#FAF7F2] rounded-2xl overflow-hidden group">
            <span class="absolute top-6 left-6 z-10 bg-white/90 backdrop-blur-md text-gray-900 text-[10px] font-bold tracking-wider uppercase px-4 py-2 rounded-full shadow-sm">
                Best Seller
            </span>
            <button class="absolute top-6 right-6 z-10 w-10 h-10 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 transition-all duration-300">
                <i class="far fa-heart"></i>
            </button>
            
            <img id="mainImage"
              src="https://cdn.shopify.com/s/files/1/0069/4471/8937/files/diva1.jpg?v=1769606443?width=720"
              class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
        </div>

        <!-- Thumbnails -->
        <div class="grid grid-cols-4 gap-4">
          @foreach(range(1, 4) as $index)
          <div class="aspect-square rounded-xl overflow-hidden cursor-pointer border-2 border-transparent hover:border-[#c0863d] transition-all duration-300" onclick="changeImage(this.querySelector('img'))">
            <img src="https://cdn.shopify.com/s/files/1/0069/4471/8937/files/diva1.jpg?v=1769606443?width=720"
                class="w-full h-full object-cover">
          </div>
          @endforeach
        </div>
      </div>

      <!-- RIGHT CONTENT -->
      <div class="flex flex-col justify-center">
        <div class="mb-2">
            <span class="text-[#c0863d] text-xs font-bold tracking-[0.2em] uppercase">Eau De Parfum</span>
        </div>
        
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif text-gray-900 mb-6 leading-tight">
          Lattafa Dalal For Women
        </h1>

        <!-- Price -->
        <div class="flex items-center gap-4 mb-8">
          <span class="text-3xl font-serif text-[#c0863d]">₹2,950</span>
          <div class="flex flex-col">
              <span class="line-through text-gray-400 text-sm">₹5,000</span>
              <span class="text-green-600 text-xs font-bold uppercase tracking-wider">Save ₹2,050 (41%)</span>
          </div>
        </div>

        <!-- Short Description -->
        <p class="text-gray-600 leading-relaxed mb-8 font-light text-lg">
            A captivating fragrance that embodies elegance and grace. With notes of caramel, vanilla, and sandalwood, Dalal creates an aura of warmth and sophistication.
        </p>
        
       
       

        <!-- Size Selection -->
        <div class="mb-8">
          <div class="flex justify-between items-center mb-3">
              <span class="text-sm font-bold uppercase tracking-wider text-gray-900">Select Size</span>
             
          </div>
          <div class="flex flex-wrap gap-3">
            <button class="px-6 py-3 rounded-lg border-2 border-[#c0863d] bg-[#c0863d]/5 text-[#c0863d] font-bold text-sm transition-all shadow-sm">
                100ML
            </button>
            <button class="px-6 py-3 rounded-lg border border-gray-200 text-gray-500 hover:border-gray-300 font-medium text-sm transition-all bg-white">
                50ML
            </button>
            <button class="px-6 py-3 rounded-lg border border-gray-200 text-gray-300 font-medium text-sm cursor-not-allowed bg-gray-50 relative overflow-hidden">
                <span class="relative z-10">200ML</span>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-full h-px bg-gray-300 rotate-12"></div>
                </div>
            </button>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex gap-4 mb-8">
            <div class="w-32 flex items-center border border-gray-200 rounded-full bg-white">
                <button class="w-10 h-full text-gray-400 hover:text-[#c0863d] transition-colors">-</button>
                <input type="text" value="1" class="w-full text-center border-none focus:ring-0 text-gray-900 font-bold bg-transparent">
                <button class="w-10 h-full text-gray-400 hover:text-[#c0863d] transition-colors">+</button>
            </div>
            <button class="flex-1 bg-[#1a1a1a] text-white rounded-full font-bold uppercase tracking-[0.15em] text-sm hover:bg-[#c0863d] transition-all duration-300 shadow-lg hover:shadow-[#c0863d]/25 py-4">
                Add to Cart
            </button>
        </div>

        <!-- Features -->
        <div class="grid grid-cols-2 gap-y-4 text-sm text-gray-600 border-t border-gray-100 pt-8">
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-[#c0863d]"></i>
                <span>100% Authentic</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fas fa-truck text-[#c0863d]"></i>
                <span>Free Shipping</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fas fa-undo text-[#c0863d]"></i>
                <span>Easy Returns</span>
            </div>
            <div class="flex items-center gap-3">
                <i class="fas fa-gift text-[#c0863d]"></i>
                <span>Free Gift Wrap</span>
            </div>
        </div>
        
        <!-- Stock Alert -->
        <div class="mt-6 flex items-center gap-2 text-[#c0863d] bg-[#c0863d]/5 px-4 py-2 rounded-lg w-fit">
            <div class="w-2 h-2 rounded-full bg-[#c0863d] animate-pulse"></div>
            <span class="text-xs font-bold uppercase tracking-wider">Hurry! Only 8 items left</span>
        </div>

      </div>
    </div>
    
    <!-- Product Details Tabs -->
    <div class="mt-24">
        <!-- Tab Headers -->
        <div class="flex justify-center border-b border-gray-200 mb-12">
            <button onclick="switchTab('description')" id="btn-description" class="tab-btn px-8 py-4 text-sm font-bold uppercase tracking-[0.2em] text-[#c0863d] border-b-2 border-[#c0863d] transition-all">Description</button>
            <button onclick="switchTab('notes')" id="btn-notes" class="tab-btn px-8 py-4 text-sm font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-200 transition-all">Notes</button>
            <button onclick="switchTab('reviews')" id="btn-reviews" class="tab-btn px-8 py-4 text-sm font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-gray-900 border-b-2 border-transparent hover:border-gray-200 transition-all">Reviews (12)</button>
        </div>
        
        <!-- Tab Contents -->
        <div class="max-w-4xl mx-auto">
            
            <!-- Description Tab -->
            <div id="tab-description" class="tab-content text-center space-y-6 text-gray-600 font-light text-lg leading-relaxed animate-fade-in">
                <p>
                    Dalal by Lattafa Perfumes is a floral fruity gourmand fragrance for women and men. It features a beautiful blend of orange, vanilla, sandalwood and caramel.
                </p>
                <p>
                    The top notes open with a fresh burst of orange, followed by the warmth of vanilla and caramel in the heart. The base settles into a woody sandalwood that lingers on the skin for hours.
                </p>
            </div>

            <!-- Notes Tab -->
            <div id="tab-notes" class="tab-content hidden animate-fade-in">
                <div class="grid grid-cols-3 gap-8 text-center">
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-16 h-16 rounded-full bg-[#FAF7F2] flex items-center justify-center text-[#c0863d]">
                            <i class="fas fa-sun text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-serif text-gray-900 mb-1">Top Notes</h4>
                            <span class="text-sm">Orange, Citrus</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-16 h-16 rounded-full bg-[#FAF7F2] flex items-center justify-center text-[#c0863d]">
                            <i class="fas fa-heart text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-serif text-gray-900 mb-1">Heart Notes</h4>
                            <span class="text-sm">Vanilla, Caramel</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-16 h-16 rounded-full bg-[#FAF7F2] flex items-center justify-center text-[#c0863d]">
                            <i class="fas fa-tree text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-serif text-gray-900 mb-1">Base Notes</h4>
                            <span class="text-sm">Sandalwood</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Tab -->
            <div id="tab-reviews" class="tab-content hidden animate-fade-in space-y-6">
                <div class="bg-[#FAF7F2] p-8 rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#c0863d] text-white flex items-center justify-center font-bold text-sm">JS</div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Jessica S.</h4>
                                <div class="flex text-[#c0863d] text-xs mt-1">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <span class="text-xs text-gray-400">2 days ago</span>
                    </div>
                    <p class="text-gray-600 font-light italic">"Absolutely in love with this scent! It's warm, sweet but not overpowering. Lasts all day long."</p>
                </div>
                
                <div class="bg-[#FAF7F2] p-8 rounded-2xl">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-gray-900 text-white flex items-center justify-center font-bold text-sm">MK</div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Maria K.</h4>
                                <div class="flex text-[#c0863d] text-xs mt-1">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <span class="text-xs text-gray-400">1 week ago</span>
                    </div>
                    <p class="text-gray-600 font-light italic">"Great packaging and fast delivery. The perfume smells expensive for the price."</p>
                </div>
                
                <button class="w-full py-4 border border-[#c0863d] text-[#c0863d] font-bold uppercase tracking-widest text-xs hover:bg-[#c0863d] hover:text-white transition-all rounded-xl">Load More Reviews</button>
            </div>

        </div>
    </div>

  </div>
</section>

@include('site.components.bestsellers')

<!-- JS FOR IMAGE SWITCH -->
<script>
  function changeImage(el) {
    document.getElementById("mainImage").src = el.src;
  }

  function switchTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(el => {
        el.classList.add('hidden');
    });
    
    // Show selected tab content
    document.getElementById('tab-' + tabName).classList.remove('hidden');
    
    // Reset all buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('text-[#c0863d]', 'border-[#c0863d]');
        btn.classList.add('text-gray-400', 'border-transparent');
    });
    
    // Activate selected button
    const activeBtn = document.getElementById('btn-' + tabName);
    activeBtn.classList.remove('text-gray-400', 'border-transparent');
    activeBtn.classList.add('text-[#c0863d]', 'border-[#c0863d]');
  }
</script>

@endsection
