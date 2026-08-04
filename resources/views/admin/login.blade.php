<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Aerovia Expeditions</title>
  
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&display=swap">
  
  <!-- External Admin Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body class="admin-body">

  <!-- Ambient Blobs -->
  <div class="bg-blob blob-1"></div>
  <div class="bg-blob blob-2"></div>

  <div class="login-container">
    <div class="login-card">
      <div class="brand-logo-section">
        <img src="{{ asset('assets/images/logo/aerovia-logo-256.png') }}" alt="Aerovia Logo" class="brand-logo-img">
        <h1 class="brand-title">Aerovia</h1>
        <p class="brand-subtitle">Expeditions Control</p>
      </div>

      <!-- Alerts -->
      @if($errors->any())
      <div id="error-alert" class="alert alert-danger" style="display: flex;">
        <i class="fas fa-exclamation-circle"></i>
        <span id="error-message">{{ $errors->first() }}</span>
      </div>
      @endif

      <form action="{{ url('admin/login') }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="form-label" for="email">Email</label>
          <div class="input-wrapper">
            <input type="email" id="email" name="email" class="form-input" placeholder="admin@aerovia.com" value="{{ old('email') }}" required>
            <i class="fas fa-envelope input-icon"></i>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <div class="input-wrapper">
            <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
            <i class="fas fa-lock input-icon"></i>
            <i class="fas fa-eye toggle-password" id="toggle-password-btn"></i>
          </div>
        </div>

        <button type="submit" class="btn-login" id="submit-btn">
          <span id="btn-text">Sign In</span>
        </button>
      </form>

      <a href="{{ url('/') }}" class="back-home"><i class="fas fa-arrow-left"></i> Back to Main Site</a>
    </div>
  </div>

  <!-- External Admin Login Script -->
  <script src="{{ asset('assets/js/admin-login.js') }}"></script>
</body>
</html>
