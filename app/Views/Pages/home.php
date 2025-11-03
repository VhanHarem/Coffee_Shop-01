<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Coffee Shop</title>

    <!-- Tailwind (dev CDN) + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous"/>

    <!-- Project styles (optional override) -->
    <link rel="stylesheet" href="<?= base_url('src/tailwindstyles.css') ?>">

    <style>
      /* Mobile menu animation */
.mobile-menu-enter {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease-out;
}

.mobile-menu-enter.show {
    max-height: 400px; /* Adjust based on your menu height */
}

/* Hamburger icon animation */
.hamburger-icon {
    position: relative;
    width: 24px;
    height: 20px;
    transition: transform 0.3s ease;
}

.hamburger-icon span {
    position: absolute;
    width: 100%;
    height: 2px;
    background-color: white;
    transition: all 0.3s ease;
    left: 0;
}

.hamburger-icon span:nth-child(1) { top: 0; }
.hamburger-icon span:nth-child(2) { top: 9px; }
.hamburger-icon span:nth-child(3) { top: 18px; }

/* Animated X state */
.hamburger-icon.active span:nth-child(1) {
    transform: translateY(9px) rotate(45deg);
}
.hamburger-icon.active span:nth-child(2) {
    opacity: 0;
}
.hamburger-icon.active span:nth-child(3) {
    transform: translateY(-9px) rotate(-45deg);
}
      body { font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
        /* Carousel core styles */
        .carousel-container { position: relative; height: 600px; }
        .carousel-slide {
            position: absolute; inset: 0; width: 100%;
            opacity: 0; pointer-events: none;
            transition: opacity .6s ease;
            display: grid; grid-template-columns: 1fr;
        }
        .carousel-slide.active { opacity: 1; pointer-events: auto; }
        .carousel-image { width: 100%; height: 100%; object-fit: cover; }
        .carousel-indicators button.active { background-color: #ea580c; }
    </style>
</head>
<body class="bg-amber-50">

    <!-- ===== Header / Navbar ===== -->
    <header class="bg-orange-600 fixed w-full top-0 z-50">
        <nav class="container mx-auto px-2 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="/Coffee_Shop-01/assets/images/logo.png" alt="Coffee Haven logo" class="h-10">
                    <span class="text-white text-xl font-bold ml-3">Coffee Haven</span>
                </div>

                <!-- Desktop nav links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= site_url('home') ?>" class="text-white hover:text-orange-200">Home</a>
                    <a href="<?= site_url('menu') ?>" class="text-white hover:text-orange-200">Menu</a>
                    <a href="<?= site_url('orders') ?>" class="text-white hover:text-orange-200">Orders</a>
                    <a href="<?= site_url('stamps') ?>" class="text-white hover:text-orange-200">Stamps</a>
                    <a href="<?= site_url('contact') ?>" class="text-white hover:text-orange-200">Contact</a>
                    <a href="<?= site_url('login') ?>" class="bg-white text-orange-600 px-4 py-2 rounded-full hover:bg-orange-100">Login</a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden text-white" aria-label="Toggle menu">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile menu (hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden mt-2">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="<?= site_url('home') ?>" class="block text-white py-2">Home</a>
                    <a href="<?= site_url('menu') ?>" class="block text-white py-2">Menu</a>
                    <a href="<?= site_url('orders') ?>" class="block text-white py-2">Orders</a>
                    <a href="<?= site_url('stamps') ?>" class="block text-white py-2">Stamps</a>
                    <a href="<?= site_url('contact') ?>" class="block text-white py-2">Contact</a>
                    <a href="<?= site_url('login') ?>" class="block text-white py-2">Login</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Spacer to avoid header overlap -->
    <div class="h-16 md:h-20"></div>

    <!-- ===== Carousel Section =====
         Layout: left = description + CTA + inline nav controls
                 right = photo
         Slides are absolutely stacked; JS toggles .active
    -->
    <main class="container mx-auto px-4">
        <section class="mt-6">
            <div class="carousel-container mx-auto overflow-hidden rounded-lg shadow-lg bg-orange-50">

                <!-- Slide 0: Classic Espresso -->
                <article class="carousel-slide active">
                    <div class="p-8 md:p-12 md:grid md:grid-cols-2 md:gap-6 items-center">
                        <!-- Left: description / CTA / controls -->
                        <div class="order-1 md:order-1">
                            <!-- description block -->
                            <h2 class="text-3xl md:text-4xl font-bold text-orange-800 mb-4">Classic Espresso</h2>
                            <p class="text-lg text-gray-700 mb-4">Rich and smooth single-origin espresso with perfect crema.</p>

                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-start gap-3"><i class="fas fa-check text-orange-600 mt-1"></i><span>Carefully selected Arabica beans</span></li>
                                <li class="flex items-start gap-3"><i class="fas fa-thermometer-half text-orange-600 mt-1"></i><span>Extracted at ideal temperature for balance</span></li>
                                <li class="flex items-start gap-3"><i class="fas fa-mug-hot text-orange-600 mt-1"></i><span>Notes of chocolate and caramel</span></li>
                            </ul>

                            <!-- CTA + inline nav controls (beside CTA on all screen sizes) -->
                            <div class="flex items-center gap-3">
                                <!-- added data-product and class 'order-now' -->
                                <button class="order-now bg-orange-600 text-white px-5 py-3 rounded-full hover:bg-orange-700 transition" data-product="Classic Espresso">Order Now</button>

                                <!-- Inline nav controls -->
                                <div class="flex items-center gap-2">
                                    <button class="carousel-prev bg-orange-600/90 text-white p-3 rounded-full hover:bg-orange-700 transition" aria-label="Previous slide" data-slide="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="carousel-next bg-orange-600/90 text-white p-3 rounded-full hover:bg-orange-700 transition" aria-label="Next slide" data-slide="1">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Right: image -->
                        <div class="order-2 md:order-2 mt-6 md:mt-0 h-64 md:h-96">
                            <img src="/Coffee_Shop-01/assets/images/randy.png" alt="Classic Espresso" class="carousel-image rounded-r-lg">
                        </div>
                    </div>
                </article>

                <!-- Slide 1: Caramel Latte -->
                <article class="carousel-slide">
                    <div class="p-8 md:p-12 md:grid md:grid-cols-2 md:gap-6 items-center">
                        <div class="order-1 md:order-1">
                            <h2 class="text-3xl md:text-4xl font-bold text-orange-800 mb-4">Caramel Latte</h2>
                            <p class="text-lg text-gray-700 mb-4">Creamy steamed milk and espresso with sweet caramel drizzle.</p>

                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-start gap-3"><i class="fas fa-layer-group text-orange-600 mt-1"></i><span>Balanced layers of espresso and milk</span></li>
                                <li class="flex items-start gap-3"><i class="fas fa-fire text-orange-600 mt-1"></i><span>Made with house-made caramel sauce</span></li>
                                <li class="flex items-start gap-3"><i class="fas fa-cup-straw text-orange-600 mt-1"></i><span>Silky microfoam for smooth texture</span></li>
                            </ul>

                            <div class="flex items-center gap-3">
                                <!-- added data-product and class 'order-now' -->
                                <button class="order-now bg-orange-600 text-white px-5 py-3 rounded-full hover:bg-orange-700 transition" data-product="Caramel Latte">Order Now</button>

                                <div class="flex items-center gap-2">
                                    <button class="carousel-prev bg-orange-600/90 text-white p-3 rounded-full hover:bg-orange-700 transition" aria-label="Previous slide" data-slide="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="carousel-next bg-orange-600/90 text-white p-3 rounded-full hover:bg-orange-700 transition" aria-label="Next slide" data-slide="1">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="order-2 md:order-2 mt-6 md:mt-0 h-64 md:h-96">
                            <img src="/Coffee_Shop-01/assets/images/car.png" alt="Caramel Latte" alt="Caramel Latte" class="carousel-image rounded-r-lg">
                        </div>
                    </div>
                </article>

                <!-- Slide 2: Classic Cappuccino -->
                <article class="carousel-slide">
                    <div class="p-8 md:p-12 md:grid md:grid-cols-2 md:gap-6 items-center">
                        <div class="order-1 md:order-1">
                            <h2 class="text-3xl md:text-4xl font-bold text-orange-800 mb-4">Classic Cappuccino</h2>
                            <p class="text-lg text-gray-700 mb-4">Perfect balance of espresso, steamed milk, and foam.</p>

                            <ul class="space-y-2 text-gray-600 mb-6">
                                <li class="flex items-start gap-3"><i class="fas fa-balance-scale text-orange-600 mt-1"></i><span>Traditional 1:1:1 ratio</span></li>
                                <li class="flex items-start gap-3"><i class="fas fa-heart text-orange-600 mt-1"></i><span>Topped with latte art</span></li>
                                <li class="flex items-start gap-3"><i class="fas fa-award text-orange-600 mt-1"></i><span>Barista signature preparation</span></li>
                            </ul>

                            <div class="flex items-center gap-3">
                                <!-- added data-product and class 'order-now' -->
                                <button class="order-now bg-orange-600 text-white px-5 py-3 rounded-full hover:bg-orange-700 transition" data-product="Classic Cappuccino">Order Now</button>

                                <div class="flex items-center gap-2">
                                    <button class="carousel-prev bg-orange-600/90 text-white p-3 rounded-full hover:bg-orange-700 transition" aria-label="Previous slide" data-slide="-1">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="carousel-next bg-orange-600/90 text-white p-3 rounded-full hover:bg-orange-700 transition" aria-label="Next slide" data-slide="1">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="order-2 md:order-2 mt-6 md:mt-0 h-64 md:h-96">
                            <img src="/Coffee_Shop-01/assets\images\luh.png" alt="Classic Cappuccino" class="carousel-image rounded-r-lg">
                        </div>
                    </div>
                </article>

                <!-- Indicators (bottom center) -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-3 z-20">
                    <button class="w-4 h-4 rounded-full bg-orange-200 carousel-indicators" aria-label="Slide 1"></button>
                    <button class="w-4 h-4 rounded-full bg-orange-200 carousel-indicators" aria-label="Slide 2"></button>
                    <button class="w-4 h-4 rounded-full bg-orange-200 carousel-indicators" aria-label="Slide 3"></button>
                </div>

            </div>
        </section>
    </main>

    <!-- ===== Scripts ===== -->
    <script>
        // Wait for DOM
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile menu toggle
            const menuBtn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            if (menuBtn && menu) {
                menuBtn.addEventListener('click', () => menu.classList.toggle('hidden'));
            }

            // Carousel elements
            const slides = Array.from(document.querySelectorAll('.carousel-slide'));
            const indicators = Array.from(document.querySelectorAll('.carousel-indicators'));
            const prevButtons = Array.from(document.querySelectorAll('.carousel-prev'));
            const nextButtons = Array.from(document.querySelectorAll('.carousel-next'));
            let current = 0;
            let autoTimer = null;
            const AUTO_MS = 4000;

            // --- helper: show slide by index ---
            function showSlide(index) {
                index = (index + slides.length) % slides.length;
                slides.forEach((s, i) => s.classList.toggle('active', i === index));
                indicators.forEach((ind, i) => ind.classList.toggle('active', i === index));
                current = index;
            }

            // --- navigation handlers ---
            function move(direction) { showSlide(current + direction); resetAuto(); }

            prevButtons.forEach(btn => btn.addEventListener('click', () => move(-1)));
            nextButtons.forEach(btn => btn.addEventListener('click', () => move(1)));

            // indicators click
            indicators.forEach((ind, i) => ind.addEventListener('click', () => { showSlide(i); resetAuto(); }));

            // Auto-advance
            function startAuto() {
                stopAuto();
                autoTimer = setInterval(() => move(1), AUTO_MS);
            }
            function stopAuto() { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }
            function resetAuto() { stopAuto(); startAuto(); }

            // Initialize
            showSlide(0);
            startAuto();

            // Pause on hover (optional)
            const container = document.querySelector('.carousel-container');
            if (container) {
                container.addEventListener('mouseenter', stopAuto);
                container.addEventListener('mouseleave', startAuto);
            }

            // -----------------------------
            // Order button behavior
            // - If user has account (logged in) -> go to orders page (include product)
            // - If not -> go to login page and include redirect back to order
            // -----------------------------
            // PHP outputs a JS boolean for login state
            const isLoggedIn = <?= json_encode((bool) (session() ? session()->has('user_id') : false)) ?>;
            const ordersUrlBase = '<?= site_url('orders') ?>';
            const loginUrl = '<?= site_url('login') ?>';

            // Attach click handlers to all order buttons
            document.querySelectorAll('.order-now').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const product = btn.dataset.product || '';
                    const orderUrl = ordersUrlBase + (product ? ('?product=' + encodeURIComponent(product)) : '');
                    if (isLoggedIn) {
                        // If already logged in go directly to orders page
                        window.location.href = orderUrl;
                    } else {
                        // Not logged in: redirect to login and pass return URL
                        const redirectTo = orderUrl;
                        window.location.href = loginUrl + '?redirect=' + encodeURIComponent(redirectTo);
                    }
                });
            });

        });
    </script>
</body>
</html>