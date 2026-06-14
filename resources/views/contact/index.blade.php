@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════
     1. PAGE HERO
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="relative pt-32 pb-20 bg-gradient-to-br from-gray-950 via-gray-900 to-[#0a4f4f]
                overflow-hidden">

    {{-- Background texture --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-96 h-96 rounded-full bg-[#149696] blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-teal-400 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4]
                     border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full
                     uppercase tracking-widest mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-[#149696] animate-pulse"></span>
            Get in touch
        </span>
        <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-5">
            We'd love to<br>
            <span class="text-[#4dd4d4]">hear from you</span>
        </h1>
        <p class="text-lg text-gray-300 max-w-xl mx-auto mb-10">
            Whether you have a question, a partnership idea, or just want to say hello —
            our team is here and ready to help.
        </p>

        {{-- Quick-action pills --}}
        <div class="flex flex-wrap justify-center gap-3">
            @foreach ([
                ['label' => '💬  General Enquiry',  'anchor' => '#contact-form'],
                ['label' => '🛠  Technical Support', 'anchor' => '#contact-form'],
                ['label' => '🤝  Partnerships',      'anchor' => '#contact-form'],
                ['label' => '📰  Press & Media',     'anchor' => '#contact-form'],
            ] as $pill)
            <a href="{{ $pill['anchor'] }}"
               class="text-sm text-gray-300 border border-white/15 px-4 py-2 rounded-full
                      hover:border-[#149696] hover:text-[#4dd4d4] transition-colors
                      hover:bg-[#149696]/10">
                {{ $pill['label'] }}
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     2. MAIN CONTENT — FORM + CONTACT INFO SIDEBAR
     ═══════════════════════════════════════════════════════════════════════ --}}
<section id="contact-form" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-5 gap-12">

            {{-- ── LEFT: Contact Form (3/5 width) ── --}}
            <div class="lg:col-span-3">

                {{-- Success flash --}}
                @if (session('success'))
                <div class="flex items-start gap-3 bg-emerald-50 border border-emerald-200
                            rounded-2xl px-5 py-4 mb-8">
                    <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center
                                shrink-0">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                             stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-emerald-800">Message sent!</p>
                        <p class="text-sm text-emerald-700 mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
                @endif

                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-2">
                        Send us a message
                    </h2>
                    <p class="text-gray-500">
                        Fill in the form below and we'll respond within one business day.
                    </p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST"
                      id="contact-form-el" novalidate
                      class="space-y-6">
                    @csrf

                    {{-- Name + Email row --}}
                    <div class="grid sm:grid-cols-2 gap-5">

                        {{-- Name --}}
                        <div>
                            <label for="name"
                                   class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0
                                             flex items-center pl-3.5">
                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </span>
                                <input type="text" id="name" name="name"
                                       value="{{ old('name') }}"
                                       placeholder="Your full name"
                                       autocomplete="name"
                                       required
                                       class="w-full pl-10 pr-4 py-3 text-sm border rounded-xl
                                              bg-gray-50 transition
                                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                                              focus:border-[#149696] placeholder-gray-400
                                              @error('name') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                            </div>
                            @error('name')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email"
                                   class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0
                                             flex items-center pl-3.5">
                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </span>
                                <input type="email" id="email" name="email"
                                       value="{{ old('email') }}"
                                       placeholder="you@example.com"
                                       autocomplete="email"
                                       required
                                       class="w-full pl-10 pr-4 py-3 text-sm border rounded-xl
                                              bg-gray-50 transition
                                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                                              focus:border-[#149696] placeholder-gray-400
                                              @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                            </div>
                            @error('email')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Phone + Subject row --}}
                    <div class="grid sm:grid-cols-2 gap-5">

                        {{-- Phone --}}
                        <div>
                            <label for="phone"
                                   class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Phone Number
                                <span class="text-gray-400 font-normal ml-1">— optional</span>
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0
                                             flex items-center pl-3.5">
                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </span>
                                <input type="tel" id="phone" name="phone"
                                       value="{{ old('phone') }}"
                                       placeholder="+44 20 7946 0000"
                                       autocomplete="tel"
                                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200
                                              rounded-xl bg-gray-50 transition
                                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                                              focus:border-[#149696] placeholder-gray-400">
                            </div>
                        </div>

                        {{-- Subject --}}
                        <div>
                            <label for="subject"
                                   class="block text-sm font-semibold text-gray-700 mb-1.5">
                                Subject <span class="text-red-500">*</span>
                            </label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-3 text-sm border rounded-xl bg-gray-50
                                           text-gray-700 transition
                                           focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                                           focus:border-[#149696]
                                           @error('subject') border-red-400 bg-red-50 @else border-gray-200 @enderror">
                                <option value="" disabled {{ old('subject') ? '' : 'selected' }}>
                                    Select a subject…
                                </option>
                                @foreach ($subjects as $s)
                                <option value="{{ $s }}"
                                        {{ old('subject') === $s ? 'selected' : '' }}>
                                    {{ $s }}
                                </option>
                                @endforeach
                            </select>
                            @error('subject')
                            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Message --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="message"
                                   class="text-sm font-semibold text-gray-700">
                                Message <span class="text-red-500">*</span>
                            </label>
                            <span class="text-xs text-gray-400" id="msg-count">0 / 3000</span>
                        </div>
                        <textarea id="message" name="message" rows="7"
                                  maxlength="3000" required
                                  placeholder="Tell us how we can help. Include as much detail as you'd like…"
                                  oninput="document.getElementById('msg-count').textContent = this.value.length + ' / 3000'"
                                  class="w-full px-4 py-3 text-sm border rounded-xl bg-gray-50
                                         resize-none transition placeholder-gray-400
                                         focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                                         focus:border-[#149696]
                                         @error('message') border-red-400 bg-red-50 @else border-gray-200 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Privacy note + Submit --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center
                                justify-between gap-4 pt-2">

                        <p class="text-xs text-gray-400 max-w-xs leading-relaxed">
                            By submitting this form you agree to our
                            <a href="#" class="text-[#149696] hover:underline">Privacy Policy</a>.
                            We'll never share your details with third parties.
                        </p>

                        <button type="submit"
                                id="contact-submit"
                                class="shrink-0 inline-flex items-center gap-2 bg-[#149696]
                                       text-white font-semibold px-8 py-3 rounded-xl
                                       hover:bg-[#0f7a7a] active:scale-[0.98] transition-all
                                       shadow-lg shadow-[#149696]/20 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span id="submit-text">Send Message</span>
                            <svg id="submit-spinner"
                                 class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                        </button>

                    </div>

                </form>
            </div>

            {{-- ── RIGHT: Contact Info Sidebar (2/5 width) ── --}}
            <div class="lg:col-span-2 space-y-5">

                <div class="mb-2">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Contact info</h2>
                    <p class="text-sm text-gray-500">
                        Prefer to reach us directly? Here are all the ways you can get in touch.
                    </p>
                </div>

                @foreach ($contactInfo as $info)
                <div class="group bg-gray-50 border border-gray-100 rounded-2xl p-5
                            hover:border-[#149696]/30 hover:shadow-md transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl {{ $info['color'] }} flex items-center
                                    justify-center shrink-0 group-hover:scale-105 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="{{ $info['icon'] }}"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900 mb-1">{{ $info['label'] }}</p>
                            @foreach ($info['lines'] as $line)
                                @if (isset($info['href']) && $loop->first)
                                <a href="{{ $info['href'] }}"
                                   class="text-sm text-[#149696] hover:underline font-medium block">
                                    {{ $line }}
                                </a>
                                @else
                                <p class="text-sm text-gray-500">{{ $line }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- Social Links --}}
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
                    <p class="text-sm font-bold text-gray-900 mb-3">Follow PostPulse</p>
                    <div class="flex items-center gap-3">
                        @foreach ([
                            ['label' => 'LinkedIn', 'href' => '#', 'icon' => 'M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z'],
                            ['label' => 'Twitter',  'href' => '#', 'icon' => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
                            ['label' => 'Instagram','href' => '#', 'icon' => 'M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z'],
                        ] as $social)
                        <a href="{{ $social['href'] }}"
                           aria-label="{{ $social['label'] }}"
                           class="w-9 h-9 rounded-xl bg-white border border-gray-200
                                  flex items-center justify-center text-gray-500
                                  hover:border-[#149696] hover:text-[#149696]
                                  transition-colors shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="{{ $social['icon'] }}"/>
                            </svg>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Response time badge --}}
                <!-- <div class="flex items-center gap-3 bg-[#e6f7f7] rounded-2xl px-5 py-4
                            border border-[#149696]/20">
                    <span class="flex h-3 w-3 shrink-0">
                        <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full
                                     bg-[#149696] opacity-50"></span>
                        <span class="relative inline-flex h-3 w-3 rounded-full bg-[#149696]"></span>
                    </span>
                    <p class="text-sm text-[#0f7a7a] font-semibold">
                        Average response time: <span class="text-[#149696]">under 4 hours</span>
                        during business hours
                    </p>
                </div> -->

            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     3. FAQ ACCORDION
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-slate-50 border-t border-gray-100">
    <div class="max-w-3xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-12">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                Quick Answers
            </span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-3">
                Frequently asked questions
            </h2>
            <p class="text-gray-500">
                Can't find what you're looking for?
                <button data-open-login
                        class="text-[#149696] hover:underline font-semibold">
                    Sign in
                </button>
                to access live chat support.
            </p>
        </div>

        {{-- Accordion --}}
        <div class="space-y-3" id="faq-accordion">

            @php
            $faqs = [
                ['q' => 'How do I post a job on PostPulse?',
                 'a' => 'Create a free employer profile, choose a plan, then click "Post a Job". Your listing goes live within minutes and is immediately visible to thousands of active job seekers.'],
                ['q' => 'Is PostPulse free for job seekers?',
                 'a' => 'Yes — creating a profile, browsing all job listings, and applying to any role are completely free for candidates. We never charge job seekers.'],
                ['q' => 'How long does it take to hear back from employers?',
                 'a' => 'It varies by employer, but our featured listings average a first contact within 48 hours of applying. You\'ll receive an email notification the moment an employer responds.'],
                ['q' => 'Can I edit or remove my job listing?',
                 'a' => 'Absolutely. Employers can edit, pause, or permanently close any listing at any time directly from their employer dashboard. Changes go live instantly.'],
                ['q' => 'What payment methods do you accept?',
                 'a' => 'We accept all major credit and debit cards (Visa, Mastercard, Amex), PayPal, and bank transfers for annual enterprise plans. All payments are secured by Stripe.'],
                ['q' => 'How do I report a suspicious listing?',
                 'a' => 'Click the "Report" flag on any job listing page. Our trust and safety team reviews every report within 2 hours and will remove any listing that violates our policies.'],
                ['q' => 'Can I apply to multiple jobs at once?',
                 'a' => 'Yes. With a PostPulse profile you can apply to as many roles as you like with a single click. Your profile, CV, and preferences are sent automatically each time.'],
                ['q' => 'How does the AI job matching work?',
                 'a' => 'Our matching engine analyses your skills, experience, location preferences, and past applications to surface the most relevant roles. The more you use PostPulse, the more accurate it becomes.'],
            ];
            @endphp

            @foreach ($faqs as $i => $faq)
            <div class="faq-item bg-white rounded-2xl border border-gray-100 overflow-hidden
                        transition-all duration-200 hover:border-[#149696]/20 hover:shadow-sm"
                 data-faq-item>

                {{-- Question button --}}
                <button type="button"
                        class="faq-trigger w-full flex items-center justify-between gap-4
                               px-6 py-5 text-left group"
                        data-faq-trigger
                        aria-expanded="false"
                        aria-controls="faq-panel-{{ $i }}">

                    <div class="flex items-center gap-4">
                        {{-- Number badge --}}
                        <span class="faq-badge shrink-0 w-7 h-7 rounded-lg bg-[#e6f7f7]
                                     text-[#149696] text-xs font-black flex items-center
                                     justify-center transition-colors duration-200">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="text-sm font-bold text-gray-900 group-hover:text-[#149696]
                                     transition-colors duration-200">
                            {{ $faq['q'] }}
                        </span>
                    </div>

                    {{-- Chevron icon --}}
                    <span class="faq-icon shrink-0 w-8 h-8 rounded-full border border-gray-200
                                 flex items-center justify-center transition-all duration-300
                                 group-hover:border-[#149696]/40 group-hover:bg-[#e6f7f7]">
                        <svg class="w-4 h-4 text-gray-400 transition-transform duration-300
                                    group-hover:text-[#149696] faq-chevron"
                             fill="none" stroke="currentColor" stroke-width="2.5"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </span>

                </button>

                {{-- Answer panel --}}
                <div id="faq-panel-{{ $i }}"
                     class="faq-panel overflow-hidden"
                     style="max-height: 0; transition: max-height 0.35s cubic-bezier(0.4,0,0.2,1);"
                     data-faq-panel>
                    <div class="px-6 pb-5 pt-1 flex gap-4">
                        {{-- Indent spacer aligns answer with question text --}}
                        <div class="w-7 shrink-0"></div>
                        <p class="text-sm text-gray-500 leading-relaxed">
                            {{ $faq['a'] }}
                        </p>
                    </div>
                </div>

            </div>
            @endforeach

        </div>{{-- /accordion --}}

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     4. INTERACTIVE MAP
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 pt-6 pb-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-900">Find us</h2>
                <p class="text-sm text-gray-500 mt-0.5">
                    12 Talent Square, Floor 4, London EC2A 4NE
                </p>
            </div>
            <a href="https://maps.google.com/?q=12+Talent+Square+London+EC2A+4NE"
               target="_blank" rel="noopener"
               class="shrink-0 inline-flex items-center gap-2 text-sm font-semibold
                      text-[#149696] border border-[#149696]/30 px-4 py-2 rounded-xl
                      hover:bg-[#e6f7f7] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Open in Google Maps
            </a>
        </div>
    </div>

    {{-- Map iframe — OpenStreetMap (no API key required) --}}
    <div class="relative w-full overflow-hidden" style="height: 440px;">
        <iframe
            title="PostPulse Office Location"
            src="https://www.openstreetmap.org/export/embed.html?bbox=-0.0892%2C51.5180%2C-0.0762%2C51.5260&amp;layer=mapnik&amp;marker=51.5220%2C-0.0827"
            class="w-full h-full border-0"
            loading="lazy"
            allowfullscreen>
        </iframe>

        {{-- Custom overlay pin card --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 sm:left-8 sm:translate-x-0
                    bg-white rounded-2xl shadow-xl border border-gray-100 px-5 py-4
                    flex items-center gap-4 pointer-events-none"
             style="min-width: 240px">
            <div class="w-10 h-10 rounded-xl bg-[#149696] flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-extrabold text-gray-900">PostPulse HQ</p>
                <p class="text-xs text-gray-500">12 Talent Square, London</p>
                <div class="flex items-center gap-1 mt-1">
                    <span class="w-2 h-2 rounded-full bg-green-400"></span>
                    <span class="text-xs text-green-600 font-medium">Open now</span>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     5. BOTTOM CTA BAND
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-16 bg-[#149696]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-2xl font-extrabold text-white mb-1">
                    Not sure where to start?
                </h3>
                <p class="text-teal-200 text-sm">
                    Browse our help centre or get instant answers in our live chat.
                </p>
            </div>
            <div class="flex flex-wrap gap-4 shrink-0">
                <a href="#"
                   class="inline-flex items-center gap-2 bg-white text-[#0f7a7a] font-semibold
                          px-6 py-3 rounded-xl hover:bg-[#e6f7f7] transition-colors shadow-sm text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Help Centre
                </a>
                <button type="button"
                        data-open-login
                        class="inline-flex items-center gap-2 border-2 border-white/30 text-white
                               font-semibold px-6 py-3 rounded-xl hover:bg-white/10
                               transition-colors text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    Live Chat
                </button>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/components/contact-form.js') }}" defer></script>
<script src="{{ asset('js/components/faq-accordion.js') }}" defer></script>
@endpush
