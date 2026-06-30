@extends('layouts.app')
@section('title', 'Terms of Service')
@section('content')
<section class="relative pt-32 pb-16 bg-gradient-to-br from-gray-950 via-gray-900 to-[#0a4f4f] overflow-hidden">
    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4] border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-widest mb-6">Legal</span>
        <h1 class="text-4xl lg:text-5xl font-extrabold text-white mb-4">Terms of Service</h1>
        <p class="text-gray-300 text-lg max-w-xl mx-auto">Coming soon — our full Terms of Service are being drafted. In the meantime, <a href="{{ route('contact') }}" class="text-[#4dd4d4] hover:underline">contact us</a> with any questions.</p>
    </div>
</section>
<section class="py-20 bg-white">
    <div class="max-w-2xl mx-auto px-6 text-center">
        <div class="w-16 h-16 bg-[#e6f7f7] rounded-2xl flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8 text-[#149696]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        <h2 class="text-2xl font-extrabold text-gray-900 mb-3">Terms coming soon</h2>
        <p class="text-gray-500 mb-8">Our legal team is finalising our Terms of Service. They will be published here shortly. Until then, please review our <a href="{{ route('privacy') }}" class="text-[#149696] hover:underline">Privacy Policy</a> or <a href="{{ route('contact') }}" class="text-[#149696] hover:underline">contact us</a> with any concerns.</p>
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#149696] border border-[#149696]/30 px-6 py-3 rounded-xl hover:bg-[#e6f7f7] transition-colors">
            ← Back to home
        </a>
    </div>
</section>
@endsection
