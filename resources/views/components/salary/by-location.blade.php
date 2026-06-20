@props(['byLocation'])

{{-- ===== SALARY BY LOCATION ===== --}}
<div>
    <div class="mb-8">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Salary by Location</h2>
        <p class="text-gray-500 mt-1 text-sm">Average salaries across major UK cities compared to the national average of £47,200.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($byLocation as $loc)
        <div class="relative bg-white rounded-2xl p-5 border transition-all duration-200 hover:shadow-lg group
            {{ $loc['highlight'] ? 'border-[#149696] shadow-sm ring-1 ring-[#149696]/20' : 'border-gray-100 hover:border-[#149696]/40' }}">

            @if($loc['highlight'])
                <div class="absolute top-4 right-4">
                    <span class="text-xs font-bold bg-[#149696] text-white px-2.5 py-1 rounded-full">Top City</span>
                </div>
            @endif

            {{-- Flag + city --}}
            <div class="flex items-center gap-3 mb-4">
                <span class="text-3xl" role="img" aria-label="{{ $loc['city'] }} flag">{{ $loc['flag'] }}</span>
                <div>
                    <div class="font-bold text-gray-900 group-hover:text-[#149696] transition-colors">{{ $loc['city'] }}</div>
                    <div class="text-xs text-gray-400">{{ $loc['country'] }}</div>
                </div>
            </div>

            {{-- Avg salary --}}
            <div class="text-2xl font-extrabold text-gray-900 mb-3">{{ $loc['avg_salary'] }}</div>

            {{-- Stats row --}}
            <div class="flex items-center justify-between pt-3 border-t border-gray-50">
                <div>
                    <div class="text-xs text-gray-400">YoY Growth</div>
                    <div class="text-sm font-semibold text-emerald-600">{{ $loc['growth'] }}</div>
                </div>
                <div class="text-right">
                    <div class="text-xs text-gray-400">vs National Avg</div>
                    <div class="text-sm font-semibold
                        {{ str_starts_with($loc['pct_above_avg'], '-') ? 'text-red-500' : 'text-[#149696]' }}">
                        {{ $loc['pct_above_avg'] }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
