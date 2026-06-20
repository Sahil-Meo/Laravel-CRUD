@extends('layouts.app')
@section('title', 'Salary Insights')
@section('content')

<x-salary.hero :stats="$stats" :filters="$filters" :industries="$industries" :locations="$locations" :experiences="$experiences" />



<x-salary.cta />

@endsection
@push('scripts')
<script src="{{ asset('js/components/salary.js') }}" defer></script>
@endpush
