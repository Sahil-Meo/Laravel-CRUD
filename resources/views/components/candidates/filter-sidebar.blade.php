{{--
| Component: <x-candidates.filter-sidebar>
| Desktop left sidebar with all filter controls.
| Props: categories, experiences, availabilities, workTypes,
|        category, experience, availability, work_type,
|        remote_only, search, sort
--}}
@props([
    'categories' => [], 'experiences' => [], 'availabilities' => [], 'workTypes' => [],
    'category' => 'All', 'experience' => 'All', 'availability' => 'All',
    'work_type' => 'All', 'remote_only' => false, 'search' => '', 'sort' => '',
])

<aside class="hidden lg:block w-64 xl:w-72 shrink-0">
    <div class="sticky top-24 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <span class="text-sm font-bold text-gray-900">Filters</span>
            @if ($category !== 'All' || $experience !== 'All' || $availability !== 'All' || $work_type !== 'All' || $remote_only || $search)
            <a href="{{ route('candidates.index') }}"
               class="text-xs text-red-500 hover:text-red-700 font-semibold transition-colors">
                Clear all
            </a>
            @endif
        </div>

        <form method="GET" action="{{ route('candidates.index') }}" id="filter-form">
            @if ($search)
            <input type="hidden" name="search" value="{{ $search }}">
            @endif

            <div class="px-5 py-5 space-y-6">

                {{-- Category --}}
                <x-candidates.filter-group label="Job Category">
                    @foreach ($categories as $cat)
                    <label class="flex items-center gap-2.5 cursor-pointer group">
                        <input type="radio" name="category" value="{{ $cat }}"
                               {{ $category === $cat ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()"
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">
                            {{ $cat }}
                        </span>
                    </label>
                    @endforeach
                </x-candidates.filter-group>

                {{-- Experience Level --}}
                <x-candidates.filter-group label="Experience Level">
                    @foreach ($experiences as $exp)
                    <label class="flex items-center gap-2.5 cursor-pointer group">
                        <input type="radio" name="experience" value="{{ $exp }}"
                               {{ $experience === $exp ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()"
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">
                            {{ $exp }}
                        </span>
                    </label>
                    @endforeach
                </x-candidates.filter-group>

                {{-- Availability --}}
                <x-candidates.filter-group label="Availability">
                    @foreach ($availabilities as $avail)
                    <label class="flex items-center gap-2.5 cursor-pointer group">
                        <input type="radio" name="availability" value="{{ $avail }}"
                               {{ $availability === $avail ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()"
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">
                            {{ $avail }}
                        </span>
                    </label>
                    @endforeach
                </x-candidates.filter-group>

                {{-- Work Type --}}
                <x-candidates.filter-group label="Work Type">
                    @foreach ($workTypes as $wt)
                    <label class="flex items-center gap-2.5 cursor-pointer group">
                        <input type="radio" name="work_type" value="{{ $wt }}"
                               {{ $work_type === $wt ? 'checked' : '' }}
                               onchange="document.getElementById('filter-form').submit()"
                               class="w-4 h-4 accent-[#149696]">
                        <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">
                            {{ $wt }}
                        </span>
                    </label>
                    @endforeach
                </x-candidates.filter-group>

                {{-- Remote only toggle --}}
                <div class="pt-1">
                    <label class="flex items-center justify-between cursor-pointer">
                        <span class="text-sm font-semibold text-gray-800">Remote only</span>
                        <div class="relative">
                            <input type="checkbox" name="remote_only" value="1"
                                   {{ $remote_only ? 'checked' : '' }}
                                   onchange="document.getElementById('filter-form').submit()"
                                   class="sr-only peer">
                            <div class="w-10 h-6 bg-gray-200 peer-checked:bg-[#149696] rounded-full
                                        transition-colors peer-focus:ring-2 peer-focus:ring-[#149696]/40">
                            </div>
                            <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow
                                        transition-transform peer-checked:translate-x-4"></div>
                        </div>
                    </label>
                </div>

                {{-- Hidden sort passthrough --}}
                @if ($sort)
                <input type="hidden" name="sort" value="{{ $sort }}">
                @endif

            </div>
        </form>
    </div>
</aside>
