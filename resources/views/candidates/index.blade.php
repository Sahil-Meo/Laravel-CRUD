@extends('layouts.app')

@section('title', 'Browse Candidates')

@section('content')

{{-- ── Hero + search ─────────────────────────────────────────────────────── --}}
<x-candidates.hero :search="$search" />

{{-- ── Mobile filter drawer ─────────────────────────────────────────────── --}}
<x-candidates.filter-drawer
    :categories="$categories"
    :experiences="$experiences"
    :availabilities="$availabilities"
    :workTypes="$workTypes"
    :category="$category"
    :experience="$experience"
    :availability="$availability"
    :work_type="$work_type"
    :remote_only="$remote_only"
    :search="$search"
    :sort="$sort"
/>

{{-- ── Main content area ────────────────────────────────────────────────── --}}
<section class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex gap-8 items-start">

            {{-- ── Desktop sidebar ── --}}
            <x-candidates.filter-sidebar
                :categories="$categories"
                :experiences="$experiences"
                :availabilities="$availabilities"
                :workTypes="$workTypes"
                :category="$category"
                :experience="$experience"
                :availability="$availability"
                :work_type="$work_type"
                :remote_only="$remote_only"
                :search="$search"
                :sort="$sort"
            />

            {{-- ── Results column ── --}}
            <div class="flex-1 min-w-0">

                {{-- Toolbar: count + chips + sort + mobile filter btn --}}
                <x-candidates.toolbar
                    :total="$total"
                    :sort="$sort"
                    :sortOptions="$sortOptions"
                    :search="$search"
                    :category="$category"
                    :experience="$experience"
                    :availability="$availability"
                    :work_type="$work_type"
                    :remote_only="$remote_only"
                    :active_filters="$active_filters"
                />

                {{-- Candidate cards — single column horizontal list --}}
                @if (count($candidates) > 0)
                <div class="flex flex-col gap-5">
                    @foreach ($candidates as $candidate)
                    <x-candidates.candidate-card :candidate="$candidate" />
                    @endforeach
                </div>

                {{-- Pagination --}}
                <x-candidates.pagination
                    :page="$page"
                    :total_pages="$total_pages"
                    :total="$total"
                    :per_page="$per_page"
                />

                @else
                <x-candidates.empty-state />
                @endif

            </div>
        </div>
    </div>
</section>

{{-- ── Employer CTA band ────────────────────────────────────────────────── --}}
<section class="py-16 bg-[#149696]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-2xl font-extrabold text-white mb-1">
                    Ready to reach out to a candidate?
                </h3>
                <p class="text-teal-200 text-sm">
                    Create your employer profile to unlock direct messaging and
                    advanced candidate insights.
                </p>
            </div>
            <div class="flex flex-wrap gap-4 shrink-0">
                <a href="{{ route('profile.create') }}"
                   class="inline-flex items-center gap-2 bg-white text-[#0f7a7a] font-semibold
                          px-6 py-3 rounded-xl hover:bg-[#e6f7f7] transition-colors
                          shadow-sm text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Create Employer Profile
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 border-2 border-white/30 text-white
                          font-semibold px-6 py-3 rounded-xl hover:bg-white/10 transition-colors
                          text-sm">
                    Talk to our team
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/components/candidates.js') }}" defer></script>
{{-- Alpine.js powers the collapsible filter groups in the sidebar --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
