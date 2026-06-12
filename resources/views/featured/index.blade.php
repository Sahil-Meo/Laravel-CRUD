@extends('layouts.app')

@section('title', 'Featured')

@section('content')

{{-- =====================================================================
     1. HERO SPOTLIGHT
     ===================================================================== --}}
<section class="relative min-h-[92vh] flex items-center overflow-hidden bg-gray-950 pt-20">

    {{-- Background image with overlay --}}
    <div class="absolute inset-0">
        <img src="{{ $hero['image'] }}" alt="Hero"
             class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-950/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-24 grid lg:grid-cols-2 gap-16 items-center">

        {{-- Text --}}
        <div>
            <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4] border border-[#149696]/30
                         text-xs font-bold px-3 py-1.5 rounded-full mb-6 uppercase tracking-widest">
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
                          px-6 py-3 rounded-xl hover:bg-[#0f7a7a] transition-colors
                          shadow-lg shadow-[#149696]/30">
                    {{ $hero['cta_primary']['label'] }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="{{ $hero['cta_secondary']['url'] }}"
                   class="inline-flex items-center gap-2 border border-white/20 text-white font-semibold
                          px-6 py-3 rounded-xl hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                    </svg>
                    {{ $hero['cta_secondary']['label'] }}
                </a>
            </div>

            {{-- Stats row --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
                @foreach ($hero['stats'] as $stat)
                <div class="border border-white/10 rounded-2xl px-4 py-4 bg-white/5 backdrop-blur-sm">
                    <p class="text-2xl font-extrabold text-[#4dd4d4]">{{ $stat['value'] }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Floating card preview (desktop only) --}}
        <div class="hidden lg:flex flex-col gap-4 items-end">
            <div class="w-72 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 shadow-2xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-xl bg-[#149696] flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold">Deploy pipeline</p>
                        <p class="text-gray-400 text-xs">Completed in 38s</p>
                    </div>
                    <span class="ml-auto text-xs bg-green-500/20 text-green-400 px-2 py-0.5 rounded-full font-semibold">✓ Live</span>
                </div>
                <div class="h-1.5 bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full bg-[#149696] rounded-full" style="width:100%"></div>
                </div>
            </div>
            <div class="w-64 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 shadow-2xl">
                <p class="text-gray-400 text-xs mb-2">Team velocity this sprint</p>
                <p class="text-3xl font-extrabold text-white">+42%</p>
                <div class="flex items-center gap-1 mt-2">
                    @for($i=0;$i<7;$i++)
                    <div class="flex-1 rounded-sm bg-[#149696]/{{ $i % 2 === 0 ? '80' : '40' }}"
                         style="height:{{ 12 + ($i * 5) % 24 }}px"></div>
                    @endfor
                </div>
            </div>
            <div class="w-72 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 shadow-2xl">
                <div class="flex items-center gap-2 mb-3">
                    <svg class="w-4 h-4 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-white text-sm font-semibold">AI Review complete</p>
                </div>
                <p class="text-gray-400 text-xs leading-relaxed">3 issues resolved · 0 critical · 2 suggestions applied</p>
            </div>
        </div>

    </div>

    {{-- Scroll hint --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 text-gray-500">
        <span class="text-xs uppercase tracking-widest">Scroll</span>
        <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- =====================================================================
     2. FEATURED ITEMS GRID
     ===================================================================== --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Section header --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-14">
            <div>
                <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">What's Featured</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mt-2">
                    The best of what we've built
                </h2>
            </div>
            <a href="#"
               class="shrink-0 inline-flex items-center gap-2 text-sm font-semibold text-[#149696]
                      hover:text-[#0f7a7a] transition-colors">
                View all features
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        {{-- Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($items as $item)

            @php
                $badgeClasses = match($item['badgeColor']) {
                    'amber'  => 'bg-amber-100 text-amber-700',
                    'violet' => 'bg-violet-100 text-violet-700',
                    default  => 'bg-[#e6f7f7] text-[#149696]',
                };
            @endphp

            <article class="group bg-white rounded-2xl border border-gray-100 overflow-hidden
                            hover:shadow-2xl hover:shadow-gray-100 hover:-translate-y-1
                            transition-all duration-300 flex flex-col">

                {{-- Image --}}
                <div class="relative overflow-hidden h-52">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    {{-- Badge --}}
                    <span class="absolute top-3 right-3 text-xs font-bold px-2.5 py-1 rounded-full {{ $badgeClasses }}">
                        {{ $item['badge'] }}
                    </span>
                    {{-- Tag --}}
                    <span class="absolute bottom-3 left-3 text-xs text-white/80 font-medium bg-black/30
                                 backdrop-blur-sm px-2.5 py-1 rounded-full">
                        {{ $item['tag'] }}
                    </span>
                </div>

                {{-- Content --}}
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug
                               group-hover:text-[#149696] transition-colors">
                        {{ $item['title'] }}
                    </h3>
                    <p class="text-sm text-gray-500 leading-relaxed flex-1 mb-5">
                        {{ $item['excerpt'] }}
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                        <span class="text-xs text-gray-400">{{ $item['meta'] }}</span>
                        <a href="#"
                           class="text-xs font-semibold text-[#149696] hover:text-[#0f7a7a]
                                  inline-flex items-center gap-1 transition-colors">
                            Learn more
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- =====================================================================
     3. EDITORIAL SPOTLIGHTS  (alternating image + text)
     ===================================================================== --}}
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 space-y-24">

        <div class="text-center max-w-2xl mx-auto mb-4">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">In Depth</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-2">
                Stories worth reading
            </h2>
        </div>

        @foreach ($spotlights as $spot)
        <div class="grid md:grid-cols-2 gap-12 items-center
                    {{ $spot['reverse'] ? 'md:[direction:rtl]' : '' }}">

            {{-- Image --}}
            <div class="{{ $spot['reverse'] ? '[direction:ltr]' : '' }} overflow-hidden rounded-3xl shadow-xl group">
                <img src="{{ $spot['image'] }}" alt="{{ $spot['title'] }}"
                     class="w-full h-80 md:h-[420px] object-cover group-hover:scale-105 transition-transform duration-700">
            </div>

            {{-- Text --}}
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
     4. TESTIMONIALS
     ===================================================================== --}}
<section class="py-24 bg-gray-950 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">Social Proof</span>
            <h2 class="text-4xl font-extrabold text-white mt-2">
                Teams that trust DostTech
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($testimonials as $t)
            <div class="bg-white/5 border border-white/10 rounded-2xl p-8 hover:bg-white/8
                        hover:border-[#149696]/30 transition-all duration-300 flex flex-col">

                {{-- Stars --}}
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

        {{-- Logo parade --}}
        <div class="mt-16 pt-12 border-t border-white/10">
            <p class="text-center text-xs uppercase tracking-widest text-gray-600 mb-8">
                Trusted by teams at
            </p>
            <div class="flex flex-wrap justify-center items-center gap-10 opacity-40 grayscale">
                @foreach (['Stripe', 'Notion', 'Vercel', 'Linear', 'Figma', 'Shopify'] as $brand)
                <span class="text-xl font-black text-white">{{ $brand }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- =====================================================================
     5. COMPARISON TABLE
     ===================================================================== --}}
<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">Why DostTech</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-2 mb-4">
                See how we compare
            </h2>
            <p class="text-gray-500">
                We let the features speak for themselves.
            </p>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-gray-100 shadow-sm">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        @foreach ($comparison['headers'] as $i => $header)
                        <th class="px-6 py-4 text-left font-semibold
                                   {{ $i === 1 ? 'text-[#149696] bg-[#e6f7f7]' : 'text-gray-700' }}">
                            @if ($i === 1)
                                <span class="inline-flex items-center gap-1.5">
                                    {{ $header }}
                                    <span class="text-xs bg-[#149696] text-white px-1.5 py-0.5 rounded-full font-bold">Us</span>
                                </span>
                            @else
                                {{ $header }}
                            @endif
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($comparison['rows'] as $row)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $row[0] }}</td>
                        @foreach (array_slice($row, 1) as $colIdx => $val)
                        <td class="px-6 py-4 {{ $colIdx === 0 ? 'bg-[#e6f7f7]/30' : '' }}">
                            @if ($val)
                                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full
                                             {{ $colIdx === 0 ? 'bg-[#149696] text-white' : 'bg-green-100 text-green-600' }}">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                            @else
                                <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-gray-100 text-gray-300">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </span>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>

{{-- =====================================================================
     6. METRICS BAND
     ===================================================================== --}}
<section class="py-20 bg-[#149696]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            @foreach ([
                ['60%',    'Reduction in time-to-ship',     'avg across teams'],
                ['99.98%', 'Platform uptime',               'last 12 months'],
                ['4.9/5',  'Customer satisfaction score',   '12,000+ reviews'],
                ['< 2 hr', 'Average support response time', '24/7 coverage'],
            ] as [$val, $label, $sub])
            <div class="bg-white/10 rounded-2xl p-8 border border-white/15">
                <p class="text-4xl font-extrabold text-white mb-2">{{ $val }}</p>
                <p class="text-teal-100 font-semibold text-sm mb-1">{{ $label }}</p>
                <p class="text-teal-200/70 text-xs">{{ $sub }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- =====================================================================
     7. CTA / NEWSLETTER
     ===================================================================== --}}
<section class="relative py-28 overflow-hidden bg-gray-950">

    {{-- Background --}}
    <div class="absolute inset-0">
        <img src="{{ $cta['image'] }}" alt="" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-gray-950/90 to-[#149696]/20"></div>
    </div>

    <div class="relative max-w-3xl mx-auto px-6 text-center">

        <div class="inline-flex items-center gap-2 bg-[#149696]/20 border border-[#149696]/30
                    text-[#4dd4d4] text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-widest mb-6">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Stay ahead
        </div>

        <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-4 leading-tight">
            {{ $cta['title'] }}
        </h2>
        <p class="text-gray-400 text-lg mb-10">
            {{ $cta['subtitle'] }}
        </p>

        <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto mb-6">
            <input
                type="email"
                placeholder="you@company.com"
                class="flex-1 px-4 py-3 text-sm bg-white/10 border border-white/20 text-white
                       placeholder-gray-500 rounded-xl focus:outline-none focus:ring-2
                       focus:ring-[#149696] focus:border-[#149696] transition"
            >
            <button type="submit"
                    class="px-6 py-3 bg-[#149696] text-white text-sm font-semibold rounded-xl
                           hover:bg-[#0f7a7a] transition-colors shadow-lg shadow-[#149696]/30
                           whitespace-nowrap">
                Get Early Access
            </button>
        </form>

        <p class="text-gray-600 text-xs">No spam. Unsubscribe any time. We ship every two weeks.</p>

        {{-- Social proof row --}}
        <div class="flex items-center justify-center gap-4 mt-10">
            <div class="flex -space-x-2">
                @foreach ([1,2,3,4,5] as $n)
                <img src="https://i.pravatar.cc/32?img={{ $n * 9 }}"
                     class="w-8 h-8 rounded-full ring-2 ring-gray-950" alt="">
                @endforeach
            </div>
            <p class="text-gray-400 text-sm">
                <span class="text-white font-semibold">4,200+</span> developers already signed up
            </p>
        </div>

    </div>
</section>

@endsection
