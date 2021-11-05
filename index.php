<!DOCTYPE html>
<html lang="en">

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
            <form action="#" id="formIniciarSesion" class="sign-in-form" autocomplete>
               <h2 class="title">Iniciar Sesión </h2>
               <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input type="email" id="email_login" required placeholder="Email" />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="pass_login" required placeholder="Contraseña" />
               </div>
               <input type="submit" value="Iniciar Sesión" class="btn solid"/>
            </form>
            <form action="#" class="sign-up-form" id="r_formulario">
               <h2 class="title">Registrate</h2>
               <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input id="r_name" type="text" placeholder="Nombres" required />
               </div>
               <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input id="r_email" type="email" placeholder="Email" required />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input id="r_password" type="password" placeholder="Contraseña" required  />
               </div>
                <div class="input-field">
                    <i class="fas fa-phone-alt"></i>
                    <input id="r_tel" type="tel" placeholder="Telefono" required />
                </div>
               <input type="submit" class="btn" value="Registrarse" />
            </form>
         </div>
      </div>

      <div class="panels-container">
         <div class="panel left-panel">
            <div class="content">
               <h3>Eres nuevo?</h3>
               <p>
                  Registrate en nuestra página para obtener más información acerca de los eventos que te podemos ofrecer
               </p>
               <button class="btn transparent" id="sign-up-btn">
                  Registrarse
               </button>
            </div>
            <!-- <img src="img/log.svg" class="image" alt="" /> -->
         </div>
         <div class="panel right-panel">
            <div class="content">
               <h3>Ya tienes cuenta?</h3>
               <p>
               Inicia sesión en nuestra página para obtener más información acerca de los eventos que te podemos ofrecer
               </p>
               <button class="btn transparent" id="sign-in-btn">
                  Iniciar Sesión
               </button>
            </div>
            <!-- <img src="img/register.svg" class="image" alt="" /> -->
         </div>
      </div>
   </div>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="./js/index.js"></script>
</body>

</html>
 