@php use Carbon\Carbon; @endphp
@extends('front.layouts.master')

@section('content')
    <div class="text-center bg-black py-2">
        <a class="btn btn-link text-white fw-bold fs-5 text-decoration-none" href="#newContent">
            @if ($event->page_top_text)
                {{ $event->page_top_text }}
            @else
                Book Now
            @endif
        </a>
    </div>

    <div class="d-flex justify-content-center flex-wrap align-items-center w-100">
        <img class="img-fluid w-100" src="{{ asset($event->banner_image) }}">
    </div>

    @if (session()->has('payment-success'))
        <style>
            #newContent,
            .join-us-section .c-section__content {
                max-width: 100% !important;
            }
        </style>
    @endif

    <div class="join-us-section bg-black py-4">
        <div class="mx-auto text-center" style="max-width: 900px;">
            @php $leastAmount = $tickets->first()->amount; @endphp

            @if (!session()->has('payment-success'))
                <h1 class="text-white fw-bold fs-1">Book Now
                    <span class="text-warning"> £{{ $leastAmount }}</span>
                </h1>
                <div class="text-white">
                    {!! nl2br(e($event->page_form_detail)) !!}
                </div>
            @endif

            <div id="newContent" class="px-3 py-4 my-3">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="payment-form" action="{{ route('event.paid.book') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $event->id }}" name="event_id">
                                    <input type="hidden" name="donation_amount" id="donation-amount" value="0">

                                    <div class="step_two">
                                        @if (!session()->has('payment-success'))
                                            <h4 class="">Booking Form</h4>
                                        @endif

                                        <div
                                            class="alert alert-success text-start {{ session()->has('payment-success') ? '' : 'd-none' }}">
                                            <div>
                                                Thank you for your booking, we appreciate your reservation, and we hope your
                                                contribution towards this <strong>{{ $event->link_heading }}
                                                    Project</strong> is a
                                                means
                                                for your salvation.
                                            </div>
                                            <div class="mt-2">
                                                <div>Kind Regards</div>
                                                <div>House of Wisdom Team</div>
                                            </div>
                                        </div>

                                        @if (session()->has('payment-success') && !empty($paymentData))
                                            <div>
                                                <script src="https://givematch.com/widget.js"></script>
                                                <gm-share charity="muhammadiyah-house-of-wisdom-uk" currency="gbp"
                                                    amount="{{ $paymentData['amount'] }}"
                                                    firstName="{{ $paymentData['firstName'] }}"
                                                    email="{{ $paymentData['email'] }}" mode="production"></gm-share>
                                            </div>
                                        @endif

                                        <div class="p-detail {{ session()->has('payment-success') ? 'd-none' : '' }}">
                                            <div class="mb-3">
                                                <input required minlength="2" type="text" placeholder="Name"
                                                    class="form-control" value="{{ old('name') }}" name="name"
                                                    id="cardholder-name">
                                            </div>
                                            <div class="mb-3">
                                                <input required minlength="2" type="email" placeholder="Email"
                                                    class="form-control" name="email" id="cardholder-email">
                                            </div>
                                            <div class="mb-3">
                                                <input required minlength="2" type="date" placeholder="Phone Number"
                                                    class="form-control" value="{{ old('date_of_birth') }}"
                                                    name="date_of_birth" title="Enter Date of Birth">
                                            </div>
                                            <div class="mb-3">
                                                <input required minlength="2" type="text" placeholder="Phone Number"
                                                    class="form-control" value="{{ old('phone_no') }}" name="phone_no">
                                            </div>
                                            <div class="mb-3">
                                                <select name="gender" class="form-select" required>
                                                    <option disabled selected>Select Gender</option>
                                                    <option {{ old('gender') === 'male' ? 'selected' : '' }}
                                                        value="male">Male
                                                    </option>
                                                    <option {{ old('gender') === 'female' ? 'selected' : '' }}
                                                        value="female">
                                                        Female
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <select name="source" class="form-select" required>
                                                    <option disabled selected>Where did you hear about us?</option>
                                                    @foreach (['facebook', 'instagram', 'tiktok', 'youtube', 'whatsapp', 'email'] as $src)
                                                        <option value="{{ $src }}"
                                                            {{ old('source') === $src ? 'selected' : '' }}>
                                                            {{ ucfirst($src) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('source')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @if (!$event->eventSchedules->where('status', 'active')->isEmpty())
                                                <div class="mb-3">
                                                    <select name="event_schedule_id" class="form-select" required>
                                                        <option selected disabled>Select Event</option>
                                                        @foreach ($event->eventSchedules->where('status', 'active') as $schedule)
                                                            <option {{ $loop->first ? 'selected' : '' }}
                                                                value="{{ $schedule->id }}">
                                                                {{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }}
                                                                |
                                                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                                                                |
                                                                {{ $schedule->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                            <div class="mb-3">
                                                <select name="ticket_id" id="ticket-select" class="form-select" required>
                                                    <option disabled selected>Select Amount</option>
                                                    @foreach ($tickets as $ticket)
                                                        <option value="{{ $ticket->id }}"
                                                            data-amount="{{ $ticket->amount }}">
                                                            {{ ucwords($ticket->title) }} - £{{ $ticket->amount }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="total-amount" readonly
                                                    placeholder="Total Amount (Ticket + Donation)">
                                            </div>

                                            @if (!empty($fields) && $fields instanceof \Illuminate\Support\Collection && $fields->count())
                                                @foreach ($fields as $field)
                                                    <div class="mb-3 {{ $field->is_required ? 'required' : '' }}">
                                                        @if ($field->field_type === 'text')
                                                            <input type="text" id="extra_{{ $field->field_name }}"
                                                                name="extra[{{ $field->field_name }}]"
                                                                placeholder="{{ $field->placeholder }}"
                                                                class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                value="{{ old('extra.' . $field->field_name) }}"
                                                                {{ $field->is_required ? 'required' : '' }}>
                                                        @elseif ($field->field_type === 'number')
                                                            <input type="number" id="extra_{{ $field->field_name }}"
                                                                name="extra[{{ $field->field_name }}]"
                                                                placeholder="{{ $field->placeholder }}"
                                                                class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                value="{{ old('extra.' . $field->field_name) }}"
                                                                {{ $field->is_required ? 'required' : '' }}>
                                                        @elseif ($field->field_type === 'textarea')
                                                            <textarea id="extra_{{ $field->field_name }}" name="extra[{{ $field->field_name }}]"
                                                                placeholder="{{ $field->placeholder }}"
                                                                class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                {{ $field->is_required ? 'required' : '' }}>{{ old('extra.' . $field->field_name) }}</textarea>
                                                        @elseif ($field->field_type === 'select')
                                                            <select id="extra_{{ $field->field_name }}"
                                                                name="extra[{{ $field->field_name }}]"
                                                                class="form-select @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                {{ $field->is_required ? 'required' : '' }}>
                                                                <option disabled selected>Select {{ $field->field_label }}
                                                                </option>
                                                                @foreach (explode(',', $field->field_options) as $option)
                                                                    <option value="{{ trim($option) }}"
                                                                        {{ old('extra.' . $field->field_name) == trim($option) ? 'selected' : '' }}>
                                                                        {{ trim($option) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @endif

                                                        @error('extra.' . $field->field_name)
                                                            <div class="text-danger small">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @endforeach
                                            @endif

                                            @if ($event->show_countries == 'yes')
                                                @php $countries = DB::table('event_countries')->get(); @endphp
                                                <div class="mb-3">
                                                    <select name="country" class="form-select" required>
                                                        <option selected disabled>Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option
                                                                {{ old('country') == $country->name ? 'selected' : '' }}
                                                                value="{{ $country->name }}">
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                            <div class="mb-3">
                                                <select name="payment_gateway" id="payment-gateway" class="form-select"
                                                    required>
                                                    <option disabled selected>Select Payment Method</option>
                                                    <option value="stripe">Credit/Debit Card (Stripe)</option>
                                                    <option value="paypal">PayPal</option>
                                                </select>
                                            </div>

                                            <div class="mb-3" id="card-container">
                                                <div id="card-element" class="form-control"
                                                    style="height: auto; padding: 20px;"></div>
                                                <div id="card-errors" class="text-danger mt-1" role="alert"></div>
                                            </div>
                                        </div>

                                        <div class="text-right {{ session()->has('payment-success') ? 'd-none' : '' }}">
                                            <button class="btn btn-success btn-lg" id="submit-button" type="submit">
                                                Book Now <i class="fas fa-angle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-black text-white pt-3 pb-5 text-center">
        <small><strong>{{ $event->footer_text_1 }}</strong></small><br>
        <small>{{ $event->footer_text_2 }}</small>
    </footer>

    <div id="loading-overlay"
        class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex justify-content-center align-items-center d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
@endsection

@section('js')
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Create a Stripe client
        var stripe = Stripe('{{ config('services.stripe.key') }}');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {
            style: style
        });

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle ticket selection with donation popup
        var ticketSelect = document.getElementById('ticket-select');
        var donationInput = document.getElementById('donation-amount');
        var totalAmountInput = document.getElementById('total-amount');

        ticketSelect.addEventListener('change', function() {
            var selectedOption = ticketSelect.options[ticketSelect.selectedIndex];
            var ticketAmount = parseFloat(selectedOption.getAttribute('data-amount')) || 0;

            Swal.fire({
                title: "Would you like to add a donation?",
                text: "Please select a donation amount",
                icon: "question",
                showCancelButton: true,
                cancelButtonText: "No donation",
                showConfirmButton: false,
                html: `
                    <button class="btn btn-outline-danger m-2 donation-btn" data-amount="5">£5</button>
                    <button class="btn btn-outline-danger m-2 donation-btn" data-amount="10">£10</button>
                    <button class="btn btn-outline-danger m-2 donation-btn" data-amount="15">£15</button>
                `,
                didOpen: () => {
                    document.querySelectorAll('.donation-btn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            var donation = parseFloat(this.getAttribute('data-amount'));
                            donationInput.value = donation;
                            var total = ticketAmount + donation;
                            totalAmountInput.value =
                                `£${total.toFixed(2)} (Ticket: £${ticketAmount.toFixed(2)} + Donation: £${donation.toFixed(2)})`;
                            Swal.close();
                        });
                    });
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.cancel) {
                    donationInput.value = 0;
                    totalAmountInput.value =
                        `£${ticketAmount.toFixed(2)} (Ticket: £${ticketAmount.toFixed(2)} + Donation: £0.00)`;
                }
            });
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        var submitButton = document.getElementById('submit-button');

        // Handle payment gateway selection
        var paymentGatewaySelect = document.getElementById('payment-gateway');
        var cardContainer = document.getElementById('card-container');
        cardContainer.style.display = 'none'; // Initially hide card container

        paymentGatewaySelect.addEventListener('change', function() {
            if (this.value === 'stripe') {
                cardContainer.style.display = 'block';
            } else {
                cardContainer.style.display = 'none';
            }
        });

        form.addEventListener('submit', function(event) {
            var paymentGateway = paymentGatewaySelect.value;

            if (paymentGateway === 'paypal') {
                // For PayPal, submit form normally (backend will handle redirect)
                document.getElementById('loading-overlay').style.display = 'flex';
                submitButton.disabled = true;
                return; // Allow default submit
            }

            // For Stripe, prevent default and handle as before
            event.preventDefault();

            document.getElementById('loading-overlay').style.display = 'flex';
            submitButton.disabled = true;

            // Get the cardholder name
            var cardholderName = document.getElementById('cardholder-name').value;

            stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    name: cardholderName,
                },
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer
                    Swal.fire({
                        icon: 'error',
                        title: 'Payment Error',
                        text: result.error.message,
                        confirmButtonColor: '#3085d6',
                    });
                    document.getElementById('loading-overlay').style.display = 'none';
                    submitButton.disabled = false;
                    return;
                }

                // Add the payment method ID to the form
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method_id');
                hiddenInput.setAttribute('value', result.paymentMethod.id);
                form.appendChild(hiddenInput);

                // Submit the form
                fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        if (data.error) {
                            throw new Error(data.message);
                        }

                        if (data.requires_action) {
                            // Handle 3D Secure authentication
                            return stripe.confirmCardPayment(data.payment_intent_client_secret);
                        }

                        if (data.success) {
                            $("#payment-form")[0].reset();
                            card.clear();
                            totalAmountInput.value = '';
                            donationInput.value = '0';

                            Swal.fire({
                                icon: 'success',
                                title: 'Booking Done',
                                text: 'Successfully Booked. Check Your Email for Confirmation',
                                confirmButtonColor: '#3085d6',
                            }).then(() => {
                                window.location.href = data.redirect_url;
                            });
                        }

                    })
                    .then(function(result) {
                        if (result && result.error) {
                            throw new Error(result.error.message);
                        }

                        if (result && result.paymentIntent.status === 'succeeded') {
                            // Handle successful payment
                        }
                    })
                    .catch(function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Booking Failed',
                            text: error.message ||
                                'Failed to complete your booking. Please try again.',
                            confirmButtonColor: '#3085d6',
                        });
                    })
                    .finally(function() {
                        document.getElementById('loading-overlay').style.display = 'none';
                        submitButton.disabled = false;
                    });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Booking Error',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#3085d6',
                });
            @endif

            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Error',
                    text: decodeURIComponent(urlParams.get('error')),
                    confirmButtonColor: '#3085d6',
                });
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        });
    </script>
@endsection
