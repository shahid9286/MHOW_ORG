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
            @endphp
            <tr>
                <td class="text-center">{{ ++$id }}</td>
                <td>{{ __($event->title) }} <span class="badge bg-{{ $color }} stage-badge"
                        id="stage-badge-{{ $event->id }}">
                        {{ ucfirst($event->stage) }}
                    </span></span>
                </td>
                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d M, Y') }}</td>
                <td><a
                        href="{{ route('admin.booking.event-wise', ['slug' => $event->slug]) }}">({{ $event->bookings->count() }})</a>
                </td>
                <td>{{ $event->slug }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-info">Action</button>
                            <button type="button"
                                class="btn btn-sm btn-info dropdown-toggle dropdown-hover dropdown-icon"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <button type="button" class="dropdown-item update-stage-btn"
                                    data-id="{{ $event->id }}" data-stage="upcoming">Upcoming</button>
                                <button type="button" class="dropdown-item update-stage-btn"
                                    data-id="{{ $event->id }}" data-stage="ongoing">Ongoing</button>
                                <button type="button" class="dropdown-item update-stage-btn"
                                    data-id="{{ $event->id }}" data-stage="past">Past</button>
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
