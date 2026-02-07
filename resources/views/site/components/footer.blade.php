<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

<style>
    .footer-wrapper {
        font-family: 'Lato', sans-serif;
    }
    .footer-heading {
        font-family: 'Playfair Display', serif;
    }
</style>

<!-- ================= FOOTER START ================= -->
<footer class="footer-wrapper bg-[#FAF7F2] border-t border-[#c0863d]/10 pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 mb-16">

            <!-- Brand Column -->
            <div class="lg:col-span-1 space-y-6">
                <div class="flex items-center gap-3 group cursor-pointer">
                    <div class="relative">
                        <img src="{{ asset('assets/logo.png') }}" alt="Parcos Logo" class="w-12 h-12 object-contain opacity-90 transition-transform duration-500 group-hover:rotate-12">
                    </div>
                    <div class="flex flex-col">
                        <img src="{{ asset('assets/logo-text.png') }}" alt="Parcos" class="w-24 h-auto opacity-90">
                        <span class="text-[9px] text-[#c0863d] font-bold tracking-[0.25em] uppercase mt-1">Pure Wellness</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600 font-normal leading-relaxed pr-4">
                    Curating the finest fragrances and beauty essentials for the discerning connoisseur. Elevate your senses with our premium collection.
                </p>
                <div class="flex gap-4 pt-2">
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-[#c0863d] hover:border-[#c0863d] hover:text-white transition-all duration-300">
                        <i class="fab fa-instagram text-xs"></i>
                    </a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-[#c0863d] hover:border-[#c0863d] hover:text-white transition-all duration-300">
                        <i class="fab fa-facebook-f text-xs"></i>
                    </a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-[#c0863d] hover:border-[#c0863d] hover:text-white transition-all duration-300">
                        <i class="fab fa-youtube text-xs"></i>
                    </a>
                </div>
            </div>
           
            <!-- Shop -->
            <div class="lg:col-span-1 lg:pl-8">
                <h4 class="text-lg font-bold text-gray-900 mb-6 footer-heading">Shop</h4>
                <ul class="space-y-3 text-sm font-medium text-gray-600">
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Fragrance</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Makeup</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Skincare</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Hair Care</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Exclusive Brands</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Gifting</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="lg:col-span-1">
                <h4 class="text-lg font-bold text-gray-900 mb-6 footer-heading">Support</h4>
                <ul class="space-y-3 text-sm font-medium text-gray-600">
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">About Us</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">My Account</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Order Status</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Membership</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Contact Us</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class="lg:col-span-1">
                <h4 class="text-lg font-bold text-gray-900 mb-6 footer-heading">Legal</h4>
                <ul class="space-y-3 text-sm font-medium text-gray-600">
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Terms & Conditions</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Shipping Policy</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Returns & Exchanges</a></li>
                    <li><a href="#" class="hover:text-[#c0863d] hover:pl-2 transition-all duration-300 inline-block">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Newsletter / Contact -->
            <div class="lg:col-span-1">
                <h4 class="text-lg font-bold text-gray-900 mb-6 footer-heading">Contact Us</h4>
                <ul class="space-y-4 text-sm font-medium text-gray-600">
                    <li class="flex items-start gap-3 group">
                        <div class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center shrink-0 group-hover:border-[#c0863d] transition-colors">
                            <i class="fas fa-map-marker-alt text-[#c0863d] text-xs"></i>
                        </div>
                        <span class="leading-relaxed">
                            Parcos House, 123 Luxury Lane,<br>Mumbai, Maharashtra 400001
                        </span>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <div class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center shrink-0 group-hover:border-[#c0863d] transition-colors">
                            <i class="fas fa-phone-alt text-[#c0863d] text-xs"></i>
                        </div>
                        <span class="group-hover:text-[#c0863d] transition-colors">+91 93830 02793</span>
                    </li>
                    <li class="flex items-center gap-3 group">
                        <div class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center shrink-0 group-hover:border-[#c0863d] transition-colors">
                            <i class="fas fa-envelope text-[#c0863d] text-xs"></i>
                        </div>
                        <span class="group-hover:text-[#c0863d] transition-colors">support@parcos.com</span>
                    </li>
                </ul>
                
               
               
            </div>

        </div>

        <!-- Divider -->
        <div class="border-t border-[#c0863d]/10 mb-8"></div>

        <!-- Bottom Section -->
        <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-6">

            <!-- Copyright -->
            <p class="text-xs text-gray-500 font-medium tracking-wide">
                &copy; 2026 Parcos. All Rights Reserved.
            </p>

            <!-- Payment Icons -->
            <div class="flex items-center gap-4 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <i class="fab fa-cc-visa text-2xl text-[#1A1F71]"></i>
                <i class="fab fa-cc-mastercard text-2xl text-[#EB001B]"></i>
                <i class="fab fa-cc-amex text-2xl text-[#2E77BC]"></i>
                <i class="fas fa-credit-card text-2xl text-gray-600"></i>
            </div>

        </div>

    </div>
</footer>
<!-- ================= FOOTER END ================= -->