@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Outlines')
@section('content')

    @include('admin.course.top-nav')

    <section class="content">
        @include('admin.course.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="mt-2 card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Outline List</h3>
                        <div class="card-tools d-flex ">

                            <a class="btn btn-sm btn-primary" href="{{ route('admin.course.outline.add', ['slug' => $slug]) }}"><i
                                    class="fas fa-plus"></i> Add Outline </a>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($outlines as $index => $outline)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $outline->title }}</td>
                                        <td>{{ $outline->subtitle }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.course.outline.edit', $outline->id) }}"
                                                class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Delete Button with form -->
                                            <form id="deleteform" class="d-inline-block mx-1"
                                                action="{{ route('admin.course.outline.delete', $outline->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                    <i class="fas fa-trash"></i>
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
    </section>

@endsection
