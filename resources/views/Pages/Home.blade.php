@extends('layouts.app')

@section('title', 'Smart Tax & Accounting')

@section('content')
    @include('Component.hero')
    @include('Component.tax-benefits')
    @include('Component.audit-defense')
    @include('Component.testimonials')
    @include('Component.franchise-inquiry')
@endsection