@extends('layouts.admin')

@section('page_title', 'General Settings')
@section('page_subtitle', 'Modify public contact info, social links, and update site-wide Frequently Asked Questions')

@section('header_actions')
  <button class="btn btn-primary" onclick="document.getElementById('settings-form').submit();"><i class="fas fa-save"></i> Save Settings</button>
@endsection

@section('content')
      <div class="flex-col">
        @if(session('success'))
          <div class="alert alert-success" style="background-color: rgba(34, 197, 94, 0.2); border: 1px solid rgb(34, 197, 94); color: white; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
            {{ session('success') }}
          </div>
        @endif

        <form id="settings-form" action="{{ route('admin.settings.store') }}" method="POST">
          @csrf
          
          <!-- Company Contact Details -->
          <div class="form-panel">
            <h3 class="form-section-title"><i class="fas fa-address-book"></i> Company Contact Info</h3>
            <div class="form-grid-2">
              
              <div class="form-group">
                <label class="field-label">Mobile / Phone Number</label>
                <input type="text" name="phone" class="field-input" placeholder="e.g. +91 62890 06014" value="{{ $settings['phone'] ?? '' }}">
              </div>

              <div class="form-group">
                <label class="field-label">Email Address</label>
                <input type="email" name="email" class="field-input" placeholder="e.g. info@aeroviaexpeditions.com" value="{{ $settings['email'] ?? '' }}">
              </div>

              <div class="form-group form-group-full">
                <label class="field-label">Office Address</label>
                <input type="text" name="address" class="field-input" placeholder="e.g. 127A Park Street, Kolkata - 700016" value="{{ $settings['address'] ?? '' }}">
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
                  <input type="text" name="fb" class="field-input" placeholder="https://www.facebook.com/username" value="{{ $settings['fb'] ?? '' }}">
                </div>
              </div>

              <div class="form-group">
                <label class="field-label">LinkedIn Page Link</label>
                <div class="social-input-wrapper">
                  <i class="fab fa-linkedin-in social-brand-icon"></i>
                  <input type="text" name="linkedin" class="field-input" placeholder="https://www.linkedin.com/company/username" value="{{ $settings['linkedin'] ?? '' }}">
                </div>
              </div>

              <div class="form-group">
                <label class="field-label">Instagram Username Link</label>
                <div class="social-input-wrapper">
                  <i class="fab fa-instagram social-brand-icon"></i>
                  <input type="text" name="instagram" class="field-input" placeholder="https://www.instagram.com/username" value="{{ $settings['instagram'] ?? '' }}">
                </div>
              </div>

              <div class="form-group">
                <label class="field-label">WhatsApp Number</label>
                <div class="social-input-wrapper">
                  <i class="fab fa-whatsapp social-brand-icon"></i>
                  <input type="text" name="whatsapp" class="field-input" placeholder="e.g. 916289006014" value="{{ $settings['whatsapp'] ?? '' }}">
                </div>
              </div>

            </div>
          </div>

          <!-- FAQ Update Section -->
          <div class="form-panel">
            <div class="editor-card-header">
              <h3 class="form-section-title" style="border: none; margin: 0; padding: 0;"><i class="fas fa-question-circle"></i> Frequently Asked Questions (FAQ)</h3>
              <button type="button" class="btn-add-item" onclick="addNewFaqRow()" style="margin: 0;"><i class="fas fa-plus"></i> Add New FAQ</button>
            </div>
            
            <div id="faq-rows-container" class="dynamic-list-container" style="margin-top: 1.5rem;">
              @foreach($faqs as $index => $faq)
              <div class="editor-card-item faq-item-box">
                <div class="editor-card-header">
                  <span class="editor-card-title">FAQ Item</span>
                  <button type="button" class="btn-remove-item" onclick="this.closest('.faq-item-box').remove()"><i class="fas fa-trash-alt"></i> Remove</button>
                </div>
                <div class="form-group form-group-full" style="margin-bottom: 0.75rem;">
                  <label class="field-label">Question</label>
                  <input type="text" name="faqs[{{ $index }}][question]" class="field-input faq-question-input" value="{{ $faq->question }}">
                </div>
                <div class="form-group form-group-full" style="margin-bottom: 0;">
                  <label class="field-label">Answer</label>
                  <textarea name="faqs[{{ $index }}][answer]" class="field-input faq-answer-input" style="height: 75px;">{{ $faq->answer }}</textarea>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </form>
      </div>

@endsection

@section('scripts')
<script>
let faqCount = {{ count($faqs) }};

// Override the JS file behavior for settings page
window.addEventListener('load', function() {
    // Prevent the default admin-dashboard.js loadGeneralSettings from overriding our backend values
    const originalLoadGeneralSettings = window.loadGeneralSettings;
    window.loadGeneralSettings = function() { /* do nothing, backend handled it */ };
});

function addNewFaqRow() {
    const container = document.getElementById('faq-rows-container');
    if (!container) return;

    const faqBox = document.createElement('div');
    faqBox.className = 'editor-card-item faq-item-box';
    faqBox.innerHTML = `
      <div class="editor-card-header">
        <span class="editor-card-title">FAQ Item</span>
        <button type="button" class="btn-remove-item" onclick="this.closest('.faq-item-box').remove()"><i class="fas fa-trash-alt"></i> Remove</button>
      </div>
      <div class="form-group form-group-full" style="margin-bottom: 0.75rem;">
        <label class="field-label">Question</label>
        <input type="text" name="faqs[${faqCount}][question]" class="field-input faq-question-input" placeholder="Enter FAQ Question...">
      </div>
      <div class="form-group form-group-full" style="margin-bottom: 0;">
        <label class="field-label">Answer</label>
        <textarea name="faqs[${faqCount}][answer]" class="field-input faq-answer-input" style="height: 75px;" placeholder="Enter FAQ Answer..."></textarea>
      </div>
    `;
    container.appendChild(faqBox);
    faqCount++;
}
</script>
@endsection
