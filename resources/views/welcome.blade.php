@extends('layouts.app')

@section('title', 'ParlakSeed - Premium Organic Seeds for a Greener Tomorrow')

@section('styles')
    <style>
        /* ============================================
               HOME PAGE STYLES - Properly Scoped
               ============================================ */

        /* Hero Section */
        .home-hero {
            position: relative;
            min-height: calc(100vh - var(--header-height) - var(--header-height));
            padding: 5rem 0 6rem;
            background: linear-gradient(165deg, var(--color-warm-white) 0%, var(--color-cream) 60%, rgba(74, 124, 89, 0.08) 100%);
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .home-hero .hero-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .home-hero .hero-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
        }

        .home-hero .hero-shape-1 {
            top: -20%;
            right: -10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(74, 124, 89, 0.15) 0%, transparent 60%);
            animation: morphShape 15s ease-in-out infinite;
        }

        .home-hero .hero-shape-2 {
            bottom: -30%;
            left: -15%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(196, 120, 92, 0.12) 0%, transparent 60%);
            animation: morphShape 12s ease-in-out infinite reverse;
        }

        .home-hero .hero-shape-3 {
            top: 40%;
            left: 20%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(212, 168, 75, 0.08) 0%, transparent 60%);
        }

        @keyframes morphShape {

            0%,
            100% {
                transform: scale(1) translate(0, 0);
            }

            50% {
                transform: scale(1.05) translate(5px, -5px);
            }
        }

        .home-hero .hero-inner {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .home-hero .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: linear-gradient(135deg, rgba(45, 90, 61, 0.12) 0%, rgba(74, 124, 89, 0.08) 100%);
            color: var(--color-primary);
            padding: 0.6rem 1.4rem;
            border-radius: var(--radius-full);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.75rem;
            border: 1px solid rgba(45, 90, 61, 0.18);
        }

        .home-hero .hero-badge svg {
            width: 18px;
            height: 18px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
        }

        .home-hero .hero-title {
            font-size: clamp(2.75rem, 5.5vw, 4rem);
            font-weight: 800;
            line-height: 1.08;
            margin-bottom: 1.5rem;
            color: var(--color-charcoal);
        }

        .home-hero .hero-title .highlight {
            position: relative;
            display: inline-block;
        }

        .home-hero .hero-title .highlight::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            right: 0;
            height: 12px;
            background: linear-gradient(135deg, rgba(196, 120, 92, 0.35) 0%, rgba(212, 168, 75, 0.25) 100%);
            z-index: -1;
            border-radius: 4px;
        }

        .home-hero .hero-description {
            font-size: 1.2rem;
            color: var(--color-charcoal-light);
            max-width: 540px;
            margin-bottom: 2.25rem;
            line-height: 1.8;
        }

        .home-hero .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
            margin-bottom: 3rem;
        }

        .home-hero .hero-buttons .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
        }

        .home-hero .hero-buttons .btn-primary {
            box-shadow: 0 8px 30px rgba(45, 90, 61, 0.3);
        }

        .home-hero .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 3rem;
            padding-top: 2.5rem;
            border-top: 1px solid rgba(45, 90, 61, 0.12);
        }

        .home-hero .stat-number {
            display: flex;
            align-items: baseline;
            gap: 0.2rem;
            font-family: var(--font-display);
            font-size: 2.75rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        .home-hero .stat-number .suffix {
            font-size: 1.5rem;
        }

        .home-hero .stat-label {
            font-size: 0.9rem;
            color: var(--color-charcoal-light);
            margin-top: 0.35rem;
        }

        .home-hero .stat-divider {
            width: 1px;
            background: linear-gradient(180deg, transparent 0%, rgba(45, 90, 61, 0.2) 50%, transparent 100%);
            align-self: stretch;
        }

        /* Hero Visual */
        .home-hero .hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .home-hero .hero-image-container {
            position: relative;
            width: 100%;
            max-width: 520px;
        }

        .home-hero .hero-circle-main {
            position: relative;
            width: 360px;
            height: 360px;
            margin: 0 auto;
            background: linear-gradient(145deg, var(--color-primary-light) 0%, var(--color-primary) 50%, var(--color-primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 6s ease-in-out infinite;
            box-shadow: 0 40px 80px rgba(45, 90, 61, 0.25);
        }

        .home-hero .hero-circle-ring {
            position: absolute;
            width: 440px;
            height: 440px;
            border: 2px dashed rgba(45, 90, 61, 0.15);
            border-radius: 50%;
            animation: spin 30s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .home-hero .hero-circle-accent {
            position: absolute;
            width: 110px;
            height: 110px;
            bottom: 30px;
            right: 12%;
            background: linear-gradient(145deg, var(--color-accent-light) 0%, var(--color-accent) 100%);
            border-radius: 50%;
            animation: float 5s ease-in-out infinite reverse;
            box-shadow: 0 20px 50px rgba(196, 120, 92, 0.35);
        }

        .home-hero .hero-circle-small {
            position: absolute;
            width: 65px;
            height: 65px;
            top: 30px;
            right: 18%;
            background: linear-gradient(145deg, #a68a5b 0%, var(--color-secondary) 100%);
            border-radius: 50%;
            animation: float 4s ease-in-out infinite;
            box-shadow: 0 15px 40px rgba(139, 111, 71, 0.35);
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

        .home-hero .plant-svg {
            width: 170px;
            height: 170px;
        }

        .home-hero .plant-svg .leaf {
            transform-origin: bottom center;
            animation: sway 3s ease-in-out infinite;
        }

        @keyframes sway {

            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(4deg);
            }
        }

        /* Floating Cards */
        .home-hero .floating-card {
            position: absolute;
            background: white;
            padding: 0.85rem 1.2rem;
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 40px rgba(45, 90, 61, 0.12);
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-weight: 600;
            font-size: 0.85rem;
            z-index: 10;
            border: 1px solid rgba(45, 90, 61, 0.06);
        }

        .home-hero .floating-card svg {
            width: 20px;
            height: 20px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
        }

        .home-hero .card-1 {
            top: 10%;
            left: 0;
            animation: cardFloat 5s ease-in-out infinite;
        }

        .home-hero .card-2 {
            bottom: 28%;
            left: -5%;
            animation: cardFloat 6s ease-in-out infinite 1s;
        }

        .home-hero .card-3 {
            top: 22%;
            right: 0;
            animation: cardFloat 5.5s ease-in-out infinite 2s;
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

        /* Features Section */
        .home-features {
            background: linear-gradient(180deg, var(--color-cream) 0%, var(--color-warm-white) 100%);
            padding: 6rem 0;
        }

        .home-features .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .home-features .feature-card {
            background: white;
            padding: 2rem;
            border-radius: var(--radius-xl);
            border: 1px solid rgba(45, 90, 61, 0.06);
            transition: all 0.4s ease;
        }

        .home-features .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(45, 90, 61, 0.12);
        }

        .home-features .feature-icon {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
            transition: transform 0.4s ease;
        }

        .home-features .feature-icon svg {
            width: 28px;
            height: 28px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        .home-features .feature-icon.green {
            background: linear-gradient(135deg, #4a7c59 0%, #6b9b7a 100%);
        }

        .home-features .feature-icon.gold {
            background: linear-gradient(135deg, #d4a84b 0%, #e6c06a 100%);
        }

        .home-features .feature-icon.blue {
            background: linear-gradient(135deg, #5c8dc4 0%, #7ba8d6 100%);
        }

        .home-features .feature-icon.purple {
            background: linear-gradient(135deg, #8b6fb0 0%, #a890c4 100%);
        }

        .home-features .feature-icon.orange {
            background: linear-gradient(135deg, #c4785c 0%, #d69578 100%);
        }

        .home-features .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .home-features .feature-card h3 {
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
        }

        .home-features .feature-card p {
            color: var(--color-charcoal-light);
            margin-bottom: 1rem;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .home-features .feature-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--color-primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .home-features .feature-link:hover {
            gap: 0.75rem;
        }

        .home-features .feature-link svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        /* Categories Section */
        .home-categories {
            background: var(--color-cream);
            padding: 6rem 0;
        }

        .home-categories .categories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .home-categories .category-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2.5rem 1.5rem;
            border-radius: var(--radius-xl);
            position: relative;
            overflow: hidden;
            min-height: 200px;
            color: white;
            text-decoration: none;
            transition: all 0.4s ease;
        }

        .home-categories .category-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%);
            transition: all 0.4s ease;
        }

        .home-categories .category-card:hover::before {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.3) 100%);
        }

        .home-categories .category-card:hover {
            transform: translateY(-8px);
            color: white;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .home-categories .category-vegetables {
            background: linear-gradient(145deg, #5a8f69 0%, #2d5a3d 100%);
        }

        .home-categories .category-flowers {
            background: linear-gradient(145deg, #d4927a 0%, #a65f43 100%);
        }

        .home-categories .category-herbs {
            background: linear-gradient(145deg, #a68a5b 0%, #6d5639 100%);
        }

        .home-categories .category-fruits {
            background: linear-gradient(145deg, #e6c06a 0%, #b8912f 100%);
        }

        .home-categories .category-icon {
            position: relative;
            z-index: 1;
            margin-bottom: 1rem;
            transition: transform 0.4s ease;
        }

        .home-categories .category-card:hover .category-icon {
            transform: scale(1.1);
        }

        .home-categories .category-icon svg {
            width: 48px;
            height: 48px;
            stroke: white;
            fill: none;
            stroke-width: 1.5;
        }

        .home-categories .category-card h4 {
            position: relative;
            z-index: 1;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
            color: white;
        }

        .home-categories .category-count {
            position: relative;
            z-index: 1;
            font-size: 0.85rem;
            opacity: 0.9;
        }

        /* Products Section - NO price/cart */
        .home-products {
            background: linear-gradient(180deg, var(--color-cream-dark) 0%, var(--color-cream) 100%);
            padding: 6rem 0;
        }

        .home-products .section-header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .home-products .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .home-products .product-card {
            background: white;
            border-radius: var(--radius-xl);
            overflow: hidden;
            border: 1px solid rgba(45, 90, 61, 0.06);
            transition: all 0.4s ease;
            text-decoration: none;
            display: block;
        }

        .home-products .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(45, 90, 61, 0.15);
        }

        .home-products .product-image {
            position: relative;
            height: 170px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .home-products .bg-green {
            background: linear-gradient(145deg, #5a8f69 0%, #2d5a3d 100%);
        }

        .home-products .bg-brown {
            background: linear-gradient(145deg, #a68a5b 0%, #6d5639 100%);
        }

        .home-products .bg-pink {
            background: linear-gradient(145deg, #e6a898 0%, #c4785c 100%);
        }

        .home-products .bg-teal {
            background: linear-gradient(145deg, #6aaa9a 0%, #3d7a6a 100%);
        }

        .home-products .product-icon {
            transition: transform 0.4s ease;
        }

        .home-products .product-card:hover .product-icon {
            transform: scale(1.1);
        }

        .home-products .product-icon svg {
            width: 55px;
            height: 55px;
            stroke: rgba(255, 255, 255, 0.95);
            fill: none;
            stroke-width: 1.5;
        }

        .home-products .product-badge {
            position: absolute;
            top: 0.85rem;
            left: 0.85rem;
            padding: 0.35rem 0.85rem;
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .home-products .badge-bestseller {
            background: var(--color-accent);
        }

        .home-products .badge-new {
            background: var(--color-primary);
        }

        .home-products .badge-sale {
            background: #e74c3c;
        }

        .home-products .product-content {
            padding: 1.25rem;
        }

        .home-products .product-category {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--color-primary);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.4rem;
        }

        .home-products .product-title {
            font-size: 1.05rem;
            margin-bottom: 0.4rem;
            color: var(--color-charcoal);
            transition: color 0.3s ease;
        }

        .home-products .product-card:hover .product-title {
            color: var(--color-primary);
        }

        .home-products .product-desc {
            font-size: 0.85rem;
            color: var(--color-charcoal-light);
            line-height: 1.5;
            margin-bottom: 0.85rem;
        }

        .home-products .product-meta {
            display: flex;
            gap: 0.6rem;
            font-size: 0.75rem;
            color: var(--color-charcoal-light);
        }

        .home-products .product-meta span {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            background: var(--color-cream);
            padding: 0.25rem 0.5rem;
            border-radius: var(--radius-sm);
        }

        .home-products .product-meta svg {
            width: 12px;
            height: 12px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
        }

        /* About Section */
        .home-about {
            background: var(--color-warm-white);
            padding: 6rem 0;
        }

        .home-about .about-grid {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 4rem;
            align-items: center;
        }

        .home-about .about-images {
            position: relative;
            padding: 2rem;
        }

        .home-about .about-img-main {
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(45, 90, 61, 0.2);
        }

        .home-about .img-placeholder {
            background: linear-gradient(145deg, var(--color-primary-light) 0%, var(--color-primary) 100%);
            height: 380px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .home-about .img-placeholder svg {
            width: 75px;
            height: 75px;
            stroke: white;
            fill: none;
            stroke-width: 1.5;
            margin-bottom: 1rem;
        }

        .home-about .img-placeholder span {
            font-family: var(--font-display);
            font-size: 1.2rem;
            font-weight: 600;
        }

        .home-about .about-img-accent {
            position: absolute;
            bottom: 0;
            right: 0;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(196, 120, 92, 0.25);
        }

        .home-about .img-placeholder.small {
            width: 130px;
            height: 130px;
            background: linear-gradient(145deg, var(--color-accent-light) 0%, var(--color-accent) 100%);
        }

        .home-about .img-placeholder.small svg {
            width: 45px;
            height: 45px;
            margin-bottom: 0;
        }

        .home-about .experience-badge {
            position: absolute;
            top: 0;
            right: 1.5rem;
            background: white;
            padding: 1.25rem;
            border-radius: var(--radius-lg);
            box-shadow: 0 12px 35px rgba(45, 90, 61, 0.15);
            text-align: center;
        }

        .home-about .exp-number {
            display: block;
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        .home-about .exp-text {
            font-size: 0.8rem;
            color: var(--color-charcoal-light);
        }

        .home-about .about-content p {
            color: var(--color-charcoal-light);
            margin-bottom: 1rem;
            line-height: 1.75;
        }

        .home-about .about-features {
            margin-top: 1.75rem;
        }

        .home-about .about-feature {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            padding: 0.6rem 0.9rem;
            background: rgba(45, 90, 61, 0.04);
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
        }

        .home-about .about-feature:hover {
            background: rgba(45, 90, 61, 0.08);
            transform: translateX(5px);
        }

        .home-about .about-feature svg {
            width: 20px;
            height: 20px;
            stroke: var(--color-primary);
            fill: none;
            stroke-width: 2;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .home-about .about-feature span {
            color: var(--color-charcoal);
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* Testimonials Section */
        .home-testimonials {
            background: linear-gradient(145deg, var(--color-primary-dark) 0%, var(--color-primary) 100%);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .home-testimonials::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .home-testimonials .section-header {
            position: relative;
            z-index: 1;
        }

        .home-testimonials .section-title {
            color: white;
        }

        .home-testimonials .section-description {
            color: rgba(255, 255, 255, 0.7);
        }

        .home-testimonials .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.75rem;
            position: relative;
            z-index: 1;
        }

        .home-testimonials .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-xl);
            padding: 1.75rem;
            transition: all 0.4s ease;
        }

        .home-testimonials .testimonial-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
        }

        .home-testimonials .testimonial-card.featured {
            background: rgba(255, 255, 255, 0.15);
        }

        .home-testimonials .testimonial-rating {
            display: flex;
            gap: 0.2rem;
            margin-bottom: 1rem;
            color: #f0c14b;
        }

        .home-testimonials .testimonial-rating svg {
            width: 16px;
            height: 16px;
            fill: currentColor;
        }

        .home-testimonials .testimonial-card blockquote {
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.95rem;
            font-style: italic;
            line-height: 1.7;
            margin-bottom: 1.25rem;
        }

        .home-testimonials .testimonial-author {
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        .home-testimonials .author-avatar {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 1rem;
        }

        .home-testimonials .author-info h5 {
            color: white;
            font-size: 0.95rem;
            margin-bottom: 0.15rem;
        }

        .home-testimonials .author-info span {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
        }

        /* Newsletter Section */
        .home-newsletter {
            background: var(--color-cream);
            padding: 6rem 0;
        }

        .home-newsletter .newsletter-wrapper {
            background: linear-gradient(145deg, var(--color-primary-light) 0%, var(--color-primary) 100%);
            border-radius: 20px;
            padding: 3.5rem;
            position: relative;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 25px 60px rgba(45, 90, 61, 0.25);
        }

        .home-newsletter .newsletter-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 60%;
            height: 150%;
            background: radial-gradient(ellipse, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
        }

        .home-newsletter .newsletter-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            position: relative;
        }

        .home-newsletter .newsletter-icon svg {
            width: 32px;
            height: 32px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }

        .home-newsletter .newsletter-title {
            color: white;
            font-size: 1.85rem;
            margin-bottom: 0.85rem;
            position: relative;
        }

        .home-newsletter .newsletter-desc {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1.75rem;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .home-newsletter .newsletter-form {
            max-width: 480px;
            margin: 0 auto;
            display: flex;
            gap: 0;
            position: relative;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
            border-radius: var(--radius-full);
        }

        .home-newsletter .newsletter-form input {
            flex: 1;
            padding: 0.95rem 1.4rem;
            border: none;
            border-radius: var(--radius-full) 0 0 var(--radius-full);
            font-size: 0.95rem;
            font-family: var(--font-body);
            outline: none;
        }

        .home-newsletter .newsletter-form button {
            padding: 0.95rem 1.75rem;
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

        .home-newsletter .newsletter-form button:hover {
            background: var(--color-primary-dark);
        }

        .home-newsletter .newsletter-note {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
            margin-top: 1rem;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        .home-newsletter .newsletter-note svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        /* Responsive */
        @media (max-width: 1199px) {
            .home-hero .hero-circle-main {
                width: 320px;
                height: 320px;
            }

            .home-hero .hero-circle-ring {
                width: 400px;
                height: 400px;
            }

            .home-products .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 991px) {
            .home-hero .hero-inner {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .home-hero .hero-visual {
                margin-top: 2rem;
            }

            .home-hero .hero-description {
                margin: 0 auto 2rem;
            }

            .home-hero .hero-buttons {
                justify-content: center;
            }

            .home-hero .hero-stats {
                justify-content: center;
            }

            .home-features .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .home-categories .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .home-products .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .home-testimonials .testimonials-grid {
                grid-template-columns: 1fr;
                max-width: 500px;
                margin: 0 auto;
            }

            .home-about .about-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .home-hero {
                padding: 3rem 0 4rem;
                min-height: auto;
            }

            .home-hero .hero-visual {
                display: none;
            }

            .home-hero .hero-title {
                font-size: 2.25rem;
            }

            .home-features .features-grid {
                grid-template-columns: 1fr;
            }

            .home-products .products-grid {
                grid-template-columns: 1fr;
            }

            .home-products .section-header-row {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .home-newsletter .newsletter-wrapper {
                padding: 2.5rem 1.5rem;
            }

            .home-newsletter .newsletter-form {
                flex-direction: column;
                box-shadow: none;
            }

            .home-newsletter .newsletter-form input {
                border-radius: var(--radius-full);
                margin-bottom: 0.75rem;
            }

            .home-newsletter .newsletter-form button {
                border-radius: var(--radius-full);
            }
        }

        @media (max-width: 575px) {
            .home-hero .hero-buttons {
                flex-direction: column;
            }

            .home-hero .hero-buttons .btn {
                width: 100%;
                justify-content: center;
            }

            .home-hero .stat-divider {
                display: none;
            }

            .home-hero .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .home-categories .categories-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="home-hero">
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
                        100% Organic & Non-GMO Certified
                    </span>
                    <h1 class="hero-title">
                        Cultivate Your <span class="highlight text-gradient">Dream Garden</span> With Premium Seeds
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
                            <span class="stat-number">500<span class="suffix">+</span></span>
                            <span class="stat-label">Seed Varieties</span>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <span class="stat-number">50K<span class="suffix">+</span></span>
                            <span class="stat-label">Happy Gardeners</span>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <span class="stat-number">98<span class="suffix">%</span></span>
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
                            <span>Free Shipping $50+</span>
                        </div>
                        <div class="floating-card card-3">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="7" />
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                            </svg>
                            <span>Premium Quality</span>
                        </div>
                        <div class="hero-circle-ring"></div>
                        <div class="hero-circle-main">
                            <svg viewBox="0 0 200 200" class="plant-svg">
                                <defs>
                                    <linearGradient id="leafGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#6b9b7a" />
                                        <stop offset="100%" style="stop-color:#2d5a3d" />
                                    </linearGradient>
                                </defs>
                                <path d="M100 180 L100 90" stroke="#4a7c59" stroke-width="6" stroke-linecap="round" />
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
    </section>

    <!-- Features Section -->
    <section class="home-features" id="features">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Why Choose Us</span>
                <h2 class="section-title">Seeds That Make a <span class="text-gradient">Difference</span></h2>
                <p class="section-description">We're committed to providing the highest quality organic seeds for gardeners
                    who care about nature and sustainability.</p>
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
    <section class="home-categories">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Browse Collection</span>
                <h2 class="section-title">Shop by <span class="text-gradient">Category</span></h2>
                <p class="section-description">Explore our diverse range of premium seeds organized by type for easy
                    browsing.</p>
            </div>
            <div class="categories-grid">
                <a href="/products" class="category-card category-vegetables">
                    <div class="category-icon"><svg viewBox="0 0 24 24">
                            <path
                                d="M17 8c-.5-2.5-3-4.5-6-4.5S5.5 5.5 5 8c-3 0-5 2-5 4.5S2 17 5 17h14c3 0 5-2 5-4.5S20 8 17 8z" />
                        </svg></div>
                    <h4>Vegetables</h4>
                    <span class="category-count">48 Products</span>
                </a>
                <a href="/products" class="category-card category-flowers">
                    <div class="category-icon"><svg viewBox="0 0 24 24">
                            <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                            <path d="M12 22c-1 0-2-.5-2-2 0-1 1-2 2-2s2 1 2 2c0 1.5-1 2-2 2z" />
                        </svg></div>
                    <h4>Flowers</h4>
                    <span class="category-count">35 Products</span>
                </a>
                <a href="/products" class="category-card category-herbs">
                    <div class="category-icon"><svg viewBox="0 0 24 24">
                            <path d="M6.13 1L6 16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2L17.87 1M12 1v21M9 21h6" />
                        </svg></div>
                    <h4>Herbs</h4>
                    <span class="category-count">22 Products</span>
                </a>
                <a href="/products" class="category-card category-fruits">
                    <div class="category-icon"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="14" r="8" />
                            <path d="M12 6V2M12 6c-2 0-3 1-3 3" />
                        </svg></div>
                    <h4>Fruits</h4>
                    <span class="category-count">19 Products</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="home-products" id="products">
        <div class="container">
            <div class="section-header-row">
                <div class="section-header-left">
                    <span class="section-badge">Featured Products</span>
                    <h2 class="section-title">Bestselling <span class="text-gradient">Seeds</span></h2>
                    <p class="section-description">Our most loved seeds, chosen by thousands of happy gardeners.</p>
                </div>
                <a href="/products" class="btn btn-outline">View All Products <svg viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
            <div class="products-grid">
                <a href="/products" class="product-card">
                    <div class="product-image bg-green">
                        <span class="product-badge badge-bestseller">Bestseller</span>
                        <div class="product-icon"><svg viewBox="0 0 24 24">
                                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                            </svg></div>
                    </div>
                    <div class="product-content">
                        <span class="product-category">Vegetables</span>
                        <h4 class="product-title">Heirloom Tomato Mix</h4>
                        <p class="product-desc">5 heritage varieties including Brandywine & Cherokee Purple</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>70-85 days</span>
                            <span><svg viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <path d="M22 4L12 14.01l-3-3" />
                                </svg>Organic</span>
                        </div>
                    </div>
                </a>
                <a href="/products" class="product-card">
                    <div class="product-image bg-brown">
                        <div class="product-icon"><svg viewBox="0 0 24 24">
                                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                            </svg></div>
                    </div>
                    <div class="product-content">
                        <span class="product-category">Herbs</span>
                        <h4 class="product-title">Culinary Herb Garden</h4>
                        <p class="product-desc">Complete kit: Basil, Thyme, Oregano, Rosemary & Sage</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>30-60 days</span>
                            <span><svg viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <path d="M22 4L12 14.01l-3-3" />
                                </svg>Non-GMO</span>
                        </div>
                    </div>
                </a>
                <a href="/products" class="product-card">
                    <div class="product-image bg-pink">
                        <span class="product-badge badge-new">New</span>
                        <div class="product-icon"><svg viewBox="0 0 24 24">
                                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                            </svg></div>
                    </div>
                    <div class="product-content">
                        <span class="product-category">Flowers</span>
                        <h4 class="product-title">Wildflower Meadow Mix</h4>
                        <p class="product-desc">20+ pollinator-friendly varieties for stunning displays</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>60-90 days</span>
                            <span><svg viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <path d="M22 4L12 14.01l-3-3" />
                                </svg>Heirloom</span>
                        </div>
                    </div>
                </a>
                <a href="/products" class="product-card">
                    <div class="product-image bg-teal">
                        <span class="product-badge badge-sale">Sale</span>
                        <div class="product-icon"><svg viewBox="0 0 24 24">
                                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
                            </svg></div>
                    </div>
                    <div class="product-content">
                        <span class="product-category">Vegetables</span>
                        <h4 class="product-title">Salad Greens Mix</h4>
                        <p class="product-desc">Lettuce, Arugula, Spinach & Microgreens blend</p>
                        <div class="product-meta">
                            <span><svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>21-45 days</span>
                            <span><svg viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <path d="M22 4L12 14.01l-3-3" />
                                </svg>Organic</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="home-about" id="about">
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
                    <p>Founded in 2010, ParlakSeed began with a simple mission: to provide gardeners with the highest
                        quality organic seeds while protecting our planet.</p>
                    <p>We work directly with certified organic farms worldwide to source seeds that are not only non-GMO but
                        also contribute to biodiversity and sustainable agriculture practices.</p>
                    <div class="about-features">
                        <div class="about-feature"><svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg><span>Family-owned business with passion for gardening</span></div>
                        <div class="about-feature"><svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg><span>Direct partnerships with organic farms globally</span></div>
                        <div class="about-feature"><svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg><span>Committed to sustainability and eco-friendly packaging</span></div>
                        <div class="about-feature"><svg viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <path d="M22 4L12 14.01l-3-3" />
                            </svg><span>Expert gardening support and growing guides</span></div>
                    </div>
                    <a href="/contact" class="btn btn-primary btn-lg mt-4"><svg viewBox="0 0 24 24">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg>Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="home-testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-badge badge-light">Testimonials</span>
                <h2 class="section-title">What Our <span class="text-gradient-light">Gardeners</span> Say</h2>
                <p class="section-description">Join thousands of satisfied customers growing beautiful gardens with
                    ParlakSeed.</p>
            </div>
            <div class="testimonials-grid">
                @include('partials.testimonial-card', ['initials' => 'SJ', 'name' => 'Sarah Johnson', 'location' => 'Home Gardener, Vermont', 'quote' => 'The germination rate was incredible! Every single seed sprouted. My garden has never looked better.'])
                @include('partials.testimonial-card', ['initials' => 'MC', 'name' => 'Michael Chen', 'location' => 'Organic Farmer, Oregon', 'quote' => 'As a professional farmer, seed quality matters. ParlakSeed delivers consistently excellent organic seeds.', 'featured' => true])
                @include('partials.testimonial-card', ['initials' => 'ER', 'name' => 'Emily Rodriguez', 'location' => 'Garden Enthusiast, Texas', 'quote' => 'The wildflower mix brought so many butterflies and bees to my yard! Beautiful blooms all summer.'])
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="home-newsletter">
        <div class="container">
            <div class="newsletter-wrapper">
                <div class="newsletter-icon"><svg viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg></div>
                <h2 class="newsletter-title">Join Our Growing Community</h2>
                <p class="newsletter-desc">Subscribe to get exclusive deals, seasonal planting guides, and expert gardening
                    tips.</p>
                <form class="newsletter-form" onsubmit="return false;">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit">Subscribe →</button>
                </form>
                <p class="newsletter-note"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </section>
@endsection