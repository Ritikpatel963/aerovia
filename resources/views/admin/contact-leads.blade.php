@extends('layouts.admin')

@section('title', 'Contact Leads - Aerovia Control')
@section('page_title', 'Contact Leads')
@section('page_subtitle', 'Manage inquiries and contact form submissions')

@section('content')
<div class="flex-col">
  <div class="form-panel">
    <h3 class="form-section-title"><i class="fas fa-address-book"></i> All Contact Submissions</h3>
    
    @if($leads->count() > 0)
    <div class="table-responsive" style="margin-top: 1rem;">
      <table class="admin-table" id="contactLeadsTable">
        <thead>
          <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          @foreach($leads as $lead)
          <tr>
            <td data-sort="{{ $lead->created_at->timestamp }}">{{ $lead->created_at->format('M d, Y H:i') }}</td>
            <td><strong>{{ $lead->first_name }} {{ $lead->last_name }}</strong></td>
            <td>{{ $lead->email }}</td>
            <td>{{ $lead->phone }}</td>
            <td><span class="status-badge status-active">{{ $lead->subject }}</span></td>
            <td>
              <button type="button" class="btn-add-item" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; margin: 0; background: rgba(108, 45, 102, 0.2); border: 1px solid var(--primary-plum); color: var(--text-white);"
                data-name="{{ $lead->first_name }} {{ $lead->last_name }}"
                data-subject="{{ $lead->subject }}"
                data-email="{{ $lead->email }}"
                data-phone="{{ $lead->phone }}"
                data-message="{{ $lead->message }}"
                onclick="openMessageModal(this)">
                <i class="fas fa-eye"></i> View
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
    <div style="padding: 2rem; text-align: center; color: var(--theme-text-muted);">
      <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
      <p>No contact leads found yet.</p>
    </div>
    @endif
  </div>
</div>

<!-- Message Modal -->
<div class="modal-overlay" id="message-modal" style="display: none;">
  <div class="modal-card" style="max-width: 600px; text-align: left;">
    <div class="modal-icon" style="color: var(--primary-plum); margin: 0 auto 1rem auto; display: flex; justify-content: center;">
      <i class="fas fa-envelope-open-text"></i>
    </div>
    <h3 id="modal-lead-name" style="text-align: center; margin-bottom: 0.25rem;">Message from Name</h3>
    <p id="modal-lead-subject" style="text-align: center; color: var(--brand-sunset-orange); font-size: 0.9rem; margin-top: 0; margin-bottom: 1rem; font-weight: 500;">Subject</p>
    
    <div style="display: flex; justify-content: center; gap: 1.5rem; margin-bottom: 1.5rem; font-size: 0.9rem;">
      <div><i class="fas fa-envelope" style="color: var(--text-muted); margin-right: 0.4rem;"></i> <span id="modal-lead-email" style="color: var(--text-white);"></span></div>
      <div><i class="fas fa-phone-alt" style="color: var(--text-muted); margin-right: 0.4rem;"></i> <span id="modal-lead-phone" style="color: var(--text-white);"></span></div>
    </div>
    
    <div style="background: var(--surface-light); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--border-color);">
      <p id="modal-lead-message" style="color: var(--text-white); font-size: 0.95rem; line-height: 1.6; margin: 0; white-space: pre-wrap; max-height: 400px; overflow-y: auto;"></p>
    </div>
    
    <button class="btn btn-primary" style="margin-top: 1.5rem; width: 100%;" onclick="closeMessageModal()">Close Message</button>
  </div>
</div>
@endsection

@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS & CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<style>
/* Dark Mode Overrides for DataTables */
.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: var(--text-muted, #a1a1aa);
    margin-bottom: 15px;
}
.dataTables_wrapper .dataTables_length select, .dataTables_wrapper .dataTables_filter input {
    background-color: var(--surface-light, #1f1f2e);
    color: var(--text-white, #ffffff);
    border: 1px solid var(--border-color, #2d2d3f);
    padding: 5px 10px;
    border-radius: 4px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    color: var(--text-muted, #a1a1aa) !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    background: var(--primary-plum, #6c2d66);
    color: white !important;
    border: none;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: var(--surface-light, #1f1f2e);
    color: white !important;
    border: none;
}
table.dataTable.no-footer {
    border-bottom: 1px solid var(--border-color, #2d2d3f);
}
</style>

<script>
$(document).ready(function() {
    $('#contactLeadsTable').DataTable({
        "order": [[ 0, "desc" ]],
        "pageLength": 25,
        "language": {
            "search": "Search Leads:"
        }
    });
});

function openMessageModal(button) {
    // Extract data from the button's data attributes
    var name = button.getAttribute('data-name');
    var subject = button.getAttribute('data-subject');
    var email = button.getAttribute('data-email');
    var phone = button.getAttribute('data-phone');
    var message = button.getAttribute('data-message');
    
    // Set the data in the modal
    document.getElementById('modal-lead-name').innerText = 'Message from ' + name;
    document.getElementById('modal-lead-subject').innerText = 'Subject: ' + subject;
    document.getElementById('modal-lead-email').innerText = email;
    document.getElementById('modal-lead-phone').innerText = phone;
    document.getElementById('modal-lead-message').innerText = message;
    
    // Show the modal
    document.getElementById('message-modal').style.display = 'flex';
}

function closeMessageModal() {
    document.getElementById('message-modal').style.display = 'none';
}
</script>
@endsection
