@extends('admin.layouts.master')
@section('title', 'Event list')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Booking ') }}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-2">
                            <div class="col-lg-12">
                                <form id="searchForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" id="title" name="title" class="form-control"
                                                    placeholder="Search by Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="event_type" class="form-label">Event Type</label>
                                                <select class="form-control select2" name="event_type" id="event_type">
                                                    <option value="">Search Event Type</option>
                                                    <option value="free">Free
                                                    </option>
                                                    <option value="paid">Paid
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="stage" class="form-label">Stage</label>
                                                <select class="form-control select2" name="stage" id="stage">
                                                    <option value="">Search Stage</option>
                                                    <option value="upcoming">Upcoming</option>
                                                    <option value="ongoing">Ongoing</option>
                                                    <option value="past">Past</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="visibility" class="form-label">Visibility</label>
                                                <select class="form-control select2" name="visibility" id="visibility">
                                                    <option value="">Search Visibility</option>
                                                    <option value="featured">Featured
                                                    </option>
                                                    <option value="unfeatured">UnFeatured
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-right align-self-center">
                                            <button type="button" class="btn btn-primary btn-sm mt-lg-2" id="refreshBtn">
                                                <i class="bi bi-arrow-clockwise"></i> Refresh
                                            </button>
                                            <button type="submit" class="btn btn-success btn-sm mt-lg-2" id="searchBtn">
                                                <i class="bi bi-search"></i> Search
                                            </button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Events') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.event.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Event') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm text-center data_table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Bookings') }}</th>
                                            <th>{{ __('Slug') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @forelse ($events as $id => $event)
                                            @php
                                                if ($event->stage == 'upcoming') {
                                                    $color = 'warning';
                                                } elseif ($event->stage == 'ongoing') {
                                                    $color = 'primary';
                                                } else {
                                                    $color = 'danger';
                                                }

                                                if ($event->visibility == 'featured') {
                                                    $featureColor = 'success';
                                                } else {
                                                    $featureColor = 'warning';
                                                }
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ ++$id }}</td>
                                                <td><a href="{{ route('admin.event.detail', ['slug' => $event->slug]) }}">{{ __($event->title) }}</a> <span
                                                        class="badge bg-{{ $color }} stage-badge"
                                                        id="stage-badge-{{ $event->id }}">
                                                        {{ ucfirst($event->stage) }}
                                                    </span></span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d M, Y') }}</td>
                                                <td><a
                                                        href="{{ route('admin.booking.event-wise', ['slug' => $event->slug]) }}">({{ $event->bookings->count() }})</a>
                                                </td>
                                                <td><a href="{{ route('front.event.detail', ['slug' => $event->slug]) }}" target="_blank">{{ $event->slug }}</a> <span class="badge bg-{{ $featureColor }}">{{ ucfirst($event->visibility) }}</span></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="btn-group">
                                                            <button type="button"
                                                                class="btn btn-sm btn-info">Action</button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-info dropdown-toggle dropdown-hover dropdown-icon"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu">
                                                                <button type="button"
                                                                    class="dropdown-item update-stage-btn"
                                                                    data-id="{{ $event->id }}"
                                                                    data-stage="upcoming">Upcoming</button>
                                                                <button type="button"
                                                                    class="dropdown-item update-stage-btn"
                                                                    data-id="{{ $event->id }}"
                                                                    data-stage="ongoing">Ongoing</button>
                                                                <button type="button"
                                                                    class="dropdown-item update-stage-btn"
                                                                    data-id="{{ $event->id }}"
                                                                    data-stage="past">Past</button>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.event.detail', ['slug' => $event->slug]) }}">Detail</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center text-muted">No Events available.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="loader text-center" id="loader" style="display: none">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.update-stage-btn', function() {
                const eventId = $(this).data('id');
                const newStage = $(this).data('stage');
                const button = $(this);
                const badgeElement = $('#stage-badge-' + eventId);

                button.prop('disabled', true).text('Updating...');

                $.ajax({
                    url: '/update-stage/' + eventId + '/' + newStage,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        const stage = response.stage;
                        let badgeClass = 'bg-secondary';

                        if (stage === 'upcoming') badgeClass = 'bg-warning';
                        else if (stage === 'ongoing') badgeClass = 'bg-primary';
                        else if (stage === 'past') badgeClass = 'bg-danger';

                        badgeElement
                            .removeClass('bg-warning bg-primary bg-danger bg-secondary')
                            .addClass(badgeClass)
                            .html('<i class="fa fa-check-circle text-white"></i> ' + capitalize(
                                stage));

                        button.prop('disabled', false).text(capitalize(newStage));
                    },
                    error: function(xhr) {
                        let message = 'An unexpected error occurred.';

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            message = xhr.responseText;
                        }

                        alert('Error: ' + message);
                        button.prop('disabled', false).text(capitalize(newStage));
                    }
                });
            });

            function capitalize(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }
        });
    </script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                $('#searchBtn').html('<i class="fa fa-spinner fa-spin"></i> Searching...');
                $('#searchBtn').prop('disabled', true);

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.event.search') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        $('.tableContent').html(response.html);

                        $('.data_table').DataTable({
                            destroy: true
                        });
                    },
                    error: function(xhr) {
                        let errorMsg = 'Something went wrong.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMsg = xhr.responseText;
                        }
                        alert(errorMsg);
                    },
                    complete: function() {
                        $('#searchBtn').html('<i class="bi bi-search"></i> Search');
                        $('#searchBtn').prop('disabled', false);
                    }
                });
            });

            $('#refreshBtn').on('click', function() {
                $('#searchForm')[0].reset();
                $('#searchForm').submit(); // Trigger search with default
            });
        });
    </script>
@endsection
