@extends('layouts.app')

@section('title', 'Sign In')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-teal-50/20
            flex items-center justify-center px-4 py-24">

    <div class="w-full max-w-md">

        {{-- Card --}}
        <div class="bg-white rounded-3xl shadow-xl ring-1 ring-gray-100 overflow-hidden">
            <div class="px-8 py-10">
                <x-auth.login-form context="page" :errors="$errors" />
            </div>
            {{-- Accent strip --}}
            <div class="h-1 w-full bg-gradient-to-r from-[#149696] via-teal-400 to-[#149696]"></div>
        </div>

        {{-- Back home link --}}
        <p class="text-center text-sm text-gray-400 mt-6">
            <a href="{{ url('/') }}"
               class="hover:text-[#149696] transition-colors inline-flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to PostPulse
            </a>
        </p>

    </div>
</div>

@endsection
