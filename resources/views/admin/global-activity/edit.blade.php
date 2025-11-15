@extends('admin.layouts.master')
@section('title', 'Edit Global Activities')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Edit Global Activity') }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Global Activities') }}</li>
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
                            <h3 class="card-title mt-1">{{ __('Edit Global Activity') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.global-activity.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal"
                                action="{{ route('admin.global-activity.update', $global_activity->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="city" class="col-sm-12 control-label">
                                        {{ __('City') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" id="city" class="form-control" name="city"
                                            value="{{ old('city', $global_activity->city) }}"
                                            placeholder="{{ __('Enter City') }}">
                                        @if ($errors->has('city'))
                                            <p class="text-danger">{{ $errors->first('city') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="events" class="col-sm-12 control-label">
                                        {{ __('Events') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" id="events" class="form-control" name="events"
                                            value="{{ old('events', $global_activity->events) }}"
                                            placeholder="{{ __('Enter Events') }}">
                                        @if ($errors->has('events'))
                                            <p class="text-danger">{{ $errors->first('events') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="locations" class="col-sm-12 control-label">
                                        {{ __('Locations') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" id="locations" class="form-control" name="locations"
                                            value="{{ old('locations', $global_activity->locations) }}"
                                            placeholder="{{ __('Enter Location') }}">
                                        @if ($errors->has('locations'))
                                            <p class="text-danger">{{ $errors->first('locations') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="people" class="col-sm-12 control-label">
                                        {{ __('People') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="text" id="people" class="form-control" name="people"
                                            value="{{ old('people', $global_activity->people) }}"
                                            placeholder="{{ __('Enter People') }}">
                                        @if ($errors->has('people'))
                                            <p class="text-danger">{{ $errors->first('people') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="order" class="col-sm-12 control-label">
                                        {{ __('Order') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-12">
                                        <input type="number" id="order" class="form-control" name="order"
                                            value="{{ old('order', $global_activity->order) }}"
                                            placeholder="{{ __('Enter Order Number') }}">
                                        @if ($errors->has('order'))
                                            <p class="text-danger">{{ $errors->first('order') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="logo" class="col-sm-12 control-label">
                                        {{ __('Logo') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-12">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/global-activity/' . $global_activity->logo) }}"
                                            alt="" width="200px">
                                        <div class="custom-file">
                                            <label class="custom-file-label"
                                                for="logo">{{ __('Choose New Logo') }}</label>
                                            <input type="file" class="custom-file-input up-img" name="logo"
                                                id="logo">
                                        </div>
                                        @if ($errors->has('logo'))
                                            <p class="text-danger">{{ $errors->first('logo') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-12 control-label">{{ __('Status') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select id="status" name="status" class="form-control"
                                            value="{{ old('status', $global_activity->status) }}">

                                            <option value="active"
                                                {{ $global_activity->status == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive"
                                                {{ $global_activity->status == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button type="submit"
                                            class="btn btn-primary btn btn-sm">{{ __('Update') }}</button>
                                    </div>
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
