<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="./css/login_styles.css" />
    <script src="./js/jquery-3.6.0.js"></script>
   <title>Iniciar Sesión</title>
</head>

<body>
   <div class="container">
      <div class="forms-container">
         <div class="signin-signup">
            <form action="#" class="sign-in-form">
               <h2 class="title">Iniciar Sesión </h2>
               <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input type="email" id="email_login" autocomplete="off" required placeholder="Email" />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" id="pass_login"  autocomplete="off" required placeholder="Contraseña" />
               </div>
               <input type="submit" value="Login" class="btn solid" id="btn_login" />
            </form>
            <form action="#" class="sign-up-form">
               <h2 class="title">Registrate</h2>
               <div class="input-field">
                  <i class="fas fa-user"></i>
                  <input type="text" autocomplete="off" placeholder="Nombres" />
               </div>
               <div class="input-field">
                  <i class="fas fa-envelope"></i>
                  <input type="email" autocomplete="off" placeholder="Email" />
               </div>
               <div class="input-field">
                  <i class="fas fa-lock"></i>
                  <input type="password" autocomplete="off"  placeholder="Contraseña" />
               </div>
                <div class="input-field">
                    <i class="fas fa-phone-alt"></i>
                    <input type="tel" autocomplete="off"  placeholder="Telefono" />
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
                  Sign in
               </button>
            </div>
            <!-- <img src="img/register.svg" class="image" alt="" /> -->
         </div>
      </div>
   </div>

   <script>
      const sign_in_btn = document.querySelector("#sign-in-btn");
      const sign_up_btn = document.querySelector("#sign-up-btn");
      const container = document.querySelector(".container");
      const  btn_login = document.getElementById("btn_login")

      btn_login.addEventListener("click",function (e)
      {
          login()
      })

      sign_up_btn.addEventListener("click", () => {
         container.classList.add("sign-up-mode");
      });

      sign_in_btn.addEventListener("click", () => {
         container.classList.remove("sign-up-mode");
      });

      function login()
      {
          let url = "https://roman-company.com/TrailerMovilApiRest/view/login.php";
          var data = {
              codigo:"cliente",
              email:document.getElementById("email_login").value,
              pass:document.getElementById("pass_login").value
          }

          //invocamos a la api
          fetch(url, {
              method: "POST",
              body: JSON.stringify(data),
              headers: {
                  'Content-Type': 'application/json'
              }
          })
              .then(res => res.json())
              .then(response => {
                  if (response.status == 200)
                  {
                      console.log(response.datos)
                      insertSessionPHP(response.datos);
                  }
                  else{
                      alert("Credenciales no validas")
                      // no se pudo realizar
                  }
              })
              .catch(error => console.error('Error:', error));
      }


      function insertSessionPHP(obj)
      {
          let url = "./rest/session.php";

          $.ajax({
              url:url,
              method:"POST",
              data:JSON.stringify(obj)
          }).done(function (datos){
              var stringtify = JSON.stringify(datos)
              var json = JSON.parse(stringtify)
              if (json.status == 200)
              {
                  location.href = "./home.php"
              }else{
                  alert("ERROR SESSION")
              }
          }).fail(function (error){
              console.log(error)
              alert(error)
          })

      }
   </script>
<style>
    .input-field input{
        color: whitesmoke;
    }
</style>

</body>

</html>
