(function () {
  let theme = 'dark';
  try {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      theme = savedTheme;
    } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) {
      theme = 'light';
    }
  } catch (e) { }
  document.documentElement.setAttribute('data-theme', theme);
  document.documentElement.classList.add(theme);

  const meta = document.querySelector('meta[name="theme-color"]');
  if (meta) {
    meta.setAttribute('content', theme === 'dark' ? '#191026' : '#FFFFFF');
  }
})();
