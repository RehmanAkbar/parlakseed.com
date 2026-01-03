<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'ParlakSeed - Premium organic and heirloom seeds for your garden. Shop vegetables, flowers, herbs, and fruit seeds.')">
    <title>@yield('title', 'ParlakSeed - Premium Organic Seeds')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Source+Sans+3:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* ============================================
           CSS RESET & ROOT VARIABLES
           ============================================ */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            /* Primary Colors - Deep Forest Greens */
            --color-primary: #2d5a3d;
            --color-primary-light: #4a7c59;
            --color-primary-dark: #1e3d29;
            
            /* Secondary Colors - Earthy Browns */
            --color-secondary: #8b6f47;
            --color-secondary-light: #a68a5b;
            --color-secondary-dark: #6d5639;
            
            /* Accent Colors - Warm Terracotta */
            --color-accent: #c4785c;
            --color-accent-light: #d69578;
            --color-accent-dark: #a65f43;
            
            /* Neutral Colors */
            --color-cream: #f8f5f0;
            --color-cream-dark: #ece7df;
            --color-warm-white: #fdfcfa;
            --color-charcoal: #2d4a3e;
            --color-charcoal-light: #4a6357;
            
            /* Gold Accent */
            --color-gold: #d4a84b;
            --color-gold-light: #e6c06a;
            
            /* Typography */
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'Source Sans 3', -apple-system, BlinkMacSystemFont, sans-serif;
            
            /* Spacing */
            --space-xs: 0.25rem;
            --space-sm: 0.5rem;
            --space-md: 1rem;
            --space-lg: 1.5rem;
            --space-xl: 2rem;
            --space-2xl: 3rem;
            --space-3xl: 4rem;
            --space-4xl: 6rem;
            
            /* Border Radius */
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-full: 50px;
            
            /* Shadows */
            --shadow-sm: 0 2px 8px rgba(45, 90, 61, 0.08);
            --shadow-md: 0 8px 24px rgba(45, 90, 61, 0.12);
            --shadow-lg: 0 16px 48px rgba(45, 90, 61, 0.15);
            --shadow-xl: 0 24px 64px rgba(45, 90, 61, 0.2);
            
            /* Transitions */
            --transition-fast: 0.15s ease;
            --transition-base: 0.3s ease;
            --transition-slow: 0.5s ease;
            
            /* Header Height */
            --header-height: 80px;
        }

        /* ============================================
           BASE STYLES
           ============================================ */
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            font-size: 16px;
            line-height: 1.6;
            color: var(--color-charcoal);
            background: var(--color-warm-white);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 700;
            line-height: 1.2;
            color: var(--color-charcoal);
        }

        a {
            color: inherit;
            text-decoration: none;
            transition: var(--transition-base);
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* ============================================
           LAYOUT UTILITIES
           ============================================ */
        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .section-sm { padding: 3rem 0; }
        .section-md { padding: 4rem 0; }
        .section-lg { padding: 5rem 0; }

        /* ============================================
           HEADER STYLES
           ============================================ */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(253, 252, 250, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(45, 90, 61, 0.08);
            transition: var(--transition-base);
            height: var(--header-height);
        }

        .site-header.scrolled {
            background: rgba(253, 252, 250, 0.98);
            box-shadow: var(--shadow-sm);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: var(--header-height);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-primary);
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(45, 90, 61, 0.2);
        }

        .logo-icon svg {
            width: 24px;
            height: 24px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        .main-nav {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .nav-link {
            position: relative;
            font-weight: 500;
            color: var(--color-charcoal);
            padding: 0.5rem 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-primary);
            transition: width var(--transition-base);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--color-primary);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-btn {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--color-cream);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition-base);
            position: relative;
        }

        .header-btn:hover {
            background: var(--color-primary);
        }

        .header-btn svg {
            width: 20px;
            height: 20px;
            stroke: var(--color-charcoal);
            fill: none;
            stroke-width: 2;
            transition: var(--transition-base);
        }

        .header-btn:hover svg {
            stroke: white;
        }

        .cart-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 18px;
            height: 18px;
            background: var(--color-accent);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-btn {
            display: none;
            width: 44px;
            height: 44px;
            background: transparent;
            border: none;
            cursor: pointer;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .mobile-menu-btn span {
            width: 24px;
            height: 2px;
            background: var(--color-charcoal);
            transition: var(--transition-base);
        }

        /* ============================================
           MAIN CONTENT WRAPPER
           ============================================ */
        .main-content {
            padding-top: var(--header-height);
            min-height: 100vh;
        }

        /* ============================================
           BUTTONS
           ============================================ */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-family: var(--font-body);
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: var(--radius-full);
            border: 2px solid transparent;
            cursor: pointer;
            transition: var(--transition-base);
            text-decoration: none;
        }

        .btn svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            color: white;
            border-color: transparent;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, var(--color-primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45, 90, 61, 0.3);
        }

        .btn-outline {
            background: transparent;
            color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-outline:hover {
            background: var(--color-primary);
            color: white;
            transform: translateY(-2px);
        }

        .btn-lg {
            padding: 1rem 2rem;
            font-size: 1rem;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        /* ============================================
           SECTION HEADERS
           ============================================ */
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(45, 90, 61, 0.08);
            color: var(--color-primary);
            padding: 0.5rem 1.25rem;
            border-radius: var(--radius-full);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .section-badge.badge-light {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        .section-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            margin-bottom: 1rem;
        }

        .section-description {
            font-size: 1.1rem;
            color: var(--color-charcoal-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-light {
            background: linear-gradient(135deg, #ffffff 0%, rgba(255,255,255,0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ============================================
           PAGE HEADER (For Inner Pages)
           ============================================ */
        .page-header {
            background: linear-gradient(165deg, var(--color-warm-white) 0%, var(--color-cream) 50%, rgba(74, 124, 89, 0.08) 100%);
            padding: 3rem 0;
            text-align: center;
        }

        .page-header h1 {
            font-size: clamp(2rem, 4vw, 2.75rem);
            margin-bottom: 0.75rem;
        }

        .page-header p {
            font-size: 1.1rem;
            color: var(--color-charcoal-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--color-charcoal-light);
            margin-bottom: 1.5rem;
        }

        .breadcrumb a {
            color: var(--color-primary);
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb svg {
            width: 14px;
            height: 14px;
            stroke: var(--color-charcoal-light);
            opacity: 0.5;
        }

        /* ============================================
           FORMS
           ============================================ */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--color-charcoal);
        }

        .form-label .required {
            color: var(--color-accent);
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            font-family: var(--font-body);
            font-size: 1rem;
            border: 1px solid rgba(45, 90, 61, 0.2);
            border-radius: var(--radius-md);
            background: white;
            transition: var(--transition-base);
            outline: none;
        }

        .form-control:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(45, 90, 61, 0.1);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%232D4A3E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        /* ============================================
           FOOTER
           ============================================ */
        .site-footer {
            background: var(--color-charcoal);
            color: rgba(255, 255, 255, 0.8);
            padding: 4rem 0 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr repeat(3, 1fr);
            gap: 3rem;
            padding-bottom: 3rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-brand .logo {
            color: white;
            margin-bottom: 1.25rem;
        }

        .footer-brand .logo-icon {
            background: rgba(255, 255, 255, 0.1);
        }

        .footer-brand p {
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            opacity: 0.8;
        }

        .footer-social {
            display: flex;
            gap: 0.75rem;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-base);
        }

        .footer-social a:hover {
            background: var(--color-primary);
        }

        .footer-social svg {
            width: 18px;
            height: 18px;
            fill: white;
        }

        .footer-column h4 {
            color: white;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            font-family: var(--font-body);
            font-weight: 600;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            transition: var(--transition-base);
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .footer-contact-item svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-primary-light);
            fill: none;
            stroke-width: 2;
            flex-shrink: 0;
            margin-top: 3px;
        }

        .footer-bottom {
            padding: 1.5rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            opacity: 0.7;
        }

        .footer-bottom-links {
            display: flex;
            gap: 2rem;
        }

        .footer-bottom-links a:hover {
            color: white;
        }

        /* ============================================
           UTILITIES
           ============================================ */
        /* Main Content - Push below fixed header */
        .main-content {
            padding-top: var(--header-height);
            min-height: calc(100vh - var(--header-height));
        }

        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 1rem; }
        .mt-4 { margin-top: 1.5rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }

        /* ============================================
           RESPONSIVE STYLES
           ============================================ */
        @media (max-width: 991px) {
            .main-nav {
                display: none;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .container {
                padding: 0 1rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .page-header {
                padding: 2rem 0;
            }
        }
    </style>

    <!-- Page Specific Styles -->
    @yield('styles')
</head>
<body>
    <!-- Header -->
    <header class="site-header" id="siteHeader">
        <div class="container">
            <div class="header-inner">
                <a href="/" class="logo">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/>
                            <path d="M12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z"/>
                        </svg>
                    </div>
                    <span>ParlakSeed</span>
                </a>

                <nav class="main-nav">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="/products" class="nav-link {{ request()->is('products') ? 'active' : '' }}">Products</a>
                    <a href="/#about" class="nav-link">About</a>
                    <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                </nav>

                <div class="header-actions">
                    <button class="header-btn" aria-label="Search">
                        <svg viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="M21 21l-4.35-4.35"/>
                        </svg>
                    </button>
                    <button class="header-btn" aria-label="Cart">
                        <svg viewBox="0 0 24 24">
                            <path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                        </svg>
                        <span class="cart-badge">3</span>
                    </button>
                    <button class="mobile-menu-btn" aria-label="Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="/" class="logo">
                        <div class="logo-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/>
                                <path d="M12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z"/>
                            </svg>
                        </div>
                        <span>ParlakSeed</span>
                    </a>
                    <p>Growing together for a greener tomorrow. Premium organic seeds for gardeners who care about nature and sustainability.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                        <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
                        <a href="#" aria-label="Twitter"><svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg></a>
                        <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/products">All Products</a></li>
                        <li><a href="/#about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="#">Growing Guides</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Categories</h4>
                    <ul class="footer-links">
                        <li><a href="/products">Vegetables</a></li>
                        <li><a href="/products">Flowers</a></li>
                        <li><a href="/products">Herbs</a></li>
                        <li><a href="/products">Fruits</a></li>
                        <li><a href="/products">Collections</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Contact Us</h4>
                    <div class="footer-contact-item">
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>123 Garden Valley Road<br>Greenfield, CA 93927</span>
                    </div>
                    <div class="footer-contact-item">
                        <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span>1-800-555-SEED</span>
                    </div>
                    <div class="footer-contact-item">
                        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <span>hello@parlakseed.com</span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} ParlakSeed. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Shipping Info</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Header scroll effect
        const header = document.getElementById('siteHeader');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>

    @yield('scripts')
</body>
</html>