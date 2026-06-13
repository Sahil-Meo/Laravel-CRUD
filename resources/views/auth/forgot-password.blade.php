@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-teal-50/20
            flex items-center justify-center px-4 py-24">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-3xl shadow-xl ring-1 ring-gray-100 overflow-hidden">
            <div class="px-8 py-10">

                {{-- Header --}}
                <div class="text-center mb-8">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/nav_logo.png') }}" alt="PostPulse"
                             class="h-10 w-auto object-contain mx-auto mb-6">
                    </a>
                    <div class="w-14 h-14 bg-[#e6f7f7] rounded-2xl flex items-center
                                justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-[#149696]" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11
                                     17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6
                                     6 0 1121 9z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Reset your password</h1>
                    <p class="text-sm text-gray-500">
                        Enter your email and we'll send you a reset link.
                    </p>
                </div>

                {{-- Coming soon notice --}}
                <div class="bg-amber-50 border border-amber-200 rounded-xl px-4 py-4 mb-6
                            flex items-start gap-3">
                    <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213
                                 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11
                                 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002
                                 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm text-amber-700">
                        <strong class="font-semibold">Coming soon.</strong>
                        Password reset will be available when full authentication is set up.
                        In the meantime, use any credentials on the login page to continue.
                    </p>
                </div>

                <a href="{{ route('auth.login') }}"
                   class="w-full flex items-center justify-center gap-2 border border-gray-200
                          text-gray-700 font-semibold py-3 rounded-xl hover:border-[#149696]
                          hover:text-[#149696] transition-colors text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to sign in
                </a>

            </div>
            <div class="h-1 w-full bg-gradient-to-r from-[#149696] via-teal-400 to-[#149696]"></div>
        </div>
    </div>
</div>

@endsection
