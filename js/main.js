'use strict';

window.onload = function(){
  
    

    /* Funciones para movil */
    if(screen.width < 769) {
        /* Menu movil */
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

        /* Slider, Paquetes */
        new Glider(document.getElementById('glider-single01'), {
            slidesToShow: 1,
            dots: '#dots01',
            draggable: true,
            rewind: true,
            arrows: {
              prev: '#glider-prev01',
              next: '#glider-next01'
            },
            easing: function (x, t, b, c, d) {
              return c*(t/=d)*t + b;
            }
          });

          /* Slider, Templates */
        new Glider(document.getElementById('glider-single02'), {
          slidesToShow: 1,
          dots: '#dots02',
          draggable: true,
          rewind: true,
          arrows: {
            prev: '#glider-prev02',
            next: '#glider-next02'
          },
          easing: function (x, t, b, c, d) {
            return c*(t/=d)*t + b;
          }
        });

        /* Slider, Proyectos */
        new Glider(document.getElementById('glider-single03'), {
          slidesToShow: 1,
          dots: '#dots03',
          draggable: true,
          rewind: true,
          rewind: true,
          arrows: {
            prev: '#glider-prev03',
            next: '#glider-next03'
          },
          easing: function (x, t, b, c, d) {
            return c*(t/=d)*t + b;
          }
        });

    }

    /* Slider PC */
    /* Slider, Paquetes */
    new Glider(document.getElementById('glider-single01'), {
      slidesToShow: 3,
      dots: '#dots01',
      draggable: true,
      rewind: true,
      arrows: {
        prev: '#glider-prev01',
        next: '#glider-next01'
      },
      easing: function (x, t, b, c, d) {
        return c*(t/=d)*t + b;
      }
    });
}