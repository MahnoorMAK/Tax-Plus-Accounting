<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tax Plus Accounting')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Layout stylesheet (base + header + footer) --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Section stylesheets pushed by components --}}
    @stack('styles')
</head>
<body>

{{-- ============================================================
     HEADER
     ============================================================ --}}
<header class="hdr glass" id="site-header">
    <div class="hdr__inner">

        <a href="{{ url('/') }}" class="hdr__logo">
            <img src="{{ asset('Assets/img2.png') }}"
                 alt="Tax Plus Accounting"
                 class="hdr__logo-img">
        </a>

        <ul class="hdr__links">
            <li><a href="{{ url('/') }}"         class="{{ request()->is('/')        ? 'is-active' : '' }}">Home</a></li>
            <li><a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'is-active' : '' }}">Services</a></li>
            <li><a href="{{ url('/about') }}"    class="{{ request()->is('about')    ? 'is-active' : '' }}">About Us</a></li>
            <li><a href="{{ url('/faqs') }}"     class="{{ request()->is('faqs')     ? 'is-active' : '' }}">FAQs</a></li>
            <li><a href="{{ url('/blog') }}"     class="{{ request()->is('blog*')    ? 'is-active' : '' }}">Blog</a></li>
            <li><a href="{{ url('/contact') }}"  class="{{ request()->is('contact')  ? 'is-active' : '' }}">Contact Us</a></li>
        </ul>

        <a href="{{ url('/contact') }}" class="hdr__cta">Get In Touch</a>

        <button class="hdr__burger" id="hdr-burger" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>

    <div class="hdr__mobile" id="hdr-mobile" hidden>
        <ul class="hdr__mobile-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
            <li><a href="{{ url('/faqs') }}">FAQs</a></li>
            <li><a href="{{ url('/blog') }}">Blog</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        </ul>
        <a href="{{ url('/contact') }}" class="hdr__mobile-cta">Get In Touch</a>
    </div>
</header>

{{-- ============================================================
     PAGE CONTENT
     ============================================================ --}}
<main>
    @yield('content')
</main>

{{-- ============================================================
     FOOTER
     ============================================================ --}}
<footer class="ftr" id="site-footer">
    <div class="ftr__glow ftr__glow--1" aria-hidden="true"></div>
    <div class="ftr__glow ftr__glow--2" aria-hidden="true"></div>
    <div class="ftr__top-line" aria-hidden="true"></div>

    <div class="ftr__inner">

        <div class="ftr__col ftr__col--about">
            <a href="{{ url('/') }}" class="ftr__logo">
                <img src="{{ asset('Assets/img2.png') }}"
                     alt="Tax Plus Accounting"
                     class="ftr__logo-img">
            </a>
            <h3 class="ftr__heading">About Us</h3>
            <p class="ftr__text">
                TaxPlus Accounting is dedicated to delivering expert tax and accounting
                solutions customized to your requirements. Our mission is to facilitate
                your financial success through integrity, professionalism, and
                personalized service.
            </p>
            <div class="ftr__socials">
                <a href="#" class="ftr__social" aria-label="Facebook">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.51 1.49-3.89 3.77-3.89 1.09 0 2.24.19 2.24.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.89h-2.33v6.99A10 10 0 0 0 22 12z"/></svg>
                </a>
                <a href="#" class="ftr__social" aria-label="Twitter">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23 4.94c-.82.36-1.7.6-2.62.72a4.55 4.55 0 0 0 2-2.51c-.88.52-1.85.9-2.89 1.1A4.54 4.54 0 0 0 11.7 8.4c0 .35.04.7.11 1.03A12.87 12.87 0 0 1 2.5 4.5a4.53 4.53 0 0 0 1.4 6.05 4.5 4.5 0 0 1-2.05-.57v.06c0 2.2 1.56 4.03 3.63 4.45a4.56 4.56 0 0 1-2.05.08 4.54 4.54 0 0 0 4.24 3.15A9.1 9.1 0 0 1 1 19.54a12.83 12.83 0 0 0 6.95 2.04c8.34 0 12.9-6.9 12.9-12.9 0-.2 0-.39-.01-.58A9.2 9.2 0 0 0 23 4.94z"/></svg>
                </a>
                <a href="#" class="ftr__social" aria-label="Instagram">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="ftr__col">
            <h3 class="ftr__heading">Important Links</h3>
            <ul class="ftr__links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                <li><a href="{{ url('/terms') }}">Term of Services</a></li>
                <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ url('/sitemap') }}">Sitemap</a></li>
            </ul>
        </div>

        <div class="ftr__col">
            <h3 class="ftr__heading">Opening Hours</h3>
            <ul class="ftr__hours">
                <li><span>Monday</span><span>9AM - 5PM</span></li>
                <li><span>Tuesday</span><span>9AM - 5PM</span></li>
                <li><span>Wednesday</span><span>9AM - 5PM</span></li>
                <li><span>Thursday</span><span>9AM - 5PM</span></li>
                <li><span>Friday</span><span>9AM - 5PM</span></li>
                <li><span>Saturday</span><span>9AM - 5PM</span></li>
                <li class="ftr__hours-closed"><span>Sunday</span><span>Closed</span></li>
            </ul>
        </div>

        <div class="ftr__col">
            <h3 class="ftr__heading">Tax Plus Accounting</h3>
            <ul class="ftr__contact">
                <li>
                    <span class="ftr__contact-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </span>
                    <a href="tel:0203900406">0203900406</a>
                </li>
                <li>
                    <span class="ftr__contact-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>
                    <a href="mailto:taxplusaccounting@yahoo.com">taxplusaccounting@yahoo.com</a>
                </li>
                <li>
                    <span class="ftr__contact-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </span>
                    <span>325 Thorold Road Ilford IG1 4HG</span>
                </li>
            </ul>
        </div>

    </div>

    <div class="ftr__bottom">
        <div class="ftr__bottom-inner">
            <p class="ftr__copyright">
                Copyright {{ date('Y') }} <strong>Tax Plus Accounting</strong>. All Rights Reserved.
                <span class="ftr__credit">By <a href="#">I Vision Tech</a></span>
            </p>
        </div>
    </div>
</footer>

{{-- Layout script (header behavior) --}}
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- Section scripts pushed by components --}}
@stack('scripts')
</body>
</html>