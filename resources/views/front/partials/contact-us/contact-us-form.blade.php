<section class="my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form id="contactform" method="POST" class="contact-form style2 ajax-contact">
                    @csrf
                    <div class="title-area text-center">
                        {{-- <span class="sub-title">Get in Touch with MHOW</span> --}}
                        <h4 class="sec-title">Reach out — we’re here to help and always happy to connect</h2>
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
                                placeholder="Phone No" required>
                            <i class="bi bi-telephone fs-4 mt-1"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                            <i class="bi bi-pencil-square fs-4 mt-1"></i>
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea name="enquiry_message" id="enquiry_message" cols="30" rows="3" class="form-control"
                                placeholder="Your Message" required></textarea>
                            <i class="bi bi-chat-dots-fill fs-4 mt-1"></i>
                        </div>
                        <div class="form-btn col-12">
                            <button type="submit" id="submitBtn" class="th-btn">
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
