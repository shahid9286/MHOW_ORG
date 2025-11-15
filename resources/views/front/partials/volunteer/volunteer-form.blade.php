<section class="my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form id="volunteerForm" method="POST" class="contact-form style2 ajax-contact">
                    @csrf
                    <div class="title-area text-center">
                        <span class="sub-title  fs-6 fw-semibold d-none d-md-block">Serve. Support. Make Impact</span>
                        <h4 class="sec-title">Empower Lives Through Service</h2>
                        <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>

                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
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
                                placeholder="Phone No" required>
                            <i class="bi bi-telephone fs-4 mt-1"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <select name="country_id" id="country_id" class="form-select nice-select"
                                style="display: none;">
                                <option value="" selected="" disabled="">Select Country
                                </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select name="volunteer_type_id" id="volunteer_type_id" class="form-select nice-select"
                                style="display: none;">
                                <option value="" selected="" disabled="">Select Volunteer Type
                                </option>
                                @foreach ($volunteer_types as $volunteer_type)
                                    <option value="{{ $volunteer_type->id }}">{{ $volunteer_type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-btn col-12">
                            <button type="submit" id="submitBtn" class="th-btn " style="background-color:#A91F21;">
                                <span id="button-text">Submit</span>
                                <span id="spinner" class="d-none"><i class="fas fa-spinner fa-spin"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
