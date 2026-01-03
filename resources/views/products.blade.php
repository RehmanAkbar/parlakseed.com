@extends('layouts.app')

@section('title', 'Shop Seeds - ParlakSeed')
@section('meta_description', 'Browse our collection of premium organic and heirloom seeds. From vegetables to flowers, find the perfect seeds for your garden.')

@section('styles')
    <style>
        /* ============================================
               PRODUCTS PAGE STYLES - Self Contained
               ============================================ */

        .shop-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2.5rem;
        }

        /* Sidebar */
        .shop-sidebar {
            position: sticky;
            top: calc(var(--header-height) + 20px);
            height: fit-content;
        }

        .filter-section {
            background: white;
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(45, 90, 61, 0.08);
        }

        .filter-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--color-charcoal);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-title svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-primary);
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
            transition: color var(--transition-base);
        }

        .filter-option:hover {
            color: var(--color-primary);
        }

        .filter-option input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--color-primary);
            cursor: pointer;
        }

        .filter-option span {
            flex: 1;
            font-size: 0.95rem;
        }

        .filter-count {
            font-size: 0.8rem;
            color: var(--color-charcoal-light);
            opacity: 0.6;
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
            border: 1px solid rgba(45, 90, 61, 0.2);
            border-radius: var(--radius-sm);
            font-family: var(--font-body);
            font-size: 0.9rem;
            text-align: center;
            outline: none;
            transition: border-color var(--transition-base);
        }

        .price-input:focus {
            border-color: var(--color-primary);
        }

        .price-separator {
            color: var(--color-charcoal-light);
            opacity: 0.5;
        }

        /* Clear Filters */
        .clear-filters {
            width: 100%;
            padding: 0.75rem;
            background: transparent;
            border: 1px solid var(--color-primary);
            border-radius: var(--radius-sm);
            color: var(--color-primary);
            font-family: var(--font-body);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-base);
        }

        .clear-filters:hover {
            background: var(--color-primary);
            color: white;
        }

        /* Sort Bar */
        .sort-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1rem 1.5rem;
            background: white;
            border-radius: var(--radius-md);
            border: 1px solid rgba(45, 90, 61, 0.08);
        }

        .results-count {
            font-size: 0.95rem;
            color: var(--color-charcoal-light);
        }

        .results-count strong {
            color: var(--color-charcoal);
        }

        .sort-options {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sort-label {
            font-size: 0.9rem;
            color: var(--color-charcoal-light);
        }

        .sort-select {
            padding: 0.5rem 2.5rem 0.5rem 1rem;
            border: 1px solid rgba(45, 90, 61, 0.2);
            border-radius: var(--radius-sm);
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
            border: 1px solid rgba(45, 90, 61, 0.2);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition-base);
        }

        .view-btn.active {
            background: var(--color-primary);
            border-color: var(--color-primary);
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
        .shop-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        /* Product Card - Full with Price */
        .shop-product-card {
            background: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 1px solid rgba(45, 90, 61, 0.06);
            transition: all 0.4s ease;
        }

        .shop-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(45, 90, 61, 0.15);
        }

        .shop-product-image {
            position: relative;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .shop-product-image.bg-green {
            background: linear-gradient(145deg, #5a8f69 0%, #2d5a3d 100%);
        }

        .shop-product-image.bg-brown {
            background: linear-gradient(145deg, #a68a5b 0%, #6d5639 100%);
        }

        .shop-product-image.bg-pink {
            background: linear-gradient(145deg, #e6a898 0%, #c4785c 100%);
        }

        .shop-product-image.bg-teal {
            background: linear-gradient(145deg, #6aaa9a 0%, #3d7a6a 100%);
        }

        .shop-product-image.bg-orange {
            background: linear-gradient(145deg, #e6a84b 0%, #c4785c 100%);
        }

        .shop-product-image.bg-purple {
            background: linear-gradient(145deg, #9b7fc4 0%, #6a5a8e 100%);
        }

        .shop-product-image.bg-red {
            background: linear-gradient(145deg, #d66a6a 0%, #b54545 100%);
        }

        .shop-product-image.bg-yellow {
            background: linear-gradient(145deg, #e6c06a 0%, #d4a84b 100%);
        }

        .shop-product-icon {
            transition: transform 0.4s ease;
        }

        .shop-product-card:hover .shop-product-icon {
            transform: scale(1.1);
        }

        .shop-product-icon svg {
            width: 70px;
            height: 70px;
            stroke: rgba(255, 255, 255, 0.95);
            fill: none;
            stroke-width: 1.5;
        }

        .shop-product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.4rem 0.9rem;
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .shop-badge-bestseller {
            background: var(--color-accent);
        }

        .shop-badge-new {
            background: var(--color-primary);
        }

        .shop-badge-sale {
            background: #e74c3c;
        }

        .shop-wishlist-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .shop-wishlist-btn:hover {
            background: white;
            transform: scale(1.1);
        }

        .shop-wishlist-btn svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-charcoal);
            fill: none;
            stroke-width: 2;
            transition: all 0.3s ease;
        }

        .shop-wishlist-btn:hover svg {
            stroke: #e74c3c;
        }

        .shop-product-content {
            padding: 1.5rem;
        }

        .shop-product-category {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }

        .shop-product-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--color-charcoal);
            transition: color 0.3s ease;
        }

        .shop-product-card:hover .shop-product-title {
            color: var(--color-primary);
        }

        .shop-product-desc {
            font-size: 0.875rem;
            color: var(--color-charcoal-light);
            line-height: 1.5;
            margin-bottom: 0.85rem;
        }

        .shop-product-meta {
            display: flex;
            gap: 0.75rem;
            font-size: 0.75rem;
            color: var(--color-charcoal-light);
            margin-bottom: 1rem;
        }

        .shop-product-meta span {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            background: var(--color-cream);
            padding: 0.25rem 0.55rem;
            border-radius: var(--radius-sm);
        }

        .shop-product-meta svg {
            width: 13px;
            height: 13px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
        }

        .shop-product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(45, 90, 61, 0.08);
        }

        .shop-product-price {
            font-family: var(--font-display);
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--color-primary);
        }

        .shop-product-price .original {
            font-size: 0.85rem;
            color: var(--color-charcoal-light);
            text-decoration: line-through;
            margin-left: 0.5rem;
            font-weight: 400;
        }

        .shop-cart-btn {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(45, 90, 61, 0.2);
        }

        .shop-cart-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(45, 90, 61, 0.3);
        }

        .shop-cart-btn svg {
            width: 20px;
            height: 20px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        /* Pagination */
        .shop-pagination {
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
            background: white;
            border: 1px solid rgba(45, 90, 61, 0.15);
            border-radius: var(--radius-sm);
            font-family: var(--font-body);
            font-weight: 500;
            color: var(--color-charcoal);
            cursor: pointer;
            transition: var(--transition-base);
            text-decoration: none;
        }

        .pagination-btn:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
        }

        .pagination-btn.active {
            background: var(--color-primary);
            border-color: var(--color-primary);
            color: white;
        }

        .pagination-btn svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        /* Responsive */
        @media (max-width: 1199px) {
            .shop-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 991px) {
            .shop-layout {
                grid-template-columns: 1fr;
            }

            .shop-sidebar {
                position: static;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .filter-section {
                margin-bottom: 0;
            }

            .filter-section:last-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 767px) {
            .shop-sidebar {
                grid-template-columns: 1fr;
            }

            .shop-grid {
                grid-template-columns: 1fr;
            }

            .sort-bar {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .sort-options {
                justify-content: space-between;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <nav class="breadcrumb">
                <a href="/">Home</a>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 18l6-6-6-6" />
                </svg>
                <span>Products</span>
            </nav>
            <h1>Shop Our <span class="text-gradient">Seeds</span></h1>
            <p>Browse our collection of premium organic and heirloom seeds for your garden</p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="section-lg">
        <div class="container">
            <div class="shop-layout">
                <!-- Sidebar Filters -->
                <aside class="shop-sidebar">
                    <div class="filter-section">
                        <h3 class="filter-title">
                            <svg viewBox="0 0 24 24">
                                <path d="M4 21v-7M4 10V3M12 21v-9M12 8V3M20 21v-5M20 12V3M1 14h6M9 8h6M17 16h6" />
                            </svg>
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
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 6v6l4 2" />
                            </svg>
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
                            <svg viewBox="0 0 24 24">
                                <line x1="12" y1="1" x2="12" y2="23" />
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                            </svg>
                            Price Range
                        </h3>
                        <div class="price-range">
                            <input type="number" class="price-input" placeholder="$0" min="0">
                            <span class="price-separator">–</span>
                            <input type="number" class="price-input" placeholder="$50" min="0">
                        </div>
                    </div>

                    <div class="filter-section">
                        <h3 class="filter-title">
                            <svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg>
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
                <div class="shop-products-area">
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
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="7" height="7" />
                                        <rect x="14" y="3" width="7" height="7" />
                                        <rect x="3" y="14" width="7" height="7" />
                                        <rect x="14" y="14" width="7" height="7" />
                                    </svg>
                                </button>
                                <button class="view-btn">
                                    <svg viewBox="0 0 24 24">
                                        <line x1="3" y1="6" x2="21" y2="6" />
                                        <line x1="3" y1="12" x2="21" y2="12" />
                                        <line x1="3" y1="18" x2="21" y2="18" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="shop-grid">
                        <!-- Product 1 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-green">
                                <span class="shop-product-badge shop-badge-bestseller">Bestseller</span>
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Vegetables</span>
                                <h4 class="shop-product-title">Heirloom Tomato Mix</h4>
                                <p class="shop-product-desc">5 heritage varieties including Brandywine, Cherokee Purple &
                                    more</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>70-85 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Organic</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$12.99</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-brown">
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Herbs</span>
                                <h4 class="shop-product-title">Culinary Herb Garden</h4>
                                <p class="shop-product-desc">Complete collection: Basil, Thyme, Oregano, Rosemary & Sage</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>30-60 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Non-GMO</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$9.99</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-pink">
                                <span class="shop-product-badge shop-badge-new">New</span>
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Flowers</span>
                                <h4 class="shop-product-title">Wildflower Meadow Mix</h4>
                                <p class="shop-product-desc">20+ pollinator-friendly varieties for a stunning natural
                                    display</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>60-90 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Heirloom</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$14.99</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 4 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-teal">
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Vegetables</span>
                                <h4 class="shop-product-title">Salad Greens Mix</h4>
                                <p class="shop-product-desc">Lettuce, Arugula, Spinach & Microgreens for fresh salads</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>21-45 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Organic</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$8.99</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 5 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-orange">
                                <span class="shop-product-badge shop-badge-sale">20% Off</span>
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Vegetables</span>
                                <h4 class="shop-product-title">Rainbow Carrot Mix</h4>
                                <p class="shop-product-desc">Purple, orange, yellow & white heirloom carrot varieties</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>60-80 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Heirloom</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$7.99 <span class="original">$9.99</span></span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 6 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-purple">
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Vegetables</span>
                                <h4 class="shop-product-title">Purple Haze Collection</h4>
                                <p class="shop-product-desc">Eggplant, Purple Beans, Kohlrabi & Purple Cabbage</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>50-80 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Non-GMO</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$15.99</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 7 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-red">
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Vegetables</span>
                                <h4 class="shop-product-title">Hot Pepper Variety</h4>
                                <p class="shop-product-desc">Jalapeño, Habanero, Cayenne & Ghost Pepper mix</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>75-100 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Organic</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$11.99</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 8 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-yellow">
                                <span class="shop-product-badge shop-badge-new">New</span>
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Flowers</span>
                                <h4 class="shop-product-title">Sunflower Collection</h4>
                                <p class="shop-product-desc">Giant, Dwarf, Red & Multi-colored sunflower varieties</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>55-75 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Non-GMO</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$10.99</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product 9 -->
                        <div class="shop-product-card">
                            <div class="shop-product-image bg-green">
                                <button class="shop-wishlist-btn" aria-label="Add to wishlist"><svg viewBox="0 0 24 24">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                    </svg></button>
                                <div class="shop-product-icon"><svg viewBox="0 0 24 24">
                                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                    </svg></div>
                            </div>
                            <div class="shop-product-content">
                                <span class="shop-product-category">Vegetables</span>
                                <h4 class="shop-product-title">Cucumber Variety Pack</h4>
                                <p class="shop-product-desc">Pickling, Slicing & Armenian cucumber seeds</p>
                                <div class="shop-product-meta">
                                    <span><svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 6v6l4 2" />
                                        </svg>50-70 days</span>
                                    <span><svg viewBox="0 0 24 24">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                            <path d="M22 4L12 14.01l-3-3" />
                                        </svg>Organic</span>
                                </div>
                                <div class="shop-product-footer">
                                    <span class="shop-product-price">$9.49</span>
                                    <button class="shop-cart-btn" aria-label="Add to cart"><svg viewBox="0 0 24 24">
                                            <path
                                                d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="shop-pagination">
                        <a href="#" class="pagination-btn"><svg viewBox="0 0 24 24">
                                <path d="M15 18l-6-6 6-6" />
                            </svg></a>
                        <a href="#" class="pagination-btn active">1</a>
                        <a href="#" class="pagination-btn">2</a>
                        <a href="#" class="pagination-btn">3</a>
                        <a href="#" class="pagination-btn">4</a>
                        <a href="#" class="pagination-btn">...</a>
                        <a href="#" class="pagination-btn">11</a>
                        <a href="#" class="pagination-btn"><svg viewBox="0 0 24 24">
                                <path d="M9 18l6-6-6-6" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection