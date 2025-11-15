@extends('front.layouts.master')
@section('title', 'All Events')
@section('css')
    <style>
        .mhow-events {
            background-color: transparent !important;
            box-shadow: none !important;
        }
    </style>
@endsection
@section('content')

    @include('front.partials.breadcrumbs.breadcrumb-1', [
        'title' => 'Events',
        'subtitle' => 'Home <i class="bi bi-chevron-right"></i> Events',
        'image' => 'assets/core/BreadCrumb.png',
    ])

    @include('front.partials.events.event-4')

@endsection
