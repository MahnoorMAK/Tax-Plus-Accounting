{{-- ============================================================
     resources/views/Component/hero.blade.php
     Self-contained Hero Component — CSS + JS included
     Usage: @include('Component.hero')
     ============================================================ --}}

{{-- ===== CSS (injected once per page) ===== --}}
@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
    @endpush
@endonce

{{-- ===== HERO MARKUP ===== --}}
<section class="hero" id="hero">
    {{-- 3D Background Layer --}}
    <div class="hero__bg" data-parallax>
        <img src="{{ asset('Assets/img1.jpg') }}"
             alt="Desk with accounting tools"
             class="hero__bg-img"
             loading="eager">
        <div class="hero__bg-overlay"></div>
        <div class="hero__bg-glow"></div>
    </div>

    {{-- Floating Glass Nav --}}
    <nav class="hero__nav glass" data-parallax-layer="0.02">
        <div class="hero__nav-inner">
            <a href="{{ url('/') }}" class="hero__logo">
                <span class="hero__logo-mark"></span>
                <span class="hero__logo-text">
                    <strong>TAX PLUS</strong>
                    <small>We think beyond the numbers</small>
                </span>
            </a>
            <ul class="hero__nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/faqs') }}">FAQs</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
            <a href="{{ url('/contact') }}" class="hero__nav-cta">Get In Touch</a>
        </div>
    </nav>

    {{-- Main Hero Content --}}
    <div class="hero__content" data-parallax-layer="0.05">
        <div class="hero__eyebrow glass-chip">
            <span class="hero__eyebrow-dot"></span>
            Trusted by 500+ UK businesses
        </div>

        <h1 class="hero__title">
            Smart Solutions for<br>
            <span class="hero__title-accent">Tax &amp; Accounting</span>
        </h1>

        <p class="hero__subtitle">
            Streamlined, Accurate, and Stress-Free Financial Management for Your Business
        </p>

        <div class="hero__actions">
            <a href="{{ url('/contact') }}" class="hero__btn hero__btn--primary">
                <span class="hero__btn-label">Get in Touch</span>
                <span class="hero__btn-flash" aria-hidden="true"></span>
            </a>
            <a href="{{ url('/services') }}" class="hero__btn hero__btn--ghost">
                See Services
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        {{-- Floating Glass Stat Chips --}}
        <div class="hero__stats">
            <div class="glass-chip glass-chip--stat">
                <span class="hero__stat-num">4.9<span>/5</span></span>
                <span class="hero__stat-label">Client Rating</span>
            </div>
            <div class="glass-chip glass-chip--stat">
                <span class="hero__stat-num">£2.4M</span>
                <span class="hero__stat-label">Saved for Clients</span>
            </div>
            <div class="glass-chip glass-chip--stat">
                <span class="hero__stat-num">12+</span>
                <span class="hero__stat-label">Years Experience</span>
            </div>
        </div>
    </div>

    {{-- Scroll Cue --}}
    <div class="hero__scroll" data-parallax-layer="0.08">
        <span></span>
    </div>
</section>

{{-- ===== JS (injected once per page, deferred) ===== --}}
@once
    @push('scripts')
        <script src="{{ asset('js/hero.js') }}" defer></script>
    @endpush
@endonce