<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Stories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <style>
        /* Custom Styles */
        .testimonial-section {
            color: #f2f2f2;;
            
        }
        .testimonial-title {
            color: black;
            font-size: 30px;
            letter-spacing: 0.1em;
            margin-bottom: 0.75rem;
        }
        .testimonial-heading {
            color: #0A2540;
            font-size: 2.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        @media (min-width: 768px) {
            .testimonial-heading {
                font-size: 3rem;
            }
        }
        .testimonial-description {
            color: #6b7280;
            margin: 0 auto 2rem;
        }
        .video-testimonial-container {
            position: relative;
            width: 230px;
            height: 410px;
            margin: 0 auto;
            background: black;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        @media (min-width: 768px) {
            .video-testimonial-container {
                width: 260px;
                height: 460px;
            }
        }
        .testimonial-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .image{
            height: 22px;
            width: 40px;
        }
        .text-xs{
            color: black;
        }
        /* .text-sm{
            color: black;
        } */
        .client-name {
            font-weight: bold;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }
        .client-position {
            font-size: 0.875rem;
            color: #e5e7eb;
        }
        /* Owl Carousel Customizations */
        #testimonial-carousel .owl-stage {
            display: flex;
            align-items: center;
            padding: 1rem 0;
        }
        #testimonial-carousel .owl-item {
            display: flex;
            justify-content: center;
        }
        #testimonial-carousel .owl-nav {
            margin-top: 1.5rem;
            text-align: center;
        }
        #testimonial-carousel .owl-nav button {
            background: #D4AF37 !important;
            color: white !important;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 0.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem !important;
        }
        #testimonial-carousel .owl-nav button:hover {
            background: #b8941f !important;
        }
        #testimonial-carousel .owl-dots {
            text-align: center;
            margin-top: 1rem;
        }
        #testimonial-carousel .owl-dot span {
            width: 10px;
            height: 10px;
            margin: 5px 4px;
            background: #d1d5db !important;
            background-color: #d1d5db !important;
        }
        #testimonial-carousel .owl-dot.active span {
            background: #D4AF37 !important;
            background-color: #D4AF37 !important;
        }
    </style>
</head>
<body>
    <!-- Testimonial Section -->
    <section class="testimonial-section  " style="background-color: #FAF7F2 !important;">
        <div class="container py-12" style=" margin: 0 auto; ">
            <!-- Section Title -->
            <div class="text-center">
                <h1 class="testimonial-title">SHOPPABLE VIDEOS</h1>
            </div>

            <!-- Owl Carousel Container -->
            <div id="testimonial-carousel" class="owl-carousel owl-theme ">
                <!-- Video 1 -->
                <div class="item">
                    <div class="video-testimonial-container">
                        <video class="testimonial-video" muted playsinline loop>
                            <source src="https://in.ajmal.com/cdn/shop/files/quinn_uwbd725ggmdxwj6hjy3qchsg.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="mt-4 bg-white rounded-md border flex items-center justify-between w-[270px] p-2 gap-2">
                        <div class="image border rounded-md">
                            <img src="{{ asset('assets/video/products.jpeg') }}">
                        </div>
                        <div class="text flex-1">
                            <p class="text-xs font-semibold">
                                    Wisal Dhahab Eau de </p>
                                    <p class="text-xs font-semibold">Parfum Perfume 50ML For...
                                    </p>
                           <!-- <p class="text-sm font-bold mt-1">₹2,960</p> -->
                        </div>
                        <div class="border rounded-md p-2 cursor-pointer hover:bg-gray-100">
                           🛒
                        </div>
                    </div>
                </div>
               
                
                <!-- Video 2 -->
                <div class="item">
                    <div class="video-testimonial-container">
                        <video class="testimonial-video" muted playsinline loop>
                            <source src="https://in.ajmal.com/cdn/shop/files/quinn_srmcff0xcv6qav24j4sqcgtk.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="mt-4 bg-white rounded-md border flex items-center justify-between w-[270px] p-2 gap-2">
                        <div class="image border rounded-md">
                            <img src="{{ asset('assets/video/products.jpeg') }}">
                        </div>
                        <div class="text flex-1">
                            <p class="text-xs font-semibold">
                                    Wisal Dhahab Eau de </p>
                                    <p class="text-xs font-semibold">Parfum Perfume 50ML For...
                                    </p>
                           <!-- <p class="text-sm font-bold mt-1">₹2,960</p> -->
                        </div>
                        <div class="border rounded-md p-2 cursor-pointer hover:bg-gray-100">
                           🛒
                        </div>
                    </div>

                </div>

                <!-- Video 3 -->
                <div class="item">
                    <div class="video-testimonial-container">
                        <video class="testimonial-video" muted playsinline loop>
                            <source src="https://in.ajmal.com/cdn/shop/files/quinn_dzxox805byor6yjc7e0egaz8.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="mt-4 bg-white rounded-md border flex items-center justify-between w-[270px] p-2 gap-2">
                        <div class="image border rounded-md">
                            <img src="{{ asset('assets/video/products.jpeg') }}">
                        </div>
                        <div class="text flex-1">
                            <p class="text-xs font-semibold">
                                    Wisal Dhahab Eau de </p>
                                    <p class="text-xs font-semibold">Parfum Perfume 50ML For...
                                    </p>
                           <!-- <p class="text-sm font-bold mt-1">₹2,960</p> -->
                        </div>
                        <div class="border rounded-md p-2 cursor-pointer hover:bg-gray-100">
                           🛒
                        </div>
                    </div>

                </div>

                <!-- Video 4 -->
                <div class="item">
                    <div class="video-testimonial-container">
                        <video class="testimonial-video" muted playsinline loop>
                            <source src="https://in.ajmal.com/cdn/shop/files/quinn_ldifxjqbskqcx44e4ytubt08.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                    </div>
                    <div class="mt-4 bg-white rounded-md border flex items-center justify-between w-[270px] p-2 gap-2">
                        <div class="image border rounded-md">
                            <img src="{{ asset('assets/video/products.jpeg') }}">
                        </div>
                        <div class="text flex-1">
                            <p class="text-xs font-semibold">
                                    Wisal Dhahab Eau de </p>
                                    <p class="text-xs font-semibold">Parfum Perfume 50ML For...
                                    </p>
                           <!-- <p class="text-sm font-bold mt-1">₹2,960</p> -->
                        </div>
                        <div class="border rounded-md p-2 cursor-pointer hover:bg-gray-100">
                           🛒
                        </div>
                    </div>

                </div>

                <!-- Video 5 -->
                <div class="item">
                    <div class="video-testimonial-container">
                        <video class="testimonial-video" muted playsinline loop>
                            <source src="https://in.ajmal.com/cdn/shop/files/quinn_kovobgcjzpail5iasw28o0as.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                    </div>
                    <div class="mt-4 bg-white rounded-md border flex items-center justify-between w-[270px] p-2 gap-2">
                        <div class="image border rounded-md">
                            <img src="{{ asset('assets/video/products.jpeg') }}">
                        </div>
                        <div class="text flex-1">
                            <p class="text-xs font-semibold">
                                    Wisal Dhahab Eau de </p>
                                    <p class="text-xs font-semibold">Parfum Perfume 50ML For...
                                    </p>
                           <!-- <p class="text-sm font-bold mt-1">₹2,960</p> -->
                        </div>
                        <div class="border rounded-md p-2 cursor-pointer hover:bg-gray-100">
                           🛒
                        </div>
                    </div>

                </div>          
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            // Initialize Owl Carousel
            $("#testimonial-carousel").owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 50
                    },
                    640: {
                        items: 2,
                        stagePadding: 50
                    },
                    1024: {
                        items: 5,
                        stagePadding: 50
                    }
                },
                onInitialized: function () {
                    // Play the first video when carousel initializes
                    playActiveVideo();
                },
                onTranslate: function () {
                    // Pause all videos when carousel starts moving
                    pauseAllVideos();
                },
                onTranslated: function () {
                    // Play the active video after carousel finishes moving
                    playActiveVideo();
                }
            });

            // Function to play the active video
            function playActiveVideo() {
                var activeItem = $(".owl-item.active.center .testimonial-video");
                if (activeItem.length) {
                    activeItem[0].play();
                } else {
                    // Fallback if center class is not available
                    var activeIndex = $("#testimonial-carousel").find(".owl-item.active").index();
                    $("#testimonial-carousel").find(".testimonial-video").eq(activeIndex)[0].play();
                }
            }

            // Function to pause all videos
            function pauseAllVideos() {
                $("#testimonial-carousel .testimonial-video").each(function () {
                    this.pause();
                });
            }

            // Pause video when hovering over it
            $(".testimonial-video").hover(
                function () {
                    this.pause();
                },
                function () {
                    // Only play if this is the active video
                    if ($(this).closest(".owl-item").hasClass("active")) {
                        this.play();
                    }
                }
            );
        });
    </script>
</body>
</html>