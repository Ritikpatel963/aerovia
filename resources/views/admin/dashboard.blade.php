@extends('layouts.admin')

@section('page_title', 'Tours Catalog Dashboard')
@section('page_subtitle', 'Manage, inspect, edit, or delete existing tour packages')

@section('header_actions')
  <a href="{{ route('tours.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Tour</a>
@endsection

@section('content')
      <!-- Tours list table panel -->
      <div class="table-panel">
        <div class="table-toolbar">
          <div class="search-wrapper">
            <input type="text" id="table-search-input" class="search-input"
              placeholder="Search tours by name or route...">
            <i class="fas fa-search"></i>
          </div>

          <div class="tours-count" id="tours-count-display">
            Showing {{ count($tours) }} total entries
          </div>
        </div>

        <div class="responsive-table-container">
          <table class="admin-table">
            <thead>
              <tr>
                <th>Tour Package</th>
                <th>Routing / Countries</th>
                <th>Duration</th>
                <th>Dates (Start - End)</th>
                <th>Price (INR)</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($tours as $tour)
              <tr>
                <td><strong class="tour-name-cell">{{ $tour->title }}</strong></td>
                <td class="tour-route-cell">{{ $tour->subtitle }}</td>
                <td>{{ $tour->duration }}</td>
                <td>{{ $tour->start_date }} - {{ $tour->end_date }}</td>
                <td>₹ {{ number_format((float) $tour->price_sharing, 0) }}</td>
                <td>
                  <div class="table-actions">
                    <a href="{{ route('tours.edit', $tour->id) }}" class="action-btn" title="Edit Tour"><i class="fas fa-pen"></i></a>
                    <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this tour package? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn" title="Delete Tour"><i class="fas fa-trash"></i></button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" style="text-align: center;">No tours available.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="table-pagination">
          <div>Showing page 1 of 1 ({{ count($tours) }} total items)</div>
          <div class="pagination-controls">
            <button class="page-link-btn" disabled><i class="fas fa-chevron-left"></i></button>
            <button class="page-link-btn active">1</button>
            <button class="page-link-btn" disabled><i class="fas fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
@endsection
