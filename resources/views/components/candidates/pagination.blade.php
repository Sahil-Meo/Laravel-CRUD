{{--
| Component: <x-candidates.pagination>
| Page-based pagination controls.
| Props: page, total_pages, total, per_page
--}}
@props(['page' => 1, 'total_pages' => 1, 'total' => 0, 'per_page' => 9])

@if ($total_pages > 1)
<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-12 pt-8
            border-t border-gray-100">

    {{-- Info --}}
    <p class="text-sm text-gray-500 order-2 sm:order-1">
        Showing
        <span class="font-semibold text-gray-900">
            {{ (($page - 1) * $per_page) + 1 }}–{{ min($page * $per_page, $total) }}
        </span>
        of <span class="font-semibold text-gray-900">{{ $total }}</span> candidates
    </p>

    {{-- Page numbers --}}
    <div class="flex items-center gap-1.5 order-1 sm:order-2">

        {{-- Prev --}}
        @if ($page > 1)
        <a href="{{ request()->fullUrlWithQuery(['page' => $page - 1]) }}"
           class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200
                  text-gray-500 hover:border-[#149696] hover:text-[#149696] transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        @else
        <span class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-100
                     text-gray-300 cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </span>
        @endif

        {{-- Page numbers (show at most 5 around current) --}}
        @php
            $start = max(1, $page - 2);
            $end   = min($total_pages, $page + 2);
        @endphp

        @if ($start > 1)
        <a href="{{ request()->fullUrlWithQuery(['page' => 1]) }}"
           class="w-9 h-9 flex items-center justify-center rounded-xl text-sm border border-gray-200
                  text-gray-600 hover:border-[#149696] hover:text-[#149696] transition-colors">
            1
        </a>
        @if ($start > 2)
        <span class="w-9 h-9 flex items-center justify-center text-gray-400 text-sm">…</span>
        @endif
        @endif

        @for ($p = $start; $p <= $end; $p++)
        <a href="{{ request()->fullUrlWithQuery(['page' => $p]) }}"
           class="w-9 h-9 flex items-center justify-center rounded-xl text-sm border
                  transition-colors {{ $p === $page
                    ? 'bg-[#149696] text-white border-[#149696] shadow-sm shadow-[#149696]/20'
                    : 'border-gray-200 text-gray-600 hover:border-[#149696] hover:text-[#149696]' }}">
            {{ $p }}
        </a>
        @endfor

        @if ($end < $total_pages)
        @if ($end < $total_pages - 1)
        <span class="w-9 h-9 flex items-center justify-center text-gray-400 text-sm">…</span>
        @endif
        <a href="{{ request()->fullUrlWithQuery(['page' => $total_pages]) }}"
           class="w-9 h-9 flex items-center justify-center rounded-xl text-sm border border-gray-200
                  text-gray-600 hover:border-[#149696] hover:text-[#149696] transition-colors">
            {{ $total_pages }}
        </a>
        @endif

        {{-- Next --}}
        @if ($page < $total_pages)
        <a href="{{ request()->fullUrlWithQuery(['page' => $page + 1]) }}"
           class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-200
                  text-gray-500 hover:border-[#149696] hover:text-[#149696] transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
        @else
        <span class="w-9 h-9 flex items-center justify-center rounded-xl border border-gray-100
                     text-gray-300 cursor-not-allowed">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </span>
        @endif

    </div>
</div>
@endif
