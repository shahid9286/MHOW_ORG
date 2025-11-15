@extends('front.layouts.master')
@section('title', 'All Blogs')
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1', [
        'title' => 'Blogs',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Blogs',
        'image' => 'assets/core/BreadCrumb.png',
    ])

    @include('front.partials.blogs.blog-1')

@endsection
