@extends('admin.layouts.master')
@section('title', 'Add Project Category')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <form class="form-horizontal" action="{{ route('admin.pcategory.store') }}" method="post"
                        enctype="multipart/form-data" id="pcategoryCategoryForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card card-primary card-outline mt-2">
                                    <div class="card-header">
                                        <h3 class="card-title mt-1">{{ __('Add Project Category') }}</h3>
                                    </div>

                                    <div class="card-body py-3">
                                        <div class="row">
                                            <!-- Title -->
                                            <div class="col-md-12 mb-3">
                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                                    </div>
                                                    <input type="text" id="title" class="form-control form-control-sm"
                                                        name="title" value="{{ old('title') }}" placeholder="Enter Title"
                                                        required>
                                                </div>
                                                @error('title')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Order No -->
                                            <div class="col-md-6 mb-3">
                                                <label for="order_no">Order No <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                                    </div>
                                                    <input type="number" id="order_no" class="form-control form-control-sm"
                                                        name="order_no" value="{{ old('order_no') }}"
                                                        placeholder="Enter Order No" required>
                                                </div>
                                                @error('order_no')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Status -->
                                            <div class="col-md-6 mb-3">
                                                <label for="status">Status <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                                    </div>
                                                    <select name="status" id="status"
                                                        class="form-control form-control-sm" required>
                                                        <option value="" disabled {{ old('status') ? '' : 'selected' }}>Select Status</option>
                                                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Published</option>
                                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="isfeature">{{ __('IsFeature') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="fas fa-toggle-on"></i></span></div>

                                                    <select id="isfeature" name="isfeature"
                                                        class="form-control form-control-sm">
                                                        <option value="featured"
                                                            {{ old('isfeature') == 'featured' ? 'selected' : '' }}>Featured
                                                        </option>
                                                        <option value="unfeatured"
                                                            {{ old('isfeature') == 'unfeatured' ? 'selected' : '' }}>
                                                            Unfeatured
                                                        </option>
                                                    </select>
                                                </div>

                                                @error('isfeature')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Font Awesome Icon -->
                                            <div class="col-md-6">
                                                <label for="font_awesome_icon">{{ __('Font Awesome Icon') }}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                                    </div>
                                                    <input type="text" id="font_awesome_icon" class="form-control form-control-sm"
                                                        name="font_awesome_icon" value="{{ old('font_awesome_icon') }}"
                                                        placeholder="e.g., fa fa-book">
                                                </div>
                                                @error('font_awesome_icon')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- Description -->
                                            <div class="col-md-12 mt-3">
                                                <label for="description">Description <span class="text-danger">*</span></label>
                                                <textarea id="description" class="form-control form-control-sm summernote" name="description" rows="6"
                                                    placeholder="Enter Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Uploads -->
                                        <div class="row mt-3">
                                            {{-- Icon --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="icon">Icon</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-icons"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control form-control-sm up-img"
                                                        name="icon" id="icon">
                                                </div>
                                                <img class="mw-400 mt-2 show-img img-demo"
                                                    src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                    width="50px">
                                                @error('icon')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            {{-- Thumbnail --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="thumbnail">Thumbnail</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control form-control-sm up-img"
                                                        name="thumbnail" id="thumbnail">
                                                </div>
                                                <img class="mw-400 mt-2 show-img img-demo"
                                                    src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                    width="50px">
                                                @error('thumbnail')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            {{-- Banner Image --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="banner_image">Banner Image</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                                    </div>
                                                    <input type="file" class="form-control form-control-sm up-img"
                                                        name="banner_image" id="banner_image">
                                                </div>
                                                <img class="mw-400 mt-2 show-img img-demo"
                                                    src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                    width="50px">
                                                @error('banner_image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            {{-- Meta Title --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="meta_title">Meta Title</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="meta_title" value="{{ old('meta_title') }}"
                                                        placeholder="Enter Meta Title">
                                                </div>
                                                @error('meta_title')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- SEO -->
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="meta_description">Meta Description</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                                                    </div>
                                                    <textarea id="meta_description" class="form-control form-control-sm" name="meta_description" rows="4"
                                                        placeholder="Enter Meta Description">{{ old('meta_description') }}</textarea>
                                                </div>
                                                @error('meta_description')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary btn-sm">Add Project Category</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
