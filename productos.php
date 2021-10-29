<?php
  include_once 'layout/header.php';
  include_once 'layout/navegacion.php';
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


<?php
    include_once 'layout/footer.php';    
?>
