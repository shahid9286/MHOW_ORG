@extends('front.layouts.master')
@section('title', $page->title)
@section('css')
    <style>
        .mhow-images {
            max-width: 500px;
        }

        .mhow-img1 {
            width: 100%;
        }

        .mhow-img2 {
            width: 60%;
            bottom: -20px;
            right: -20px;
        }

        @media (max-width: 767.98px) {
            .mhow-img2 {
                position: relative !important;
                bottom: 0;
                right: 0;
                margin-top: 15px;
            }
        }
    </style>
@endsection
@section('content')

    @include('front.partials.event-detail.hero')

    @if ($page->sections)
        @include('front.partials.event-detail.sections')
    @endif 

    @if ($page->elements)
        @include('front.partials.event-detail.elements')
    @endif

    @if ($page->blocks)
        @include('front.partials.event-detail.blocks')
    @endif

    @if ($page->faqs)
        @include('front.partials.event-detail.faqs')
    @endif

    @if ($page->whyUsImages)
        @include('front.partials.event-detail.why-us-images')
    @endif

    @if ($page->introductionSections)
        @include('front.partials.event-detail.intro-sections')
    @endif

@endsection
