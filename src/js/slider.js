import Swiper from "swiper";
import { Navigation, Pagination } from 'swiper/modules';

// import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import { FreeMode } from "swiper/modules";

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.slider')) {
        const opciones = {
            slidesPerView: 1,
            spaceBetween: 15,
            freeMode: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints:{ // Como los mediaqueries en sass
                768: { //768 es el tamaño de la pantalla
                    slidesPerView: 2
                },
                1024:{
                    slidesPerView: 3    
                },
                1200:{
                    slidesPerView: 4
                }
            }

        }

        Swiper.use([Navigation])
        new Swiper('.slider', opciones)
    }
})