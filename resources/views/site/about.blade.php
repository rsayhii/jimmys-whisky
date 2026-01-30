@extends('layouts.app')

@section('title', 'About Us - Parcos')

@section('content')

<!-- Hero Section -->
<div class="relative bg-gray-900 py-24 sm:py-32">
    <div class="absolute inset-0 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1615634260167-c8cdede054de?q=80&w=2070&auto=format&fit=crop" 
             alt="Perfume Bottles" 
             class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-serif text-white mb-6 tracking-wide">The Essence of Luxury</h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto font-light leading-relaxed">
            Curating the world's finest fragrances for those who appreciate the art of scent. Welcome to Parcos, where every bottle tells a story.
        </p>
    </div>
</div>

<!-- Our Story Section -->
<div class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-[#c0863d]/10 rounded-tl-3xl -z-10"></div>
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#c0863d]/10 rounded-br-3xl -z-10"></div>
                <img src="https://images.unsplash.com/photo-1547887538-e3a2f32cb1cc?q=80&w=1887&auto=format&fit=crop" 
                     alt="Our Story" 
                     class="w-full h-[500px] object-cover rounded-lg shadow-xl">
            </div>
            <div class="space-y-6">
                <h2 class="text-sm font-bold text-[#c0863d] uppercase tracking-widest">Our Story</h2>
                <h3 class="text-3xl md:text-4xl font-serif text-gray-900">A Passion for Pure Elegance</h3>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        Founded with a vision to bring the world's most exquisite scents to your doorstep, Parcos has grown from a small boutique to a premier destination for luxury fragrances. We believe that a perfume is more than just a scent—it is an invisible accessory, a personal signature, and a powerful memory trigger.
                    </p>
                    <p>
                        Our journey began in the heart of Mumbai, driven by a desire to bridge the gap between international luxury and the Indian connoisseur. Today, we curate a collection that spans continents, bringing you the finest olfactory masterpieces from Paris, Milan, New York, and beyond.
                    </p>
                    <p>
                        At Parcos, authenticity is our hallmark. Every bottle we sell is sourced directly from the brands or their authorized distributors, ensuring that you experience the fragrance exactly as the perfumer intended.
                    </p>
                </div>
                <div class="pt-4">
                    <img src="{{ asset('assets/logo-text.png') }}" alt="Signature" class="h-12 opacity-80">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Values/Features Section -->
<div class="bg-gray-50 py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-serif text-gray-900 mb-4">Why Choose Parcos?</h2>
            <p class="text-gray-600">We are committed to providing an unparalleled shopping experience, rooted in trust, quality, and luxury.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 text-center group">
                <div class="w-16 h-16 bg-[#c0863d]/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-[#c0863d] transition-colors duration-300">
                    <i class="fas fa-certificate text-2xl text-[#c0863d] group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-serif text-gray-900 mb-3">100% Authentic</h3>
                <p class="text-gray-600 text-sm">We guarantee the authenticity of every product. Sourced directly from authorized distributors.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 text-center group">
                <div class="w-16 h-16 bg-[#c0863d]/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-[#c0863d] transition-colors duration-300">
                    <i class="fas fa-truck-fast text-2xl text-[#c0863d] group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-serif text-gray-900 mb-3">Express Delivery</h3>
                <p class="text-gray-600 text-sm">Fast and secure shipping across India. Your luxury fragrance reaches you in perfect condition.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 text-center group">
                <div class="w-16 h-16 bg-[#c0863d]/10 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-[#c0863d] transition-colors duration-300">
                    <i class="fas fa-headset text-2xl text-[#c0863d] group-hover:text-white transition-colors duration-300"></i>
                </div>
                <h3 class="text-xl font-serif text-gray-900 mb-3">Expert Support</h3>
                <p class="text-gray-600 text-sm">Our fragrance experts are here to help you find your signature scent or the perfect gift.</p>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="relative py-16 bg-[#c0863d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div>
                <div class="text-4xl font-bold mb-2">10k+</div>
                <div class="text-sm uppercase tracking-wider opacity-80">Happy Customers</div>
            </div>
            <div>
                <div class="text-4xl font-bold mb-2">500+</div>
                <div class="text-sm uppercase tracking-wider opacity-80">Premium Brands</div>
            </div>
            <div>
                <div class="text-4xl font-bold mb-2">15+</div>
                <div class="text-sm uppercase tracking-wider opacity-80">Years Experience</div>
            </div>
            <div>
                <div class="text-4xl font-bold mb-2">24/7</div>
                <div class="text-sm uppercase tracking-wider opacity-80">Support</div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter/CTA -->
<div class="py-16 sm:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-serif text-gray-900 mb-6">Join Our Exclusive Community</h2>
        <p class="text-gray-600 mb-8">Subscribe to receive updates on new arrivals, special offers, and expert fragrance tips.</p>
        <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
            <input type="email" placeholder="Enter your email address" class="flex-1 px-6 py-3 rounded-full border border-gray-300 focus:outline-none focus:border-[#c0863d] focus:ring-1 focus:ring-[#c0863d]">
            <button type="submit" class="bg-[#c0863d] text-white px-8 py-3 rounded-full hover:bg-[#a87533] transition-colors font-medium">Subscribe</button>
        </form>
    </div>
</div>

@endsection