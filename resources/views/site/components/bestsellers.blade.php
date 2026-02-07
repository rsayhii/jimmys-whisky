<section class="bg-white py-12 px-4 md:px-10">
    <div class="bg-[#FAF7F2] rounded-2xl p-6 md:p-10 max-w-[1400px] mx-auto relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-[#D4A373]/10 to-transparent rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-gradient-to-tl from-[#D4A373]/5 to-transparent rounded-full translate-x-1/3 translate-y-1/3"></div>
        
        <div class="relative z-10">
            <!-- Section Header with animation -->
            <div class="mb-10 md:mb-12">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#1A1A1A] tracking-tight">Best Sellers</h2>
                    
                    <!-- View All Button with animation -->
                    <a href="#" class="group hidden md:flex items-center gap-2 text-[#D4A373] hover:text-[#B8864E] transition-colors duration-300">
                        <span class="text-sm font-medium">View All</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <div class="h-[3px] w-16 bg-gradient-to-r from-[#D4A373] to-[#E6B98A] rounded-full"></div>
                    <p class="text-sm text-gray-600">Discover our most loved products</p>
                </div>
            </div>

            <!-- Slider Container -->
            <div class="relative flex items-center group">
                <!-- Previous Button with enhanced hover effect -->
                <button id="prevBtn" class="absolute -left-4 md:-left-6 z-30 p-3 bg-white/90 backdrop-blur-sm rounded-full shadow-xl hover:shadow-2xl hover:bg-white hover:scale-110 active:scale-95 transition-all duration-300 border border-gray-100 hover:border-[#D4A373]/20 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700 group-hover:text-[#D4A373] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Slider with enhanced card design -->
                <div id="slider" class="flex gap-6 md:gap-8 overflow-x-auto no-scrollbar snap-x snap-mandatory py-4 px-2">
                    @foreach(($bestsellers ?? []) as $product)
                    <div class="min-w-[280px] md:min-w-[calc(25%-24px)] flex flex-col slide-item snap-start group/card">
                        <!-- Card Container with hover effects -->
                        <div class="bg-white rounded-2xl h-[320px] w-full flex items-center justify-center mb-5 shadow-sm hover:shadow-xl transition-all duration-500 group-hover/card:scale-[1.02] relative overflow-hidden">
                            <!-- Background gradient on hover (REMOVED to fix white screen issue) -->
                            <!-- <div class="absolute inset-0 bg-gradient-to-br from-white via-gray-50 to-white opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 z-20"></div> -->
                            
                            <!-- Image with hover scale -->
                            <a href="{{ route('product.show', $product->id) }}" class="absolute inset-0 z-10 transform group-hover/card:scale-110 transition-transform duration-500 ease-out">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/logo.png') }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover">
                            </a>
                            
                            <!-- Quick View Button -->
                            <button class="absolute bottom-4 right-4 w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center opacity-0 group-hover/card:opacity-100 transform group-hover/card:translate-y-0 translate-y-2 transition-all duration-300 hover:bg-[#D4A373] hover:text-white hover:scale-110 z-30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Product Info -->
                        <div class="px-2">
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="text-xs font-bold tracking-widest text-[#D4A373] uppercase">{{ $product->brand ?? 'BRAND' }}</h4>
                                <!-- Wishlist Button -->
                                <button class="text-gray-300 hover:text-red-500 transition-colors duration-300 opacity-0 group-hover/card:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                            
                            <a href="{{ route('product.show', $product->id) }}" class="block text-[15px] font-medium text-gray-800 truncate mb-1 group-hover/card:text-[#1A1A1A] transition-colors">{{ $product->name }}</a>
                            <p class="text-xs text-gray-500 mb-3">{{ $product->concentration ?? '' }}</p>
                            
                            <!-- Price and CTA -->
                            <div class="flex items-center justify-between">
                                <div>
                                    @if($product->discount_price)
                                        <span class="text-lg font-bold text-[#1A1A1A]">₹{{ $product->discount_price }}</span>
                                        <span class="text-sm text-gray-400 line-through ml-2">₹{{ $product->price }}</span>
                                    @else
                                        <span class="text-lg font-bold text-[#1A1A1A]">₹{{ $product->price }}</span>
                                    @endif
                                </div>
                                
                                @if($product->qty > 0)
                                    <a href="{{ route('cart.add', $product->id) }}" class="px-4 py-2 bg-[#D4A373] text-white text-xs font-medium rounded-lg hover:bg-[#B8864E] transform hover:scale-105 active:scale-95 transition-all duration-300 opacity-0 group-hover/card:opacity-100 flex items-center justify-center">
                                        Add to Cart
                                    </a>
                                @else
                                    <button disabled class="px-4 py-2 bg-gray-300 text-gray-500 text-xs font-medium rounded-lg cursor-not-allowed opacity-0 group-hover/card:opacity-100">
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Next Button with enhanced hover effect -->
                <button id="nextBtn" class="absolute -right-4 md:-right-6 z-30 p-3 bg-white/90 backdrop-blur-sm rounded-full shadow-xl hover:shadow-2xl hover:bg-white hover:scale-110 active:scale-95 transition-all duration-300 border border-gray-100 hover:border-[#D4A373]/20 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700 group-hover:text-[#D4A373] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Dots indicator for mobile -->
            <div class="flex justify-center gap-2 mt-8 md:hidden ">
                @for($i = 0; $i < 4; $i++)
                <span class="dot-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300"></span>
                @endfor
            </div>
        </div>
    </div>
</section>

<script>
const slider = document.getElementById('slider');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');
const originalItems = document.querySelectorAll('.slide-item');
const itemCount = originalItems.length;
const dots = document.querySelectorAll('.dot-indicator');

// Initialize dots
dots[0]?.classList.remove('bg-gray-300');
dots[0]?.classList.add('bg-[#D4A373]', 'w-4');

// Clone items for Infinite Loop
originalItems.forEach(item => {
    let cloneLast = item.cloneNode(true);
    let cloneFirst = item.cloneNode(true);
    slider.appendChild(cloneLast);
    slider.insertBefore(cloneFirst, slider.firstChild);
});

const updateDimensions = () => {
    const firstCard = slider.querySelectorAll('.slide-item')[0];
    return firstCard.offsetWidth + 24;
};

let cardWidth = updateDimensions();
let currentIndex = 1;
slider.scrollLeft = cardWidth * currentIndex;

// Update dots indicator
const updateDots = (index) => {
    dots.forEach((dot, i) => {
        dot.classList.remove('bg-[#D4A373]', 'w-4');
        dot.classList.add('bg-gray-300', 'w-2');
    });
    if (dots[index]) {
        dots[index].classList.remove('bg-gray-300', 'w-2');
        dots[index].classList.add('bg-[#D4A373]', 'w-4');
    }
};

const handleInfiniteJump = () => {
    const totalWidth = cardWidth * itemCount;
    
    if (slider.scrollLeft >= totalWidth * 2) {
        slider.classList.add('no-smooth');
        slider.scrollLeft = totalWidth;
        slider.classList.remove('no-smooth');
        currentIndex = 1;
    } else if (slider.scrollLeft <= 0) {
        slider.classList.add('no-smooth');
        slider.scrollLeft = totalWidth;
        slider.classList.remove('no-smooth');
        currentIndex = itemCount - 1;
    }
    
    // Calculate visible dot index
    const visibleIndex = Math.round((slider.scrollLeft % totalWidth) / cardWidth) % 4;
    updateDots(visibleIndex);
};

// Add scroll animation with momentum
let isScrolling = false;
let scrollTimeout;

slider.addEventListener('scroll', () => {
    isScrolling = true;
    clearTimeout(scrollTimeout);
    
    scrollTimeout = setTimeout(() => {
        isScrolling = false;
        handleInfiniteJump();
    }, 100);
});

// Enhanced button clicks with animation
[nextBtn, prevBtn].forEach(btn => {
    btn.addEventListener('click', function() {
        if (isScrolling) return;
        
        // Button animation
        this.classList.add('active:scale-95');
        setTimeout(() => {
            this.classList.remove('active:scale-95');
        }, 150);
        
        if (btn === nextBtn) {
            slider.scrollBy({
                left: cardWidth,
                behavior: 'smooth'
            });
            currentIndex++;
        } else {
            slider.scrollBy({
                left: -cardWidth,
                behavior: 'smooth'
            });
            currentIndex--;
        }
        
        setTimeout(() => {
            handleInfiniteJump();
        }, 500);
    });
});

// Add keyboard navigation
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
        prevBtn.click();
    } else if (e.key === 'ArrowRight') {
        nextBtn.click();
    }
});

// Auto Scroll functionality
let autoScrollInterval;

const startAutoScroll = () => {
    autoScrollInterval = setInterval(() => {
        nextBtn.click();
    }, 2000);
};

const stopAutoScroll = () => {
    clearInterval(autoScrollInterval);
};

// Start auto-scroll on load
startAutoScroll();

// Pause on hover
slider.addEventListener('mouseenter', stopAutoScroll);
slider.addEventListener('mouseleave', startAutoScroll);

// Pause on button hover
[nextBtn, prevBtn].forEach(btn => {
    btn.addEventListener('mouseenter', stopAutoScroll);
    btn.addEventListener('mouseleave', startAutoScroll);
});

// Update on resize with debounce
let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        cardWidth = updateDimensions();
        slider.scrollLeft = cardWidth * currentIndex;
    }, 150);
});

// Add hover effect for cards
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.slide-item');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
});
</script>

<style>
.slide-item {
    transition: transform 0.3s ease-out;
}

.dot-indicator {
    transition: all 0.3s ease;
}

#slider::-webkit-scrollbar {
    height: 4px;
}

#slider::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#slider::-webkit-scrollbar-thumb {
    background: #D4A373;
    border-radius: 10px;
}

#slider::-webkit-scrollbar-thumb:hover {
    background: #B8864E;
}

.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.no-smooth {
    scroll-behavior: auto !important;
}
</style>
