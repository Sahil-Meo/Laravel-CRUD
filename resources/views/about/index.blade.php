@extends('layouts.app')

@section('title', 'About Us')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════
     1. HERO
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="relative min-h-[75vh] flex items-center overflow-hidden pt-20 bg-gray-950">

    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1600&auto=format&fit=crop&q=80"
             alt="Team collaborating"
             class="w-full h-full object-cover opacity-25">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-950/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-24">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4]
                         border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full
                         uppercase tracking-widest mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-[#149696] animate-pulse"></span>
                About PostPulse
            </span>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                We're on a mission to<br>
                <span class="text-[#4dd4d4]">fix hiring</span>
            </h1>
            <p class="text-lg text-gray-300 leading-relaxed mb-10 max-w-xl">
                PostPulse was born from a simple frustration — hiring was broken.
                Too slow, too opaque, too impersonal. We built the platform we
                wished had existed when we were on both sides of the table.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('featured.index') }}"
                   class="inline-flex items-center gap-2 bg-[#149696] text-white font-semibold
                          px-6 py-3 rounded-xl hover:bg-[#0f7a7a] transition-colors
                          shadow-lg shadow-[#149696]/30">
                    Browse Jobs
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="#our-story"
                   class="inline-flex items-center gap-2 border border-white/20 text-white
                          font-semibold px-6 py-3 rounded-xl hover:bg-white/10 transition-colors">
                    Our story ↓
                </a>
            </div>
        </div>
    </div>

    {{-- Scroll cue --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center
                gap-1 text-gray-500">
        <span class="text-xs uppercase tracking-widest">Scroll</span>
        <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor"
             stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     2. STATS BAND
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-16 bg-[#149696]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach ($stats as $s)
            <div class="group">
                <div class="w-12 h-12 bg-white/15 rounded-2xl flex items-center justify-center
                            mx-auto mb-3 group-hover:bg-white/25 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}"/>
                    </svg>
                </div>
                <p class="text-4xl font-extrabold text-white mb-1">{{ $s['value'] }}</p>
                <p class="text-teal-200 text-sm font-medium">{{ $s['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     3. OUR STORY  (alternating image + text)
     ═══════════════════════════════════════════════════════════════════════ --}}
<section id="our-story" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Block 1 --}}
        <div class="grid md:grid-cols-2 gap-16 items-center mb-28">
            <div class="overflow-hidden rounded-3xl shadow-2xl group order-2 md:order-1">
                <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=800&auto=format&fit=crop&q=80"
                     alt="The PostPulse founding story"
                     class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
            <div class="order-1 md:order-2">
                <span class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                             text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-widest mb-5">
                    How It Started
                </span>
                <h2 class="text-4xl font-extrabold text-gray-900 leading-snug mb-5">
                    A conversation at a hiring conference changed everything
                </h2>
                <p class="text-gray-500 leading-relaxed mb-5">
                    In 2021, Sarah Mitchell — then Head of Talent at Stripe — sat next to
                    James Owens at a recruitment conference in London. Both were venting about
                    the same thing: job boards that were expensive for employers, misleading for
                    candidates, and built around clicks rather than careers.
                </p>
                <p class="text-gray-500 leading-relaxed">
                    By the end of the evening they'd sketched out PostPulse on a napkin.
                    Nine months later, the beta was live. Today, PostPulse has facilitated
                    over a million hires and is used in more than 40 countries.
                </p>
            </div>
        </div>

        {{-- Block 2 --}}
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <span class="inline-flex items-center gap-2 bg-amber-50 text-amber-600
                             text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-widest mb-5">
                    What We Believe
                </span>
                <h2 class="text-4xl font-extrabold text-gray-900 leading-snug mb-5">
                    Hiring should feel<br>human — not transactional
                </h2>
                <p class="text-gray-500 leading-relaxed mb-5">
                    Most job boards are built for volume. More listings, more clicks,
                    more revenue. We think that's exactly backwards. The best hire is
                    never the fastest application — it's the right person in the right role
                    at the right time.
                </p>
                <p class="text-gray-500 leading-relaxed">
                    PostPulse uses intelligent matching, verified employers, and a clean
                    candidate experience to make every interaction count. No noise,
                    no fake listings, no spam. Just the careers people deserve.
                </p>
            </div>
            <div class="overflow-hidden rounded-3xl shadow-2xl group">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&auto=format&fit=crop&q=80"
                     alt="People working together"
                     class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     4. VALUES
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                What Drives Us
            </span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">Our core values</h2>
            <p class="text-gray-500 text-lg">
                Every feature we ship, every decision we make — these four principles
                are the filter we run it through.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($values as $v)
            <div class="group bg-white rounded-2xl p-8 border border-gray-100
                        hover:shadow-xl hover:border-[#149696]/20 hover:-translate-y-1
                        transition-all duration-300">
                <div class="w-12 h-12 rounded-2xl {{ $v['color'] }} flex items-center
                            justify-center mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="{{ $v['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-base font-extrabold text-gray-900 mb-3">{{ $v['label'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $v['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     5. TIMELINE / MILESTONES
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center mb-16">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                The Journey
            </span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3">How we got here</h2>
        </div>

        <div class="relative">

            {{-- Vertical line --}}
            <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-px
                        bg-gradient-to-b from-[#149696] via-teal-300 to-transparent
                        -translate-x-px md:-translate-x-px"></div>

            <div class="space-y-12">
                @foreach ($milestones as $i => $m)
                <div class="relative flex items-start
                            {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} gap-0">

                    {{-- Year dot --}}
                    <div class="absolute left-6 md:left-1/2 -translate-x-1/2 z-10 flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-[#149696] border-4 border-white
                                    shadow-lg shadow-[#149696]/30 flex items-center justify-center">
                            <span class="text-white text-xs font-extrabold">{{ substr($m['year'], 2) }}</span>
                        </div>
                    </div>

                    {{-- Content card --}}
                    <div class="ml-20 md:ml-0 md:w-[46%]
                                {{ $i % 2 === 0 ? 'md:mr-auto md:pr-12' : 'md:ml-auto md:pl-12' }}">
                        <div class="bg-white rounded-2xl border border-gray-100 p-6
                                    shadow-sm hover:shadow-lg hover:border-[#149696]/20 transition-all">
                            <span class="text-xs font-bold text-[#149696] uppercase tracking-widest
                                         mb-2 block">{{ $m['year'] }}</span>
                            <h3 class="text-lg font-extrabold text-gray-900 mb-2">{{ $m['title'] }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $m['desc'] }}</p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     6. TEAM
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-end mb-16">
            <div>
                <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                    The People
                </span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">
                    Meet the team building PostPulse
                </h2>
                <p class="text-gray-500 leading-relaxed max-w-lg">
                    We're a small, focused team who cares deeply about the problem we're
                    solving. We've been on both sides of the hiring table and that
                    drives everything we do.
                </p>
            </div>
            <div class="lg:text-right">
                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=600&auto=format&fit=crop&q=80"
                     alt="PostPulse team"
                     class="w-full h-52 lg:h-40 object-cover rounded-2xl shadow-lg">
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($team as $member)
            <div class="group bg-white rounded-2xl p-6 border border-gray-100
                        hover:shadow-xl hover:border-[#149696]/20 hover:-translate-y-0.5
                        transition-all duration-300">
                <div class="flex items-start gap-4 mb-5">
                    <img src="{{ $member['avatar'] }}"
                         alt="{{ $member['name'] }}"
                         class="w-16 h-16 rounded-2xl object-cover shadow-sm
                                group-hover:shadow-md transition-shadow shrink-0">
                    <div>
                        <h3 class="font-extrabold text-gray-900 leading-tight">
                            {{ $member['name'] }}
                        </h3>
                        <p class="text-sm text-[#149696] font-semibold mt-0.5">
                            {{ $member['role'] }}
                        </p>
                        <div class="flex items-center gap-2 mt-2">
                            <a href="{{ $member['linkedin'] }}"
                               class="text-gray-400 hover:text-blue-600 transition-colors"
                               aria-label="LinkedIn">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            <a href="{{ $member['twitter'] }}"
                               class="text-gray-400 hover:text-gray-700 transition-colors"
                               aria-label="Twitter">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $member['bio'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     7. TESTIMONIALS  (reusable slider component)
     ═══════════════════════════════════════════════════════════════════════ --}}
@php
$sliderStories = array_map(fn($t) => [
    'quote'  => $t['quote'],
    'author' => $t['name'],
    'role'   => $t['role'],
    'img'    => $t['avatar'],
    'stars'  => $t['rating'],
], $testimonials);
@endphp

<x-stories-slider
    title="Voices from our community"
    subtitle="Employers and job seekers who've experienced PostPulse firsthand."
    :stories="$sliderStories"
/>

{{-- ═══════════════════════════════════════════════════════════════════════
     8. PRESS / MEDIA LOGOS
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-center text-sm text-gray-400 uppercase tracking-widest
                  font-semibold mb-10">
            As featured in
        </p>
        <div class="flex flex-wrap justify-center items-center gap-10
                    opacity-40 grayscale hover:opacity-60 transition-opacity">
            @foreach (['TechCrunch', 'Forbes', 'Wired', 'The Guardian', 'Fast Company', 'Bloomberg'] as $pub)
            <span class="text-xl font-black text-gray-700 cursor-default">{{ $pub }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     9. CTA
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="relative py-28 overflow-hidden bg-gray-950">

    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=1400&auto=format&fit=crop&q=80"
             alt="" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-950/90
                    to-[#149696]/20"></div>
    </div>

    <div class="relative max-w-3xl mx-auto px-6 text-center">

        <span class="inline-flex items-center gap-2 bg-[#149696]/20 border border-[#149696]/30
                     text-[#4dd4d4] text-xs font-bold px-3 py-1.5 rounded-full uppercase
                     tracking-widest mb-6">
            Join the movement
        </span>

        <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-5 leading-tight">
            Be part of something<br>bigger than a job board
        </h2>
        <p class="text-gray-400 text-lg mb-10 max-w-xl mx-auto">
            Whether you're looking for your next role or building your next team,
            PostPulse is the place where careers actually happen.
        </p>

        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('profile.create') }}"
               class="inline-flex items-center gap-2 bg-[#149696] text-white font-semibold
                      px-8 py-4 rounded-xl hover:bg-[#0f7a7a] transition-colors
                      shadow-xl shadow-[#149696]/30">
                Create your profile
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ route('featured.index') }}"
               class="inline-flex items-center gap-2 border-2 border-white/20 text-white
                      font-semibold px-8 py-4 rounded-xl hover:bg-white/10 transition-colors">
                Browse open roles
            </a>
        </div>

        {{-- Social proof avatars --}}
        <div class="flex items-center justify-center gap-3 mt-10">
            <div class="flex -space-x-2">
                @foreach ([1,2,3,4,5] as $n)
                <img src="https://i.pravatar.cc/32?img={{ $n * 7 }}"
                     class="w-8 h-8 rounded-full ring-2 ring-gray-950" alt="">
                @endforeach
            </div>
            <p class="text-gray-400 text-sm">
                <span class="text-white font-semibold">500,000+</span>
                professionals trust PostPulse
            </p>
        </div>

    </div>
</section>

@endsection
