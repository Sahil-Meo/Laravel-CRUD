@props(['stats', 'filters', 'industries', 'locations', 'experiences'])

{{-- ===== SALARY HERO ===== --}}
<section class="relative bg-gray-950 text-white overflow-hidden">

    {{-- Background image overlay --}}
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1400&auto=format&fit=crop&q=80"
            alt=""
            class="w-full h-full object-cover opacity-20"
            aria-hidden="true"
        >
        <div class="absolute inset-0 bg-gradient-to-b from-gray-950/60 via-gray-950/40 to-gray-950/80"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 pt-24 pb-12">

        {{-- Badge --}}
        <div class="flex justify-center mb-6">
            <span class="inline-flex items-center gap-2 bg-[#149696]/20 border border-[#149696]/40 text-[#4dd9d9] text-xs font-semibold uppercase tracking-widest px-4 py-2 rounded-full">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zm6-4a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zm6-3a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                </svg>
                Salary Intelligence Platform
            </span>
        </div>

        {{-- Headline --}}
        <h1 class="text-center text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 leading-tight">
            Know your worth.<br>
            <span class="text-[#149696]">Negotiate with confidence.</span>
        </h1>

        {{-- Subheading --}}
        <p class="text-center text-gray-300 text-lg sm:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
            PostPulse tracks salaries across 12,400+ roles, 3,800+ companies, and every major UK city — updated monthly.
        </p>

        {{-- Search / Filter Form --}}
        <form id="salary-filter-form"
              method="GET"
              action="{{ route('salary.index') }}"
              class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-4 max-w-5xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-3">

                {{-- Job title text input --}}
                <div class="flex-1 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                        </svg>
                    </span>
                    <input
                        type="text"
                        name="title"
                        value="{{ $filters['title'] }}"
                        placeholder="Search job title, e.g. Software Engineer"
                        class="w-full pl-9 pr-4 py-3 rounded-xl bg-white/90 text-gray-900 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#149696]"
                    >
                </div>

                {{-- Industry select --}}
                <select name="industry"
                        class="px-4 py-3 rounded-xl bg-white/90 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#149696] lg:w-48">
                    @foreach($industries as $opt)
                        <option value="{{ $opt }}" @selected($filters['industry'] === $opt)>
                            {{ $opt === 'All' ? 'All Industries' : $opt }}
                        </option>
                    @endforeach
                </select>

                {{-- Location select --}}
                <select name="location"
                        class="px-4 py-3 rounded-xl bg-white/90 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#149696] lg:w-40">
                    @foreach($locations as $opt)
                        <option value="{{ $opt }}" @selected($filters['location'] === $opt)>
                            {{ $opt === 'All' ? 'All Locations' : $opt }}
                        </option>
                    @endforeach
                </select>

                {{-- Experience select --}}
                <select name="experience"
                        class="px-4 py-3 rounded-xl bg-white/90 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#149696] lg:w-52">
                    @foreach($experiences as $opt)
                        <option value="{{ $opt }}" @selected($filters['experience'] === $opt)>
                            {{ $opt === 'All' ? 'All Levels' : $opt }}
                        </option>
                    @endforeach
                </select>

                {{-- Search button --}}
                <button type="submit"
                        class="px-6 py-3 bg-[#149696] hover:bg-[#0f7a7a] text-white font-semibold rounded-xl text-sm transition-colors whitespace-nowrap">
                    Search Salaries
                </button>
            </div>
        </form>
    </div>

    {{-- Stats Band (white strip) --}}
    <div class="relative bg-white">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($stats as $stat)
                <div class="flex items-start gap-4">
                    {{-- Icon circle --}}
                    <div class="w-11 h-11 rounded-xl bg-[#149696]/10 flex items-center justify-center shrink-0">
                        @if($stat['icon'] === 'currency')
                            <svg class="w-5 h-5 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        @elseif($stat['icon'] === 'briefcase')
                            <svg class="w-5 h-5 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        @elseif($stat['icon'] === 'building')
                            <svg class="w-5 h-5 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        @endif
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-gray-900">{{ $stat['value'] }}</div>
                        <div class="text-sm text-gray-500 leading-tight">{{ $stat['label'] }}</div>
                        <span class="inline-block mt-1 text-xs font-semibold px-2 py-0.5 rounded-full
                            {{ $stat['up'] ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                            {{ $stat['up'] ? '↑' : '↓' }} {{ $stat['change'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</section>
