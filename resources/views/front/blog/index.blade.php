@extends('front.layouts.master')
@section('title', 'Home Page')

@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1', [
        'title' => 'Blogs',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Blogs',
        'image' => 'front/assets/img/banner/7.jpg',
    ])

        <div class="container">
                <div class="row gutter-lg py-5">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6">
                            <div class="th-blog blog-single has-post-thumbnail">
                                <div class="blog-img mb-0"><a href="{{ route('front.blog.detail', ['slug' => $blog->slug]) }}"><img
                                            src="{{ asset('assets/front/img/blog/' . $blog->image) }}" alt="Blog Image"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta mt-3"><a><i class="fa-solid fa-calendar-days"></i>{{ $blog->created_at->format('d M, Y') }}</a></div>
                                    <h2 class="blog-title"><a href="{{ route('front.blog.detail', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h2>
                                    <a href="{{ route('front.blog.detail', ['slug' => $blog->slug]) }}"
                                        class="th-btn style4 th-icon">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
@endsection
