<style>
   
    .mhow-amount-btn {
        padding: 8px 16px;
        border: 1px solid #ccc;
        background-color: #f8f8f8;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .mhow-amount-btn.active,
    .mhow-amount-btn:hover {
        background-color: #005EB4;
        color: white;
        border-color: #005EB4;
    }

    .mhow-donation-image {
        max-width: 100%;
        border-radius: 8px;
    }
</style>



<section class="position-relative bg-top-center overflow-hidden space bg-smoke" id="service-sec"
    data-bg-src="assets/img/bg/tour_bg_1.jpg">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="title-area text-center">
                    <h4 class="sec-title">Building a Better World Together</h2>
                </div>
            </div>
        </div>

        @php
            $donationForm = App\Models\DonationForm::first();
        @endphp

        <div class="row align-items-center">
            <!-- Left: Form Content -->
            <div class="col-lg-6">
                <h4 class="box-title mb-2">{{ $donationForm->title }}</h4>
                <p class="post-title mb-4">{{ $donationForm->sub_title }}</p>

                <form action="{{ route('front.donate') }}" class="mhow-donation-form">
                    <div class="mb-3">
                        <label for="donate_amount" class="form-label">Enter Amount</label>
                        <div class="input-group">
                            <span class="input-group-text text-white" style="background: #005EB4;">£</span>
                            <input type="text" name="donate_amount" id="donate_amount" class="form-control"
                                placeholder="Amount" value="{{ $donationForm->amounts->first()->amount }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Choose an Amount</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($donationForm->amounts as $amount)
                                <button type="button"
                                    class="btn mhow-amount-btn {{ $loop->iteration == 1 ? 'active' : '' }}">£{{ $amount->amount }}</button>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="th-btn th-icon mt-3">Donate Now</button>
                </form>
            </div>

            <!-- Right: Image -->
            <div class="col-lg-6 text-center mt-4 mt-lg-0">
                <img src="{{ asset($donationForm->image) }}" alt="Donation" class="img-fluid mhow-donation-image">
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const amountButtons = document.querySelectorAll(".mhow-amount-btn");
        const amountInput = document.getElementById("donate_amount");

        amountButtons.forEach(button => {
            button.addEventListener("click", function() {
                // Remove 'active' class from all buttons
                amountButtons.forEach(btn => btn.classList.remove("active"));

                // Add 'active' to the clicked one
                this.classList.add("active");

                // Update the amount input
                const amount = this.textContent.replace("£", "").trim();
                amountInput.value = amount;
            });
        });
    });
</script>
