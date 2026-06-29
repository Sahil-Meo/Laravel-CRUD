@extends('layouts.app')

@section('title', 'Privacy Policy')

@push('styles')
<style>
.policy-prose h2 {
    font-size: 1.25rem; font-weight: 800; color: #111827;
    margin: 2.5rem 0 0.75rem; padding-top: 0.25rem;
}
.policy-prose h3 {
    font-size: 1.0625rem; font-weight: 700; color: #1f2937;
    margin: 1.75rem 0 0.5rem;
}
.policy-prose p {
    color: #4b5563; line-height: 1.8; margin-bottom: 1rem;
    font-size: 0.9375rem;
}
.policy-prose ul {
    list-style: none; padding: 0; margin-bottom: 1rem;
}
.policy-prose ul li {
    display: flex; align-items: flex-start; gap: 0.625rem;
    color: #4b5563; font-size: 0.9375rem;
    line-height: 1.8; margin-bottom: 0.35rem;
}
.policy-prose ul li::before {
    content: ""; display: block; width: 6px; height: 6px;
    background: #149696; border-radius: 50%; margin-top: 0.6rem; flex-shrink: 0;
}
.policy-prose a { color: #149696; text-decoration: underline; text-underline-offset: 3px; }
.policy-prose strong { color: #111827; font-weight: 700; }
.toc-link { transition: color 0.15s; }
.toc-link:hover { color: #149696; }
</style>
@endpush

@section('content')

{{-- ── HERO ── --}}
<section class="relative pt-32 pb-16 bg-gradient-to-br from-gray-950 via-gray-900 to-[#0a4f4f] overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/3 w-96 h-96 rounded-full bg-[#149696] blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-72 h-72 rounded-full bg-teal-400 blur-3xl"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4]
                     border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full
                     uppercase tracking-widest mb-6">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            Legal &amp; Privacy
        </span>
        <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Privacy Policy</h1>
        <p class="text-gray-300 text-lg max-w-xl mx-auto mb-6">
            We care deeply about your privacy. This policy explains how PostPulse
            collects, uses, and protects your personal data.
        </p>
        <div class="flex flex-wrap justify-center gap-4 text-sm text-gray-400">
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Last updated: 1 June 2026
            </span>
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                ~12 minute read
            </span>
        </div>
    </div>
</section>

{{-- ── MAIN: Sidebar TOC + Article ── --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-[260px_1fr] gap-12 items-start">

            {{-- ── Sticky Table of Contents (desktop) ── --}}
            <aside class="hidden lg:block">
                <div class="sticky top-24 bg-gray-50 rounded-2xl border border-gray-100 p-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-500 mb-4">
                        On this page
                    </p>
                    <nav class="space-y-1.5 text-sm">
                        @foreach ([
                            ['href' => '#overview',       'label' => '1. Overview'],
                            ['href' => '#information',    'label' => '2. Information We Collect'],
                            ['href' => '#how-we-use',     'label' => '3. How We Use Your Data'],
                            ['href' => '#sharing',        'label' => '4. Sharing Your Data'],
                            ['href' => '#cookies',        'label' => '5. Cookies &amp; Tracking'],
                            ['href' => '#retention',      'label' => '6. Data Retention'],
                            ['href' => '#security',       'label' => '7. Security'],
                            ['href' => '#rights',         'label' => '8. Your Rights (GDPR)'],
                            ['href' => '#children',       'label' => '9. Children\'s Privacy'],
                            ['href' => '#international',  'label' => '10. International Transfers'],
                            ['href' => '#changes',        'label' => '11. Policy Changes'],
                            ['href' => '#contact-us',     'label' => '12. Contact Us'],
                        ] as $toc)
                        <a href="{{ $toc['href'] }}"
                           class="toc-link block text-gray-600 py-1 pl-3 border-l-2 border-transparent
                                  hover:border-[#149696] hover:text-[#149696] transition-all">
                            {!! $toc['label'] !!}
                        </a>
                        @endforeach
                    </nav>
                </div>
            </aside>

            {{-- ── Article body ── --}}
            <div class="policy-prose max-w-none">

                {{-- SECTION 1 --}}
                <div id="overview" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">
                        Section 1
                    </div>
                    <h2>Overview</h2>
                    <p>PostPulse Ltd ("PostPulse", "we", "our", or "us") is committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <a href="{{ url('/') }}">postpulse.io</a> and use our services.</p>
                    <p>By using PostPulse, you agree to the collection and use of information in accordance with this policy. If you do not agree, please discontinue use of our services.</p>
                    <p><strong>Data Controller:</strong> PostPulse Ltd, 12 Talent Square, Floor 4, London EC2A 4NE, United Kingdom. Registered in England and Wales, Company No. 13456789.</p>
                </div>

                {{-- SECTION 2 --}}
                <div id="information" class="scroll-mt-28">
                    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                                text-xs font-bold px-3 py-1.5 rounded-full mb-4">
                        Section 2
                    </div>
                    <h2>Information We Collect</h2>
                    <h3>Information you provide directly</h3>
                    <ul>
                        <li>Account registration data (name, email address, password)</li>
                        <li>Profile information (professional title, location, skills, work history, education)</li>
                        <li>Uploaded documents (CV/resume, cover letters, portfolio files)</li>
                        <li>Contact form submissions and support correspondence</li>
                        <li>Payment information (processed securely by Stripe — we do not store card numbers)</li>
                        <li>Job application data including responses to employer questions</li>
                    </ul>
                    <h3>Information collected automatically</h3>
                    <ul>
                        <li>Log data (IP address, browser type, pages visited, timestamps)</li>
                        <li>Device information (operating system, screen resolution, hardware model)</li>
                        <li>Usage analytics (click patterns, search queries, features used)</li>
                        <li>Cookies and similar tracking technologies (see Section 5)</li>
                        <li>Approximate geolocation derived from IP address</li>
                    </ul>
                    <h3>Information from third parties</h3>
                    <ul>
                        <li>LinkedIn profile data if you connect your LinkedIn account</li>
                        <li>OAuth authentication data from Google Sign-In</li>
                        <li>Fraud prevention and identity verification providers</li>
                    </ul>
                </div>
