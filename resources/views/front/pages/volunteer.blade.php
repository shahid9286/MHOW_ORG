@extends('front.layouts.master')
@section('title', 'Become a Volunteer')
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1', [
        'title' => 'Become a Volunteer',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Become a Volunteer',
        'image' => 'assets/core/BreadCrumb.png',
    ])

    @include('front.partials.volunteer.volunteer-form')

@endsection
@section('js')

    @include('front.partials.volunteer.volunteer-form-script')

@endsection
