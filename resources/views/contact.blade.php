<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - GreenSprout Seeds</title>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            padding: 10rem 4rem 5rem;
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
            flex: 1;
            padding: 4rem;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 4rem;
        }
        
        /* Contact Info */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .info-card {
            background: var(--color-warm-white);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid rgba(123, 158, 135, 0.1);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(45, 74, 62, 0.1);
        }
        
        .info-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-sage-dark) 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
        }
        
        .info-icon svg {
            width: 28px;
            height: 28px;
            stroke: white;
            fill: none;
            stroke-width: 2;
        }
        
        .info-card h3 {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--color-forest);
            margin-bottom: 0.5rem;
        }
        
        .info-card p {
            color: var(--color-charcoal);
            opacity: 0.7;
            line-height: 1.7;
        }
        
        .info-card a {
            color: var(--color-sage-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .info-card a:hover {
            color: var(--color-forest);
        }
        
        /* Social Links in Contact */
        .social-section {
            margin-top: 1rem;
        }
        
        .social-section h3 {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--color-forest);
            margin-bottom: 1rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-link {
            width: 50px;
            height: 50px;
            background: var(--color-warm-white);
            border: 1px solid rgba(123, 158, 135, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-link:hover {
            background: var(--color-sage);
            border-color: var(--color-sage);
            transform: translateY(-3px);
        }
        
        .social-link svg {
            width: 22px;
            height: 22px;
            fill: var(--color-forest);
            transition: fill 0.3s ease;
        }
        
        .social-link:hover svg {
            fill: white;
        }
        
        /* Contact Form */
        .contact-form-container {
            background: var(--color-warm-white);
            padding: 3rem;
            border-radius: 24px;
            border: 1px solid rgba(123, 158, 135, 0.1);
            box-shadow: 0 10px 40px rgba(45, 74, 62, 0.08);
        }
        
        .contact-form-container h2 {
            font-family: var(--font-display);
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--color-forest);
            margin-bottom: 0.5rem;
        }
        
        .contact-form-container > p {
            color: var(--color-charcoal);
            opacity: 0.7;
            margin-bottom: 2rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-group label {
            font-weight: 500;
            color: var(--color-charcoal);
            font-size: 0.95rem;
        }
        
        .form-group label span {
            color: var(--color-terracotta);
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 1rem 1.25rem;
            border: 1px solid rgba(123, 158, 135, 0.3);
            border-radius: 12px;
            font-family: var(--font-body);
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
            background: white;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--color-sage);
            box-shadow: 0 0 0 3px rgba(123, 158, 135, 0.15);
        }
        
        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--color-charcoal);
            opacity: 0.4;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }
        
        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%232D4A3E' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            cursor: pointer;
        }
        
        .form-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .form-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--color-sage);
            cursor: pointer;
            margin-top: 2px;
        }
        
        .form-checkbox label {
            font-size: 0.9rem;
            color: var(--color-charcoal);
            opacity: 0.8;
            cursor: pointer;
        }
        
        .form-checkbox label a {
            color: var(--color-sage-dark);
            text-decoration: underline;
        }
        
        .submit-btn {
            width: 100%;
            padding: 1.25rem 2rem;
            background: var(--color-forest);
            color: white;
            border: none;
            border-radius: 50px;
            font-family: var(--font-body);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .submit-btn:hover {
            background: var(--color-sage-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(45, 74, 62, 0.3);
        }
        
        .submit-btn svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }
        
        /* FAQ Section */
        .faq-section {
            margin-top: 5rem;
            padding: 4rem;
            background: var(--color-warm-white);
            border-radius: 24px;
        }
        
        .faq-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .faq-header h2 {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-forest);
            margin-bottom: 0.5rem;
        }
        
        .faq-header p {
            color: var(--color-charcoal);
            opacity: 0.7;
        }
        
        .faq-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        
        .faq-item {
            background: var(--color-cream);
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid rgba(123, 158, 135, 0.1);
        }
        
        .faq-item h4 {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--color-forest);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .faq-item h4::before {
            content: 'Q';
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background: var(--color-sage);
            color: white;
            border-radius: 50%;
            font-size: 0.85rem;
            font-weight: 700;
            flex-shrink: 0;
        }
        
        .faq-item p {
            color: var(--color-charcoal);
            opacity: 0.7;
            font-size: 0.95rem;
            line-height: 1.7;
            padding-left: 2.5rem;
        }
        
        /* Map Section */
        .map-section {
            margin-top: 5rem;
        }
        
        .map-container {
            background: var(--color-warm-white);
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(123, 158, 135, 0.1);
        }
        
        .map-placeholder {
            height: 400px;
            background: linear-gradient(135deg, var(--color-sage) 0%, var(--color-forest) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .map-placeholder::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .map-placeholder svg {
            width: 80px;
            height: 80px;
            stroke: white;
            fill: none;
            stroke-width: 1.5;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .map-placeholder h3 {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 600;
            position: relative;
        }
        
        .map-placeholder p {
            opacity: 0.8;
            position: relative;
        }
        
        /* Footer */
        .footer {
            background: var(--color-charcoal);
            color: rgba(255,255,255,0.7);
            padding: 4rem;
            margin-top: auto;
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
        @media (max-width: 1024px) {
            .contact-grid { grid-template-columns: 1fr; gap: 3rem; }
            .contact-info { order: 2; display: grid; grid-template-columns: repeat(2, 1fr); }
            .social-section { grid-column: 1 / -1; }
            .faq-grid { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (max-width: 768px) {
            .nav-links, .nav-cta { display: none; }
            .mobile-menu-btn { display: flex; }
            .page-header { padding: 8rem 2rem 3rem; }
            .main-content { padding: 2rem; }
            .contact-form-container { padding: 2rem; }
            .form-row { grid-template-columns: 1fr; gap: 1rem; }
            .contact-info { grid-template-columns: 1fr; }
            .faq-section { padding: 2rem; margin-top: 3rem; }
            .map-section { margin-top: 3rem; }
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
            <li><a href="/products">Products</a></li>
            <li><a href="#">About</a></li>
            <li><a href="/contact" class="active">Contact</a></li>
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
        <h1>Get in Touch</h1>
        <p>Have questions about our seeds or need gardening advice? We're here to help your garden grow!</p>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="contact-grid">
            <!-- Contact Info -->
            <div class="contact-info">
                <div class="info-card">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h3>Visit Our Farm</h3>
                    <p>123 Garden Valley Road<br>Greenfield, CA 93927<br>United States</p>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <h3>Call Us</h3>
                    <p><a href="tel:+18005553456">1-800-555-SEED</a><br>Mon-Fri: 8am - 6pm PST<br>Sat: 9am - 4pm PST</p>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <h3>Email Us</h3>
                    <p><a href="mailto:hello@greensprout.com">hello@greensprout.com</a><br>We typically respond within 24 hours</p>
                </div>
                
                <div class="social-section">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                        </a>
                        <a href="#" class="social-link">
                            <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form-container">
                <h2>Send Us a Message</h2>
                <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                
                <form action="#" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name <span>*</span></label>
                            <input type="text" id="firstName" name="firstName" placeholder="John" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name <span>*</span></label>
                            <input type="text" id="lastName" name="lastName" placeholder="Doe" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email" placeholder="john@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="(555) 123-4567">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="subject">Subject <span>*</span></label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a topic...</option>
                                <option value="general">General Inquiry</option>
                                <option value="order">Order Status</option>
                                <option value="growing">Growing Advice</option>
                                <option value="wholesale">Wholesale Inquiry</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="feedback">Feedback & Suggestions</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="message">Message <span>*</span></label>
                            <textarea id="message" name="message" placeholder="How can we help you today?" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-checkbox">
                        <input type="checkbox" id="newsletter" name="newsletter">
                        <label for="newsletter">Yes, I'd like to receive gardening tips and exclusive offers via email. You can unsubscribe at any time.</label>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        Send Message
                        <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="faq-section">
            <div class="faq-header">
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <h4>How long does shipping take?</h4>
                    <p>Standard shipping takes 3-5 business days. Express shipping (1-2 days) is available for an additional fee. Orders ship within 24 hours of placement.</p>
                </div>
                <div class="faq-item">
                    <h4>What's your return policy?</h4>
                    <p>We offer a 100% satisfaction guarantee. If your seeds don't germinate as expected, we'll replace them or provide a full refund within 90 days of purchase.</p>
                </div>
                <div class="faq-item">
                    <h4>Are all your seeds organic?</h4>
                    <p>Yes! All our seeds are certified organic and non-GMO. We work directly with sustainable farms to ensure the highest quality seeds.</p>
                </div>
                <div class="faq-item">
                    <h4>Do you offer wholesale pricing?</h4>
                    <p>Yes, we offer competitive wholesale pricing for nurseries, farms, and garden centers. Contact us with your business details for a custom quote.</p>
                </div>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="map-section">
            <div class="map-container">
                <div class="map-placeholder">
                    <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <h3>Visit Our Farm & Store</h3>
                    <p>123 Garden Valley Road, Greenfield, CA 93927</p>
                </div>
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
