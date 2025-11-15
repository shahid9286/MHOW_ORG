@extends('admin.layouts.master')
@section('title', 'Add Banner')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Banner') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.banner') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input up-img" name="image" id="image">
                                    </div>
                                    @if ($errors->has('image'))
                                        <p class="text-danger"> {{ $errors->first('image') }} </p>
                                    @endif
                                    <p class="help-block text-info">{{ __('Upload 1400x850 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Title') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
                                    @if ($errors->has('title'))
                                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                                    @endif
                                </div>
                            </div>

                           <div class="form-group row">
    <label class="col-sm-2 control-label">{{ __('Banner Type') }}</label>
    <div class="col-sm-10">
        <select name="banner_type" class="form-control">
            <option value="">Select Banner Type</option>
            <option value="after-slider" {{ old('banner_type') == 'after-slider' ? 'selected' : '' }}>After Slider</option>
            <option value="after-missions" {{ old('banner_type') == 'after-missions' ? 'selected' : '' }}>After Missions</option>
            <option value="after-slider2" {{ old('banner_type') == 'after-slider2' ? 'selected' : '' }}>After Slider 2</option>
            <option value="after-countries" {{ old('banner_type') == 'after-countries' ? 'selected' : '' }}>After Countries</option>
            <option value="after-slider3" {{ old('banner_type') == 'after-slider3' ? 'selected' : '' }}>After Slider 3</option>
            <option value="after-project" {{ old('banner_type') == 'after-project' ? 'selected' : '' }}>After Project</option>
        </select>
        @if ($errors->has('banner_type'))
            <p class="text-danger">{{ $errors->first('banner_type') }}</p>
        @endif
    </div>
</div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Order No') }}<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="order_no" placeholder="{{ __('Order') }}" value="{{ old('order_no') }}">
                                    @if ($errors->has('order_no'))
                                        <p class="text-danger"> {{ $errors->first('order_no') }} </p>
                                    @endif
                                </div>
                            </div>
<div class="form-group row">
    <label class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>
    <div class="col-sm-10">
        <select class="form-control" name="status">
            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>{{ __('Publish') }}</option>
        </select>
        @if ($errors->has('status'))
            <p class="text-danger"> {{ $errors->first('status') }} </p>
        @endif
    </div>
</div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
