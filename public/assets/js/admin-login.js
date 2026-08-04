// Aerovia Admin Panel - Login Logic

document.addEventListener('DOMContentLoaded', () => {
  // Toggle Password Visibility
  const togglePasswordBtn = document.getElementById('toggle-password-btn');
  const passwordInput = document.getElementById('password');

  if (togglePasswordBtn && passwordInput) {
    togglePasswordBtn.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      togglePasswordBtn.className = type === 'password' ? 'fas fa-eye toggle-password' : 'fas fa-eye-slash toggle-password';
    });
  }

  // Form Submission & Validation is now handled by Laravel Backend!
});
