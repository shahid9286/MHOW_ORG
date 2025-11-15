@extends('front.layouts.master')
@section('title', $project->name)
@section('css')

    {{-- <link rel="stylesheet" href="{{ asset('website/assets/vendors/careox-icons/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('website/assets/css/careox.css') }}" /> --}}
    <style>
      

    </style>

@endsection
@section('content')
    <div class="careox-scope">

        @include('front.partials.project-detail.project-hero')

        @include('front.partials.project-detail.project-section')

        @include('front.partials.project-detail.project-why-images')

        @include('front.partials.project-detail.project-element')

        @if (!empty($page->whyChooseUs))
            @include('front.partials.project-detail.project-why-choose-us')
        @endif

        @include('front.partials.project-detail.project-block')

        @include('front.partials.project-detail.project-feature-images')

        @include('front.partials.project-detail.project-donate-now')

        @include('front.partials.project-detail.project-footer-map')

    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.donate-two__form__buttons__item').on('click', function () {
            $('.donate-two__form__buttons__item').removeClass('active');

            $(this).addClass('active');

            let selectedAmount = $(this).find('.donate-two__form__buttons__amount').text();

            $('#donate_amount').val(selectedAmount);
        });
    });
</script>


@endsection
