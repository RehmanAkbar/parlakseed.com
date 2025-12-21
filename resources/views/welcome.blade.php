<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ParlakSeed - Premium Organic Seeds for a Greener Tomorrow</title>
    <link rel="icon" href="/favicon.ico" sizes="any">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500&family=Source+Sans+3:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <div class="brand-icon">
                    <i class="bi bi-flower2"></i>
                </div>
                <span class="brand-text">ParlakSeed</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="nav-icon"><i class="bi bi-search"></i></a>
                    <a href="#" class="nav-icon position-relative">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-badge">3</span>
                    </a>
                    <a href="/products" class="btn btn-primary-custom">Shop Now</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <span class="hero-badge">
                        <i class="bi bi-patch-check-fill me-2"></i>
                        100% Organic & Non-GMO
                    </span>
                    <h1 class="hero-title">
                        Cultivate Your <span class="text-gradient">Dream Garden</span> With Premium Seeds
                    </h1>
                    <p class="hero-description">
                        Discover our curated collection of heirloom and organic seeds. From vibrant vegetables to stunning flowers, we provide everything you need to grow nature's finest.
                    </p>
                    <div class="hero-buttons">
                        <a href="/products" class="btn btn-primary-custom btn-lg">
                            <i class="bi bi-basket me-2"></i>
                            Explore Collection
                        </a>
                        <a href="#about" class="btn btn-outline-custom btn-lg">
                            <i class="bi bi-play-circle me-2"></i>
                            Our Story
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Seed Varieties</span>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <span class="stat-number">50K+</span>
                            <span class="stat-label">Happy Gardeners</span>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Germination Rate</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="hero-visual">
                        <div class="hero-image-wrapper">
                            <div class="floating-card card-1" data-aos="zoom-in" data-aos-delay="600">
                                <i class="bi bi-shield-check"></i>
                                <span>Certified Organic</span>
                            </div>
                            <div class="floating-card card-2" data-aos="zoom-in" data-aos-delay="800">
                                <i class="bi bi-truck"></i>
                                <span>Free Shipping</span>
                            </div>
                            <div class="floating-card card-3" data-aos="zoom-in" data-aos-delay="1000">
                                <i class="bi bi-award"></i>
                                <span>Premium Quality</span>
                            </div>
                            <div class="hero-circle-main">
                                <svg viewBox="0 0 200 200" class="plant-svg">
                                    <defs>
                                        <linearGradient id="leafGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#4a7c59"/>
                                            <stop offset="100%" style="stop-color:#2d5a3d"/>
                                        </linearGradient>
                                    </defs>
                                    <path d="M100 180 L100 90" stroke="#3d6b4a" stroke-width="6" stroke-linecap="round"/>
                                    <ellipse cx="100" cy="185" rx="25" ry="10" fill="#8b6f47"/>
                                    <path d="M100 130 Q55 100 50 50 Q90 70 100 130" fill="url(#leafGradient)" class="leaf leaf-1"/>
                                    <path d="M100 110 Q145 80 150 30 Q110 50 100 110" fill="url(#leafGradient)" class="leaf leaf-2"/>
                                    <path d="M100 90 Q65 50 75 10 Q100 40 100 90" fill="url(#leafGradient)" class="leaf leaf-3"/>
                                </svg>
                            </div>
                            <div class="hero-circle-accent"></div>
                            <div class="hero-circle-small"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <a href="#features">
                <i class="bi bi-chevron-double-down"></i>
            </a>
        </div>
    </section>

    <!-- Trusted By Section -->
    <section class="trusted-section py-5">
        <div class="container">
            <div class="text-center mb-4">
                <span class="text-muted small text-uppercase tracking-wide">Trusted by leading gardening communities</span>
            </div>
            <div class="row justify-content-center align-items-center g-4 g-lg-5">
                <div class="col-6 col-md-4 col-lg-2 text-center">
                    <div class="partner-logo">
                        <i class="bi bi-flower1"></i>
                        <span>GardenPro</span>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center">
                    <div class="partner-logo">
                        <i class="bi bi-tree"></i>
                        <span>EcoFarms</span>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center">
                    <div class="partner-logo">
                        <i class="bi bi-sun"></i>
                        <span>SunGrow</span>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center">
                    <div class="partner-logo">
                        <i class="bi bi-droplet"></i>
                        <span>AquaGreen</span>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 text-center">
                    <div class="partner-logo">
                        <i class="bi bi-flower3"></i>
                        <span>BloomBox</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-6" id="features">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center" data-aos="fade-up">
                    <span class="section-badge">Why Choose Us</span>
                    <h2 class="section-title">Seeds That Make a <span class="text-gradient">Difference</span></h2>
                    <p class="section-description">
                        We're committed to providing the highest quality organic seeds for gardeners who care about nature and sustainability.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3>100% Organic</h3>
                        <p>All our seeds are certified organic, non-GMO, and harvested from sustainable farms worldwide.</p>
                        <a href="#" class="feature-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon icon-green">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                        <h3>98% Germination</h3>
                        <p>Our rigorous quality testing ensures industry-leading germination rates for successful growing.</p>
                        <a href="#" class="feature-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon icon-gold">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h3>Best Value</h3>
                        <p>Premium quality seeds at competitive prices with free shipping on all orders over $50.</p>
                        <a href="#" class="feature-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon icon-blue">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h3>Fast Shipping</h3>
                        <p>Orders ship within 24 hours so you can start planting as soon as possible.</p>
                        <a href="#" class="feature-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon icon-purple">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h3>Expert Support</h3>
                        <p>Our gardening experts are available 24/7 to help you succeed with tips and advice.</p>
                        <a href="#" class="feature-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card">
                        <div class="feature-icon icon-orange">
                            <i class="bi bi-book"></i>
                        </div>
                        <h3>Growing Guides</h3>
                        <p>Every order includes detailed growing instructions and seasonal planting calendars.</p>
                        <a href="#" class="feature-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section py-6">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center" data-aos="fade-up">
                    <span class="section-badge">Browse Collection</span>
                    <h2 class="section-title">Shop by <span class="text-gradient">Category</span></h2>
                    <p class="section-description">
                        Explore our diverse range of premium seeds organized by type for easy browsing.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <a href="/products" class="category-card category-vegetables">
                        <div class="category-icon">
                            <i class="bi bi-basket3"></i>
                        </div>
                        <h4>Vegetables</h4>
                        <span class="category-count">48 Products</span>
                        <div class="category-overlay"></div>
                    </a>
                </div>
                <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <a href="/products" class="category-card category-flowers">
                        <div class="category-icon">
                            <i class="bi bi-flower1"></i>
                        </div>
                        <h4>Flowers</h4>
                        <span class="category-count">35 Products</span>
                        <div class="category-overlay"></div>
                    </a>
                </div>
                <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <a href="/products" class="category-card category-herbs">
                        <div class="category-icon">
                            <i class="bi bi-leaf"></i>
                        </div>
                        <h4>Herbs</h4>
                        <span class="category-count">22 Products</span>
                        <div class="category-overlay"></div>
                    </a>
                </div>
                <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <a href="/products" class="category-card category-fruits">
                        <div class="category-icon">
                            <i class="bi bi-apple"></i>
                        </div>
                        <h4>Fruits</h4>
                        <span class="category-count">19 Products</span>
                        <div class="category-overlay"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="products-section py-6" id="products">
        <div class="container">
            <div class="row justify-content-between align-items-end mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="section-badge">Featured Products</span>
                    <h2 class="section-title">Bestselling <span class="text-gradient">Seeds</span></h2>
                    <p class="section-description mb-0">
                        Our most loved seeds, chosen by thousands of happy gardeners.
                    </p>
                </div>
                <div class="col-lg-auto mt-3 mt-lg-0" data-aos="fade-left">
                    <a href="/products" class="btn btn-outline-custom">
                        View All Products <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-card">
                        <div class="product-image bg-gradient-green">
                            <span class="product-badge badge-bestseller">Bestseller</span>
                            <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                            <div class="product-icon">
                                <i class="bi bi-flower2"></i>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="product-category">Vegetables</span>
                            <h4 class="product-title">Heirloom Tomato Mix</h4>
                            <p class="product-desc">5 heritage varieties including Brandywine & Cherokee Purple</p>
                            <div class="product-meta">
                                <span><i class="bi bi-clock"></i> 70-85 days</span>
                                <span><i class="bi bi-patch-check"></i> Organic</span>
                            </div>
                            <div class="product-footer">
                                <span class="product-price">$12.99</span>
                                <button class="btn btn-add-cart">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-image bg-gradient-brown">
                            <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                            <div class="product-icon">
                                <i class="bi bi-flower3"></i>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="product-category">Herbs</span>
                            <h4 class="product-title">Culinary Herb Garden</h4>
                            <p class="product-desc">Complete kit: Basil, Thyme, Oregano, Rosemary & Sage</p>
                            <div class="product-meta">
                                <span><i class="bi bi-clock"></i> 30-60 days</span>
                                <span><i class="bi bi-patch-check"></i> Non-GMO</span>
                            </div>
                            <div class="product-footer">
                                <span class="product-price">$9.99</span>
                                <button class="btn btn-add-cart">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="product-card">
                        <div class="product-image bg-gradient-pink">
                            <span class="product-badge badge-new">New</span>
                            <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                            <div class="product-icon">
                                <i class="bi bi-flower1"></i>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="product-category">Flowers</span>
                            <h4 class="product-title">Wildflower Meadow Mix</h4>
                            <p class="product-desc">20+ pollinator-friendly varieties for stunning displays</p>
                            <div class="product-meta">
                                <span><i class="bi bi-clock"></i> 60-90 days</span>
                                <span><i class="bi bi-patch-check"></i> Heirloom</span>
                            </div>
                            <div class="product-footer">
                                <span class="product-price">$14.99</span>
                                <button class="btn btn-add-cart">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="product-card">
                        <div class="product-image bg-gradient-teal">
                            <span class="product-badge badge-sale">20% Off</span>
                            <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                            <div class="product-icon">
                                <i class="bi bi-tree"></i>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="product-category">Vegetables</span>
                            <h4 class="product-title">Salad Greens Mix</h4>
                            <p class="product-desc">Lettuce, Arugula, Spinach & Microgreens blend</p>
                            <div class="product-meta">
                                <span><i class="bi bi-clock"></i> 21-45 days</span>
                                <span><i class="bi bi-patch-check"></i> Organic</span>
                            </div>
                            <div class="product-footer">
                                <span class="product-price">$8.99 <small class="text-decoration-line-through text-muted">$11.99</small></span>
                                <button class="btn btn-add-cart">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About/Story Section -->
    <section class="about-section py-6" id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-images">
                        <div class="about-img-main">
                            <div class="img-placeholder">
                                <i class="bi bi-flower2"></i>
                                <span>Growing Since 2010</span>
                            </div>
                        </div>
                        <div class="about-img-accent">
                            <div class="img-placeholder small">
                                <i class="bi bi-hand-thumbs-up"></i>
                            </div>
                        </div>
                        <div class="experience-badge">
                            <span class="exp-number">15+</span>
                            <span class="exp-text">Years of<br>Excellence</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="section-badge">Our Story</span>
                    <h2 class="section-title">Growing Together for a <span class="text-gradient">Greener Tomorrow</span></h2>
                    <p class="mb-4">
                        Founded in 2010, ParlakSeed began with a simple mission: to provide gardeners with the highest quality organic seeds while protecting our planet. What started as a small family farm has grown into a trusted name in sustainable gardening.
                    </p>
                    <p class="mb-4">
                        We work directly with certified organic farms worldwide to source seeds that are not only non-GMO but also contribute to biodiversity and sustainable agriculture practices.
                    </p>
                    <div class="about-features">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Family-owned business with passion for gardening</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Direct partnerships with organic farms globally</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Committed to sustainability and eco-friendly packaging</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Expert gardening support and growing guides</span>
                        </div>
                    </div>
                    <a href="/contact" class="btn btn-primary-custom btn-lg mt-4">
                        <i class="bi bi-chat-dots me-2"></i>
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section py-6" id="testimonials">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center" data-aos="fade-up">
                    <span class="section-badge badge-light">Testimonials</span>
                    <h2 class="section-title text-white">What Our <span class="text-gradient-light">Gardeners</span> Say</h2>
                    <p class="section-description text-white-50">
                        Join thousands of satisfied customers growing beautiful gardens with ParlakSeed.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <blockquote>
                            "The germination rate was incredible! Every single seed sprouted. My garden has never looked better. I'm amazed by the quality."
                        </blockquote>
                        <div class="testimonial-author">
                            <div class="author-avatar">SJ</div>
                            <div class="author-info">
                                <h5>Sarah Johnson</h5>
                                <span>Home Gardener, Vermont</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card featured">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <blockquote>
                            "As a professional farmer, seed quality matters. ParlakSeed delivers consistently excellent organic seeds. Best supplier I've worked with!"
                        </blockquote>
                        <div class="testimonial-author">
                            <div class="author-avatar">MC</div>
                            <div class="author-info">
                                <h5>Michael Chen</h5>
                                <span>Organic Farmer, Oregon</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <blockquote>
                            "The wildflower mix brought so many butterflies and bees to my yard! Beautiful blooms all summer. Customer service was fantastic."
                        </blockquote>
                        <div class="testimonial-author">
                            <div class="author-avatar">ER</div>
                            <div class="author-info">
                                <h5>Emily Rodriguez</h5>
                                <span>Garden Enthusiast, Texas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section py-6">
        <div class="container">
            <div class="newsletter-wrapper" data-aos="zoom-in">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="newsletter-icon">
                            <i class="bi bi-envelope-paper"></i>
                        </div>
                        <h2 class="newsletter-title">Join Our Growing Community</h2>
                        <p class="newsletter-desc">
                            Subscribe to get exclusive deals, seasonal planting guides, and expert gardening tips delivered straight to your inbox.
                        </p>
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email address" required>
                                <button class="btn btn-primary-custom" type="submit">
                                    Subscribe
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </form>
                        <p class="newsletter-note">
                            <i class="bi bi-shield-check me-1"></i>
                            We respect your privacy. Unsubscribe at any time.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-top">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="footer-brand">
                            <a href="/" class="d-flex align-items-center gap-2 text-decoration-none mb-3">
                                <div class="brand-icon">
                                    <i class="bi bi-flower2"></i>
                                </div>
                                <span class="brand-text text-white">ParlakSeed</span>
                            </a>
                            <p class="footer-desc">
                                Helping gardeners grow beautiful, sustainable gardens since 2010. Our mission is to provide the highest quality organic seeds while protecting our planet.
                            </p>
                            <div class="footer-social">
                                <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="social-link"><i class="bi bi-twitter-x"></i></a>
                                <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="social-link"><i class="bi bi-youtube"></i></a>
                                <a href="#" class="social-link"><i class="bi bi-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h5 class="footer-title">Shop</h5>
                        <ul class="footer-links">
                            <li><a href="/products">All Seeds</a></li>
                            <li><a href="/products">Vegetables</a></li>
                            <li><a href="/products">Flowers</a></li>
                            <li><a href="/products">Herbs</a></li>
                            <li><a href="/products">Fruits</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h5 class="footer-title">Company</h5>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Sustainability</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h5 class="footer-title">Support</h5>
                        <ul class="footer-links">
                            <li><a href="#">Growing Guides</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Help Center</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h5 class="footer-title">Contact</h5>
                        <ul class="footer-contact">
                            <li>
                                <i class="bi bi-geo-alt"></i>
                                <span>123 Garden Valley<br>Greenfield, CA</span>
                            </li>
                            <li>
                                <i class="bi bi-telephone"></i>
                                <a href="tel:+18005557333">1-800-555-SEED</a>
                            </li>
                            <li>
                                <i class="bi bi-envelope"></i>
                                <a href="mailto:hello@parlakseed.com">hello@parlakseed.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright">&copy; 2025 ParlakSeed. All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="footer-legal">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Back to top button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navHeight = document.getElementById('mainNav').offsetHeight;
                    const targetPosition = target.offsetTop - navHeight;
                    window.scrollTo({ top: targetPosition, behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>