<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Luminary') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

    {{-- ===== NAVBAR ===== --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-gray-900">Luminary</span>
            </div>
            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Features</a>
                <a href="#work" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Our Work</a>
                <a href="#team" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Team</a>
                <a href="#pricing" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Pricing</a>
            </div>
            <div class="flex items-center gap-3">
                <a href="#" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition-colors">Log in</a>
                <a href="#" class="text-sm font-semibold bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Get Started</a>
            </div>
        </div>
    </nav>

    {{-- ===== HERO ===== --}}
    <section class="pt-32 pb-20 bg-gradient-to-br from-slate-50 via-white to-indigo-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 bg-indigo-50 text-indigo-700 text-xs font-semibold px-3 py-1.5 rounded-full mb-6">
                        <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
                        Now in public beta
                    </span>
                    <h1 class="text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                        Build something
                        <span class="text-indigo-600">remarkable</span>
                        with us
                    </h1>
                    <p class="text-lg text-gray-500 leading-relaxed mb-8">
                        Luminary is the all-in-one platform that helps teams design, ship, and scale digital products faster than ever before. No compromises, just results.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="bg-indigo-600 text-white font-semibold px-6 py-3 rounded-xl hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-200">
                            Start for free
                        </a>
                        <a href="#" class="flex items-center gap-2 text-gray-700 font-semibold px-6 py-3 rounded-xl border border-gray-200 hover:border-indigo-300 hover:text-indigo-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                            Watch demo
                        </a>
                    </div>
                    <div class="flex items-center gap-6 mt-10">
                        <div class="flex -space-x-2">
                            <img src="https://i.pravatar.cc/40?img=1" class="w-9 h-9 rounded-full ring-2 ring-white" alt="user">
                            <img src="https://i.pravatar.cc/40?img=2" class="w-9 h-9 rounded-full ring-2 ring-white" alt="user">
                            <img src="https://i.pravatar.cc/40?img=3" class="w-9 h-9 rounded-full ring-2 ring-white" alt="user">
                            <img src="https://i.pravatar.cc/40?img=4" class="w-9 h-9 rounded-full ring-2 ring-white" alt="user">
                        </div>
                        <p class="text-sm text-gray-500"><span class="font-semibold text-gray-800">12,000+</span> happy customers</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -top-8 -right-8 w-72 h-72 bg-indigo-200 rounded-full opacity-30 blur-3xl"></div>
                    <div class="absolute -bottom-8 -left-8 w-72 h-72 bg-violet-200 rounded-full opacity-30 blur-3xl"></div>
                    <img
                        src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=700&auto=format&fit=crop&q=80"
                        alt="Team working"
                        class="relative rounded-2xl shadow-2xl w-full object-cover h-[420px]"
                    >
                    <div class="absolute bottom-6 left-6 bg-white rounded-xl shadow-lg p-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Revenue this month</p>
                            <p class="text-sm font-bold text-gray-900">+38% growth</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== LOGOS STRIP ===== --}}
    <section class="py-14 bg-gray-50 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-center text-sm text-gray-400 uppercase tracking-widest font-medium mb-8">Trusted by teams at</p>
            <div class="flex flex-wrap justify-center items-center gap-10 opacity-50 grayscale">
                <span class="text-2xl font-black text-gray-700">Stripe</span>
                <span class="text-2xl font-black text-gray-700">Notion</span>
                <span class="text-2xl font-black text-gray-700">Vercel</span>
                <span class="text-2xl font-black text-gray-700">Linear</span>
                <span class="text-2xl font-black text-gray-700">Figma</span>
                <span class="text-2xl font-black text-gray-700">Shopify</span>
            </div>
        </div>
    </section>

    {{-- ===== FEATURES ===== --}}
    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-widest">Features</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">Everything you need to succeed</h2>
                <p class="text-gray-500 text-lg">From ideation to launch, our platform gives you the tools to move fast and build with confidence.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-50 transition-all">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Smart Dashboard</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Get a bird's-eye view of your entire operation. Real-time data, beautiful charts, and actionable insights at your fingertips.</p>
                </div>
                {{-- Feature 2 --}}
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-50 transition-all">
                    <div class="w-12 h-12 bg-violet-100 text-violet-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-violet-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Team Collaboration</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Work seamlessly with your team in real time. Comment, assign, and track progress without ever leaving the platform.</p>
                </div>
                {{-- Feature 3 --}}
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-50 transition-all">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Enterprise Security</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Bank-grade encryption, SSO, and fine-grained access controls. Your data stays yours, always protected and compliant.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== OUR WORK / GALLERY ===== --}}
    <section id="work" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-widest">Our Work</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">Projects we're proud of</h2>
                <p class="text-gray-500 text-lg">A glimpse into the kind of experiences we craft for our clients across the globe.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="md:col-span-2 overflow-hidden rounded-2xl group relative">
                    <img
                        src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80"
                        alt="Analytics project"
                        class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                        <div>
                            <span class="text-xs text-indigo-300 font-semibold uppercase tracking-widest">Analytics</span>
                            <h3 class="text-white font-bold text-xl mt-1">DataFlow Dashboard</h3>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden rounded-2xl group relative">
                    <img
                        src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400&auto=format&fit=crop&q=80"
                        alt="Mobile app"
                        class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                        <div>
                            <span class="text-xs text-violet-300 font-semibold uppercase tracking-widest">Mobile</span>
                            <h3 class="text-white font-bold text-xl mt-1">Swift Commerce App</h3>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden rounded-2xl group relative">
                    <img
                        src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&auto=format&fit=crop&q=80"
                        alt="Office design"
                        class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                        <div>
                            <span class="text-xs text-emerald-300 font-semibold uppercase tracking-widest">Design</span>
                            <h3 class="text-white font-bold text-xl mt-1">Workspace Redesign</h3>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 overflow-hidden rounded-2xl group relative">
                    <img
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&auto=format&fit=crop&q=80"
                        alt="Team collaboration"
                        class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                        <div>
                            <span class="text-xs text-yellow-300 font-semibold uppercase tracking-widest">Platform</span>
                            <h3 class="text-white font-bold text-xl mt-1">TeamHub Collaboration Suite</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== TEAM ===== --}}
    <section id="team" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-widest">The Team</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">Meet the people behind it</h2>
                <p class="text-gray-500 text-lg">A small, passionate team obsessed with building great software.</p>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach ([
                    ['name' => 'Sarah Mitchell', 'role' => 'CEO & Founder', 'img' => 'https://i.pravatar.cc/200?img=47'],
                    ['name' => 'James Owens',   'role' => 'CTO',           'img' => 'https://i.pravatar.cc/200?img=12'],
                    ['name' => 'Priya Sharma',  'role' => 'Head of Design', 'img' => 'https://i.pravatar.cc/200?img=32'],
                    ['name' => 'Carlos Rivera', 'role' => 'Lead Engineer',  'img' => 'https://i.pravatar.cc/200?img=15'],
                ] as $member)
                <div class="text-center group">
                    <div class="relative inline-block mb-4">
                        <img src="{{ $member['img'] }}" alt="{{ $member['name'] }}" class="w-24 h-24 rounded-2xl object-cover mx-auto shadow-md group-hover:shadow-xl transition-shadow">
                        <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 rounded-full border-2 border-white"></div>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ $member['name'] }}</h3>
                    <p class="text-sm text-indigo-600 font-medium mt-0.5">{{ $member['role'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== TESTIMONIALS ===== --}}
    <section class="py-24 bg-indigo-600">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-white mb-4">What our customers say</h2>
                <p class="text-indigo-200 text-lg">Don't take our word for it.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ([
                    ['quote' => 'Luminary completely transformed how our team works. We ship 3x faster with half the overhead.', 'author' => 'Alex T.', 'company' => 'Founder, Nexus Co.', 'img' => 'https://i.pravatar.cc/60?img=8'],
                    ['quote' => 'The analytics alone are worth the price. We finally understand our users and can act on it.', 'author' => 'Maria K.',  'company' => 'Product Lead, Orbi', 'img' => 'https://i.pravatar.cc/60?img=44'],
                    ['quote' => 'Switching was the best decision we made this year. The team support is genuinely outstanding.', 'author' => 'Tom H.',  'company' => 'CTO, BuildStack', 'img' => 'https://i.pravatar.cc/60?img=17'],
                ] as $t)
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                    <div class="flex gap-1 mb-5">
                        @for ($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-white text-sm leading-relaxed mb-6">"{{ $t['quote'] }}"</p>
                    <div class="flex items-center gap-3">
                        <img src="{{ $t['img'] }}" class="w-10 h-10 rounded-full" alt="{{ $t['author'] }}">
                        <div>
                            <p class="text-white font-semibold text-sm">{{ $t['author'] }}</p>
                            <p class="text-indigo-300 text-xs">{{ $t['company'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== PRICING ===== --}}
    <section id="pricing" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-indigo-600 font-semibold text-sm uppercase tracking-widest">Pricing</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-3 mb-4">Simple, transparent pricing</h2>
                <p class="text-gray-500 text-lg">No hidden fees. No surprises. Start free, upgrade when you're ready.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                {{-- Starter --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm">
                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest mb-2">Starter</p>
                    <div class="flex items-end gap-1 mb-6">
                        <span class="text-4xl font-extrabold text-gray-900">$0</span>
                        <span class="text-gray-500 mb-1">/mo</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Up to 3 projects</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>5 GB storage</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Basic analytics</li>
                        <li class="flex items-center gap-2 text-gray-300"><svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>Priority support</li>
                    </ul>
                    <a href="#" class="block text-center border border-gray-300 text-gray-700 font-semibold py-2.5 rounded-xl hover:border-indigo-400 hover:text-indigo-600 transition-colors">Get started</a>
                </div>
                {{-- Pro (highlighted) --}}
                <div class="bg-indigo-600 rounded-2xl p-8 shadow-2xl shadow-indigo-200 relative">
                    <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-yellow-400 text-yellow-900 text-xs font-bold px-4 py-1 rounded-full uppercase tracking-widest">Most Popular</span>
                    <p class="text-sm font-semibold text-indigo-200 uppercase tracking-widest mb-2">Pro</p>
                    <div class="flex items-end gap-1 mb-6">
                        <span class="text-4xl font-extrabold text-white">$29</span>
                        <span class="text-indigo-300 mb-1">/mo</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-sm text-indigo-100">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-white shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Unlimited projects</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-white shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>50 GB storage</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-white shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Advanced analytics</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-white shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Priority support</li>
                    </ul>
                    <a href="#" class="block text-center bg-white text-indigo-700 font-semibold py-2.5 rounded-xl hover:bg-indigo-50 transition-colors">Get started</a>
                </div>
                {{-- Enterprise --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm">
                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest mb-2">Enterprise</p>
                    <div class="flex items-end gap-1 mb-6">
                        <span class="text-4xl font-extrabold text-gray-900">$99</span>
                        <span class="text-gray-500 mb-1">/mo</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-sm text-gray-600">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Everything in Pro</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Unlimited storage</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>SSO & audit logs</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-green-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Dedicated support</li>
                    </ul>
                    <a href="#" class="block text-center border border-gray-300 text-gray-700 font-semibold py-2.5 rounded-xl hover:border-indigo-400 hover:text-indigo-600 transition-colors">Contact sales</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CTA BANNER ===== --}}
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="relative rounded-3xl overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=1200&auto=format&fit=crop&q=80"
                    alt="CTA background"
                    class="absolute inset-0 w-full h-full object-cover"
                >
                <div class="absolute inset-0 bg-indigo-900/80"></div>
                <div class="relative py-20 px-8">
                    <h2 class="text-4xl font-extrabold text-white mb-4">Ready to get started?</h2>
                    <p class="text-indigo-200 text-lg mb-8 max-w-xl mx-auto">Join thousands of teams already using Luminary to build faster, smarter, and with more confidence.</p>
                    <a href="#" class="inline-block bg-white text-indigo-700 font-bold px-8 py-4 rounded-xl hover:bg-indigo-50 transition-colors shadow-lg">
                        Start your free trial
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-gray-900 text-gray-400 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-white font-bold text-lg">Luminary</span>
                    </div>
                    <p class="text-sm leading-relaxed">Building the future of digital product development, one team at a time.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Pricing</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Changelog</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Roadmap</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">About</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Press</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm">© {{ date('Y') }} Luminary, Inc. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="hover:text-indigo-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                    </a>
                    <a href="#" class="hover:text-indigo-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="#" class="hover:text-indigo-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
