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
        
        <!-- Empty State -->
        <div id="empty-wishlist" class="hidden text-center py-20">
            <div class="mb-6">
                <i class="far fa-heart text-6xl text-gray-300"></i>
            </div>
            <p class="text-gray-500 text-lg mb-6">Your wishlist is currently empty.</p>
            <a href="/collection" class="inline-block bg-[#c0863d] text-white px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-[#a87533] transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                Explore Collection
            </a>
        </div>

        <!-- Product Grid -->
        <div id="wishlist-grid" class="grid grid-cols-2 lg:grid-cols-4 gap-x-4 gap-y-8 md:gap-x-8 md:gap-y-12">
            <!-- Items will be injected here via JS -->
        </div>
    </div>
</div>

<script>
    async function renderWishlist() {
        const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const grid = document.getElementById('wishlist-grid');
        const emptyState = document.getElementById('empty-wishlist');

        if (wishlist.length === 0) {
            grid.innerHTML = '';
            grid.classList.add('hidden');
            emptyState.classList.remove('hidden');
            return;
        }

        const ids = wishlist.map(item => item.id);
        
        try {
            const response = await fetch(`/products/batch?ids[]=${ids.join('&ids[]=')}`);
            if (!response.ok) throw new Error('Failed to fetch products');
            
            const products = await response.json();
            
            if (products.length === 0) {
                // Handle case where stored IDs no longer exist (e.g., deleted products)
                // Optionally clean up localStorage here
                grid.innerHTML = '';
                grid.classList.add('hidden');
                emptyState.classList.remove('hidden');
                return;
            }

            grid.classList.remove('hidden');
            emptyState.classList.add('hidden');
            
            grid.innerHTML = products.map(item => `
                <div class="group relative">
                    <!-- Remove Button -->
                    <button onclick="removeFromWishlist(${item.id})" class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 hover:bg-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0" title="Remove">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                    
                    <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-4">
                        ${item.discount_price ? `<span class="absolute top-4 left-4 z-10 bg-red-500 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-sm">Sale</span>` : ''}
                        
                        <a href="/product/${item.id}" class="block aspect-[4/5] overflow-hidden">
                            <img src="${item.image ? '/storage/' + item.image : '/assets/logo.png'}" alt="${item.name}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                            
                            <!-- Quick Actions Overlay -->
                            <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                                <button onclick="event.preventDefault(); window.location.href='/product/${item.id}'" class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                                    <i class="fas fa-shopping-bag"></i> View Product
                                </button>
                            </div>
                        </a>
                    </div>
                    
                    <div class="space-y-1">
                        <p class="text-[10px] font-bold tracking-widest text-[#c0863d] uppercase">${item.brand || 'Brand'}</p>
                        <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">${item.name}</h3>
                        <div class="flex items-center gap-3 text-sm">
                            ${item.discount_price 
                                ? `<span class="font-bold text-gray-900">₹${new Intl.NumberFormat('en-IN').format(item.discount_price)}</span>
                                   <span class="line-through text-gray-400 text-xs">₹${new Intl.NumberFormat('en-IN').format(item.price)}</span>`
                                : `<span class="font-bold text-gray-900">₹${new Intl.NumberFormat('en-IN').format(item.price)}</span>`
                            }
                        </div>
                    </div>
                </div>
            `).join('');

        } catch (error) {
            console.error('Error loading wishlist:', error);
            // Fallback to local data if fetch fails
            renderFallbackWishlist(wishlist);
        }
    }

    function renderFallbackWishlist(wishlist) {
         const grid = document.getElementById('wishlist-grid');
         const emptyState = document.getElementById('empty-wishlist');
         
         grid.classList.remove('hidden');
         emptyState.classList.add('hidden');
         
         grid.innerHTML = wishlist.map(item => `
            <div class="group relative">
                <button onclick="removeFromWishlist(${item.id})" class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-full shadow-sm text-gray-400 hover:text-red-500 hover:bg-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0" title="Remove">
                    <i class="fas fa-times text-sm"></i>
                </button>
                <div class="relative overflow-hidden rounded-2xl bg-[#FAF7F2] mb-4">
                     ${item.discount_price ? `<span class="absolute top-4 left-4 z-10 bg-red-500 text-white text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-full shadow-sm">Sale</span>` : ''}
                    <a href="/product/${item.id}" class="block aspect-[4/5] overflow-hidden">
                        <img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                         <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out z-10">
                            <button onclick="event.preventDefault(); window.location.href='/product/${item.id}'" class="w-full bg-white/95 backdrop-blur-md text-gray-900 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-[#c0863d] hover:text-white shadow-lg transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-bag"></i> View Product
                            </button>
                        </div>
                    </a>
                </div>
                <div class="space-y-1">
                    <p class="text-[10px] font-bold tracking-widest text-[#c0863d] uppercase">${item.brand || 'Brand'}</p>
                    <h3 class="font-serif text-lg text-gray-900 group-hover:text-[#c0863d] transition-colors truncate">${item.name}</h3>
                     <div class="flex items-center gap-3 text-sm">
                        ${item.discount_price 
                            ? `<span class="font-bold text-gray-900">₹${new Intl.NumberFormat('en-IN').format(item.discount_price)}</span>
                               <span class="line-through text-gray-400 text-xs">₹${new Intl.NumberFormat('en-IN').format(item.price)}</span>`
                            : `<span class="font-bold text-gray-900">₹${new Intl.NumberFormat('en-IN').format(item.price)}</span>`
                        }
                    </div>
                </div>
            </div>
         `).join('');
    }

    function removeFromWishlist(id) {
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        wishlist = wishlist.filter(item => item.id !== id);
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
        
        renderWishlist();
        window.dispatchEvent(new CustomEvent('wishlist-updated'));
    }

    document.addEventListener('DOMContentLoaded', renderWishlist);
</script>

@endsection
