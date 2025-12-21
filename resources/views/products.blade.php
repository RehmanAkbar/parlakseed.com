@extends('layouts.app')

@section('title', 'Shop Seeds - ParlakSeed')
@section('meta_description', 'Browse our collection of premium organic and heirloom seeds. From vegetables to flowers, find the perfect seeds for your garden.')

@section('styles')
    <style>
        /* ============================================
           Products Page Styles
           ============================================ */
        .products-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2.5rem;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
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

        .filter-option label {
            cursor: pointer;
            font-size: 0.95rem;
            flex: 1;
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
        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .product-card {
            background: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 1px solid rgba(45, 90, 61, 0.06);
            transition: var(--transition-base);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .product-image {
            position: relative;
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-green { background: linear-gradient(135deg, #4a7c59 0%, #2d5a3d 100%); }
        .bg-brown { background: linear-gradient(135deg, #8b6f47 0%, #6d5639 100%); }
        .bg-pink { background: linear-gradient(135deg, #d69578 0%, #c4785c 100%); }
        .bg-teal { background: linear-gradient(135deg, #5a9a8a 0%, #3d7a6a 100%); }
        .bg-orange { background: linear-gradient(135deg, #e6a84b 0%, #c4785c 100%); }
        .bg-purple { background: linear-gradient(135deg, #8b6fb0 0%, #5a7d66 100%); }
        .bg-red { background: linear-gradient(135deg, #c45c5c 0%, #c4785c 100%); }
        .bg-yellow { background: linear-gradient(135deg, #d4a84b 0%, #e67e22 100%); }

        .product-icon svg {
            width: 80px;
            height: 80px;
            stroke: rgba(255, 255, 255, 0.9);
            fill: none;
            stroke-width: 1.5;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.35rem 0.85rem;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
        }

        .badge-bestseller { background: var(--color-accent); }
        .badge-new { background: var(--color-primary); }
        .badge-sale { background: #c45c5c; }

        .wishlist-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-base);
        }

        .wishlist-btn:hover {
            background: white;
            transform: scale(1.1);
        }

        .wishlist-btn svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-charcoal);
            fill: none;
            stroke-width: 2;
        }

        .wishlist-btn:hover svg {
            stroke: #c45c5c;
        }

        .product-content {
            padding: 1.5rem;
        }

        .product-category {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }

        .product-title {
            font-size: 1.15rem;
            margin-bottom: 0.5rem;
            color: var(--color-charcoal);
        }

        .product-desc {
            font-size: 0.9rem;
            color: var(--color-charcoal-light);
            opacity: 0.8;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }

        .product-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.8rem;
            color: var(--color-charcoal-light);
            margin-bottom: 1rem;
        }

        .product-meta span {
            display: flex;
            align-items: center;
            gap: 0.35rem;
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
            padding-top: 1rem;
            border-top: 1px solid rgba(45, 90, 61, 0.08);
        }

        .product-price {
            font-family: var(--font-display);
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--color-primary);
        }

        .product-price .original {
            font-size: 0.9rem;
            color: var(--color-charcoal-light);
            opacity: 0.6;
            text-decoration: line-through;
            margin-left: 0.5rem;
            font-weight: 400;
        }

        .btn-cart {
            width: 44px;
            height: 44px;
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-base);
        }

        .btn-cart:hover {
            background: var(--color-primary-dark);
            transform: scale(1.1);
        }

        .btn-cart svg {
            width: 20px;
            height: 20px;
            stroke: white;
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
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 991px) {
            .products-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .filter-section {
                margin-bottom: 0;
            }
        }

        @media (max-width: 767px) {
            .sidebar {
                grid-template-columns: 1fr;
            }

            .products-grid {
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
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                <span>Products</span>
            </nav>
            <h1>Shop Our <span class="text-gradient">Seeds</span></h1>
            <p>Browse our collection of premium organic and heirloom seeds for your garden</p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="section-lg">
        <div class="container">
            <div class="products-layout">
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
                            <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
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
                        @include('partials.products.product-item', ['badge' => 'bestseller', 'color' => 'green', 'category' => 'Vegetables', 'title' => 'Heirloom Tomato Mix', 'description' => '5 heritage varieties including Brandywine, Cherokee Purple & more', 'days' => '70-85', 'cert' => 'Organic', 'price' => '12.99'])

                        @include('partials.products.product-item', ['badge' => '', 'color' => 'brown', 'category' => 'Herbs', 'title' => 'Culinary Herb Garden', 'description' => 'Complete collection: Basil, Thyme, Oregano, Rosemary & Sage', 'days' => '30-60', 'cert' => 'Non-GMO', 'price' => '9.99'])

                        @include('partials.products.product-item', ['badge' => 'new', 'color' => 'pink', 'category' => 'Flowers', 'title' => 'Wildflower Meadow Mix', 'description' => '20+ pollinator-friendly varieties for a stunning natural display', 'days' => '60-90', 'cert' => 'Heirloom', 'price' => '14.99'])

                        @include('partials.products.product-item', ['badge' => '', 'color' => 'teal', 'category' => 'Vegetables', 'title' => 'Salad Greens Mix', 'description' => 'Lettuce, Arugula, Spinach & Microgreens for fresh salads', 'days' => '21-45', 'cert' => 'Organic', 'price' => '8.99'])

                        @include('partials.products.product-item', ['badge' => 'sale', 'color' => 'orange', 'category' => 'Vegetables', 'title' => 'Rainbow Carrot Mix', 'description' => 'Purple, orange, yellow & white heirloom carrot varieties', 'days' => '60-80', 'cert' => 'Heirloom', 'price' => '7.99', 'original_price' => '9.99'])

                        @include('partials.products.product-item', ['badge' => '', 'color' => 'purple', 'category' => 'Vegetables', 'title' => 'Purple Haze Collection', 'description' => 'Eggplant, Purple Beans, Kohlrabi & Purple Cabbage', 'days' => '50-80', 'cert' => 'Non-GMO', 'price' => '15.99'])

                        @include('partials.products.product-item', ['badge' => '', 'color' => 'red', 'category' => 'Vegetables', 'title' => 'Hot Pepper Variety', 'description' => 'Jalapeño, Habanero, Cayenne & Ghost Pepper mix', 'days' => '75-100', 'cert' => 'Organic', 'price' => '11.99'])

                        @include('partials.products.product-item', ['badge' => 'new', 'color' => 'yellow', 'category' => 'Flowers', 'title' => 'Sunflower Collection', 'description' => 'Giant, Dwarf, Red & Multi-colored sunflower varieties', 'days' => '55-75', 'cert' => 'Non-GMO', 'price' => '10.99'])

                        @include('partials.products.product-item', ['badge' => '', 'color' => 'green', 'category' => 'Vegetables', 'title' => 'Cucumber Variety Pack', 'description' => 'Pickling, Slicing & Armenian cucumber seeds', 'days' => '50-70', 'cert' => 'Organic', 'price' => '9.49'])
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
            </div>
        </div>
    </section>
@endsection
