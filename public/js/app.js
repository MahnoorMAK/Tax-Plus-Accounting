/**
 * APP.JS — Global layout behavior + shared scroll reveal
 *
 * Responsibilities:
 *  1. Header: shrink/darken on scroll (throttled)
 *  2. Header: mobile hamburger menu
 *  3. Global: reveal-on-scroll for any element with [data-reveal]
 *  4. Global: pause continuous animations while scrolling
 *
 * Section-specific behavior (hero parallax, 3D tilt, form submit, etc.)
 * lives in that section's own JS file.
 */

(function () {
    'use strict';

    /* ==========================================================
       1. HEADER — SCROLLED STATE (throttled)
       ========================================================== */
    var header = document.getElementById('site-header');
    var SCROLL_THRESHOLD = 40;
    var ticking = false;

    function updateScrolled() {
        if (!header) return;
        if (window.scrollY > SCROLL_THRESHOLD) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
        ticking = false;
    }

    function onScroll() {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(updateScrolled);
        }
    }

    if (header) {
        window.addEventListener('scroll', onScroll, { passive: true });
        updateScrolled(); // initial state
    }

    /* ==========================================================
       2. HEADER — MOBILE MENU
       ========================================================== */
    var burger = document.getElementById('hdr-burger');
    var mobile = document.getElementById('hdr-mobile');

    if (header && burger && mobile) {

        function closeMenu() {
            burger.setAttribute('aria-expanded', 'false');
            mobile.hidden = true;
        }

        function openMenu() {
            burger.setAttribute('aria-expanded', 'true');
            mobile.hidden = false;
        }

        burger.addEventListener('click', function () {
            var expanded = burger.getAttribute('aria-expanded') === 'true';
            if (expanded) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // Close when a link is tapped
        mobile.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        // Close on Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !mobile.hidden) {
                closeMenu();
            }
        });

        // Close when clicking outside
        document.addEventListener('click', function (e) {
            if (mobile.hidden) return;
            if (!header.contains(e.target)) {
                closeMenu();
            }
        });

        // Auto-close on resize to desktop
        window.addEventListener('resize', function () {
            if (window.innerWidth > 900 && !mobile.hidden) {
                closeMenu(); 
            }
        });
    }

    /* ==========================================================
       3. REVEAL ON SCROLL — universal, self-cleaning
       ========================================================== */
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!reduced && 'IntersectionObserver' in window) {
        var revealEls = document.querySelectorAll('[data-reveal]');

        if (revealEls.length) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);

                        // Drop will-change hint after animation completes
                        setTimeout(function () {
                            entry.target.style.willChange = 'auto';
                        }, 1000);
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -60px 0px'
            });

            revealEls.forEach(function (el) { io.observe(el); });
        }
    } else {
        // Fallback — show everything immediately
        document.querySelectorAll('[data-reveal]').forEach(function (el) {
            el.classList.add('is-visible');
        });
    }

    /* ==========================================================
       4. PAUSE ANIMATIONS WHILE SCROLLING
          Adds .is-scrolling to <html> while user scrolls,
          removes it ~150ms after scrolling stops.
       ========================================================== */
    (function () {
        var root = document.documentElement;
        var scrollEndTimer = null;

        function onScrollActivity() {
            if (!root.classList.contains('is-scrolling')) {
                root.classList.add('is-scrolling');
            }

            if (scrollEndTimer) clearTimeout(scrollEndTimer);
            scrollEndTimer = setTimeout(function () {
                root.classList.remove('is-scrolling');
            }, 150);
        }

        window.addEventListener('scroll', onScrollActivity, { passive: true });
    })();

    /* ==========================================================
       5. FORM — prevent demo navigation on footer/contact forms
          (Safe to remove if you wire the form to a backend.)
       ========================================================== */
    document.querySelectorAll('form[data-demo]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    });
})();