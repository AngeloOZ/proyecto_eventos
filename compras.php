<?php

include_once 'layout/header.php';
include_once 'layout/navegacion.php';
$data = file_get_contents('https://roman-company.com/TrailerMovilApiRest/view/compras.php/general?email='.$_SESSION['email'].'');
$compras = json_decode($data, true)['datos'];
$compras =($compras== null)?[]:$compras;

?>
<!-- Tabla -->

<div class="container seccion-pagos" style="min-height: 400px;">
    <h1 class="storial-title">Historial de Compras </h1>

<?php 
    foreach($compras as $compra ):
?>
    <div class="tabla-detalle-pago ">
        <div class="row responsive-table">
            <div class="col columnn-table">Factura N°:
                <div><?php echo $compra['id_factura'] ?></div>
            </div>
            <div class="col columnn-table"> N° Transacción:
                <div class=""><?php echo $compra['paypal'] ?> </div>
            </div>
            <div class="col columnn-table"> Fecha de Registro:
                <div>
                <?php echo explode(" ",$compra['fecha_registro'])[0] ?>
                </div>
            </div>
            <div class="col columnn-table">Total: <div class="div">
            <?php echo $compra['total_factura'] ?>
                </div>
            </div>
            <div class="col"><input class="btn_ver_recibo" type="text" value="Ver Recibo"></div>
        </div>
    </div>
<?php
endforeach;
 ?>

</div>




<div class="container-button-fixed">
    <button class="btn-float btn-purple" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<?php
include_once 'layout/footer.php';
?>