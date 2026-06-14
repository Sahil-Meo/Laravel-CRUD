/**
 * public/js/components/faq-accordion.js
 * ─────────────────────────────────────────────────────────────────────────────
 * PostPulse — FAQ accordion controller.
 *
 * Behaviour:
 *   - Clicking a trigger opens its panel and closes any other open panel
 *     (one-open-at-a-time accordion)
 *   - Height animates via max-height + cubic-bezier easing (no layout thrash)
 *   - Active item: number badge fills teal, chevron rotates 180°, border highlights
 *   - Keyboard accessible: Enter / Space toggle; supports aria-expanded
 *   - Works for any number of [data-faq-item] elements on the page
 * ─────────────────────────────────────────────────────────────────────────────
 */

(function (doc) {
    'use strict';

    var items = Array.prototype.slice.call(
        doc.querySelectorAll('[data-faq-item]')
    );

    if (!items.length) return;

    // ── Per-item state helper ────────────────────────────────────────────────
    function getEls(item) {
        return {
            trigger  : item.querySelector('[data-faq-trigger]'),
            panel    : item.querySelector('[data-faq-panel]'),
            chevron  : item.querySelector('.faq-chevron'),
            badge    : item.querySelector('.faq-badge'),
            iconWrap : item.querySelector('.faq-icon'),
        };
    }

    // ── Open an item ─────────────────────────────────────────────────────────
    function open(item) {
        var el = getEls(item);
        if (!el.trigger || !el.panel) return;

        // Measure natural height first
        el.panel.style.maxHeight = 'none';
        var fullHeight = el.panel.scrollHeight + 'px';
        el.panel.style.maxHeight = '0';

        // Force reflow then animate
        el.panel.getBoundingClientRect();
        el.panel.style.maxHeight = fullHeight;

        el.trigger.setAttribute('aria-expanded', 'true');
        item.classList.add('border-[#149696]/30', 'shadow-sm');
        item.classList.remove('border-gray-100');

        if (el.chevron)  el.chevron.style.transform  = 'rotate(180deg)';
        if (el.badge)  { el.badge.style.background   = '#149696'; el.badge.style.color = '#fff'; }
        if (el.iconWrap) { el.iconWrap.style.background = '#e6f7f7'; el.iconWrap.style.borderColor = 'rgba(20,150,150,0.4)'; }

        item.__faqOpen = true;
    }

    // ── Close an item ────────────────────────────────────────────────────────
    function close(item) {
        var el = getEls(item);
        if (!el.trigger || !el.panel) return;

        el.panel.style.maxHeight = '0';
        el.trigger.setAttribute('aria-expanded', 'false');

        item.classList.remove('border-[#149696]/30', 'shadow-sm');
        item.classList.add('border-gray-100');

        if (el.chevron)  el.chevron.style.transform  = 'rotate(0deg)';
        if (el.badge)  { el.badge.style.background   = ''; el.badge.style.color = ''; }
        if (el.iconWrap) { el.iconWrap.style.background = ''; el.iconWrap.style.borderColor = ''; }

        item.__faqOpen = false;
    }

    // ── Toggle ───────────────────────────────────────────────────────────────
    function toggle(item) {
        if (item.__faqOpen) {
            close(item);
        } else {
            // Close all other open items first
            items.forEach(function (other) {
                if (other !== item && other.__faqOpen) close(other);
            });
            open(item);
        }
    }

    // ── Wire up triggers ─────────────────────────────────────────────────────
    items.forEach(function (item) {
        item.__faqOpen = false;
        var trigger = item.querySelector('[data-faq-trigger]');
        if (!trigger) return;

        trigger.addEventListener('click', function () { toggle(item); });

        // Keyboard support (button already handles Enter/Space natively,
        // but this ensures consistent behaviour across all browsers)
        trigger.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggle(item);
            }
        });
    });

    // ── Open first item by default ───────────────────────────────────────────
    if (items[0]) open(items[0]);

}(document));
