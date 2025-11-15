@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Call To Action')
@section('content')

    @include('admin.blog.top-nav')

    <section class="content">
        @include('admin.blog.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Call To Action Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.blog.cta.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->

                            <div class="row">
                                <!-- Title Field -->
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label col-form-label-sm">
                                        {{ __('Title') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        <input required type="text" class="form-control" id="title" name="title">
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subtitle Field -->
                                <div class="col-md-6">
                                    <label for="subtitle" class="col-form-label col-form-label-sm">
                                        {{ __('Sub Title') }}
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"><i class="fas fa-subscript"></i></span>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle">
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
                                        <input type="text" class="form-control" id="description" name="description">
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
                                        <input required type="text" class="form-control form-control-sm"
                                            id="button_text_1" name="button_text_1">
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
                                        <input required type="url" class="form-control form-control-sm"
                                            id="ctaButtonLink_1" name="button_link_1">
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
                                        <input type="text" class="form-control form-control-sm" id="button_text_2"
                                            name="button_text_2">
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
                                        <input type="url" class="form-control form-control-sm" id="ctaButtonLink_2"
                                            name="button_link_2">
                                    </div>
                                    @error('button_link_2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-2">

                                <!-- Image -->
                                <div class="col-md-6">
                                    <label class="col-form-label col-form-label-sm"
                                        for="image">{{ __('Image') }}</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text p-1 px-2"><i class="fas fa-image"></i></span>
                                        <input type="file" class="form-control form-control-sm up-img" name="image"
                                            id="image">
                                    </div>
                                    <img class="mw-400 show-img img-demo mt-2"
                                        src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                        width="50px">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="ctaStatus">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select required class="form-control form-control-sm" id="ctaStatus"
                                            name="status">
                                            <option value="active">{{ __('Active') }}</option>
                                            <option value="inactive">{{ __('Inactive') }}</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12">
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
