{{-- Hero Section --}}
<div id="hero" class="hero-section relative w-full h-[250px] sm:h-[400px] md:h-[550px] overflow-hidden">
    {{-- Slides --}}
    <div id="hero-slider" class="w-full h-full relative">
        <div class="hero-slide absolute inset-0 opacity-100 transition-opacity duration-700">
            <img src="{{ asset('assets/hero/banner-1.webp') }}" class="w-full h-full object-cover">
        </div>
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-700">
            <img src="{{ asset('assets/hero/banner-2.jpg') }}" class="w-full h-full object-cover">
        </div>
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-700">
            <img src="{{ asset('assets/hero/banner-3.jpg') }}" class="w-full h-full object-cover">
        </div>
       
    </div>

    {{-- Navigation --}}
    <button id="hero-prev" class="absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full py-2 px-3 md:py-3 md:px-5 hover:bg-opacity-70 z-20 text-sm md:text-base">❮</button>
    <button id="hero-next" class="absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white rounded-full py-2 px-3 md:py-3 md:px-5 hover:bg-opacity-70 z-20 text-sm md:text-base">❯</button>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('#hero-slider .hero-slide');
        let current = 0;
        const total = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
                if (i === index) slide.classList.add('opacity-100');
            });
        }

        // Next & Prev buttons
        document.getElementById('hero-next').addEventListener('click', () => {
            current = (current + 1) % total;
            showSlide(current);
        });

        document.getElementById('hero-prev').addEventListener('click', () => {
            current = (current - 1 + total) % total;
            showSlide(current);
        });

        // Auto-slide every 5 seconds
        setInterval(() => {
            current = (current + 1) % total;
            showSlide(current);
        }, 5000);
    });
</script>

