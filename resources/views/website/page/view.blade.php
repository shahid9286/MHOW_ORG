@php use Carbon\Carbon; @endphp
@extends('front.layouts.master')


@section('content')
    <div class="container-fluid bg-black text-white py-3 text-center">
        <a onclick="$([document.documentElement, document.body]).animate({scrollTop: $('#registration-form').offset().top}, 500);"
            class="fw-bold text-white text-decoration-none" style="font-size: 18px; cursor: pointer">
            @if ($event->page_top_text)
                {{ $event->page_top_text }}
            @else
                Register Now
            @endif
        </a>
    </div>

    <div class="container-fluid p-0">
        <div class="d-flex justify-content-center align-items-center flex-wrap w-100">
            <img src="{{ asset($event->banner_image) }}" class="img-fluid w-100" alt="Event Banner">
        </div>
    </div>

    <div class="py-5 bg-black text-white" id="registration-form">
        <div class="mx-auto text-center" style="max-width: 900px;">
            @if (request()->is('hijrah'))
                <div class="mb-5">
                    <a href="{{ route('front.donate.now') }}"
                        style="background-image: linear-gradient(to top, #bc1a1d 0%, #d9191d 51%, #ecd0c0 100%); padding: 20px 45px; color: white; border-radius: 50px;">Donate
                        Now</a>
                </div>
            @endif

            <h1 class="fw-bold fs-1 text-white">
                @if ($event->id == 0)
                    DONATE NOW:
                @else
                    Sign Up for Free:
                @endif
            </h1>

            <div class="mb-4">
                @if ($event->page_form_detail)
                    {!! nl2br(e($event->page_form_detail)) !!}
                @else
                    Ready to embark on this transformative adventure? Secure your spot by filling out the form next
                    to this text. Don’t miss this opportunity to invest in yourself and cultivate lasting change.
                @endif
            </div>

            @if ($event->id == 0)
                <div style="min-height: 50vh">
                    <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
                    <stripe-pricing-table pricing-table-id="prctbl_1QSkh5LPKb8DimQY8QbXgknP"
                        publishable-key="pk_live_51IdcSqLPKb8DimQYujCZWtpkH48EJqj8EGS0T7VHZfSOdE3AurU37UQyPZGcOnv3ztoERxH2awgGtPX1wrJVuwCS006wblUReE">
                    </stripe-pricing-table>
                    <stripe-pricing-table pricing-table-id="prctbl_1QZcGbLPKb8DimQY8tydNEv1"
                        publishable-key="pk_live_51IdcSqLPKb8DimQYujCZWtpkH48EJqj8EGS0T7VHZfSOdE3AurU37UQyPZGcOnv3ztoERxH2awgGtPX1wrJVuwCS006wblUReE">
                    </stripe-pricing-table>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="dynamic-landing-submit" method="POST" action="{{ route('event.free.book') }}"
                                    class="text-start">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                                    <h4 class="mb-3 text-center">Registration Form</h4>

                                    @if (session()->has('success'))
                                        <div class="alert alert-success text-center fw-bold" id="newContent">
                                            <p>
                                                Thank You for registering to our {{ $event->title }} {{ now()->year }}.
                                                We will be in touch as soon as possible.
                                            </p>

                                            @php
                                                $donationForm = [5, 10, 15]; // fixed donation options
                                            @endphp

                                            <div class="mt-4">
                                                <h5 class="mb-3 text-dark">Would you like to support us with a small
                                                    donation?</h5>
                                                <div class="d-flex justify-content-center gap-3">
                                                    @foreach ($donationForm as $amount)
                                                        <a href="{{ route('front.donate', ['donate_amount' => $amount]) }}"
                                                            class="btn btn-outline-danger rounded-pill px-4 py-2">
                                                            Donate £{{ $amount }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        {{-- Registration form fields --}}
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                required minlength="2" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Address" required minlength="2"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" name="phone_no" class="form-control"
                                                placeholder="Phone Number" required minlength="2"
                                                value="{{ old('phone_no') }}">
                                            @error('phone_no')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="date" name="date_of_birth" class="form-control"
                                                placeholder="Phone Number" required
                                                value="{{ old('date_of_birth') }}">
                                            @error('date_of_birth')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <select name="source" class="form-select" required>
                                                <option disabled selected>Where did you hear about us?</option>
                                                @foreach (['facebook', 'instagram', 'tiktok', 'youtube', 'whatsapp', 'email'] as $platform)
                                                    <option value="{{ $platform }}"
                                                        {{ old('source') === $platform ? 'selected' : '' }}>
                                                        {{ ucfirst($platform) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('source')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <select name="gender" class="form-select" required>
                                                <option disabled selected>Select Gender</option>
                                                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>

                                        @if (!$event->eventTickets->isEmpty())
                                            <div class="mb-3">
                                                <select name="ticket_id" class="form-select" required>
                                                    <option disabled selected>Select Ticket</option>
                                                    @foreach ($event->eventTickets as $ticket)
                                                        <option value="{{ $ticket->id }}"
                                                            {{ $loop->first ? 'selected' : '' }}>
                                                            {{ ucwords($ticket->title) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        @if (!$event->eventSchedules->where('status', 'active')->isEmpty())
                                            <div class="mb-3">
                                                <select name="event_schedule_id" class="form-select" required>
                                                    <option disabled selected>Select Event</option>
                                                    @foreach ($event->eventSchedules->where('status', 'active') as $schedule)
                                                        <option value="{{ $schedule->id }}"
                                                            {{ $loop->first ? 'selected' : '' }}>
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

                                        {{-- Extra fields --}}
                                        @if (!empty($fields) && $fields->count())
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
                                                                    {{ ucfirst(trim($option)) }}
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

                                        {{-- Country --}}
                                        @if ($event->show_countries == 'yes')
                                            @php $countries = Illuminate\Support\Facades\DB::table('event_countries')->get(); @endphp
                                            <div class="mb-3">
                                                <select name="country" class="form-select" required>
                                                    <option disabled selected>Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }}"
                                                            {{ old('country') == $country->name ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success btn-lg px-5">
                                                Submit <i class="fas fa-angle-right"></i>
                                            </button>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>

    @if (request()->is('eastafrica'))
        <div class="container-fluid py-3">
            <div class="row g-2">
                @foreach ([1, 2, 3, 4] as $i)
                    <div class="col-12 col-sm-6 col-md-3">
                        <img src="{{ asset('website/assets/images/events/eastafrica-event-' . $i . ($i == 4 ? '.jpeg' : '.webp')) }}"
                            class="img-fluid w-100" alt="Event Image {{ $i }}">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <footer class="bg-black text-white pt-3 pb-5">
        <div class="container text-center">
            <small><strong>{{ $event->footer_text_1 }}</strong></small><br>
            <small>{{ $event->footer_text_2 }}</small>
        </div>
    </footer>

@endsection

@section('js')
    @if (session()->has('success') || $errors->isNotEmpty())
        <script>
            $([document.documentElement, document.body]).animate({
                scrollTop: $('#newContent').offset().top
            }, 2000);
        </script>
    @endif
@endsection
