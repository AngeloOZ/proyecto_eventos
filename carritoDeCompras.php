<!-- pushbar -->
<aside class="contenedor-preorden" data-pushbar-id="right" data-pushbar-direction="right">
    <div class="sub-contenedor-preoden">
        <div class="contenedor-header-cart">
            <h2 class="title-header-cart">Carrito<span id="quantity-items-cart" style="margin-left: 4px; font-size: 12px; font-weight: 300;">(0)</span></h2>
            <span data-pushbar-close class="close push_right"><i class="bi bi-x"></i></span>
        </div>
        <div class="contenedor-items-carro" id="contenedor-items-carro"></div>
        <div class="contenedor-total-items">
            <div class="total-estimado">
                <p>Total estimado</p>
                <p id="total-items-cart">0</p>
            </div>
            <a href="procesar_compra.php" class="btn btn-purple">Continuar al pago</a>
        </div>
    </div>
</aside>

<script type="text/javascript">
    const pushbar = new Pushbar({
        blur: true,
        overlay: true,
    });
</script>