@extends('admin.layouts.master')
@section('title', 'Banners')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Banner List') }}</h3>
                            <div class="card-tools d-flex">
                                <div class="d-inline-block mr-4">

                                </div>
                                <a href="{{ route('admin.banner.add') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add Banner') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">{{ __('#') }}</th>
                                        <th style="width: 15%;">{{ __('Image') }}</th>
                                        <th style="width: 30%;">{{ __('Title') }}</th>
                                        <th style="width: 10%;">{{ __('Order') }}</th>
                                        <th style="width: 15%;">{{ __('Status') }}</th>
                                        <th style="width: 25%;">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $id => $banner)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img class="w-80"
                                                    src="{{ asset('assets/admin/img/banner/' . $banner->image) }}"
                                                    alt="{{ $banner->title }}" style="width: 100px;">
                                            </td>
                                            <td>{!! $banner->title !!}</td>
                                            <td>{{ $banner->order_no }}</td>
                                            <td>
                                                @if ($banner->status == 1)
                                                    <span class="badge badge-success">{{ __('Publish') }}</span>
                                                @else
                                                    <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                                </a>
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.banner.delete', $banner->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection
