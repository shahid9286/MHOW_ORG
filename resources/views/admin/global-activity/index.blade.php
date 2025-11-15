@extends('admin.layouts.master')
@section('title', 'Global Activity')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Global Activity') }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Global Activity') }}</li>
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
                            <h3 class="card-title mt-1">{{ __('Global Activity') }}</h3>
                            <div class="card-tools d-flex">

                                <a href="{{ route('admin.uk-activity.add') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add New Global Activity') }}
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

                                    @foreach ($global_activities as $id => $global_activity)
                                        <tr>
                                            <td>
                                                {{ ++$id }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('assets/admin/uploads/global-activity/' . $global_activity->logo) }}"
                                                    width="50px">
                                            </td>
                                            <td>
                                                {{ $global_activity->city }}
                                            </td>
                                            <td>
                                                {{ $global_activity->events }}
                                            </td>
                                            <td>
                                                {{ $global_activity->locations }}
                                            </td>
                                            <td>
                                                {{ $global_activity->people }}
                                            </td>
                                            <td>
                                                {{ $global_activity->order }}
                                            </td>
                                            <td>
                                                @if ($global_activity->status == 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @elseif($global_activity->status == 'inactive')
                                                    <span class="badge bg-info">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.global-activity.edit', $global_activity->id) }}"
                                                    class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>


                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.global-activity.delete', $global_activity->id) }}"
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
