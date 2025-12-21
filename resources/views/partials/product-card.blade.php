@php
    $bgColors = [
        'green' => 'bg-green',
        'brown' => 'bg-brown',
        'pink' => 'bg-pink',
        'teal' => 'bg-teal',
    ];

    $badgeClasses = [
        'bestseller' => 'badge-bestseller',
        'new' => 'badge-new',
        'sale' => 'badge-sale',
    ];

    $badgeLabels = [
        'bestseller' => 'Bestseller',
        'new' => 'New',
        'sale' => '20% Off',
    ];
@endphp

<div class="product-card">
    <div class="product-image {{ $bgColors[$color] ?? 'bg-green' }}">
        @if(!empty($badge))
            <span class="product-badge {{ $badgeClasses[$badge] ?? '' }}">{{ $badgeLabels[$badge] ?? $badge }}</span>
        @endif
        <button class="wishlist-btn" aria-label="Add to wishlist">
            <svg viewBox="0 0 24 24">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
            </svg>
        </button>
        <div class="product-icon">
            <svg viewBox="0 0 24 24">
                <path d="M12 2C13.5 4 14 6.5 14 9c0 3-2 5.5-2 5.5s-2-2.5-2-5.5c0-2.5.5-5 2-7z" />
            </svg>
        </div>
    </div>
    <div class="product-content">
        <span class="product-category">{{ $category }}</span>
        <h4 class="product-title">{{ $title }}</h4>
        <p class="product-desc">{{ $description }}</p>
        <div class="product-meta">
            <span>
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 6v6l4 2" />
                </svg>
                {{ $days }} days
            </span>
            <span>
                <svg viewBox="0 0 24 24">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <path d="M22 4L12 14.01l-3-3" />
                </svg>
                {{ $cert }}
            </span>
        </div>
        <div class="product-footer">
            <span class="product-price">
                ${{ $price }}
                @if(!empty($original_price))
                    <span class="original">${{ $original_price }}</span>
                @endif
            </span>
            <button class="btn-cart" aria-label="Add to cart">
                <svg viewBox="0 0 24 24">
                    <path
                        d="M9 20a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                </svg>
            </button>
        </div>
    </div>
</div>