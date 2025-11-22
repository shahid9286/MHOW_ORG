<style>
    .pricing-section {
        background: #fff;
        padding: 60px 0;
        color: #fff;
    }

    .pricing-card {
        background: #111;
        border-radius: 10px;
        padding: 30px;
        color: #fff;
        text-align: center;
        height: 100%;
    }

    .pricing-card h2 {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .pricing-quote {
        font-size: 14px;
        color: #ccc;
        min-height: 90px;
    }

    .price {
        font-size: 40px;
        font-weight: bold;
        margin: 25px 0;
    }

    .subscribe-btn {
        background: #23b24b;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 30px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }

    .subscribe-btn:hover {
        background: #1e9f41;
    }
</style>

<div class="">
    <div class="container">
        <h3 class="text-center mb-5 mt-4">World Peace Movement World Tour</h3>

        <div class="row">

            {{-- £10 Plan --}}
            <div class="col-md-4 mb-4">
                <div class="pricing-card">
                    <h2 class="text-white">World Peace Movement World Tour</h2>
                    <p class="pricing-quote">
                        “The Prophet ﷺ said: ‘When a man dies, his deeds come to an end except for three things:
                        Sadaqah Jariyah (ceaseless charity)...”
                    </p>
                    <div class="price">£10 <span style="font-size:16px;">per month</span></div>

                    <form method="POST" action="{{ route('checkout.session') }}">
                        @csrf
                        <input type="hidden" name="price_id" value="price_1SWBNYLPKb8DimQYr8mFyuF7">
                        <button class="subscribe-btn">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="pricing-card">
                    <h2 class="text-white">World Peace Movement World Tour</h2>
                    <p class="pricing-quote">
                        “The Prophet ﷺ said: ‘When a man dies, his deeds come to an end except for three things:
                        Sadaqah Jariyah (ceaseless charity)...”
                    </p>
                    <div class="price">£25 <span style="font-size:16px;">per month</span></div>

                    <form method="POST" action="{{ route('checkout.session') }}">
                        @csrf
                        <input type="hidden" name="price_id" value="price_1SWBO6LPKb8DimQYcmSro1Zr">
                        <button class="subscribe-btn">Subscribe</button>
                    </form>
                </div>
            </div>

            {{-- £50 Plan --}}
            <div class="col-md-4 mb-4">
                <div class="pricing-card">
                    <h2 class="text-white">World Peace Movement World Tour</h2>
                    <p class="pricing-quote">
                        “The Prophet ﷺ said: ‘When a man dies, his deeds come to an end except for three things:
                        Sadaqah Jariyah (ceaseless charity)...”
                    </p>
                    <div class="price">£50 <span style="font-size:16px;">per month</span></div>

                    <form method="POST" action="{{ route('checkout.session') }}">
                        @csrf
                        <input type="hidden" name="price_id" value="price_1SWBOFLPKb8DimQYzSaSX1lR">
                        <button class="subscribe-btn">Subscribe</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
