@extends('layouts.admin')

@section('page_title', 'Testimonials Management')
@section('page_subtitle', 'Add, edit, or remove customer reviews displayed in the homepage slider')

@section('header_actions')
  <button class="btn btn-primary" onclick="saveTestimonials()"><i class="fas fa-save"></i> Save Testimonials</button>
@endsection

@section('content')
      <div class="flex-col">
        
        <!-- Add New Testimonial Form Panel -->
        <div class="form-panel">
          <h3 class="form-section-title"><i class="fas fa-plus-circle"></i> Add New Testimonial</h3>
          <form id="new-testimonial-form" onsubmit="event.preventDefault(); addNewTestimonialCard();">
            <div class="form-grid-2">
              
              <div class="form-group">
                <label class="field-label">Traveler Name</label>
                <input type="text" id="new-test-name" class="field-input" placeholder="e.g. Sarah Connor" required>
              </div>

              <div class="form-group">
                <label class="field-label">Traveler Badge / Role</label>
                <input type="text" id="new-test-role" class="field-input" placeholder="e.g. Frequent Explorer" required>
              </div>

              <div class="form-group form-group-full">
                <label class="field-label">Avatar Image URL (or upload local file below)</label>
                <div class="testimonial-avatar-group">
                  <div class="avatar-preview-box">
                    <img id="new-test-avatar-preview" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fm=webp&fit=crop&w=200&q=80" alt="Avatar">
                  </div>
                  <div class="flex-col" style="flex: 1; gap: 0.5rem;">
                    <input type="text" id="new-test-avatar-url" class="field-input" placeholder="Paste Unsplash or web image URL..." oninput="updateAvatarPreview(this.value)">
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                      <button type="button" class="btn-add-item" style="margin: 0; padding: 0.5rem 1rem; font-size: 0.8rem;" onclick="document.getElementById('new-test-avatar-file').click()">
                        <i class="fas fa-upload"></i> Choose File
                      </button>
                      <span id="file-chosen-label" style="font-size: 0.8rem; color: var(--text-muted);">No file chosen</span>
                      <input type="file" id="new-test-avatar-file" class="file-input-hidden" accept="image/*" onchange="handleAvatarFileSelect(this)">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group form-group-full">
                <label class="field-label">Traveler Feedback / Review Quote</label>
                <textarea id="new-test-text" class="field-input" style="height: 100px;" placeholder="Write their travel story review here..." required></textarea>
              </div>

            </div>

            <button type="submit" class="btn-add-item" style="margin-top: 1rem;"><i class="fas fa-plus"></i> Add to List</button>
          </form>
        </div>

        <!-- Current Testimonials List Panel -->
        <div class="form-panel">
          <h3 class="form-section-title"><i class="fas fa-comments"></i> Active Testimonials List</h3>
          <div id="testimonials-list-container" class="testimonial-card-grid">
            <!-- Populated via JS -->
          </div>
        </div>

      </div>

  <!-- Success Modal -->
  <div class="modal-overlay" id="success-modal">
    <div class="modal-card">
      <div class="modal-icon">
        <i class="fas fa-check"></i>
      </div>
      <h3>Testimonials Updated!</h3>
      <p id="publish-modal-desc">Your customer testimonials list has been successfully saved and updated on the main landing page.</p>
      <button class="btn btn-primary btn-centered" onclick="closeModal()">Close</button>
    </div>
  </div>

  <script>
    window.serverTestimonials = @json($testimonials);
    window.csrfToken = '{{ csrf_token() }}';
    window.storeTestimonialUrl = '{{ route("admin.testimonials.store") }}';
  </script>
@endsection
