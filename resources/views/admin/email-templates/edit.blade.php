@extends('admin.layouts.master')
@section('title', 'Edit Email Template')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                {{-- Email Template Form --}}
                <div class="col-lg-8 mt-3">
                    <div class="card border-left-primary shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title mb-0"><b>Edit Email Template</b></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.email-templates.update', $email_template->id) }}" method="POST">
                                @csrf

                                {{-- Title (readonly) --}}
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ old('title', $email_template->title) }}" readonly>
                                </div>

                                {{-- Subject --}}
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Email Subject <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="subject" name="subject" class="form-control"
                                        value="{{ old('subject', $email_template->subject) }}" required>
                                </div>

                                {{-- Body --}}
                                <div class="mb-3">
                                    <label for="body" class="form-label">Email Body <span
                                            class="text-danger">*</span></label>
                                    <textarea id="body" name="body" rows="6" class="form-control summernote"
                                        placeholder="Use placeholders like @{{ name }}, @{{ amount }}, etc.">{{ old('body', $email_template->body) }}</textarea>
                                </div>

                                {{-- Status --}}
                                <div class="mb-4">
                                    <label for="is_active" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="0"
                                            {{ old('is_active', $email_template->is_active) == 0 ? 'selected' : '' }}>Draft
                                        </option>
                                        <option value="1"
                                            {{ old('is_active', $email_template->is_active) == 1 ? 'selected' : '' }}>Active
                                        </option>
                                    </select>
                                </div>

                                {{-- Submit --}}
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success px-4">
                                        <i class="fas fa-save me-1"></i> Update Template
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Notes and Placeholders --}}
                <div class="col-lg-4">
                    <div class="card card-success card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Donor Email') }}</b></h3>
                        </div>
                        @verbatim
                            <div class="card-body">
                                <p>You can use the following placeholders in the body of your email template:</p>
                                <ul>
                                    <li><code>{{donor_name}}</code> – Donor's Name</li>
                                    <li><code>{{donor_email}}</code> – Donor's Email</li>
                                    <li><code>{{donor_phon}}</code> – Donor's Phone No</li>
                                    <li><code>{{donor_city}}</code> – Donor's City</li>
                                    <li><code>{{donor_whatsapp}}</code> – Donor's Whatsapp</li>
                                </ul>
                                <p>These will be automatically replaced with actual donor information when the email is
                                    sent.</p>
                            </div>
                        @endverbatim

                    </div>
                 
                        <div class="card card-success card-outline mt-3">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><b>{{ __('Booking Follow Up Email') }}</b></h3>
                            </div>
                            @verbatim
                                <div class="card-body">
                                    <p>You can use the following placeholders in the body of your email template:</p>
                                    <ul>
                                        <li><code>{{event_name}}</code> – Event's Name</li>
                                        <li><code>{{booking_person_name}}</code> – Booking Person Name</li>
                                        <li><code>{{booking_person_email}}</code> – Booking Person Emial</li>
                                     
                                    </ul>
                                    <p>These will be automatically replaced with actual donor information when the email is
                                        sent.</p>
                                </div>
                            @endverbatim

                        </div>
                   
                </div>
            </div>
        </div>

        </div>
        </div>
    </section>
@endsection
