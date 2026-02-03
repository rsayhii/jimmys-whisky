<div class="perfume-scroll-experience">
    <!-- Spacer Before -->
    <div class="scroll-spacer flex items-center justify-center bg-black text-white">
        <div class="text-center">
            <h2 class="text-4xl font-light tracking-widest mb-4">THE NEW ERA</h2>
            <p class="text-gray-400 text-sm tracking-wide">SCROLL TO EXPLORE</p>
            <div class="mt-8 animate-bounce">
                <svg class="w-6 h-6 mx-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Pinned Canvas Section -->
    <div id="sequence-section" class="relative w-full h-screen overflow-hidden bg-black">
        <canvas id="scroll-canvas" class="absolute top-0 left-0 w-full h-full object-cover"></canvas>
        
        <!-- Loading Indicator -->
        <div id="sequence-loader" class="absolute inset-0 flex flex-col items-center justify-center z-20 bg-black transition-opacity duration-500">
            <div class="w-12 h-12 border-4 border-[#c0863d] border-t-transparent rounded-full animate-spin mb-4"></div>
            <div id="loading-text" class="text-[#c0863d] text-sm tracking-widest font-light">LOADING ASSETS... 0%</div>
        </div>
        
        <!-- Overlay Text -->
        <!-- <div class="absolute inset-0 flex items-center justify-center pointer-events-none z-10">
            <h1 class="text-white text-6xl md:text-9xl font-bold tracking-tighter opacity-0 mix-blend-overlay" id="sequence-title">
                DIOR HOMME
            </h1>
        </div> -->
    </div>

    <!-- Spacer After -->
    <div class="scroll-spacer flex items-center justify-center bg-black text-white">
        <div class="text-center">
            <h2 class="text-4xl font-light tracking-widest mb-4">REDEFINING MASCULINITY</h2>
            <button class="mt-8 px-8 py-3 border border-white text-white hover:bg-white hover:text-black transition-colors duration-300 tracking-widest text-sm">
                DISCOVER MORE
            </button>
        </div>
    </div>
</div>

<style>
    .scroll-spacer {
        height: 100vh;
        width: 100%;
    }
</style>

<!-- GSAP & ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);

        const canvas = document.querySelector("#scroll-canvas");
        const context = canvas.getContext("2d");
        const section = document.querySelector("#sequence-section");
        const title = document.querySelector("#sequence-title");
        const loader = document.querySelector("#sequence-loader");
        const loadingText = document.querySelector("#loading-text");

        // Configuration
        const frameCount1 = 300; // Frames in first folder
        const frameCount2 = 300; // Frames in second folder
        const totalFrames = frameCount1 + frameCount2;
        
        // Image Caching
        const images = [];
        const imageState = { frame: 1 };

        // Helper to generate image URLs
        const getImageUrl = (index) => {
            // Pad index with zeros (e.g. 1 -> "001", 50 -> "050")
            const pad = (num) => String(num).padStart(3, '0');
            
            if (index <= frameCount1) {
                // First sequence: 1 to 300 -> ezgif/ezgif-frame-001.jpg
                return `{{ asset('assets/ezgif/ezgif-frame-') }}${pad(index)}.jpg`;
            } else {
                // Second sequence: 301 to 600 -> ezgif2/ezgif-frame-001.jpg
                // Logic: index 301 becomes 1, 302 becomes 2, etc.
                const adjustedIndex = index - frameCount1;
                return `{{ asset('assets/ezgif2/ezgif-frame-') }}${pad(adjustedIndex)}.jpg`;
            }
        };

        // Resize canvas to fill window
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            render(); // Re-render current frame on resize
        }
        window.addEventListener("resize", resizeCanvas);
        resizeCanvas();

        // Render function: Draw the current frame to canvas
        function render() {
            // Round to nearest integer to get valid frame index
            const index = Math.round(imageState.frame);
            const img = images[index]; // Note: images array is 1-based indexed logic below might need adjustment
            
            if (img && img.complete) {
                // Calculate "cover" dimensions (like object-fit: cover)
                const hRatio = canvas.width / img.width;
                const vRatio = canvas.height / img.height;
                const ratio = Math.max(hRatio, vRatio);
                
                const centerShift_x = (canvas.width - img.width * ratio) / 2;
                const centerShift_y = (canvas.height - img.height * ratio) / 2;
                
                context.clearRect(0, 0, canvas.width, canvas.height);
                context.drawImage(
                    img, 
                    0, 0, img.width, img.height,
                    centerShift_x, centerShift_y, img.width * ratio, img.height * ratio
                );
            }
        }

        // Preload Images
        function preloadImages() {
            let loadedCount = 0;
            
            // We'll load images in batches to prevent freezing the browser
            // But for simplicity in this version, we start loading all. 
            // A better production approach uses a "priority" queue.
            
            for (let i = 1; i <= totalFrames; i++) {
                const img = new Image();
                img.src = getImageUrl(i);
                images[i] = img; // Store at index i (1-based for convenience)
                
                img.onload = () => {
                    loadedCount++;
                    
                    // Update loading text
                    const percent = Math.round((loadedCount / totalFrames) * 100);
                    if (loadingText) loadingText.textContent = `LOADING ASSETS... ${percent}%`;

                    // Initial render when first image is ready
                    if (i === 1) render();

                    // Hide loader when enough images are ready (e.g. 20%)
                    // This allows the user to start scrolling while the rest load
                    if (loadedCount === Math.round(totalFrames * 0.2)) {
                        gsap.to(loader, { opacity: 0, duration: 0.5, onComplete: () => loader.style.display = "none" });
                        initScroll();
                    }
                };
            }
        }

        // Initialize ScrollTrigger
        function initScroll() {
            // Main Timeline
            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: section,
                    start: "top top",
                    end: "+=2000%", // Long scroll for 600 frames
                    pin: true,
                    scrub: 0.5,    // Fast response but smooth
                    // markers: true,
                    onEnter: () => hideHeader(),
                    onLeave: () => showHeader(),
                    onEnterBack: () => hideHeader(),
                    onLeaveBack: () => showHeader()
                }
            });

            // Animate the frame index
            tl.to(imageState, {
                frame: totalFrames,
                snap: "frame", // Snap to integer values
                ease: "none",
                onUpdate: render // Draw on every update
            });

            // Title Animation
            gsap.fromTo(title, 
                { opacity: 0, y: 50 },
                { 
                    opacity: 1, 
                    y: 0, 
                    scrollTrigger: {
                        trigger: section,
                        start: "top top",
                        end: "+=300%",
                        scrub: true
                    }
                }
            );
        }

        // Header Control Functions
        function hideHeader() {
            gsap.to("header, .header, #header, nav", { 
                y: -100, 
                opacity: 0, 
                duration: 0.8, 
                ease: "power2.inOut" 
            });
        }

        function showHeader() {
            gsap.to("header, .header, #header, nav", { 
                y: 0, 
                opacity: 1, 
                duration: 0.8, 
                ease: "power2.inOut" 
            });
        }

        // Start
        preloadImages();
    });
</script>
