@extends('front.layouts.master')
@section('title', 'About Us')
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1',[
        'title' => 'About Us',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> About Us',
        'image' => 'assets/core/BreadCrumb.png',
    ])
    
    @include('front.partials.about-us.about-us-2')

    @include('front.partials.mission-statements.mission-vission')

    @include('front.partials.countries.countries-1')

@endsection
