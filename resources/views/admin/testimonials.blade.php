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
          @if ($errors->any())
            <div class="alert alert-danger" style="background-color: rgba(239, 68, 68, 0.2); border: 1px solid rgb(239, 68, 68); color: white; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; font-size: 0.9rem;">
              <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <h3 class="form-section-title"><i class="fas fa-plus-circle"></i> Add New Testimonial</h3>
          <form id="new-testimonial-form" action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid-2">
              
              <div class="form-group">
                <label class="field-label">Traveler Name</label>
                <input type="text" id="new-test-name" name="name" class="field-input" placeholder="e.g. Sarah Connor" required>
              </div>

              <div class="form-group">
                <label class="field-label">Traveler Badge / Role</label>
                <input type="text" id="new-test-role" name="role" class="field-input" placeholder="e.g. Frequent Explorer" required>
              </div>

              <div class="form-group form-group-full">
                <label class="field-label">Avatar Image URL (or upload local file below)</label>
                <div class="testimonial-avatar-group">
                  <div class="avatar-preview-box">
                    <img id="new-test-avatar-preview" src="" alt="Avatar" style="display: none;">
                  </div>
                  <div class="flex-col" style="flex: 1; gap: 0.5rem;">
                    <input type="text" id="new-test-avatar-url" name="avatar_url" class="field-input" placeholder="Paste Unsplash or web image URL..." oninput="updateAvatarPreview(this.value)">
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                      <button type="button" class="btn-add-item" style="margin: 0; padding: 0.5rem 1rem; font-size: 0.8rem;" onclick="document.getElementById('new-test-avatar-file').click()">
                        <i class="fas fa-upload"></i> Choose File
                      </button>
                      <span id="file-chosen-label" style="font-size: 0.8rem; color: var(--text-muted);">No file chosen</span>
                      <input type="file" id="new-test-avatar-file" name="avatar_file" class="file-input-hidden" accept="image/*" onchange="handleAvatarFileSelect(this)">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group form-group-full">
                <label class="field-label">Traveler Feedback / Review Quote</label>
                <textarea id="new-test-text" name="text" class="field-input" style="height: 100px;" placeholder="Write their travel story review here..." required></textarea>
              </div>

            </div>

            <button type="submit" class="btn-add-item" style="margin-top: 1rem;"><i class="fas fa-plus"></i> Add to List</button>
          </form>
        </div>

        <!-- Current Testimonials List Panel -->
        <div class="form-panel">
          <h3 class="form-section-title"><i class="fas fa-comments"></i> Active Testimonials List</h3>
          <div id="testimonials-list-container" class="testimonial-card-grid">
            @foreach($testimonials as $index => $test)
              <div class="editor-card-item">
                <div class="editor-card-header">
                  <span class="editor-card-title">Testimonial #{{ $index + 1 }}</span>
                  <form action="{{ route('admin.testimonials.destroy', $test->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this testimonial?')" style="margin: 0; display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-remove-item"><i class="fas fa-trash-alt"></i> Delete</button>
                  </form>
                </div>
                <div class="testimonial-avatar-group">
                  <div class="avatar-preview-box">
                    @if($test->avatar)
                      <img src="{{ $test->avatar }}" alt="{{ $test->name }}">
                    @endif
                  </div>
                  <div>
                    <h4 style="color: white; font-size: 0.95rem;">{{ $test->name }}</h4>
                    <p style="color: var(--brand-sunset-orange); font-size: 0.8rem; font-weight: 500;">{{ $test->role }}</p>
                  </div>
                </div>
                <p style="font-size: 0.85rem; color: var(--text-muted); font-style: italic; line-height: 1.4;">
                  "{{ $test->text }}"
                </p>
              </div>
            @endforeach
          </div>
        </div>

      </div>

  <!-- Success Modal -->
  @if(session('success'))
  <div class="modal-overlay" id="success-modal" style="display: flex;">
    <div class="modal-card">
      <div class="modal-icon">
        <i class="fas fa-check"></i>
      </div>
      <h3>Testimonials Updated!</h3>
      <p id="publish-modal-desc">{{ session('success') }}</p>
      <button class="btn btn-primary btn-centered" onclick="closeModal()">Close</button>
    </div>
  </div>
  @else
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
  @endif
@endsection
