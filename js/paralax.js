
let $paralax = document.querySelector('.paralax');
let $paralax_c = document.querySelector('.contenido-paralax');

function Scroll(){
    let ScrollTop = document.documentElement.scrollTop
    $paralax.style.transform = 'translateY('+ScrollTop* 0+'px)';
    $paralax_c.style.transform = 'translateY('+ScrollTop* 0.3+'px)';
}

window.addEventListener('scroll',Scroll);