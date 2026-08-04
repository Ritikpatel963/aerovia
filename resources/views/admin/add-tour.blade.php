@extends('layouts.admin')

@section('page_title', 'Publish New Tour Package')
@section('page_subtitle', 'Design and deploy premium itineraries to the main Aerovia portal')

@section('header_actions')
  <button class="btn btn-outline" onclick="loadSampleData()"><i class="fas fa-magic"></i> Auto-Fill Sample</button>
  <button class="btn btn-primary" onclick="publishTour()"><i class="fas fa-paper-plane"></i> Publish Tour</button>
@endsection

@section('content')
      <!-- Form Section -->
      <div class="flex-col">
        <div class="tabs-bar">
          <button class="tab-btn active" onclick="switchTab(0)">1. General Info</button>
          <button class="tab-btn" onclick="switchTab(1)">2. Pricing & Payments</button>
          <button class="tab-btn" onclick="switchTab(2)">3. Flights & Logistics</button>
          <button class="tab-btn" onclick="switchTab(3)">4. Day-by-Day Itinerary</button>
          <button class="tab-btn" onclick="switchTab(4)">5. Terms & Docs</button>
        </div>

        <form id="add-tour-form" onsubmit="event.preventDefault();">
          <!-- TAB 1: General Info -->
          <div class="tab-content active" id="tab-0">
            <div class="form-panel">
              <h3 class="form-section-title"><i class="fas fa-info-circle"></i> Basic Tour Details</h3>
              
              <div class="form-grid-2">
                <div class="form-group form-group-full">
                  <label class="field-label" for="tour-title">Tour Title</label>
                  <input type="text" id="tour-title" class="field-input" placeholder="e.g. Poland & Czechia Expedition">
                </div>
                
                <div class="form-group form-group-full">
                  <label class="field-label" for="tour-subtitle">Sub-text / Routing Overview</label>
                  <textarea id="tour-subtitle" class="field-input" placeholder="e.g. Warsaw • Krakow • Zakopane • Prague..."></textarea>
                </div>

                <div class="form-group">
                  <label class="field-label" for="tour-duration">Tour Duration</label>
                  <input type="text" id="tour-duration" class="field-input" placeholder="e.g. 10D / 11N">
                </div>

                <div class="form-group">
                  <label class="field-label" for="tour-accommodation">Accommodation Type</label>
                  <input type="text" id="tour-accommodation" class="field-input" placeholder="e.g. 4 & 5 ★ Luxury Hotels">
                </div>

                <div class="form-group">
                  <label class="field-label" for="tour-start-date">Start Date</label>
                  <input type="text" id="tour-start-date" class="field-input" placeholder="e.g. 15 OCT 2026">
                </div>

                <div class="form-group">
                  <label class="field-label" for="tour-end-date">End Date</label>
                  <input type="text" id="tour-end-date" class="field-input" placeholder="e.g. 25 OCT 2026">
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 2: Pricing & Payments -->
          <div class="tab-content" id="tab-1">
            <div class="form-panel">
              <h3 class="form-section-title"><i class="fas fa-tags"></i> Pricing & Supplement Details</h3>
              
              <div class="form-grid-2">
                <div class="form-group">
                  <label class="field-label" for="price-sharing">Sharing Occupancy Price</label>
                  <div class="input-icon-wrapper">
                    <input type="text" id="price-sharing" class="field-input field-input-icon" placeholder="e.g. ₹ 3,49,999">
                    <i class="fas fa-indian-rupee-sign"></i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="field-label" for="price-single">Single Supplement Extra</label>
                  <div class="input-icon-wrapper">
                    <input type="text" id="price-single" class="field-input field-input-icon" placeholder="e.g. + ₹ 42,000">
                    <i class="fas fa-plus"></i>
                  </div>
                </div>

                <div class="form-group">
                  <label class="field-label" for="discount-returning">Returning Customer Discount</label>
                  <input type="text" id="discount-returning" class="field-input" placeholder="e.g. ₹ 19,999 OFF">
                </div>

                <div class="form-group">
                  <label class="field-label" for="discount-early">Early Bird Discount</label>
                  <input type="text" id="discount-early" class="field-input" placeholder="e.g. ₹ 9,999 OFF (Before July 20th)">
                </div>

                <div class="form-group form-group-full">
                  <h4 class="section-sub-title">Installments Schedule</h4>
                  <div class="form-grid-2">
                    <div class="form-group">
                      <label class="field-label">Booking Seat Deposit</label>
                      <input type="text" id="inst-deposit" class="field-input" placeholder="e.g. ₹ 50,000">
                    </div>
                    <div class="form-group">
                      <label class="field-label">1st Installment Details</label>
                      <input type="text" id="inst-1" class="field-input" placeholder="e.g. ₹ 90,000 due Aug 3">
                    </div>
                    <div class="form-group">
                      <label class="field-label">2nd Installment Details</label>
                      <input type="text" id="inst-2" class="field-input" placeholder="e.g. ₹ 90,000 due Sep 5">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Final Payment Details</label>
                      <input type="text" id="inst-final" class="field-input" placeholder="e.g. ₹ 69,999 due Oct 5">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 3: Flights & Logistics -->
          <div class="tab-content" id="tab-2">
            <div class="form-panel">
              <h3 class="form-section-title"><i class="fas fa-plane-departure"></i> Flight & Checked Luggage Routing</h3>
              
              <div id="flights-container">
                <!-- Flight 1 -->
                <div class="border-bottom-divider">
                  <h4 class="section-sub-title">Sector 1 (e.g., Domestic Connection)</h4>
                  <div class="form-grid-2">
                    <div class="form-group">
                      <label class="field-label">Route Title</label>
                      <input type="text" id="flight1-route" class="field-input" placeholder="e.g. Kolkata to Delhi">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Airline / Flight Code</label>
                      <input type="text" id="flight1-code" class="field-input" placeholder="e.g. IndiGo 6E5190">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Checked Baggage Allowance</label>
                      <input type="text" id="flight1-baggage" class="field-input" placeholder="e.g. 15 kg">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Cabin Hand Allowance</label>
                      <input type="text" id="flight1-cabin" class="field-input" placeholder="e.g. 7 kg">
                    </div>
                  </div>
                </div>

                <!-- Flight 2 -->
                <div class="border-bottom-divider">
                  <h4 class="section-sub-title">Sector 2 (e.g., Main International Flight)</h4>
                  <div class="form-grid-2">
                    <div class="form-group">
                      <label class="field-label">Route Title</label>
                      <input type="text" id="flight2-route" class="field-input" placeholder="e.g. Delhi to Warsaw">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Airline / Flight Code</label>
                      <input type="text" id="flight2-code" class="field-input" placeholder="e.g. Polish Airlines LOT LO72">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Checked Baggage Allowance</label>
                      <input type="text" id="flight2-baggage" class="field-input" placeholder="e.g. 23 kg">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Cabin Hand Allowance</label>
                      <input type="text" id="flight2-cabin" class="field-input" placeholder="e.g. 8 kg">
                    </div>
                  </div>
                </div>

                <!-- Flight 3 -->
                <div>
                  <h4 class="section-sub-title">Sector 3 (e.g., Inbound Connection)</h4>
                  <div class="form-grid-2">
                    <div class="form-group">
                      <label class="field-label">Route Title</label>
                      <input type="text" id="flight3-route" class="field-input" placeholder="e.g. Prague to Delhi">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Airline / Flight Code</label>
                      <input type="text" id="flight3-code" class="field-input" placeholder="e.g. Air Arabia (via Sharjah)">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Checked Baggage Allowance</label>
                      <input type="text" id="flight3-baggage" class="field-input" placeholder="e.g. 23 kg">
                    </div>
                    <div class="form-group">
                      <label class="field-label">Cabin Hand Allowance</label>
                      <input type="text" id="flight3-cabin" class="field-input" placeholder="e.g. 7 kg">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 4: Day-by-Day Itinerary -->
          <div class="tab-content" id="tab-3">
            <div class="form-panel">
              <div class="table-toolbar">
                <h3 class="form-section-title title-no-border"><i class="fas fa-route"></i> Day-by-Day Constructor</h3>
                <button type="button" class="btn btn-outline" onclick="addNewItineraryDay()"><i class="fas fa-plus"></i> Add Day</button>
              </div>
              
              <div id="dynamic-itinerary-container">
                <!-- Dynamic itinerary day boxes will be injected here -->
              </div>
            </div>
          </div>

          <!-- TAB 5: Terms & Docs -->
          <div class="tab-content" id="tab-4">
            <div class="form-panel">
              <h3 class="form-section-title"><i class="fas fa-file-contract"></i> Inclusions, Exclusions & Documentation</h3>
              
              <div class="form-grid-2">
                <div class="form-group form-group-full">
                  <label class="field-label" for="tour-inclusions">Tour Cost Inclusions (One item per line)</label>
                  <textarea id="tour-inclusions" class="field-input" placeholder="e.g. Return economy airfares&#10;Europe eSIM data&#10;4★ hotel accommodations..."></textarea>
                </div>

                <div class="form-group form-group-full">
                  <label class="field-label" for="tour-exclusions">Tour Cost Exclusions & Terms (One item per line)</label>
                  <textarea id="tour-exclusions" class="field-input" placeholder="e.g. Personal laundry shopping&#10;Standard hotel early check-in fees&#10;Itinerary modifications due to weather..."></textarea>
                </div>

                <div class="form-group">
                  <label class="field-label" for="tour-director">Tour Director Name</label>
                  <input type="text" id="tour-director" class="field-input" placeholder="e.g. Mr. Dale Mogose">
                </div>

                <div class="form-group">
                  <label class="field-label" for="tour-director-phone">Director Contact Number</label>
                  <input type="text" id="tour-director-phone" class="field-input" placeholder="e.g. +91 62890 06014">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

  <!-- Success Modal -->
  <div class="modal-overlay" id="success-modal">
    <div class="modal-card">
      <div class="modal-icon">
        <i class="fas fa-check"></i>
      </div>
      <h3>Tour Saved Successfully!</h3>
      <p id="publish-modal-desc">Your new tour package details have been simulated as saved successfully.</p>
      <button class="btn btn-primary btn-centered" onclick="closeModal()">Close Panel</button>
    </div>
  </div>
@endsection
