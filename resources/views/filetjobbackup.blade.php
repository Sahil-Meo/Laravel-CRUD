@extends('layouts.app')
@section('title', 'Salary Insights')
@section('content')

<x-salary.hero :stats="$stats" :filters="$filters" :industries="$industries" :locations="$locations" :experiences="$experiences" />

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 space-y-20">
        <x-salary.salary-by-title :topTitles="$topTitles" />
        <x-salary.by-experience :byExperience="$byExperience" />
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 space-y-20">
        <x-salary.by-industry :byIndustry="$byIndustry" />
        <x-salary.by-location :byLocation="$byLocation" />
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 space-y-20">
        <x-salary.trends :trends="$trends" />
        <x-salary.compensation-breakdown :compensation="$compensation" />
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <x-salary.salary-comparison :comparison="$comparison" />
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <x-salary.featured-reports :reports="$reports" />
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <x-salary.featured-reports :reports="$reports" />
    </div>
</section>



<x-salary.cta />

@endsection
@push('scripts')
<script src="{{ asset('js/components/salary.js') }}" defer></script>
@endpush
