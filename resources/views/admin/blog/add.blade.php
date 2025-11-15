@extends('admin.layouts.master')
@section('title', 'Add Blog')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Blogs') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item">{{ __('Blogs') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Add Blog Category') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.blog.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">{{ __('image') }}</label>

                                    <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                            width="50px">

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-image"></i></span>
                                            </div>
                                            <input type="file" class="form-control form-control-sm up-img" name="image"
                                                id="image">
                                        </div>
                                        <p class="help-block text-info">
                                            {{ __('Upload 70X70 (Pixel) Size image for best quality.
                                                                                                                                                                                                                                                                                Only jpg, jpeg, png image is allowed.') }}
                                        </p>


                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 control-label">{{ __('Title') }}</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>

                                            <input type="text" class="form-control form-control-sm" name="title"
                                                value="{{ old('title') }}">
                                        </div>
                                        @if ($errors->has('title'))
                                            <p class="text-danger"> {{ $errors->first('title') }} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bcategory_id" class="col-sm-2 control-label">{{ __('Category') }}</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list"></i>
                                                </span>
                                            </div>

                                            <select class="form-control form-control-sm" name="bcategory_id"
                                                id="bcategory_id">
                                                @foreach ($bcategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('bcategory_id'))
                                            <p class="text-danger"> {{ $errors->first('bcategory_id') }} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="content" class="col-sm-2 control-label">{{ __('Content') }}</label>
                                    <div class="col-sm-10">

                                        <textarea name="content" class="form-control form-control-sm summernote" id="ck" rows="6"
                                            placeholder="{{ __('Content') }}">{{ old('content') }}</textarea>
                                        @if ($errors->has('content'))
                                            <p class="text-danger"> {{ $errors->first('content') }} </p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="meta_keywords" class="col-sm-2 control-label">
                                        {{ __('Meta Keywords') }}
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" data-role="tagsinput"
                                                name="meta_keywords" placeholder="{{ __('Meta Keywords') }}"
                                                value="{{ old('meta_keywords', $data->meta_keywords ?? '') }}">
                                        </div>
                                        @if ($errors->has('meta_keywords'))
                                            <p class="text-danger">{{ $errors->first('meta_keywords') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meta_description"
                                        class="col-sm-2 control-label">{{ __('Meta Description') }}</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-file-alt"></i>
                                                </span>
                                            </div>

                                            <textarea class="form-control form-control-sm" name="meta_description" placeholder="{{ __('Meta Description') }}"
                                                rows="4">{{ old('meta_description') }}</textarea>
                                        </div>
                                        @if ($errors->has('meta_description'))
                                            <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 control-label">{{ __('Status') }}</label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>

                                            <select class="form-control form-control-sm" name="status">
                                                <option value="0" selected>{{ __('Unpublish') }}</option>
                                                <option value="1">{{ __('Publish') }}</option>
                                            </select>
                                        </div>
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
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection
