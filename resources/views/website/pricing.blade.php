@extends('website.layouts.master')
@section('title','MHOW')

@section('content')
<div class="container py-5 text-center">
    <h1 class="mb-4">Choose Your Subscription Plan</h1>

    <form action="{{ route('checkout.session') }}" method="POST" class="mb-3">
        @csrf
        <input type="hidden" name="price_id" value="price_1SW95JAyKq13bgdVj9X8Nw0c">
        <button class="btn btn-primary w-25">Subscribe Basic</button>
    </form>

    <form action="{{ route('checkout.session') }}" method="POST" class="mb-3">
        @csrf
        <input type="hidden" name="price_id" value="price_1SW9HgAyKq13bgdV0Ys1OdHl">
        <button class="btn btn-success w-25">Subscribe Standard</button>
    </form>


</div>
@endsection