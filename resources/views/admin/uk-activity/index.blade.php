@extends('admin.layouts.master')
@section('title', 'Uk Activity')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Uk Activity') }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Uk Activity') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Uk Activity') }}</h3>
                            <div class="card-tools d-flex">

                                <a href="{{ route('admin.uk-activity.add') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add New Uk Activity') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Logo') }}</th>
                                        <th>{{ __('City') }}</th>
                                        <th>{{ __('Events') }}</th>
                                        <th>{{ __('Locations') }}</th>
                                        <th>{{ __('People') }}</th>
                                        <th>{{ __('Order') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($uk_activities as $id => $uk_activity)
                                        <tr>
                                            <td>
                                                {{ ++$id }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('assets/admin/uploads/uk-activity/' . $uk_activity->logo) }}"
                                                    width="50px">
                                            </td>
                                            <td>
                                                {{ $uk_activity->city }}
                                            </td>
                                            <td>
                                                {{ $uk_activity->events }}
                                            </td>
                                            <td>
                                                {{ $uk_activity->locations }}
                                            </td>
                                            <td>
                                                {{ $uk_activity->people }}
                                            </td>
                                            <td>
                                                {{ $uk_activity->order }}
                                            </td>
                                            <td>
                                                @if ($uk_activity->status == 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @elseif($uk_activity->status == 'inactive')
                                                    <span class="badge bg-info">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.uk-activity.edit', $uk_activity->id) }}"
                                                    class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>


                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.uk-activity.delete', $uk_activity->id) }}"
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
