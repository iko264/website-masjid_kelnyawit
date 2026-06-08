document.addEventListener('DOMContentLoaded', function () {
            const navbarToggle = document.getElementById('navbarToggle');
            const navbarMenu = document.getElementById('navbarMenu');

            if (navbarToggle && navbarMenu) {
                navbarToggle.addEventListener('click', function () {
                    navbarToggle.classList.toggle('is-active');
                    navbarMenu.classList.toggle('is-active');

                    // Update the aria-expanded attribute for screen readers
                    const isExpanded = navbarToggle.getAttribute('aria-expanded') === 'true';
                    navbarToggle.setAttribute('aria-expanded', !isExpanded);
                });
            }
        });