{{--
| Component: <x-candidates.candidate-card>
| Horizontal single-row layout. Avatar left, info right, actions right edge.
| Props: candidate (array)
--}}
@props(['candidate' => []])

@php
$availColor = match($candidate['availability']) {
    'Actively looking' => ['dot' => 'bg-green-400',  'text' => 'text-green-700',  'bg' => 'bg-green-50',  'border' => 'border-green-200'],
    'Open to offers'   => ['dot' => 'bg-amber-400',  'text' => 'text-amber-700',  'bg' => 'bg-amber-50',  'border' => 'border-amber-200'],
    default            => ['dot' => 'bg-gray-300',   'text' => 'text-gray-500',   'bg' => 'bg-gray-50',   'border' => 'border-gray-200'],
};
@endphp

<article class="group bg-white rounded-2xl border border-gray-100 overflow-hidden
                hover:shadow-xl hover:border-[#149696]/20
                transition-all duration-300">

    {{-- Featured accent bar --}}
    @if (!empty($candidate['featured']))
    <div class="h-0.5 w-full bg-gradient-to-r from-[#149696] via-teal-400 to-[#149696]"></div>
    @endif

    {{-- ── Main horizontal layout ── --}}
    <div class="flex flex-col sm:flex-row gap-0">

        {{-- ══ LEFT — Avatar column ══ --}}
        <div class="flex sm:flex-col items-center sm:justify-start gap-4 sm:gap-3
                    px-6 pt-6 pb-4 sm:pt-7 sm:pb-7 sm:pr-0 sm:w-44 lg:w-52 shrink-0
                    sm:border-r border-b sm:border-b-0 border-gray-100">

            {{-- Avatar with availability dot --}}
            <div class="relative shrink-0">
                <img src="{{ $candidate['avatar'] }}"
                     alt="{{ $candidate['name'] }}"
                     class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl object-cover shadow-sm
                            group-hover:shadow-md transition-shadow">
                <span class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full border-2 border-white
                             {{ $availColor['dot'] }}"></span>
            </div>

            {{-- Availability pill (visible on mobile inline, centered on desktop) --}}
            <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5
                         rounded-full border {{ $availColor['bg'] }} {{ $availColor['text'] }}
                         {{ $availColor['border'] }} sm:text-center sm:justify-center">
                {{ $candidate['availability'] }}
            </span>

            {{-- Remote badge --}}
            @if ($candidate['remote'])
            <span class="hidden sm:inline-flex items-center justify-center gap-1
                         text-xs bg-teal-50 text-teal-600 font-semibold
                         px-3 py-1 rounded-full border border-teal-100">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                </svg>
                Remote
            </span>
            @endif

        </div>

        {{-- ══ RIGHT — Main info + actions ══ --}}
        <div class="flex flex-col flex-1 min-w-0 px-6 py-5 sm:py-6">

            {{-- ── Top row: name / title / badges / actions ── --}}
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-4">

                {{-- Name block --}}
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2 mb-0.5">
                        <h3 class="text-lg font-extrabold text-gray-900 leading-tight
                                   group-hover:text-[#149696] transition-colors">
                            {{ $candidate['name'] }}
                        </h3>
                        @if (!empty($candidate['featured']))
                        <span class="text-xs bg-[#e6f7f7] text-[#149696] font-bold
                                     px-2.5 py-1 rounded-full">
                            Featured
                        </span>
                        @endif
                    </div>
                    <p class="text-sm font-semibold text-[#149696]">
                        {{ $candidate['title'] }}
                    </p>
                </div>

                {{-- Action buttons — always visible on lg, stacked below on mobile --}}
                <div class="flex items-center gap-3 shrink-0">
                    <a href="#"
                       class="inline-flex items-center gap-1.5 text-sm font-semibold
                              text-[#149696] border border-[#149696]/30 px-4 py-2 rounded-xl
                              hover:bg-[#149696] hover:text-white hover:border-[#149696]
                              transition-all whitespace-nowrap">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        View Profile
                    </a>
                    <a href="#"
                       title="Chat system coming soon"
                       class="inline-flex items-center gap-1.5 text-sm font-semibold
                              bg-[#149696] text-white px-4 py-2 rounded-xl
                              hover:bg-[#0f7a7a] transition-colors
                              shadow-sm shadow-[#149696]/20 whitespace-nowrap">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Send Message
                    </a>
                </div>

            </div>

            {{-- ── Meta row: location, exp, work type, salary, category ── --}}
            <div class="flex flex-wrap items-center gap-x-5 gap-y-2 mb-4 text-sm text-gray-500">

                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ $candidate['location'] }}
                    @if ($candidate['remote'])
                    <span class="sm:hidden text-xs bg-teal-50 text-teal-600 font-medium
                                 px-2 py-0.5 rounded-full border border-teal-100 ml-0.5">
                        Remote
                    </span>
                    @endif
                </span>

                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="font-medium text-gray-700">{{ $candidate['years'] }} yrs</span>
                    experience
                </span>

                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $candidate['salary'] }}
                </span>

                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    {{ $candidate['work_type'] }}
                </span>

                <span class="inline-flex items-center text-xs bg-gray-100 text-gray-600
                             font-medium px-2.5 py-1 rounded-full">
                    {{ $candidate['category'] }}
                </span>

            </div>

            {{-- ── Summary ── --}}
            <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2">
                {{ $candidate['summary'] }}
            </p>

            {{-- ── Bottom row: education left, skills right ── --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3
                        pt-4 border-t border-gray-100">

                {{-- Education --}}
                <div class="flex items-center gap-1.5 min-w-0">
                    <svg class="w-4 h-4 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                    <span class="text-xs text-gray-500 truncate">{{ $candidate['education'] }}</span>
                </div>

                {{-- Skills --}}
                <div class="flex flex-wrap gap-1.5">
                    @foreach (array_slice($candidate['skills'], 0, 4) as $skill)
                    <span class="text-xs bg-[#e6f7f7] text-[#149696] font-medium
                                 px-2.5 py-1 rounded-full">
                        {{ $skill }}
                    </span>
                    @endforeach
                    @if (count($candidate['skills']) > 4)
                    <span class="text-xs text-gray-400 bg-gray-50 border border-gray-100
                                 font-medium px-2.5 py-1 rounded-full">
                        +{{ count($candidate['skills']) - 4 }}
                    </span>
                    @endif
                </div>

            </div>

        </div>
    </div>

</article>
