@extends('layouts.app')

@section('title', 'Featured Jobs')

@section('content')

{{-- =====================================================================
     1. HERO
     ===================================================================== --}}
<section class="relative min-h-[80vh] flex items-center overflow-hidden bg-gray-950 pt-20">

    <div class="absolute inset-0">
        <img src="{{ $hero['image'] }}" alt="Professionals at work"
             class="w-full h-full object-cover opacity-25">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-950/85 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-24 grid lg:grid-cols-2 gap-16 items-center">
        <div>
            <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4]
                         border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full
                         mb-6 uppercase tracking-widest">
                <span class="w-1.5 h-1.5 rounded-full bg-[#149696] animate-pulse"></span>
                {{ $hero['label'] }}
            </span>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                {{ $hero['title'] }}
            </h1>
            <p class="text-lg text-gray-300 leading-relaxed mb-10 max-w-xl">
                {{ $hero['subtitle'] }}
            </p>
            <div class="flex flex-wrap gap-4 mb-14">
                <a href="{{ $hero['cta_primary']['url'] }}"
                   class="inline-flex items-center gap-2 bg-[#149696] text-white font-semibold
                          px-6 py-3 rounded-xl hover:bg-[#0f7a7a] transition-colors shadow-lg shadow-[#149696]/30">
                    {{ $hero['cta_primary']['label'] }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ $hero['cta_secondary']['url'] }}"
                   class="inline-flex items-center gap-2 border border-white/20 text-white font-semibold
                          px-6 py-3 rounded-xl hover:bg-white/10 transition-colors">
                    {{ $hero['cta_secondary']['label'] }}
                </a>
            </div>

            {{-- Stat cards --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ($hero['stats'] as $stat)
                <div class="border border-white/10 rounded-2xl px-4 py-4 bg-white/5 backdrop-blur-sm">
                    <p class="text-2xl font-extrabold text-[#4dd4d4]">{{ $stat['value'] }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Floating job preview cards --}}
        <div class="hidden lg:flex flex-col gap-4 items-end">
            <div class="w-80 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 shadow-2xl">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-rose-100 flex items-center justify-center text-rose-600 font-extrabold text-sm">A</div>
                    <div class="flex-1">
                        <p class="text-white text-sm font-semibold">Senior Product Designer</p>
                        <p class="text-gray-400 text-xs">Airbnb · Remote</p>
                    </div>
                    <span class="text-xs bg-[#149696]/30 text-[#4dd4d4] px-2 py-0.5 rounded-full font-semibold">$160k</span>
                </div>
                <div class="flex gap-2">
                    <span class="text-xs bg-white/10 text-gray-300 px-2.5 py-1 rounded-full">Design</span>
                    <span class="text-xs bg-white/10 text-gray-300 px-2.5 py-1 rounded-full">Full-time</span>
                </div>
            </div>
            <div class="w-72 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 shadow-2xl">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 font-extrabold text-sm">S</div>
                    <div>
                        <p class="text-white text-sm font-semibold">Backend Engineer</p>
                        <p class="text-gray-400 text-xs">Stripe · San Francisco</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-400">Posted 1 day ago</span>
                    <span class="text-xs bg-red-500/20 text-red-400 px-2 py-0.5 rounded-full font-semibold">Urgent</span>
                </div>
            </div>
            <div class="w-80 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 shadow-2xl">
                <p class="text-gray-400 text-xs mb-1">New applications today</p>
                <p class="text-3xl font-extrabold text-white">847</p>
                <p class="text-xs text-[#4dd4d4] mt-1">↑ 12% from yesterday</p>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 text-gray-500">
        <span class="text-xs uppercase tracking-widest">Scroll</span>
        <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- =====================================================================
     2. FILTER TOOLBAR
     ===================================================================== --}}
<section class="sticky top-16 z-40 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-3 flex flex-wrap items-center gap-3">
        @foreach (['All', 'Engineering', 'Design', 'Marketing', 'Data', 'Finance', 'HR', 'Operations', 'Infrastructure'] as $cat)
        <button class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors
            {{ $cat === 'All'
                ? 'bg-[#149696] text-white shadow-sm'
                : 'bg-gray-100 text-gray-600 hover:bg-[#e6f7f7] hover:text-[#149696]' }}">
            {{ $cat }}
        </button>
        @endforeach
        <div class="ml-auto hidden sm:flex items-center gap-2">
            <span class="text-xs text-gray-400">Sort by:</span>
            <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none
                           focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] bg-white text-gray-700">
                <option>Most Recent</option>
                <option>Highest Salary</option>
                <option>Most Relevant</option>
            </select>
        </div>
    </div>
</section>

{{-- =====================================================================
     3. FEATURED JOB LISTINGS
     ===================================================================== --}}
<section id="jobs" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
            <div>
                <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">Featured Listings</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-2">
                    {{ count($jobs) }} curated opportunities
                </h2>
            </div>
            <p class="text-sm text-gray-400">Updated daily by our curation team</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($jobs as $job)

            @php
                $badgeClasses = match($job['badgeColor']) {
                    'red'   => 'bg-red-100 text-red-700',
                    'amber' => 'bg-amber-100 text-amber-700',
                    default => 'bg-[#e6f7f7] text-[#149696]',
                };
            @endphp

            <article class="group bg-white rounded-2xl border border-gray-100 p-6
                            hover:shadow-xl hover:border-[#149696]/20 hover:-translate-y-0.5
                            transition-all duration-300 flex flex-col gap-4">

                {{-- Header --}}
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl {{ $job['logo_bg'] }} {{ $job['logo_text'] }}
                                    flex items-center justify-center font-extrabold text-base shrink-0">
                            {{ $job['logo_letter'] }}
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">{{ $job['company'] }}</p>
                            <h3 class="text-sm font-bold text-gray-900 leading-snug
                                       group-hover:text-[#149696] transition-colors">
                                {{ $job['title'] }}
                            </h3>
                        </div>
                    </div>
                    <span class="shrink-0 text-xs font-bold px-2.5 py-1 rounded-full {{ $badgeClasses }}">
                        {{ $job['badge'] }}
                    </span>
                </div>

                {{-- Description --}}
                <p class="text-xs text-gray-500 leading-relaxed line-clamp-2 flex-1">
                    {{ $job['description'] }}
                </p>

                {{-- Meta tags --}}
                <div class="flex flex-wrap gap-2 text-xs text-gray-500">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        {{ $job['location'] }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $job['salary'] }}
                    </span>
                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-between pt-3 border-t border-gray-50">
                    <div class="flex items-center gap-2">
                        <span class="text-xs bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full font-medium">
                            {{ $job['type'] }}
                        </span>
                        <span class="text-xs bg-[#e6f7f7] text-[#149696] px-2.5 py-1 rounded-full font-medium">
                            {{ $job['category'] }}
                        </span>
                    </div>
                    <span class="text-xs text-gray-400">{{ $job['posted'] }}</span>
                </div>

                <a href="#"
                   class="block text-center text-sm font-semibold text-[#149696] border border-[#149696]/30
                          py-2.5 rounded-xl hover:bg-[#149696] hover:text-white hover:border-[#149696]
                          transition-all">
                    Apply Now
                </a>

            </article>
            @endforeach
        </div>

        {{-- Load more --}}
        <div class="text-center mt-12">
            <button class="inline-flex items-center gap-2 border border-gray-200 text-gray-700 font-semibold
                           px-8 py-3 rounded-xl hover:border-[#149696] hover:text-[#149696] transition-colors">
                Load more jobs
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
        </div>

    </div>
</section>

{{-- =====================================================================
     4. SPOTLIGHT STORIES  (alternating layout)
     ===================================================================== --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 space-y-24">

        <div class="text-center max-w-2xl mx-auto">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">Success Stories</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-2">
                Careers built on PostPulse
            </h2>
        </div>

        @foreach ($spotlights as $spot)
        <div class="grid md:grid-cols-2 gap-12 items-center
                    {{ $spot['reverse'] ? 'md:[direction:rtl]' : '' }}">
            <div class="{{ $spot['reverse'] ? '[direction:ltr]' : '' }} overflow-hidden rounded-3xl shadow-xl group">
                <img src="{{ $spot['image'] }}" alt="{{ $spot['title'] }}"
                     class="w-full h-80 md:h-[420px] object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="{{ $spot['reverse'] ? '[direction:ltr]' : '' }}">
                <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                            text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-widest mb-5">
                    {{ $spot['tag'] }}
                </div>
                <h3 class="text-3xl font-extrabold text-gray-900 leading-snug mb-5">
                    {{ $spot['title'] }}
                </h3>
                <p class="text-gray-500 leading-relaxed mb-8">
                    {{ $spot['body'] }}
                </p>
                <a href="#"
                   class="inline-flex items-center gap-2 bg-[#149696] text-white font-semibold
                          px-6 py-3 rounded-xl hover:bg-[#0f7a7a] transition-colors
                          shadow-lg shadow-[#149696]/20">
                    {{ $spot['cta'] }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
        @endforeach

    </div>
</section>

{{-- =====================================================================
     5. TESTIMONIALS
     ===================================================================== --}}
<section class="py-24 bg-gray-950">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">Real Results</span>
            <h2 class="text-4xl font-extrabold text-white mt-2 mb-3">
                Hired on PostPulse
            </h2>
            <p class="text-gray-400">Thousands of professionals found their next chapter here.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($testimonials as $t)
            <div class="bg-white/5 border border-white/10 rounded-2xl p-8
                        hover:border-[#149696]/30 transition-all duration-300 flex flex-col">
                <div class="flex gap-1 mb-5">
                    @for ($i = 0; $i < $t['rating']; $i++)
                    <svg class="w-4 h-4 text-amber-400 fill-current" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <blockquote class="text-gray-300 text-sm leading-relaxed flex-1 mb-6">
                    "{{ $t['quote'] }}"
                </blockquote>
                <div class="flex items-center gap-3 pt-5 border-t border-white/10">
                    <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}"
                         class="w-10 h-10 rounded-full border-2 border-[#149696]/30">
                    <div>
                        <p class="text-white text-sm font-semibold">{{ $t['name'] }}</p>
                        <p class="text-gray-500 text-xs">{{ $t['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Hiring companies parade --}}
        <div class="mt-16 pt-12 border-t border-white/10 text-center">
            <p class="text-xs uppercase tracking-widest text-gray-600 mb-8">Companies actively hiring on PostPulse</p>
            <div class="flex flex-wrap justify-center items-center gap-10 opacity-40 grayscale">
                @foreach (['Google', 'Microsoft', 'Airbnb', 'Stripe', 'Shopify', 'Figma'] as $co)
                <span class="text-xl font-black text-white">{{ $co }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- =====================================================================
     6. PLATFORM STATS BAND
     ===================================================================== --}}
<section class="py-20 bg-[#149696]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach ($stats as $s)
            <div class="bg-white/10 rounded-2xl p-8 border border-white/15">
                <p class="text-4xl font-extrabold text-white mb-2">{{ $s['value'] }}</p>
                <p class="text-teal-100 font-semibold text-sm mb-1">{{ $s['label'] }}</p>
                <p class="text-teal-200/70 text-xs">{{ $s['sub'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- =====================================================================
     7. JOB ALERT / CTA
     ===================================================================== --}}
<section class="relative py-28 overflow-hidden bg-gray-950">
    <div class="absolute inset-0">
        <img src="{{ $cta['image'] }}" alt="" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-950/90 to-[#149696]/20"></div>
    </div>
    <div class="relative max-w-3xl mx-auto px-6 text-center">
        <div class="inline-flex items-center gap-2 bg-[#149696]/20 border border-[#149696]/30
                    text-[#4dd4d4] text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-widest mb-6">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            Never miss a great job
        </div>
        <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-4 leading-tight">
            {{ $cta['title'] }}
        </h2>
        <p class="text-gray-400 text-lg mb-10">{{ $cta['subtitle'] }}</p>

        <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto mb-4">
            <input
                type="email"
                placeholder="Enter your email for job alerts"
                class="flex-1 px-4 py-3 text-sm bg-white/10 border border-white/20 text-white
                       placeholder-gray-500 rounded-xl focus:outline-none focus:ring-2
                       focus:ring-[#149696] focus:border-[#149696] transition"
            >
            <button type="submit"
                    class="px-6 py-3 bg-[#149696] text-white text-sm font-semibold rounded-xl
                           hover:bg-[#0f7a7a] transition-colors shadow-lg shadow-[#149696]/30 whitespace-nowrap">
                Get Job Alerts
            </button>
        </form>
        <p class="text-gray-600 text-xs">No spam. Unsubscribe any time. We send alerts based on your preferences.</p>

        <div class="flex items-center justify-center gap-4 mt-10">
            <div class="flex -space-x-2">
                @foreach ([1,2,3,4,5] as $n)
                <img src="https://i.pravatar.cc/32?img={{ $n * 9 }}"
                     class="w-8 h-8 rounded-full ring-2 ring-gray-950" alt="">
                @endforeach
            </div>
            <p class="text-gray-400 text-sm">
                <span class="text-white font-semibold">500,000+</span> professionals already using PostPulse
            </p>
        </div>
    </div>
</section>

@endsection
