<?php
ob_start();

// datos de la URL PayPay y número de factura 
if (isset($_GET["f"])){
    $datos =base64_decode($_GET["f"]);
    $datos = json_decode($datos,true);
    
    // datos del recibo 
    $data = file_get_contents("https://roman-company.com/TrailerMovilApiRest/view/compras.php/detalle?factura=".$datos[0]."&paypal=".$datos[1]."");
    $recibo = json_decode($data, true)['datos'];
    $recibo =($recibo== null)?[]:$recibo;
    
    
    }

 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pdf.css">
    <title>recibo</title>
</head>
<body  style="text-align:center; font-family:'Courier New', Courier, monospace">
    <div  style=" font-size: 12px; padding: 0; margin: 0; box-sizing: border-box;" class="contenedor">
    <h1 style="font-size: 15px;">TRAILER MOVIL EVENTS</h1>
    <p  style="">Telf: 032987775</p>
    <p>-------------------------------------</p>
    <p style="">Recibo de Pago</p>
    <p>-------------------------------------</p>
    <?php 
    foreach ($recibo as $recibos):
    ?>
        <div  style="display:flex;    justify-content: space-between;     flex-direction: row;" >
        <p><?php echo $recibos['cantidad']."  ".$recibos['detalle']?></p>
        <p><?php echo $recibos['precioUni'] ?></p>
        </div>
    <?php 
    endforeach;
    ?>
    <p>-------------------------------------</p>
    </div>
</body>
</html>

<?php 
$html = ob_get_clean();
// echo($html);

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper(array(0,0,227.27,300));

$dompdf->render();
$dompdf->stream("archivo.pdf", array('Attachment' => false));
?>