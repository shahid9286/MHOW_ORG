@php
    $donationForm = App\Models\DonationForm::first();
@endphp

<form action="{{ route('front.donate') }}">
    <div class="new-mhow-container">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-5 col-md-6 col-sm-10">
                    <div class="new-mhow-donation-card">
                        <div class="new-mhow-donation-header">
                            <h2 class="new-mhow-donation-title fs-4 fs-md-3 fs-lg-2">DONATE TO CHARITY ONLINE</h2>
                        </div>

                        <div class="new-mhow-amounts">
                            <div class="new-mhow-amount" data-amount="5">£5</div>
                            <div class="new-mhow-amount" data-amount="10">£10</div>
                            <div class="new-mhow-amount" data-amount="15">£15</div>
                        </div>

                        <div class="new-mhow-custom-amount">
                            <div class="new-mhow-custom-label">
                                <i class="fas fa-pencil-alt"></i> Or enter other amount
                            </div>
                            <div class="new-mhow-input-group">
                                <div class="new-mhow-currency">£</div>
                                <input type="number" class="new-mhow-custom-input" placeholder="Enter amount"
                                    id="new-mhow-custom-amount" name="donate_amount" required>
                            </div>
                        </div>

                        <div class="new-mhow-description">
                            Your donation could provide antibiotics to treat 5 children with pneumonia each month
                        </div>

                        <button class="new-mhow-donate-btn">DONATE NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>