<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
$data = file_get_contents('http://roman-company.com/TrailerMovilApiRest/view/menu.php?estado=active');
$productos = json_decode($data)->datos;
?>
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active " data-bs-interval="10000">
            <img src="./img/slider1.jpg" class="d-block w-100 img-carousel" alt="...">
        </div>
        <div class="carousel-item " data-bs-interval="2000">
            <img src="./img/slider2.jpg" class="d-block w-100 img-carousel" alt="...">
        </div>
        <div class="carousel-item ">
            <img src="./img/slider3.jpg" class="d-block w-100 img-carousel" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev bg-btn-carousel" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next bg-btn-carousel" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- section comida -->
<section class="container py-4">
    <div class="row">
        <h2 class="col-12 text-center mb-4 text-productos">Sección productos</h2>
    </div>
    <div class="row g-4 p-3 d-flex justify-content-center" id="container-productos">
        <?php foreach ($productos as $producto) : ?>
            <!-- card -->
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card m-auto border-0">
                    <div class="image-wrapper-card-pr">
                        <img src="<?php echo $producto->foto_menu; ?>" alt="<?php echo $producto->detalle; ?>">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title-pr"><?php echo $producto->detalle; ?></h3>
                        <div class="row d-flex flex-column-reverse align-items-center">
                            <p class="col price-pr-card"><span>$</span> </i><strong><?php echo number_format($producto->precio, 2); ?></strong></p=>
                            <p class="col category-pr"><strong><?php echo $producto->detalle_tipo; ?></strong> <i class="bi bi-tags-fill"></i></p>
                        </div>
                        <div class="contenedor-btn-count container ">
                            <div class="contenedor-num-pr col-6">
                                <button class="btn-contador-rest" onclick="subtractContadorProducts(this)">-</button>
                                <p class="text-num-pr">1</p>
                                <button class="btn-contador-add" onclick="addContadorProducts(this)">+</button>
                            </div>
                            <div class="col-5">
                                <button class="btn-card-cart btn-purple btn-add-cart" data-id-menu="<?php echo $producto->id_menu; ?>"><i class="bi bi-cart-plus-fill"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card/>-->
        <?php endforeach; ?>
    </div>
</section>
<div class="container-button-fixed two-button">
    <button class="btn-float btn-purple" id="btn-cart" data-pushbar-target="right"><i class="bi bi-cart-fill"></i></button>
    <button class="btn-float btn-purple" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<?php
include_once "carritoDeCompras.php";
include_once 'layout/footer.php';
?>