/**
 * public/js/components/stories-slider.js
 * ─────────────────────────────────────────────────────────────────────────────
 * StoriesSlider — Infinite-loop, drag/swipe, momentum-scrolling carousel.
 *
 * Served as a plain static file via asset('js/components/stories-slider.js').
 * No build step required. Exposes window.StoriesSlider for optional manual use.
 *
 * Auto-init: any element with [data-stories-track] is booted on DOMContentLoaded.
 *
 * Manual init:
 *   StoriesSlider.init('[data-stories-track]');   // CSS selector
 *   StoriesSlider.init(someElement);              // direct element
 * ─────────────────────────────────────────────────────────────────────────────
 */

(function (global) {
    'use strict';

    // ── Internal: boot one track element ────────────────────────────────────
    function boot(track) {
        // Guard: skip if already initialised or empty
        if (!track || track.__sliderBooted) return;
        track.__sliderBooted = true;

        // 1. Gather original slide cards
        var origCards = Array.prototype.slice.call(track.querySelectorAll('[data-slide]'));
        if (!origCards.length) return;

        // 2. Clone each card and append — creates the seamless loop
        origCards.forEach(function (card) {
            var clone = card.cloneNode(true);
            clone.setAttribute('aria-hidden', 'true');
            track.appendChild(clone);
        });

        // 3. State
        var GAP        = 24;    // px — matches Tailwind gap-6
        var pos        = 0;     // current translateX (px)
        var speed      = 0.6;   // px per animation frame
        var autoScroll = true;
        var isDragging = false;
        var lastX      = 0;
        var velocity   = 0;
        var pauseTimer = null;

        // 4. Total width of one set of original cards (for seamless reset)
        function setWidth() {
            return origCards.reduce(function (sum, c) {
                return sum + c.offsetWidth + GAP;
            }, 0);
        }

        // 5. Apply position — normalises so pos stays in (-setWidth, 0]
        function applyPos(val) {
            var sw = setWidth();
            pos = ((val % sw) - sw) % sw;
            track.style.transform = 'translateX(' + pos + 'px)';
        }

        // 6. Animation loop
        (function tick() {
            if (autoScroll) applyPos(pos - speed);
            requestAnimationFrame(tick);
        }());

        // 7. Resume auto-scroll after a short delay post-drag
        function scheduleResume() {
            clearTimeout(pauseTimer);
            pauseTimer = setTimeout(function () { autoScroll = true; }, 1800);
        }

        // 8. Drag / swipe handlers
        function dragStart(clientX) {
            isDragging = true;
            autoScroll = false;
            lastX      = clientX;
            velocity   = 0;
            clearTimeout(pauseTimer);
            track.style.transition = 'none';
        }

        function dragMove(clientX) {
            if (!isDragging) return;
            velocity = clientX - lastX;
            lastX    = clientX;
            applyPos(pos + velocity);
        }

        function dragEnd() {
            if (!isDragging) return;
            isDragging = false;

            // Momentum: coast to a stop
            var decay = velocity;
            (function coast() {
                if (Math.abs(decay) < 0.25) { scheduleResume(); return; }
                decay *= 0.92;
                applyPos(pos + decay);
                requestAnimationFrame(coast);
            }());
        }

        // 9. Mouse events
        track.addEventListener('mousedown', function (e) {
            e.preventDefault();
            dragStart(e.clientX);
        });
        global.addEventListener('mousemove', function (e) { dragMove(e.clientX); });
        global.addEventListener('mouseup',   function ()  { dragEnd(); });

        // 10. Touch events (passive for scroll performance)
        track.addEventListener('touchstart', function (e) {
            dragStart(e.touches[0].clientX);
        }, { passive: true });

        track.addEventListener('touchmove', function (e) {
            dragMove(e.touches[0].clientX);
        }, { passive: true });

        track.addEventListener('touchend', function () { dragEnd(); });

        // 11. Hover: pause auto-scroll (desktop UX)
        track.addEventListener('mouseenter', function () {
            if (!isDragging) autoScroll = false;
        });
        track.addEventListener('mouseleave', function () {
            if (!isDragging) autoScroll = true;
        });

        // 12. Responsive speed — slower on small screens
        function updateSpeed() {
            speed = global.innerWidth < 640 ? 0.4 : 0.6;
        }
        updateSpeed();
        global.addEventListener('resize', updateSpeed, { passive: true });
    }

    // ── Public API ───────────────────────────────────────────────────────────
    var StoriesSlider = {
        /**
         * Initialise sliders.
         * @param {string|HTMLElement} target  CSS selector string or a single element.
         */
        init: function (target) {
            var elements = typeof target === 'string'
                ? Array.prototype.slice.call(document.querySelectorAll(target))
                : [target];

            elements.forEach(boot);
        }
    };

    // ── Auto-init on DOM ready ───────────────────────────────────────────────
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            StoriesSlider.init('[data-stories-track]');
        });
    } else {
        // DOM already ready (script loaded with defer / at bottom of body)
        StoriesSlider.init('[data-stories-track]');
    }

    // ── Expose globally ──────────────────────────────────────────────────────
    global.StoriesSlider = StoriesSlider;

}(window));
