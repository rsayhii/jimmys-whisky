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
            width: 80px;
            height: 80px;
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
            width: 100px !important;
            height: 100px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        
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

<section class="testimonial-section">
    <div class="max-w-6xl mx-auto px-4 py-4 text-center">
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

<a href="https://wa.me/yournumber" target="_blank" class="fixed bottom-6 right-6 bg-[#25D366] p-3 rounded-full shadow-2xl hover:scale-110 transition-transform z-50">
    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.407 3.481 2.241 2.242 3.48 5.226 3.481 8.408-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.301 1.667zm6.29-4.171c1.589.943 3.143 1.439 4.883 1.44h.005c5.381 0 9.761-4.38 9.764-9.761a9.704 9.704 0 00-2.852-6.897 9.704 9.704 0 00-6.893-2.857c-5.383 0-9.764 4.381-9.766 9.762-.001 1.83.513 3.614 1.486 5.163l-1.001 3.65 3.738-.987zm11.389-4.631c-.305-.152-1.803-.889-2.083-.989-.28-.102-.485-.152-.689.152-.204.305-.789.989-.967 1.192-.178.203-.356.228-.661.076-.305-.152-1.288-.475-2.454-1.516-.906-.808-1.517-1.806-1.695-2.11-.178-.306-.019-.471.134-.622.137-.137.305-.355.457-.533.153-.178.204-.305.305-.508.102-.204.051-.381-.026-.533-.076-.152-.689-1.661-.944-2.272-.249-.595-.503-.514-.689-.524-.178-.01-.382-.012-.586-.012-.204 0-.535.076-.814.381-.28.305-1.068 1.042-1.068 2.541 0 1.499 1.092 2.946 1.244 3.15.153.204 2.15 3.282 5.208 4.604.727.314 1.294.502 1.736.642.73.232 1.393.199 1.918.121.585-.087 1.803-.737 2.058-1.448.254-.711.254-1.321.178-1.448-.076-.127-.28-.203-.585-.355z"/></svg>
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
        slidesPerView: 5, // Exact 5 images visible (Center + 2 each side)
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        spaceBetween: -10, // Adjusts overlap/gap
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