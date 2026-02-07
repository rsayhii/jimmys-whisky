<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parcos Header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'serif': ['Playfair Display', 'serif'],
                        'sans': ['Inter', 'system-ui', '-apple-system', 'sans-serif']
                    },
                    colors: {
                        'primary': '#c0863d',
                        'primary-dark': '#c0863d',
                        'secondary': '#f0f9ff',
                        'accent': '#fef3c7'
                    },
                    animation: {
                        'marquee-smooth': 'marquee 25s linear infinite',
                        'pulse-gentle': 'pulse-gentle 2s ease-in-out infinite',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        'marquee': {
                            '0%': { transform: 'translateX(100%)' },
                            '100%': { transform: 'translateX(-100%)' }
                        },
                        'pulse-gentle': {
                            '0%, 100%': { opacity: 1 },
                            '50%': { opacity: 0.8 }
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' }
                        }
                    }
                }
            }
        }
    </script>

    <!-- Icons & Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* body {
            font-family: 'Inter', sans-serif;
        } */
        
        .gradient-bg {
            background: #c0863d;
        }
        
        .icon-hover {
            transition: all 0.3s ease;
        }
        
        .icon-hover:hover {
            transform: translateY(-2px);
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }
        
        .nav-link {
            position: relative;
            padding: 4px 0;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: black;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            color: #c0863d;
        }

        .nav-link.active::after {
            width: 100%;
            background: #c0863d;
        }
        
        .badge {
            font-size: 0.65rem;
            padding: 1px 6px;
        }
    </style>
</head>
<body>

<!-- ENHANCED TOP ANNOUNCEMENT BAR -->
<div class="w-full gradient-bg text-white overflow-hidden relative">

    
    <div class="relative py-2.5 px-4">
        <div class="flex items-center justify-center max-w-7xl mx-auto">
            <!-- Left icon -->
            <div class="hidden md:flex items-center space-x-2 absolute left-4 top-1/2 transform -translate-y-1/2">
                <i class="fas fa-leaf text-yellow-200 text-sm animate-float"></i>
                <span class="text-xs font-light text-yellow-100" style="color: #fef3c7;">Purely Natural</span>
            </div>
            
            <!-- Centered Fade Animation Text -->
            <div class="relative w-full flex justify-center items-center h-6 overflow-hidden">
                 <div id="announcement-text" class="text-sm font-light tracking-wide transition-opacity duration-500 opacity-100 flex items-center gap-2">
                    <!-- Initial Content -->
                    <i class="fas fa-spa text-accent"></i>
                    <span>✨ Naturally Nurturing Your Everyday Well-Being</span>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const messages = [
                        { icon: 'fa-spa', text: 'Naturally Nurturing Your Everyday Well-Being' },
                        { icon: 'fa-leaf', text: '🌿 Premium Organic Ingredients' },
                        { icon: 'fa-truck-fast', text: 'Free Shipping on Orders Over Rs-50' }
                    ];
                    
                    let currentIndex = 0;
                    const textElement = document.getElementById('announcement-text');
                    
                    if(textElement) {
                        setInterval(() => {
                            // Fade out
                            textElement.classList.remove('opacity-100');
                            textElement.classList.add('opacity-0');
                            
                            setTimeout(() => {
                                // Change text
                                currentIndex = (currentIndex + 1) % messages.length;
                                const msg = messages[currentIndex];
                                
                                textElement.innerHTML = `
                                    <i class="fas ${msg.icon} text-accent"></i>
                                    <span>${msg.text}</span>
                                `;
                                
                                // Fade in
                                textElement.classList.remove('opacity-0');
                                textElement.classList.add('opacity-100');
                            }, 500); // Wait for fade out transition to complete
                        }, 2500); // Change every 2.5 seconds (2s visible + 0.5s transition)
                    }
                });
            </script>
            
            <!-- Right CTA -->
            <div class="hidden md:flex items-center space-x-3 absolute right-4 top-1/2 transform -translate-y-1/2">
                <span class="text-xs font-light text-yellow-100" style="color: #fef3c7;">Limited Offer</span>
                <a href="/offers" class="bg-yellow-200 text-primary-dark text-xs font-medium px-3 py-1 rounded-full hover:bg-yellow-100 transition-all duration-300 transform hover:scale-105">
                    Shop Now <i class="fas fa-arrow-right ml-1 text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- MAIN HEADER -->
<header class="w-full border-b border-gray-100 shadow-sm bg-white/95 backdrop-blur-sm sticky top-0 z-50">
    <div class=" mx-auto flex items-center justify-between px-12 sm:px-6 lg:px-12 py-0 lg:py-2">
        
        <!-- LOGO -->
        <a href="/">
            <div class="flex items-center space-x-2 group cursor-pointer">
                <div class="relative">
                    <img src="{{ asset('assets/logo.png') }}" alt="Parcos Logo" class="w-14 h-14 lg:w-16 lg:h-16 transition-all duration-300 group-hover:scale-105">
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-accent rounded-full flex items-center justify-center">
                        <i class="fas fa-leaf text-primary text-xs"></i>
                    </div>
                </div>
                <div class="flex flex-col">
                    <img src="{{ asset('assets/logo-text.png') }}" alt="Parcos" class="w-28 lg:w-32 h-auto">
                    <span class="text-[10px] text-gray-500 font-light tracking-widest mt-0.5">PURE WELLNESS</span>
                </div>
            </div>
        </a>

        <!-- NAVIGATION -->
        <nav class="hidden lg:flex items-center space-x-10">
            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }} text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300">
               
                Home
            </a>
            <a href="/collection" class="nav-link {{ request()->is('collection*') ? 'active' : '' }} text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300 relative group">
               
                Collection
                <!-- <span class="absolute -top-2 -right-3 bg-primary text-yellow-100 text-xs px-2 py-0.5 rounded-full transform scale-75" style="color: #fef3c7;">New</span> -->
            </a>
             <a href="/membership" class="nav-link {{ request()->is('membership') ? 'active' : '' }} text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300">
              
                Membership
            </a>
            <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }} text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300">
              
                Contact Us
            </a>
            <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }} text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300">
              
                About Us
            </a>
        </nav>

        <!-- ACTION ICONS -->
        <div class="flex items-center space-x-5 lg:space-x-7">
            <!-- Search -->
            <div class="relative" id="search-component">
                <button type="button" id="search-toggle" class="focus:outline-none" aria-label="Open search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600 hover:text-primary cursor-pointer icon-hover transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </div>
            
            <!-- User -->
            <div class="relative group">
                <a href="/user-account" class="flex items-center text-gray-600 hover:text-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer icon-hover">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </a>
            </div>
            
            <!-- Wishlist -->
            <a href="/wishlist">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600 hover:text-red-500 cursor-pointer icon-hover">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                    <span id="wishlist-count" class="absolute -top-1 -right-1 bg-primary text-yellow-100 text-[10px] w-4 h-4 rounded-full flex items-center justify-center hidden" style="color: #fef3c7;">0</span>
                </div>
            </a>
            
            <!-- Cart -->
            <a href="/cart" class="relative cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600 hover:text-primary icon-hover">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                @php
                    $cartCount = count(session('cart', []));
                @endphp
                @if($cartCount > 0)
                <span class="absolute -top-1 -right-1 bg-primary text-yellow-100 text-[10px] w-4 h-4 rounded-full flex items-center justify-center" style="color: #fef3c7;">
                    {{ $cartCount }}
                </span>
                @endif
            </a>
            
            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-gray-600 hover:text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Search Overlay -->
<div id="search-overlay" class="fixed inset-0 bg-white/95 backdrop-blur-xl opacity-0 invisible transition-all duration-300 z-[1000] flex flex-col items-center justify-center">
    <!-- Close Button -->
    <button type="button" id="overlay-close" class="absolute top-6 right-6 text-gray-400 hover:text-gray-900 transition-colors p-2 transform hover:rotate-90 duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>

    <div class="w-full max-w-3xl px-6 relative -mt-20">
        <form action="{{ route('search') }}" method="GET" class="relative group">
            <input
                type="text"
                name="q"
                id="overlay-search-input"
                placeholder="Search for scents..."
                class="w-full bg-transparent border-b-2 border-gray-100 py-4 text-3xl md:text-4xl lg:text-5xl font-serif text-center text-gray-900 placeholder-gray-200 focus:outline-none focus:border-[#c0863d] transition-colors"
                autocomplete="off"
            >
             <button type="submit" class="absolute right-0 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#c0863d] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </form>

        <!-- Quick Links -->
        <div id="search-quick-links" class="mt-12 text-center transition-all duration-300 opacity-100 transform translate-y-0">
             <p class="text-xs text-gray-400 mb-6 uppercase tracking-[0.2em] font-medium">Popular Collections</p>
             <div class="flex flex-wrap justify-center gap-3">
                <a href="/collection" class="px-6 py-2.5 rounded-full bg-gray-50 text-gray-600 border border-transparent hover:border-[#c0863d]/30 hover:bg-[#c0863d]/5 hover:text-[#c0863d] transition-all duration-300 text-sm">All Collections</a>
                <a href="/search?q=Summer" class="px-6 py-2.5 rounded-full bg-gray-50 text-gray-600 border border-transparent hover:border-[#c0863d]/30 hover:bg-[#c0863d]/5 hover:text-[#c0863d] transition-all duration-300 text-sm">Summer</a>
                <a href="/search?q=Winter" class="px-6 py-2.5 rounded-full bg-gray-50 text-gray-600 border border-transparent hover:border-[#c0863d]/30 hover:bg-[#c0863d]/5 hover:text-[#c0863d] transition-all duration-300 text-sm">Winter</a>
                <a href="/search?q=Gift" class="px-6 py-2.5 rounded-full bg-gray-50 text-gray-600 border border-transparent hover:border-[#c0863d]/30 hover:bg-[#c0863d]/5 hover:text-[#c0863d] transition-all duration-300 text-sm">Gift Sets</a>
             </div>
        </div>

        <!-- Results Container -->
        <div id="overlay-results" class="hidden mt-8 max-h-[60vh] overflow-y-auto bg-white rounded-2xl shadow-2xl border border-gray-100 p-2 scrollbar-hide"></div>
    </div>
</div>



    <script>
        function updateWishlistCount() {
            const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            const countSpan = document.getElementById('wishlist-count');
            if (wishlist.length > 0) {
                countSpan.textContent = wishlist.length;
                countSpan.classList.remove('hidden');
            } else {
                countSpan.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', updateWishlistCount);
        window.addEventListener('wishlist-updated', updateWishlistCount);
        window.addEventListener('storage', (e) => {
            if (e.key === 'wishlist') updateWishlistCount();
        });

        // Search Overlay Logic
        document.addEventListener('DOMContentLoaded', function() {
            const searchToggle = document.getElementById('search-toggle');
            const overlay = document.getElementById('search-overlay');
            const overlayInput = document.getElementById('overlay-search-input');
            const overlayClose = document.getElementById('overlay-close');
            const resultsBox = document.getElementById('overlay-results');
            const quickLinks = document.getElementById('search-quick-links');
            let isOpen = false;
            let debounceTimer = null;

            function openOverlay() {
                isOpen = true;
                overlay.classList.remove('invisible', 'opacity-0');
                // Reset state
                overlayInput.value = '';
                resultsBox.classList.add('hidden');
                if(quickLinks) quickLinks.classList.remove('hidden', 'opacity-0', 'translate-y-4');
                setTimeout(() => overlayInput.focus(), 100);
            }

            function closeOverlay() {
                isOpen = false;
                overlay.classList.add('opacity-0', 'invisible');
                setTimeout(() => {
                    resultsBox.classList.add('hidden');
                    resultsBox.innerHTML = '';
                    overlayInput.value = '';
                    if(quickLinks) quickLinks.classList.remove('hidden');
                }, 300);
            }

            if(searchToggle) {
                searchToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (isOpen) closeOverlay(); else openOverlay();
                });
            }

            if(overlayClose) {
                overlayClose.addEventListener('click', function(e) {
                    e.stopPropagation();
                    closeOverlay();
                });
            }

            // Close when clicking on the backdrop
            if(overlay) {
                overlay.addEventListener('click', function(e) {
                    if (e.target === overlay) {
                        closeOverlay();
                    }
                });
            }

            // ESC to close
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isOpen) {
                    closeOverlay();
                }
            });

            function renderResults(items, q) {
                if (!Array.isArray(items) || items.length === 0) {
                    resultsBox.classList.remove('hidden');
                    resultsBox.innerHTML = `
                        <div class="p-8 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 text-gray-300 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </div>
                            <div class="text-lg text-gray-900 font-medium mb-1">No matches found</div>
                            <div class="text-sm text-gray-500">We couldn't find any products for “${q}”</div>
                        </div>
                    `;
                    return;
                }
                const list = items.map(item => `
                    <a href="/product/${item.id}" class="flex items-center gap-4 px-4 py-3 rounded-xl hover:bg-gray-50 transition group">
                        <img src="${item.image_url}" alt="${item.name}" class="w-16 h-16 rounded-lg object-cover shadow-sm group-hover:shadow-md transition">
                        <div class="flex-1 min-w-0">
                            <div class="text-base font-medium text-gray-900 truncate group-hover:text-[#c0863d] transition">${item.name}</div>
                            <div class="text-xs text-gray-400 truncate mt-0.5">${item.category || 'Fragrance'}</div>
                        </div>
                        <div class="text-sm font-semibold text-gray-900">₹${Number(item.price).toLocaleString('en-IN')}</div>
                    </a>
                `).join('');
                
                const viewAll = `
                    <div class="p-2 border-t border-gray-100 mt-2">
                        <a href="/search?q=${encodeURIComponent(q)}" class="block text-center w-full py-3 text-sm font-medium text-white bg-[#c0863d] rounded-xl hover:bg-black transition shadow-lg shadow-[#c0863d]/20">
                            View all ${items.length}+ results
                        </a>
                    </div>
                `;
                resultsBox.innerHTML = `<div class="p-2 space-y-1">${list}</div>${viewAll}`;
                resultsBox.classList.remove('hidden');
            }

            function fetchResults(q) {
                resultsBox.classList.remove('hidden');
                resultsBox.innerHTML = `
                    <div class="p-8 text-center text-gray-400">
                        <i class="fas fa-spinner fa-spin text-2xl mb-2 text-[#c0863d]"></i>
                        <div class="text-sm">Searching...</div>
                    </div>
                `;
                
                fetch(`/search/suggest?q=${encodeURIComponent(q)}`, { headers: { 'Accept': 'application/json' } })
                    .then(r => r.json())
                    .then(data => renderResults(data.results || [], q))
                    .catch(() => {
                        resultsBox.innerHTML = `<div class="p-6 text-center text-sm text-red-500">Something went wrong. Please try again.</div>`;
                    });
            }

            if(overlayInput) {
                overlayInput.addEventListener('input', function() {
                    const q = overlayInput.value.trim();
                    clearTimeout(debounceTimer);
                    
                    if (q.length === 0) {
                        resultsBox.classList.add('hidden');
                        resultsBox.innerHTML = '';
                        if(quickLinks) quickLinks.classList.remove('hidden', 'opacity-0', 'translate-y-4');
                        return;
                    }
                    
                    // Hide quick links with fade
                    if(quickLinks) {
                        quickLinks.classList.add('opacity-0', 'translate-y-4');
                        setTimeout(() => quickLinks.classList.add('hidden'), 300);
                    }
                    
                    debounceTimer = setTimeout(() => fetchResults(q), 300);
                });
            }
        });
    </script>
</body>
</html>
