<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
?>
<!-- Tabla -->
<div class="container seccion-pagos" style="min-height: 400px;">
    <h1 class="storial-title">Historial de Compras </h1>
    <div class="tabla-detalle-pago ">
        <div class="row responsive-table">
            <div class="col columnn-table">Transacción N°:
                <div>123454</div>
            </div>
            <div class="col columnn-table"> Pedido Realizado:
                <div class="">22 junio 2021 </div>
            </div>
            <div class="col columnn-table"> Entregado a:
                <div>
                    Jose Luis Perales
                </div>
            </div>
            <div class="col columnn-table">Total: <div class="div">
                    24.56$
                </div>
            </div>
            <div class="col"><input class="btn_ver_recibo" type="text" value="Ver Recibo"></div>
        </div>
    </div>

    <div class="tabla-detalle-pago ">
        <div class="row responsive-table">
            <div class="col columnn-table">Transacción N°:
                <div>123454</div>
            </div>
            <div class="col columnn-table"> Pedido Realizado:
                <div class="">22 junio 2021 </div>
            </div>
            <div class="col columnn-table"> Entregado a:
                <div>
                    Jose Luis Perales
                </div>
            </div>
            <div class="col columnn-table">Total: <div class="div">
                    24.56$
                </div>
            </div>
            <div class="col"><input class="btn_ver_recibo" type="text" value="Ver Recibo"></div>
        </div>
    </div>
</div>
<div class="container-button-fixed">
    <button class="btn-float btn-purple" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<?php
include_once 'layout/footer.php';
?>