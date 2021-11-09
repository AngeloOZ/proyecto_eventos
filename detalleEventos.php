<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';

$id =  base64_decode($_GET['id']);
$datos = file_get_contents("https://roman-company.com/TrailerMovilApiRest/view/evento.php/unico?id_evento=" . $id);
$products = json_decode($datos, true)['datos'][0];


$nombre = $products['nombre'];
$detalle = $products['detalle'];
$ubicacion = $products['ubicacion'];
$foto = $products['foto'];
$array_tiempo = explode(" ", $products['fecha_evento']);
$fecha_evento = $array_tiempo[0];
$hora_evento = $array_tiempo[1];
$precio = $products['precio'];
$estado = $products['estado'];
$contador_cards = 0;



// JSON VARIABLES 

$URL_BASE = "http://localhost/VC7/MovilTailerCliente/";
///$URL_BASE = "http://localhost/proyecto_eventos/";
$data = file_get_contents('https://roman-company.com/TrailerMovilApiRest/view/evento.php?estado=active');
$eventos = json_decode($data)->datos;

include_once 'layout/header.php';
include_once 'layout/navegacion.php';


?>
<!-- Product section-->
<section id="complete-detail" class="py-5 text-white">
    <div class="detalle-evento">
        <div class="container px-4 px-lg-5 ">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $foto ?>" alt="<?php echo $nombre; ?>" /></div>
                <div class="col-md-6">


                    <h1 class="display-5 fw-bolder titulo-eve"><?php echo $nombre ?></h1>
                    <div class="row">
                        <div class="col-6">
                            <p class="time">Fecha:<span> <?php echo $fecha_evento ?> </span></p>
                        </div>
                        <div class="col-6">
                            <p class="time">Hora:<span> <?php echo $hora_evento ?> </span></p>
                        </div>

                        <div class="fs-1 precio-eve">
                            <span><?php echo  '$' . number_format($precio,2) ?></span>

                        </div>
                        <div class="row ubi-eve">
                            <span> <?php echo $ubicacion ?> </span>
                        </div>
                        <p class="lead"><?php echo $detalle ?></p>
                        <div class="d-flex end_buttons">
                            <div class="col-1 boton_contador_eventos " onclick="subtractContadorProducts(this)">
                                <i class="bi bi-chevron-left"></i>
                            </div>
                            <p class="text-cont   col-1 ">1</p>
                            <div class="col-1 boton_contador_eventos" onclick="addContadorProducts(this)">
                                <i class="bi bi-chevron-right"></i>
                            </div>

                            <!-- Button trigger modal -->
                            <div class="col-4">
                                <button type="button" class="btn btn-primary btn_reserva_eve" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Reservar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<!-- mas eventos  -->
<section class="mas_eventos">
    <h2>Eventos Sugeridos </h2>
    <div class="container-fluid py-5 bg-dark">
        <div class="container">
            <div class="row g-5 d-flex justify-content-center justify-content-md-evenly" id="container-cards">
                <?php foreach ($eventos as $evento) :
                    $fecha = explode(" ", $evento->fecha_evento)[1];
                    $id_evento = base64_encode($evento->id_evento);
                    
                    if ($id == ($evento->id_evento) ){
                        continue;
                    }
                ?>
                    <!-- card -->
                    <div class="col-12 col-sm-6 col-md-5 col-lg-3">
                        <div class="card m-auto border-0">
                            <div class="image-wrapper-card">
                                <img src="<?php echo $evento->foto; ?>" alt="<?php echo $evento->nombre; ?>">
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-title"><?php echo $evento->nombre; ?></h3>
                                <p class="event-price-card"><i class="bi bi-currency-dollar"></i><strong><?php echo number_format($evento->precio,2); ?></strong></p=>
                                <p><i class="bi bi-calendar-date"></i> <strong><?php echo $fecha; ?></strong></p>
                                <p><i class="bi bi-geo-alt-fill"></i> <strong><?php echo $evento->ubicacion; ?></strong></p>
                                <a href="<?php echo "./detalleEventos.php?id=" . $id_evento; ?>" class="btn btn-card btn-purple">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <!-- card /> -->

                <?php
                $contador_cards++;
                if ($contador_cards >= 4){
                    break;
                }
             endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container-button-fixed">
        <button class="btn-float btn-purple" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
    </div>
</section>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estado de asientos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <span class="badge bg-primary">Disponible</span>
                    <span class="badge bg-success">Reservado</span>
                    <span class="badge bg-danger">Pendiente</span>
                </div>
                <div class="form-check form-check-inline">
                    <i class="bi bi-safe text-primary"></i>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
                    <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar reservación</button>
            </div>
        </div>
    </div>
</div> -->


<?php
include_once 'layout/footer.php';
?>