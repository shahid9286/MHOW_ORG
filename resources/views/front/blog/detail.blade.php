@extends('front.layouts.master')
@section('title', 'Home Page')

@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1', [
        'title' => $blog->title,
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Blogs <i class="bi bi-chevron-right"></i> '. $blog->title,
        'image' => 'front/assets/img/banner/7.jpg',
    ])

    @include('front.blog.partials.body')

    @include('front.blog.partials.other-sections')

@endsection
