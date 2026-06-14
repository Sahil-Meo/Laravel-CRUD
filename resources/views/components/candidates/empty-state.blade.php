{{--
| Component: <x-candidates.empty-state>
| Shown when no candidates match the current filters.
--}}
<div class="text-center py-24 col-span-full">
    <div class="w-20 h-20 bg-gray-100 rounded-3xl flex items-center justify-center mx-auto mb-6">
        <svg class="w-9 h-9 text-gray-400" fill="none" stroke="currentColor"
             stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318
                     M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9
                     10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625
                     0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375
                     0h.008v.015h-.008V9.75z"/>
        </svg>
    </div>
    <h3 class="text-xl font-extrabold text-gray-900 mb-2">No candidates found</h3>
    <p class="text-gray-500 text-sm max-w-xs mx-auto mb-8 leading-relaxed">
        No profiles match your current filters. Try broadening your search or removing some criteria.
    </p>
    <a href="{{ route('candidates.index') }}"
       class="inline-flex items-center gap-2 text-sm font-semibold text-[#149696]
              border border-[#149696]/30 px-6 py-3 rounded-xl hover:bg-[#e6f7f7] transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Clear all filters
    </a>
</div>
