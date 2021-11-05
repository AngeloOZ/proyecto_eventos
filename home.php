<?php
$data = file_get_contents('https://roman-company.com/TrailerMovilApiRest/view/evento.php?estado=active');
$eventos = json_decode($data)->datos;

include_once 'layout/header.php';
include_once 'layout/navegacion.php';

?>

<!-- Paralax  -->
<section class="contenedor">
    <div class="paralax">
        <div class="contenido-paralax">
            <h1>Pagina de Eventos</h1>
            <p>Ven y disfruta de los mejores eventos </p>
        </div>
    </div>
</section>
<!-- Contenedor card -->
<div class="container-fluid py-5 bg-dark">
    <div class="container">
        <div class="row g-5 d-flex justify-content-center justify-content-md-evenly" id="container-cards">
            <?php foreach ($eventos as $evento) :
                $fecha = explode(" ", $evento->fecha_evento)[1];
                $id_evento = base64_encode($evento->id_evento);
                $precio = number_format($evento->precio, 2);
            ?>
                <!-- card -->
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                    <div class="card m-auto border-0">
                        <div class="image-wrapper-card">
                            <img src="<?php echo $evento->foto; ?>" alt="<?php echo $evento->nombre; ?>">
                        </div>
                        <div class="card-body text-center">
                            <h3 class="card-title"><?php echo $evento->nombre; ?></h3>
                            <p class="event-price-card">
                                <i class="bi bi-currency-dollar"></i>
                                <strong><?php echo $precio ?></strong>
                            </p>
                            <p><i class="bi bi-calendar-date"></i> <strong><?php echo $fecha; ?></strong></p>
                            <p><i class="bi bi-geo-alt-fill"></i> <strong><?php echo $evento->ubicacion; ?></strong></p>
                            <a href="<?php echo "./detalleEventos.php?id=" . $id_evento; ?>" class="btn btn-card btn-purple">Ver más</a>
                        </div>
                    </div>
                </div>
                <!-- card /> -->
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="container-button-fixed">
    <button class="btn-float btn-purple" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<!-- Contenedor card />-->
</script>
<?php
include_once 'layout/footer.php';
?>