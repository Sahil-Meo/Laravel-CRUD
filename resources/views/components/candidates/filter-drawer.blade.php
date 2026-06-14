{{--
| Component: <x-candidates.filter-drawer>
| Mobile slide-over filter drawer. Opened by #mobile-filter-btn.
--}}
@props([
    'categories' => [], 'experiences' => [], 'availabilities' => [], 'workTypes' => [],
    'category' => 'All', 'experience' => 'All', 'availability' => 'All',
    'work_type' => 'All', 'remote_only' => false, 'search' => '', 'sort' => '',
])

{{-- Backdrop --}}
<div id="filter-backdrop"
     class="fixed inset-0 z-40 bg-gray-950/50 backdrop-blur-sm hidden lg:hidden"
     aria-hidden="true"></div>

{{-- Drawer panel --}}
<div id="filter-drawer"
     class="fixed inset-y-0 left-0 z-50 w-80 max-w-full bg-white shadow-2xl
            translate-x-[-100%] transition-transform duration-300 ease-out
            flex flex-col lg:hidden"
     role="dialog" aria-label="Filter candidates">

    {{-- Drawer header --}}
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 shrink-0">
        <span class="text-base font-bold text-gray-900">Filters</span>
        <div class="flex items-center gap-3">
            @if ($category !== 'All' || $experience !== 'All' || $availability !== 'All' || $work_type !== 'All' || $remote_only)
            <a href="{{ route('candidates.index') }}{{ $search ? '?search='.$search : '' }}"
               class="text-xs text-red-500 hover:text-red-700 font-semibold">
                Clear all
            </a>
            @endif
            <button type="button" id="filter-drawer-close"
                    class="w-8 h-8 flex items-center justify-center rounded-full
                           text-gray-400 hover:text-gray-700 hover:bg-gray-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Scrollable filter body --}}
    <div class="flex-1 overflow-y-auto">
        <form method="GET" action="{{ route('candidates.index') }}" id="mobile-filter-form"
              class="px-5 py-5 space-y-6">

            @if ($search)
            <input type="hidden" name="search" value="{{ $search }}">
            @endif
            @if ($sort)
            <input type="hidden" name="sort" value="{{ $sort }}">
            @endif

            {{-- Category --}}
            <div>
                <p class="text-sm font-bold text-gray-900 mb-3">Job Category</p>
                <div class="space-y-2.5">
                    @foreach ($categories as $cat)
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="radio" name="category" value="{{ $cat }}"
                               {{ $category === $cat ? 'checked' : '' }}
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-700">{{ $cat }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="h-px bg-gray-100"></div>

            {{-- Experience --}}
            <div>
                <p class="text-sm font-bold text-gray-900 mb-3">Experience Level</p>
                <div class="space-y-2.5">
                    @foreach ($experiences as $exp)
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="radio" name="experience" value="{{ $exp }}"
                               {{ $experience === $exp ? 'checked' : '' }}
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-700">{{ $exp }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="h-px bg-gray-100"></div>

            {{-- Availability --}}
            <div>
                <p class="text-sm font-bold text-gray-900 mb-3">Availability</p>
                <div class="space-y-2.5">
                    @foreach ($availabilities as $avail)
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="radio" name="availability" value="{{ $avail }}"
                               {{ $availability === $avail ? 'checked' : '' }}
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-700">{{ $avail }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="h-px bg-gray-100"></div>

            {{-- Work Type --}}
            <div>
                <p class="text-sm font-bold text-gray-900 mb-3">Work Type</p>
                <div class="space-y-2.5">
                    @foreach ($workTypes as $wt)
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="radio" name="work_type" value="{{ $wt }}"
                               {{ $work_type === $wt ? 'checked' : '' }}
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-700">{{ $wt }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="h-px bg-gray-100"></div>

            {{-- Remote only --}}
            <label class="flex items-center justify-between cursor-pointer">
                <span class="text-sm font-bold text-gray-900">Remote only</span>
                <div class="relative">
                    <input type="checkbox" name="remote_only" value="1"
                           {{ $remote_only ? 'checked' : '' }}
                           class="sr-only peer">
                    <div class="w-10 h-6 bg-gray-200 peer-checked:bg-[#149696] rounded-full
                                transition-colors"></div>
                    <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow
                                transition-transform peer-checked:translate-x-4"></div>
                </div>
            </label>

        </form>
    </div>

    {{-- Apply button --}}
    <div class="px-5 py-4 border-t border-gray-100 shrink-0">
        <button type="submit" form="mobile-filter-form"
                class="w-full bg-[#149696] text-white font-semibold py-3 rounded-xl
                       hover:bg-[#0f7a7a] transition-colors shadow-sm text-sm">
            Apply Filters
        </button>
    </div>

</div>
