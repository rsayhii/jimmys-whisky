@extends('layouts.app') 

@section('content')



<!-- Main Wrapper -->
<div class="max-w-7xl mx-auto px-6 py-12">
    <form action="{{ route('collection') }}" method="GET" id="filterForm">
        <!-- Preserve Gender Filter if passed via URL, though we handle tabs separately below -->
        @if(request('gender'))
            <input type="hidden" name="gender" value="{{ request('gender') }}">
        @endif

  <!-- Top Bar -->  
  <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-12 pb-6 border-b border-gray-100 gap-6">
    <div class="flex flex-wrap items-center gap-8">
      <div class="flex items-center gap-2 text-xs font-bold tracking-widest uppercase text-gray-400 cursor-pointer md:cursor-default group" onclick="toggleMobileFilters()">
        <div class="p-2 rounded-full group-hover:bg-gray-50 transition-colors md:p-0 md:group-hover:bg-transparent">
            <i class="fas fa-sliders-h text-[#c0863d]"></i>
        </div>
        <span class="group-hover:text-gray-900 transition-colors md:group-hover:text-gray-400">Filters</span>
      </div>

      <div class="flex gap-8 text-sm font-bold tracking-wider uppercase">
        <a href="{{ route('collection', array_merge(request()->except('gender', 'page'), ['gender' => 'ALL'])) }}" class="{{ !request('gender') || request('gender') == 'ALL' ? 'text-[#c0863d] border-b-2 border-[#c0863d] pb-1' : 'text-gray-400 hover:text-gray-900' }} cursor-pointer transition-colors">ALL</a>
        <a href="{{ route('collection', array_merge(request()->except('gender', 'page'), ['gender' => 'MEN'])) }}" class="{{ request('gender') == 'MEN' ? 'text-[#c0863d] border-b-2 border-[#c0863d] pb-1' : 'text-gray-400 hover:text-gray-900' }} cursor-pointer transition-colors">MEN</a>
        <a href="{{ route('collection', array_merge(request()->except('gender', 'page'), ['gender' => 'WOMEN'])) }}" class="{{ request('gender') == 'WOMEN' ? 'text-[#c0863d] border-b-2 border-[#c0863d] pb-1' : 'text-gray-400 hover:text-gray-900' }} cursor-pointer transition-colors">WOMEN</a>
        <a href="{{ route('collection', array_merge(request()->except('gender', 'page'), ['gender' => 'UNISEX'])) }}" class="{{ request('gender') == 'UNISEX' ? 'text-[#c0863d] border-b-2 border-[#c0863d] pb-1' : 'text-gray-400 hover:text-gray-900' }} cursor-pointer transition-colors">UNISEX</a>
      </div>
    </div>

    <div class="flex items-center gap-6 text-sm">
      <span class="text-gray-400 italic font-light">Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products</span>
      <div class="relative group">
        <select name="sort" onchange="document.getElementById('filterForm').submit()" class="appearance-none bg-transparent border-b border-gray-200 py-2 pl-0 pr-8 text-sm font-medium focus:outline-none focus:border-[#c0863d] cursor-pointer">
          <option value="best_selling" {{ request('sort') == 'best_selling' ? 'selected' : '' }}>Sort By: Best selling</option>
          <option value="price_low_high" {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
          <option value="price_high_low" {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
          <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
        </select>
        <div class="absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
          <i class="fas fa-chevron-down text-[10px]"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="grid grid-cols-1 md:grid-cols-12 gap-12">

    <!-- Sidebar Backdrop -->
    <div id="filterBackdrop" onclick="toggleMobileFilters()" class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm hidden transition-opacity duration-300 opacity-0 md:hidden"></div>

    <!-- Sidebar -->
    <aside id="filterSidebar" class="fixed inset-y-0 left-0 z-50 w-[280px] bg-white p-6 overflow-y-auto transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:block md:w-auto md:p-0 md:bg-transparent md:overflow-visible md:col-span-3 space-y-10 shadow-2xl md:shadow-none">
      
      <!-- Mobile Close Button -->
      <div class="flex items-center justify-between mb-8 md:hidden">
        <h2 class="text-lg font-serif font-bold text-gray-900">Filters</h2>
        <button type="button" onclick="toggleMobileFilters()" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-50 text-gray-400 hover:text-gray-900 hover:bg-gray-100 transition-all">
            <i class="fas fa-times"></i>
        </button>
      </div>

      <!-- Occasion -->
      <div>
        <h3 class="font-serif text-xl text-gray-900 mb-6 flex justify-between items-center group cursor-pointer" onclick="toggleSection('occasion-filters')">
          Occasion 
          <span class="text-xs text-gray-300 group-hover:text-[#c0863d] transition-colors">−</span>
        </h3>
        <div class="space-y-3" id="occasion-filters">
          @foreach($occasions as $occasion)
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="checkbox" name="occasion[]" value="{{ $occasion }}" onchange="document.getElementById('filterForm').submit()" {{ in_array($occasion, (array)request('occasion')) ? 'checked' : '' }} class="peer appearance-none w-4 h-4 border border-gray-200 rounded-sm checked:bg-[#c0863d] checked:border-[#c0863d] transition-all">
              <i class="fas fa-check absolute text-[8px] text-white opacity-0 peer-checked:opacity-100"></i>
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors {{ in_array($occasion, (array)request('occasion')) ? 'text-gray-900 font-medium' : '' }}">{{ $occasion }}</span>
          </label>
          @endforeach
        </div>
      </div>

      <!-- Category -->
      <div>
        <h3 class="font-serif text-xl text-gray-900 mb-6 flex justify-between items-center group cursor-pointer" onclick="toggleSection('category-filters')">
          Category 
          <span class="text-xs text-gray-300 group-hover:text-[#c0863d] transition-colors">−</span>
        </h3>
        <div class="space-y-3" id="category-filters">
          @foreach($categories as $category)
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="checkbox" name="category[]" value="{{ $category }}" onchange="document.getElementById('filterForm').submit()" {{ in_array($category, (array)request('category')) ? 'checked' : '' }} class="peer appearance-none w-4 h-4 border border-gray-200 rounded-sm checked:bg-[#c0863d] checked:border-[#c0863d] transition-all">
              <i class="fas fa-check absolute text-[8px] text-white opacity-0 peer-checked:opacity-100"></i>
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors {{ in_array($category, (array)request('category')) ? 'text-gray-900 font-medium' : '' }}">{{ $category }}</span>
          </label>
          @endforeach
        </div>
      </div>

      <!-- Price Range -->
      <div>
        <h3 class="font-serif text-xl text-gray-900 mb-6 flex justify-between items-center group cursor-pointer">
          Price Range
          <span class="text-xs text-gray-300 group-hover:text-[#c0863d] transition-colors">−</span>
        </h3>
        <div class="space-y-3">
            <label class="flex items-center gap-3 cursor-pointer group">
                <div class="relative flex items-center justify-center">
                  <input type="radio" name="price" value="" onchange="document.getElementById('filterForm').submit()" {{ !request('price') ? 'checked' : '' }} class="peer appearance-none w-4 h-4 border border-gray-200 rounded-full checked:border-[#c0863d] checked:border-[5px] transition-all">
                </div>
                <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">All Prices</span>
            </label>
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="radio" name="price" value="under_1000" onchange="document.getElementById('filterForm').submit()" {{ request('price') == 'under_1000' ? 'checked' : '' }} class="peer appearance-none w-4 h-4 border border-gray-200 rounded-full checked:border-[#c0863d] checked:border-[5px] transition-all">
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">Under ₹1,000</span>
          </label>
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="radio" name="price" value="1000_5000" onchange="document.getElementById('filterForm').submit()" {{ request('price') == '1000_5000' ? 'checked' : '' }} class="peer appearance-none w-4 h-4 border border-gray-200 rounded-full checked:border-[#c0863d] checked:border-[5px] transition-all">
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">₹1,000 - ₹5,000</span>
          </label>
          <label class="flex items-center gap-3 cursor-pointer group">
            <div class="relative flex items-center justify-center">
              <input type="radio" name="price" value="over_5000" onchange="document.getElementById('filterForm').submit()" {{ request('price') == 'over_5000' ? 'checked' : '' }} class="peer appearance-none w-4 h-4 border border-gray-200 rounded-full checked:border-[#c0863d] checked:border-[5px] transition-all">
            </div>
            <span class="text-sm text-gray-500 group-hover:text-gray-900 transition-colors">Over ₹5,000</span>
          </label>
        </div>
      </div>

    </aside>

    <!-- Products -->
    <section class="md:col-span-9">
      <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 md:gap-x-8 md:gap-y-12">

        @forelse($products as $product)
        <!-- Product Card -->
        <div class="group relative">
            <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-5 shadow-sm group-hover:shadow-xl transition-all duration-500">
                @if($product->created_at->diffInDays(now()) < 30)
                    <span class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-md text-gray-900 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-sm">New In</span>
                @elseif($product->qty == 0 || $product->stock_status == 'out-stock')
                    <span class="absolute top-4 left-4 z-10 bg-red-500 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-sm">Sold Out</span>
                @endif
                
                <button type="button" class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0">
                    <i class="far fa-heart"></i>
                </button>

                <a href="{{ route('product.show', $product->id) }}" class="block aspect-[4/5] overflow-hidden">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('assets/placeholder.jpg') }}" alt="{{ $product->name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                    
                    @if($product->qty > 0 && $product->stock_status == 'in-stock')
                    <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                        <a href="{{ route('cart.add', $product->id) }}" class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3.5 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-bag"></i> Add to Cart
                        </a>
                    </div>
                    @endif
                </a>
            </div>
            
            <div class="space-y-1.5 px-1">
                <p class="text-[10px] font-bold tracking-[0.2em] text-[#c0863d] uppercase">{{ $product->category ?? 'Fragrance' }}</p>
                <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                </h3>
                <div class="flex items-center gap-3">
                    @if($product->discount_price && $product->discount_price < $product->price)
                        <span class="font-bold text-gray-900">₹{{ number_format($product->discount_price, 2) }}</span>
                        <span class="line-through text-gray-400 text-xs">₹{{ number_format($product->price, 2) }}</span>
                        <span class="text-[10px] font-bold text-green-600 uppercase tracking-tighter">{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}% Off</span>
                    @else
                        <span class="font-bold text-gray-900">₹{{ number_format($product->price, 2) }}</span>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-12 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 text-gray-300 mb-4">
                <i class="fas fa-search text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900">No products found</h3>
            <p class="text-gray-500 mt-2">Try adjusting your filters or search criteria.</p>
            <a href="{{ route('collection') }}" class="inline-block mt-4 px-6 py-2 bg-[#c0863d] text-white rounded-full text-sm font-medium hover:bg-black transition-colors">Clear all filters</a>
        </div>
        @endforelse

      </div>

      <!-- Pagination -->
      <div class="mt-20">
          {{ $products->onEachSide(1)->links('pagination::tailwind') }}
      </div>

    </section>

  </div>
  </form>
</div>

<script>
function toggleSection(id) {
    const el = document.getElementById(id);
    if(el) {
        // Simple toggle for now, ideally animate height
        el.classList.toggle('hidden');
    }
}

function toggleMobileFilters() {
    const sidebar = document.getElementById('filterSidebar');
    const backdrop = document.getElementById('filterBackdrop');
    const body = document.body;

    if (sidebar.classList.contains('-translate-x-full')) {
        // Open
        sidebar.classList.remove('-translate-x-full');
        
        backdrop.classList.remove('hidden');
        // Small delay to allow display:block to apply before opacity transition
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
        }, 10);
        
        body.classList.add('overflow-hidden');
    } else {
        // Close
        sidebar.classList.add('-translate-x-full');
        
        backdrop.classList.add('opacity-0');
        setTimeout(() => {
            backdrop.classList.add('hidden');
        }, 300); // Match transition duration
        
        body.classList.remove('overflow-hidden');
    }
}
</script>
@endsection
