@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Call To Action')
@section('content')

    @include('admin.course.top-nav')

    <section class="content">
        @include('admin.course.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('CallToAction Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.course.cta.update', ['id' => $cta->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="ctaTitle">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input required type="text" class="form-control form-control-sm" id="ctaTitle" placeholder="Enter Title"
                                            name="title" value="{{ $cta->title }}">
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ctaSubtitle">{{ __('Subtitle') }}</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="ctaSubtitle" placeholder="Enter Subtitle"
                                            name="subtitle" value="{{ $cta->subtitle }}">
                                    </div>
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Description Field -->
                                <div class="col-md-12 mt-md-2">
                                    <label for="description" class="col-form-label col-form-label-sm">
                                        {{ __('Description') }}
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description"
                                            value="{{ $cta->description }}">
                                    </div>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label for="button_text_1">{{ __('Button Text') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input required type="text" class="form-control form-control-sm" placeholder="Enter Button Name"
                                            id="button_text_1" name="button_text_1" value="{{ $cta->button_text_1 }}">
                                    </div>
                                    @error('button_text_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="ctaButtonLink_1">{{ __('Button Link') }} <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                        </div>
                                        <input required type="url" class="form-control form-control-sm" placeholder="Enter Button URL"
                                            id="ctaButtonLink_1" name="button_link_1" value="{{ $cta->button_link_1 }}">
                                    </div>
                                    @error('button_link_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="button_text_2">{{ __('Button Text 2') }}</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="button_text_2" placeholder="Enter Button Name"
                                            name="button_text_2" value="{{ $cta->button_text_2 }}">
                                    </div>
                                    @error('button_text_2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="ctaButtonLink_2">{{ __('Button Link 2') }}</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                        </div>
                                        <input type="url" class="form-control form-control-sm" id="ctaButtonLink_2" placeholder="Enter Button URL"
                                            name="button_link_2" value="{{ $cta->button_link_2 }}">
                                    </div>
                                    @error('button_link_2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">

                                <div class="col-md-6">
                                    <label for="image">
                                        {{ __('Image') }}
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="file" class="form-control form-control-sm up-img" name="image"
                                            id="image">
                                    </div>
                                    <img class="mw-400 mt-2 show-img img-demo" src="{{ asset($cta->image) }}"
                                        alt="" width="50px">

                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="ctaStatus">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select required class="form-control form-control-sm" id="ctaStatus"
                                            name="status">
                                            <option value="active" {{ $cta->status == 'active' ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="inactive" {{ $cta->status == 'inactive' ? 'selected' : '' }}>
                                                {{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
