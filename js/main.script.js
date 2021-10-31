/* -------------------------------------------------------------------------- */
/*                          Variables globales e init                         */
/* -------------------------------------------------------------------------- */

initFunctions();

/* -------------------------------------------------------------------------- */
/*                             eventos de usuario                             */
/* -------------------------------------------------------------------------- */

// Esperamos a que cargue toda la página
window.addEventListener('load', (event) => {
    const loader = document.getElementById('loader');
    loader.classList.remove('active-loader');
    setTimeout(() =>{
        // loader.style.display = 'none';
        loader.remove();
    },600)
});



/* -------------------------------------------------------------------------- */
/*                            Funciones de usuario                            */
/* -------------------------------------------------------------------------- */
function initFunctions() {
    document.cookie = "correo=guaman1579@gmail.com; expires=Thu, 18 Dec 2022 12:00:00 UTC; path=/";
    getEventData();
    OpacityParallax();
    scrollToTop();
    addProductCart();
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
        let scroll = document.documentElement.scrollTop + 100;
        let hg = a.getBoundingClientRect().height
        if (scroll <= hg) {
            let auxHg = hg - scroll;
            let op = (auxHg / hg)
            b.style.opacity = op;
          
        }
    });
}


function addContadorProducts(event){
    let scroll_pos = document.documentElement.scrollTop;
    text = event.previousElementSibling;
    number = Number.parseInt(text.innerText);
    number++;
    text.innerText = number;
}
function subtractContadorProducts(event){
    text = event.nextElementSibling;
    number = Number.parseInt(text.innerText);
    number--;
    if(number <= 1){
        number = 1;
    }
    text.innerText = number;
}
function addProductCart(){
    const productContainer = document.getElementById("container-productos");
    if(!productContainer) return;
   
    productContainer.addEventListener("click", e =>{
 
        if(e.target.classList.contains('btn-add-cart')){
            const containerCount = e.target.previousElementSibling;
            const idMenu = Number.parseInt(e.target.dataset.idMenu);
            const quantityProducts = Number.parseInt(containerCount.querySelector('p.text-num-pr').textContent);
            const email = document.cookie.split('=')[1];
            
            const data = {
                "email":  email,
                "menu": idMenu,
                "cant": quantityProducts,
            }
           sendRequestAddCart(data);
        }
    })
}

function sendRequestAddCart(data){
    let url = "https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_tem.php";
    //invocamos a la api
    fetch(url, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(res => res.json())
    .then(response => {
        if (response.status == 200){
            getTemporalCar();
            alert("guardado")
            // poner alrta de se a ha agregado corretcamente 
        }
        else{
            alert("hey no se guardo ")
            // no se pudo realizar 
        }
    })
    .catch(error => console.error('Error:', error));
}   

function getTemporalCar(){
    let url = "https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_item.php?email=guaman1579@gmail.com";
    fetch(url)
    .then(response => response.json())
     .then(data => console.log(data))
     .catch(console.log);
}

