{{-- @extends('website.layouts.master')
@section('title', 'MHOW')

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
@endsection --}}
<!DOCTYPE html>
<html>

<head>
    <title>Dummy Payment</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            padding: 40px;
            background: #f7f7f7;
        }

        .box {
            background: white;
            padding: 40px;
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
        }

        button {
            background: #0070BA;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #005C99;
        }
    </style>
</head>

<body>

    <div class="box">
        <h2>Pay with PayPal</h2>
        <form action="{{ route('paypal.payment') }}" method="GET">
            <button type="submit">Go to PayPal Checkout</button>
        </form>
    </div>

</body>

</html>
