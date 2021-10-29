/* -------------------------------------------------------------------------- */
/*                          Variables globales e init                         */
/* -------------------------------------------------------------------------- */

initFunctions();

/* -------------------------------------------------------------------------- */
/*                             eventos de usuario                             */
/* -------------------------------------------------------------------------- */

// Esperamos a que cargue toda la página
window.addEventListener('load', (event) => {

});



/* -------------------------------------------------------------------------- */
/*                            Funciones de usuario                            */
/* -------------------------------------------------------------------------- */
function initFunctions() {
    getEventData();
    OpacityParallax();
    scrollToTop();
}

async function getEventData() {
    const fragment = document.createDocumentFragment();
    const cardContainer = document.getElementById('container-cards');
    if(!cardContainer) return;

    const url = 'https://roman-company.com/TrailerMovilApiRest/view/evento.php?estado=active';
    const request = await fetch(url);
    const requestJson = await request.json();
    const { datos: events } = requestJson;

    events.forEach(event => {
        const cardEvent = document.createElement('DIV');
        cardEvent.classList.add('col-12', 'col-sm-6', 'col-md-5', 'col-lg-4');
        cardEvent.innerHTML = `
        <div class="card m-auto border-0">
            <div class="image-wrapper-card">
                <img src="${event.foto}" alt="${event.nombre}">
            </div>
            <div class="card-body text-center">
                <h3 class="card-title">${event.nombre}</h3>
                <p class="event-price-card"><i class="bi bi-currency-dollar"></i><strong>${event.precio}</strong></p=>
                <p><i class="bi bi-calendar-date"></i> <strong>${event.fecha_evento.split(' ')[0]}</strong></p>
                <p><i class="bi bi-geo-alt-fill"></i> <strong>${event.ubicacion}</strong></p>
                <a href="${location.origin+'/proyecto_eventos/detalleEventos?id='+btoa(event.id_evento)}" class="btn btn-card">Ver más</a>
            </div>
        </div>
        `;
        fragment.appendChild(cardEvent);
    });
    cardContainer.appendChild(fragment);
}

function scrollToTop() {
    const btnScrollTop = document.getElementById('btn-top');
    if(!btnScrollTop) return;
    btnScrollTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

function OpacityParallax() {
    const a = document.querySelector('.paralax')
    const b = document.querySelector('.contenido-paralax')

    if(!a || !b) return;

    window.addEventListener('scroll', () => {
        let scroll = document.documentElement.scrollTop + 100
        let hg = a.getBoundingClientRect().height
        if (scroll <= hg) {
            let auxHg = hg - scroll;
            let op = (auxHg / hg)
            b.style.opacity = op;
        }
    });
}

function addContadorProducts(event){
    text = event.previousElementSibling;
    number = Number.parseInt(text.innerText);
    number++;
    text.innerText = number;
}
function subtractContadorProducts(event){
    text = event.nextElementSibling;
    number = Number.parseInt(text.innerText);
    number--;
    if(number < 0){
        number = 0;
    }
    text.innerText = number;
}
