<section class="donate-two mt-5">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title fs-6 fw-semibold  d-none d-md-block">Become a Donate Now</span>
            <h3 class="sec-title pb-0">Make Donate</h3>
            <div class=" mx-auto" style="width: 60px; height: 3px; background-color: #A91F21;"></div>
        </div>
        <div class="donate-two__inner">
            @if ($project->donationForm)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="donate-two__content">
                            <h4 class="donate-two__title">{{ $project->donationForm->title }}</h4>
                            <div class="donate-two__text">
                                {{ $project->donationForm->sub_title }}
                            </div>
                            <h5 class="donate-two__donate-title">Your Donation:</h5>
                            <form action="{{ route('front.donate') }}" class="donate-two__form">
                                <div class="donate-two__form__amount">
                                    <span class="donate-two__form__amount__sign">£</span>
                                    <input type="text" value="{{ $project->donationForm->amounts->first()->amount }}"
                                        name="donate_amount" id="donate_amount" placeholder="Amount"
                                        class="donate-two__form__amount__input">
                                </div><!-- /.donate-two__form__amount__box -->
                                <div class="donate-two__form__buttons">
                                    @foreach ($project->donationForm->amounts as $amount)
                                        <button type="button"
                                            class="donate-two__form__buttons__item {{ $loop->iteration == 1 ? 'active' : '' }}">£<span
                                                class="donate-two__form__buttons__amount">{{ $amount->amount }}</span></button>
                                    @endforeach
                                </div><!-- /.donate-two__form__amount__buttons -->
                                <div class="donate-two__form__submit">
                                    <button type="submit" class="careox-btn"><span>Donate Now</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="donate-two__image">
                            <img src="{{ asset($project->donationForm->image) }}" alt="careox">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>