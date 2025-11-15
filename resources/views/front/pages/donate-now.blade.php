@extends('front.layouts.master')
@section('title', 'Donate Now')
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1', [
        'title' => 'Donate Now',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Donate Now',
        'image' => 'assets/core/BreadCrumb.png',
    ])

    @include('front.partials.donation-form.donation-form')

@endsection
@section('js')

    @include('front.partials.donation-form.donation-form-script')

@endsection
