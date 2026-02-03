@extends('layouts.app')

@section('title', 'Elite Membership - Parcos')

@section('content')

<!-- Global Styles for Luxury Feel -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;500;600&display=swap');
    
    .font-luxury { font-family: 'Playfair Display', serif; }
    .font-modern { font-family: 'Montserrat', sans-serif; }
    
    .gold-gradient {
        background: linear-gradient(135deg, #eecda3 0%, #dbb686 25%, #bf953f 50%, #b38728 75%, #fbf5b7 100%);
    }
    .gold-text {
        background: linear-gradient(135deg, #eecda3 0%, #dbb686 25%, #bf953f 50%, #b38728 75%, #fbf5b7 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .glass-light {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    .luxury-shadow {
        box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.1);
    }
    .grain-overlay {
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.05'/%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 1;
    }
</style>

<!-- Hero Section -->
<div class="relative bg-[#050505] min-h-screen flex items-center overflow-hidden font-modern">
    <!-- Ambient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0a0a0a] via-[#050505] to-[#1a1005]"></div>
    <div class="grain-overlay"></div>
    
    <!-- Light Glows -->
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-[#c0863d] opacity-[0.03] rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-[#c0863d] opacity-[0.02] rounded-full blur-[100px] translate-y-1/3 -translate-x-1/3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10 w-full">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <!-- Content -->
            <div class="text-center lg:text-left space-y-8">
                <!-- <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full border border-[#c0863d]/30 bg-[#c0863d]/5 backdrop-blur-sm animate-fade-in-up">
                    <span class="w-2 h-2 rounded-full bg-[#c0863d] animate-pulse"></span>
                    <span class="text-[#c0863d] text-xs font-semibold tracking-[0.2em] uppercase">Private Invitation • 142 Slots Left</span>
                </div> -->
                
                <div class="mt-4 inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-white/5 border border-[#c0863d]/40 shadow-sm">
                    <i class="fas fa-gift text-[#c0863d]"></i>
                    <span class="text-xs font-bold tracking-[0.25em] uppercase text-[#c0863d]">Launch Offer</span>
                    <span class="text-sm md:text-base text-white">
                        First 1000 get <span class="gold-text font-semibold">Free Membership</span>
                        <span class="text-gray-300">(₹1,699)</span>
                        <span class="hidden sm:inline">on first perfume purchase</span>
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-luxury text-white leading-[1.1] tracking-tight">
                    The Art of <br>
                    <span class="gold-text italic pr-2">Curated Luxury</span>
                </h1>
                
                <p class="text-gray-400 text-lg md:text-xl font-light max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    Unlock a lifetime of olfactory excellence. Secure your future with <span class="text-white font-medium">10 premium refills</span> at an exclusive, locked-in privilege price.
                </p>

                <div class="flex flex-col sm:flex-row gap-5 justify-center lg:justify-start pt-4">
                    <button class="group relative px-8 py-4 bg-gradient-to-r from-[#c0863d] to-[#a87533] text-white rounded-none overflow-hidden transition-all hover:shadow-[0_0_30px_rgba(192,134,61,0.3)]">
                        <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out"></span>
                        <span class="relative font-medium tracking-wide flex items-center gap-3">
                            CLAIM MEMBERSHIP
                            <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </button>
                    <button class="px-8 py-4 border border-white/10 text-gray-300 hover:text-white hover:border-[#c0863d]/50 hover:bg-[#c0863d]/5 transition-all tracking-wide font-light">
                        DISCOVER BENEFITS
                    </button>
                </div>
            </div>

            <!-- 3D Card Visual -->
            <div class="relative perspective-1000 group cursor-pointer lg:h-[600px] flex items-center justify-center">
                <!-- Floating Orbs -->
                <div class="absolute top-1/4 right-10 w-24 h-24 bg-gradient-to-br from-[#c0863d] to-transparent opacity-10 blur-2xl rounded-full animate-float"></div>
                
                <!-- The Card -->
                <div class="relative w-full max-w-[420px] aspect-[1.58/1] transform rotate-y-[-15deg] rotate-x-[5deg] group-hover:rotate-y-0 group-hover:rotate-x-0 transition-all duration-700 ease-out preserve-3d">
                    
                    <!-- Card Glow -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#c0863d] to-transparent opacity-20 blur-lg rounded-2xl group-hover:opacity-40 transition-opacity duration-700"></div>

                    <!-- Card Face (Keep Dark for Contrast or Switch to White Gold?) -> Keeping Dark for Contrast as "Noir Edition" -->
                    <div class="absolute inset-0 bg-[#111] rounded-2xl border border-[#c0863d]/40 shadow-2xl overflow-hidden flex flex-col justify-between p-8 backdrop-blur-xl">
                        <!-- Noise Texture on Card -->
                        <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/stardust.png')"></div>
                        
                        <!-- Shine Effect -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 ease-in-out"></div>

                        <!-- Card Top -->
                        <div class="relative flex justify-between items-start z-10">
                            <div>
                                <h3 class="font-luxury text-2xl text-[#c0863d] tracking-wider">Jimmy's whiskey</h3>
                                <p class="text-[8px] text-gray-400 tracking-[0.3em] uppercase mt-1">Legendary Edition</p>
                            </div>
                            <div class="w-10 h-10 border border-[#c0863d]/30 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#c0863d]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            </div>
                        </div>

                        <!-- Card Chip & Number -->
                        <div class="relative z-10 space-y-6">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-9 rounded bg-gradient-to-br from-[#d4af37] to-[#8a6e2f] shadow-inner flex items-center justify-center border border-[#aa8c4a]">
                                    <div class="w-8 h-5 border border-black/20 rounded-sm opacity-50"></div>
                                </div>
                                <i class="fas fa-wifi text-gray-600 rotate-90 text-xl"></i>
                            </div>
                            <div class="font-mono text-xl md:text-2xl text-gray-200 tracking-[0.15em] shadow-black drop-shadow-md">
                                4829 •••• •••• 1000
                            </div>
                        </div>

                        <!-- Card Bottom -->
                        <div class="relative z-10 flex justify-between items-end">
                            <div>
                                <p class="text-[7px] text-gray-500 uppercase tracking-widest mb-1">Card Holder</p>
                                <p class="text-sm text-gray-200 font-medium tracking-wide">ELITE MEMBER</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[7px] text-gray-500 uppercase tracking-widest mb-1">Access</p>
                                <p class="text-[#c0863d] text-sm font-bold tracking-wider">10 REFILLS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Elegance Divider -->
<div class="h-px w-full bg-gradient-to-r from-transparent via-[#c0863d]/20 to-transparent"></div>

<!-- How It Works Section (Refined) -->
<div class="bg-gray-50 py-24 font-modern relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <span class="text-[#c0863d] text-xs font-bold tracking-[0.2em] uppercase">Simplicity Redefined</span>
            <h2 class="text-3xl md:text-4xl font-luxury text-gray-900 mt-3">The Privilege Process</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-12 relative">
            <!-- Connecting Line -->
            <div class="hidden md:block absolute top-12 left-0 w-full h-px bg-gradient-to-r from-transparent via-gray-200 to-transparent z-0"></div>

            <!-- Step 1 -->
            <div class="relative z-10 group">
                <div class="w-24 h-24 mx-auto bg-white rounded-full border border-gray-200 flex items-center justify-center mb-8 group-hover:border-[#c0863d] transition-colors duration-500 shadow-xl">
                    <span class="text-3xl group-hover:scale-110 transition-transform duration-500">💎</span>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-luxury text-gray-900 mb-3">Secure Membership</h3>
                    <p class="text-gray-500 text-sm leading-relaxed px-4">
                        Join the elite circle for <span class="text-[#c0863d]">₹1,699</span>. Instant access to your digital membership card.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative z-10 group">
                <div class="w-24 h-24 mx-auto bg-white rounded-full border border-gray-200 flex items-center justify-center mb-8 group-hover:border-[#c0863d] transition-colors duration-500 shadow-xl">
                    <span class="text-3xl group-hover:scale-110 transition-transform duration-500">✨</span>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-luxury text-gray-900 mb-3">Select at Leisure</h3>
                    <p class="text-gray-500 text-sm leading-relaxed px-4">
                        No rush. Choose your 10 distinct fragrances today, tomorrow, or next year.
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative z-10 group">
                <div class="w-24 h-24 mx-auto bg-white rounded-full border border-gray-200 flex items-center justify-center mb-8 group-hover:border-[#c0863d] transition-colors duration-500 shadow-xl">
                    <span class="text-3xl group-hover:scale-110 transition-transform duration-500">📦</span>
                </div>
                <div class="text-center">
                    <h3 class="text-xl font-luxury text-gray-900 mb-3">Doorstep Luxury</h3>
                    <p class="text-gray-500 text-sm leading-relaxed px-4">
                        Each refill is professionally bottled and delivered in our signature noir packaging.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing Section (Elegant) -->
<div class="py-24 bg-white relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]"></div>
    
    <div class="max-w-4xl mx-auto px-4 relative z-10">
        <div class="glass-light rounded-3xl p-10 md:p-16 text-center luxury-shadow transform transition-all hover:scale-[1.01] duration-500 border border-gray-100">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-6 py-2 border border-[#c0863d]/30 rounded-full shadow-sm">
                <span class="text-[#c0863d] text-xs font-bold tracking-[0.2em] uppercase">Limited Time Offer</span>
            </div>

            <h2 class="text-4xl md:text-5xl font-luxury text-gray-900 mb-2">The Collection Pass</h2>
            <p class="text-gray-500 font-light mb-10">Exclusive access to the Parcos Perfume Library</p>
            <div class="flex justify-center mb-8">
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full border border-[#c0863d]/30 bg-[#c0863d]/10 text-[#c0863d]">
                    <i class="fas fa-gift"></i>
                    <span class="text-xs font-bold tracking-[0.25em] uppercase">Launch Offer</span>
                    <span class="text-sm md:text-base font-medium text-gray-800">
                        First 1000 get <span class="gold-text">Free Membership</span> <span>(₹1,699)</span>
                    </span>
                </div>
            </div>

            <div class="flex items-baseline justify-center gap-4 mb-12">
                <span class="text-6xl md:text-7xl font-light text-gray-900">₹1,699</span>
                <span class="text-xl text-gray-400 line-through font-light">₹5,000</span>
            </div>

            <div class="grid md:grid-cols-2 gap-y-4 gap-x-12 text-left max-w-2xl mx-auto mb-12">
                <div class="flex items-center gap-3 text-gray-700 font-light">
                    <span class="text-[#c0863d] text-xl">✓</span> 10 Premium Perfume Refills
                </div>
                <div class="flex items-center gap-3 text-gray-700 font-light">
                    <span class="text-[#c0863d] text-xl">✓</span> Lifetime Validity
                </div>
                <div class="flex items-center gap-3 text-gray-700 font-light">
                    <span class="text-[#c0863d] text-xl">✓</span> Transferable Membership
                </div>
                <div class="flex items-center gap-3 text-gray-700 font-light">
                    <span class="text-[#c0863d] text-xl">✓</span> Priority Support
                </div>
            </div>

            <a href="/user-membership" >
                <button class="w-full md:w-auto min-w-[300px] px-10 py-5 bg-[#c0863d] hover:bg-[#a87533] text-white text-lg font-medium tracking-wide transition-all shadow-lg hover:shadow-[#c0863d]/40 rounded-sm">
                    SECURE MEMBERSHIP
                </button>
            </a>
            
            <p class="mt-6 text-xs text-gray-500 font-modern tracking-wide">
                <i class="fas fa-lock mr-1"></i> Secured by 256-bit SSL Encryption
            </p>
        </div>
    </div>
</div>



<style>
    .preserve-3d { transform-style: preserve-3d; }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
</style>

<div class="bg-white pt-2 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-[#c0863d] text-xs font-bold tracking-[0.2em] uppercase">FAQs</span>
            <h2 class="text-3xl md:text-4xl font-luxury text-gray-900 mt-3">Membership FAQs</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Quick answers to common questions</p>
        </div>
        <div class="grid grid-cols-1 gap-6">
            <details class="group bg-gray-50 rounded-xl border border-gray-200 p-5">
                <summary class="flex justify-between items-center cursor-pointer text-gray-900 font-medium">
                    <span>Is the membership validity lifetime?</span>
                    <span class="ml-4 text-[#c0863d]">+</span>
                </summary>
                <div class="pt-3 text-gray-600">
                    Yes, your membership remains valid for life and refills can be claimed anytime.
                </div>
            </details>
            <details class="group bg-gray-50 rounded-xl border border-gray-200 p-5">
                <summary class="flex justify-between items-center cursor-pointer text-gray-900 font-medium">
                    <span>How do I claim my perfume refills?</span>
                    <span class="ml-4 text-[#c0863d]">+</span>
                </summary>
                <div class="pt-3 text-gray-600">
                    Go to My Membership and submit a refill request. Our team will coordinate pickup and delivery.
                </div>
            </details>
            <details class="group bg-gray-50 rounded-xl border border-gray-200 p-5">
                <summary class="flex justify-between items-center cursor-pointer text-gray-900 font-medium">
                    <span>Can I transfer my membership?</span>
                    <span class="ml-4 text-[#c0863d]">+</span>
                </summary>
                <div class="pt-3 text-gray-600">
                    Yes, the membership is transferable. Contact support to initiate the transfer.
                </div>
            </details>
            <details class="group bg-gray-50 rounded-xl border border-gray-200 p-5">
                <summary class="flex justify-between items-center cursor-pointer text-gray-900 font-medium">
                    <span>What is the delivery timeline for refills?</span>
                    <span class="ml-4 text-[#c0863d]">+</span>
                </summary>
                <div class="pt-3 text-gray-600">
                    Refills are typically delivered within 3–7 business days after pickup confirmation.
                </div>
            </details>
            <details class="group bg-gray-50 rounded-xl border border-gray-200 p-5">
                <summary class="flex justify-between items-center cursor-pointer text-gray-900 font-medium">
                    <span>Are membership payments refundable?</span>
                    <span class="ml-4 text-[#c0863d]">+</span>
                </summary>
                <div class="pt-3 text-gray-600">
                    Memberships are non-refundable. For assistance, please reach out to customer support.
                </div>
            </details>
            <details class="group bg-gray-50 rounded-xl border border-gray-200 p-5">
                <summary class="flex justify-between items-center cursor-pointer text-gray-900 font-medium">
                    <span>How do I contact support?</span>
                    <span class="ml-4 text-[#c0863d]">+</span>
                </summary>
                <div class="pt-3 text-gray-600">
                    Use the Contact Us page or email support; priority support is available to members.
                </div>
            </details>
        </div>
    </div>
</div>
@endsection
