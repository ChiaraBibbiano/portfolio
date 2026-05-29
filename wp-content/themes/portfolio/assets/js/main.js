//récupère les éléments
const burger = document.querySelector('.navigation__burger');
const navMobile = document.getElementById('nav-mobile');

//écoute le clic sur le burger
burger.addEventListener('click', () => {

    //  vérifie si le menu est ouvert ou fermé
    const isOpen = burger.getAttribute('aria-expanded') === 'true';

    //bascule l'état aria
    burger.setAttribute('aria-expanded', String(!isOpen));

    // On ajoute/retire la classe qui déclenche l'animation CSS
    navMobile.classList.toggle('nav-mobile--open');
});