@extends('admin.layouts.master')

@section('title', 'Email Sent History')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><i class="fas fa-envelope me-1"></i> Email Sent History</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Email</th>
                                    <th>Template</th>
                                    <th>Subject</th>
                                    <th>Sent At</th>
                                    <th>Status</th>
                                    <th>Sent By</th>
                                    <th>Attachments</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($donorEmails as $key => $email)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $email->emailable->name ?? 'N/A' }}</td>
                                        <td>{{ $email->emailable->email ?? 'N/A' }}</td>
                                        <td>{{ $email->template->title ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($email->subject, 60) }}</td>

                                        <td>
                                            {{ $email->sent_at ? $email->sent_at->format('d M Y h:i A') : 'Pending' }}
                                        </td>

                                        <td>
                                            @php
                                                $badge = match ($email->status) {
                                                    'sent' => 'success',
                                                    'failed' => 'danger',
                                                    'queued' => 'warning',
                                                    default => 'secondary',
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $badge }}">{{ ucfirst($email->status) }}</span>
                                        </td>

                                        <td>{{ $email->sender->name ?? 'N/A' }}</td>

                                        <td>
                                            @php
                                                $attachments = !empty($email->attachments)
                                                    ? json_decode($email->attachments, true)
                                                    : [];
                                            @endphp

                                            @if (!empty($attachments))
                                                <span class="badge bg-info">{{ count($attachments) }} File(s)</span>
                                                <div class="mt-1">
                                                    @foreach ($attachments as $file)
                                                        @php
                                                            $ext = strtolower(pathinfo($file['file_path'], PATHINFO_EXTENSION));
                                                            $icon = match (true) {
                                                                in_array($ext, ['pdf']) => 'fa-file-pdf text-danger',
                                                                in_array($ext, ['doc', 'docx']) => 'fa-file-word text-primary',
                                                                in_array($ext, ['xls', 'xlsx']) => 'fa-file-excel text-success',
                                                                in_array($ext, ['jpg', 'jpeg', 'png', 'gif']) => 'fa-file-image text-warning',
                                                                default => 'fa-file text-secondary',
                                                            };
                                                        @endphp
                                                        <a href="{{ asset($file['file_path']) }}" target="_blank" class="me-1">
                                                            <i class="fas {{ $icon }} fa-lg"></i>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-muted small">No Attachments</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($email->body)
                                                <button class="btn btn-secondary btn-sm ms-1"
                                                    onclick="viewBodyInModal({{ $email->id }})">
                                                    <i class="fas fa-eye"></i> View Email
                                                </button>

                                                {{-- Hidden email body --}}
                                                <div id="email-body-{{ $email->id }}" class="d-none">
                                                    {!! $email->body !!}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">No emails found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Email Body Modal --}}
<div class="modal fade" id="bodyModal" tabindex="-1" aria-labelledby="bodyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bodyModalLabel">Email Body</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="emailBodyContent">
                <!-- Body content will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function viewBodyInModal(id) {
        let body = document.getElementById(`email-body-${id}`).innerHTML;
        $('#emailBodyContent').html(body);
        $('#bodyModal').modal('show');
    }
</script>
@endsection
