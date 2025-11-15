{{-- @extends('admin.layouts.master')
@section('title', 'Add SEO Meta')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add SEO Meta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">SEO Meta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <form class="form-horizontal" action="{{ route('admin.seo.meta.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

              
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-file-alt"></i> Page Information</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.seo.meta.index') }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-angle-double-left"></i> Back</a>
                                </div>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Page Slug</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            <input type="text" name="page_slug" class="form-control"
                                                value="{{ old('page_slug') }}">
                                        </div>
                                        @error('page_slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="fav_icon">
                                            {{ __(' Fav Icon') }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                name="fav_icon" id="fav_icon">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/') }}" alt=""
                                            width="50px">

                                        @if ($errors->has('fav_icon'))
                                            <p class="text-danger">{{ $errors->first('fav_icon') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="logo">
                                            {{ __(' Logo') }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img" name="logo"
                                                id="logo">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/') }}" alt=""
                                            width="50px">

                                        @if ($errors->has('logo'))
                                            <p class="text-danger">{{ $errors->first('logo') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
  
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-search"></i> Meta Information</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Info</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="meta_info" class="form-control form-control-sm" rows="3">{{ old('meta_info') }}</textarea>
                                        </div>
                                        @error('meta_info')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="meta_image">{{ __(' Meta Image') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                name="meta_image" id="meta_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/default.png') }}" alt=""
                                            width="50">
                                        @if ($errors->has('meta_image'))
                                            <p class="text-danger">{{ $errors->first('meta_image') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fab fa-facebook"></i> Open Graph</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>OG Meta</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="og_meta" class="form-control form-control-sm" rows="3">{{ old('og_meta') }}</textarea>
                                        </div>
                                        @error('og_meta')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="og_image">
                                            {{ __(' Og Image') }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                name="og_image" id="og_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/') }}" alt=""
                                            width="50px">

                                        @if ($errors->has('og_image'))
                                            <p class="text-danger">{{ $errors->first('og_image') }}</p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                    
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fab fa-twitter"></i> Twitter</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Twitter Meta</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="twitter_meta" class="form-control form-control-sm" rows="3">{{ old('twitter_meta') }}</textarea>
                                        </div>
                                        @error('twitter_meta')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="twitter_image">
                                            {{ __(' Twitter Image') }}
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                name="twitter_image" id="twitter_image">
                                        </div>
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/seo_metas/') }}" alt=""
                                            width="50px">

                                        @if ($errors->has('twitter_image'))
                                            <p class="text-danger">{{ $errors->first('twitter_image') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fab fa-code"></i> Scheme</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Scheme</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="scheme" class="form-control form-control-sm" rows="3">{{ old('scheme') }}</textarea>
                                        </div>
                                        @error('scheme')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Custom Codes</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Header Top</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            <textarea name="header_top" class="form-control form-control-sm" rows="3">{{ old('header_top') }}</textarea>
                                        </div>
                                        @error('header_top')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Header Bottom</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                            <textarea name="header_bottom" class="form-control form-control-sm" rows="3">{{ old('header_bottom') }}</textarea>
                                        </div>
                                        @error('header_bottom')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Body Start</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-play"></i></span>
                                            <textarea name="body_start" class="form-control form-control-sm" rows="3">{{ old('body_start') }}</textarea>
                                        </div>
                                        @error('body_start')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Body End</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="body_end" class="form-control form-control-sm" rows="3">{{ old('body_end') }}</textarea>
                                        </div>

                                        @error('body_end')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Custom CSS</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Custom CSS</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="custom_css" class="form-control form-control-sm" rows="3">{{ old('custom_css') }}</textarea>
                                        </div>

                                        @error('custom_css')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-code"></i> Custom JS</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Custom JS</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-code"></i></span>

                                            <textarea name="custom_js" class="form-control form-control-sm" rows="3">{{ old('custom_js') }}</textarea>
                                        </div>

                                        @error('custom_js')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add SEO
                            Meta</button>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection --}}
@extends('admin.layouts.master')
@section('title', 'Add SEO Meta')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add SEO Meta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active">SEO Meta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <form class="form-horizontal" action="{{ route('admin.seo.meta.store') }}" method="post">
                        @csrf

                        {{-- PAGE INFO --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-file-alt"></i> Page Information</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.seo.meta.index') }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-angle-double-left"></i> Back</a>
                                </div>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Page Slug</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            <input type="text" name="page_slug" class="form-control"
                                                value="{{ old('page_slug') }}">
                                        </div>
                                        @error('page_slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Fav Icon --}}
                                    <div class="col-md-6 mt-2">
                                        <label>Fav Icon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                id="fav_icon">
                                        </div>
                                        <input type="hidden" name="fav_icon" id="fav_icon_hidden"
                                            value="{{ old('fav_icon') }}">
                                        <div id="fav_icon_info" class="mt-2"
                                            style="display:{{ old('fav_icon') ? 'block' : 'none' }};">
                                            <img id="fav_icon_preview"
                                                src="{{ old('fav_icon') ? asset(old('fav_icon')) : '' }}" width="50"
                                                class="img-thumbnail mb-1">
                                            <div>🧭 Full URL: <code
                                                    id="fav_icon_full_url">{{ old('fav_icon') ? asset(old('fav_icon')) : '' }}</code>
                                            </div>
                                            <div>📁 Relative Path: <code
                                                    id="fav_icon_relative_path">{{ old('fav_icon') }}</code></div>
                                        </div>
                                    </div>

                                    {{-- Logo --}}
                                    <div class="col-md-6 mt-2">
                                        <label>Logo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                id="logo">
                                        </div>
                                        <input type="hidden" name="logo" id="logo_hidden" value="{{ old('logo') }}">
                                        <div id="logo_info" class="mt-2"
                                            style="display:{{ old('logo') ? 'block' : 'none' }};">
                                            <img id="logo_preview" src="{{ old('logo') ? asset(old('logo')) : '' }}"
                                                width="50" class="img-thumbnail mb-1">
                                            <div>🧭 Full URL: <code
                                                    id="logo_full_url">{{ old('logo') ? asset(old('logo')) : '' }}</code>
                                            </div>
                                            <div>📁 Relative Path: <code id="logo_relative_path">{{ old('logo') }}</code>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- META INFO --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fas fa-search"></i> Meta Information</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Meta Info</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="meta_info" class="form-control form-control-sm" rows="3">{{ old('meta_info') }}</textarea>
                                        </div>
                                        @error('meta_info')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Meta Image --}}
                                    <div class="col-md-12 mt-2">
                                        <label>Meta Image</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                id="meta_image">
                                        </div>
                                        <input type="hidden" name="meta_image" id="meta_image_hidden"
                                            value="{{ old('meta_image') }}">
                                        <div id="meta_image_info" class="mt-2"
                                            style="display:{{ old('meta_image') ? 'block' : 'none' }};">
                                            <img id="meta_image_preview"
                                                src="{{ old('meta_image') ? asset(old('meta_image')) : '' }}"
                                                width="50" class="img-thumbnail mb-1">
                                            <div>🧭 Full URL: <code
                                                    id="meta_image_full_url">{{ old('meta_image') ? asset(old('meta_image')) : '' }}</code>
                                            </div>
                                            <div>📁 Relative Path: <code
                                                    id="meta_image_relative_path">{{ old('meta_image') }}</code></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- OPEN GRAPH --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fab fa-facebook"></i> Open Graph</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>OG Meta</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="og_meta" class="form-control form-control-sm" rows="3">{{ old('og_meta') }}</textarea>
                                        </div>
                                        @error('og_meta')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- OG Image --}}
                                    <div class="col-md-12 mt-2">
                                        <label>OG Image</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                id="og_image">
                                        </div>
                                        <input type="hidden" name="og_image" id="og_image_hidden"
                                            value="{{ old('og_image') }}">
                                        <div id="og_image_info" class="mt-2"
                                            style="display:{{ old('og_image') ? 'block' : 'none' }};">
                                            <img id="og_image_preview"
                                                src="{{ old('og_image') ? asset(old('og_image')) : '' }}" width="50"
                                                class="img-thumbnail mb-1">
                                            <div>🧭 Full URL: <code
                                                    id="og_image_full_url">{{ old('og_image') ? asset(old('og_image')) : '' }}</code>
                                            </div>
                                            <div>📁 Relative Path: <code
                                                    id="og_image_relative_path">{{ old('og_image') }}</code></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TWITTER --}}
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><i class="fab fa-twitter"></i> Twitter</h3>
                            </div>
                            <div class="card-body py-3">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Twitter Meta</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            <textarea name="twitter_meta" class="form-control form-control-sm" rows="3">{{ old('twitter_meta') }}</textarea>
                                        </div>
                                        @error('twitter_meta')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Twitter Image --}}
                                    <div class="col-md-12 mt-2">
                                        <label>Twitter Image</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img"
                                                id="twitter_image">
                                        </div>
                                        <input type="hidden" name="twitter_image" id="twitter_image_hidden"
                                            value="{{ old('twitter_image') }}">
                                        <div id="twitter_image_info" class="mt-2"
                                            style="display:{{ old('twitter_image') ? 'block' : 'none' }};">
                                            <img id="twitter_image_preview"
                                                src="{{ old('twitter_image') ? asset(old('twitter_image')) : '' }}"
                                                width="50" class="img-thumbnail mb-1">
                                            <div>🧭 Full URL: <code
                                                    id="twitter_image_full_url">{{ old('twitter_image') ? asset(old('twitter_image')) : '' }}</code>
                                            </div>
                                            <div>📁 Relative Path: <code
                                                    id="twitter_image_relative_path">{{ old('twitter_image') }}</code>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 card-primary card-outline mt-3">
                            <div class="card-header">
                                <i class="fas fa-code me-1"></i> Structured Data
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="structured_data_global" class="form-label">Global Structured Data
                                        (JSON-LD)</label>
                                    <textarea name="structured_data_global" id="structured_data_global" rows="5" class="form-control"
                                        placeholder="Paste your structured data (JSON-LD)">{{ old('structured_data_global') }}</textarea>
                                    @error('structured_data_global')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Global Scripts --}}
                        <div class="card mb-4 card-primary card-outline mt-3">
                            <div class="card-header">
                                <i class="fas fa-file-code me-1"></i> Global Scripts
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="global_header_scripts" class="form-label">Header Scripts</label>
                                    <textarea name="global_header_scripts" id="global_header_scripts" rows="4" class="form-control"
                                        placeholder="Scripts to include in the <head>">{{ old('global_header_scripts') }}</textarea>
                                    @error('global_header_scripts')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="global_body_end_scripts" class="form-label">Body End Scripts</label>
                                    <textarea name="global_body_end_scripts" id="global_body_end_scripts" rows="4" class="form-control"
                                        placeholder="Scripts to include before </body>">{{ old('global_body_end_scripts') }}</textarea>
                                    @error('global_body_end_scripts')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add SEO
                            Meta</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- AJAX Script --}}
    <script>
        const imageFields = ['fav_icon', 'logo', 'meta_image', 'og_image', 'twitter_image'];

        imageFields.forEach(field => {
            document.getElementById(field).addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                let oldPath = document.getElementById(field + '_hidden').value;

                let formData = new FormData();
                formData.append('image', file);
                formData.append('type', field);
                formData.append('old_image', oldPath);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ route('seo.meta.upload') }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {

                            document.getElementById(field + '_preview').src = res.full_url;
                            document.getElementById(field + '_full_url').textContent = res.full_url;
                            document.getElementById(field + '_relative_path').textContent = res
                                .relative_path;
                            document.getElementById(field + '_info').style.display = 'block';
                            // Save in hidden input
                            document.getElementById(field + '_hidden').value = res.relative_path;
                        } else {
                            alert('Upload failed!');
                        }
                    })
                    .catch(err => alert('Something went wrong!'));
            });
        });
    </script>

@endsection
