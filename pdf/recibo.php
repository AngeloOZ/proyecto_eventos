<?php
error_reporting(0);
ob_start();

// datos de la URL PayPay y número de factura 
if (isset($_GET["f"])) {
    $datos = base64_decode($_GET["f"]);
    $datos = json_decode($datos, true);

    // datos del recibo 
    $data = file_get_contents("https://roman-company.com/TrailerMovilApiRest/view/compras.php/detalle?factura=" . $datos[0] . "&paypal=" . $datos[1] . "");
    $recibos = json_decode($data, true)['datos'];
    $recibos = ($recibos == null) ? [] : $recibos;
} else {
    die;
}
$total = 0;
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- <link rel="stylesheet" href="../css/pdf.css"> -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>recibo</title>

    <style>
        html{
            margin-top: 0px;
            margin-bottom: 0px;
        }
        body {
            text-align: center;
            font-family: 'Courier New', Courier, monospace
        }

        .title {
            font-size: 15px;
            margin: 0;
            padding: 0;
        }

        .contenedor {
            font-size: 12px;
            padding: 0;
            padding-top: 40px;
            margin: 0;
            box-sizing: border-box;
        }

        p {
            padding: 0;
            margin: 0;
        }
        .contenedor-total{
            width: 100%;
            text-align: left;
        }
        .texto-total {
            display: inline-block;
            font-size: 12px;
            text-align: left;
            padding: 0;
            margin: 0;
        }
        .valor-total{
            display: inline-block;
            float: right;
            font-size: 12px;
            text-align: right;
            padding: 0;
            margin: 0;
        }
        .p-0 {
            padding: 0;
        }
        .m-0{
            margin: 0;
        }
        .p-th {
            padding: 5px 0;
        }

        .pl-th {
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <h1 class="title">TRAILER MOVIL EVENTS</h1>
        <p">Telf: 032987775</p>
            <p><?php echo $recibos[0]['fecha_registro']; ?></p>
            <p>-------------------------------------</p>
            <p style="">Recibo N° <?php echo $recibos[0]['id_factura']; ?> <span> </span></p>
            <p>-------------------------------------</p>
            <table>
                <thead>
                    <tr>
                        <th class="p-0">Cant</th>
                        <th class="p-0 pl-th">Descripción</th>
                        <th class="p-0 pl-th">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recibos as $recibo) :
                        $total += floatval($recibo['precioTU'])
                    ?>
                        <tr>
                            <td class="p-th"><?php echo $recibo['cantidad'] ?></td>
                            <td class="p-th pl-th"><?php echo $recibo['detalle'] ?></td>
                            <td class="p-th pl-th">$ <?php echo $recibo['precioUni'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>-------------------------------------</p>
            <div class="contenedor-total">
                <p class="texto-total">Total:</p>
                <p class="valor-total">$ <?php echo $total; ?></p>
            </div>
            <p id="last-node">-------------------------------------</p>
    </div>
</body>

</html>

<?php
$html = ob_get_clean();

// echo $html;
// die;

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$options->setIsHtml5ParserEnabled(true);
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper(array(0, 0, 227.27,25));

$dompdf->render();

$page_count = $dompdf->getCanvas( )->get_page_number( );
unset( $dompdf );

$dompdf = new DOMPDF( );
$dompdf->setPaper( array( 0 , 0 , 227.77 , 22 * $page_count ) );
$dompdf->loadHtml( $html );
$dompdf->render( );
$dompdf->stream("archivo.pdf", array('Attachment' => false));
?>