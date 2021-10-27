<?php
  include_once 'global/conexion.php';
  include_once 'modeloCarrito.php';
  include_once 'layout/header.php';
  include_once 'layout/navegacion.php';
?>
        <!-- Formulario -->
        <h1 class="text-center mt-4">Editar perfil</h1>
        <div class="container py-4 mb-4">

            <!-- Bootstrap 5 starter form -->
            <form id="contactForm">
          
              <!-- Name input -->
              <div class="mb-3">
                <label class="form-label" for="name">Nombre</label>
                <input class="form-control" id="name" type="text" placeholder="Su nombre" />
              </div>
          
              <!-- Email address input -->
              <div class="mb-3">
                <label class="form-label" for="emailAddress">Email</label>
                <input class="form-control" id="emailAddress" type="email" placeholder="Su email" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="emailAddress">Contraseña</label>
                <input class="form-control" id="password" type="password" placeholder="Nueva contraseña" />
              </div>
          
              <!-- Form submit button -->
              <div class="d-grid">
                <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
          
            </form>
          
          </div>
<?php
  include_once 'layout/footer.php';    
?>