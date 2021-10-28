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
    scrollToTop();
}

async function getEventData() {
    const fragment = document.createDocumentFragment();
    const cardContainer = document.getElementById('container-cards');
    const url = 'https://roman-company.com/TrailerMovilApiRest/view/evento.php?estado=active';
    const request = await fetch(url);
    const requestJson = await request.json();
    const { datos: events } = requestJson;

    events.forEach(event => {
        const cardEvent = document.createElement('DIV');
        cardEvent.classList.add('col-12','col-sm-6','col-md-5','col-lg-4');
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
                <a href="#" class="btn btn-card">Ver más</a>
            </div>
        </div>
        `;
        fragment.appendChild(cardEvent);
    });
    cardContainer.appendChild(fragment);
}

function scrollToTop() {
    const btnScrollTop = document.querySelector('#btn-top');
    btnScrollTop.addEventListener('click', function(){
        document.documentElement.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    })
}

