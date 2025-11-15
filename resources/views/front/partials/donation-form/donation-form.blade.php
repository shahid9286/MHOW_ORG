<section class="my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form id="donationForm" method="POST" class="contact-form style2 ajax-contact">
                    @csrf
                    <div class="title-area text-center">
                        <span class="sub-title  fs-6 fw-semibold d-none d-md-block">Building a Better World Together</span>
                        <h4 class="sec-title">Make a Donation</h2>
                        <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Full Name">
                            <i class="bi bi-alphabet-uppercase fs-4 mt-1"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email">
                            <i class="bi bi-envelope fs-4 mt-1"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="phone_no" id="phone_no"
                                placeholder="Phone No">
                            <i class="bi bi-telephone fs-4 mt-1"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                >
                            <i class="fa-solid fa-cake-candles fs-4 mt-1"></i>

                            <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                            <i class="bi bi-buildings fs-4 mt-1"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="country" id="country"
                                placeholder="Country">
                            <i class="bi bi-globe-americas-fill fs-4 mt-1"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="number" min="1" class="form-control" name="amount" id="amount"
                                placeholder="Amount"
                                value="{{ request()->has('donate_amount') ? request('donate_amount') : '' }}"
                                {{ request()->has('donate_amount') ? 'readonly' : '' }}>
                            <i class="bi bi-currency-pound fs-4 mt-1"></i>
                        </div>
                        {{-- <div class="col-12 form-group">
                            <div id="card-element" class="stripe-card form-control"
                                style="height: auto; padding: 20px;">
                            </div>
                            <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                        </div> --}}
                        <div class="col-12 form-group mb-2">
                            <div class="form-check">
                                <input type="checkbox" name="tax_payer" id="tax_payer" class="form-check-input"
                                    value="1">
                                <label for="tax_payer" class="form-check-label" >
                                    I am a tax payer and would like to receive a tax receipt.
                                </label>
                            </div>
                        </div>
                        <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                        <div class="form-btn col-12">
                            <button type="submit" id="submitBtn" class="th-btn" style="background-color: #A91F21;">
                                <span id="button-text">Pay Now</span>
                                <span id="spinner" class="d-none"><i class="fas fa-spinner fa-spin"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
