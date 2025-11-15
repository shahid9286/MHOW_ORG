@extends('admin.layouts.master')
@section('title', 'Project Category')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Project Category') }}</h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.pcategory.add') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add Project Category') }}
                                </a>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Slug') }}</th>
                                        <th>{{ __('Order No') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $id => $category)
                                        <tr>
                                            <td>{{ ++$id }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->order_no }}</td>
                                            <td>
                                                @if ($category->status == 'publish')
                                                    <span class="badge bg-success">{{ __('Published') }}</span>
                                                @elseif($category->status == 'draft')
                                                    <span class="badge bg-info">{{ __('Draft') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.pcategory.edit', $category->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                                </a>

                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.pcategory.delete', $category->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
