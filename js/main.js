'use strict';

window.onload = function(){
    
    /* Menu movil */
    if(screen.width < 769) {
        let menuMovil = document.querySelector('#menu-movil');
        let nav = document.querySelector('.nav');
        let indNavMo = 1;
        nav.style.display = 'none';
        menuMovil.addEventListener('click', function(){
            if(indNavMo === 1) {
                nav.style.display = 'block';
                indNavMo = 0;
            } else {
                nav.style.display = 'none';
                indNavMo = 1;
            }
        });

    }
}