{{--
| Component: <x-candidates.toolbar>
| Results count, active filter chips, sort dropdown, mobile filter button.
--}}
@props([
    'total' => 0, 'sort' => '', 'sortOptions' => [],
    'search' => '', 'category' => 'All', 'experience' => 'All',
    'availability' => 'All', 'work_type' => 'All',
    'remote_only' => false, 'active_filters' => 0,
])

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-8">

    {{-- Left: count + active chips --}}
    <div class="flex flex-wrap items-center gap-2">
        <p class="text-sm text-gray-500">
            <span class="font-bold text-gray-900">{{ $total }}</span>
            {{ $total === 1 ? 'candidate' : 'candidates' }} found
        </p>

        {{-- Active filter chips --}}
        @foreach ([
            ['key' => 'category',     'val' => $category,     'default' => 'All'],
            ['key' => 'experience',   'val' => $experience,   'default' => 'All'],
            ['key' => 'availability', 'val' => $availability, 'default' => 'All'],
            ['key' => 'work_type',    'val' => $work_type,    'default' => 'All'],
        ] as $f)
        @if ($f['val'] !== $f['default'])
        <a href="{{ request()->fullUrlWithoutQuery([$f['key']]) }}"
           class="inline-flex items-center gap-1.5 text-xs bg-[#e6f7f7] text-[#149696]
                  font-semibold px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600
                  transition-colors group">
            {{ $f['val'] }}
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </a>
        @endif
        @endforeach

        @if ($remote_only)
        <a href="{{ request()->fullUrlWithoutQuery(['remote_only']) }}"
           class="inline-flex items-center gap-1.5 text-xs bg-[#e6f7f7] text-[#149696]
                  font-semibold px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600
                  transition-colors">
            Remote only
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </a>
        @endif

        @if ($search)
        <a href="{{ request()->fullUrlWithoutQuery(['search']) }}"
           class="inline-flex items-center gap-1.5 text-xs bg-[#e6f7f7] text-[#149696]
                  font-semibold px-3 py-1.5 rounded-full hover:bg-red-50 hover:text-red-600
                  transition-colors">
            "{{ $search }}"
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </a>
        @endif
    </div>

    {{-- Right: mobile filter btn + sort --}}
    <div class="flex items-center gap-3 shrink-0">

        {{-- Mobile filter button --}}
        <button type="button" id="mobile-filter-btn"
                class="lg:hidden inline-flex items-center gap-2 text-sm font-semibold
                       border border-gray-200 text-gray-700 px-4 py-2 rounded-xl
                       hover:border-[#149696] hover:text-[#149696] transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
            Filters
            @if ($active_filters > 0)
            <span class="bg-[#149696] text-white text-xs font-bold w-5 h-5 rounded-full
                         flex items-center justify-center">
                {{ $active_filters }}
            </span>
            @endif
        </button>

        {{-- Sort dropdown --}}
        <form method="GET" action="{{ route('candidates.index') }}" id="sort-form">
            @foreach (['search' => $search, 'category' => $category, 'experience' => $experience,
                       'availability' => $availability, 'work_type' => $work_type] as $k => $v)
            @if ($v && $v !== 'All')
            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
            @endif
            @endforeach
            @if ($remote_only)
            <input type="hidden" name="remote_only" value="1">
            @endif
            <select name="sort" onchange="document.getElementById('sort-form').submit()"
                    class="text-sm border border-gray-200 rounded-xl px-3 py-2 bg-white
                           text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                           focus:border-[#149696] transition">
                @foreach ($sortOptions as $opt)
                <option value="{{ $opt }}" {{ $sort === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                @endforeach
            </select>
        </form>

    </div>
</div>
