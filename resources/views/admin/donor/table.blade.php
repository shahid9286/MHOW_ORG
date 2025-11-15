<table class="table table-bordered table-striped data_table">
    <tbody>
        @forelse($donors as $key => $donor)
            <tr>
                <td>
                    <input type="checkbox" name="donors[]" value="{{ $donor->id }}" class="selectDonor">
                </td>
                <td>{{ $key + 1 }}</td>
                <td>{{ $donor->name }}</td>
                <td>{{ $donor->account_name }}</td>
                <td>{{ $donor->email ?? '-' }}</td>
                <td>{{ $donor->phone ?? '-' }}</td>
                <td id="status-{{ $donor->id }}" class="status-column">
                    <span class="badge {{ $donor->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {!! $donor->status === 'active'
                            ? '<i class="fa fa-check-circle text-white"></i> Active'
                            : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                    </span>
                </td>
                <td>
                    <div class=" float-end" role="group" aria-label="donor Actions">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.donor.edit', $donor->id) }}" class="btn btn-info btn-sm"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit donor">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.donor.delete', $donor->id) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Delete donor">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <button class="btn btn-sm {{ $donor->status === 'active' ? 'btn-danger' : 'btn-success' }}"
                            id="toggle-status-{{ $donor->id }}" data-id="{{ $donor->id }}"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ $donor->status === 'active' ? 'Inactivate donor' : 'Activate donor' }}">
                            {!! $donor->status === 'active' ? '<i class="fa fa-times-circle"></i>' : '<i class="fa fa-check-circle"></i>' !!}
                        </button>
                    </div>
                </td>
                </form>

                </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No donors found.</td>
            </tr>
        @endforelse
    </tbody>

</table>
