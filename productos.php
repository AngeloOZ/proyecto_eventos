<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
$data = file_get_contents('http://roman-company.com/TrailerMovilApiRest/view/menu.php?estado=active');
$productos = json_decode($data)->datos;
?>

<div id="indicador" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner " style="height: 90vh;">
    <di4 class="carousel-item active ">
      <img src="./img/slider1.jpg" class="h-100 w-100  " alt="...">
    </di4>
    <di4 class="carousel-item">
      <img src="./img/slider2.jpg" class="h-100 w-100  " alt="...">
    </di4>
    <div class="carousel-item">
      <img src="./img/slider3.jpg" class="h-100 w-100  " alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#inidicador" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#indicador" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- section comida -->
<section class="container py-4">
  <div class="row">
    <h2 class="col-12 text-center mb-4">Sección productos</h2>
  </div>
  <div class="row g-5 d-flex justify-content-center justify-content-md-evenly" id="container-productos">
  <?php foreach ($productos as $producto) : ?>
    <!-- card -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card card-product m-auto border-0">
        <div class="image-wrapper-card-pr">
          <img src="<?php echo $producto->foto_menu; ?>" alt="<?php echo $producto->detalle; ?>">
        </div>
        <div class="card-body text-center">
          <h3 class="card-title-pr">Pilsenar 1 Litro</h3>
          <div class="row d-flex flex-column-reverse align-items-center">
            <p class="col price-pr-card"><span>$</span> </i><strong><?php echo $producto->precio; ?></strong></p=>
            <p class="col category-pr"><strong><?php echo $producto->detalle_tipo; ?></strong> <i class="bi bi-tags-fill"></i></p>
          </div>
          <div class="contenedor-btn-count">
            <div class="contenedor-num-pr">
              <button class="btn-contador-rest" onclick="subtractContadorProducts(this)">-</button>
              <p class="text-num-pr">0</p>
              <button class="btn-contador-add" onclick="addContadorProducts(this)">+</button>
            </div>
            <button class="btn-card-cart" data-id-menu=<?php echo $producto->id_menu; ?>"" ><i class="bi bi-cart-plus-fill"></i> Agregar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- card/>-->
  <?php endforeach; ?>
  </div>
</section>
<div class="container-button-fixed two-button">
    <button class="btn-float" id="btn-cart"><i class="bi bi-cart-fill"></i></button>
    <button class="btn-float" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<!-- <div class="pushbar_main_content">
      Main content of the page

      <button data-pushbar-target="mypushbar1">
      Open my pushbar 1
      </button>

      <button data-pushbar-target="mypushbar2">
      Open my pushbar 2
      </button>
  </div> -->
<script type="text/javascript">
  const pushbar = new Pushbar({
        blur:true,
        overlay:true,
      });
</script>
<?php
include_once 'layout/footer.php';
?>