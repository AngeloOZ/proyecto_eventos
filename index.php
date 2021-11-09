<?php
session_start();
if (isset($_SESSION["session"])) {
   if ($_SESSION["session"] == "active") {
      header("location: home.php");
   }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./css/login_styles.css" />
   <title>Iniciar Sesión</title>
</head>

<body>
   <div class="container">
      <div class="forms-container">
         <div class="signin-signup">
            <!-- form iniciar -->
            <form id="formIniciarSesion" class="sign-in-form" autocomplete="off">
               <h2 class="title">Iniciar Sesión </h2>
               <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input type="email" id="email_login" required placeholder="Email" autocomplete="off" />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="pass_login" required placeholder="Contraseña" autocomplete="off" />
               </div>
               <input type="submit" value="Iniciar Sesión" class="btn solid" />
            </form>
            <!-- form registrar -->
            <form class="sign-up-form" id="r_formulario" autocomplete="off">
               <h2 class="title">Registrate</h2>
               <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input id="r_name" type="text" placeholder="Nombres" autocomplete="off" pattern="[a-zA-Z ]{2,254}" required />
               </div>
               <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input id="r_email" type="email" placeholder="Email" autocomplete="off" required />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input id="r_password" type="password" autocomplete="off" placeholder="Contraseña" required />
               </div>
               <div class="input-field">
                  <i class="fas fa-phone-alt"></i>
                  <input id="r_tel" type="tel" placeholder="Telefono" autocomplete="off" pattern="[0-9]{10}" required />
               </div>
               <input type="submit" class="btn" value="Registrarse" />
            </form>
         </div>
      </div>

      <div class="panels-container">
         <div class="panel left-panel">
            <div class="content">
               <div class="ctn-imagen-login">
                  <img src="./img/logo-text.png" alt="">
               </div>
               <h3>Eres nuevo?</h3>
               <p>
                  Registrate en nuestra página para obtener más información acerca de los eventos que te podemos ofrecer
               </p>
               <button class="btn transparent" id="sign-up-btn">
                  Registrarse
               </button>
            </div>
         </div>
         <div class="panel right-panel">
            <div class="content">
               <div class="ctn-imagen-login">
                  <img src="./img/logo-text.png" alt="">
               </div>
               <h3>Ya tienes cuenta?</h3>
               <p>
                  Inicia sesión en nuestra página para obtener más información acerca de los eventos que te podemos ofrecer
               </p>
               <button class="btn transparent" id="sign-in-btn">
                  Iniciar Sesión
               </button>
            </div>
         </div>
      </div>
   </div>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="./js/index.js"></script>
</body>

</html>