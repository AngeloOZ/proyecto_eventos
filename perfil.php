<?php
// include_once 'global/conexion.php';
// include_once 'modeloCarrito___.php';
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
?>
<div class="container">
  <h1 class="text-center mt-4" style="color: #fff;">Editar perfil</h1>
  <div class="container d-flex justify-content-center my-3">
    <div class="profile-picture">
      <img src="./img/user.png" alt="">
    </div>
  </div>
  <!-- tab -->
  <div class="d-flex align-items-start" style="background-color: #191C1F;">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Información</button>

      <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Cambiar clave</button>
    </div>
    <div class="tab-content" id="v-pills-tabContent" style="color: #fff; min-height: 450px;">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis repudiandae dolores commodi et, architecto fuga ipsam incidunt magni consectetur quae minima perferendis repellendus rerum quis.
      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus quod distinctio obcaecati cum? Suscipit officia earum similique aliquid voluptatibus repellat labore accusantium saepe culpa nihil soluta inventore dolorum, doloremque consectetur!
      </div>
    </div>
  </div>
</div>

<?php
include_once 'layout/footer.php';
?>