<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: PUT, POST, GET, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

$json = json_decode(file_get_contents('php://input'),true);

$reque = $_SERVER['REQUEST_METHOD'];

if ($reque == 'POST')
{
    try {
        session_start();
        $_SESSION['email'] = $json['email'];
        $_SESSION['name'] = $json['nombres'];
        $_SESSION["session"] = "active";

        $array = array("status"=>200);
        echo json_encode(array_map('utf8_encode',$array));
    }catch (Exception $e)
    {
        //echo $e;
        $array = array("status"=>300);
        echo json_encode(array_map('utf8_encode',$array));
    }
}


?>
