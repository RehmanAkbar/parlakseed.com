@extends('layouts.app')

@section('title', 'ParlakSeed - Premium Organic Seeds for a Greener Tomorrow')

@section('styles')
    <style>
        /* ============================================
           Hero Section
           ============================================ */
        .hero {
            position: relative;
            min-height: 100vh;
            padding: 140px 0 80px;
            background: linear-gradient(180deg, var(--color-warm-white) 0%, var(--color-cream) 100%);
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .hero-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.6;
        }

        .hero-shape-1 {
            top: -15%;
            right: -8%;
            width: 650px;
            height: 650px;
            background: radial-gradient(circle, rgba(74, 124, 89, 0.12) 0%, transparent 70%);
        }

        .hero-shape-2 {
            bottom: -25%;
            left: -12%;
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(196, 120, 92, 0.1) 0%, transparent 70%);
        }

        .hero-shape-3 {
            top: 35%;
            left: 25%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(139, 111, 71, 0.06) 0%, transparent 70%);
        }

        .hero-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            min-height: calc(100vh - 220px);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(45, 90, 61, 0.1);
            color: var(--color-primary);
            padding: 0.5rem 1.25rem;
            border-radius: var(--radius-full);
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(45, 90, 61, 0.15);
        }

        .hero-badge svg {
            width: 18px;
            height: 18px;
            fill: var(--color-primary);
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 3.75rem);
            font-weight: 800;
            line-height: 1.12;
            margin-bottom: 1.5rem;
            color: var(--color-charcoal);
        }

        .hero-description {
            font-size: 1.15rem;
            color: var(--color-charcoal-light);
            opacity: 0.85;
            max-width: 520px;
            margin-bottom: 2rem;
            line-height: 1.75;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 2.5rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(45, 90, 61, 0.1);
        }

        .stat-item {
            text-align: left;
        }

        .stat-number {
            display: block;
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--color-primary);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--color-charcoal-light);
            opacity: 0.7;
        }

        .stat-divider {
            width: 1px;
            background: rgba(45, 90, 61, 0.15);
            align-self: stretch;
        }

        /* Hero Visual */
        .hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image-container {
            position: relative;
            width: 100%;
            max-width: 500px;
        }

        .hero-circle-main {
            position: relative;
            width: 380px;
            height: 380px;
            margin: 0 auto;
            background: linear-gradient(135deg, var(--color-primary-light) 0%, var(--color-primary) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 6s ease-in-out infinite;
            box-shadow: 0 30px 60px rgba(45, 90, 61, 0.25);
        }

        .hero-circle-accent {
            position: absolute;
            width: 130px;
            height: 130px;
            bottom: 10px;
            right: 5%;
            background: linear-gradient(135deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
            border-radius: 50%;
            animation: float 5s ease-in-out infinite reverse;
            box-shadow: 0 15px 40px rgba(196, 120, 92, 0.3);
        }

        .hero-circle-small {
            position: absolute;
            width: 70px;
            height: 70px;
            top: 20px;
            right: 15%;
            background: linear-gradient(135deg, var(--color-secondary) 0%, #a68a5b 100%);
            border-radius: 50%;
            animation: float 4s ease-in-out infinite;
            box-shadow: 0 10px 30px rgba(139, 111, 71, 0.3);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .plant-svg {
            width: 200px;
            height: 200px;
        }

        .plant-svg .leaf {
            transform-origin: bottom center;
            animation: sway 3s ease-in-out infinite;
        }

        .plant-svg .leaf-1 {
            animation-delay: 0s;
        }

        .plant-svg .leaf-2 {
            animation-delay: 0.5s;
        }

        .plant-svg .leaf-3 {
            animation-delay: 1s;
        }

        @keyframes sway {

            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(3deg);
            }
        }

        /* Floating Cards */
        .floating-card {
            position: absolute;
            background: white;
            padding: 0.85rem 1.35rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 10;
            animation: cardFloat 5s ease-in-out infinite;
        }

        .floating-card svg {
            width: 24px;
            height: 24px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
        }

        .card-1 {
            top: 8%;
            left: -5%;
            animation-delay: 0s;
        }

        .card-2 {
            bottom: 28%;
            left: -10%;
            animation-delay: 1s;
        }

        .card-3 {
            top: 22%;
            right: -5%;
            animation-delay: 2s;
        }

        @keyframes cardFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
        }

        .scroll-indicator a {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--color-primary);
            animation: bounce 2s infinite;
        }

        .scroll-indicator svg {
            width: 28px;
            height: 28px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(10px);
            }

            60% {
                transform: translateY(5px);
            }
        }

        /* ============================================
           Trusted Section
           ============================================ */
        .trusted-section {
            padding: 3rem 0;
            background: var(--color-cream-dark);
            border-top: 1px solid rgba(45, 90, 61, 0.06);
            border-bottom: 1px solid rgba(45, 90, 61, 0.06);
        }

        .trusted-title {
            text-align: center;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--color-charcoal-light);
            opacity: 0.6;
            margin-bottom: 1.5rem;
        }

        .trusted-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 3rem;
        }

        .partner-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
            color: var(--color-charcoal-light);
            opacity: 0.5;
            transition: var(--transition-base);
        }

        .partner-logo:hover {
            opacity: 1;
            color: var(--color-primary);
        }

        .partner-logo svg {
            width: 32px;
            height: 32px;
            stroke: currentColor;
            fill: none;
            stroke-width: 1.5;
        }

        .partner-logo span {
            font-weight: 600;
            font-size: 0.85rem;
        }

        /* ============================================
           Features Section
           ============================================ */
        .features-section {
            background: var(--color-warm-white);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .feature-card {
            background: var(--color-cream);
            padding: 2rem;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(45, 90, 61, 0.06);
            transition: var(--transition-base);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: transparent;
        }

        .feature-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
            transition: var(--transition-base);
        }

        .feature-icon svg {
            width: 28px;
            height: 28px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        .feature-icon.green {
            background: linear-gradient(135deg, #4a7c59 0%, #6b9b7a 100%);
        }

        .feature-icon.gold {
            background: linear-gradient(135deg, #d4a84b 0%, #e6c06a 100%);
        }

        .feature-icon.blue {
            background: linear-gradient(135deg, #5c8dc4 0%, #7ba8d6 100%);
        }

        .feature-icon.purple {
            background: linear-gradient(135deg, #8b6fb0 0%, #a890c4 100%);
        }

        .feature-icon.orange {
            background: linear-gradient(135deg, #c4785c 0%, #d69578 100%);
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .feature-card h3 {
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: var(--color-charcoal-light);
            opacity: 0.8;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .feature-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--color-primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .feature-link:hover {
            gap: 0.75rem;
            color: var(--color-primary-dark);
        }

        .feature-link svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        /* ============================================
           Categories Section
           ============================================ */
        .categories-section {
            background: var(--color-cream);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .category-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 3rem 1.5rem;
            border-radius: var(--radius-lg);
            position: relative;
            overflow: hidden;
            min-height: 220px;
            color: white;
            text-decoration: none;
            transition: var(--transition-base);
        }

        .category-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            transition: var(--transition-base);
        }

        .category-card:hover::before {
            background: rgba(0, 0, 0, 0.45);
        }

        .category-card:hover {
            transform: translateY(-8px);
            color: white;
        }

        .category-vegetables {
            background: linear-gradient(135deg, #4a7c59 0%, #2d5a3d 100%);
        }

        .category-flowers {
            background: linear-gradient(135deg, #c4785c 0%, #a65f43 100%);
        }

        .category-herbs {
            background: linear-gradient(135deg, #8b6f47 0%, #6d5639 100%);
        }

        .category-fruits {
            background: linear-gradient(135deg, #d4a84b 0%, #b8912f 100%);
        }

        .category-icon {
            position: relative;
            z-index: 1;
            margin-bottom: 1rem;
        }

        .category-icon svg {
            width: 48px;
            height: 48px;
            stroke: white;
            fill: none;
            stroke-width: 1.5;
        }

        .category-card h4 {
            position: relative;
            z-index: 1;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
            color: white;
        }

        .category-count {
            position: relative;
            z-index: 1;
            font-size: 0.875rem;
            opacity: 0.85;
        }

        /* ============================================
           Products Section
           ============================================ */
        .products-section {
            background: var(--color-cream-dark);
        }

        .section-header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .section-header-left {
            max-width: 550px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-green {
            background: linear-gradient(135deg, #4a7c59 0%, #2d5a3d 100%);
        }

        .bg-brown {
            background: linear-gradient(135deg, #8b6f47 0%, #6d5639 100%);
        }

        .bg-pink {
            background: linear-gradient(135deg, #d69578 0%, #c4785c 100%);
        }

        .bg-teal {
            background: linear-gradient(135deg, #5a9a8a 0%, #3d7a6a 100%);
        }

        .product-icon svg {
            width: 64px;
            height: 64px;
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

        .badge-bestseller {
            background: var(--color-accent);
        }

        .badge-new {
            background: var(--color-primary);
        }

        .badge-sale {
            background: #c45c5c;
        }

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
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--color-charcoal);
        }

        .product-desc {
            font-size: 0.875rem;
            color: var(--color-charcoal-light);
            opacity: 0.8;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }

        .product-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.75rem;
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
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--color-primary);
        }

        .product-price .original {
            font-size: 0.85rem;
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

        /* ============================================
           About Section
           ============================================ */
        .about-section {
            background: var(--color-warm-white);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-images {
            position: relative;
            padding: 2rem;
        }

        .about-img-main {
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .img-placeholder {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            height: 380px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .img-placeholder svg {
            width: 80px;
            height: 80px;
            stroke: white;
            fill: none;
            stroke-width: 1.5;
            margin-bottom: 1rem;
        }

        .img-placeholder span {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 600;
        }

        .about-img-accent {
            position: absolute;
            bottom: 0;
            right: 0;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .img-placeholder.small {
            width: 130px;
            height: 130px;
            background: linear-gradient(135deg, var(--color-accent) 0%, var(--color-accent-light) 100%);
        }

        .img-placeholder.small svg {
            width: 48px;
            height: 48px;
            margin-bottom: 0;
        }

        .experience-badge {
            position: absolute;
            top: 0;
            right: 2rem;
            background: white;
            padding: 1.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            text-align: center;
        }

        .exp-number {
            display: block;
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--color-primary);
            line-height: 1;
        }

        .exp-text {
            font-size: 0.85rem;
            color: var(--color-charcoal-light);
        }

        .about-content h2 {
            margin-bottom: 1.5rem;
        }

        .about-content p {
            color: var(--color-charcoal-light);
            margin-bottom: 1rem;
            line-height: 1.75;
        }

        .about-features {
            margin-top: 2rem;
        }

        .about-feature {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 0.85rem;
        }

        .about-feature svg {
            width: 22px;
            height: 22px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .about-feature span {
            color: var(--color-charcoal-light);
        }

        /* ============================================
           Testimonials Section
           ============================================ */
        .testimonials-section {
            background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
            position: relative;
            overflow: hidden;
        }

        .testimonials-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .testimonials-section .section-header {
            position: relative;
            z-index: 1;
        }

        .testimonials-section .section-title {
            color: white;
        }

        .testimonials-section .section-description {
            color: rgba(255, 255, 255, 0.7);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            position: relative;
            z-index: 1;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-xl);
            padding: 2rem;
            transition: var(--transition-base);
        }

        .testimonial-card:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: translateY(-5px);
        }

        .testimonial-card.featured {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .testimonial-rating {
            display: flex;
            gap: 0.25rem;
            margin-bottom: 1rem;
            color: #f0c14b;
        }

        .testimonial-rating svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .testimonial-card blockquote {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            font-style: italic;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--color-primary-light) 0%, var(--color-accent) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .author-info h5 {
            color: white;
            font-size: 1rem;
            margin-bottom: 0.2rem;
        }

        .author-info span {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
        }

        /* ============================================
           Newsletter Section
           ============================================ */
        .newsletter-section {
            background: var(--color-cream);
        }

        .newsletter-wrapper {
            background: linear-gradient(135deg, var(--color-primary-light) 0%, var(--color-primary) 100%);
            border-radius: var(--radius-xl);
            padding: 4rem;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .newsletter-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 60%;
            height: 150%;
            background: radial-gradient(ellipse, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        }

        .newsletter-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            position: relative;
        }

        .newsletter-icon svg {
            width: 36px;
            height: 36px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        .newsletter-title {
            color: white;
            font-size: 2rem;
            margin-bottom: 1rem;
            position: relative;
        }

        .newsletter-desc {
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 2rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            gap: 0;
            position: relative;
        }

        .newsletter-form input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: var(--radius-full) 0 0 var(--radius-full);
            font-size: 1rem;
            font-family: var(--font-body);
            outline: none;
        }

        .newsletter-form button {
            padding: 1rem 2rem;
            background: var(--color-charcoal);
            color: white;
            border: none;
            border-radius: 0 var(--radius-full) var(--radius-full) 0;
            font-weight: 600;
            font-family: var(--font-body);
            cursor: pointer;
            transition: var(--transition-base);
            white-space: nowrap;
        }

        .newsletter-form button:hover {
            background: var(--color-primary-dark);
        }

        .newsletter-note {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
            margin-top: 1rem;
            position: relative;
        }

        /* ============================================
           Responsive Styles
           ============================================ */
        @media (max-width: 1199px) {
            .hero-circle-main {
                width: 320px;
                height: 320px;
            }

            .floating-card.card-1 {
                left: 0;
            }

            .floating-card.card-2 {
                left: -5%;
            }

            .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 991px) {
            .hero-inner {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-content {
                order: 1;
            }

            .hero-visual {
                order: 2;
                margin-top: 3rem;
            }

            .hero-description {
                margin: 0 auto 2rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .about-images {
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 767px) {
            .hero {
                padding-top: 100px;
                min-height: auto;
            }

            .hero-inner {
                min-height: auto;
                padding: 2rem 0 4rem;
            }

            .hero-visual {
                display: none;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .section-header-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .newsletter-wrapper {
                padding: 3rem 1.5rem;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-form input {
                border-radius: var(--radius-full);
                margin-bottom: 0.75rem;
            }

            .newsletter-form button {
                border-radius: var(--radius-full);
            }
        }

        @media (max-width: 575px) {
            .hero-buttons {
                flex-direction: column;
            }

            .hero-buttons .btn {
                width: 100%;
                justify-content: center;
            }

            .stat-divider {
                display: none;
            }

            .categories-grid {
                grid-template-columns: 1fr;
            }

            .category-card {
                min-height: 160px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg">
            <div class="hero-shape hero-shape-1"></div>
            <div class="hero-shape hero-shape-2"></div>
            <div class="hero-shape hero-shape-3"></div>
        </div>
        <div class="container">
            <div class="hero-inner">
                <div class="hero-content">
                    <span class="hero-badge">
                        <svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <path d="M22 4L12 14.01l-3-3" />
                        </svg>
                        100% Organic & Non-GMO
                    </span>
                    <h1 class="hero-title">
                        Cultivate Your <span class="text-gradient">Dream Garden</span> With Premium Seeds
                    </h1>
                    <p class="hero-description">
                        Discover our curated collection of heirloom and organic seeds. From vibrant vegetables to stunning
                        flowers, we provide everything you need to grow nature's finest.
                    </p>
                    <div class="hero-buttons">
                        <a href="/products" class="btn btn-primary btn-lg">
                            <svg viewBox="0 0 24 24">
                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                                <line x1="3" y1="6" x2="21" y2="6" />
                                <path d="M16 10a4 4 0 0 1-8 0" />
                            </svg>
                            Explore Collection
                        </a>
                        <a href="#about" class="btn btn-outline btn-lg">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <polygon points="10 8 16 12 10 16 10 8" />
                            </svg>
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
                <div class="hero-visual">
                    <div class="hero-image-container">
                        <div class="floating-card card-1">
                            <svg viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                            <span>Certified Organic</span>
                        </div>
                        <div class="floating-card card-2">
                            <svg viewBox="0 0 24 24">
                                <rect x="1" y="3" width="15" height="13" />
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8" />
                                <circle cx="5.5" cy="18.5" r="2.5" />
                                <circle cx="18.5" cy="18.5" r="2.5" />
                            </svg>
                            <span>Free Shipping</span>
                        </div>
                        <div class="floating-card card-3">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="7" />
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                            </svg>
                            <span>Premium Quality</span>
                        </div>
                        <div class="hero-circle-main">
                            <svg viewBox="0 0 200 200" class="plant-svg">
                                <defs>
                                    <linearGradient id="leafGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#4a7c59" />
                                        <stop offset="100%" style="stop-color:#2d5a3d" />
                                    </linearGradient>
                                </defs>
                                <path d="M100 180 L100 90" stroke="#3d6b4a" stroke-width="6" stroke-linecap="round" />
                                <ellipse cx="100" cy="185" rx="25" ry="10" fill="#8b6f47" />
                                <path d="M100 130 Q55 100 50 50 Q90 70 100 130" fill="url(#leafGradient)"
                                    class="leaf leaf-1" />
                                <path d="M100 110 Q145 80 150 30 Q110 50 100 110" fill="url(#leafGradient)"
                                    class="leaf leaf-2" />
                                <path d="M100 90 Q65 50 75 10 Q100 40 100 90" fill="url(#leafGradient)"
                                    class="leaf leaf-3" />
                            </svg>
                        </div>
                        <div class="hero-circle-accent"></div>
                        <div class="hero-circle-small"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <a href="#features">
                <svg viewBox="0 0 24 24">
                    <path d="M7 13l5 5 5-5M7 6l5 5 5-5" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Trusted Section -->
    <section class="trusted-section">
        <div class="container">
            <p class="trusted-title">Trusted by leading gardening communities</p>
            <div class="trusted-logos">
                <div class="partner-logo">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                    <span>GardenPro</span>
                </div>
                <div class="partner-logo">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 22c4-4 8-7.5 8-12a8 8 0 1 0-16 0c0 4.5 4 8 8 12z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                    <span>EcoFarms</span>
                </div>
                <div class="partner-logo">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="5" />
                        <line x1="12" y1="1" x2="12" y2="3" />
                        <line x1="12" y1="21" x2="12" y2="23" />
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                        <line x1="1" y1="12" x2="3" y2="12" />
                        <line x1="21" y1="12" x2="23" y2="12" />
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                    </svg>
                    <span>SunGrow</span>
                </div>
                <div class="partner-logo">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z" />
                    </svg>
                    <span>AquaGreen</span>
                </div>
                <div class="partner-logo">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                        <path d="M7 10c2.5.5 4.5 2 5.5 4-.5 1-1.5 2.5-3 3.5-2 1.3-4 1.5-5.5 1 0-3 1-6.5 3-8.5z" />
                        <path d="M17 10c-2.5.5-4.5 2-5.5 4 .5 1 1.5 2.5 3 3.5 2 1.3 4 1.5 5.5 1 0-3-1-6.5-3-8.5z" />
                    </svg>
                    <span>BloomBox</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section section-lg" id="features">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Why Choose Us</span>
                <h2 class="section-title">Seeds That Make a <span class="text-gradient">Difference</span></h2>
                <p class="section-description">
                    We're committed to providing the highest quality organic seeds for gardeners who care about nature and
                    sustainability.
                </p>
            </div>
            <div class="features-grid">
                @include('partials.feature-card', ['icon' => 'shield', 'color' => '', 'title' => '100% Organic', 'description' => 'All our seeds are certified organic, non-GMO, and harvested from sustainable farms worldwide.'])
                @include('partials.feature-card', ['icon' => 'check', 'color' => 'green', 'title' => '98% Germination', 'description' => 'Our rigorous quality testing ensures industry-leading germination rates for successful growing.'])
                @include('partials.feature-card', ['icon' => 'dollar', 'color' => 'gold', 'title' => 'Best Value', 'description' => 'Premium quality seeds at competitive prices with free shipping on all orders over $50.'])
                @include('partials.feature-card', ['icon' => 'truck', 'color' => 'blue', 'title' => 'Fast Shipping', 'description' => 'Orders ship within 24 hours so you can start planting as soon as possible.'])
                @include('partials.feature-card', ['icon' => 'chat', 'color' => 'purple', 'title' => 'Expert Support', 'description' => 'Our gardening experts are available 24/7 to help you succeed with tips and advice.'])
                @include('partials.feature-card', ['icon' => 'book', 'color' => 'orange', 'title' => 'Growing Guides', 'description' => 'Every order includes detailed growing instructions and seasonal planting calendars.'])
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section section-lg">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Browse Collection</span>
                <h2 class="section-title">Shop by <span class="text-gradient">Category</span></h2>
                <p class="section-description">
                    Explore our diverse range of premium seeds organized by type for easy browsing.
                </p>
            </div>
            <div class="categories-grid">
                <a href="/products" class="category-card category-vegetables">
                    <div class="category-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M17 8c-.5-2.5-3-4.5-6-4.5S5.5 5.5 5 8c-3 0-5 2-5 4.5S2 17 5 17h14c3 0 5-2 5-4.5S20 8 17 8z" />
                        </svg>
                    </div>
                    <h4>Vegetables</h4>
                    <span class="category-count">48 Products</span>
                </a>
                <a href="/products" class="category-card category-flowers">
                    <div class="category-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                            <path d="M12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z" />
                        </svg>
                    </div>
                    <h4>Flowers</h4>
                    <span class="category-count">35 Products</span>
                </a>
                <a href="/products" class="category-card category-herbs">
                    <div class="category-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M6.13 1L6 16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2L17.87 1M12 1v21M9 21h6" />
                        </svg>
                    </div>
                    <h4>Herbs</h4>
                    <span class="category-count">22 Products</span>
                </a>
                <a href="/products" class="category-card category-fruits">
                    <div class="category-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="14" r="8" />
                            <path d="M12 6V2M12 6c-2 0-3 1-3 3" />
                        </svg>
                    </div>
                    <h4>Fruits</h4>
                    <span class="category-count">19 Products</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section section-lg" id="products">
        <div class="container">
            <div class="section-header-row">
                <div class="section-header-left">
                    <span class="section-badge">Featured Products</span>
                    <h2 class="section-title">Bestselling <span class="text-gradient">Seeds</span></h2>
                    <p class="section-description">Our most loved seeds, chosen by thousands of happy gardeners.</p>
                </div>
                <a href="/products" class="btn btn-outline">
                    View All Products
                    <svg viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <div class="products-grid">
                @include('partials.product-card', ['badge' => 'bestseller', 'color' => 'green', 'category' => 'Vegetables', 'title' => 'Heirloom Tomato Mix', 'description' => '5 heritage varieties including Brandywine & Cherokee Purple', 'days' => '70-85', 'cert' => 'Organic', 'price' => '12.99'])
                @include('partials.product-card', ['badge' => '', 'color' => 'brown', 'category' => 'Herbs', 'title' => 'Culinary Herb Garden', 'description' => 'Complete kit: Basil, Thyme, Oregano, Rosemary & Sage', 'days' => '30-60', 'cert' => 'Non-GMO', 'price' => '9.99'])
                @include('partials.product-card', ['badge' => 'new', 'color' => 'pink', 'category' => 'Flowers', 'title' => 'Wildflower Meadow Mix', 'description' => '20+ pollinator-friendly varieties for stunning displays', 'days' => '60-90', 'cert' => 'Heirloom', 'price' => '14.99'])
                @include('partials.product-card', ['badge' => 'sale', 'color' => 'teal', 'category' => 'Vegetables', 'title' => 'Salad Greens Mix', 'description' => 'Lettuce, Arugula, Spinach & Microgreens blend', 'days' => '21-45', 'cert' => 'Organic', 'price' => '8.99', 'original_price' => '11.99'])
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section section-lg" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-images">
                    <div class="about-img-main">
                        <div class="img-placeholder">
                            <svg viewBox="0 0 24 24">
                                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                                <path d="M7 10c2.5.5 4.5 2 5.5 4-.5 1-1.5 2.5-3 3.5-2 1.3-4 1.5-5.5 1 0-3 1-6.5 3-8.5z" />
                                <path d="M17 10c-2.5.5-4.5 2-5.5 4 .5 1 1.5 2.5 3 3.5 2 1.3 4 1.5 5.5 1 0-3-1-6.5-3-8.5z" />
                            </svg>
                            <span>Growing Since 2010</span>
                        </div>
                    </div>
                    <div class="about-img-accent">
                        <div class="img-placeholder small">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                            </svg>
                        </div>
                    </div>
                    <div class="experience-badge">
                        <span class="exp-number">15+</span>
                        <span class="exp-text">Years of<br>Excellence</span>
                    </div>
                </div>
                <div class="about-content">
                    <span class="section-badge">Our Story</span>
                    <h2 class="section-title">Growing Together for a <span class="text-gradient">Greener Tomorrow</span>
                    </h2>
                    <p>
                        Founded in 2010, ParlakSeed began with a simple mission: to provide gardeners with the highest
                        quality organic seeds while protecting our planet. What started as a small family farm has grown
                        into a trusted name in sustainable gardening.
                    </p>
                    <p>
                        We work directly with certified organic farms worldwide to source seeds that are not only non-GMO
                        but also contribute to biodiversity and sustainable agriculture practices.
                    </p>
                    <div class="about-features">
                        <div class="about-feature">
                            <svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg>
                            <span>Family-owned business with passion for gardening</span>
                        </div>
                        <div class="about-feature">
                            <svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg>
                            <span>Direct partnerships with organic farms globally</span>
                        </div>
                        <div class="about-feature">
                            <svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg>
                            <span>Committed to sustainability and eco-friendly packaging</span>
                        </div>
                        <div class="about-feature">
                            <svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg>
                            <span>Expert gardening support and growing guides</span>
                        </div>
                    </div>
                    <a href="/contact" class="btn btn-primary btn-lg mt-4">
                        <svg viewBox="0 0 24 24">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg>
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section section-lg" id="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-badge badge-light">Testimonials</span>
                <h2 class="section-title">What Our <span class="text-gradient-light">Gardeners</span> Say</h2>
                <p class="section-description">
                    Join thousands of satisfied customers growing beautiful gardens with ParlakSeed.
                </p>
            </div>
            <div class="testimonials-grid">
                @include('partials.testimonial-card', ['initials' => 'SJ', 'name' => 'Sarah Johnson', 'location' => 'Home Gardener, Vermont', 'quote' => 'The germination rate was incredible! Every single seed sprouted. My garden has never looked better. I\'m amazed by the quality.'])
                @include('partials.testimonial-card', ['initials' => 'MC', 'name' => 'Michael Chen', 'location' => 'Organic Farmer, Oregon', 'quote' => 'As a professional farmer, seed quality matters. ParlakSeed delivers consistently excellent organic seeds. Best supplier I\'ve worked with!', 'featured' => true])
                @include('partials.testimonial-card', ['initials' => 'ER', 'name' => 'Emily Rodriguez', 'location' => 'Garden Enthusiast, Texas', 'quote' => 'The wildflower mix brought so many butterflies and bees to my yard! Beautiful blooms all summer. Customer service was fantastic.'])
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section section-lg">
        <div class="container">
            <div class="newsletter-wrapper">
                <div class="newsletter-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                </div>
                <h2 class="newsletter-title">Join Our Growing Community</h2>
                <p class="newsletter-desc">
                    Subscribe to get exclusive deals, seasonal planting guides, and expert gardening tips delivered straight
                    to your inbox.
                </p>
                <form class="newsletter-form" onsubmit="return false;">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit">Subscribe →</button>
                </form>
                <p class="newsletter-note">
                    <svg viewBox="0 0 24 24"
                        style="width: 16px; height: 16px; stroke: rgba(255,255,255,0.6); fill: none; stroke-width: 2; vertical-align: middle; margin-right: 4px;">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                    We respect your privacy. Unsubscribe at any time.
                </p>
            </div>
        </div>
    </section>
@endsection