@extends('admin.layouts.master')

@section('title', 'Donor List')

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Donor ') }}</b></h3>
                        </div>
                        <div class="card-body py-2">
                            <form id="searchForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="account_name">Account Name</label>
                                            <select class="form-control select2" name="account_name" id="account_name">
                                                <option value="">Search Account Name</option>
                                                @foreach ($donors->unique('account_name') as $donor)
                                                    <option value="{{ $donor->account_name }}">{{ $donor->account_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <select class="form-control select2" name="email" id="email">
                                                <option value="">Search Email</option>
                                                @foreach ($donors as $donor)
                                                    <option value="{{ $donor->email }}">{{ $donor->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" name="status" id="status">
                                                <option value="">Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="donor_type">Donor Type</label>
                                            <select class="form-control select2" name="donor_type" id="donor_type">
                                                <option value="">Search Donor Type</option>
                                                <option value="individual">Individual</option>
                                                <option value="corporate">Corporate</option>
                                                <option value="recurring">Recurring</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_receive_email">Receive Email</label>
                                            <select class="form-control select2" name="is_receive_email"
                                                id="is_receive_email">
                                                <option value="">Receive Email</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-center mt-lg-4 text-end">
                                        <button type="button" class="btn btn-primary btn-sm" id="refreshBtn">
                                            <i class="bi bi-arrow-clockwise"></i> Refresh
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm" id="searchBtn">
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
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><i class="fas fa-users "></i> Donor List</h3>

                        <div class="card-tools d-flex gap-2">

                            <button class="btn btn-sm btn-primary excel_import mx-1">Excel Import</button>
                            <a href="{{ route('admin.donor.add') }}" class="btn btn-sm btn-primary mx-1">+ Add Donor</a>
                            <button class="btn btn-sm btn-success" id="sendEmailBtn" disabled>
                                <i class="fas fa-envelope"></i> Send Email
                            </button>
                            <div class="d-flex flex-end">
                                <button type="button" id="runBirthdayEmailsBtn" class="btn btn-sm btn-success mx-1">
                                    <i class="fas fa-birthday-cake me-1"></i> Birthday Emails
                                </button>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped data_table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Account Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($donors as $key => $donor)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="donors[]" value="{{ $donor->id }}"
                                                class="selectDonor">
                                        </td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $donor->name }}</td>
                                        <td>{{ $donor->account_name }}</td>
                                        <td>{{ $donor->email ?? '-' }}</td>
                                        <td>{{ $donor->phone ?? '-' }}</td>
                                        <td id="status-{{ $donor->id }}" class="status-column">
                                            <span
                                                class="badge {{ $donor->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {!! $donor->status === 'active'
                                                    ? '<i class="fa fa-check-circle text-white"></i> Active'
                                                    : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                                            </span>
                                        </td>
                                        <td>
                                            <div class=" float-end" role="group" aria-label="donor Actions">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.donor.edit', $donor->id) }}"
                                                    class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit donor">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.donor.delete', $donor->id) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Delete donor">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                <button
                                                    class="btn btn-sm {{ $donor->status === 'active' ? 'btn-danger' : 'btn-success' }}"
                                                    id="toggle-status-{{ $donor->id }}" data-id="{{ $donor->id }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ $donor->status === 'active' ? 'Inactivate donor' : 'Activate donor' }}">
                                                    {!! $donor->status === 'active' ? '<i class="fa fa-times-circle"></i>' : '<i class="fa fa-check-circle"></i>' !!}
                                                </button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Excel Modal --}}
    <div class="modal fade" id="excelImportModal" tabindex="-1" aria-labelledby="excelImportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.donor.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Excel File</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Choose Excel File</label>
                        <input type="file" name="file" class="form-control" accept=".xlsx,.xls,.csv" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Upload</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Send Email Modal --}}
    <div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.booking.send.sendGeneralEmails') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Email to Donors</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="donor_ids" id="selectedDonorIds">
                        <input type="hidden" name="type" value="donor">
                        <div class="mb-3">
                            <label>Seletc Template</label>
                            <select name="template_id" class="form-control" required>
                                <option value="">Select a Template</option>
                                @foreach ($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->title }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            // Helper: enable/disable Send Email button based on checked checkboxes
            function toggleSendEmailButton() {
                const checked = $('.selectDonor:checked').length;
                $('#sendEmailBtn').prop('disabled', checked === 0);
            }

            // When a single checkbox changes (delegated - works for dynamic rows)
            $(document).on('change', '.selectDonor', function() {
                // Auto-toggle selectAll if all visible are checked
                const totalVisible = $('.selectDonor').length;
                const totalChecked = $('.selectDonor:checked').length;
                $('#selectAll').prop('checked', totalVisible > 0 && totalVisible === totalChecked);

                toggleSendEmailButton();
            });
            $(document).on('change', '#selectAll', function() {
                $('.selectDonor').prop('checked', this.checked);
                toggleSendEmailButton();
            });
            $(document).on('click', '#sendEmailBtn', function() {
                const selected = $('.selectDonor:checked').map(function() {
                    return this.value;
                }).get();
                $('#selectedDonorIds').val(selected.join(','));
                $('#sendEmailModal').modal('show');
            });

            // Excel import button (if present)
            $(document).on('click', '.excel_import', function() {
                $('#excelImportModal').modal('show');
            });

            // Toggle Status (delegated click)
            $(document).on('click', 'button[id^="toggle-status-"]', function() {
                const $button = $(this);
                const donorId = $button.data('id');
                const $statusElement = $('#status-' + donorId);

                $button.prop('disabled', true).html(
                    '<i class="fas fa-spinner fa-spin"></i> Please wait...');

                $.ajax({
                    url: '/admin/donor/toggle-status/' + donorId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        const isActive = response.status === 'active';
                        const newClass = isActive ? 'btn-danger' : 'btn-success';
                        const newIcon = isActive ? '<i class="fa fa-times-circle"></i>' :
                            '<i class="fa fa-check-circle"></i>';
                        const newTitle = isActive ? 'Inactivate donor' : 'Activate donor';
                        const newBadge = isActive ?
                            '<span class="badge bg-success"><i class="fa fa-check-circle text-white"></i> Active</span>' :
                            '<span class="badge bg-danger"><i class="fa fa-times-circle text-white"></i> Inactive</span>';

                        // Update status badge and button
                        $statusElement.html(newBadge);
                        $button.removeClass('btn-success btn-danger').addClass(newClass).html(
                            newIcon).attr('title', newTitle);

                        // Re-init tooltip for this button (Bootstrap 5)
                        const oldTooltip = bootstrap.Tooltip.getInstance($button[0]);
                        if (oldTooltip) oldTooltip.dispose();
                        new bootstrap.Tooltip($button[0]);
                    },
                    error: function() {
                        alert('An error occurred while toggling status.');
                    },
                    complete: function() {
                        $button.prop('disabled', false);
                    }
                });
            });

            // Search form - AJAX submit
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                const $searchBtn = $('#searchBtn');
                $searchBtn.html('<i class="fa fa-spinner fa-spin"></i> Searching...').prop('disabled',
                    true);

                $.ajax({
                    url: "{{ route('admin.donor.search') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        // Replace tbody with server-rendered partial
                        $('table.data_table tbody').html(response.html);

                        // Re-init Bootstrap tooltips for new elements
                        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(
                            function(el) {
                                const inst = bootstrap.Tooltip.getInstance(el);
                                if (inst) inst.dispose();
                                new bootstrap.Tooltip(el);
                            });

                        $('#selectAll').prop('checked', false);
                        toggleSendEmailButton();
                    },
                    error: function(xhr) {
                        let errorMsg = 'Something went wrong.';
                        if (xhr.responseJSON && xhr.responseJSON.message) errorMsg = xhr
                            .responseJSON.message;
                        else if (xhr.responseText) errorMsg = xhr.responseText;
                        alert(errorMsg);
                    },
                    complete: function() {
                        $searchBtn.html('<i class="bi bi-search"></i> Search').prop('disabled',
                            false);
                    }
                });
            });

            // Refresh button - reset filters and re-run search
            $(document).on('click', '#refreshBtn', function() {
                $('#searchForm')[0].reset();
                if ($('.select2').length) $('.select2').val(null).trigger('change');
                $('#searchForm').submit();
            });

            // initial state on page load
            $('#selectAll').prop('checked', false);
            toggleSendEmailButton();
        });
    </script>


    <script>
        $(document).ready(function() {
            // Handle Birthday Emails button click
            $('#runBirthdayEmailsBtn').on('click', function(e) {
                e.preventDefault(); // Prevent any default behavior

                // Confirmation dialog
                if (!confirm('Run the birthday email command now?')) {
                    return;
                }

                // Get the CSRF token from the meta tag (make sure you have this in your layout)
                let csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Show loading state on button
                let $btn = $(this);
                $btn.prop('disabled', true).html(
                    '<i class="fas fa-spinner fa-spin me-1"></i> Processing...');

                // Make AJAX POST request
                $.ajax({
                    url: "{{ route('admin.donor.run.birthday.emails') }}",
                    type: 'POST',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                        // Show success message (you can use a toast or alert)
                        alert('Birthday emails command executed successfully!');
                        // Optionally, reload the page to see updated history
                        // location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Show error message
                        alert('Error: ' + (xhr.responseJSON?.message ||
                            'Something went wrong!'));
                        console.error(xhr);
                    },
                    complete: function() {
                        // Re-enable button regardless of success/error
                        $btn.prop('disabled', false).html(
                            '<i class="fas fa-birthday-cake me-1"></i> Birthday Emails');
                    }
                });
            });
        });
    </script>

@endsection
