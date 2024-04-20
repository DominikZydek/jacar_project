document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuDropdown = document.querySelector('.menu-dropdown');

    menuToggle.addEventListener('click', function() {
        menuDropdown.classList.toggle('active');
    });
});