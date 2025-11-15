@extends('front.layouts.master')
@section('title', 'Gallery')
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1',[
        'title' => 'Gallery',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Gallery',
        'image' => 'assets/core/BreadCrumb.png',
    ])
    
    @include('front.partials.gallery.gallery-1')

@endsection
