@props(['topTitles'])

{{-- ===== SALARY BY JOB TITLE ===== --}}
<div>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Salary by Job Title</h2>
            <p class="text-gray-500 mt-1 text-sm">Average UK salaries for the most in-demand roles — updated monthly.</p>
        </div>
        <span class="inline-flex items-center gap-1.5 text-xs text-[#149696] font-semibold bg-[#149696]/10 px-3 py-1.5 rounded-full self-start sm:self-auto">
            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
            Updated June 2026
        </span>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-gray-100 shadow-sm">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Job Title</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Avg Salary</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider min-w-[160px]">Salary Range</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Median</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">YoY</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Demand</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-50">
                @foreach($topTitles as $row)
                <tr class="hover:bg-[#149696]/5 transition-colors group">
                    {{-- Title --}}
                    <td class="px-6 py-4">
                        <span class="font-semibold text-gray-900 text-sm group-hover:text-[#149696] transition-colors">
                            {{ $row['title'] }}
                        </span>
                    </td>

                    {{-- Category --}}
                    <td class="px-4 py-4">
                        <span class="inline-block text-xs bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full font-medium">
                            {{ $row['category'] }}
                        </span>
                    </td>

                    {{-- Avg Salary --}}
                    <td class="px-4 py-4">
                        <span class="text-sm font-bold text-[#149696]">{{ $row['avg_salary'] }}</span>
                    </td>

                    {{-- Salary Range bar --}}
                    <td class="px-4 py-4">
                        <div class="space-y-1.5">
                            <div class="flex justify-between text-xs text-gray-400">
                                <span>£{{ number_format($row['min_salary'] / 1000) }}k</span>
                                <span>£{{ number_format($row['max_salary'] / 1000) }}k</span>
                            </div>
                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-[#149696] rounded-full transition-all duration-700"
                                     style="width: {{ $row['bar_pct'] }}%"></div>
                            </div>
                        </div>
                    </td>

                    {{-- Median --}}
                    <td class="px-4 py-4">
                        <span class="text-sm text-gray-700 font-medium">£{{ number_format($row['median']) }}</span>
                    </td>

                    {{-- YoY --}}
                    <td class="px-4 py-4">
                        <span class="text-sm font-semibold text-emerald-600">{{ $row['yoy'] }}</span>
                    </td>

                    {{-- Demand badge --}}
                    <td class="px-4 py-4">
                        @if($row['demand'] === 'High')
                            <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700">High</span>
                        @elseif($row['demand'] === 'Medium')
                            <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full bg-amber-100 text-amber-700">Medium</span>
                        @else
                            <span class="inline-block text-xs font-semibold px-2.5 py-1 rounded-full bg-gray-100 text-gray-600">Low</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
