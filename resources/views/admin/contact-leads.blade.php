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
      <table class="admin-table">
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
            <td>{{ $lead->created_at->format('M d, Y H:i') }}</td>
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
