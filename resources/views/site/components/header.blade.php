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
        
        .badge {
            font-size: 0.65rem;
            padding: 1px 6px;
        }
    </style>
</head>
<body class="bg-white">

<!-- ENHANCED TOP ANNOUNCEMENT BAR -->
<div class="w-full gradient-bg text-white overflow-hidden relative">
    <!-- Decorative elements -->
    <div class="absolute inset-0 overflow-hidden opacity-10">
        <div class="absolute -top-4 -left-4 w-8 h-8 rounded-full bg-white animate-pulse-gentle"></div>
        <div class="absolute top-1/4 right-1/4 w-6 h-6 rounded-full bg-white animate-float"></div>
        <div class="absolute bottom-1/3 left-1/3 w-4 h-4 rounded-full bg-white animate-pulse-gentle delay-1000"></div>
    </div>
    
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
                        { icon: 'fa-spa', text: '✨ Naturally Nurturing Your Everyday Well-Being' },
                        { icon: 'fa-leaf', text: '🌿 Premium Organic Ingredients' },
                        { icon: 'fa-truck-fast', text: '💫 Free Shipping on Orders Over Rs-50' }
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
    <div class=" mx-auto flex items-center justify-between px-12 sm:px-6 lg:px-12 py-2 lg:py-2">
        
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
            <a href="/" class="nav-link text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300">
               
                Home
            </a>
            <a href="/collection" class="nav-link text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300 relative group">
               
                Collection
                <span class="absolute -top-2 -right-3 bg-primary text-yellow-100 text-xs px-2 py-0.5 rounded-full transform scale-75" style="color: #fef3c7;">New</span>
            </a>
            <a href="/contact" class="nav-link text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300">
              
                Contact Us
            </a>
            <a href="/about" class="nav-link text-gray-700 hover:text-primary font-medium text-sm tracking-wide transition-colors duration-300">
              
                About Us
            </a>
        </nav>

        <!-- ACTION ICONS -->
        <div class="flex items-center space-x-5 lg:space-x-7">
            <!-- Search -->
            <div class="relative group">
                <i class="fa-solid fa-magnifying-glass text-gray-600 hover:text-primary cursor-pointer icon-hover text-lg"></i>
                <div class="absolute right-0 top-full mt-2 w-64 bg-white shadow-xl rounded-lg p-4 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                    <input type="text" placeholder="Search products..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/30">
                </div>
            </div>
            
            <!-- User -->
            <div class="relative group">
                <i class="fa-regular fa-user text-gray-600 hover:text-primary cursor-pointer icon-hover text-lg"></i>
                <div class="absolute right-0 top-full mt-2 w-48 bg-white shadow-xl rounded-lg p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                    <a href="/account" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded">My Account</a>
                    <a href="/orders" class="block px-3 py-2 text-sm hover:bg-gray-50 rounded">Orders</a>
                </div>
            </div>
            
            <!-- Wishlist -->
            <a href="/wishlist">
                <div class="relative">
                    <i class="fa-regular fa-heart text-gray-600 hover:text-red-500 cursor-pointer icon-hover text-lg"></i>
                    <span class="absolute -top-2 -right-2 bg-primary text-yellow-100 text-xs w-5 h-5 rounded-full flex items-center justify-center" style="color: #fef3c7;">3</span>
                </div>
            </a>
            
            <!-- Cart -->
            <div class="relative cursor-pointer" id="cart-trigger">
                <i class="fa-solid fa-cart-shopping text-gray-600 hover:text-primary icon-hover text-lg"></i>
                <span class="absolute -top-2 -right-2 bg-primary text-yellow-100 text-xs w-5 h-5 rounded-full flex items-center justify-center" style="color: #fef3c7;">2</span>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-gray-600 hover:text-primary text-xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<!-- Cart Drawer Overlay & Sidebar -->
<div id="cart-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-[60] hidden transition-opacity duration-300 opacity-0"></div>

<div id="cart-drawer" class="fixed top-0 right-0 h-full w-full sm:w-[400px] bg-white z-[70] transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col font-sans">
    <!-- Drawer Header -->
    <div class="flex items-center justify-between p-5 border-b border-gray-100">
        <h2 class="text-2xl font-serif text-[#c0863d]">Your cart</h2>
        <button id="close-cart" class="text-gray-400 hover:text-black transition-colors focus:outline-none p-1">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>

    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto p-5 space-y-6">
        <!-- Cart Item -->
        <div class="flex gap-4">
            <div class="w-20 h-20 flex-shrink-0 bg-gray-50 rounded-md overflow-hidden border border-gray-100">
                <img src="{{ asset('assets/collection/1.jpg') }}" alt="MUKH RANJAN" class="w-full h-full object-cover">
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <div>
                    <h3 class="font-medium text-sm text-gray-900 line-clamp-2 leading-snug">MUKH RANJAN™ DANT MANJAN</h3>
                    <div class="mt-1 text-sm font-medium text-gray-900">Rs. 60.00</div>
                    <div class="text-xs text-gray-500 mt-0.5">Item Total: Rs. 60.00</div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div class="flex items-center border border-gray-300 rounded">
                        <button class="w-7 h-7 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition">-</button>
                        <span class="w-8 text-center text-sm text-gray-900">1</span>
                        <button class="w-7 h-7 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition">+</button>
                    </div>
                    <button class="text-xs text-gray-500 hover:text-red-500 underline decoration-1 underline-offset-2 transition-colors">Remove</button>
                </div>
            </div>
        </div>
        
        <!-- Add order notes -->
        <div class="pt-2">
            <button class="flex items-center text-sm text-gray-600 hover:text-[#c0863d] gap-2 transition-colors group">
                <i class="fas fa-plus text-xs group-hover:scale-110 transition-transform"></i> Add order notes
            </button>
        </div>
    </div>

    <!-- Drawer Footer -->
    <div class="border-t border-gray-100 p-5 bg-gray-50/50">
        <div class="space-y-2 text-sm mb-4">
            <div class="flex justify-between text-gray-600">
                <span>Subtotal</span>
                <span>Rs. 60.00</span>
            </div>
             <div class="flex justify-between text-gray-600">
                <span>Shipping</span>
                <span>Rs. 60.00</span>
            </div>
            <div class="flex justify-between font-bold text-lg text-gray-900 pt-3 border-t border-gray-200 mt-2">
                <span>Total</span>
                <span>Rs. 120.00 INR</span>
            </div>
            <p class="text-xs text-gray-500 mt-2">Tax included. Shipping calculated at checkout.</p>
        </div>
        <button class="w-full bg-[#c0863d] text-white py-3.5 rounded-lg font-medium hover:bg-[#a87533] transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 duration-200">
            Checkout
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cartTrigger = document.getElementById('cart-trigger');
        const cartDrawer = document.getElementById('cart-drawer');
        const cartOverlay = document.getElementById('cart-overlay');
        const closeCartBtn = document.getElementById('close-cart');

        function openCart() {
            cartOverlay.classList.remove('hidden');
            // Force reflow to enable transition
            void cartOverlay.offsetWidth; 
            cartOverlay.classList.remove('opacity-0');
            
            cartDrawer.classList.remove('translate-x-full');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function closeCart() {
            cartOverlay.classList.add('opacity-0');
            cartDrawer.classList.add('translate-x-full');
            document.body.style.overflow = '';
            
            setTimeout(() => {
                cartOverlay.classList.add('hidden');
            }, 300);
        }

        if(cartTrigger) {
            cartTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                openCart();
            });
        }

        if(closeCartBtn) {
            closeCartBtn.addEventListener('click', closeCart);
        }

        if(cartOverlay) {
            cartOverlay.addEventListener('click', closeCart);
        }
        
        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !cartDrawer.classList.contains('translate-x-full')) {
                closeCart();
            }
        });
    });
</script>

</body>
</html>