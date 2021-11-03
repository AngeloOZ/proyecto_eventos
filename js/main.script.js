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
    OpacityParallax();
    scrollToTop();
    addProductCart();
    getTemporalCar();
    deleteItemCart();
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
        let scroll = document.documentElement.scrollTop;
        let hg = a.getBoundingClientRect().height
        if (scroll <= hg) {
            if(scroll == 0 ){
                b.style.opacity = '1';
            }else{
                let auxHg = hg - (scroll + 380);
                let op = (auxHg / hg)
                b.style.opacity = op;
                b.style.transform = `translateY(${scroll}px)`;
            }
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
            labelQuantityProducts.textContent = 1;
            const data = {
                "email": user_credencials.email,
                "menu": idMenu,
                "cant": quantityProducts,
            }
            sendRequestAddCart(data, e.target);
        }
    })
}

function sendRequestAddCart(data, btnAddCart) {
    const url = "https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_tem.php";
    btnAddCart.setAttribute('disabled', "true");
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
            sendSweetAlert('success', 'Producto agregado', 'El producto se agrego al carrito')
            getTemporalCar();
        }
        else {
            sendSweetAlert('error', "Oppss", "Este producto ya existe en el carrito, si desea editarlo, primero elimine el item del carrito");
        }
    })
    .catch(error => console.error('Error:', error))
    .finally(() => {
        btnAddCart.removeAttribute('disabled');
    })
}

function getTemporalCar() {
    const url = `https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_tem.php?email=${user_credencials.email}`;
    fetch(url)
    .then(response => response.json())
    .then(({ datos }) => {
        if(datos != null){
            addItemsCart(datos)
        }else{
            addItemsCart([])
        }
    })
    .catch(console.log);
}

function addItemsCart(items) {
    const $containerItemsCart = document.getElementById('contenedor-items-carro');
    if (!$containerItemsCart) return; //Se valida que exista el elemento
    const fragment = document.createDocumentFragment();
    const $totalCart = document.getElementById('total-items-cart');
    const $quantityItemsCart = document.getElementById('quantity-items-cart');
    let quantityItems = 0;
    let total = 0;
    $containerItemsCart.innerHTML = '';
    items.forEach(item => {
        quantityItems += Number.parseInt(item.cantidad);
        total += Number.parseFloat(item.total);
        const divItem = document.createElement('DIV');
        divItem.classList.add('item-carro');
        divItem.innerHTML = `
        <div class="image-item">
        <img src="${item.foto}" alt="${item.detalle}">
        </div>
        <div class="body-item">
        <p class="detail-item">${item.detalle} - $${Number.parseFloat(item.precio).toFixed(2)} c/u</p>
        <p class="quantity-item">${item.cantidad}</p>
        </div>
        <div class="footer-item">
        <p class="delete-item" data-id-item-menu="${item.id_menu}">Eliminar</p>
        <p class="price-item">${Number.parseFloat(item.total).toFixed(2)}</p>
        </div>
        `;
        fragment.appendChild(divItem);
    });
    $containerItemsCart.appendChild(fragment);
    $quantityItemsCart.textContent = `(${quantityItems})`;
    $totalCart.textContent = total.toFixed(2);
}

function deleteItemCart(){
    const $containerItemsCart = document.getElementById('contenedor-items-carro');
    if (!$containerItemsCart) return; //Se valida que exista el elemento

    $containerItemsCart.addEventListener('click', async e =>{
        if(e.target.classList.contains('delete-item')){
            const idMenu = Number.parseInt(e.target.dataset.idItemMenu);
            const url = `https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_tem.php`;
            const data = {
                "email": user_credencials.email ,
                "menu": idMenu
            }
            try {
                const request = await fetch(url, {method: "DELETE", body: JSON.stringify(data), headers: {'Content-Type': 'application/json'}})
                const response = await request.json();
                
                if(response.status == 200 && response.datos){
                    getTemporalCar();
                    sendSweetAlert('success','Item eliminado','El producto fue removido del carrito de compras');
                }else{
                    sendSweetAlert('error','Oppss','Hubo un error al tratar de eliminar el item, intentalo de nuevo');
                }
            } catch (error) {
                console.log(error);
            }

        }
    })
}

function sendSweetAlert(icon = 'success', title, message) {
    Swal.fire({
        icon: icon,
        title: title,
        text: message,
    })
}
