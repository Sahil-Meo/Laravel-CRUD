@props(['comparison'])

{{-- ===== ROLE SALARY COMPARISON ===== --}}
<div>
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Role Salary Comparison</h2>
            <p class="text-gray-500 mt-1 text-sm">Side-by-side comparison of the three most in-demand tech roles in the UK.</p>
        </div>
        <span class="text-xs text-gray-400 italic self-start sm:self-auto">Scroll right on mobile →</span>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-gray-100 shadow-sm">
        <table class="min-w-full">
            {{-- Header --}}
            <thead>
                <tr class="bg-gray-900 text-white">
                    <th class="px-6 py-5 text-left text-sm font-semibold text-gray-300 w-44">Metric</th>
                    @foreach($comparison['roles'] as $i => $role)
                    <th class="px-6 py-5 text-center text-sm font-bold
                        {{ $i === 0 ? 'bg-[#149696] text-white' : 'text-white' }}">
                        <div class="flex flex-col items-center gap-1">
                            @if($i === 0)
                                <span class="text-[10px] font-semibold bg-white/20 px-2 py-0.5 rounded-full uppercase tracking-wide mb-1">Featured</span>
                            @endif
                            {{ $role }}
                        </div>
                    </th>
                    @endforeach
                </tr>
            </thead>

            {{-- Body --}}
            <tbody class="bg-white divide-y divide-gray-50">
                @foreach($comparison['metrics'] as $rowIndex => $metric)
                <tr class="{{ $rowIndex % 2 === 0 ? 'bg-white' : 'bg-gray-50/50' }} hover:bg-[#149696]/5 transition-colors">
                    {{-- Label --}}
                    <td class="px-6 py-4 text-sm font-semibold text-gray-600 whitespace-nowrap">
                        {{ $metric['label'] }}
                    </td>

                    {{-- Values --}}
                    @foreach($metric['values'] as $colIndex => $value)
                    <td class="px-6 py-4 text-center
                        {{ $colIndex === 0 ? 'bg-[#149696]/5 border-l-2 border-r-2 border-[#149696]/20' : '' }}">
                        @php
                            $hasGbp   = str_contains($value, '£');
                            $hasPlus  = str_starts_with($value, '+');
                        @endphp
                        <span class="text-sm font-bold
                            {{ $hasGbp  ? 'text-[#149696]'   : '' }}
                            {{ $hasPlus ? 'text-emerald-600' : '' }}
                            {{ !$hasGbp && !$hasPlus ? 'text-gray-700' : '' }}">
                            {{ $value }}
                        </span>
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-xs text-gray-400 mt-4">
        * Remote Premium = salary uplift observed in fully remote advertised roles vs. office-based equivalents.
        London Premium = differential for London-based roles vs. UK national average for the same title.
    </p>
</div>
