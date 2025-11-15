<script src="https://js.stripe.com/v3/"></script>

<script>
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000"
    };

    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();

    const style = {
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

    const card = elements.create('card', {
        style: style
    });
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        const displayError = document.getElementById('card-errors');
        displayError.textContent = event.error ? event.error.message : '';
    });

    const form = document.getElementById('donationForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const submitBtn = document.getElementById('submitBtn');
        const buttonText = document.getElementById('button-text');
        const spinner = document.getElementById('spinner');

        submitBtn.disabled = true;
        buttonText.classList.add('d-none');
        spinner.classList.remove('d-none');

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                document.getElementById('card-errors').textContent = result.error.message;
                toastr.error(result.error.message, 'Payment Error');
                submitBtn.disabled = false;
                buttonText.classList.remove('d-none');
                spinner.classList.add('d-none');
            } else {
                const formData = new FormData(form);
                formData.append('stripeToken', result.token.id);

                $.ajax({
                    url: '{{ route('front.donate.store') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success(response.message || 'Donation successful!',
                            'Thank You');
                        form.reset();
                        card.clear();
                        submitBtn.disabled = false;
                        buttonText.classList.remove('d-none');
                        spinner.classList.add('d-none');
                    },
                    error: function(xhr) {
                        let errorMessage = 'There was an error processing your payment.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        toastr.error(errorMessage, 'Payment Error');
                        submitBtn.disabled = false;
                        buttonText.classList.remove('d-none');
                        spinner.classList.add('d-none');
                    }
                });
            }
        });
    });
</script>