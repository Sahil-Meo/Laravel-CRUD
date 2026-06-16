@extends('layouts.app')

@section('title', 'Find Your Next Job')

@section('content')

{{-- ===== HERO ===== --}}
<section class="pt-32 pb-20 bg-gradient-to-br from-slate-50 via-white to-teal-50/30 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#0f7a7a] text-xs font-semibold px-3 py-1.5 rounded-full mb-6">
                    <span class="w-1.5 h-1.5 bg-[#149696] rounded-full animate-pulse"></span>
                    10,000+ new jobs this week
                </span>
                <h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    Find the job you
                    <span class="text-[#149696]">actually want</span>
                </h1>
                <p class="text-lg text-gray-500 leading-relaxed mb-8">
                    PostPulse connects ambitious professionals with top employers. Search thousands of verified job listings, apply in one click, and land your next role faster.
                </p>

                {{-- Search bar --}}
                <form class="flex flex-col sm:flex-row gap-3 mb-8">
                    <div class="relative flex-1">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                        </svg>
                        <input type="text" placeholder="Job title, keyword or company"
                               class="w-full pl-10 pr-4 py-3.5 border border-gray-200 rounded-xl text-sm
                                      focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] transition">
                    </div>
                    <div class="relative sm:w-44">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
                             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <input type="text" placeholder="Location"
                               class="w-full pl-9 pr-4 py-3.5 border border-gray-200 rounded-xl text-sm
                                      focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] transition">
                    </div>
                    <button type="submit"
                            class="bg-[#149696] text-white font-semibold px-6 py-3.5 rounded-xl
                                   hover:bg-[#0f7a7a] transition-colors shadow-lg shadow-[#149696]/20 whitespace-nowrap">
                        Search Jobs
                    </button>
                </form>

                <p class="text-sm text-gray-400">
                    Popular:
                    @foreach (['Remote', 'Engineering', 'Design', 'Marketing', 'Finance'] as $tag)
                    <a href="#" class="ml-2 text-[#149696] hover:underline">{{ $tag }}</a>
                    @endforeach
                </p>

                <div class="flex items-center gap-6 mt-10">
                    <div class="flex -space-x-2">
                        @foreach ([1,2,3,4] as $n)
                        <img src="https://i.pravatar.cc/40?img={{ $n * 11 }}"
                             class="w-9 h-9 rounded-full ring-2 ring-white" alt="candidate">
                        @endforeach
                    </div>
                    <p class="text-sm text-gray-500">
                        <span class="font-semibold text-gray-800">48,000+</span> professionals hired this year
                    </p>
                </div>
            </div>

            {{-- Hero image --}}
            <div class="relative">
                <div class="absolute -top-8 -right-8 w-72 h-72 bg-teal-200 rounded-full opacity-30 blur-3xl"></div>
                <div class="absolute -bottom-8 -left-8 w-72 h-72 bg-cyan-200 rounded-full opacity-30 blur-3xl"></div>
                <img
                    src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=700&auto=format&fit=crop&q=80"
                    alt="Professionals working"
                    class="relative rounded-2xl shadow-2xl w-full object-cover h-[420px]"
                >
                {{-- Floating stat card --}}
                <div class="absolute bottom-6 left-6 bg-white rounded-xl shadow-lg p-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#e6f7f7] rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Jobs added today</p>
                        <p class="text-sm font-bold text-gray-900">1,240 new listings</p>
                    </div>
                </div>
                {{-- Floating company card --}}
                <div class="absolute top-6 right-6 bg-white rounded-xl shadow-lg p-3 flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 font-bold text-xs">G</div>
                    <div>
                        <p class="text-xs font-semibold text-gray-800">Google</p>
                        <p class="text-xs text-gray-400">42 open roles</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TRUSTED COMPANIES STRIP ===== --}}
<section class="py-14 bg-gray-50 border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-center text-sm text-gray-400 uppercase tracking-widest font-medium mb-8">
            Top companies hiring on PostPulse
        </p>
        <div class="flex flex-wrap justify-center items-center gap-10 opacity-50 grayscale">
            @foreach (['Google', 'Microsoft', 'Airbnb', 'Stripe', 'Shopify', 'Notion'] as $co)
            <span class="text-2xl font-black text-gray-700">{{ $co }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== HOW IT WORKS ===== --}}
<section id="how-it-works" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">How It Works</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">Get hired in three steps</h2>
            <p class="text-gray-500 text-lg">PostPulse is built to get you from search to offer as fast as possible.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">

            {{-- Step 1 --}}
            <div class="group p-8 rounded-2xl border border-gray-100 hover:border-[#149696]/30 hover:shadow-xl hover:shadow-teal-50 transition-all text-center">
                <div class="w-14 h-14 bg-[#e6f7f7] text-[#149696] rounded-2xl flex items-center justify-center mx-auto mb-5
                            group-hover:bg-[#149696] group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                    </svg>
                </div>
                <div class="text-xs font-bold text-[#149696] uppercase tracking-widest mb-2">Step 1</div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Search & Filter</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Browse thousands of verified listings by role, location, salary, and work type. Find exactly what fits your goals.</p>
            </div>

            {{-- Step 2 --}}
            <div class="group p-8 rounded-2xl border border-gray-100 hover:border-[#149696]/30 hover:shadow-xl hover:shadow-teal-50 transition-all text-center">
                <div class="w-14 h-14 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-5
                            group-hover:bg-amber-500 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div class="text-xs font-bold text-amber-500 uppercase tracking-widest mb-2">Step 2</div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Build Your Profile</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Create a standout profile in minutes. Highlight your skills, experience, and what you're looking for in your next role.</p>
            </div>

            {{-- Step 3 --}}
            <div class="group p-8 rounded-2xl border border-gray-100 hover:border-[#149696]/30 hover:shadow-xl hover:shadow-teal-50 transition-all text-center">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-5
                            group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div class="text-xs font-bold text-emerald-600 uppercase tracking-widest mb-2">Step 3</div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Apply & Get Hired</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Apply with one click using your PostPulse profile. Track every application and get notified the moment employers respond.</p>
            </div>

        </div>
    </div>
</section>

{{-- ===== FEATURED JOBS SNAPSHOT ===== --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
            <div>
                <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">Featured Jobs</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2">Roles you should know about</h2>
            </div>
            <a href="{{ route('featured.index') }}"
               class="shrink-0 inline-flex items-center gap-2 text-sm font-semibold text-[#149696]
                      hover:text-[#0f7a7a] transition-colors">
                View all featured jobs
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ([
                ['title'=>'Senior Product Designer','company'=>'Airbnb','location'=>'Remote · USA','salary'=>'$130k–$160k','type'=>'Full-time','logo_letter'=>'A','logo_bg'=>'bg-rose-100','logo_text'=>'text-rose-600','tag'=>'Design'],
                ['title'=>'Backend Engineer (Node.js)','company'=>'Stripe','location'=>'San Francisco, CA','salary'=>'$150k–$200k','type'=>'Full-time','logo_letter'=>'S','logo_bg'=>'bg-blue-100','logo_text'=>'text-blue-600','tag'=>'Engineering'],
                ['title'=>'Growth Marketing Lead','company'=>'Notion','location'=>'Remote · Global','salary'=>'$100k–$130k','type'=>'Full-time','logo_letter'=>'N','logo_bg'=>'bg-gray-100','logo_text'=>'text-gray-700','tag'=>'Marketing'],
                ['title'=>'Data Analyst','company'=>'Shopify','location'=>'Ottawa, Canada','salary'=>'$90k–$115k','type'=>'Hybrid','logo_letter'=>'S','logo_bg'=>'bg-green-100','logo_text'=>'text-green-600','tag'=>'Data'],
                ['title'=>'DevOps Engineer','company'=>'Vercel','location'=>'Remote · Europe','salary'=>'$120k–$150k','type'=>'Full-time','logo_letter'=>'V','logo_bg'=>'bg-gray-900','logo_text'=>'text-white','tag'=>'Infrastructure'],
                ['title'=>'Customer Success Manager','company'=>'Linear','location'=>'New York, NY','salary'=>'$80k–$105k','type'=>'Hybrid','logo_letter'=>'L','logo_bg'=>'bg-violet-100','logo_text'=>'text-violet-600','tag'=>'Operations'],
            ] as $job)
            <div class="group bg-white rounded-2xl border border-gray-100 p-6
                        hover:shadow-xl hover:border-[#149696]/20 hover:-translate-y-0.5
                        transition-all duration-300 flex flex-col gap-4">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl {{ $job['logo_bg'] }} flex items-center justify-center
                                    {{ $job['logo_text'] }} font-extrabold text-sm shrink-0">
                            {{ $job['logo_letter'] }}
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">{{ $job['company'] }}</p>
                            <h3 class="text-sm font-bold text-gray-900 group-hover:text-[#149696] transition-colors leading-snug">
                                {{ $job['title'] }}
                            </h3>
                        </div>
                    </div>
                    <span class="text-xs bg-[#e6f7f7] text-[#149696] font-semibold px-2.5 py-1 rounded-full shrink-0">
                        {{ $job['tag'] }}
                    </span>
                </div>

                <div class="flex flex-wrap gap-2 text-xs text-gray-500">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        {{ $job['location'] }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $job['salary'] }}
                    </span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-gray-100 text-gray-600 font-medium">
                        {{ $job['type'] }}
                    </span>
                </div>

                <a href="#"
                   class="mt-auto block text-center text-sm font-semibold text-[#149696] border border-[#149696]/30
                          py-2.5 rounded-xl hover:bg-[#149696] hover:text-white hover:border-[#149696]
                          transition-all">
                    Apply Now
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== FOR EMPLOYERS ===== --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">For Employers</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-5 leading-snug">
                    Hire smarter, faster
                </h2>
                <p class="text-gray-500 leading-relaxed mb-8">
                    Post your jobs to a highly engaged audience of active and passive candidates. Get matched with the right talent in days, not months.
                </p>
                <ul class="space-y-4 mb-8">
                    @foreach ([
                        'Reach 500,000+ active job seekers every month',
                        'AI-powered matching surfaces top candidates automatically',
                        'Applicant tracking built in — no extra tools needed',
                        'Dedicated account support for Enterprise plans',
                    ] as $point)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <span class="w-5 h-5 bg-[#149696] rounded-full flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        {{ $point }}
                    </li>
                    @endforeach
                </ul>
                <a href="#"
                   class="inline-flex items-center gap-2 bg-[#149696] text-white font-semibold px-6 py-3
                          rounded-xl hover:bg-[#0f7a7a] transition-colors shadow-lg shadow-[#149696]/20">
                    Start Hiring Today
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
            <div class="relative">
                <img
                    src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=700&auto=format&fit=crop&q=80"
                    alt="Employer hiring"
                    class="rounded-2xl shadow-2xl w-full object-cover h-[400px]"
                >
                <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl shadow-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-500 mb-1">Avg. time to first applicant</p>
                    <p class="text-2xl font-extrabold text-[#149696]">4.2 hrs</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TESTIMONIALS SLIDER ===== --}}
{{--
    Rendered by the reusable <x-stories-slider> component.
    Component file: resources/views/components/stories-slider.blade.php
    JS module:      resources/js/components/stories-slider.js
--}}
<x-stories-slider
    title="Stories from our community"
    subtitle="Real people, real results."
    :stories="[
        ['quote' => 'I landed my dream role at a startup within 3 weeks of creating my PostPulse profile. The job matching is genuinely impressive.',                                            'author' => 'Amira S.',  'role' => 'UX Designer � Hired via PostPulse',       'img' => 'https://i.pravatar.cc/60?img=47', 'stars' => 5],
        ['quote' => 'As an employer, PostPulse gave us our best hire yet. We posted the role on a Friday and had strong candidates by Monday morning.',                                         'author' => 'James R.',  'role' => 'CTO, BuildStack',                         'img' => 'https://i.pravatar.cc/60?img=12', 'stars' => 5],
        ['quote' => 'After six months of searching elsewhere, I found three great opportunities on PostPulse within my first week. Wish I had found it sooner.',                               'author' => 'Priya M.',  'role' => 'Product Manager � Hired via PostPulse',   'img' => 'https://i.pravatar.cc/60?img=32', 'stars' => 5],
        ['quote' => 'PostPulse matched me with a role I never would have found on my own. The AI suggestions were spot on � better than hours of manual searching.',                          'author' => 'Carlos V.', 'role' => 'Data Engineer � Hired via PostPulse',      'img' => 'https://i.pravatar.cc/60?img=15', 'stars' => 5],
        ['quote' => 'We filled four senior positions in under a month using PostPulse. The quality of applicants was head and shoulders above other job boards we have tried.',               'author' => 'Sophie L.', 'role' => 'Head of Talent, Nexus Co.',               'img' => 'https://i.pravatar.cc/60?img=44', 'stars' => 5],
        ['quote' => 'I was nervous about switching industries, but PostPulse showed me roles that valued my transferable skills. I got hired as a Product Analyst within 5 weeks.',          'author' => 'Marcus T.', 'role' => 'Product Analyst � Career changer',         'img' => 'https://i.pravatar.cc/60?img=17', 'stars' => 5],
        ['quote' => 'The one-click apply and profile import saved me hours. I applied to twelve jobs in an afternoon and heard back from six of them.',                                       'author' => 'Leila O.',  'role' => 'Frontend Developer � Hired via PostPulse', 'img' => 'https://i.pravatar.cc/60?img=25', 'stars' => 5],
        ['quote' => 'Our hiring velocity doubled after switching to PostPulse. The featured listing placement put us in front of exactly the kind of candidates we needed.',                  'author' => 'Ravi K.',   'role' => 'VP Engineering, Orbi',                    'img' => 'https://i.pravatar.cc/60?img=33', 'stars' => 5],
    ]"
/>
{{-- ===== CTA BANNER ===== --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="relative rounded-3xl overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=1200&auto=format&fit=crop&q=80"
                alt="Hiring team"
                class="absolute inset-0 w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-[#0a4f4f]/85"></div>
            <div class="relative py-20 px-8">
                <h2 class="text-4xl font-extrabold text-white mb-4">Your next great hire is on PostPulse</h2>
                <p class="text-teal-200 text-lg mb-8 max-w-xl mx-auto">
                    Join 12,000+ employers who trust PostPulse to find and hire exceptional talent every day.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('profile.create') }}" class="inline-block bg-white text-[#0f7a7a] font-bold px-8 py-4 rounded-xl hover:bg-[#e6f7f7] transition-colors shadow-lg">
                        Post a Job Free
                    </a>
                    <a href="{{ route('featured.index') }}" class="inline-block border-2 border-white/40 text-white font-bold px-8 py-4 rounded-xl hover:bg-white/10 transition-colors">
                        Browse Jobs
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
