document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.querySelector('.navbar-toggle');
  const menu = document.querySelector('.navbar-menu');
  
  if (menuToggle && menu) {
    menuToggle.addEventListener('click', function() {
      menu.classList.toggle('active');
      menuToggle.classList.toggle('active');
    });
    
    // Fermer le menu en cliquant à l'extérieur
    document.addEventListener('click', function(event) {
      if (!event.target.closest('.navbar') && menu.classList.contains('active')) {
        menu.classList.remove('active');
        menuToggle.classList.remove('active');
      }
    });
    
    // Fermer le menu en appuyant sur Echap
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape' && menu.classList.contains('active')) {
        menu.classList.remove('active');
        menuToggle.classList.remove('active');
      }
    });
  }
});