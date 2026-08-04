@extends('layouts.admin')

@section('page_title', 'Banner & Media Details')
@section('page_subtitle', 'Choose local media files to update banners and videos across all pages')

@section('header_actions')
  <button class="btn btn-primary" onclick="saveBannerAssets()"><i class="fas fa-save"></i> Save Banners</button>
@endsection

@section('content')
      <div class="flex-col">
        <form id="banner-details-form" onsubmit="event.preventDefault();">
          
          <!-- Home Page Banners -->
          <div class="form-panel">
            <h3 class="form-section-title"><i class="fas fa-home"></i> Home Page Hero Media</h3>
            <div class="form-grid-2">
              
              <!-- Video File -->
              <div class="form-group form-group-full">
                <label class="field-label">Homepage Background Video</label>
                <div class="media-upload-row">
                  <div class="upload-dropzone" onclick="document.getElementById('banner-home-video-file').click()">
                    <i class="fas fa-video"></i>
                    <span>Click to Choose Video File</span>
                    <input type="file" id="banner-home-video-file" class="file-input-hidden" accept="video/*">
                  </div>
                  <div class="preview-container">
                    <video class="preview-media" id="preview-home-video" autoplay muted loop>
                      <source src="{{ asset('assets/videos/Sunset-Banner.mov') }}" type="video/mp4">
                    </video>
                    <div class="preview-label-tag">Video</div>
                  </div>
                </div>
              </div>

              <!-- Poster File -->
              <div class="form-group form-group-full">
                <label class="field-label">Video Snapshot Poster</label>
                <div class="media-upload-row">
                  <div class="upload-dropzone" onclick="document.getElementById('banner-home-poster-file').click()">
                    <i class="fas fa-image"></i>
                    <span>Click to Choose Poster Image</span>
                    <input type="file" id="banner-home-poster-file" class="file-input-hidden" accept="image/*">
                  </div>
                  <div class="preview-container">
                    <img class="preview-media" id="preview-home-poster" src="{{ asset('assets/images/video-snapshot.jpg') }}" alt="Video Poster">
                    <div class="preview-label-tag">Poster</div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Public Subpages Banners -->
          <div class="form-panel media-panel">
            <h3 class="form-section-title"><i class="fas fa-images"></i> Subpages Banner Images</h3>
            <div class="form-grid-2">
              
              <!-- About Us Page Banner -->
              <div class="form-group">
                <label class="field-label">About Us Page Banner</label>
                <div class="media-upload-row">
                  <div class="upload-dropzone" onclick="document.getElementById('banner-about-file').click()">
                    <i class="fas fa-image"></i>
                    <span>Choose About Banner</span>
                    <input type="file" id="banner-about-file" class="file-input-hidden" accept="image/*">
                  </div>
                  <div class="preview-container">
                    <img class="preview-media" id="preview-about" src="{{ asset('assets/images/about-hero.webp') }}" alt="About Banner">
                    <div class="preview-label-tag">About</div>
                  </div>
                </div>
              </div>

              <!-- World Class Services Page Banner -->
              <div class="form-group">
                <label class="field-label">World Class Services Page Banner</label>
                <div class="media-upload-row">
                  <div class="upload-dropzone" onclick="document.getElementById('banner-services-file').click()">
                    <i class="fas fa-image"></i>
                    <span>Choose Services Banner</span>
                    <input type="file" id="banner-services-file" class="file-input-hidden" accept="image/*">
                  </div>
                  <div class="preview-container">
                    <img class="preview-media" id="preview-services" src="{{ asset('assets/images/services-hero.webp') }}" alt="Services Banner">
                    <div class="preview-label-tag">Services</div>
                  </div>
                </div>
              </div>

              <!-- Tours Catalog Page Banner -->
              <div class="form-group">
                <label class="field-label">Tours Catalog Page Banner</label>
                <div class="media-upload-row">
                  <div class="upload-dropzone" onclick="document.getElementById('banner-tours-file').click()">
                    <i class="fas fa-image"></i>
                    <span>Choose Tours Banner</span>
                    <input type="file" id="banner-tours-file" class="file-input-hidden" accept="image/*">
                  </div>
                  <div class="preview-container">
                    <img class="preview-media" id="preview-tours" src="{{ asset('assets/images/tours-hero.webp') }}" alt="Tours Banner">
                    <div class="preview-label-tag">Tours</div>
                  </div>
                </div>
              </div>

              <!-- Contact Us Page Banner -->
              <div class="form-group">
                <label class="field-label">Contact Us Page Banner</label>
                <div class="media-upload-row">
                  <div class="upload-dropzone" onclick="document.getElementById('banner-contact-file').click()">
                    <i class="fas fa-image"></i>
                    <span>Choose Contact Banner</span>
                    <input type="file" id="banner-contact-file" class="file-input-hidden" accept="image/*">
                  </div>
                  <div class="preview-container">
                    <img class="preview-media" id="preview-contact" src="{{ asset('assets/images/contact-hero.webp') }}" alt="Contact Banner">
                    <div class="preview-label-tag">Contact</div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Scenery & Landscapes Banners -->
          <div class="form-panel">
            <div class="editor-card-header">
              <h3 class="form-section-title" style="border: none; margin: 0; padding: 0;"><i class="fas fa-mountain"></i> Scenery & Landscapes Section Images</h3>
              <button type="button" class="btn-add-item" onclick="addNewSceneryItem()" style="margin: 0;"><i class="fas fa-plus"></i> Add Scenery Slide</button>
            </div>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.5rem; margin-bottom: 1.5rem;">
              These custom landscape images will show in the infinite marquee slider on the home page.
            </p>
            <div id="scenery-editor-container" class="scenery-editor-grid">
              <!-- Dynamically populated via JS -->
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
      <h3>Assets Updated Successfully!</h3>
      <p id="publish-modal-desc">The chosen header banner images and background video files have been simulated as uploaded and saved successfully.</p>
      <button class="btn btn-primary btn-centered" onclick="closeModal()">Close Panel</button>
    </div>
  </div>
@endsection
