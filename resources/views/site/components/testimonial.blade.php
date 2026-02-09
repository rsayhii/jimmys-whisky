<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BellaVita Style Testimonial Slider</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <style>
        .testimonial-section {
           
            background-color: #fff;
        }

        /* Swiper Container Adjustments */
        .mySwiper {
            padding: 40px 0 !important;
            max-width: 900px;
            margin: 0 auto;
        }

        /* Side Images (Inactive) */
        .swiper-slide img {
            transition: all 0.5s ease;
            width: 60px;
            height: 60px;
            border-radius: 24px; /* Rounded corners like screenshot */
            object-fit: cover;
            opacity: 0.3;
            filter: grayscale(100%);
            cursor: pointer;
            margin: 0 auto;
        }

        /* Center Image (Active) */
        .swiper-slide-active img {
            transform: scale(1.6); /* Badi image */
            opacity: 1 !important;
            filter: grayscale(0%) !important;
            width: 80px !important;
            height: 80px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        
        }

        @media (min-width: 768px) {
            .swiper-slide img {
                width: 80px;
                height: 80px;
            }
            .swiper-slide-active img {
                width: 100px !important;
                height: 100px !important;
            }
        }

        /* Navigation Arrows Styling */
        .swiper-button-next, .swiper-button-prev {
            color: #d1d5db !important; /* Light Gray Arrows */
            transition: color 0.3s ease;
        }

        .swiper-button-next:hover, .swiper-button-prev:hover {
            color: #374151 !important; /* Dark Gray on Hover */
        }

        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 20px !important;
            font-weight: bold;
        }

        /* Content Fade Animation */
        #testimonial-box {
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
    </style>
</head>
<body>

<section class="testimonial-section pb-12">
    <div class="max-w-6xl mx-auto px-4 py-12 text-center">
        <h2 class="text-xl md:text-2xl font-light tracking-[0.25em] text-gray-800 uppercase mb-4">
            WHAT OUR CUSTOMERS HAVE TO SAY
        </h2>

        <div class="relative px-6 md:px-12">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper items-center">
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-3.webp?v=1725617640"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-4.webp?v=1725617641"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-1.webp?v=1725617641"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-2.webp?v=1725617641"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-5.webp?v=1725617641"></div>
                    <!-- Duplicate slides for smooth loop -->
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-3.webp?v=1725617640"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-4.webp?v=1725617641"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-1.webp?v=1725617641"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-2.webp?v=1725617641"></div>
                    <div class="swiper-slide"><img src="https://bellavitaorganic.com/cdn/shop/files/t-5.webp?v=1725617641"></div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <div id="testimonial-box" class="mt-8 opacity-100">
            <div class="flex justify-center gap-1 text-yellow-400 text-2xl mb-4">
                ★★★★★
            </div>
            
            <p id="t-quote" class="text-gray-700 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-6 font-normal">
                "One of the best luxury perfumes and that too at an affordable price"
            </p>

            <div class="space-y-1">
                <h4 id="t-name" class="text-gray-600 font-medium text-lg italic">— Simran Narang</h4>
                <div class="flex items-center justify-center gap-2 text-gray-400">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    <span id="t-handle" class="text-sm font-medium">simrannaranggg</span>
                </div>
            </div>
        </div>
    </div>
</section>

<a href="https://wa.me/919383002793" target="_blank" class="fixed bottom-6 right-6 bg-[#25D366] p-3 rounded-full shadow-2xl hover:scale-110 transition-transform z-50" aria-label="Chat on WhatsApp">
    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
    </svg>
</a>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Testimonial Data Array
    const reviews = [
        { quote: "Absolutely stunning fragrances! The variety is just mind-blowing.", name: "Ananya Kapoor", handle: "ananya_looks" },
        { quote: "I gifted this to my husband and he's a fan now. Truly long lasting.", name: "Priya V.", handle: "priyavlogs" },
        { quote: "One of the best luxury perfumes and that too at an affordable price", name: "Simran Narang", handle: "simrannaranggg" },
        { quote: "Honey Oud is literally the best scent I've ever owned. 10/10.", name: "Rahul Singh", handle: "rahul_vibe" },
        { quote: "BELLAVITA has changed the perfume game in India. Very impressed.", name: "Vikram Malhotra", handle: "vikram_m" },
        { quote: "Premium quality packaging and even better scents inside.", name: "Ishani S.", handle: "ishani_styles" },
        { quote: "The delivery was super fast and the perfumes smell like heaven.", name: "Karan P.", handle: "karan_p" }
    ];

    // Initialize Swiper
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 10,
        breakpoints: {
            640: {
                slidesPerView: 5,
                spaceBetween: -10,
            }
        },
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        slideToClickedSlide: true, // Click image to center it
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        on: {
            slideChange: function () {
                const index = this.realIndex;
                updateTestimonial(index);
            },
        },
    });

    function updateTestimonial(index) {
        const box = document.getElementById('testimonial-box');
        if (!box) return;

        // Handle loop index (we have 5 unique testimonials duplicated)
        const dataIndex = index % 5;

        // Fade out
        box.style.opacity = '0';
        box.style.transform = 'translateY(10px)';

        setTimeout(() => {
            // Update Data
            document.getElementById('t-quote').innerText = `"${reviews[dataIndex].quote}"`;
            document.getElementById('t-name').innerText = "— " + reviews[dataIndex].name;
            document.getElementById('t-handle').innerText = reviews[dataIndex].handle;

            // Fade in
            box.style.opacity = '1';
            box.style.transform = 'translateY(0px)';
        }, 300);
    }

    // Initialize first content
    updateTestimonial(swiper.realIndex);
</script>

</body>
</html>