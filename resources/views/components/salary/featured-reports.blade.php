@props(['reports'])

{{-- ===== FEATURED SALARY REPORTS ===== --}}
<div>
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Featured Salary Reports</h2>
            <p class="text-gray-500 mt-1 text-sm">In-depth salary guides written by PostPulse data analysts and industry experts.</p>
        </div>
        <a href="#" class="text-sm font-semibold text-[#149696] hover:underline self-start sm:self-auto whitespace-nowrap">
            View all reports →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($reports as $report)
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg hover:border-[#149696]/40 transition-all duration-200 group flex flex-col">

            {{-- Image --}}
            <div class="relative h-40 overflow-hidden bg-gray-100">
                <img
                    src="{{ $report['image_url'] }}"
                    alt="{{ $report['title'] }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                >
                {{-- Tag badge over image --}}
                <div class="absolute top-3 left-3">
                    <span class="text-xs font-bold px-2.5 py-1 rounded-full
                        {{ $report['tag'] === 'Free' ? 'bg-[#149696] text-white' : 'bg-amber-500 text-white' }}">
                        {{ $report['tag'] }}
                    </span>
                </div>
            </div>

            {{-- Content --}}
            <div class="p-5 flex flex-col flex-1">

                {{-- Category badge --}}
                <span class="inline-block text-xs font-semibold text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full self-start mb-3">
                    {{ $report['category'] }}
                </span>

                {{-- Title --}}
                <h3 class="font-bold text-gray-900 text-base leading-snug mb-2 group-hover:text-[#149696] transition-colors">
                    {{ $report['title'] }}
                </h3>

                {{-- Description --}}
                <p class="text-sm text-gray-500 leading-relaxed flex-1 mb-4">
                    {{ $report['description'] }}
                </p>

                {{-- Meta --}}
                <div class="flex items-center justify-between text-xs text-gray-400 mb-4 pt-4 border-t border-gray-50">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $report['date'] }}
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        {{ $report['pages'] }} pages
                    </div>
                </div>

                {{-- CTA --}}
                <a href="#"
                   class="w-full text-center py-2.5 rounded-xl text-sm font-semibold transition-colors
                       {{ $report['tag'] === 'Free'
                           ? 'bg-[#149696] hover:bg-[#0f7a7a] text-white'
                           : 'bg-gray-900 hover:bg-gray-700 text-white' }}">
                    @if($report['tag'] === 'Free')
                        Download Free Report
                    @else
                        Get Premium Report
                    @endif
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
