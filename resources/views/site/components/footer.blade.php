<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcos Footer</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-50">

<!-- ================= FOOTER START ================= -->
<footer class="bg-[#FAF7F2] border-t border-gray-200 ">
    <div class="max-w-7xl mx-auto px-6 py-12">

        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-10">

            <!-- LOGO -->
            <div class="flex flex-col space-y-4">
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
              <p class="text-sm text-gray-600 leading-relaxed">
                  Discover the essence of luxury with our premium collection of fragrances and beauty products.
              </p>
            </div>
           
            <!-- SHOP -->
            <div>
                <h4 class="text-xl font-bold tracking-wide uppercase text-black mb-4">
                    Shop
                </h4>
                <ul class="space-y-2 text-md text-black">
                    <li><a href="#">Fragrance</a></li>
                    <li><a href="#">Makeup</a></li>
                    <li><a href="#">Skin</a></li>
                    <li><a href="#">Hair</a></li>
                    <li><a href="#">Brands</a></li>
                    <li><a href="#">Gifting</a></li>
                </ul>
            </div>

            <!-- All Pages -->
            <div>
                <h4 class="text-xl font-bold tracking-wide uppercase text-black mb-4">
                    Pages
                </h4>
                <ul class="space-y-2 text-md text-black">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">My Orders</a></li>
                    <li><a href="#">Membership</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <!-- POLICY -->
            <div>
                <h4 class="text-xl font-bold tracking-wide uppercase text-black mb-4">
                    Policy
                </h4>
                <ul class="space-y-2 text-md text-black">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Return Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cancellation Policy</a></li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="md:col-span-1">
                <h4 class="text-xl font-bold tracking-wide uppercase text-black mb-4">
                    Contact Us
                </h4>

                <ul class="space-y-4 text-md text-gray-700">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt mt-1 text-[#c0863d]"></i>
                        <span>
                            Parcos House, <br>
                            123 Luxury Lane, Mumbai, <br>
                            Maharashtra 400001, India
                        </span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone-alt text-[#c0863d]"></i>
                        <span>+91 93830 02793</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-[#c0863d]"></i>
                        <span>support@parcos.com</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Divider -->
        <div class="border-t border-gray-200 my-10"></div>

        <!-- Bottom Section -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">

            <!-- Social Icons -->
            <div class="flex gap-5 text-black-600 text-lg">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>

            <!-- Copyright -->
            <p class="text-md text-black text-center">
                Copyright © Jimmy's Whiskey 2026. All Rights Reserved
            </p>

            <!-- Payment Icons -->
            <div class="flex gap-3 text-gray-500 text-sm">
                <span>VISA</span>
                <span>MASTER</span>
                <span>AMEX</span>
                <span>RUPAY</span>
            </div>

        </div>

    </div>
</footer>
<!-- ================= FOOTER END ================= -->

</body>
</html>
