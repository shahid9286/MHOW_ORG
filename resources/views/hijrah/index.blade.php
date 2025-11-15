@extends('hijrah.layouts.master')
@section('title', 'Home')
@section('css')
    @include('hijrah.partials.styles')
@endsection
@section('content')

    @include('hijrah.partials.slider.slider-1')

    @include('hijrah.partials.timer')

    {{-- @include('hijrah.partials.about-us') --}}

    @include('hijrah.partials.event-detail')
    @include('hijrah.partials.ummrah')
    @include('hijrah.partials.objectives')
    @include('hijrah.partials.schedule')

    @include('hijrah.partials.cta')


    @include('hijrah.partials.donate')
    @include('hijrah.partials.gallery')


    @include('hijrah.partials.register')

    @include('hijrah.partials.contact-info')

    {{-- @include('hijrah.partials.newsletter') --}}

@endsection
