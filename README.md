# ParlakSeed Laravel Blade Templates

A complete set of responsive, modern Laravel Blade templates for the ParlakSeed organic seed business website.

## 📁 File Structure

```
parlakseed-templates/
├── layouts/
│   └── app.blade.php           # Master layout (header, footer, base styles)
├── views/
│   ├── welcome.blade.php       # Homepage
│   ├── products.blade.php      # Products listing page
│   ├── contact.blade.php       # Contact page
│   └── partials/
│       ├── feature-card.blade.php      # Feature card component
│       ├── product-card.blade.php      # Product card (homepage version)
│       ├── testimonial-card.blade.php  # Testimonial card component
│       └── products/
│           └── product-item.blade.php  # Product card (products page version)
└── README.md
```

## 🚀 Installation

1. Copy the `layouts` folder to your Laravel `resources/views/` directory
2. Copy the `views` folder contents to your Laravel `resources/views/` directory
3. Update your routes in `routes/web.php`:

```php
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
```

## 🎨 Master Layout Features

The `layouts/app.blade.php` includes:

- **Fixed Header** with scroll effect and mobile responsive navigation
- **Logo** with ParlakSeed branding
- **Navigation** with active state highlighting
- **Cart icon** with badge
- **Footer** with multiple columns and social links
- **Back to Top** button
- **CSS Variables** for easy customization
- **Utility Classes** for spacing, grids, buttons, forms

### Available Sections

```blade
@extends('layouts.app')

@section('title', 'Page Title - ParlakSeed')
@section('meta_description', 'Your meta description here')

@section('styles')
<style>
    /* Page-specific styles */
</style>
@endsection

@section('content')
    <!-- Your page content -->
@endsection

@section('scripts')
<script>
    // Page-specific JavaScript
</script>
@endsection
```

## 🎨 Design System

### Colors (CSS Variables)

```css
--color-primary: #2d5a3d;        /* Forest green */
--color-primary-light: #4a7c59;  /* Light green */
--color-secondary: #8b6f47;       /* Earth brown */
--color-accent: #c4785c;          /* Terracotta */
--color-cream: #faf7f2;           /* Background */
--color-charcoal: #2c2c2c;        /* Text */
```

### Typography

- **Display Font:** Playfair Display (headings)
- **Body Font:** Source Sans 3 (body text)

### Button Classes

```html
<a href="#" class="btn btn-primary">Primary Button</a>
<a href="#" class="btn btn-outline">Outline Button</a>
<a href="#" class="btn btn-secondary">Secondary Button</a>
<a href="#" class="btn btn-lg">Large Button</a>
<a href="#" class="btn btn-sm">Small Button</a>
```

### Grid Utilities

```html
<div class="grid grid-2">2 columns</div>
<div class="grid grid-3">3 columns</div>
<div class="grid grid-4">4 columns</div>
```

### Section Classes

```html
<section class="section">Standard padding</section>
<section class="section-sm">Small padding</section>
<section class="section-lg">Large padding</section>
```

## 📦 Reusable Components

### Feature Card
```blade
@include('partials.feature-card', [
    'icon' => 'shield',  // shield, check, dollar, truck, chat, book
    'color' => 'green',  // green, gold, blue, purple, orange (or empty)
    'title' => 'Feature Title',
    'description' => 'Feature description text.'
])
```

### Product Card (Homepage)
```blade
@include('partials.product-card', [
    'badge' => 'bestseller',  // bestseller, new, sale (or empty)
    'color' => 'green',       // green, brown, pink, teal
    'category' => 'Vegetables',
    'title' => 'Product Name',
    'description' => 'Product description',
    'days' => '70-85',
    'cert' => 'Organic',
    'price' => '12.99',
    'original_price' => '15.99'  // optional, for sale items
])
```

### Testimonial Card
```blade
@include('partials.testimonial-card', [
    'initials' => 'SJ',
    'name' => 'Sarah Johnson',
    'location' => 'Home Gardener, Vermont',
    'quote' => 'Customer testimonial text here.',
    'featured' => true  // optional, highlights the card
])
```

## 📱 Responsive Breakpoints

- **1199px:** 3-column grids reduce to 2
- **991px:** Sidebar layouts stack, mobile menu activates
- **767px:** 2-column grids reduce to 1
- **575px:** Full mobile layout

## ✨ Features

- ✅ Fully responsive design
- ✅ No external CSS frameworks required (standalone CSS)
- ✅ SVG icons (no icon library dependency)
- ✅ Smooth animations and transitions
- ✅ Accessible (ARIA labels, semantic HTML)
- ✅ SEO-friendly structure
- ✅ Laravel Blade template syntax
- ✅ Reusable partial components

## 🔧 Customization

To customize colors, fonts, or other design elements, edit the CSS variables in the `:root` selector within `layouts/app.blade.php`.

```css
:root {
    --color-primary: #your-color;
    --font-display: 'Your Font', serif;
    /* etc. */
}
```

---

Built with ❤️ for ParlakSeed
