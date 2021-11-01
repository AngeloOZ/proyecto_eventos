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
    setTimeout(() => {
        // loader.style.display = 'none';
        loader.remove();
    }, 600)
});



/* -------------------------------------------------------------------------- */
/*                            Funciones de usuario                            */
/* -------------------------------------------------------------------------- */
function initFunctions() {
    document.cookie = "correo=guaman1579@gmail.com; expires=Thu, 18 Dec 2022 12:00:00 UTC; path=/";
    OpacityParallax();
    scrollToTop();
    addProductCart();
}

function scrollToTop() {
    const btnScrollTop = document.getElementById('btn-top');
    if (!btnScrollTop) return;
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

    if (!a || !b) return;

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


function addContadorProducts(event) {
    let scroll_pos = document.documentElement.scrollTop;
    text = event.previousElementSibling;
    number = Number.parseInt(text.innerText);
    number++;
    text.innerText = number;
}
function subtractContadorProducts(event) {
    text = event.nextElementSibling;
    number = Number.parseInt(text.innerText);
    number--;
    if (number <= 1) {
        number = 1;
    }
    text.innerText = number;
}
function addProductCart() {
    const productContainer = document.getElementById("container-productos");
    if (!productContainer) return;

    productContainer.addEventListener("click", e => {

        if (e.target.classList.contains('btn-add-cart')) {
            const containerCount = e.target.previousElementSibling;
            const idMenu = Number.parseInt(e.target.dataset.idMenu);
            const labelQuantityProducts = containerCount.querySelector('p.text-num-pr');
            const quantityProducts = Number.parseInt(labelQuantityProducts.textContent);
            const email = document.cookie.split('=')[1];
            labelQuantityProducts.textContent = 1;
            const data = {
                "email": email,
                "menu": idMenu,
                "cant": quantityProducts,
            }
            sendRequestAddCart(data, e.target);
        }
    })
}

function sendRequestAddCart(data, btnAddCart) {
    let url = "https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_tem.php";
    btnAddCart.setAttribute('disabled',"true");
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
            if (response.status == 200) {
                sendSweetAlert('success','Producto agregado','El producto se agrego al carrito')
                getTemporalCar();
            }
            else {
                sendSweetAlert('error',"Oppss","No se pudo guardar el producto en el carrito");
            }
        })
        .catch(error => console.error('Error:', error))
        .finally(()=>{
            btnAddCart.removeAttribute('disabled');
        })
}

function getTemporalCar() {
    let url = "https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_item.php?email=guaman1579@gmail.com";
    fetch(url)
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(console.log);
}

function sendSweetAlert(icon = 'success', title, message){
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
      })
}

