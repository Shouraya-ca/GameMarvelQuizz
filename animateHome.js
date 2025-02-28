document.addEventListener('DOMContentLoaded', function() {
    const background = document.getElementById('myBase');
    const logo = document.getElementById('logo');

    // Affiche l'arrière-plan avec une animation
    background.style.opacity = 1;

    // Affiche le logo après un délai de 1 seconde
    setTimeout(() => {
        logo.style.opacity = 1;
    }, 1000);
});
