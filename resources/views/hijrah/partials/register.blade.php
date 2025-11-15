<div class="registration-container mb-5" id="register">
    <div class="form-header">
        <h2 class="text-white fs-3 m-0">Event Registration</h2>
    </div>

    <div class="form-body">
        <form id="dynamic-landing-submit" method="POST" action="{{ route('event.free.book') }}" class="text-start">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            @if (session()->has('success'))
                <div class="alert alert-success text-center fw-bold">
                    <p>
                        Thank You for registering to our {{ $event->title }} {{ now()->year }}.
                        We will be in touch as soon as possible.
                    </p>
                </div>
            @else
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required
                            minlength="2" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required
                            minlength="2" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Phone Number</label>
                        <input type="text" name="phone_no" class="form-control" placeholder="Phone Number" required
                            minlength="2" value="{{ old('phone_no') }}">
                        @error('phone_no')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option disabled selected>Select Gender</option>
                            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female
                            </option>
                        </select>
                        @error('gender')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label required-field">Referral Source</label>
                        <select name="source" class="form-select" required>
                            <option disabled selected>Where did you hear about us?</option>
                            @foreach (['facebook', 'instagram', 'tiktok', 'youtube', 'whatsapp', 'email'] as $platform)
                                <option value="{{ $platform }}" {{ old('source') === $platform ? 'selected' : '' }}>
                                    {{ ucfirst($platform) }}
                                </option>
                            @endforeach
                        </select>
                        @error('source')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
    
                    @if (!$event->eventTickets->isEmpty())
                        <div class="mb-3 col-md-6">
                            <label class="form-label required-field">Select Ticket</label>
                            <select name="ticket_id" class="form-select" required>
                                <option disabled selected>Select Ticket</option>
                                @foreach ($event->eventTickets as $ticket)
                                    <option value="{{ $ticket->id }}" {{ $loop->first ? 'selected' : '' }}>
                                        {{ ucwords($ticket->title) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ticket_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
    
                    @if (!$event->eventSchedules->where('status', 'active')->isEmpty())
                        <div class="mb-3 col-md-6">
                            <label class="form-label required-field">Select Event</label>
                            <select name="event_schedule_id" class="form-select" required>
                                <option disabled selected>Select Event</option>
                                @foreach ($event->eventSchedules->where('status', 'active') as $schedule)
                                    <option value="{{ $schedule->id }}" {{ $loop->first ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }} |
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} |
                                        {{ $schedule->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('event_schedule_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
    
                    @if (!empty($fields) && $fields->count())
                        @foreach ($fields as $field)
                            <div class="mb-3 col-md-6 {{ $field->is_required ? 'required' : '' }}">
                                <label class="form-label">{{ $field->field_label }}</label>
                                @if ($field->field_type === 'text')
                                    <input type="text" id="extra_{{ $field->field_name }}"
                                        name="extra[{{ $field->field_name }}]" placeholder="{{ $field->placeholder }}"
                                        class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                        value="{{ old('extra.' . $field->field_name) }}"
                                        {{ $field->is_required ? 'required' : '' }}>
                                @elseif ($field->field_type === 'number')
                                    <input type="number" id="extra_{{ $field->field_name }}"
                                        name="extra[{{ $field->field_name }}]" placeholder="{{ $field->placeholder }}"
                                        class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                        value="{{ old('extra.' . $field->field_name) }}"
                                        {{ $field->is_required ? 'required' : '' }}>
                                @elseif ($field->field_type === 'textarea')
                                    <textarea id="extra_{{ $field->field_name }}" name="extra[{{ $field->field_name }}]"
                                        placeholder="{{ $field->placeholder }}"
                                        class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                        {{ $field->is_required ? 'required' : '' }}>{{ old('extra.' . $field->field_name) }}</textarea>
                                @elseif ($field->field_type === 'select')
                                    <select id="extra_{{ $field->field_name }}" name="extra[{{ $field->field_name }}]"
                                        class="form-select @error('extra.' . $field->field_name) is-invalid @enderror"
                                        {{ $field->is_required ? 'required' : '' }}>
                                        <option disabled selected>Select {{ $field->field_label }}</option>
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
    
                    @if ($event->show_countries == 'yes')
                        @php $countries = Illuminate\Support\Facades\DB::table('event_countries')->get(); @endphp
                        <div class="mb-3 col-md-6">
                            <label class="form-label required-field">Country</label>
                            <select name="country" class="form-select" required>
                                <option disabled selected>Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->name }}"
                                        {{ old('country') == $country->name ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                </div>


                <!-- Submit Button -->
                <button type="submit" class="submit-btn" id="submit-button">
                    <i class="fas fa-paper-plane me-2"></i> Register
                </button>
            @endif
        </form>
    </div>
</div>
