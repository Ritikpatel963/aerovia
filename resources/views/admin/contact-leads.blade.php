@extends('layouts.admin')

@section('title', 'Contact Leads - Aerovia Control')
@section('page_title', 'Contact Leads')
@section('page_subtitle', 'Manage inquiries and contact form submissions')

@section('content')
<div class="content-card">
  <div class="card-header">
    <h3>All Contact Submissions</h3>
  </div>
  <div class="card-body">
    @if($leads->count() > 0)
    <div class="table-responsive">
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
              <div style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $lead->message }}">
                {{ $lead->message }}
              </div>
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
</script>
@endsection
