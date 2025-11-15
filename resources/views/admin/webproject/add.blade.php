@extends('admin.layouts.master')
@section('title', 'Add WebProject')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Add WebProject') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.webproject.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.webproject.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- Image --}}
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">{{ __('Image') }} <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-sm up-img" name="image"
                                            id="image" required>
                                        <img class="mw-400 mt-2 show-img img-demo"
                                            src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                        @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Title --}}
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="title"
                                            value="{{ old('title') }}" placeholder="Enter Title" id="title" required>
                                        @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Slug --}}
                                <div class="form-group row">
                                    <label for="slug" class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="slug"
                                            value="{{ old('slug') }}" id="slug" placeholder="Auto-generated if left empty">
                                        @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Category --}}
                                <div class="form-group row">
                                    <label for="pcategory_id"
                                        class="col-sm-2 col-form-label">{{ __('Category') }} <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control form-control-sm" name="pcategory_id"
                                            id="pcategory_id" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('pcategory_id') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="form-group row">
                                    <label for="content" class="col-sm-2 col-form-label">{{ __('Content') }} <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea name="content" class="form-control form-control-sm summernote" id="content" rows="6"
                                            placeholder="{{ __('WebProject Content') }}">{{ old('content') }}</textarea>
                                        @error('content') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Icon Font --}}
                                <div class="form-group row">
                                    <label for="icon_font"
                                        class="col-sm-2 col-form-label">{{ __('Font Icon Class') }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="icon_font" id="icon_font"
                                            value="{{ old('icon_font') }}" placeholder="e.g., fa fa-book">
                                        @error('icon_font') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Icon --}}
                                <div class="form-group row">
                                    <label for="icon" class="col-sm-2 col-form-label">{{ __('Icon') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-sm up-img" name="icon"
                                            id="icon">
                                        <img class="mw-400 mt-2 show-img img-demo"
                                            src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                        @error('icon') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Banner Image --}}
                                <div class="form-group row">
                                    <label for="banner_image"
                                        class="col-sm-2 col-form-label">{{ __('Banner Image') }} <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-sm up-img" name="banner_image"
                                            id="banner_image" required>
                                        <img class="mw-400 mt-2 show-img img-demo"
                                            src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                        @error('banner_image') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Meta Keywords --}}
                                <div class="form-group row">
                                    <label for="meta_keywords"
                                        class="col-sm-2 col-form-label">{{ __('Meta Keywords') }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="meta_keywords"
                                            data-role="tagsinput" value="{{ old('meta_keywords') }}" id="meta_keywords"
                                            placeholder="{{ __('Meta Keywords') }}">
                                        @error('meta_keywords') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Meta Description --}}
                                <div class="form-group row">
                                    <label for="meta_description"
                                        class="col-sm-2 col-form-label">{{ __('Meta Description') }}</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control form-control-sm" name="meta_description" rows="4" id="meta_description"
                                            placeholder="{{ __('Meta Description') }}">{{ old('meta_description') }}</textarea>
                                        @error('meta_description') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Serial Number --}}
                                <div class="form-group row">
                                    <label for="serial_number"
                                        class="col-sm-2 col-form-label">{{ __('Serial Number') }}</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control form-control-sm" name="serial_number" id="serial_number"
                                            value="{{ old('serial_number', 0) }}">
                                        @error('serial_number') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                    <div class="col-sm-10">
                                        <select class="form-control form-control-sm" name="status" id="status">
                                            <option value="1" selected>{{ __('Publish') }}</option>
                                            <option value="0">{{ __('Unpublish') }}</option>
                                        </select>
                                        @error('status') <p class="text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Submit --}}
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