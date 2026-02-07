@extends('layouts.app') 

@section('content')

<!-- Breadcrumb -->
<div class="bg-[#FAF7F2] py-4 border-b border-[#c0863d]/10">
    <div class="max-w-7xl mx-auto px-6 text-xs font-bold tracking-[0.1em] uppercase text-gray-400">
        <a href="/" class="hover:text-[#c0863d] transition-colors">Home</a>
        <span class="mx-2">/</span>
        <a href="#" class="hover:text-[#c0863d] transition-colors">{{ $product->collection ?? $product->category ?? 'Collection' }}</a>
        <span class="mx-2">/</span>
        <span class="text-[#c0863d]">{{ $product->name }}</span>
    </div>
</div>

<section class="bg-white py-12 md:py-20">
  <div class="max-w-7xl mx-auto px-6">
    
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 text-green-700 border border-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">

      <!-- LEFT IMAGE SECTION -->
      <div class="space-y-6">
        <!-- Main Image -->
        <div class="relative aspect-[5/5] bg-[#FAF7F2] rounded-2xl overflow-hidden group">
            @if($product->stock_status == 'out-stock' || $product->qty <= 0)
            <span class="absolute top-6 left-6 z-10 bg-gray-900/90 backdrop-blur-md text-white text-[10px] font-bold tracking-wider uppercase px-4 py-2 rounded-full shadow-sm">
                Out of Stock
            </span>
            @elseif($product->discount_price)
            <span class="absolute top-6 left-6 z-10 bg-red-500/90 backdrop-blur-md text-white text-[10px] font-bold tracking-wider uppercase px-4 py-2 rounded-full shadow-sm">
                Sale
            </span>
            @endif
            
            <button id="wishlist-btn" onclick="toggleWishlist()" class="absolute top-6 right-6 z-10 w-10 h-10 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 transition-all duration-300">
                <i class="far fa-heart"></i>
            </button>
            
            <img id="mainImage"
              src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/logo.png') }}"
              alt="{{ $product->name }}"
              class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
        </div>

        <!-- Thumbnails -->
        <div class="grid grid-cols-4 gap-4">
          <!-- Main Image Thumbnail -->
          <div class="aspect-square rounded-xl overflow-hidden cursor-pointer border-2 border-[#c0863d] transition-all duration-300" onclick="changeImage(this.querySelector('img'))">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/logo.png') }}"
                class="w-full h-full object-cover">
          </div>
          
          <!-- Gallery Images Thumbnails -->
          @foreach($product->images as $img)
          <div class="aspect-square rounded-xl overflow-hidden cursor-pointer border-2 border-transparent hover:border-[#c0863d] transition-all duration-300" onclick="changeImage(this.querySelector('img'))">
            <img src="{{ asset('storage/' . $img->image_path) }}"
                class="w-full h-full object-cover">
          </div>
          @endforeach
        </div>
      </div>

      <!-- RIGHT CONTENT -->
      <div class="flex flex-col justify-top">
        @if($product->collection)
        <div class="mb-2">
            <span class="text-gray-500 text-xs font-bold tracking-[0.2em] uppercase">{{ $product->collection }}</span>
        </div>
        @endif
        <div class="mb-2">
            <span class="text-[#c0863d] text-xs font-bold tracking-[0.2em] uppercase">{{ $product->brand ?? 'Brand' }}</span>
        </div>
        
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif text-gray-900 mb-6 leading-tight">
          {{ $product->name }}
        </h1>

        <!-- Price -->
        <div class="flex items-center gap-4 mb-8">
            @if($product->discount_price)
                <span id="product-price" class="text-3xl font-serif text-[#c0863d]">₹{{ number_format($product->discount_price) }}</span>
                <div class="flex align-center justify-center gap-2">
                    <span class="line-through text-gray-400 text-sm">₹{{ number_format($product->price) }}</span>
                    @php
                        $savings = $product->price - $product->discount_price;
                        $percentage = round(($savings / $product->price) * 100);
                    @endphp
                    <span class="text-green-600 text-xs font-bold uppercase tracking-wider">Save ₹{{ number_format($savings) }} ({{ $percentage }}%)</span>
                </div>
            @else
                <span id="product-price" class="text-3xl font-serif text-[#c0863d]">₹{{ number_format($product->price) }}</span>
            @endif
        </div>

        <!-- Short Description -->
        <div class="text-gray-600 leading-relaxed mb-8 font-light text-lg">
            {!! nl2br(e($product->short_description)) !!}
        </div>
        
        <!-- Product Details: Tags, Season, Gender -->
        <div class="grid grid-cols-2 gap-4 mb-8 text-sm border-t border-b border-gray-100 py-6">
            @if($product->gender)
            <div class="flex flex-col">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Gender</span>
                <span class="font-medium text-gray-900">{{ $product->gender }}</span>
            </div>
            @endif
            
            @if($product->season)
            <div class="flex flex-col">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Best Season</span>
                <span class="font-medium text-gray-900">{{ $product->season }}</span>
            </div>
            @endif

            @if($product->tags)
            <div class="col-span-2 mt-2">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 block">Tags</span>
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $product->tags) as $tag)
                        <span class="bg-gray-50 border border-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-600 hover:text-[#c0863d] hover:border-[#c0863d] transition-colors cursor-default">
                            #{{ ltrim(trim($tag), '#') }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        
       
        <!-- Size Selection - Removed -->


        <!-- Actions -->
        <div class="flex gap-4 mb-8">
            <div class="w-32 flex items-center border border-gray-200 rounded-full bg-white {{ $product->qty <= 0 ? 'opacity-50 pointer-events-none' : '' }}">
                <button class="w-10 h-full text-gray-400 hover:text-[#c0863d] transition-colors" onclick="decrementQty()">-</button>
                <input type="text" id="qty" name="quantity" value="1" class="w-full text-center border-none focus:ring-0 text-gray-900 font-bold bg-transparent" readonly>
                <button class="w-10 h-full text-gray-400 hover:text-[#c0863d] transition-colors" onclick="incrementQty()">+</button>
            </div>
            
            @if($product->qty > 0)
                <a href="javascript:void(0)" onclick="addToCart({{ $product->id }})" class="flex-1 bg-[#1a1a1a] text-white rounded-full font-bold uppercase tracking-[0.15em] text-sm hover:bg-[#c0863d] transition-all duration-300 shadow-lg hover:shadow-[#c0863d]/25 py-4 flex items-center justify-center">
                    Add to Cart
                </a>
            @else
                <button disabled class="flex-1 bg-gray-200 text-gray-400 rounded-full font-bold uppercase tracking-[0.15em] text-sm cursor-not-allowed py-4 flex items-center justify-center">
                    Out of Stock
                </button>
            @endif
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
        @if($product->qty > 0 && $product->qty < 10)
        <div class="mt-6 flex items-center gap-2 text-[#c0863d] bg-[#c0863d]/5 px-4 py-2 rounded-lg w-fit">
            <div class="w-2 h-2 rounded-full bg-[#c0863d] animate-pulse"></div>
            <span class="text-xs font-bold uppercase tracking-wider">Hurry! Only {{ $product->qty }} items left</span>
        </div>
        @elseif($product->qty <= 0)
        <div class="mt-6 flex items-center gap-2 text-red-600 bg-red-50 px-4 py-2 rounded-lg w-fit">
            <i class="fas fa-exclamation-circle"></i>
            <span class="text-xs font-bold uppercase tracking-wider">Out of Stock</span>
        </div>
        @endif

      </div>
    </div>
    
    <!-- Product Details Sections -->
    <div class="mt-20 space-y-20">
        
        <!-- Description Section -->
        <div class="max-w-7xl mx-auto">
            <div class="text-center space-y-6 text-gray-600 font-light text-lg leading-relaxed">
                <h2 class="text-2xl font-serif text-gray-900 font-bold mb-8">Description</h2>
                <div class="max-w-4xl mx-auto text-left product-description">
                    <style>
                        .product-description h1 { font-size: 2em; font-weight: bold; margin-bottom: 0.5em; margin-top: 1em; }
                        .product-description h2 { font-size: 1.5em; font-weight: bold; margin-bottom: 0.5em; margin-top: 1em; }
                        .product-description h3 { font-size: 1.17em; font-weight: bold; margin-bottom: 0.5em; margin-top: 1em; }
                        .product-description ul { list-style-type: disc; margin-left: 1.5em; margin-bottom: 1em; }
                        .product-description ol { list-style-type: decimal; margin-left: 1.5em; margin-bottom: 1em; }
                        .product-description li { margin-bottom: 0.25em; }
                        .product-description p { margin-bottom: 1em; }
                        .product-description blockquote { border-left: 4px solid #e5e7eb; padding-left: 1em; margin-left: 0; font-style: italic; color: #4b5563; }
                    </style>
                    {!! $product->description !!}
                </div>
            </div>

            <!-- Reviews Section -->
            <div id="reviews-section" class="border-t border-gray-100 pt-20">
                
                @php
                    $totalReviews = $product->reviews->count();
                    $averageRating = $totalReviews > 0 ? round($product->reviews->avg('rating'), 1) : 0;
                    $ratingCounts = $product->reviews->groupBy('rating')->map->count();
                    $ratingPercentages = [];
                    for ($i = 5; $i >= 1; $i--) {
                        $count = $ratingCounts[$i] ?? 0;
                        $ratingPercentages[$i] = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                    }
                    
                    // Collect all review images
                    $reviewImages = [];
                    foreach($product->reviews as $review) {
                        if($review->images) {
                            foreach($review->images as $img) {
                                $reviewImages[] = $img;
                            }
                        }
                    }
                @endphp

                <div class="flex flex-col lg:flex-row gap-16 text-left">
                    
                    <!-- Left Sidebar: Rating Summary -->
                    <div class="lg:w-1/3 space-y-8">
                        <div>
                            <h3 class="font-serif text-2xl text-gray-900 font-bold mb-2">Customer reviews</h3>
                            <div class="flex items-center gap-2 mb-1">
                                <div class="flex text-[#c0863d] text-sm">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= round($averageRating) ? 'fas' : 'far' }} fa-star"></i>
                                    @endfor
                                </div>
                                <span class="text-lg font-bold text-gray-900">{{ $averageRating }} out of 5</span>
                            </div>
                            <p class="text-sm text-gray-500 mb-6">{{ $totalReviews }} global ratings</p>
                            
                            <!-- Rating Bars -->
                            <div class="space-y-3">
                                @for($i = 5; $i >= 1; $i--)
                                <div class="flex items-center gap-4 text-sm hover:bg-gray-50 p-1 rounded transition-colors cursor-pointer group">
                                    <span class="w-12 font-medium text-gray-600 group-hover:text-[#c0863d]">{{ $i }} star</span>
                                    <div class="flex-1 h-5 bg-gray-100 rounded-full overflow-hidden border border-gray-200">
                                        <div class="h-full bg-[#c0863d] rounded-full" style="width: {{ $ratingPercentages[$i] }}%"></div>
                                    </div>
                                    <span class="w-10 text-right text-gray-500 group-hover:text-[#c0863d]">{{ round($ratingPercentages[$i]) }}%</span>
                                </div>
                                @endfor
                            </div>
                        </div>

                        <!-- Review This Product -->
                        <div class="border-t border-gray-100 pt-8">
                            <h4 class="font-bold text-gray-900 mb-2">Review this product</h4>
                            <p class="text-sm text-gray-500 mb-4">Share your thoughts with other customers</p>
                            <button onclick="scrollToReviewForm()" class="w-full border border-gray-300 bg-white text-gray-900 py-2 rounded-full hover:bg-gray-50 transition-colors font-medium text-sm">
                                Write a product review
                            </button>
                        </div>
                    </div>

                    <!-- Right Content: Reviews List -->
                    <div class="lg:w-2/3 space-y-10">
                        
                        <!-- Reviews with Images -->
                        @if(count($reviewImages) > 0)
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg mb-4">Reviews with images</h3>
                            <div class="flex gap-4 overflow-x-auto pb-4 scrollbar-hide">
                                @foreach($reviewImages as $img)
                                <div class="flex-shrink-0 w-32 h-32 rounded-xl overflow-hidden border border-gray-200 cursor-pointer hover:opacity-90 transition-opacity" onclick="window.open('{{ asset('storage/' . $img) }}', '_blank')">
                                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Filter Tags (Static for now) -->
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg mb-3">Select to learn more</h3>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 rounded-full border border-gray-300 text-xs font-medium text-gray-600 hover:border-[#c0863d] hover:text-[#c0863d] cursor-pointer transition-colors">Smell</span>
                                <span class="px-3 py-1 rounded-full border border-gray-300 text-xs font-medium text-gray-600 hover:border-[#c0863d] hover:text-[#c0863d] cursor-pointer transition-colors">Longevity</span>
                                <span class="px-3 py-1 rounded-full border border-gray-300 text-xs font-medium text-gray-600 hover:border-[#c0863d] hover:text-[#c0863d] cursor-pointer transition-colors">Value for money</span>
                                <span class="px-3 py-1 rounded-full border border-gray-300 text-xs font-medium text-gray-600 hover:border-[#c0863d] hover:text-[#c0863d] cursor-pointer transition-colors">Freshness</span>
                            </div>
                        </div>

                        <!-- Review List -->
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg mb-6">Top reviews from India</h3>
                            
                            <div class="space-y-8">
                                @forelse($product->reviews as $review)
                                    <div class="border-b border-gray-100 pb-8 last:border-0">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500 text-xs">
                                                {{ substr($review->user->name, 0, 1) }}
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $review->user->name }}</span>
                                        </div>
                                        
                                        <div class="flex items-center gap-2 mb-2">
                                            <div class="flex text-[#c0863d] text-xs">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                                @endfor
                                            </div>
                                            <span class="text-xs font-bold text-[#c0863d]">Verified Purchase</span>
                                        </div>
                                        
                                        <div class="text-xs text-gray-400 mb-3">Reviewed on {{ $review->created_at->format('d F Y') }}</div>
                                        
                                        <p class="text-gray-700 text-sm leading-relaxed mb-4">
                                            {{ $review->comment }}
                                        </p>
                                        
                                        @if($review->images)
                                        <div class="flex gap-2 mt-3">
                                            @foreach($review->images as $img)
                                                <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-100 cursor-pointer" onclick="window.open('{{ asset('storage/' . $img) }}', '_blank')">
                                                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                        
                                        <div class="mt-4 flex items-center gap-4">
                                            <button class="text-xs text-gray-500 hover:text-gray-900 border border-gray-200 px-4 py-1 rounded-full">Helpful</button>
                                            <span class="text-xs text-gray-400">|</span>
                                            <button class="text-xs text-gray-500 hover:text-gray-900">Report</button>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-gray-500 italic py-8 bg-gray-50 rounded-xl">
                                        <p>No reviews yet. Be the first to review this product!</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Review Form (ID for scrolling) -->
                        <div id="review-form-container" class="bg-gray-50 p-8 rounded-2xl border border-gray-100 mt-8">
                            <h4 class="font-serif text-2xl text-gray-900 mb-6">Write a Review</h4>
                            
                            @auth
                                @if(request('order_id'))
                                <form action="{{ route('reviews.store', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                    @csrf
                                    
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2">Rating</label>
                                        <div class="flex gap-2" id="star-rating">
                                            @for($i = 1; $i <= 5; $i++)
                                                <button type="button" onclick="setRating({{ $i }})" class="text-2xl text-gray-300 hover:text-[#c0863d] transition-colors focus:outline-none">
                                                    <i class="fas fa-star" id="star-{{ $i }}"></i>
                                                </button>
                                            @endfor
                                        </div>
                                        <input type="hidden" name="rating" id="rating-input" required>
                                        <input type="hidden" name="order_id" value="{{ request('order_id') }}">
                                    </div>
                                    
                                    <div>
                                        <label for="comment" class="block text-sm font-bold text-gray-700 mb-2">Your Review</label>
                                        <textarea name="comment" id="comment" rows="4" class="w-full rounded-lg border-gray-200 focus:border-[#c0863d] focus:ring-[#c0863d]" placeholder="Share your thoughts about this perfume..."></textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2">Add Photos</label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-[#c0863d] transition-colors bg-white">
                                            <div class="space-y-1 text-center">
                                                <i class="fas fa-camera text-gray-400 text-3xl mb-2"></i>
                                                <div class="flex text-sm text-gray-600 justify-center">
                                                    <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-[#c0863d] hover:text-[#a87533] focus-within:outline-none">
                                                        <span>Upload files</span>
                                                        <input id="images" name="images[]" type="file" class="sr-only" multiple accept="image/*">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="bg-black text-white px-8 py-3 rounded-lg font-bold uppercase tracking-wider hover:bg-[#c0863d] transition-all w-full md:w-auto shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        Submit Review
                                    </button>
                                </form>
                                @else
                                <div class="text-center py-8">
                                    <p class="text-gray-600 mb-4">You can only review products you have purchased. Please go to your orders page to leave a review.</p>
                                    <a href="{{ route('site.dashboard.orders') }}" class="inline-block bg-[#c0863d] text-white px-8 py-3 rounded-lg font-bold uppercase tracking-wider hover:bg-[#a87533] transition shadow-lg">Go to My Orders</a>
                                </div>
                                @endif
                            @else
                                <div class="text-center py-8">
                                    <p class="text-gray-600 mb-4">Please login to write a review.</p>
                                    <a href="{{ route('login') }}" class="inline-block bg-[#c0863d] text-white px-8 py-3 rounded-lg font-bold uppercase tracking-wider hover:bg-[#a87533] transition shadow-lg">Login to Review</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
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

  function incrementQty() {
    var value = parseInt(document.getElementById('qty').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('qty').value = value;
  }

  function decrementQty() {
    var value = parseInt(document.getElementById('qty').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1) {
        value--;
        document.getElementById('qty').value = value;
    }
  }

  function addToCart(productId) {
    var quantity = document.getElementById('qty').value;
    var url = "/add-to-cart/" + productId + "?quantity=" + quantity;
    window.location.href = url;
  }

  function setRating(rating) {
    document.getElementById('rating-input').value = rating;
    for (let i = 1; i <= 5; i++) {
        const star = document.getElementById('star-' + i);
        if (i <= rating) {
            star.parentElement.classList.remove('text-gray-300');
            star.parentElement.classList.add('text-[#c0863d]');
        } else {
            star.parentElement.classList.add('text-gray-300');
            star.parentElement.classList.remove('text-[#c0863d]');
        }
    }
  }

  function scrollToReviewForm() {
    document.getElementById('review-form-container').scrollIntoView({ behavior: 'smooth' });
  }

  document.addEventListener('DOMContentLoaded', function() {
    if (window.location.hash === '#reviews') {
        setTimeout(() => {
             const reviewsSection = document.getElementById('reviews-section');
             if(reviewsSection) {
                 reviewsSection.scrollIntoView({ behavior: 'smooth' });
             }
        }, 100);
    }
  });
</script>

<script>
    const currentProduct = {
        id: {{ $product->id }},
        name: "{{ addslashes($product->name) }}",
        price: {{ $product->price }},
        discount_price: {{ $product->discount_price ?? 'null' }},
        image: "{{ $product->image ? asset('storage/' . $product->image) : asset('assets/logo.png') }}",
        category: "{{ addslashes($product->category ?? 'Collection') }}",
        brand: "{{ addslashes($product->brand ?? 'Brand') }}"
    };

    function updateWishlistButton() {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const btn = document.getElementById('wishlist-btn');
        if(!btn) return;
        const icon = btn.querySelector('i');
        
        const exists = wishlist.some(item => item.id === currentProduct.id);
        
        if (exists) {
            icon.classList.remove('far');
            icon.classList.add('fas', 'text-red-500');
            btn.classList.add('text-red-500');
        } else {
            icon.classList.remove('fas', 'text-red-500');
            icon.classList.add('far');
            btn.classList.remove('text-red-500');
        }
    }

    function toggleWishlist() {
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const existsIndex = wishlist.findIndex(item => item.id === currentProduct.id);
        
        if (existsIndex > -1) {
            wishlist.splice(existsIndex, 1);
        } else {
            wishlist.push(currentProduct);
        }
        
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
        updateWishlistButton();
        
        // Show toast
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 z-50 flex items-center gap-3';
        toast.innerHTML = `
            <i class="fas fa-${existsIndex > -1 ? 'heart-broken' : 'heart'} text-[#c0863d]"></i>
            <span>${existsIndex > -1 ? 'Removed from wishlist' : 'Added to wishlist'}</span>
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
    
    // Init
    updateWishlistButton();
</script>
@endsection
