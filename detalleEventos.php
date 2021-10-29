<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';

$id =  base64_decode($_GET['id']);
$datos = file_get_contents("https://roman-company.com/TrailerMovilApiRest/view/evento.php/unico?id_evento=".$id);
$products = json_decode($datos, true)['datos'][0];

// JSON VARIABLES 


$nombre = $products['nombre'];
$detalle = $products['detalle'];
$ubicacion = $products['ubicacion'];
$foto= $products['foto'];
$array_tiempo = explode(" ",$products['fecha_evento']);
$fecha_evento = $array_tiempo[0];
$hora_evento = $array_tiempo[1];
$precio= $products['precio'];
$estado = $products['estado'];


?>
<!-- Product section-->
<section id= "complete-detail" class="py-5 text-white">
    <div class="detalle-evento">
        <div class="container px-4 px-lg-5 ">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src= "<?php echo $foto?>"  alt="..." /></div>
                <div class="col-md-6">


                    <h1 class="display-5 fw-bolder titulo-eve" ><?php echo $nombre ?></h1>
                    <div class="row">
                    <div class="col-6">
                        <p class="time">Fecha:<span>  <?php echo $fecha_evento ?> </span></p>
                    </div>
                    <div class="col-6">
                        <p class="time">Hora:<span>  <?php echo $hora_evento ?> </span></p>
                    </div>
        
                    <div class="fs-1 precio-eve">
                        <span><?php echo  '$'.$precio ?></span>
                    
                    </div>
                    <div class="row ubi-eve">
                  <span> <?php echo $ubicacion ?> </span>
                        </div>
                    <p class="lead"><?php echo $detalle ?></p>
                    <div class="d-flex">
                        <div col>
                            <
                        </div>
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <div col>
                            >
                        </div>
                        <!-- Button trigger modal -->
                        <div class="col-6">
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

<!-- Related items section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Mas productos</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://media.istockphoto.com/photos/dancing-friends-picture-id501387734?b=1&k=20&m=501387734&s=170667a&w=0&h=TVaT6l5ApnSxVDgP0027JimUnUfbJYkBRCcVA2DGXg8=" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Evento 1.0</h5>
                            <!-- Product price-->
                            $40.00 - $80.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detalleEventos.html">Leer mas</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://media.istockphoto.com/photos/dancing-friends-picture-id501387734?b=1&k=20&m=501387734&s=170667a&w=0&h=TVaT6l5ApnSxVDgP0027JimUnUfbJYkBRCcVA2DGXg8=" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Evento 1.0</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detalleEventos.html">Leer mas</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://media.istockphoto.com/photos/dancing-friends-picture-id501387734?b=1&k=20&m=501387734&s=170667a&w=0&h=TVaT6l5ApnSxVDgP0027JimUnUfbJYkBRCcVA2DGXg8=" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Evento 1.0</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$50.00</span>
                            $25.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detalleEventos.html">Leer mas</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://media.istockphoto.com/photos/dancing-friends-picture-id501387734?b=1&k=20&m=501387734&s=170667a&w=0&h=TVaT6l5ApnSxVDgP0027JimUnUfbJYkBRCcVA2DGXg8=" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Evento 1.0</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            $40.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="detalleEventos.html">Leer mas</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->
<div class="container-button-fixed">
    <!-- <button class="btn-float" id="btn-cart"><i class="bi bi-cart-fill"></i></button> -->
    <button class="btn-float" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<?php
include_once 'layout/footer.php';
?>