// Sélectionne le bouton
var backToTopButton = document.querySelector(".back-to-top");

backToTopButton.style.display = 'none'

// Ajoute un écouteur d'événements pour détecter le scroll de la page
window.addEventListener("scroll", function () {
    // Affiche le bouton si l'utilisateur a fait défiler la page en dessous de 100 pixels du haut
    if (window.scrollY >= 100) {
        backToTopButton.style.display = "block";
    } else {
        backToTopButton.style.display = "none";
    }
});

// Ajoute un écouteur d'événements pour remonter en haut de la page lorsque le bouton est cliqué
backToTopButton.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});
