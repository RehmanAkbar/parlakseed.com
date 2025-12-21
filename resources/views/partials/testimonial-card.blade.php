<div class="testimonial-card {{ !empty($featured) ? 'featured' : '' }}">
    <div class="testimonial-rating">
        @for($i = 0; $i < 5; $i++)
            <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        @endfor
    </div>
    <blockquote>
        "{{ $quote }}"
    </blockquote>
    <div class="testimonial-author">
        <div class="author-avatar">{{ $initials }}</div>
        <div class="author-info">
            <h5>{{ $name }}</h5>
            <span>{{ $location }}</span>
        </div>
    </div>
</div>
