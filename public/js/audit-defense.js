/**
 * Audit Defense — Ambient Focus Section
 * - Scroll-triggered reveal
 * - Gentle parallax on the full-bleed image
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.querySelector('[data-audit]');
    if (!section) return;

    if (section.dataset.auditInit === '1') return;
    section.dataset.auditInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- SCROLL REVEAL ---------- */
    var revealEls = section.querySelectorAll('[data-audit-reveal]');

    if (!reduced && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -60px 0px'
        });

        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    }

    /* ---------- PARALLAX ON BG IMAGE ---------- */
    if (reduced) return;

    var bgImg = section.querySelector('.audit__bg-img');
    if (!bgImg) return;

    var ticking = false;

    function update() {
        var rect = section.getBoundingClientRect();
        var winH = window.innerHeight;

        if (rect.bottom < 0 || rect.top > winH) {
            ticking = false;
            return;
        }

        // -1 (entering) → 1 (leaving)
        var progress = (rect.top + rect.height / 2 - winH / 2) / (winH / 2 + rect.height / 2);

        // ±25px parallax translate
        var yOffset = progress * 25;

        bgImg.style.transform =
            'translate3d(0,' + yOffset.toFixed(2) + 'px,0) scale(1.08)';

        ticking = false;
    }

    function onScroll() {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(update);
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    update();
})();