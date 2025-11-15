@extends('hijrah.layouts.master')
@section('title', 'About Us')
@section('content')

    @include('hijrah.partials.breadcrumbs.breadcrumb-1',[
        'title' => 'About Us',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> About Us',
        'image' => 'assets/core/BreadCrumb.png',
    ])
    
    @include('hijrah.partials.about-us.about-us-2')

    @include('hijrah.partials.mission-statements.mission-vission')

@endsection
