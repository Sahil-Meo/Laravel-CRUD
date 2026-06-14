/**
 * public/js/components/contact-form.js
 * ─────────────────────────────────────────────────────────────────────────────
 * PostPulse — Contact form enhancements.
 *
 * Features:
 *   1. Loading state on submit (spinner + disabled button)
 *   2. Character counter for message textarea (already wired via inline oninput)
 *   3. Inline real-time validation feedback on blur
 *   4. Smooth scroll to first error on submit if server returns validation errors
 * ─────────────────────────────────────────────────────────────────────────────
 */

(function (doc) {
    'use strict';

    var form       = doc.getElementById('contact-form-el');
    var submitBtn  = doc.getElementById('contact-submit');
    var submitText = doc.getElementById('submit-text');
    var spinner    = doc.getElementById('submit-spinner');

    if (!form) return;

    // ── 1. Loading state on submit ───────────────────────────────────────────
    form.addEventListener('submit', function () {
        if (submitBtn)  submitBtn.disabled  = true;
        if (submitText) submitText.textContent = 'Sending…';
        if (spinner)    spinner.classList.remove('hidden');
    });

    // ── 2. Inline validation on blur ────────────────────────────────────────
    var TEAL_RING  = 'focus:ring-[#149696]/40 focus:border-[#149696]';
    var ERR_BORDER = 'border-red-400';
    var ERR_BG     = 'bg-red-50';

    function validate(field) {
        var val   = field.value.trim();
        var error = '';

        switch (field.id) {
            case 'name':
                if (!val) error = 'Please enter your full name.';
                break;
            case 'email':
                if (!val) {
                    error = 'Please enter your email address.';
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
                    error = 'Please enter a valid email address.';
                }
                break;
            case 'subject':
                if (!val) error = 'Please select a subject.';
                break;
            case 'message':
                if (!val) {
                    error = 'Please write your message.';
                } else if (val.length < 10) {
                    error = 'Your message must be at least 10 characters.';
                }
                break;
        }

        // Remove existing inline error
        var existingErr = field.parentElement.parentElement.querySelector('.js-inline-error');
        if (!existingErr) {
            // For select the structure differs — try grandparent
            existingErr = field.parentElement.querySelector('.js-inline-error');
        }
        if (existingErr) existingErr.remove();

        if (error) {
            field.classList.add(ERR_BORDER, ERR_BG);
            var p = doc.createElement('p');
            p.className = 'js-inline-error mt-1.5 text-xs text-red-600';
            p.textContent = error;
            field.parentElement.appendChild(p);
        } else {
            field.classList.remove(ERR_BORDER, ERR_BG);
        }
    }

    ['name', 'email', 'subject', 'message'].forEach(function (id) {
        var el = doc.getElementById(id);
        if (el) el.addEventListener('blur', function () { validate(el); });
    });

    // ── 3. Scroll to first server-side error if present ─────────────────────
    var firstError = form.querySelector('.text-red-600');
    if (firstError) {
        setTimeout(function () {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 200);
    }

}(document));
