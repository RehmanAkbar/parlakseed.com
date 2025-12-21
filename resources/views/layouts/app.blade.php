<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ParlakSeed - Premium Organic Seeds for a Greener Tomorrow')</title>
    <meta name="description" content="@yield('meta_description', 'Discover premium organic and heirloom seeds at ParlakSeed. From vegetables to flowers, grow your dream garden with our certified non-GMO seeds.')">
    <link rel="icon" href="/favicon.ico" sizes="any">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500&family=Source+Sans+3:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ============================================
           CSS Reset & Variables
           ============================================ */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            /* Primary Colors - Nature Inspired */
            --color-primary: #2d5a3d;
            --color-primary-light: #4a7c59;
            --color-primary-dark: #1e3d2a;
            --color-primary-rgb: 45, 90, 61;
            
            /* Secondary Colors */
            --color-secondary: #8b6f47;
            --color-secondary-light: #a68a5b;
            --color-secondary-dark: #6d5639;
            
            /* Accent Colors */
            --color-accent: #c4785c;
            --color-accent-light: #d4927a;
            --color-accent-dark: #a65f43;
            
            /* Neutral Colors */
            --color-cream: #faf7f2;
            --color-cream-dark: #f5f0e8;
            --color-warm-white: #fffef9;
            --color-charcoal: #2c2c2c;
            --color-charcoal-light: #404040;
            
            /* UI Colors */
            --color-success: #4a7c59;
            --color-warning: #d4a84b;
            --color-danger: #c45c5c;
            --color-info: #5c8dc4;
            
            /* Fonts */
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'Source Sans 3', system-ui, sans-serif;
            
            /* Shadows */
            --shadow-sm: 0 2px 8px rgba(45, 90, 61, 0.08);
            --shadow-md: 0 4px 20px rgba(45, 90, 61, 0.12);
            --shadow-lg: 0 8px 40px rgba(45, 90, 61, 0.16);
            --shadow-xl: 0 16px 60px rgba(45, 90, 61, 0.2);
            
            /* Border Radius */
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --radius-xl: 30px;
            --radius-full: 50px;
            
            /* Transitions */
            --transition-fast: 0.2s ease;
            --transition-base: 0.3s ease;
            --transition-slow: 0.5s ease;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--color-cream);
            color: var(--color-charcoal);
            line-height: 1.7;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            font-weight: 600;
            line-height: 1.3;
            color: var(--color-charcoal);
        }

        a {
            text-decoration: none;
            transition: var(--transition-base);
        }

        img {
            max-width: 100%;
            height: auto;
        }

        main {
            flex: 1;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .container-lg {
            max-width: 1400px;
        }

        /* ============================================
           Text Utilities
           ============================================ */
        .text-gradient {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 50%, var(--color-accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-gradient-light {
            background: linear-gradient(135deg, #ffffff 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }

        /* ============================================
           Section Utilities
           ============================================ */
        .section {
            padding: 5rem 0;
        }

        .section-sm {
            padding: 3rem 0;
        }

        .section-lg {
            padding: 6rem 0;
        }

        .section-header {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 3rem;
        }

        .section-badge {
            display: inline-block;
            font-family: var(--font-display);
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 0.75rem;
        }

        .section-badge.badge-light {
            color: rgba(255, 255, 255, 0.7);
        }

        .section-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .section-description {
            font-size: 1.1rem;
            color: var(--color-charcoal-light);
            opacity: 0.8;
        }

        /* ============================================
           Button Styles
           ============================================ */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            border-radius: var(--radius-full);
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
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(var(--color-primary-rgb), 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(var(--color-primary-rgb), 0.35);
            color: white;
        }

        .btn-secondary {
            background: var(--color-secondary);
            color: white;
        }

        .btn-secondary:hover {
            background: var(--color-secondary-dark);
            color: white;
        }

        .btn-outline {
            background: transparent;
            color: var(--color-primary);
            border: 2px solid var(--color-primary);
        }

        .btn-outline:hover {
            background: var(--color-primary);
            color: white;
        }

        .btn-outline-light {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline-light:hover {
            background: white;
            color: var(--color-primary);
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .btn-lg {
            padding: 1rem 2rem;
            font-size: 1rem;
        }

        .btn-icon {
            width: 44px;
            height: 44px;
            padding: 0;
            border-radius: 50%;
        }

        /* ============================================
           Header / Navigation
           ============================================ */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(250, 247, 242, 0.97);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(45, 90, 61, 0.08);
            transition: var(--transition-base);
        }

        .header.scrolled {
            box-shadow: var(--shadow-md);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            gap: 2rem;
        }

        /* Logo */
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            flex-shrink: 0;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-base);
        }

        .logo:hover .logo-icon {
            transform: rotate(-5deg) scale(1.05);
        }

        .logo-icon svg {
            width: 28px;
            height: 28px;
            fill: white;
        }

        .logo-text {
            font-family: var(--font-display);
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--color-primary-dark);
        }

        /* Main Navigation */
        .main-nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            position: relative;
            padding: 0.6rem 1.1rem;
            font-weight: 500;
            font-size: 0.95rem;
            color: var(--color-charcoal);
            border-radius: var(--radius-sm);
            transition: var(--transition-base);
        }

        .nav-link:hover {
            color: var(--color-primary);
            background: rgba(45, 90, 61, 0.06);
        }

        .nav-link.active {
            color: var(--color-primary);
            background: rgba(45, 90, 61, 0.08);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0.3rem;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: calc(100% - 1.5rem);
            height: 2px;
            background: var(--color-primary);
            border-radius: 2px;
            transition: transform var(--transition-base);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            transform: translateX(-50%) scaleX(1);
        }

        /* Header Actions */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-charcoal);
            background: transparent;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition-base);
        }

        .header-icon:hover {
            color: var(--color-primary);
            background: rgba(45, 90, 61, 0.08);
        }

        .header-icon svg {
            width: 22px;
            height: 22px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        .cart-icon {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: 2px;
            right: 2px;
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
        .mobile-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            width: 42px;
            height: 42px;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 10px;
        }

        .mobile-toggle span {
            display: block;
            width: 100%;
            height: 2px;
            background: var(--color-charcoal);
            border-radius: 2px;
            transition: var(--transition-base);
        }

        /* Mobile Navigation */
        .mobile-nav {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid rgba(45, 90, 61, 0.1);
            box-shadow: var(--shadow-lg);
            padding: 1rem 0;
        }

        .mobile-nav.active {
            display: block;
        }

        .mobile-nav a {
            display: block;
            padding: 0.85rem 1.5rem;
            color: var(--color-charcoal);
            font-weight: 500;
            border-bottom: 1px solid rgba(45, 90, 61, 0.06);
        }

        .mobile-nav a:hover,
        .mobile-nav a.active {
            color: var(--color-primary);
            background: rgba(45, 90, 61, 0.04);
        }

        /* ============================================
           Page Header
           ============================================ */
        .page-header {
            padding: 10rem 0 4rem;
            text-align: center;
            background: linear-gradient(180deg, var(--color-warm-white) 0%, var(--color-cream) 100%);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -30%;
            left: -10%;
            width: 50%;
            height: 100%;
            background: radial-gradient(ellipse, rgba(123, 158, 135, 0.12) 0%, transparent 70%);
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: -10%;
            width: 50%;
            height: 100%;
            background: radial-gradient(ellipse, rgba(196, 120, 92, 0.1) 0%, transparent 70%);
        }

        .page-header h1 {
            font-size: clamp(2.25rem, 5vw, 3.5rem);
            font-weight: 800;
            color: var(--color-charcoal);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .page-header p {
            font-size: 1.15rem;
            color: var(--color-charcoal);
            opacity: 0.7;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .breadcrumb a {
            color: var(--color-primary);
            font-weight: 500;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb span {
            color: var(--color-charcoal-light);
            opacity: 0.6;
        }

        .breadcrumb svg {
            width: 16px;
            height: 16px;
            stroke: var(--color-charcoal-light);
            opacity: 0.5;
        }

        /* ============================================
           Footer
           ============================================ */
        .footer {
            background: var(--color-charcoal);
            color: rgba(255, 255, 255, 0.7);
            padding-top: 4rem;
            margin-top: auto;
        }

        .footer-top {
            padding-bottom: 3rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 3rem;
        }

        .footer-brand .logo-icon {
            background: var(--color-primary);
        }

        .footer-brand .logo-text {
            color: white;
        }

        .footer-desc {
            margin: 1rem 0 1.5rem;
            line-height: 1.75;
        }

        .footer-social {
            display: flex;
            gap: 0.75rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition-base);
        }

        .social-link:hover {
            background: var(--color-primary);
            transform: translateY(-3px);
        }

        .social-link svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .footer-title {
            color: white;
            font-size: 1.1rem;
            margin-bottom: 1.25rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.65rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-links a:hover {
            color: var(--color-primary-light);
        }

        .footer-contact {
            list-style: none;
        }

        .footer-contact li {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .footer-contact svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-primary-light);
            fill: none;
            stroke-width: 2;
            flex-shrink: 0;
            margin-top: 3px;
        }

        .footer-contact a {
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-contact a:hover {
            color: var(--color-primary-light);
        }

        .footer-bottom {
            padding: 1.5rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .copyright {
            font-size: 0.875rem;
            margin: 0;
        }

        .footer-legal {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        .footer-legal a {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.875rem;
        }

        .footer-legal a:hover {
            color: var(--color-primary-light);
        }

        /* ============================================
           Back to Top Button
           ============================================ */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition-base);
            box-shadow: var(--shadow-md);
            z-index: 99;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--color-primary-dark);
            transform: translateY(-5px);
        }

        .back-to-top svg {
            width: 24px;
            height: 24px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        /* ============================================
           Card Styles
           ============================================ */
        .card {
            background: white;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(45, 90, 61, 0.08);
            transition: var(--transition-base);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        /* ============================================
           Form Styles
           ============================================ */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--color-charcoal);
        }

        .form-label .required {
            color: var(--color-danger);
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1.25rem;
            border: 1px solid rgba(45, 90, 61, 0.2);
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 1rem;
            color: var(--color-charcoal);
            background: white;
            transition: var(--transition-base);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(var(--color-primary-rgb), 0.15);
        }

        .form-control::placeholder {
            color: var(--color-charcoal-light);
            opacity: 0.5;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%232D4A3E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
            cursor: pointer;
        }

        /* ============================================
           Grid Utilities
           ============================================ */
        .grid {
            display: grid;
            gap: 2rem;
        }

        .grid-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-4 { grid-template-columns: repeat(4, 1fr); }

        /* ============================================
           Spacing Utilities
           ============================================ */
        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mt-4 { margin-top: 2rem; }
        .mt-5 { margin-top: 3rem; }
        
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 2rem; }
        .mb-5 { margin-bottom: 3rem; }

        .py-4 { padding-top: 2rem; padding-bottom: 2rem; }
        .py-5 { padding-top: 3rem; padding-bottom: 3rem; }
        .py-6 { padding-top: 5rem; padding-bottom: 5rem; }

        /* ============================================
           Responsive Styles
           ============================================ */
        @media (max-width: 1199px) {
            .grid-4 { grid-template-columns: repeat(3, 1fr); }
        }

        @media (max-width: 991px) {
            .main-nav { display: none; }
            .mobile-toggle { display: flex; }
            
            .grid-3 { grid-template-columns: repeat(2, 1fr); }
            .grid-4 { grid-template-columns: repeat(2, 1fr); }
            
            .footer-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 767px) {
            .page-header { padding: 8rem 0 3rem; }
            
            .grid-2 { grid-template-columns: 1fr; }
            .grid-3 { grid-template-columns: 1fr; }
            .grid-4 { grid-template-columns: repeat(2, 1fr); }
            
            .section { padding: 3rem 0; }
            .section-lg { padding: 4rem 0; }
            
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; text-align: center; }
            .footer-legal { justify-content: center; }
        }

        @media (max-width: 575px) {
            .header-actions .btn-primary { display: none; }
            .grid-4 { grid-template-columns: 1fr; }
        }

        /* ============================================
           Page-Specific Styles Placeholder
           ============================================ */
        @yield('styles')
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header" id="mainHeader">
        <div class="container">
            <div class="header-inner">
                <!-- Logo -->
                <a href="/" class="logo">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7zm-5 8c2.5.5 4.5 2 5.5 4-.5 1-1.5 2.5-3 3.5-2 1.3-4 1.5-5.5 1 0-3 1-6.5 3-8.5zm10 0c-2.5.5-4.5 2-5.5 4 .5 1 1.5 2.5 3 3.5 2 1.3 4 1.5 5.5 1 0-3-1-6.5-3-8.5zM12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z"/>
                        </svg>
                    </div>
                    <span class="logo-text">ParlakSeed</span>
                </a>

                <!-- Main Navigation -->
                <nav class="main-nav">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="/products" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">Products</a>
                    <a href="/#about" class="nav-link">About</a>
                    <a href="/#testimonials" class="nav-link">Testimonials</a>
                    <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions">
                    <button class="header-icon" aria-label="Search">
                        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                    </button>
                    <a href="#" class="header-icon cart-icon" aria-label="Cart">
                        <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        <span class="cart-badge">3</span>
                    </a>
                    <a href="/products" class="btn btn-primary">
                        <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                        Shop Now
                    </a>
                    <button class="mobile-toggle" id="mobileToggle" aria-label="Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <nav class="mobile-nav" id="mobileNav">
                <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="/products" class="{{ request()->is('products*') ? 'active' : '' }}">Products</a>
                <a href="/#about">About</a>
                <a href="/#testimonials">Testimonials</a>
                <a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-grid">
                    <div class="footer-brand">
                        <a href="/" class="logo">
                            <div class="logo-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7zm-5 8c2.5.5 4.5 2 5.5 4-.5 1-1.5 2.5-3 3.5-2 1.3-4 1.5-5.5 1 0-3 1-6.5 3-8.5zm10 0c-2.5.5-4.5 2-5.5 4 .5 1 1.5 2.5 3 3.5 2 1.3 4 1.5 5.5 1 0-3-1-6.5-3-8.5zM12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z"/>
                                </svg>
                            </div>
                            <span class="logo-text">ParlakSeed</span>
                        </a>
                        <p class="footer-desc">
                            Helping gardeners grow beautiful, sustainable gardens since 2010. Our mission is to provide the highest quality organic seeds while protecting our planet.
                        </p>
                        <div class="footer-social">
                            <a href="#" class="social-link" aria-label="Facebook">
                                <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter">
                                <svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram">
                                <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                            </a>
                            <a href="#" class="social-link" aria-label="YouTube">
                                <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h5 class="footer-title">Shop</h5>
                        <ul class="footer-links">
                            <li><a href="/products">All Seeds</a></li>
                            <li><a href="/products">Vegetables</a></li>
                            <li><a href="/products">Flowers</a></li>
                            <li><a href="/products">Herbs</a></li>
                            <li><a href="/products">Fruits</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="footer-title">Company</h5>
                        <ul class="footer-links">
                            <li><a href="/#about">About Us</a></li>
                            <li><a href="/#about">Our Story</a></li>
                            <li><a href="#">Sustainability</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="footer-title">Support</h5>
                        <ul class="footer-links">
                            <li><a href="#">Growing Guides</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Shipping Info</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Help Center</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="footer-title">Contact</h5>
                        <ul class="footer-contact">
                            <li>
                                <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span>123 Garden Valley<br>Greenfield, CA</span>
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <a href="tel:+18005557333">1-800-555-SEED</a>
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                <a href="mailto:hello@parlakseed.com">hello@parlakseed.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="copyright">&copy; {{ date('Y') }} ParlakSeed. All rights reserved.</p>
                <ul class="footer-legal">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <svg viewBox="0 0 24 24"><path d="M18 15l-6-6-6 6"/></svg>
    </button>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('mainHeader');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const mobileNav = document.getElementById('mobileNav');
        
        if (mobileToggle && mobileNav) {
            mobileToggle.addEventListener('click', function() {
                mobileNav.classList.toggle('active');
            });
        }

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
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const headerHeight = document.getElementById('mainHeader').offsetHeight;
                        const targetPosition = target.offsetTop - headerHeight;
                        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
                        
                        // Close mobile menu if open
                        if (mobileNav) {
                            mobileNav.classList.remove('active');
                        }
                    }
                }
            });
        });
    </script>

    @yield('scripts')
</body>
</html>
