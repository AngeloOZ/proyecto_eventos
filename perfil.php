<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
?>
<style>
   .form-label {
      color: #fff;
   }
</style>
<div class="container editar_perfil">
   <!-- <h1 class="text-center mt-4" style="color: #fff;">Editar perfil</h1> -->
   <div class="container mt-4 d-flex justify-content-center my-3">
      <div class="profile-picture">
         <img src="./img/user.png" alt="">
      </div>
   </div>
   <!-- tab -->
   <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
      <li class="nav-item aux-nav-item" role="presentation">
         <button class="nav-link aux-nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Información</button>
      </li>
      <li class="nav-item aux-nav-item" role="presentation">
         <button class="nav-link aux-nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Cambiar contraseña</button>
      </li>
   </ul>
   <div class="tab-content aux-tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <form class="row g-4 p-4" autocomplete="off">
            <div class="d-flex justify-content-around">
               <div class="col-md-5">
                  <label for="inputNombre" class="form-label">Nombres y Apellidos</label>
                  <input type="text" class="form-control" id="inputNombre" placeholder="Jhon">
               </div>
               <div class="col-md-5">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" readonly class="form-control" id="inputEmail4" value="<?php echo $_SESSION['email']; ?>">
               </div>
            </div>
            <div class="d-flex justify-content-around">
               <div class="col-md-5">
                  <label for="inputUsuario" class="form-label">Cédula</label>
                  <input type="text"  placeholder="User1" class="form-control" id="inputUsuario">
               </div>
               <div class="col-md-5">
                  <label for="inputTelefono" class="form-label ">Teléfono</label>
                  <input type="tel" class="form-control" id="inputTelefono" placeholder="0987654321">
               </div>
   
            </div>
            <div class="d-flex justify-content-around">
            <div class="col-md-5">
                  <label for="inputApellido" class="form-label">Ciudad</label>
                  <input type="text" class="form-control" id="inputApellido" placeholder="Doe">
               </div>
               <div class="col-md-5">
                  <label for="inputCiudad" class="form-label">Dirección</label>
                  <input type="text" class="form-control" id="inputCiudad" placeholder="Riobamba">
               </div>
            </div>
            <div class="col-12 text-center" id="button-save-profile">
                  <button type="submit" class="btn btn-purple">Guardar cambios</button>
               </div>

         </form>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
         <form class="row row-col-1 g-4 p-4">
            <div class="col-md-6">
               <label for="inputActPwd" class="form-label">Contraseña actual</label>
               <input type="password" class="form-control" id="inputActPwd">
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-6">
               <label for="inputNewPwd" class="form-label">Nueva contraseña</label>
               <input type="password" id="inputNewPwd" class="form-control" aria-describedby="passwordHelpBlock">
               <div id="passwordHelpBlock" class="form-text">
                  Tu contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emoji.
               </div>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-6">
               <label for="inputConfirmPwd" class="form-label">Confirmar contraseña</label>
               <input type="password" id="inputConfirmPwd" class="form-control" aria-describedby="passwordHelpBlock">
               <div id="passwordHelpBlock" class="form-text">
                  Tu contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emoji.
               </div>
            </div>
            <div class="col-12 text-center">
               <button type="submit" id="btn-update-pwd" class="btn btn-purple">Cambiar contraseña</button>
            </div>
         </form>
      </div>
   </div>
</div>

<?php
include_once 'layout/footer.php';
?>