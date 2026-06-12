@extends('layouts.app')

@section('title', 'Create Profile')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-teal-50/20 pt-24 pb-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">

        {{-- ── Wizard root — JS reads/writes data-role and data-step ────── --}}
        <div id="profile-wizard" data-role="" data-step="0">

            {{-- ════════════════════════════════════════════════════════════
                 STEP 0  —  Role selector
                 ════════════════════════════════════════════════════════════ --}}
            <div data-wizard-panel="0">
                <x-profile.role-selector />
            </div>

            {{-- ════════════════════════════════════════════════════════════
                 JOB SEEKER  form  (steps 1–3)
                 ════════════════════════════════════════════════════════════ --}}
            <div data-wizard-panel="seeker" class="hidden">

                {{-- Back to role selection --}}
                <button type="button" data-wizard-back="0"
                        class="inline-flex items-center gap-1.5 text-sm text-gray-500
                               hover:text-[#149696] transition-colors mb-8 group">
                    <svg class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Change role
                </button>

                {{-- Role badge --}}
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-[#e6f7f7] flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#149696]" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Job Seeker</p>
                        <p class="text-sm font-bold text-gray-900">Build your candidate profile</p>
                    </div>
                </div>

                {{-- Progress bar (updated by JS) --}}
                <div id="seeker-progress"></div>

                {{-- Form --}}
                <form action="{{ route('profile.seeker.store') }}" method="POST"
                      enctype="multipart/form-data" id="seeker-form" novalidate>
                    @csrf

                    {{-- Card shell --}}
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-8 py-8 md:px-10">

                            {{-- Step panels --}}
                            <div data-seeker-step="1">
                                <x-profile.seeker.step-personal />
                            </div>

                            <div data-seeker-step="2" class="hidden">
                                <x-profile.seeker.step-experience />
                            </div>

                            <div data-seeker-step="3" class="hidden">
                                <x-profile.seeker.step-links />
                            </div>

                        </div>

                        {{-- Navigation footer --}}
                        <div class="px-8 md:px-10 py-5 bg-gray-50 border-t border-gray-100
                                    flex items-center justify-between gap-4">

                            <button type="button" id="seeker-prev"
                                    class="hidden inline-flex items-center gap-2 text-sm font-semibold
                                           text-gray-600 border border-gray-200 px-5 py-2.5 rounded-xl
                                           hover:border-gray-300 hover:text-gray-800 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                     stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Previous
                            </button>
                            <div class="flex-1"></div>

                            <button type="button" id="seeker-next"
                                    class="inline-flex items-center gap-2 bg-[#149696] text-white
                                           text-sm font-semibold px-6 py-2.5 rounded-xl
                                           hover:bg-[#0f7a7a] transition-colors shadow-sm shadow-[#149696]/20">
                                Next step
                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                     stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </button>

                            <button type="submit" id="seeker-submit"
                                    class="hidden inline-flex items-center gap-2 bg-[#149696] text-white
                                           text-sm font-semibold px-6 py-2.5 rounded-xl
                                           hover:bg-[#0f7a7a] transition-colors shadow-sm shadow-[#149696]/20">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                     stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Create my profile
                            </button>
                        </div>
                    </div>

                </form>
            </div>

            {{-- ════════════════════════════════════════════════════════════
                 EMPLOYER  form  (steps 1–2)
                 ════════════════════════════════════════════════════════════ --}}
            <div data-wizard-panel="employer" class="hidden">

                {{-- Back to role selection --}}
                <button type="button" data-wizard-back="0"
                        class="inline-flex items-center gap-1.5 text-sm text-gray-500
                               hover:text-[#149696] transition-colors mb-8 group">
                    <svg class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Change role
                </button>

                {{-- Role badge --}}
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2
                                     0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011
                                     1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Employer</p>
                        <p class="text-sm font-bold text-gray-900">Set up your company profile</p>
                    </div>
                </div>

                {{-- Progress bar (updated by JS) --}}
                <div id="employer-progress"></div>

                {{-- Form --}}
                <form action="{{ route('profile.employer.store') }}" method="POST"
                      enctype="multipart/form-data" id="employer-form" novalidate>
                    @csrf

                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-8 py-8 md:px-10">

                            <div data-employer-step="1">
                                <x-profile.employer.step-company />
                            </div>

                            <div data-employer-step="2" class="hidden">
                                <x-profile.employer.step-details />
                            </div>

                        </div>

                        {{-- Navigation footer --}}
                        <div class="px-8 md:px-10 py-5 bg-gray-50 border-t border-gray-100
                                    flex items-center justify-between gap-4">

                            <button type="button" id="employer-prev"
                                    class="hidden inline-flex items-center gap-2 text-sm font-semibold
                                           text-gray-600 border border-gray-200 px-5 py-2.5 rounded-xl
                                           hover:border-gray-300 hover:text-gray-800 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                     stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Previous
                            </button>
                            <div class="flex-1"></div>

                            <button type="button" id="employer-next"
                                    class="inline-flex items-center gap-2 bg-amber-500 text-white
                                           text-sm font-semibold px-6 py-2.5 rounded-xl
                                           hover:bg-amber-600 transition-colors shadow-sm shadow-amber-200">
                                Next step
                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                     stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </button>

                            <button type="submit" id="employer-submit"
                                    class="hidden inline-flex items-center gap-2 bg-amber-500 text-white
                                           text-sm font-semibold px-6 py-2.5 rounded-xl
                                           hover:bg-amber-600 transition-colors shadow-sm shadow-amber-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                     stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Create employer profile
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>{{-- /wizard --}}
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/components/profile-wizard.js') }}" defer></script>
@endpush
