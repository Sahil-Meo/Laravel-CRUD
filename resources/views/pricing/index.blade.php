@extends('layouts.app')

@section('title', 'Pricing')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════
     1. HERO
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="relative pt-32 pb-20 bg-gradient-to-br from-gray-950 via-gray-900 to-[#0a4f4f]
                overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/3 w-96 h-96 rounded-full bg-[#149696] blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-72 h-72 rounded-full bg-teal-400 blur-3xl"></div>
    </div>
    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4]
                     border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full
                     uppercase tracking-widest mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-[#149696] animate-pulse"></span>
            Simple, transparent pricing
        </span>
        <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-5">
            Plans for every team size
        </h1>
        <p class="text-lg text-gray-300 max-w-xl mx-auto mb-10">
            Start for free. Upgrade as you grow. No hidden fees,
            no lock-in, no surprises.
        </p>

        {{-- Billing toggle (visual only — real toggle needs JS/backend) --}}
        <div class="inline-flex items-center gap-3 bg-white/10 border border-white/15
                    rounded-full px-2 py-1.5 text-sm">
            <button class="px-5 py-1.5 rounded-full bg-white text-gray-900 font-semibold
                           text-sm transition-all">
                Monthly
            </button>
            <button class="px-5 py-1.5 rounded-full text-gray-300 font-medium
                           text-sm hover:text-white transition-colors">
                Annual
                <span class="ml-1.5 text-xs bg-green-500/20 text-green-400 font-bold
                             px-2 py-0.5 rounded-full border border-green-500/30">
                    −20%
                </span>
            </button>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     2. PRICING CARDS
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach ($plans as $plan)

            <div class="relative flex flex-col rounded-2xl overflow-hidden
                        transition-all duration-300 hover:-translate-y-1
                        {{ $plan['highlight']
                            ? 'bg-[#149696] shadow-2xl shadow-[#149696]/30 ring-2 ring-[#149696]'
                            : 'bg-white border border-gray-200 shadow-sm hover:shadow-lg' }}">

                {{-- Most popular badge --}}
                @if ($plan['badge'])
                <div class="absolute -top-px left-0 right-0 h-1
                            bg-gradient-to-r from-yellow-400 via-amber-400 to-yellow-400"></div>
                <span class="absolute top-3 right-3 bg-yellow-400 text-yellow-900
                             text-xs font-black px-2.5 py-1 rounded-full uppercase tracking-widest">
                    {{ $plan['badge'] }}
                </span>
                @endif

                <div class="p-7 flex flex-col flex-1">

                    {{-- Plan name + audience --}}
                    <div class="mb-6">
                        <p class="text-xs font-bold uppercase tracking-widest mb-1
                                  {{ $plan['highlight'] ? 'text-teal-200' : 'text-gray-400' }}">
                            {{ $plan['name'] }}
                        </p>
                        <p class="text-xs {{ $plan['highlight'] ? 'text-teal-300' : 'text-gray-400' }}">
                            {{ $plan['audience'] }}
                        </p>
                    </div>

                    {{-- Price --}}
                    <div class="mb-7">
                        <div class="flex items-end gap-1">
                            <span class="text-5xl font-extrabold
                                         {{ $plan['highlight'] ? 'text-white' : 'text-gray-900' }}">
                                {{ $plan['price'] }}
                            </span>
                            @if ($plan['period'])
                            <span class="mb-2 text-sm
                                         {{ $plan['highlight'] ? 'text-teal-300' : 'text-gray-400' }}">
                                {{ $plan['period'] }}
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- Features --}}
                    <ul class="space-y-3 mb-8 flex-1">
                        @foreach ($plan['features'] as $feature)
                        <li class="flex items-start gap-2.5 text-sm
                                   {{ $feature['included']
                                       ? ($plan['highlight'] ? 'text-teal-100' : 'text-gray-700')
                                       : ($plan['highlight'] ? 'text-teal-300/40' : 'text-gray-300') }}">
                            @if ($feature['included'])
                            <svg class="w-4 h-4 shrink-0 mt-0.5
                                        {{ $plan['highlight'] ? 'text-white' : 'text-[#149696]' }}"
                                 fill="none" stroke="currentColor" stroke-width="2.5"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                            @else
                            <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            @endif
                            {{ $feature['text'] }}
                        </li>
                        @endforeach
                    </ul>

                    {{-- CTA --}}
                    <a href="{{ $plan['cta_href'] }}"
                       class="block text-center font-semibold py-3 rounded-xl transition-all text-sm
                              {{ $plan['highlight']
                                  ? 'bg-white text-[#0f7a7a] hover:bg-[#e6f7f7]'
                                  : 'bg-[#149696] text-white hover:bg-[#0f7a7a] shadow-sm shadow-[#149696]/20' }}">
                        {{ $plan['cta_label'] }}
                    </a>

                </div>
            </div>
            @endforeach
        </div>

        {{-- Money-back note --}}
        <p class="text-center text-sm text-gray-400 mt-8 flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-[#149696]" fill="none" stroke="currentColor"
                 stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            48-hour money-back guarantee on all paid plans. No questions asked.
        </p>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     3. FEATURE COMPARISON TABLE
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                Compare Plans
            </span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2">
                Everything side by side
            </h2>
        </div>

        <div class="overflow-x-auto rounded-2xl border border-gray-100 shadow-sm">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-6 py-4 font-semibold text-gray-700 w-48">Feature</th>
                        @foreach ($plans as $plan)
                        <th class="px-4 py-4 font-bold text-center
                                   {{ $plan['highlight'] ? 'text-[#149696] bg-[#e6f7f7]' : 'text-gray-700' }}">
                            {{ $plan['name'] }}
                            @if ($plan['highlight'])
                            <span class="block text-xs text-[#149696] font-semibold mt-0.5">
                                Popular
                            </span>
                            @endif
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @php
                    $tableRows = [
                        'Job search & browsing',
                        'Profile creation',
                        'Job applications',
                        'Job alert emails',
                        'AI job matching',
                        'Resume / CV upload',
                        'Browse candidate profiles',
                        'Post job listings',
                        'Featured placement',
                        'Applicant tracking',
                        'Analytics & reporting',
                        'API access',
                        'Dedicated support',
                    ];
                    $tableData = [
                        // Free,  ProSeeker, EmployerPro, Enterprise
                        'Job search & browsing'     => [true,  true,  true,  true ],
                        'Profile creation'           => [true,  true,  true,  true ],
                        'Job applications'           => ['5/mo','∞',   false, false],
                        'Job alert emails'           => [false, true,  false, true ],
                        'AI job matching'            => [false, true,  true,  true ],
                        'Resume / CV upload'         => [false, true,  false, true ],
                        'Browse candidate profiles'  => [false, false, true,  true ],
                        'Post job listings'          => [false, false, true,  true ],
                        'Featured placement'         => [false, false, true,  true ],
                        'Applicant tracking'         => [false, false, true,  true ],
                        'Analytics & reporting'      => [false, false, false, true ],
                        'API access'                 => [false, false, false, true ],
                        'Dedicated support'          => [false, false, false, true ],
                    ];
                    @endphp
                    @foreach ($tableRows as $row)
                    <tr class="hover:bg-gray-50/60 transition-colors">
                        <td class="px-6 py-3.5 font-medium text-gray-800">{{ $row }}</td>
                        @foreach ($tableData[$row] as $colIdx => $val)
                        <td class="px-4 py-3.5 text-center {{ $colIdx === 2 ? 'bg-[#e6f7f7]/30' : '' }}">
                            @if ($val === true)
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full
                                         {{ $colIdx === 2 ? 'bg-[#149696] text-white' : 'bg-green-100 text-green-600' }}">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                     stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            @elseif ($val === false)
                            <span class="inline-flex items-center justify-center w-6 h-6 rounded-full
                                         bg-gray-100 text-gray-300">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                     stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </span>
                            @else
                            <span class="text-xs font-semibold text-[#149696]">{{ $val }}</span>
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

{{-- ═══════════════════════════════════════════════════════════════════════
     4. TESTIMONIALS
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                Trusted by thousands
            </span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2">
                What our customers say
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($testimonials as $t)
            <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-sm
                        hover:shadow-lg hover:border-[#149696]/20 transition-all">
                <div class="flex gap-1 mb-4">
                    @for ($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-5">"{{ $t['quote'] }}"</p>
                <div class="flex items-center gap-3">
                    <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}"
                         class="w-9 h-9 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold text-gray-900">{{ $t['name'] }}</p>
                        <p class="text-xs text-gray-400">{{ $t['role'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     5. FAQ ACCORDION
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                FAQ
            </span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-3">
                Pricing questions answered
            </h2>
            <p class="text-gray-500 text-sm">
                Still have questions?
                <a href="{{ route('contact') }}"
                   class="text-[#149696] hover:underline font-semibold">
                    Contact our team →
                </a>
            </p>
        </div>

        <div class="space-y-3" id="pricing-faq">
            @foreach ($faqs as $i => $faq)
            <div class="bg-gray-50 rounded-2xl border border-gray-100 overflow-hidden
                        transition-all duration-200 hover:border-[#149696]/20"
                 data-faq-item>
                <button type="button"
                        class="faq-trigger w-full flex items-center justify-between gap-4
                               px-6 py-5 text-left group"
                        data-faq-trigger
                        aria-expanded="false"
                        aria-controls="pricing-faq-panel-{{ $i }}">
                    <span class="text-sm font-bold text-gray-900 group-hover:text-[#149696]
                                 transition-colors">
                        {{ $faq['q'] }}
                    </span>
                    <span class="faq-icon shrink-0 w-7 h-7 rounded-full border border-gray-200 bg-white
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
                <div id="pricing-faq-panel-{{ $i }}"
                     class="faq-panel overflow-hidden"
                     style="max-height:0;transition:max-height 0.35s cubic-bezier(0.4,0,0.2,1);"
                     data-faq-panel>
                    <p class="px-6 pb-5 pt-1 text-sm text-gray-500 leading-relaxed">
                        {{ $faq['a'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     6. BOTTOM CTA
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-[#149696]">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-white mb-4 leading-tight">
            Ready to find your next great hire?
        </h2>
        <p class="text-teal-200 text-lg mb-10 max-w-xl mx-auto">
            Join 12,000+ employers and 500,000+ professionals already on PostPulse.
            Start free — no credit card required.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('profile.create') }}"
               class="inline-flex items-center gap-2 bg-white text-[#0f7a7a] font-bold
                      px-8 py-4 rounded-xl hover:bg-[#e6f7f7] transition-colors shadow-lg text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Create Profile Free
            </a>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center gap-2 border-2 border-white/30 text-white
                      font-bold px-8 py-4 rounded-xl hover:bg-white/10 transition-colors text-sm">
                Talk to Sales
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/components/faq-accordion.js') }}" defer></script>
@endpush
