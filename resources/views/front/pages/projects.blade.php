@extends('front.layouts.master')
@section('title', 'Projects')
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1',[
        'title' => 'Projects',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Projects',
        'image' => 'assets/core/BreadCrumb.png',
    ])
    
    @include('front.partials.projects.project-3')

@endsection
