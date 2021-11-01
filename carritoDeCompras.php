<!-- pushbar -->
<aside class="contenedor-preorden" data-pushbar-id="right" data-pushbar-direction="right">
    <div class="sub-contenedor-preoden">
        <div class="contenedor-header-cart">
            <h2 class="title-header-cart">Resumen del carrito</h2>
            <span data-pushbar-close class="close push_right"><i class="bi bi-x"></i></span>
        </div>
        <div class="contenedor-items-carro" id="contenedor-items-carro">
            <!-- Item carro -->
            <div class="item-carro">
                <div class="image-item">
                    <img src="https://d1uz88p17r663j.cloudfront.net/resized/8689e8d974203563ddcc9bbff91323c2_MG_CHORIZOBURGER_Main-880x660_448_448.png" alt="Hamburguesa">
                </div>
                <div class="body-item">
                    <p class="detail-item">Hamburguesa doble carne con tocino</p>
                    <p class="quantity-item">5</p>
                </div>
                <div class="footer-item">
                    <a href="#" class="delete-item">Eliminar</a>
                    <p class="price-item">100.56</p>
                </div>
            </div>
            <!-- Item carro />-->
        </div>
        <div class="contenedor-total-items">
            <div class="total-estimado">
                <p>Total estimado</p>
                <p>100.56</p>
            </div>
            <a href="#" class="btn btn-purple">Continuar al pago</a>
        </div>
    </div>
</aside>

<script type="text/javascript">
    const pushbar = new Pushbar({
        blur: true,
        overlay: true,
    });
</script>