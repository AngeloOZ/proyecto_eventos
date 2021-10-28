<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
?>

<!-- Paralax  -->
<section class="contenedor">
    <div class="paralax">
        <div class="contenido-paralax">
            <h1>Pagina de Eventos</h1>
            <p>Ven y disfruta de los mejores eventos </p>
        </div>
    </div>
</section>
<!-- Contenedor card -->
<div class="container-fluid py-5 bg-dark">
    <div class="container">
        <div class="row g-5 d-flex justify-content-center justify-content-md-evenly" id="container-cards"> </div>
    </div>
</div>
<div class="container-button-fixed two-button">
    <button class="btn-float" id="btn-cart"><i class="bi bi-cart-fill"></i></button>
    <button class="btn-float" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<!-- Contenedor card />-->
<?php
include_once 'layout/footer.php';
?>