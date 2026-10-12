/**
 * Franchise + Inquiry Section
 * - Scroll reveal
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.querySelector('[data-frq]');
    if (!section) return;

    if (section.dataset.frqInit === '1') return;
    section.dataset.frqInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var revealEls = section.querySelectorAll('[data-frq-reveal]');

    if (!reduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -60px 0px'
        });

        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }

    /* ---------- FORM: prevent default on demo submit ---------- */
    var form = section.querySelector('.frq__form');
    if (form) {
        form.addEventListener('submit', function (e) {
            // Remove this block if you wire the form to a real backend.
            // For now, we prevent navigation so you can test the UI.
            e.preventDefault();
        });
    }
})();