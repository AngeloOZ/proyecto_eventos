<?php
include_once 'rest/core_functions.php';
include_once 'layout/header.php';
include_once 'layout/navegacion.php';

if (!isset($_SESSION["number_order"])) {
    $num_order = $_SESSION["number_order"] = uniqid("111-");
} else {
    $num_order = $_SESSION["number_order"];
}

$email = $_SESSION["email"];
$urlMenu = "https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_tem.php?email=$email";
$data = file_get_contents($urlMenu);
$articulos = json_decode($data, true)["datos"];
$total = 0;


?>
<style>
    .color-fff {
        color: #fff !important;
    }

    .th-header-pyts {
        background-color: #7952B3;
    }

    .th-header-pyts>th,
    .tr-body-pyts>td,
    .tfoot-tr>td {
        padding: 15px;
        color: #fff;
    }

    .th-header-pyts>th:first-child {
        border-top-left-radius: 10px;
    }

    .th-header-pyts>th:last-child {
        border-top-right-radius: 10px;
    }

    .tbody-custom {
        box-shadow: 0 0 2px rgba(255, 255, 255, 0.5) inset;
    }
</style>
<div class="container my-3">
    <div class="row g-3">
        <div class="col">
            <header class="color-fff">
                <h2 class="mb-4">Datos personales</h2>
                <div class="form-group row my-2">
                    <label for="inputNameFact" class="col-sm-2 col-form-label">Nombres:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputNameFact" value="Juanito Velastegui">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="inpuCiFact" class="col-sm-2 col-form-label">CI:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inpuCiFact" value="2988726542">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="inpuCiFact" class="col-sm-2 col-form-label">Correo:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inpuCiFact" value="<?php echo $_SESSION["email"]; ?>">
                    </div>
                </div>
            </header>
        </div>
        <div class="col">
            <header class="color-fff">
                <h2 class="mb-4">Información de Contacto</h2>
                <div class="form-group row my-2">
                    <label for="inputNameFact" class="col-sm-2 col-form-label">Dirección:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputNameFact" value="Av falsa y 123">
                    </div>
                </div>
                <div class="form-group row my-2">
                    <label for="inpuCiFact" class="col-sm-2 col-form-label">Teléfono: </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inpuCiFact" value="0987654321">
                    </div>
                </div>
            </header>
        </div>
    </div>
</div>
<main class="container">
    <p class="color-fff">Orden n.º: <?php echo $num_order; ?></p>
    <table class="table table-borderless">
        <thead>
            <tr class="th-header-pyts">
                <th>Código</th>
                <th>Detalle</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody class="tbody-custom">
            <?php foreach ($articulos as $key => $articulo) :
                $total += $articulo["total"];
            ?>
                <tr class="tr-body-pyts">
                    <td><?php echo $articulo["id_menu"]; ?></td>
                    <td><?php echo $articulo["detalle"]; ?></td>
                    <td><?php echo $articulo["cantidad"]; ?></td>
                    <td><?php echo number_format($articulo["precio"], 2); ?></td>
                    <td><?php echo number_format($articulo["total"], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr class="tfoot-tr">
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><?php echo number_format($total, 2); ?></td>
            </tr>
        </tfoot>
    </table>
</main>
<?php
include_once 'layout/footer.php';
?>