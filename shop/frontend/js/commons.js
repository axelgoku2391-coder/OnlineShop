document.addEventListener('DOMContentLoaded', () => {
    const btnMenu = document.querySelector('.nav-desplegable i');
    const menuOverlay = document.querySelector('.menu-overlay');
    const btnClose = document.querySelector('.menu-close i');
    const logo = document.querySelector('img[alt="logo"]');

    if (btnMenu && menuOverlay && btnClose) {
        // Abrir menú
        btnMenu.addEventListener('click', () => {
            menuOverlay.classList.add('activo');
        });

        // Cerrar menú
        btnClose.addEventListener('click', () => {
            menuOverlay.classList.remove('activo');
        });
    }

    // Redirigir con el logo
    if (logo) {
        logo.addEventListener('click', () => {
            window.location.href = '/shop/index.html';
        });
    }
});
