@extends('layouts.admin')

@section('page_title', 'Tours Catalog Dashboard')
@section('page_subtitle', 'Manage, inspect, edit, or delete existing tour packages')

@section('header_actions')
  <a href="{{ url('admin/add-tour') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Tour</a>
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
            Showing 4 total entries
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
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong class="tour-name-cell">Poland & Czechia Expedition</strong></td>
                <td class="tour-route-cell">Warsaw • Krakow • Prague • Zakopane</td>
                <td>10 Days / 11 Nights</td>
                <td>15 Oct 2026 - 25 Oct 2026</td>
                <td>₹ 3,49,999</td>
                <td>
                  <span class="status-badge status-active"><i class="fas fa-circle"></i> Active</span>
                </td>
                <td>
                  <div class="table-actions">
                    <button class="action-btn" onclick="editTourAction('Poland & Czechia Expedition')"
                      title="Edit Tour"><i class="fas fa-pen"></i></button>
                    <button class="action-btn delete-btn" onclick="deleteTourRow(this)" title="Delete Tour"><i
                        class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><strong class="tour-name-cell">Ubud Bali Retreat</strong></td>
                <td class="tour-route-cell">Denpasar • Ubud • Cliffside Temples</td>
                <td>7 Days / 6 Nights</td>
                <td>10 Nov 2026 - 17 Nov 2026</td>
                <td>₹ 1,89,999</td>
                <td>
                  <span class="status-badge status-active"><i class="fas fa-circle"></i> Active</span>
                </td>
                <td>
                  <div class="table-actions">
                    <button class="action-btn" onclick="editTourAction('Ubud Bali Retreat')" title="Edit Tour"><i
                        class="fas fa-pen"></i></button>
                    <button class="action-btn delete-btn" onclick="deleteTourRow(this)" title="Delete Tour"><i
                        class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><strong class="tour-name-cell">Norway Northern Lights</strong></td>
                <td class="tour-route-cell">Oslo • Tromso • Fjord Cruise</td>
                <td>9 Days / 8 Nights</td>
                <td>05 Dec 2026 - 14 Dec 2026</td>
                <td>₹ 4,10,000</td>
                <td>
                  <span class="status-badge status-inactive"><i class="fas fa-circle"></i> Inactive</span>
                </td>
                <td>
                  <div class="table-actions">
                    <button class="action-btn" onclick="editTourAction('Norway Northern Lights')" title="Edit Tour"><i
                        class="fas fa-pen"></i></button>
                    <button class="action-btn delete-btn" onclick="deleteTourRow(this)" title="Delete Tour"><i
                        class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><strong class="tour-name-cell">Swiss Alps Explorer</strong></td>
                <td class="tour-route-cell">Zurich • Zermatt • Interlaken</td>
                <td>8 Days / 7 Nights</td>
                <td>12 Jan 2027 - 19 Jan 2027</td>
                <td>₹ 3,75,999</td>
                <td>
                  <span class="status-badge status-active"><i class="fas fa-circle"></i> Active</span>
                </td>
                <td>
                  <div class="table-actions">
                    <button class="action-btn" onclick="editTourAction('Swiss Alps Explorer')" title="Edit Tour"><i
                        class="fas fa-pen"></i></button>
                    <button class="action-btn delete-btn" onclick="deleteTourRow(this)" title="Delete Tour"><i
                        class="fas fa-trash"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-pagination">
          <div>Showing page 1 of 1 (4 total items)</div>
          <div class="pagination-controls">
            <button class="page-link-btn" disabled><i class="fas fa-chevron-left"></i></button>
            <button class="page-link-btn active">1</button>
            <button class="page-link-btn" disabled><i class="fas fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
@endsection
