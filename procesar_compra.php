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
$total = 0;

// Obtenemos informacion del carrito
$urlMenu = "https://roman-company.com/TrailerMovilApiRest/view/cliente_menu_tem.php?email=$email";
$data = file_get_contents($urlMenu);
$articulos = json_decode($data, true)["datos"];

// Obtenemos informacion del usuario
$dataClient = get_data_client($email);
?>
<script src="js/jquery-3.6.0.js"></script>
<main class="container-lg mt-5 p-3 px-4 main-order-container" id="resumenOrden">
    <!-- informacion -->
    <div class="row g-3 color-fff">
        <h2 class="mb-4 text-center" style="font-family: 'Raleway', sans-serif;">Detalle de pedido</h2>
        <div class="col-12 col-sm-6">
            <div class="row">
                <p class="col-3 color-fff label-infor">Pedido N.º</p>
                <p class="col-8 color-fff"><?php echo $num_order; ?></p>
            </div>
            <div class="row">
                <p class="col-3 color-fff label-infor"">Nombres:</p>
                <p class=" col-8 color-fff"><?php echo $dataClient["nombres"] ?></p>
            </div>
            <div class="row">
                <p class="col-3 color-fff label-infor"">Cedula:</p>
                <p class=" col-8 color-fff"><?php echo $dataClient["dni_ruc"]; ?></p>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="row">
                <p class="col-3 color-fff label-infor"">Dirección:</p>
                <p class=" col-8 color-fff"><?php echo $dataClient["direccion"]; ?></p>
            </div>
            <div class="row">
                <p class="col-3 color-fff label-infor"">Teléfono:</p>
                <p class=" col-8 color-fff"><?php echo $dataClient["telefono"]; ?></p>
            </div>
            <div class="row">
                <p class="col-3 color-fff label-infor"">Correo:</p>
                <p class=" col-8 color-fff"><?php echo $_SESSION["email"]; ?></p>
            </div>
        </div>
    </div>
    <!-- tabla -->
    <div class="contenedor-tabla">
        <table class="table table-borderless mt-4">
            <thead>
                <tr class="th-header-pyts">
                    <th>Código</th>
                    <th>Detalle</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th class="text-center">Total</th>
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
                        <td class="text-center"><?php echo number_format($articulo["total"], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="tfoot-tr">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-foot-aux text-end p-0"><span id="label-total">Total</span></td>
                    <td class="td-foot-aux text-center aux-shadow"><?php echo number_format($total, 2); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!--<div class="d-flex justify-content-center mt-3">
        <button class="btn btn-purple btn-realizar-pago">Realizar pago</button>
    </div>-->
</main>
<div class="container-button-fixed">
    <button class="btn-float btn-purple" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>
<br>
<div id="smart-button-container">
    <div style="text-align: center;">
        <div id="paypal-button-container"></div>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AW5M_dedVij9riC3tZgWWL7mY7oXZFbWmZiv3oVcwbpRhzt5AhHp_x9Q1WmVLRLiaxgXgkomfSZJvVPx&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    let compra  = null
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'pill',
                color: 'blue',
                layout: 'vertical',
                label: 'pay',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{"amount":{"currency_code":"USD","value":'<?php echo number_format($total, 2); ?>'}}]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData)
                {
                    console.log('COMPRA REALIZADA CON EXITO')
                    // Full available details
                    /*console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    console.log("//////////////////////////////////////////////////////////")*/
                    var jsonData = JSON.parse(JSON.stringify(orderData))
                    compra = jsonData.purchase_units[0].payments.captures[0].id;

                    // Show a success message within this page, e.g.
                    /*const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';*/

                    saveBD()



                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function(err)
            {
                compra = null
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
    function saveBD()
    {
        $.ajax({
            url:"https://roman-company.com/TrailerMovilApiRest/view/cliente.php/compra",
            method:"POST",
            data:JSON.stringify({
                email:'<?php echo $_SESSION["email"];?>',
                estado:1,
                tipo:1,
                recibo:compra})
        }).done(function(datos)
        {
            var json_string = JSON.stringify(datos)
            var json_parse = JSON.parse(json_string)

            if (json_parse.status == 200)
            {

                Swal.fire({
                    title: 'Pago realizado con éxito',
                    text: "ID transacción #"+compra,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#61428f',
                    allowOutsideClick:false,
                    confirmButtonText: 'Seguir Comprando'
                }).then((result) =>
                {
                    window.location.href = "./productos.php"
                })

            }else{
                Swal.fire(
                    'Error BASE DATOS ROMMAN COMPANY',
                    'No se ha podido guardar el pago.',
                    'error'
                )
            }

        }).fail(function(error){
            alert('ERROR SERVER ROMMAN COMPANY')
        })
    }
</script>
<style>
    p{
        color: white !important;
    }
</style>
<?php
include_once 'layout/footer.php';
?>
