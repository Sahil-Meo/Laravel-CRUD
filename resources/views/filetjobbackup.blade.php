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

<x-salary.cta />

@endsection
@push('scripts')
<script src="{{ asset('js/components/salary.js') }}" defer></script>
@endpush
