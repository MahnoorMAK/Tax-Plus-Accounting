/**
 * Testimonials Section
 * - Scroll reveal
 * - Subtle 3D tilt on the image
 * - Respects prefers-reduced-motion
 */

(function () {
    'use strict';

    var section = document.querySelector('[data-tst]');
    if (!section) return;

    if (section.dataset.tstInit === '1') return;
    section.dataset.tstInit = '1';

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------- SCROLL REVEAL ---------- */
    var revealEls = section.querySelectorAll('[data-tst-reveal]');

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

    /* ---------- 3D TILT ON IMAGE ---------- */
    if (reduced) return;
    if (!window.matchMedia('(pointer: fine)').matches) return;

    var frame = section.querySelector('.tst__media-frame');
    if (!frame) return;

    var MAX_TILT = 7;
    var targetRX = 0, targetRY = 0;
    var currentRX = 0, currentRY = 0;
    var running = false;
    var SETTLE = 0.05;

    function onMove(e) {
        var rect = frame.getBoundingClientRect();
        var x = (e.clientX - rect.left) / rect.width  - 0.5;
        var y = (e.clientY - rect.top)  / rect.height - 0.5;

        targetRY =  x * MAX_TILT * 2;
        targetRX = -y * MAX_TILT * 2;

        kick();
    }

    function onLeave() {
        targetRX = 0;
        targetRY = 0;
        kick();
    }

    function apply() {
        frame.style.transform =
            'perspective(1000px) rotateX(' + currentRX.toFixed(2) + 'deg) rotateY(' + currentRY.toFixed(2) + 'deg)';
    }

    function step() {
        var dx = targetRX - currentRX;
        var dy = targetRY - currentRY;

        currentRX += dx * 0.12;
        currentRY += dy * 0.12;

        if (Math.abs(dx) < SETTLE && Math.abs(dy) < SETTLE) {
            currentRX = targetRX;
            currentRY = targetRY;
            apply();
            running = false;
            return;
        }

        apply();
        requestAnimationFrame(step);
    }

    function kick() {
        if (!running) {
            running = true;
            requestAnimationFrame(step);
        }
    }

    frame.addEventListener('mousemove', onMove);
    frame.addEventListener('mouseleave', onLeave);
})();