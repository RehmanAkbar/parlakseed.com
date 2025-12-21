@extends('layouts.app')

@section('title', 'Contact Us - ParlakSeed')
@section('meta_description', 'Get in touch with ParlakSeed. We\'re here to help with your gardening questions, orders, and growing advice.')

@section('styles')
    <style>
        /* ============================================
           Contact Page Styles
           ============================================ */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 3rem;
        }

        /* Info Cards */
        .info-cards {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .info-card {
            background: white;
            padding: 2rem;
            border-radius: var(--radius-lg);
            border: 1px solid rgba(45, 90, 61, 0.08);
            transition: var(--transition-base);
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-light) 100%);
            border-radius: var(--radius-md);
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
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--color-charcoal);
        }

        .info-card p {
            color: var(--color-charcoal-light);
            opacity: 0.8;
            line-height: 1.7;
        }

        .info-card a {
            color: var(--color-primary);
            font-weight: 500;
        }

        .info-card a:hover {
            color: var(--color-primary-dark);
            text-decoration: underline;
        }

        /* Social Section */
        .social-section {
            margin-top: 1rem;
        }

        .social-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--color-charcoal);
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
        }

        .social-btn {
            width: 48px;
            height: 48px;
            background: var(--color-cream);
            border: 1px solid rgba(45, 90, 61, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-base);
        }

        .social-btn:hover {
            background: var(--color-primary);
            border-color: var(--color-primary);
        }

        .social-btn svg {
            width: 20px;
            height: 20px;
            fill: var(--color-charcoal);
            transition: var(--transition-base);
        }

        .social-btn:hover svg {
            fill: white;
        }

        /* Contact Form */
        .contact-form-wrapper {
            background: white;
            padding: 2.5rem;
            border-radius: var(--radius-xl);
            border: 1px solid rgba(45, 90, 61, 0.08);
            box-shadow: var(--shadow-md);
        }

        .contact-form-wrapper h2 {
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
        }

        .contact-form-wrapper > p {
            color: var(--color-charcoal-light);
            margin-bottom: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--color-primary);
            cursor: pointer;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .checkbox-group label {
            font-size: 0.9rem;
            color: var(--color-charcoal-light);
            cursor: pointer;
        }

        .checkbox-group label a {
            color: var(--color-primary);
        }

        .submit-btn {
            width: 100%;
        }

        .submit-btn svg {
            width: 20px;
            height: 20px;
        }

        /* FAQ Section */
        .faq-section {
            margin-top: 4rem;
            padding: 3rem;
            background: white;
            border-radius: var(--radius-xl);
        }

        .faq-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .faq-header h2 {
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
        }

        .faq-header p {
            color: var(--color-charcoal-light);
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .faq-item {
            background: var(--color-cream);
            padding: 1.5rem;
            border-radius: var(--radius-md);
        }

        .faq-item h4 {
            font-size: 1rem;
            margin-bottom: 0.75rem;
            color: var(--color-charcoal);
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
            background: var(--color-primary);
            color: white;
            border-radius: 50%;
            font-size: 0.85rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .faq-item p {
            color: var(--color-charcoal-light);
            font-size: 0.95rem;
            line-height: 1.7;
            padding-left: 2.5rem;
        }

        /* Map Section */
        .map-section {
            margin-top: 4rem;
        }

        .map-container {
            background: white;
            border-radius: var(--radius-xl);
            overflow: hidden;
            border: 1px solid rgba(45, 90, 61, 0.08);
        }

        .map-placeholder {
            height: 400px;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
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
            inset: 0;
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
            font-size: 1.5rem;
            font-weight: 600;
            position: relative;
        }

        .map-placeholder p {
            opacity: 0.8;
            position: relative;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .info-cards {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }

            .social-section {
                grid-column: 1 / -1;
            }

            .faq-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .info-cards {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .contact-form-wrapper {
                padding: 1.5rem;
            }

            .faq-section {
                padding: 2rem;
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
                <span>Contact</span>
            </nav>
            <h1>Get in <span class="text-gradient">Touch</span></h1>
            <p>Have questions about our seeds or need gardening advice? We're here to help your garden grow!</p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="section-lg">
        <div class="container">
            <div class="contact-grid">
                <!-- Info Cards -->
                <div class="info-cards">
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
                        <p><a href="mailto:hello@parlakseed.com">hello@parlakseed.com</a><br>We typically respond within 24 hours</p>
                    </div>

                    <div class="social-section">
                        <h3>Follow Us</h3>
                        <div class="social-links">
                            <a href="#" class="social-btn" aria-label="Facebook">
                                <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>
                            <a href="#" class="social-btn" aria-label="Twitter">
                                <svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
                            </a>
                            <a href="#" class="social-btn" aria-label="Instagram">
                                <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                            </a>
                            <a href="#" class="social-btn" aria-label="YouTube">
                                <svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form below and we'll get back to you as soon as possible.</p>

                    <form action="#" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="firstName">First Name <span class="required">*</span></label>
                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="John" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="lastName">Last Name <span class="required">*</span></label>
                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Doe" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address <span class="required">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="(555) 123-4567">
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label" for="subject">Subject <span class="required">*</span></label>
                            <select id="subject" name="subject" class="form-control" required>
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

                        <div class="form-group full-width">
                            <label class="form-label" for="message">Message <span class="required">*</span></label>
                            <textarea id="message" name="message" class="form-control" placeholder="How can we help you today?" required></textarea>
                        </div>

                        <div class="checkbox-group">
                            <input type="checkbox" id="newsletter" name="newsletter">
                            <label for="newsletter">Yes, I'd like to receive gardening tips and exclusive offers via email. You can unsubscribe at any time.</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg submit-btn">
                            Send Message
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
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
        </div>
    </section>
@endsection
