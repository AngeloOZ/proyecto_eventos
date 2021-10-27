<?php
    include_once 'global/conexion.php';
    include_once 'modeloCarrito.php';
    include_once 'layout/header.php';
    include_once 'layout/navegacion.php';    
?>
    
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Realiza tus pedidos</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Los mejores productos a tu alcance</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php echo $mensaje; ?>
                <!-- Obtener productos -->
                <?php
                    try {
                        $sql = "SELECT * FROM menu";
                        $resultado = $conn->query($sql); 
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                    }  
                    while($menu = $resultado->fetch_assoc() ) { ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="detalle.php">
                                <img class="card-img-top" src="<?php echo $menu['foto_menu']; ?>" alt="menu" height="250px" />
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $menu['detalle']; ?></h5>
                                    <!-- Product price-->
                                    <?php echo $menu['precio']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->                            
                            <form action="" method="POST">
                            <input type="hidden" name="id_menu" id="id_menu" value="<?php echo $menu['id_menu']; ?>">
                                <input type="hidden" name="detalle" id="detalle"  value="<?php echo $menu['detalle']; ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo $menu['precio']; ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <button class="btn btn-outline-dark mt-auto" type="submit" name="btnAccion" value="Agregar">Agregar</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php } ?>  
                </div>
            </div>
        </section>
<?php
    include_once 'layout/footer.php';    
?>