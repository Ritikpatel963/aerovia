@extends('layouts.admin')

@section('page_title', 'General Settings')
@section('page_subtitle', 'Modify public contact info, social links, and update site-wide Frequently Asked Questions')

@section('header_actions')
  <button class="btn btn-primary" onclick="saveGeneralSettings()"><i class="fas fa-save"></i> Save Settings</button>
@endsection

@section('content')
      <div class="flex-col">
        <form id="settings-form" onsubmit="event.preventDefault();">
          
          <!-- Company Contact Details -->
          <div class="form-panel">
            <h3 class="form-section-title"><i class="fas fa-address-book"></i> Company Contact Info</h3>
            <div class="form-grid-2">
              
              <div class="form-group">
                <label class="field-label">Mobile / Phone Number</label>
                <input type="text" id="setting-phone" class="field-input" placeholder="e.g. +91 62890 06014">
              </div>

              <div class="form-group">
                <label class="field-label">Email Address</label>
                <input type="email" id="setting-email" class="field-input" placeholder="e.g. info@aeroviaexpeditions.com">
              </div>

              <div class="form-group form-group-full">
                <label class="field-label">Office Address</label>
                <input type="text" id="setting-address" class="field-input" placeholder="e.g. 127A Park Street, Kolkata - 700016">
              </div>

            </div>
          </div>

          <!-- Social Media Integration -->
          <div class="form-panel">
            <h3 class="form-section-title"><i class="fas fa-share-alt"></i> Social Media & WhatsApp Links</h3>
            <div class="form-grid-2">
              
              <div class="form-group">
                <label class="field-label">Facebook Profile Link</label>
                <div class="social-input-wrapper">
                  <i class="fab fa-facebook-f social-brand-icon"></i>
                  <input type="text" id="setting-fb" class="field-input" placeholder="https://www.facebook.com/username">
                </div>
              </div>

              <div class="form-group">
                <label class="field-label">LinkedIn Page Link</label>
                <div class="social-input-wrapper">
                  <i class="fab fa-linkedin-in social-brand-icon"></i>
                  <input type="text" id="setting-linkedin" class="field-input" placeholder="https://www.linkedin.com/company/username">
                </div>
              </div>

              <div class="form-group">
                <label class="field-label">Instagram Username Link</label>
                <div class="social-input-wrapper">
                  <i class="fab fa-instagram social-brand-icon"></i>
                  <input type="text" id="setting-instagram" class="field-input" placeholder="https://www.instagram.com/username">
                </div>
              </div>

              <div class="form-group">
                <label class="field-label">WhatsApp Number (For Click-to-Chat - digits only, country code included)</label>
                <div class="social-input-wrapper">
                  <i class="fab fa-whatsapp social-brand-icon"></i>
                  <input type="text" id="setting-whatsapp" class="field-input" placeholder="e.g. 916289006014">
                </div>
              </div>

            </div>
          </div>

          <!-- FAQ Update Section -->
          <div class="form-panel">
            <div class="editor-card-header">
              <h3 class="form-section-title" style="border: none; margin: 0; padding: 0;"><i class="fas fa-question-circle"></i> Frequently Asked Questions (FAQ)</h3>
              <button type="button" class="btn-add-item" onclick="addNewFaqItem()" style="margin: 0;"><i class="fas fa-plus"></i> Add New FAQ</button>
            </div>
            
            <div id="faq-editor-container" class="dynamic-list-container" style="margin-top: 1.5rem;">
              <!-- FAQ Items populated by JS -->
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
      <h3>Settings Saved Successfully!</h3>
      <p id="publish-modal-desc">Your contact details, social links, and updated FAQs are saved and live on the main website.</p>
      <button class="btn btn-primary btn-centered" onclick="closeModal()">Close</button>
    </div>
  </div>
@endsection
