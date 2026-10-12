/**
 * Hero Interactions
 * - 3D mouse parallax (background + content)
 * - Self-settling: stops animating once motion has decayed
 * - Respects prefers-reduced-motion
 * - Uses requestAnimationFrame only while motion is active
 */

(function () {
    'use strict';

    var hero = document.getElementById('hero');
    if (!hero) return;

    if (hero.dataset.heroInit === '1') return;
    hero.dataset.heroInit = '1';

    // Respect reduced motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    // Parallax only makes sense with a fine pointer (mouse)
    if (!window.matchMedia('(pointer: fine)').matches) return;

    var bgLayer      = hero.querySelector('[data-parallax]');
    var contentLayer = hero.querySelector('[data-parallax-layer="0.05"]');
    var scrollLayer  = hero.querySelector('[data-parallax-layer="0.08"]');

    // -------- Tuning --------
    var INTENSITY = 14;      // max px the background shifts
    var EASE      = 0.12;    // lerp speed
    var SETTLE    = 0.05;    // if delta is below this (in px), snap to target & stop RAF

    var targetX = 0, targetY = 0;
    var currentX = 0, currentY = 0;

    var rafId = null;
    var running = false;

    function applyTransforms() {
        var x = currentX.toFixed(2);
        var y = currentY.toFixed(2);

        if (bgLayer) {
            bgLayer.style.transform =
                'translate3d(' + x + 'px,' + y + 'px,0) scale(1.05)';
        }
        if (contentLayer) {
            contentLayer.style.transform =
                'translate3d(' + (-x * 0.35).toFixed(2) + 'px,' +
                              (-y * 0.35).toFixed(2) + 'px,0)';
        }
        if (scrollLayer) {
            scrollLayer.style.transform =
                'translate3d(calc(-50% + ' + (x * 0.5).toFixed(2) + 'px),' +
                              (y * 0.5).toFixed(2) + 'px,0)';
        }
    }

    function step() {
        var dx = targetX - currentX;
        var dy = targetY - currentY;

        currentX += dx * EASE;
        currentY += dy * EASE;

        // Snap when close enough — stops the endless drift
        if (Math.abs(dx) < SETTLE && Math.abs(dy) < SETTLE) {
            currentX = targetX;
            currentY = targetY;
            applyTransforms();

            running = false;
            rafId = null;
            return;
        }

        applyTransforms();
        rafId = requestAnimationFrame(step);
    }

    function kick() {
        if (!running) {
            running = true;
            rafId = requestAnimationFrame(step);
        }
    }

    function onMouseMove(e) {
        var rect = hero.getBoundingClientRect();
        var x = (e.clientX - rect.left) / rect.width  - 0.5;
        var y = (e.clientY - rect.top)  / rect.height - 0.5;

        targetX = x * INTENSITY;
        targetY = y * INTENSITY;

        kick();
    }

    function onMouseLeave() {
        targetX = 0;
        targetY = 0;
        kick();
    }

    hero.addEventListener('mousemove', onMouseMove);
    hero.addEventListener('mouseleave', onMouseLeave);

    /* ---------- Button ripple on click ---------- */
    var primaryBtn = hero.querySelector('.hero__btn--primary');
    if (primaryBtn) {
        primaryBtn.addEventListener('click', function (e) {
            var rect = primaryBtn.getBoundingClientRect();
            var size = Math.max(rect.width, rect.height);
            var ripple = document.createElement('span');
            ripple.style.cssText =
                'position:absolute;' +
                'width:' + size + 'px;height:' + size + 'px;' +
                'left:' + (e.clientX - rect.left - size / 2) + 'px;' +
                'top:' + (e.clientY - rect.top - size / 2) + 'px;' +
                'border-radius:50%;' +
                'background:rgba(255,255,255,0.35);' +
                'pointer-events:none;' +
                'transform:scale(0);' +
                'animation:rippleAnim 0.6s ease-out forwards;' +
                'z-index:1;';
            primaryBtn.appendChild(ripple);
            setTimeout(function () { ripple.remove(); }, 700);
        });
    }
})();