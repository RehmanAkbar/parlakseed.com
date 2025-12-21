<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Seeds - GreenSprout Seeds</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900|dm-sans:400,500,600,700" rel="stylesheet" />
    
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        
        :root {
            --color-cream: #FAF7F2;
            --color-sage: #7B9E87;
            --color-sage-dark: #5A7D66;
            --color-forest: #2D4A3E;
            --color-earth: #8B7355;
            --color-terracotta: #C4785C;
            --color-charcoal: #2C2C2C;
            --color-warm-white: #FFFEF9;
            --font-display: 'Fraunces', Georgia, serif;
            --font-body: 'DM Sans', system-ui, sans-serif;
        }
        
        html { scroll-behavior: smooth; }
        
        body {
            font-family: var(--font-body);
            background-color: var(--color-cream);
            color: var(--color-charcoal);
            line-height: 1.6;
        }
        
        /* Navigation */
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 1.25rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(250, 247, 242, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(123, 158, 135, 0.15);
        }
        
        .nav-logo {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--color-forest);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .nav-logo svg {
            width: 32px;
            height: 32px;
            fill: var(--color-sage);
        }
        
        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--color-charcoal);
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-sage);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover { color: var(--color-sage-dark); }
        .nav-links a:hover::after { width: 100%; }
        .nav-links a.active { color: var(--color-sage-dark); }
        .nav-links a.active::after { width: 100%; }
        
        .nav-cta {
            background: var(--color-forest);
            color: var(--color-warm-white);
            padding: 0.75rem 1.75rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 2px solid var(--color-forest);
        }
        
        .nav-cta:hover {
            background: transparent;
            color: var(--color-forest);
        }

        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
        }
        
        .mobile-menu-btn span {
            width: 25px;
            height: 2px;
            background: var(--color-forest);
        }
        
        /* Page Header */
        .page-header {
            padding: 8rem 4rem 4rem;
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
            background: radial-gradient(ellipse, rgba(123, 158, 135, 0.1) 0%, transparent 70%);
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
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            color: var(--color-forest);
            margin-bottom: 1rem;
            position: relative;
        }
        
        .page-header p {
            font-size: 1.2rem;
            color: var(--color-charcoal);
            opacity: 0.7;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }
        
        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 3rem;
            padding: 3rem 4rem 6rem;
            max-width: 1600px;
            margin: 0 auto;
        }
        
        /* Sidebar Filters */
        .sidebar {
            position: sticky;
            top: 100px;
            height: fit-content;
        }
        
        .filter-section {
            background: var(--color-warm-white);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(123, 158, 135, 0.1);
        }
        
        .filter-title {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--color-forest);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .filter-title svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-sage);
            fill: none;
            stroke-width: 2;
        }
        
        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .filter-option {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .filter-option:hover {
            color: var(--color-sage-dark);
        }
        
        .filter-option input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--color-sage);
            cursor: pointer;
        }
        
        .filter-option label {
            cursor: pointer;
            font-size: 0.95rem;
        }
        
        .filter-count {
            margin-left: auto;
            font-size: 0.8rem;
            color: var(--color-charcoal);
            opacity: 0.5;
            background: var(--color-cream);
            padding: 0.15rem 0.5rem;
            border-radius: 10px;
        }
        
        /* Price Range */
        .price-range {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .price-input {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid rgba(123, 158, 135, 0.3);
            border-radius: 10px;
            font-family: var(--font-body);
            font-size: 0.9rem;
            text-align: center;
            outline: none;
            transition: border-color 0.3s ease;
        }
        
        .price-input:focus {
            border-color: var(--color-sage);
        }
        
        .price-separator {
            color: var(--color-charcoal);
            opacity: 0.5;
        }
        
        /* Clear Filters */
        .clear-filters {
            width: 100%;
            padding: 0.75rem;
            background: transparent;
            border: 1px solid var(--color-sage);
            border-radius: 10px;
            color: var(--color-sage-dark);
            font-family: var(--font-body);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .clear-filters:hover {
            background: var(--color-sage);
            color: white;
        }
        
        /* Products Area */
        .products-area {
            flex: 1;
        }
        
        /* Sort Bar */
        .sort-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem 1.5rem;
            background: var(--color-warm-white);
            border-radius: 15px;
            border: 1px solid rgba(123, 158, 135, 0.1);
        }
        
        .results-count {
            font-size: 0.95rem;
            color: var(--color-charcoal);
        }
        
        .results-count strong {
            color: var(--color-forest);
        }
        
        .sort-options {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .sort-label {
            font-size: 0.9rem;
            color: var(--color-charcoal);
            opacity: 0.7;
        }
        
        .sort-select {
            padding: 0.5rem 2rem 0.5rem 1rem;
            border: 1px solid rgba(123, 158, 135, 0.3);
            border-radius: 8px;
            font-family: var(--font-body);
            font-size: 0.9rem;
            background: white;
            cursor: pointer;
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%232D4A3E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
        }
        
        .view-toggle {
            display: flex;
            gap: 0.5rem;
        }
        
        .view-btn {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: 1px solid rgba(123, 158, 135, 0.3);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .view-btn.active {
            background: var(--color-forest);
            border-color: var(--color-forest);
        }
        
        .view-btn svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-charcoal);
            fill: none;
            stroke-width: 2;
        }
        
        .view-btn.active svg {
            stroke: white;
        }
        
        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
        
        .product-card {
            background: var(--color-warm-white);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            border: 1px solid rgba(123, 158, 135, 0.1);
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(45, 74, 62, 0.15);
        }
        
        .product-image {
            height: 220px;
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-forest) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .product-image::before {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        
        .product-image svg {
            width: 80px;
            height: 80px;
            fill: rgba(255,255,255,0.9);
            z-index: 1;
        }
        
        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--color-terracotta);
            color: white;
            padding: 0.3rem 0.85rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .product-badge.new {
            background: var(--color-sage);
        }
        
        .product-badge.sale {
            background: #D64545;
        }
        
        .product-wishlist {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.9);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .product-wishlist:hover {
            background: white;
            transform: scale(1.1);
        }
        
        .product-wishlist svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-charcoal);
            fill: none;
            stroke-width: 2;
        }
        
        .product-content {
            padding: 1.5rem;
        }
        
        .product-category {
            font-size: 0.8rem;
            color: var(--color-sage);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }
        
        .product-card h3 {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--color-forest);
            margin-bottom: 0.5rem;
        }
        
        .product-card p {
            font-size: 0.9rem;
            color: var(--color-charcoal);
            opacity: 0.7;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .product-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.8rem;
            color: var(--color-charcoal);
            opacity: 0.6;
        }
        
        .product-meta span {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .product-meta svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }
        
        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .product-price {
            font-family: var(--font-display);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--color-forest);
        }
        
        .product-price .original {
            font-size: 0.9rem;
            color: var(--color-charcoal);
            opacity: 0.5;
            text-decoration: line-through;
            margin-left: 0.5rem;
            font-weight: 400;
        }
        
        .product-btn {
            background: var(--color-forest);
            color: white;
            border: none;
            padding: 0.75rem 1.25rem;
            border-radius: 50px;
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .product-btn:hover {
            background: var(--color-sage);
            transform: scale(1.05);
        }
        
        .product-btn svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }
        
        .pagination-btn {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--color-warm-white);
            border: 1px solid rgba(123, 158, 135, 0.2);
            border-radius: 10px;
            font-family: var(--font-body);
            font-weight: 500;
            color: var(--color-charcoal);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .pagination-btn:hover {
            border-color: var(--color-sage);
            color: var(--color-sage-dark);
        }
        
        .pagination-btn.active {
            background: var(--color-forest);
            border-color: var(--color-forest);
            color: white;
        }
        
        .pagination-btn svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }
        
        /* Footer */
        .footer {
            background: var(--color-charcoal);
            color: rgba(255,255,255,0.7);
            padding: 4rem;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-brand h3 {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .footer-brand h3 svg {
            width: 28px;
            height: 28px;
            fill: var(--color-sage);
        }
        
        .footer-brand p {
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
        }
        
        .footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .footer-social a:hover {
            background: var(--color-sage);
            transform: translateY(-3px);
        }
        
        .footer-social svg {
            width: 18px;
            height: 18px;
            fill: white;
        }
        
        .footer-column h4 {
            color: white;
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column li {
            margin-bottom: 0.75rem;
        }
        
        .footer-column a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-column a:hover {
            color: var(--color-sage);
        }
        
        .footer-bottom {
            max-width: 1200px;
            margin: 3rem auto 0;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .footer-bottom a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            margin-left: 2rem;
        }
        
        .footer-bottom a:hover {
            color: var(--color-sage);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .products-grid { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (max-width: 1024px) {
            .main-content { grid-template-columns: 1fr; padding: 2rem; }
            .sidebar { position: static; display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; }
            .filter-section { margin-bottom: 0; }
            .footer-grid { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (max-width: 768px) {
            .nav-links, .nav-cta { display: none; }
            .mobile-menu-btn { display: flex; }
            .page-header { padding: 7rem 2rem 3rem; }
            .sidebar { grid-template-columns: 1fr; }
            .products-grid { grid-template-columns: 1fr; }
            .sort-bar { flex-direction: column; gap: 1rem; align-items: stretch; }
            .sort-options { justify-content: space-between; }
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
            .footer-bottom { flex-direction: column; gap: 1rem; text-align: center; }
            .footer-bottom a { margin: 0 1rem; }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="nav">
        <a href="/" class="nav-logo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7zm-5 8c2.5.5 4.5 2 5.5 4-.5 1-1.5 2.5-3 3.5-2 1.3-4 1.5-5.5 1 0-3 1-6.5 3-8.5zm10 0c-2.5.5-4.5 2-5.5 4 .5 1 1.5 2.5 3 3.5 2 1.3 4 1.5 5.5 1 0-3-1-6.5-3-8.5zM12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z"/>
            </svg>
            GreenSprout
        </a>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="/products" class="active">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
        <a href="/products" class="nav-cta">Shop Now</a>
        <button class="mobile-menu-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    <!-- Page Header -->
    <header class="page-header">
        <h1>Shop Our Seeds</h1>
        <p>Browse our collection of premium organic and heirloom seeds for your garden</p>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Sidebar Filters -->
        <aside class="sidebar">
            <div class="filter-section">
                <h3 class="filter-title">
                    <svg viewBox="0 0 24 24"><path d="M4 21v-7M4 10V3M12 21v-9M12 8V3M20 21v-5M20 12V3M1 14h6M9 8h6M17 16h6"/></svg>
                    Categories
                </h3>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox" checked>
                        <span>All Seeds</span>
                        <span class="filter-count">124</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Vegetables</span>
                        <span class="filter-count">48</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Flowers</span>
                        <span class="filter-count">35</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Herbs</span>
                        <span class="filter-count">22</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Fruits</span>
                        <span class="filter-count">19</span>
                    </label>
                </div>
            </div>
            
            <div class="filter-section">
                <h3 class="filter-title">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                    Growing Season
                </h3>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Spring</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Summer</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Fall</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Year Round</span>
                    </label>
                </div>
            </div>
            
            <div class="filter-section">
                <h3 class="filter-title">
                    <svg viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    Price Range
                </h3>
                <div class="price-range">
                    <input type="number" class="price-input" placeholder="$0" min="0">
                    <span class="price-separator">—</span>
                    <input type="number" class="price-input" placeholder="$50" min="0">
                </div>
            </div>
            
            <div class="filter-section">
                <h3 class="filter-title">
                    <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
                    Features
                </h3>
                <div class="filter-options">
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Organic Certified</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Heirloom</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Non-GMO</span>
                    </label>
                    <label class="filter-option">
                        <input type="checkbox">
                        <span>Beginner Friendly</span>
                    </label>
                </div>
            </div>
            
            <button class="clear-filters">Clear All Filters</button>
        </aside>

        <!-- Products Area -->
        <div class="products-area">
            <div class="sort-bar">
                <span class="results-count">Showing <strong>1-12</strong> of <strong>124</strong> products</span>
                <div class="sort-options">
                    <span class="sort-label">Sort by:</span>
                    <select class="sort-select">
                        <option>Featured</option>
                        <option>Newest</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Best Selling</option>
                    </select>
                    <div class="view-toggle">
                        <button class="view-btn active">
                            <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                        </button>
                        <button class="view-btn">
                            <svg viewBox="0 0 24 24"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="products-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-image">
                        <span class="product-badge">Bestseller</span>
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Vegetables</p>
                        <h3>Heirloom Tomato Mix</h3>
                        <p>5 heritage varieties including Brandywine, Cherokee Purple & more</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 70-85 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Organic</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$12.99</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #C4785C 0%, #8B7355 100%);">
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Herbs</p>
                        <h3>Culinary Herb Garden</h3>
                        <p>Complete collection: Basil, Thyme, Oregano, Rosemary & Sage</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 30-60 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Non-GMO</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$9.99</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #E8B4BC 0%, #C4785C 100%);">
                        <span class="product-badge new">New</span>
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Flowers</p>
                        <h3>Wildflower Meadow Mix</h3>
                        <p>20+ pollinator-friendly varieties for a stunning natural display</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 60-90 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Heirloom</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$14.99</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #5A7D66 0%, #2D4A3E 100%);">
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Vegetables</p>
                        <h3>Salad Greens Mix</h3>
                        <p>Lettuce, Arugula, Spinach & Microgreens for fresh salads</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 21-45 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Organic</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$8.99</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #FFB347 0%, #C4785C 100%);">
                        <span class="product-badge sale">20% Off</span>
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Vegetables</p>
                        <h3>Rainbow Carrot Mix</h3>
                        <p>Purple, orange, yellow & white heirloom carrot varieties</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 60-80 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Heirloom</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$7.99 <span class="original">$9.99</span></span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #9B59B6 0%, #5A7D66 100%);">
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Vegetables</p>
                        <h3>Purple Haze Collection</h3>
                        <p>Eggplant, Purple Beans, Kohlrabi & Purple Cabbage</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 50-80 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Non-GMO</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$15.99</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #E74C3C 0%, #C4785C 100%);">
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Vegetables</p>
                        <h3>Hot Pepper Variety</h3>
                        <p>Jalapeño, Habanero, Cayenne & Ghost Pepper mix</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 75-100 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Organic</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$11.99</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 8 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #F1C40F 0%, #E67E22 100%);">
                        <span class="product-badge new">New</span>
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Flowers</p>
                        <h3>Sunflower Collection</h3>
                        <p>Giant, Dwarf, Red & Multi-colored sunflower varieties</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 55-75 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Non-GMO</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$10.99</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 9 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #27AE60 0%, #2D4A3E 100%);">
                        <button class="product-wishlist">
                            <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                        <svg viewBox="0 0 24 24"><path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z"/></svg>
                    </div>
                    <div class="product-content">
                        <p class="product-category">Vegetables</p>
                        <h3>Cucumber Variety Pack</h3>
                        <p>Pickling, Slicing & Armenian cucumber seeds</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg> 50-70 days</span>
                            <span><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Organic</span>
                        </div>
                        <div class="product-footer">
                            <span class="product-price">$9.49</span>
                            <button class="product-btn">
                                <svg viewBox="0 0 24 24"><path d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="pagination-btn">
                    <svg viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
                </a>
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn">2</a>
                <a href="#" class="pagination-btn">3</a>
                <a href="#" class="pagination-btn">4</a>
                <a href="#" class="pagination-btn">...</a>
                <a href="#" class="pagination-btn">11</a>
                <a href="#" class="pagination-btn">
                    <svg viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3>
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7zm-5 8c2.5.5 4.5 2 5.5 4-.5 1-1.5 2.5-3 3.5-2 1.3-4 1.5-5.5 1 0-3 1-6.5 3-8.5zm10 0c-2.5.5-4.5 2-5.5 4 .5 1 1.5 2.5 3 3.5 2 1.3 4 1.5 5.5 1 0-3-1-6.5-3-8.5zM12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z"/>
                    </svg>
                    GreenSprout
                </h3>
                <p>Helping gardeners grow beautiful, sustainable gardens since 2010.</p>
                <div class="footer-social">
                    <a href="#"><svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                    <a href="#"><svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg></a>
                    <a href="#"><svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
                </div>
            </div>
            <div class="footer-column">
                <h4>Shop</h4>
                <ul>
                    <li><a href="/products">All Seeds</a></li>
                    <li><a href="/products">Vegetables</a></li>
                    <li><a href="/products">Flowers</a></li>
                    <li><a href="/products">Herbs</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Story</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Growing Guides</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Shipping</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 GreenSprout Seeds. All rights reserved.</p>
            <div>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>
