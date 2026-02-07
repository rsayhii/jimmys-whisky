@extends('layouts.app') 

@section('content')

<!-- Main Wrapper -->
<div class="max-w-7xl mx-auto px-6 py-12">

  <!-- Header -->
  <div class="mb-12 pb-6 border-b border-gray-100">
    <h1 class="font-serif text-3xl text-gray-900 mb-2">Search Results</h1>
    <p class="text-gray-500">Found {{ $products->count() }} results for "<span class="font-bold text-[#c0863d]">{{ $query }}</span>"</p>
  </div>

  <!-- Content -->
  @if($products->count() > 0)
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-12">
    @foreach($products as $product)
    <div class="group relative">
        <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-5 shadow-sm group-hover:shadow-xl transition-all duration-500">
            @if($product->is_new)
            <span class="absolute top-4 left-4 z-10 bg-white/90 backdrop-blur-md text-gray-900 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-sm">New In</span>
            @endif
            
            <a href="{{ route('product.show', $product->id) }}" class="block aspect-[4/5] overflow-hidden">
                <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('assets/placeholder.jpg') }}" alt="{{ $product->name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                
                <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                    <button class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3.5 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </button>
                </div>
            </a>
        </div>
        
        <div class="space-y-1.5 px-1">
            <p class="text-[10px] font-bold tracking-[0.2em] text-[#c0863d] uppercase">{{ $product->category ?? 'Fragrance' }}</p>
            <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">{{ $product->name }}</h3>
            <div class="flex items-center gap-3">
                <span class="font-bold text-gray-900">₹{{ number_format($product->price) }}</span>
                @if($product->original_price > $product->price)
                <span class="line-through text-gray-400 text-xs">₹{{ number_format($product->original_price) }}</span>
                @endif
            </div>
        </div>
    </div>
    @endforeach
  </div>
  @else
  <div class="text-center py-20">
      <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 text-gray-400 mb-6">
          <i class="fas fa-search text-2xl"></i>
      </div>
      <h2 class="text-2xl font-serif text-gray-900 mb-2">No results found</h2>
      <p class="text-gray-500 mb-8">We couldn't find any products matching your search.</p>
      <a href="/collection" class="inline-block bg-[#c0863d] text-white font-bold py-3 px-8 rounded-full hover:bg-[#a36b26] transition-all duration-300">
          Browse Collection
      </a>
  </div>
  @endif

</div>
@endsection